<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\Contracts\Headers\HeaderInterface;
use FFI\Contracts\Headers\Version\ComparableInterface;
use FFI\Contracts\Headers\VersionInterface;
use FFI\Contracts\Preprocessor\Exception\PreprocessorExceptionInterface;
use FFI\Contracts\Preprocessor\PreprocessorInterface;
use Serafim\SDL\SDL;

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
            typedef struct SDL_version SDL_version;
            typedef struct SDL_Surface SDL_Surface;
            typedef struct SDL_RWops SDL_RWops;
            typedef struct SDL_Texture SDL_Texture;
            typedef struct SDL_Renderer SDL_Renderer;
        #endif
        CPP;

    public function __construct(
        private readonly PreprocessorInterface $pre,
    ) {
    }

    /**
     * @return non-empty-string
     */
    public function getPathname(): string
    {
        return self::HEADERS_ENTRYPOINT;
    }

    public static function create(
        SDL $sdl,
        VersionInterface $version,
        PreprocessorInterface $pre,
    ): self {
        $pre = clone $pre;

        if (!$version instanceof ComparableInterface) {
            $version = Version::create($version->toString());
        }

        //
        // Custom directive
        //
        $pre->define('_SDL_IMAGE_VERSION_GTE', static fn (string $expected): bool =>
            \version_compare($version->toString(), $expected, '>=')
        );

        //
        // Custom directive
        //
        $pre->define('_SDL_VERSION_GTE', static fn (string $expected): bool =>
            \version_compare($sdl->version->toString(), $expected, '>=')
        );

        $pre->add('SDL.h', self::SDL_H);
        $pre->add('SDL_version.h', '');
        $pre->add('begin_code.h', '');
        $pre->add('close_code.h', '');

        $pre->define('DECLSPEC', '');
        $pre->define('SDLCALL', '');
        $pre->define('SDL_VERSION_ATLEAST',
            static fn (string $maj = '1', string $min = '0', string $patch = '0'): bool =>
                \version_compare($version->toString(), \sprintf('%d.%d.%d', $maj, $min, $patch), '>=')
        );

        return new self($pre);
    }

    /**
     * @throws PreprocessorExceptionInterface
     */
    public function __toString(): string
    {
        return (string)$this->pre->process(new \SplFileInfo($this->getPathname()));
    }
}