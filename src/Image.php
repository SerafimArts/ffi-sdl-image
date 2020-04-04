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

namespace SDL\Image;

use FFI\CCharPtrPtr;
use FFI\CData;
use SDL\Exception\SDLException;
use SDL\Loader\LibraryInformation;
use SDL\Loader\LibraryLoader;
use SDL\RendererPtr;
use SDL\RWopsPtr;
use SDL\SDL;
use SDL\SDLNativeApiAutocomplete;
use SDL\Support\ProxyTrait;
use SDL\Support\SingletonTrait;
use SDL\Support\VersionComparisonTrait;
use SDL\SurfacePtr;
use SDL\TexturePtr;
use SDL\Version;

/**
 * Class Image
 */
final class Image implements InitFlags, ImageType
{
    use ProxyTrait;
    use SingletonTrait;
    use VersionComparisonTrait;

    /**
     * @var LibraryInformation
     */
    public LibraryInformation $info;

    /**
     * @var \FFI|ImageNativeApiAutocomplete
     */
    protected \FFI $ffi;

    /**
     * @var SDL|SDLNativeApiAutocomplete
     */
    private SDL $sdl;

    /**
     * Image constructor.
     */
    public function __construct()
    {
        $this->sdl = SDL::getInstance();

        $loader = new LibraryLoader(__DIR__ . '/../out');
        $loader->define('__sdl_version__', $this->sdl->info->version);

        $this->info = $loader->load(new Library());
        $this->ffi = $this->info->ffi;
    }

    /**
     * @return LibraryInformation
     */
    protected function getLibraryInformation(): LibraryInformation
    {
        return $this->info;
    }

    /**
     * Loads dynamic libraries and prepares them for use.
     * Flags should be one or more flags from IMG_InitFlags OR'd together.
     *
     * <code>
     *  extern int IMG_Init(int flags);
     * </code>
     *
     * @param int|InitFlags $flags
     * @return void
     * @throws SDLException
     */
    public function init(int $flags): void
    {
        $this->info->chdir(function () use ($flags): void {
            if ($this->ffi->IMG_Init($flags) === 0) {
                throw new SDLException($this->sdl->SDL_GetError());
            }
        });
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
    public function linkedVersion(): CData
    {
        return $this->info->chdir(function (): CData {
            $result = $this->ffi->IMG_Linked_Version();

            return $this->sdl->cast('SDL_Version*', $result);
        });
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
    public function quit(): void
    {
        $this->ffi->IMG_Quit();
    }

    /**
     * Load an image from an SDL data source.
     * The 'type' may be one of: "BMP", "GIF", "PNG", etc
     *
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
     * @param CData|RWopsPtr $src
     * @param bool $freeSrc
     * @param string $type
     * @return SurfacePtr
     * @throws SDLException
     */
    public function loadTypedRw(CData $src, string $type, bool $freeSrc = true): CData
    {
        return $this->info->chdir(function () use ($src, $type, $freeSrc): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadTyped_RW($src, (int)$freeSrc, $type)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function load(string $file): CData
    {
        return $this->info->chdir(function () use ($file): CData {
            if (($result = $this->ffi->IMG_Load($file)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadRw(CData $src, bool $freeSrc = true): CData
    {
        return $this->info->chdir(function () use ($src, $freeSrc): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_Load_RW($src, (int)$freeSrc)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
    }

    /**
     * Load an image directly into a render texture.
     *
     * @see Image::IMG_Load()
     *
     * <code>
     *  extern SDL_Texture* IMG_LoadTexture(SDL_Renderer *renderer, const char *file);
     * </code>
     *
     * @param CData|RendererPtr $renderer
     * @param string $file
     * @return TexturePtr
     * @throws SDLException
     */
    public function loadTexture(CData $renderer, string $file): CData
    {
        return $this->info->chdir(function () use ($renderer, $file): CData {
            /** @var RendererPtr $renderer */
            $renderer = $this->ffi->cast('SDL_Renderer*', $renderer);

            if (($result = $this->ffi->IMG_LoadTexture($renderer, $file)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Texture*', $result);
        });
    }

    /**
     * Load an image directly into a render texture.
     *
     * @see Image::IMG_Load_RW()
     *
     * <code>
     *  extern SDL_Texture* IMG_LoadTexture_RW(SDL_Renderer *renderer, SDL_RWops *src, int freesrc);
     * </code>
     *
     * @param CData|RendererPtr $renderer
     * @param CData|RWopsPtr $src
     * @param bool $freeSrc
     * @return TexturePtr
     * @throws SDLException
     */
    public function loadTextureRw(CData $renderer, CData $src, bool $freeSrc = true): CData
    {
        return $this->info->chdir(function () use ($renderer, $src, $freeSrc): CData {
            /** @var RendererPtr $renderer */
            $renderer = $this->ffi->cast('SDL_Renderer*', $renderer);

            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadTexture_RW($renderer, $src, (int)$freeSrc)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Texture*', $result);
        });
    }

    /**
     * Load an image directly into a render texture.
     *
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
     * @param CData|RendererPtr $renderer
     * @param CData|RWopsPtr $src
     * @param string $type
     * @param bool $freeSrc
     * @return TexturePtr
     * @throws SDLException
     */
    public function loadTextureTypedRw(CData $renderer, CData $src, string $type, bool $freeSrc = true): CData
    {
        return $this->info->chdir(function () use ($renderer, $src, $type, $freeSrc): CData {
            /** @var RendererPtr $renderer */
            $renderer = $this->ffi->cast('SDL_Renderer*', $renderer);

            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadTextureTyped_RW($renderer, $src, (int)$freeSrc, $type)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Texture*', $result);
        });
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
    public function isIco(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isICO($src) > 0;
        });
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
    public function isCur(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isCUR($src) > 0;
        });
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
    public function isBmp(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isBMP($src) > 0;
        });
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
    public function isGif(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isGIF($src) > 0;
        });
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
    public function isJpg(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isJPG($src) > 0;
        });
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
    public function isLbm(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isLBM($src) > 0;
        });
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
    public function isPcx(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isPCX($src) > 0;
        });
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
    public function isPng(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isPNG($src) > 0;
        });
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
    public function isPnm(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isPNM($src) > 0;
        });
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
     * @since SDL Image 2.0.2
     */
    public function isSvg(CData $src): bool
    {
        $this->assertVersion('2.0.2');

        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isSVG($src) > 0;
        });
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
    public function isTif(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isTIF($src) > 0;
        });
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
    public function isXcf(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isXCF($src) > 0;
        });
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
    public function isXpm(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isXPM($src) > 0;
        });
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
    public function isXv(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isXV($src) > 0;
        });
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
    public function isWebp(CData $src): bool
    {
        return $this->info->chdir(function () use ($src): bool {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            return $this->ffi->IMG_isWEBP($src) > 0;
        });
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
    public function loadIcoRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadICO_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadCurRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadCUR_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadBmpRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadBMP_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadGifRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadGIF_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadJpgRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadJPG_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadLbmRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadLBM_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadPcxRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadPCX_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadPngRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadPNG_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadPnmRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadPNM_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
     * @since SDL Image 2.0.2
     */
    public function loadSvgRw(CData $src): CData
    {
        $this->assertVersion('2.0.2');

        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadSVG_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadTgaRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadTGA_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadTifRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadTIF_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadXcfRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadXCF_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadXpmRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadXPM_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadXvRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadXV_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function loadWebpRw(CData $src): CData
    {
        return $this->info->chdir(function () use ($src): CData {
            /** @var RWopsPtr $src */
            $src = $this->ffi->cast('SDL_RWops*', $src);

            if (($result = $this->ffi->IMG_LoadWEBP_RW($src)) === null) {
                throw new SDLException($this->sdl->SDL_GetError());
            }

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function readXpmFromArray(CData $xpm): CData
    {
        return $this->info->chdir(function () use ($xpm): CData {
            $result = $this->ffi->IMG_ReadXPMFromArray($xpm);

            return $this->sdl->cast('SDL_Surface*', $result);
        });
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
    public function savePng(CData $surface, string $file): void
    {
        $this->info->chdir(function () use ($surface, $file): void {
            /** @var SurfacePtr $surface */
            $surface = $this->ffi->cast('SDL_Surface*', $surface);

            if ($this->ffi->IMG_SavePNG($surface, $file) !== 0) {
                throw new SDLException($this->sdl->SDL_GetError());
            }
        });
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
    public function savePngRw(CData $surface, CData $dst, bool $freeDst = true): void
    {
        $this->info->chdir(function () use ($surface, $dst, $freeDst): void {
            /** @var SurfacePtr $surface */
            $surface = $this->ffi->cast('SDL_Surface*', $surface);

            /** @var RWopsPtr $dst */
            $dst = $this->ffi->cast('SDL_RWops*', $dst);

            if ($this->ffi->IMG_SavePNG_RW($surface, $dst, (int)$freeDst) !== 0) {
                throw new SDLException($this->sdl->SDL_GetError());
            }
        });
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
     * @since SDL Image 2.0.2
     */
    public function saveJpg(CData $surface, string $file, int $quality = 100): void
    {
        $this->assertVersion('2.0.2');

        $this->info->chdir(function () use ($surface, $file, $quality): void {
            /** @var SurfacePtr $surface */
            $surface = $this->ffi->cast('SDL_Surface*', $surface);

            if ($this->ffi->IMG_SaveJPG($surface, $file, $quality) !== 0) {
                throw new SDLException($this->sdl->SDL_GetError());
            }
        });
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
     * @since SDL Image 2.0.2
     */
    public function saveJpgRw(CData $surface, CData $dst, bool $freeDst = true, int $quality = 100): void
    {
        $this->assertVersion('2.0.2');

        $this->info->chdir(function () use ($surface, $dst, $freeDst, $quality): void {
            /** @var SurfacePtr $surface */
            $surface = $this->ffi->cast('SDL_Surface*', $surface);

            /** @var RWopsPtr $dst */
            $dst = $this->ffi->cast('SDL_RWops*', $dst);

            if ($this->ffi->IMG_SaveJPG_RW($surface, $dst, (int)$freeDst, $quality) !== 0) {
                throw new SDLException($this->sdl->SDL_GetError());
            }
        });
    }
}
