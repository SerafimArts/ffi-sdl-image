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
        // List of "IMG_InitFlags" enum cases
        'ffi_sdl_image_img_initflags',
        \Serafim\SDL\Image\InitFlags::IMG_INIT_JPG,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_PNG,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_TIF,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_WEBP,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_JXL,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_AVIF
    );
    registerArgumentsSet(
        // List of available FFI type names
        'ffi_sdl_image_types_list',
        'void *',
        'bool',
        'float',
        'double',
        'long double',
        'char',
        'signed char',
        'unsigned char',
        'short',
        'short int',
        'signed short',
        'signed short int',
        'unsigned short',
        'unsigned short int',
        'int',
        'signed int',
        'unsigned int',
        'long',
        'long int',
        'signed long',
        'signed long int',
        'unsigned long',
        'unsigned long int',
        'long long',
        'long long int',
        'signed long long',
        'signed long long int',
        'unsigned long long',
        'unsigned long long int',
        'intptr_t',
        'uintptr_t',
        'size_t',
        'ssize_t',
        'ptrdiff_t',
        'off_t',
        'va_list',
        '__builtin_va_list',
        '__gnuc_va_list',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        '__NSConstantString',
        '__NSConstantString*',
        '__NSConstantString**',
        '__NSConstantString_tag',
        'SDL_version',
        'SDL_version*',
        'SDL_version**',
        'SDL_Surface',
        'SDL_Surface*',
        'SDL_Surface**',
        'SDL_RWops',
        'SDL_RWops*',
        'SDL_RWops**',
        'SDL_Texture',
        'SDL_Texture*',
        'SDL_Texture**',
        'SDL_Renderer',
        'SDL_Renderer*',
        'SDL_Renderer**'
    );
    expectedArguments(\Serafim\SDL\Image\Image::new(), 0, argumentsSet('ffi_sdl_image_types_list'));
    expectedArguments(\Serafim\SDL\Image\Image::cast(), 0, argumentsSet('ffi_sdl_image_types_list'));
    expectedArguments(\Serafim\SDL\Image\Image::type(), 0, argumentsSet('ffi_sdl_image_types_list'));
    override(\Serafim\SDL\Image\Image::new(), map([
        // structures autocompletion
        '' => '\PHPSTORM_META\@',
        '__NSConstantString' => '\PHPSTORM_META\NSConstantString',
        '__NSConstantString*' => '\PHPSTORM_META\NSConstantString[]',
        '__NSConstantString*' => '\PHPSTORM_META\NSConstantString',
        '__NSConstantString**' => '\PHPSTORM_META\NSConstantString[][]',
        '__NSConstantString**' => '\PHPSTORM_META\NSConstantString[]',
        '__NSConstantString**' => '\PHPSTORM_META\NSConstantString',
        'SDL_version' => '\PHPSTORM_META\SDLVersion',
        'SDL_version*' => '\PHPSTORM_META\SDLVersion[]',
        'SDL_version*' => '\PHPSTORM_META\SDLVersion',
        'SDL_version**' => '\PHPSTORM_META\SDLVersion[][]',
        'SDL_version**' => '\PHPSTORM_META\SDLVersion[]',
        'SDL_version**' => '\PHPSTORM_META\SDLVersion',
        'SDL_Surface' => '\PHPSTORM_META\SDLSurface',
        'SDL_Surface*' => '\PHPSTORM_META\SDLSurface[]',
        'SDL_Surface*' => '\PHPSTORM_META\SDLSurface',
        'SDL_Surface**' => '\PHPSTORM_META\SDLSurface[][]',
        'SDL_Surface**' => '\PHPSTORM_META\SDLSurface[]',
        'SDL_Surface**' => '\PHPSTORM_META\SDLSurface',
        'SDL_RWops' => '\PHPSTORM_META\SDLRWops',
        'SDL_RWops*' => '\PHPSTORM_META\SDLRWops[]',
        'SDL_RWops*' => '\PHPSTORM_META\SDLRWops',
        'SDL_RWops**' => '\PHPSTORM_META\SDLRWops[][]',
        'SDL_RWops**' => '\PHPSTORM_META\SDLRWops[]',
        'SDL_RWops**' => '\PHPSTORM_META\SDLRWops',
        'SDL_Texture' => '\PHPSTORM_META\SDLTexture',
        'SDL_Texture*' => '\PHPSTORM_META\SDLTexture[]',
        'SDL_Texture*' => '\PHPSTORM_META\SDLTexture',
        'SDL_Texture**' => '\PHPSTORM_META\SDLTexture[][]',
        'SDL_Texture**' => '\PHPSTORM_META\SDLTexture[]',
        'SDL_Texture**' => '\PHPSTORM_META\SDLTexture',
        'SDL_Renderer' => '\PHPSTORM_META\SDLRenderer',
        'SDL_Renderer*' => '\PHPSTORM_META\SDLRenderer[]',
        'SDL_Renderer*' => '\PHPSTORM_META\SDLRenderer',
        'SDL_Renderer**' => '\PHPSTORM_META\SDLRenderer[][]',
        'SDL_Renderer**' => '\PHPSTORM_META\SDLRenderer[]',
        'SDL_Renderer**' => '\PHPSTORM_META\SDLRenderer',
        'IMG_Animation' => '\PHPSTORM_META\IMGAnimation',
        'IMG_Animation*' => '\PHPSTORM_META\IMGAnimation[]',
        'IMG_Animation*' => '\PHPSTORM_META\IMGAnimation',
        'IMG_Animation**' => '\PHPSTORM_META\IMGAnimation[][]',
        'IMG_Animation**' => '\PHPSTORM_META\IMGAnimation[]',
        'IMG_Animation**' => '\PHPSTORM_META\IMGAnimation',
    ]));
    /**
     * Generated "__NSConstantString" structure layout.
     *
     * @ignore
     * @internal Internal interface to ensure precise type inference.
     */
    final class NSConstantString extends \FFI\CData
    {
        /**
         * @var null|\FFI\CData<int<-2147483648, 2147483647>>
         */
        public ?\FFI\CData $isa;
        /**
         * @var int<-2147483648, 2147483647>
         */
        public int $flags;
        public string|\FFI\CData $str;
        /**
         * @var int<min, max>
         */
        public int $length;
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with '__NSConstantString' argument instead.
         */
        private function __construct()
        {
        }
    }
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
         * @var null|\FFI\CData<null|\FFI\CData<\PHPSTORM_META\SDLSurface>>
         */
        public ?\FFI\CData $frames;
        /**
         * @var null|\FFI\CData<int<-2147483648, 2147483647>>
         */
        public ?\FFI\CData $delays;
        /**
         * @internal Please use {@see \Serafim\SDL\Image\Image::new()} with 'IMG_Animation' argument instead.
         */
        private function __construct()
        {
        }
    }
}
namespace Serafim\SDL\Image {
    interface Image
    {
        /**
         * @return null|\FFI\CData<\PHPSTORM_META\SDLVersion>
         */
        public function IMG_Linked_Version(): ?\FFI\CData;
        /**
         * @param int<-2147483648, 2147483647> $flags
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_Init(int $flags): int;
        public function IMG_Quit(): void;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadTyped_RW(?\FFI\CData $src, int $freesrc, string|\FFI\CData $type): ?\FFI\CData;
        /**
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_Load(string|\FFI\CData $file): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_Load_RW(?\FFI\CData $src, int $freesrc): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRenderer> $renderer
         * @return null|\FFI\CData<\PHPSTORM_META\SDLTexture>
         */
        public function IMG_LoadTexture(?\FFI\CData $renderer, string|\FFI\CData $file): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRenderer> $renderer
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData<\PHPSTORM_META\SDLTexture>
         */
        public function IMG_LoadTexture_RW(?\FFI\CData $renderer, ?\FFI\CData $src, int $freesrc): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRenderer> $renderer
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData<\PHPSTORM_META\SDLTexture>
         */
        public function IMG_LoadTextureTyped_RW(?\FFI\CData $renderer, ?\FFI\CData $src, int $freesrc, string|\FFI\CData $type): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isAVIF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isICO(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isCUR(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isBMP(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isGIF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isJPG(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isJXL(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isLBM(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isPCX(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isPNG(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isPNM(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isSVG(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isQOI(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isTIF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isXCF(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isXPM(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isXV(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_isWEBP(?\FFI\CData $src): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadAVIF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadICO_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadCUR_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadBMP_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadGIF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadJPG_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadJXL_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadLBM_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadPCX_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadPNG_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadPNM_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadSVG_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadQOI_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadTGA_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadTIF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadXCF_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadXPM_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadXV_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadWEBP_RW(?\FFI\CData $src): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $width
         * @param int<-2147483648, 2147483647> $height
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_LoadSizedSVG_RW(?\FFI\CData $src, int $width, int $height): ?\FFI\CData;
        /**
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_ReadXPMFromArray(?\FFI\CData $xpm): ?\FFI\CData;
        /**
         * @return null|\FFI\CData<\PHPSTORM_META\SDLSurface>
         */
        public function IMG_ReadXPMFromArrayToRGB888(?\FFI\CData $xpm): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLSurface> $surface
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SavePNG(?\FFI\CData $surface, string|\FFI\CData $file): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLSurface> $surface
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $dst
         * @param int<-2147483648, 2147483647> $freedst
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SavePNG_RW(?\FFI\CData $surface, ?\FFI\CData $dst, int $freedst): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLSurface> $surface
         * @param int<-2147483648, 2147483647> $quality
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SaveJPG(?\FFI\CData $surface, string|\FFI\CData $file, int $quality): int;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLSurface> $surface
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $dst
         * @param int<-2147483648, 2147483647> $freedst
         * @param int<-2147483648, 2147483647> $quality
         * @return int<-2147483648, 2147483647>
         */
        public function IMG_SaveJPG_RW(?\FFI\CData $surface, ?\FFI\CData $dst, int $freedst, int $quality): int;
        /**
         * @return null|\FFI\CData<\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData<null|\FFI\CData<\PHPSTORM_META\SDLSurface>>, delays:null|\FFI\CData<int<-2147483648, 2147483647>>}>
         */
        public function IMG_LoadAnimation(string|\FFI\CData $file): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData<\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData<null|\FFI\CData<\PHPSTORM_META\SDLSurface>>, delays:null|\FFI\CData<int<-2147483648, 2147483647>>}>
         */
        public function IMG_LoadAnimation_RW(?\FFI\CData $src, int $freesrc): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @param int<-2147483648, 2147483647> $freesrc
         * @return null|\FFI\CData<\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData<null|\FFI\CData<\PHPSTORM_META\SDLSurface>>, delays:null|\FFI\CData<int<-2147483648, 2147483647>>}>
         */
        public function IMG_LoadAnimationTyped_RW(?\FFI\CData $src, int $freesrc, string|\FFI\CData $type): ?\FFI\CData;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData<null|\FFI\CData<\PHPSTORM_META\SDLSurface>>, delays:null|\FFI\CData<int<-2147483648, 2147483647>>}> $anim
         */
        public function IMG_FreeAnimation(?\FFI\CData $anim): void;
        /**
         * @param null|\FFI\CData<\PHPSTORM_META\SDLRWops> $src
         * @return null|\FFI\CData<\PHPSTORM_META\IMGAnimation|null|object{w:int<-2147483648, 2147483647>, h:int<-2147483648, 2147483647>, count:int<-2147483648, 2147483647>, frames:null|\FFI\CData<null|\FFI\CData<\PHPSTORM_META\SDLSurface>>, delays:null|\FFI\CData<int<-2147483648, 2147483647>>}>
         */
        public function IMG_LoadGIFAnimation_RW(?\FFI\CData $src): ?\FFI\CData;
    }
}