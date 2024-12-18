<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\Contracts\Headers\HeaderInterface;
use FFI\Contracts\Headers\Version\ComparableInterface;
use FFI\Contracts\Headers\VersionInterface;
use FFI\Contracts\Preprocessor\Exception\PreprocessorExceptionInterface;
use FFI\Contracts\Preprocessor\PreprocessorInterface;
use FFI\Preprocessor\Preprocessor;
use Serafim\SDL\Version as SDLVersion;

final class Header implements HeaderInterface
{
    /**
     * @var non-empty-string
     */
    private const HEADERS_ENTRYPOINT = __DIR__ . '/../resources/headers/SDL_image.h';

    /**
     * @var non-empty-string
     */
    private const SDL_H = <<<'CPP'
        #ifndef SDL_h_
            #define SDL_h_
            typedef void* SDL_version;
            typedef void* SDL_Surface;
            typedef void* SDL_RWops;
            typedef void* SDL_Texture;
            typedef void* SDL_Renderer;
        #endif
        CPP;

    public function __construct(
        private readonly PreprocessorInterface $pre,
    ) {}

    /**
     * @return non-empty-string
     */
    public function getPathname(): string
    {
        return self::HEADERS_ENTRYPOINT;
    }

    public static function create(
        VersionInterface $sdlVersion = SDLVersion::LATEST,
        VersionInterface $sdlImageVersion = Version::LATEST,
        PreprocessorInterface $pre = new Preprocessor(),
    ): self {
        $pre = clone $pre;

        if (!$sdlImageVersion instanceof ComparableInterface) {
            $sdlImageVersion = Version::create($sdlImageVersion->toString());
        }

        $pre->define('_SDL_IMAGE_VERSION_GTE', static fn(string $expected): bool
            => \version_compare($sdlImageVersion->toString(), $expected, '>='));
        $pre->define('_SDL_VERSION_GTE', static fn(string $expected): bool
            => \version_compare($sdlVersion->toString(), $expected, '>='));
        $pre->define('SDL_VERSION_ATLEAST', static fn(string $a, string $b, string $c): bool
            => \version_compare($sdlVersion->toString(), \sprintf('%d.%d.%d', $a, $b, $c), '>='));

        $pre->add('SDL.h', self::SDL_H);
        $pre->add('SDL_version.h', '');
        $pre->add('begin_code.h', '');
        $pre->add('close_code.h', '');

        $pre->define('DECLSPEC', '');
        $pre->define('SDLCALL', '');

        return new self($pre);
    }

    /**
     * @throws PreprocessorExceptionInterface
     */
    public function __toString(): string
    {
        return (string) $this->pre->process(new \SplFileInfo($this->getPathname()));
    }
}
