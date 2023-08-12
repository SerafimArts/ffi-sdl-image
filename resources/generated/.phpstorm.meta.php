<?php

// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for FFI, to provide autocomplete information to your IDE
 * Generated for FFI {@see Serafim\SDL\Image\Image}.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Nesmeyanov Kirill <nesk@xakep.ru>
 * @see https://github.com/php-ffi/ide-helper-generator
 *
 * @psalm-suppress all
 */

declare (strict_types=1);
namespace PHPSTORM_META {
    registerArgumentsSet(
        // ffi_sdl_image_types_list
        'ffi_sdl_image_types_list',
        'void*',
        'bool',
        'float',
        'double',
        'char',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        'Uint8',
        'SDL_version',
        'SDL_version*',
        'SDL_version**',
        'IMG_InitFlags',
        'IMG_Animation',
        'IMG_Animation*',
        'IMG_Animation**',
    );
    expectedArguments(\Serafim\SDL\Image\Image::new(), 0, argumentsSet('ffi_sdl_image_types_list'));
    expectedArguments(\Serafim\SDL\Image\Image::cast(), 0, argumentsSet('ffi_sdl_image_types_list'));
    expectedArguments(\Serafim\SDL\Image\Image::type(), 0, argumentsSet('ffi_sdl_image_types_list'));
    override(\Serafim\SDL\Image\Image::new(0), map([
        // List of return type coercions
        '' => '\PHPSTORM_META\@',
        'SDL_version' => '\PHPSTORM_META\SDLVersion',
        'SDL_version*' => '\PHPSTORM_META\SDLVersion[]',
        'SDL_version**' => '\PHPSTORM_META\SDLVersion[]',
        'SDL_version**' => '\PHPSTORM_META\SDLVersion[][]',
        'SDL_Surface' => '\PHPSTORM_META\SDLSurface',
        'SDL_Surface*' => '\PHPSTORM_META\SDLSurface[]',
        'SDL_Surface**' => '\PHPSTORM_META\SDLSurface[]',
        'SDL_Surface**' => '\PHPSTORM_META\SDLSurface[][]',
        'SDL_RWops' => '\PHPSTORM_META\SDLRWops',
        'SDL_RWops*' => '\PHPSTORM_META\SDLRWops[]',
        'SDL_RWops**' => '\PHPSTORM_META\SDLRWops[]',
        'SDL_RWops**' => '\PHPSTORM_META\SDLRWops[][]',
        'SDL_Texture' => '\PHPSTORM_META\SDLTexture',
        'SDL_Texture*' => '\PHPSTORM_META\SDLTexture[]',
        'SDL_Texture**' => '\PHPSTORM_META\SDLTexture[]',
        'SDL_Texture**' => '\PHPSTORM_META\SDLTexture[][]',
        'SDL_Renderer' => '\PHPSTORM_META\SDLRenderer',
        'SDL_Renderer*' => '\PHPSTORM_META\SDLRenderer[]',
        'SDL_Renderer**' => '\PHPSTORM_META\SDLRenderer[]',
        'SDL_Renderer**' => '\PHPSTORM_META\SDLRenderer[][]',
        'IMG_Animation' => '\PHPSTORM_META\IMGAnimation',
        'IMG_Animation*' => '\PHPSTORM_META\IMGAnimation[]',
        'IMG_Animation**' => '\PHPSTORM_META\IMGAnimation[]',
        'IMG_Animation**' => '\PHPSTORM_META\IMGAnimation[][]',
    ]));
    /**
     * Generated "SDL_version" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class SDLVersion extends \FFI\CData
    {
        /**
         * @var int<0, 255>
         */
        public int $major;
        /**
         * @var int<0, 255>
         */
        public int $minor;
        /**
         * @var int<0, 255>
         */
        public int $patch;
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'SDL_version' argument instead.
         */
        private function __construct()
        {
        }
    }
    /**
     * Generated "SDL_Surface" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class SDLSurface extends \FFI\CData
    {
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'SDL_Surface' argument instead.
         */
        private function __construct()
        {
        }
    }
    /**
     * Generated "SDL_RWops" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class SDLRWops extends \FFI\CData
    {
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'SDL_RWops' argument instead.
         */
        private function __construct()
        {
        }
    }
    /**
     * Generated "SDL_Texture" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class SDLTexture extends \FFI\CData
    {
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'SDL_Texture' argument instead.
         */
        private function __construct()
        {
        }
    }
    /**
     * Generated "SDL_Renderer" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class SDLRenderer extends \FFI\CData
    {
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'SDL_Renderer' argument instead.
         */
        private function __construct()
        {
        }
    }
    /**
     * Generated "IMG_Animation" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class IMGAnimation extends \FFI\CData
    {
        /**
         * @var int<-2147483648, 2147483647>
         */
        public int $w;
        /**
         * @var int<-2147483648, 2147483647>
         */
        public int $h;
        /**
         * @var int<-2147483648, 2147483647>
         */
        public int $count;
        /**
         * @var null|\FFI\CData|array{null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}}
         */
        public ?\FFI\CData $frames;
        /**
         * @var null|\FFI\CData|object{cdata:int<-2147483648, 2147483647>}
         */
        public ?\FFI\CData $delays;
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'IMG_Animation' argument instead.
         */
        private function __construct()
        {
        }
    }
    registerArgumentsSet(
        // ffi_sdl_image_img_initflags
        'ffi_sdl_image_img_initflags',
        \Serafim\SDL\Image\InitFlags::IMG_INIT_JPG,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_PNG,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_TIF,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_WEBP,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_JXL,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_AVIF
    );
}
namespace Serafim\SDL\Image {
    interface Image
    {
        /**
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLVersion}
         */
        public function IMG_Linked_Version(): ?\FFI\CData;
        /**
         * @param int<-2147483648, 2147483647> $flags
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_Init(int $flags): int;
        public function IMG_Quit(): void;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadTyped_RW(?\FFI\CData $src, int $freesrc, string|\FFI\CData $type): ?\FFI\CData;
        /**
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_Load(string|\FFI\CData $file): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_Load_RW(?\FFI\CData $src, int $freesrc): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRenderer} $renderer
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLTexture}
         */
        public function IMG_LoadTexture(?\FFI\CData $renderer, string|\FFI\CData $file): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRenderer} $renderer
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLTexture}
         */
        public function IMG_LoadTexture_RW(?\FFI\CData $renderer, ?\FFI\CData $src, int $freesrc): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRenderer} $renderer
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLTexture}
         */
        public function IMG_LoadTextureTyped_RW(?\FFI\CData $renderer, ?\FFI\CData $src, int $freesrc, string|\FFI\CData $type): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isAVIF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isICO(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isCUR(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isBMP(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isGIF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isJPG(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isJXL(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isLBM(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isPCX(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isPNG(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isPNM(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isSVG(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isQOI(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isTIF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isXCF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isXPM(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isXV(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isWEBP(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadAVIF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadICO_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadCUR_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadBMP_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadGIF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadJPG_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadJXL_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadLBM_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadPCX_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadPNG_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadPNM_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadSVG_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadQOI_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadTGA_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadTIF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadXCF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadXPM_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadXV_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadWEBP_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $width
         * @param int<-2147483648, 2147483647> $height
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_LoadSizedSVG_RW(?\FFI\CData $src, int $width, int $height): ?\FFI\CData;
        /**
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_ReadXPMFromArray(?\FFI\CData $xpm): ?\FFI\CData;
        /**
         * @return null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}
         */
        public function IMG_ReadXPMFromArrayToRGB888(?\FFI\CData $xpm): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLSurface} $surface
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SavePNG(?\FFI\CData $surface, string|\FFI\CData $file): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLSurface} $surface
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $dst
         * @param int<-2147483648, 2147483647> $freedst
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SavePNG_RW(?\FFI\CData $surface, ?\FFI\CData $dst, int $freedst): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLSurface} $surface
         * @param int<-2147483648, 2147483647> $quality
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SaveJPG(?\FFI\CData $surface, string|\FFI\CData $file, int $quality): int;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLSurface} $surface
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $dst
         * @param int<-2147483648, 2147483647> $freedst
         * @param int<-2147483648, 2147483647> $quality
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SaveJPG_RW(?\FFI\CData $surface, ?\FFI\CData $dst, int $freedst, int $quality): int;
        /**
         * @return null|\FFI\CData|array{\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData|array{null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}}, delays:null|\FFI\CData|object{cdata:int<-2147483648, 2147483647>}}}
         */
        public function IMG_LoadAnimation(string|\FFI\CData $file): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData|array{\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData|array{null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}}, delays:null|\FFI\CData|object{cdata:int<-2147483648, 2147483647>}}}
         */
        public function IMG_LoadAnimation_RW(?\FFI\CData $src, int $freesrc): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData|array{\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData|array{null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}}, delays:null|\FFI\CData|object{cdata:int<-2147483648, 2147483647>}}}
         */
        public function IMG_LoadAnimationTyped_RW(?\FFI\CData $src, int $freesrc, string|\FFI\CData $type): ?\FFI\CData;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData|array{null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}}, delays:null|\FFI\CData|object{cdata:int<-2147483648, 2147483647>}}} $anim
         */
        public function IMG_FreeAnimation(?\FFI\CData $anim): void;
        /**
         * @param null|\FFI\CData|array{\PHPSTORM_META\SDLRWops} $src
         * @return null|\FFI\CData|array{\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData|array{null|\FFI\CData|array{\PHPSTORM_META\SDLSurface}}, delays:null|\FFI\CData|object{cdata:int<-2147483648, 2147483647>}}}
         */
        public function IMG_LoadGIFAnimation_RW(?\FFI\CData $src): ?\FFI\CData;
    }
}