<?php

/**
 * This file is part of SDL Image package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Serafim\SDL\Image;

use Serafim\FFILoader\Library as BaseLibrary;
use Serafim\FFILoader\Loader;
use Serafim\Flux\Library as FFILibrary;
use Serafim\Preprocessor\PreprocessorInterface;
use Serafim\SDL\Library as SDLLibrary;
use Serafim\Version\Version as VersionInstance;
use Serafim\Version\VersionInterface;

/**
 * @psalm-type SDLVersion = object { major: int, minor: int, patch: int }
 */
final class Library extends BaseLibrary
{
    /**
     * @var string
     */
    protected const IMG_GET_VERSION = <<<'clang'
        typedef struct SDL_Version
        {
            uint8_t major;
            uint8_t minor;
            uint8_t patch;
        } SDL_Version;

        extern const SDL_Version* IMG_Linked_Version(void);
    clang;

    /**
     * @var string
     */
    private const SDL_IMG_RESOURCES = __DIR__ . '/../resources';

    /**
     * @var string
     */
    private const BINARY_WIN64 = self::SDL_IMG_RESOURCES . '/bin/x64/SDL2_image.dll';

    /**
     * @var string
     */
    private const BINARY_WIN86 = self::SDL_IMG_RESOURCES . '/bin/x86/SDL2_image.dll';

    /**
     * @var string
     */
    private const BINARY_LINUX = 'libSDL2_image-2.0.so.0';

    /**
     * @var string
     */
    private const BINARY_DARWIN = 'libSDL2_image-2.0.0.dylib';

    /**
     * @var string
     */
    private const SDL_IMG_INCLUDE = self::SDL_IMG_RESOURCES . '/include/sdl-image.h';

    /**
     * @var VersionInterface|null
     */
    private ?VersionInterface $version;

    /**
     * @var SDLLibrary
     */
    private SDLLibrary $sdl;

    /**
     * @param SDLLibrary $sdl
     * @param VersionInterface|null $version
     */
    public function __construct(SDLLibrary $sdl, VersionInterface $version = null)
    {
        $this->version = $version;
        $this->sdl = $sdl;
    }

    /**
     * @param Loader $loader
     * @param PreprocessorInterface $pre
     */
    public function extend(Loader $loader, PreprocessorInterface $pre): void
    {
        // Load SDL headers without prototypes
        $headers = $loader->headers($this->sdl, [SDLLibrary::DIRECTIVE_SDL_NO_PROTOTYPES => true]);

        // Create virtual file ("#include <sdl.h>")
        $pre->add($headers, 'sdl.h');
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->sdl->getDirectory();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return 'SDL Image';
    }

    /**
     * @return VersionInterface
     */
    public function getVersion(): VersionInterface
    {
        return $this->version ??= $this->detectVersion($this->getBinary());
    }

    /**
     * {@inheritDoc}
     */
    public function getBinary(): string
    {
        switch (\PHP_OS_FAMILY) {
            case 'Windows':
                return \PHP_INT_SIZE === 8 ? self::BINARY_WIN64 : self::BINARY_WIN86;

            case 'Linux':
                return self::BINARY_LINUX;

            case 'Darwin':
                return self::BINARY_DARWIN;

            default:
                throw new \LogicException('Can not load SDL Image library on your OS');
        }
    }

    /**
     * @return \SplFileInfo
     */
    public function getHeaders(): \SplFileInfo
    {
        return new \SplFileInfo(self::SDL_IMG_INCLUDE);
    }

    /**
     * {@inheritDoc}
     */
    public function getDirectives(): iterable
    {
        yield 'SDL_IMG_PREREQ' => function ($major, $minor, $patch): string {
            $needle = new VersionInstance((int)$major, (int)$minor, (int)$patch);

            return $this->getVersion()->gte($needle) ? '1' : '0';
        };
    }

    /**
     * @param string $binary
     * @return VersionInterface
     */
    private function detectVersion(string $binary): VersionInterface
    {
        $directory = \getcwd();
        FFILibrary::setDirectory($this->getDirectory());

        try {
            $ctx = \FFI::cdef(self::IMG_GET_VERSION, $binary);
        } finally {
            FFILibrary::setDirectory($directory);
        }

        /** @psalm-var SDLVersion $version */
        $version = $ctx->IMG_Linked_Version()[0];

        return new VersionInstance(
            $version->major,
            $version->minor,
            $version->patch
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getSuggestion(): string
    {
        switch (true) {
            case 'Windows':
                return 'Try to open issue on GitHub: https://github.com/SerafimArts/ffi-sdl-image/issues';

            case 'Linux':
                return 'Dependency installation required: "sudo apt install libsdl2-image-2.0-0 -y"';

            case 'Darwin':
                return 'Dependency installation required: "brew install sdl2_image"';
        }

        return parent::getSuggestion();
    }
}
