<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\CData;
use FFI\Contracts\Headers\VersionInterface;
use FFI\Contracts\Preprocessor\PreprocessorInterface;
use FFI\Env\Runtime;
use FFI\Location\Locator;
use FFI\Preprocessor\Preprocessor;
use FFI\Proxy\Proxy;
use FFI\Proxy\Registry;
use FFI\WorkDirectory\WorkDirectory;
use Psr\SimpleCache\CacheInterface;
use Serafim\SDL\SDL;

/**
 * @mixin \FFI
 */
final class Image extends Proxy implements InitFlags
{
    use Marshaller;

    /**
     * Contains referenced SDL library.
     */
    private readonly SDL $sdl;

    /**
     * Contains pathname to the binary library.
     *
     * @var non-empty-string
     */
    public readonly string $library;

    /**
     * Contains current compiled SDL version.
     */
    public readonly VersionInterface $version;

    public function __construct(
        SDL $sdl = null,
        ?string $library = null,
        VersionInterface|string $version = null,
        CacheInterface $cache = null,
        PreprocessorInterface $pre = new Preprocessor(),
    ) {
        Runtime::assertAvailable();

        $this->sdl = $sdl ?? $this->detectSDL2();
        $this->library = $this->detectLibraryPathname($library);
        $this->version = match (true) {
            \is_string($version) => Version::create($version),
            $version instanceof VersionInterface => $version,
            default => $this->detectVersion(),
        };

        $header = $this->getHeader($pre, $cache);

        if ($directory = \dirname($this->sdl->library)) {
            WorkDirectory::set($directory);
        }

        parent::__construct(\FFI::cdef((string)$header, $this->library));
    }

    private function getHeader(PreprocessorInterface $pre, ?CacheInterface $cache): string|\Stringable
    {
        if ($cache !== null) {
            return new CacheAwareHeader($this->sdl->version, $this->version, $pre, $cache);
        }

        return Header::create($this->sdl->version, $this->version, $pre);
    }

    private function detectSDL2(): SDL
    {
        try {
            /** @var SDL */
            return Registry::get(SDL::class);
        } catch (\Throwable $e) {
            throw new \RuntimeException(<<<'error'
                The Serafim\SDL\SDL library has not been initialized before and
                cannot be initialized automatically.

                Please initialize it explicitly or pass it as a first
                constructor argument.
                error, 0, $e);
        }
    }

    /**
     * @psalm-suppress all
     */
    private function detectVersion(): VersionInterface
    {
        /**
         * @var object{SDL_GetVersion:callable(object):void} $ffi
         */
        $ffi = \FFI::cdef(<<<'CLANG'
            typedef uint8_t Uint8;
            typedef struct SDL_Version {
              Uint8 major;
              Uint8 minor;
              Uint8 patch;
            } SDL_Version;
            extern const SDL_Version* IMG_Linked_Version(void);
            CLANG, $this->library);

        /**
         * @var \FFI\CData&object{
         *     major: int<0, 255>,
         *     minor: int<0, 255>,
         *     patch: int<0, 255>
         * } $version
         */
        $version = $ffi->IMG_Linked_Version();

        return Version::create(\vsprintf('%d.%d.%d', [
            $version->major,
            $version->minor,
            $version->patch,
        ]));
    }

    /**
     * @psalm-suppress MoreSpecificReturnType
     * @psalm-suppress LessSpecificReturnStatement
     *
     * @return non-empty-string
     */
    private function detectLibraryPathname(?string $library): string
    {
        if ($library !== null) {
            return \realpath($library) ?: Locator::resolve($library) ?? $library;
        }

        return match (\PHP_OS_FAMILY) {
            'Windows' => Locator::resolve('SDL2_image.dll')
                ?? throw new \RuntimeException(<<<'error'
                    Could not load [SDL2_image.dll].

                    Please make sure the SDL2_image library is installed or specify
                    the path to the binary explicitly.
                    error),
            'BSD',
            'Linux' => Locator::resolve('libSDL2_image-2.0.so', 'libSDL2_image-2.0.so.0')
                ?? throw new \RuntimeException(<<<'error'
                    Could not load [libSDL2_image-2.0.so.0].

                    Please make sure the SDL2_image library is installed or specify
                    the path to the binary explicitly.
                    error),
            'Darwin' => Locator::resolve('libSDL2_image-2.0.0.dylib')
                ?? throw new \RuntimeException(<<<'error'
                    Could not load [libSDL2_image-2.0.0.dylib].

                    Please make sure the SDL2_image library is installed or specify
                    the path to the binary explicitly.
                    error),
        };
    }

    /**
     * @deprecated Please use {@see \FFI::addr()} method instead.
     */
    public static function addr(CData $type): CData
    {
        return \FFI::addr($type);
    }


}
