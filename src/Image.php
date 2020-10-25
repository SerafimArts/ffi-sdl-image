<?php

/**
 * This file is part of SDL package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @noinspection StaticInvocationViaThisInspection
 */

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\CCharPtrPtr;
use FFI\CData;
use Serafim\Flux\Library as FFILibrary;
use Serafim\SDL\Exception\SDLException;
use Serafim\SDL\RendererPtr;
use Serafim\SDL\RWopsPtr;
use Serafim\SDL\SDL;
use Serafim\SDL\SurfacePtr;
use Serafim\SDL\TexturePtr;
use Serafim\SDL\Version;
use Serafim\Version\VersionInterface;

final class Image implements InitFlags, ImageType
{
    /**
     * @readonly
     * @var \FFI|object
     */
    private static \FFI $ffi;

    /**
     * @readonly
     * @var VersionInterface
     */
    private static VersionInterface $version;

    /**
     * @readonly
     * @var string
     */
    private static string $directory;

    /**
     * The Image's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    private function __construct()
    {
    }

    /**
     * @param string $type
     * @param bool $owned
     * @return CData
     */
    public static function new(string $type, bool $owned = true): CData
    {
        if (\class_exists($type)) {
            $type = 'SDL_' . self::classBaseName($type);
        }

        return self::$ffi->new($type, $owned);
    }

    /**
     * @param string $class
     * @return string
     */
    private static function classBaseName(string $class): string
    {
        $chunks = \explode('\\', $class);

        return \end($chunks);
    }

    /**
     * @param string $type
     * @param CData $ptr
     * @return CData
     */
    public static function cast(string $type, CData $ptr): CData
    {
        return self::$ffi->cast($type, $ptr);
    }

    /**
     * Loads dynamic libraries and prepares them for use.
     * Flags should be one or more flags from IMG_InitFlags OR'd together.
     *
     * <code>
     *  extern int IMG_Init(int flags);
     * </code>
     *
     * @psalm-import-type SDLImageInitFlags from InitFlags
     * @psalm-param SDLImageInitFlags $flags
     *
     * @param int|InitFlags $flags
     * @return void
     * @throws SDLException
     */
    public static function init(int $flags): void
    {
        FFILibrary::setDirectory(self::$directory);

        if (self::$ffi->IMG_Init($flags) === 0) {
            throw new SDLException(SDL::getError());
        }
    }

    /**
     * This function returns the version of the dynamically linked SDL_image
     * library.
     *
     * <code>
     *  extern const SDL_version *IMG_Linked_Version(void);
     * </code>
     *
     * @return Version
     */
    public static function linkedVersion(): CData
    {
        FFILibrary::setDirectory(self::$directory);

        $result = self::$ffi->IMG_Linked_Version();

        return SDL::cast('SDL_Version*', $result);
    }

    /**
     * Unloads libraries loaded with IMG_Init
     *
     * <code>
     *  extern void IMG_Quit(void);
     * </code>
     *
     * @return void
     */
    public static function quit(): void
    {
        self::$ffi->IMG_Quit();
    }

    /**
     * Load an image from an SDL data source.
     * The 'type' may be one of: "BMP", "GIF", "PNG", etc
     *
     * @param CData|RWopsPtr $src
     * @param bool $freeSrc
     * @param string $type
     * @return SurfacePtr
     * @throws SDLException
     * @see ImageType
     *
     * If the image format supports a transparent pixel, SDL will set the
     * colorkey for the surface.  You can enable RLE acceleration on the
     * surface afterwards by calling:
     *
     * $sdl->SDL_SetColorKey($image, SDL::SDL_RLEACCEL, $image->format->colorkey);
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadTyped_RW(SDL_RWops *src, int freesrc, const char *type);
     * </code>
     *
     */
    public static function loadTypedRw(CData $src, string $type, bool $freeSrc = true): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadTyped_RW($src, (int)$freeSrc, $type)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Load file for use as an image in a new surface. This actually calls
     * loadTypedRw, with the file extension used as the type string.
     * This can load all supported image files, including TGA as long as the
     * filename ends with ".tga". It is best to call this outside of event
     * loops, and rather keep the loaded images around until you are really
     * done with them, as disk speed and image conversion to a surface is not
     * that speedy.
     *
     * Don't forget to $sdl->freeSurface the returned surface pointer when you
     * are through with it.
     *
     * <code>
     *  extern SDL_Surface* IMG_Load(const char *file);
     * </code>
     *
     * @param string $file
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function load(string $file): CData
    {
        FFILibrary::setDirectory(self::$directory);

        if (($result = self::$ffi->IMG_Load($file)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Load src for use as a surface. This can load all supported image formats,
     * except TGA. Using SDL_RWops is not covered here, but they enable you
     * to load from almost any source.
     *
     * <code>
     *  extern SDL_Surface* IMG_Load_RW(SDL_RWops *src, int freesrc);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @param bool $freeSrc
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadRw(CData $src, bool $freeSrc = true): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_Load_RW($src, (int)$freeSrc)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Load an image directly into a render texture.
     *
     * @param CData|RendererPtr $renderer
     * @param string $file
     * @return TexturePtr
     * @throws SDLException
     * @see Image::IMG_Load()
     *
     * <code>
     *  extern SDL_Texture* IMG_LoadTexture(SDL_Renderer *renderer, const char *file);
     * </code>
     *
     */
    public static function loadTexture(CData $renderer, string $file): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RendererPtr $renderer */
        $renderer = self::$ffi->cast('SDL_Renderer*', $renderer);

        if (($result = self::$ffi->IMG_LoadTexture($renderer, $file)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Texture*', $result);
    }

    /**
     * Load an image directly into a render texture.
     *
     * @param CData|RendererPtr $renderer
     * @param CData|RWopsPtr $src
     * @param bool $freeSrc
     * @return TexturePtr
     * @throws SDLException
     * @see Image::IMG_Load_RW()
     *
     * <code>
     *  extern SDL_Texture* IMG_LoadTexture_RW(SDL_Renderer *renderer, SDL_RWops *src, int freesrc);
     * </code>
     *
     */
    public static function loadTextureRw(CData $renderer, CData $src, bool $freeSrc = true): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RendererPtr $renderer */
        $renderer = self::$ffi->cast('SDL_Renderer*', $renderer);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadTexture_RW($renderer, $src, (int)$freeSrc)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Texture*', $result);
    }

    /**
     * Load an image directly into a render texture.
     *
     * @param CData|RendererPtr $renderer
     * @param CData|RWopsPtr $src
     * @param string $type
     * @param bool $freeSrc
     * @return TexturePtr
     * @throws SDLException
     * @see Image::IMG_LoadTyped_RW()
     *
     * <code>
     *  extern SDL_Texture *IMG_LoadTextureTyped_RW(
     *      SDL_Renderer *renderer,
     *      SDL_RWops *src,
     *      int freesrc,
     *      const char *type
     *  );
     * </code>
     *
     */
    public static function loadTextureTypedRw(CData $renderer, CData $src, string $type, bool $freeSrc = true): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RendererPtr $renderer */
        $renderer = self::$ffi->cast('SDL_Renderer*', $renderer);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadTextureTyped_RW($renderer, $src, (int)$freeSrc, $type)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Texture*', $result);
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isICO(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isIco(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isICO($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isCUR(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isCur(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isCUR($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isBMP(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isBmp(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isBMP($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isGIF(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isGif(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isGIF($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isJPG(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isJpg(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isJPG($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isLBM(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isLbm(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isLBM($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isPCX(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isPcx(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isPCX($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isPNG(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isPng(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isPNG($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isPNM(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isPnm(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isPNM($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isSVG(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     * @since 2.0.2
     */
    public static function isSvg(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isSVG($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isTIF(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isTif(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isTIF($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isXCF(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isXcf(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isXCF($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isXPM(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isXpm(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isXPM($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isXV(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isXv(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isXV($src) > 0;
    }

    /**
     * Functions to detect a file type, given a seekable source.
     *
     * <code>
     *  extern int IMG_isWEBP(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return bool
     */
    public static function isWebp(CData $src): bool
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        return self::$ffi->IMG_isWEBP($src) > 0;
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadICO_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadIcoRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadICO_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadCUR_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadCurRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadCUR_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadBMP_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadBmpRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadBMP_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadGIF_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadGifRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadGIF_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadJPG_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadJpgRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadJPG_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadLBM_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadLbmRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadLBM_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadPCX_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadPcxRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadPCX_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadPNG_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadPngRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadPNG_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadPNM_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadPnmRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadPNM_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadSVG_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     * @since 2.0.2
     */
    public static function loadSvgRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadSVG_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadTGA_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadTgaRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadTGA_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadTIF_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadTifRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadTIF_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadXCF_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadXcfRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadXCF_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadXPM_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadXpmRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadXPM_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadXV_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadXvRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadXV_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual loading function
     *
     * <code>
     *  extern SDL_Surface* IMG_LoadWEBP_RW(SDL_RWops *src);
     * </code>
     *
     * @param CData|RWopsPtr $src
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function loadWebpRw(CData $src): CData
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var RWopsPtr $src */
        $src = self::$ffi->cast('SDL_RWops*', $src);

        if (($result = self::$ffi->IMG_LoadWEBP_RW($src)) === null) {
            throw new SDLException(SDL::getError());
        }

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * load xpm as a XPM image for use as a surface, if XPM support is compiled
     * into the SDL_image library.
     *
     * <code>
     *  extern SDL_Surface* IMG_ReadXPMFromArray(char **xpm);
     * </code>
     *
     * @param string|CData|CCharPtrPtr $xpm
     * @return SurfacePtr
     * @throws SDLException
     */
    public static function readXpmFromArray(CData $xpm): CData
    {
        FFILibrary::setDirectory(self::$directory);

        $result = self::$ffi->IMG_ReadXPMFromArray($xpm);

        return SDL::cast('SDL_Surface*', $result);
    }

    /**
     * Individual saving function
     *
     * <code>
     *  extern int IMG_SavePNG(SDL_Surface *surface, const char *file);
     * </code>
     *
     * @param CData|SurfacePtr $surface
     * @param string $file
     * @return void
     */
    public static function savePng(CData $surface, string $file): void
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var SurfacePtr $surface */
        $surface = self::$ffi->cast('SDL_Surface*', $surface);

        if (self::$ffi->IMG_SavePNG($surface, $file) !== 0) {
            throw new SDLException(SDL::getError());
        }
    }

    /**
     * Individual saving function
     *
     * <code>
     *  extern int IMG_SavePNG_RW(SDL_Surface *surface, SDL_RWops *dst, int freedst);
     * </code>
     *
     * @param CData|SurfacePtr $surface
     * @param CData|RWopsPtr $dst
     * @param bool $freeDst
     * @return void
     * @throws SDLException
     */
    public static function savePngRw(CData $surface, CData $dst, bool $freeDst = true): void
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var SurfacePtr $surface */
        $surface = self::$ffi->cast('SDL_Surface*', $surface);

        /** @var RWopsPtr $dst */
        $dst = self::$ffi->cast('SDL_RWops*', $dst);

        if (self::$ffi->IMG_SavePNG_RW($surface, $dst, (int)$freeDst) !== 0) {
            throw new SDLException(SDL::getError());
        }
    }

    /**
     * Individual saving function
     *
     * <code>
     *  extern int IMG_SaveJPG(SDL_Surface *surface, const char *file);
     * </code>
     *
     * @param CData|SurfacePtr $surface
     * @param string $file
     * @param int $quality
     * @return void
     * @since 2.0.2
     */
    public static function saveJpg(CData $surface, string $file, int $quality = 100): void
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var SurfacePtr $surface */
        $surface = self::$ffi->cast('SDL_Surface*', $surface);

        if (self::$ffi->IMG_SaveJPG($surface, $file, $quality) !== 0) {
            throw new SDLException(SDL::getError());
        }
    }

    /**
     * Individual saving function
     *
     * <code>
     *  extern int IMG_SaveJPG_RW(SDL_Surface *surface, SDL_RWops *dst, int freedst, int quality);
     * </code>
     *
     * @param CData|SurfacePtr $surface
     * @param CData|RWopsPtr $dst
     * @param bool $freeDst
     * @param int $quality
     * @return void
     * @since 2.0.2
     */
    public static function saveJpgRw(CData $surface, CData $dst, bool $freeDst = true, int $quality = 100): void
    {
        FFILibrary::setDirectory(self::$directory);

        /** @var SurfacePtr $surface */
        $surface = self::$ffi->cast('SDL_Surface*', $surface);

        /** @var RWopsPtr $dst */
        $dst = self::$ffi->cast('SDL_RWops*', $dst);

        if (self::$ffi->IMG_SaveJPG_RW($surface, $dst, (int)$freeDst, $quality) !== 0) {
            throw new SDLException(SDL::getError());
        }
    }

    /**
     * Image should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \LogicException('Cannot unserialize a static class');
    }

    /**
     * Image should not be cloneable.
     */
    private function __clone()
    {
    }
}
