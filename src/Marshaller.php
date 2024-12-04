<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\CData;

/**
 * @internal this is an internal library trait, please do not use it in your code
 * @psalm-internal Serafim\SDL\Image
 *
 * @mixin Image
 *
 * @property-read object $ffi
 */
trait Marshaller
{
    public function IMG_Init(int $flags): int
    {
        $this->useImageBinariesDirectory();

        return $this->ffi->IMG_Init($flags);
    }

    public function IMG_Linked_Version(): ?CData
    {
        $result = $this->ffi->IMG_Linked_Version();

        return $result !== null ? $this->sdl->cast('SDL_version*', $result) : null;
    }

    public function IMG_LoadTyped_RW(?CData $src, int $freesrc, string|CData $type): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadTyped_RW(
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $freesrc,
            $type,
        );

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_Load(string|CData $file): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_Load($file);

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_Load_RW(?CData $src, int $freesrc): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_Load_RW(
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $freesrc,
        );

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadTexture(?CData $renderer, string|CData $file): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadTexture(
            $renderer === null ? null : $this->cast('SDL_Renderer*', $renderer),
            $file,
        );

        return $result !== null ? $this->sdl->cast('SDL_Texture*', $result) : null;
    }

    public function IMG_LoadTexture_RW(?CData $renderer, ?CData $src, int $freesrc): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadTexture_RW(
            $renderer === null ? null : $this->cast('SDL_Renderer*', $renderer),
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $freesrc,
        );

        return $result !== null ? $this->sdl->cast('SDL_Texture*', $result) : null;
    }

    public function IMG_LoadTextureTyped_RW(?CData $renderer, ?CData $src, int $freesrc, string|CData $type): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadTextureTyped_RW(
            $renderer === null ? null : $this->cast('SDL_Renderer*', $renderer),
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $freesrc,
            $type,
        );

        return $result !== null ? $this->sdl->cast('SDL_Texture*', $result) : null;
    }

    public function IMG_isAVIF(?CData $src): int
    {
        return $this->ffi->IMG_isAVIF($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isICO(?CData $src): int
    {
        return $this->ffi->IMG_isICO($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isCUR(?CData $src): int
    {
        return $this->ffi->IMG_isCUR($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isBMP(?CData $src): int
    {
        return $this->ffi->IMG_isBMP($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isGIF(?CData $src): int
    {
        return $this->ffi->IMG_isGIF($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isJPG(?CData $src): int
    {
        return $this->ffi->IMG_isJPG($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isJXL(?CData $src): int
    {
        return $this->ffi->IMG_isJXL($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isLBM(?CData $src): int
    {
        return $this->ffi->IMG_isLBM($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isPCX(?CData $src): int
    {
        return $this->ffi->IMG_isPCX($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isPNG(?CData $src): int
    {
        return $this->ffi->IMG_isPNG($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isPNM(?CData $src): int
    {
        return $this->ffi->IMG_isPNM($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isSVG(?CData $src): int
    {
        return $this->ffi->IMG_isSVG($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isQOI(?CData $src): int
    {
        return $this->ffi->IMG_isQOI($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isTIF(?CData $src): int
    {
        return $this->ffi->IMG_isTIF($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isXCF(?CData $src): int
    {
        return $this->ffi->IMG_isXCF($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isXPM(?CData $src): int
    {
        return $this->ffi->IMG_isXPM($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isXV(?CData $src): int
    {
        return $this->ffi->IMG_isXV($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_isWEBP(?CData $src): int
    {
        return $this->ffi->IMG_isWEBP($src === null ? null : $this->cast('SDL_RWops*', $src));
    }

    public function IMG_LoadAVIF_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadAVIF_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadICO_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadICO_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadCUR_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadCUR_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadBMP_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadBMP_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadGIF_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadGIF_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadJPG_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadJPG_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadJXL_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadJXL_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadLBM_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadLBM_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadPCX_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadPCX_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadPNG_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadPNG_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadPNM_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadPNM_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadSVG_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadSVG_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadQOI_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadQOI_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadTGA_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadTGA_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadTIF_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadTIF_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadXCF_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadXCF_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadXPM_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadXPM_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadXV_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadXV_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadWEBP_RW(?CData $src): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadWEBP_RW($src === null ? null : $this->cast('SDL_RWops*', $src));

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_LoadSizedSVG_RW(?CData $src, int $width, int $height): ?CData
    {
        $this->useImageBinariesDirectory();

        $result = $this->ffi->IMG_LoadSizedSVG_RW(
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $width,
            $height,
        );

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_ReadXPMFromArray(?CData $xpm): ?CData
    {
        $result = $this->ffi->IMG_ReadXPMFromArray($xpm);

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_ReadXPMFromArrayToRGB888(?CData $xpm): ?CData
    {
        $result = $this->ffi->IMG_ReadXPMFromArrayToRGB888($xpm);

        return $result !== null ? $this->sdl->cast('SDL_Surface*', $result) : null;
    }

    public function IMG_SavePNG(?CData $surface, string|CData $file): int
    {
        $this->useImageBinariesDirectory();

        return $this->ffi->IMG_SavePNG(
            $surface === null ? null : $this->cast('SDL_Surface*', $surface),
            $file,
        );
    }

    public function IMG_SavePNG_RW(?CData $surface, ?CData $dst, int $freedst): int
    {
        $this->useImageBinariesDirectory();

        return $this->ffi->IMG_SavePNG_RW(
            $surface === null ? null : $this->cast('SDL_Surface*', $surface),
            $dst === null ? null : $this->cast('SDL_RWops*', $dst),
            $freedst,
        );
    }

    public function IMG_SaveJPG(?CData $surface, string|CData $file, int $quality): int
    {
        $this->useImageBinariesDirectory();

        return $this->ffi->IMG_SaveJPG(
            $surface === null ? null : $this->cast('SDL_Surface*', $surface),
            $file,
            $quality,
        );
    }

    public function IMG_SaveJPG_RW(?CData $surface, ?CData $dst, int $freedst, int $quality): int
    {
        $this->useImageBinariesDirectory();

        return $this->ffi->IMG_SaveJPG_RW(
            $surface === null ? null : $this->cast('SDL_Surface*', $surface),
            $dst === null ? null : $this->cast('SDL_RWops*', $dst),
            $freedst,
            $quality,
        );
    }

    public function IMG_LoadAnimation_RW(?CData $src, int $freesrc): ?CData
    {
        return $this->ffi->IMG_LoadAnimation_RW(
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $freesrc,
        );
    }

    public function IMG_LoadAnimationTyped_RW(?CData $src, int $freesrc, string|CData $type): ?CData
    {
        return $this->ffi->IMG_LoadAnimationTyped_RW(
            $src === null ? null : $this->cast('SDL_RWops*', $src),
            $freesrc,
            $type,
        );
    }

    public function IMG_LoadGIFAnimation_RW(?CData $src): ?CData
    {
        return $this->ffi->IMG_LoadGIFAnimation_RW(
            $src === null ? null : $this->cast('SDL_RWops*', $src),
        );
    }
}
