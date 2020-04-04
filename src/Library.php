<?php

/**
 * This file is part of SDL Image package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace SDL\Image;

use SDL\Loader\BitDepth;
use SDL\Loader\LibraryInterface;
use SDL\Loader\OperatingSystem;

/**
 * Class Library
 */
class Library implements LibraryInterface
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
    private const LIBRARY_WIN64 = __DIR__ . '/../bin/x64/SDL2_image.dll';

    /**
     * @var string
     */
    private const LIBRARY_WIN86 = __DIR__ . '/../bin/x86/SDL2_image.dll';

    /**
     * @var string
     */
    private const LIBRARY_LINUX = 'libSDL2_image-2.0.so.0';

    /**
     * @var string
     */
    private const LIBRARY_MAC = 'libSDL2_image-2.0.0.dylib';

    /**
     * @var string|null
     */
    protected ?string $version = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'SDL Image';
    }

    /**
     * @return string
     */
    public function getHeaders(): string
    {
        return __DIR__ . '/../resources/sdl-image.h';
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(string $library): string
    {
        if ($this->version === null) {
            $ctx = \FFI::cdef(static::IMG_GET_VERSION, $library);

            $ver = $ctx->IMG_Linked_Version()[0];

            return $this->version = \sprintf('%d.%d.%d', $ver->major, $ver->minor, $ver->patch);
        }

        return $this->version;
    }

    /**
     * {@inheritDoc}
     */
    public function getLibrary(OperatingSystem $os, BitDepth $bits): ?string
    {
        switch (true) {
            case $os->isWindows() && $bits->is64BitDepth():
                return self::LIBRARY_WIN64;

            case $os->isWindows() && $bits->is32BitDepth():
                return self::LIBRARY_WIN86;

            case $os->isLinux():
                return self::LIBRARY_LINUX;

            case $os->isMac():
                return self::LIBRARY_MAC;
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function suggest(OperatingSystem $os, BitDepth $bits): ?string
    {
        switch (true) {
            case $os->isWindows():
                return 'Try to open issue on GitHub: https://github.com/SerafimArts/ffi-sdl-image/issues';

            case $os->isLinux():
                return 'Dependency installation required: "sudo apt install libsdl2-image-2.0-0 -y"';

            case $os->isMac():
                return 'Dependency installation required: "brew install sdl2_image"';
        }

        return null;
    }
}
