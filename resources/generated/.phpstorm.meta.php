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
        '__NSConstantString_tag'
    );
    expectedArguments(\Serafim\SDL\Image\Image::new(), 0, argumentsSet('ffi_sdl_image_types_list'));
    expectedArguments(\Serafim\SDL\Image\Image::type(), 0, argumentsSet('ffi_sdl_image_types_list'));
    override(\Serafim\SDL\Image\Image::new(), map([
        // structures autocompletion
        '' => '\PHPSTORM_META\@',
        '__NSConstantString' => '\PHPSTORM_META\NSConstantString',
        'max_align_t' => '\PHPSTORM_META\MaxAlignT',
        '__fsid_t' => '\PHPSTORM_META\FsidT',
        'SDL_AssertData' => '\PHPSTORM_META\SDLAssertData',
        'SDL_atomic_t' => '\PHPSTORM_META\SDLAtomicT',
        'SDL_mutex' => '\PHPSTORM_META\SDLMutex',
        'SDL_sem' => '\PHPSTORM_META\SDLSem',
        'SDL_cond' => '\PHPSTORM_META\SDLCond',
        'SDL_Thread' => '\PHPSTORM_META\SDLThread',
        'SDL_RWops' => '\PHPSTORM_META\SDLRWops',
        'SDL_AudioSpec' => '\PHPSTORM_META\SDLAudioSpec',
        'SDL_AudioCVT' => '\PHPSTORM_META\SDLAudioCVT',
        'SDL_AudioStream' => '\PHPSTORM_META\SDLAudioStream',
        'div_t' => '\PHPSTORM_META\DivT',
        'ldiv_t' => '\PHPSTORM_META\LdivT',
        'lldiv_t' => '\PHPSTORM_META\LldivT',
        '__sigset_t' => '\PHPSTORM_META\SigsetT',
        'fd_set' => '\PHPSTORM_META\FdSet',
        '__atomic_wide_counter' => '\PHPSTORM_META\AtomicWideCounter',
        '__pthread_list_t' => '\PHPSTORM_META\PthreadListT',
        '__pthread_slist_t' => '\PHPSTORM_META\PthreadSlistT',
        '__once_flag' => '\PHPSTORM_META\OnceFlag',
        'pthread_mutexattr_t' => '\PHPSTORM_META\PthreadMutexattrT',
        'pthread_condattr_t' => '\PHPSTORM_META\PthreadCondattrT',
        'pthread_attr_t' => '\PHPSTORM_META\PthreadAttrT',
        'pthread_mutex_t' => '\PHPSTORM_META\PthreadMutexT',
        'pthread_cond_t' => '\PHPSTORM_META\PthreadCondT',
        'pthread_rwlock_t' => '\PHPSTORM_META\PthreadRwlockT',
        'pthread_rwlockattr_t' => '\PHPSTORM_META\PthreadRwlockattrT',
        'pthread_barrier_t' => '\PHPSTORM_META\PthreadBarrierT',
        'pthread_barrierattr_t' => '\PHPSTORM_META\PthreadBarrierattrT',
        '__tile1024i' => '\PHPSTORM_META\Tile1024i',
        'SDL_Color' => '\PHPSTORM_META\SDLColor',
        'SDL_Palette' => '\PHPSTORM_META\SDLPalette',
        'SDL_PixelFormat' => '\PHPSTORM_META\SDLPixelFormat',
        'SDL_Point' => '\PHPSTORM_META\SDLPoint',
        'SDL_FPoint' => '\PHPSTORM_META\SDLFPoint',
        'SDL_Rect' => '\PHPSTORM_META\SDLRect',
        'SDL_FRect' => '\PHPSTORM_META\SDLFRect',
        'SDL_BlitMap' => '\PHPSTORM_META\SDLBlitMap',
        'SDL_Surface' => '\PHPSTORM_META\SDLSurface',
        'SDL_DisplayMode' => '\PHPSTORM_META\SDLDisplayMode',
        'SDL_Window' => '\PHPSTORM_META\SDLWindow',
        'SDL_Keysym' => '\PHPSTORM_META\SDLKeysym',
        'SDL_Cursor' => '\PHPSTORM_META\SDLCursor',
        'SDL_GUID' => '\PHPSTORM_META\SDLGUID',
        'SDL_Joystick' => '\PHPSTORM_META\SDLJoystick',
        'SDL_VirtualJoystickDesc' => '\PHPSTORM_META\SDLVirtualJoystickDesc',
        'SDL_Sensor' => '\PHPSTORM_META\SDLSensor',
        'SDL_GameController' => '\PHPSTORM_META\SDLGameController',
        'SDL_GameControllerButtonBind' => '\PHPSTORM_META\SDLGameControllerButtonBind',
        'SDL_Finger' => '\PHPSTORM_META\SDLFinger',
        'SDL_CommonEvent' => '\PHPSTORM_META\SDLCommonEvent',
        'SDL_DisplayEvent' => '\PHPSTORM_META\SDLDisplayEvent',
        'SDL_WindowEvent' => '\PHPSTORM_META\SDLWindowEvent',
        'SDL_KeyboardEvent' => '\PHPSTORM_META\SDLKeyboardEvent',
        'SDL_TextEditingEvent' => '\PHPSTORM_META\SDLTextEditingEvent',
        'SDL_TextEditingExtEvent' => '\PHPSTORM_META\SDLTextEditingExtEvent',
        'SDL_TextInputEvent' => '\PHPSTORM_META\SDLTextInputEvent',
        'SDL_MouseMotionEvent' => '\PHPSTORM_META\SDLMouseMotionEvent',
        'SDL_MouseButtonEvent' => '\PHPSTORM_META\SDLMouseButtonEvent',
        'SDL_MouseWheelEvent' => '\PHPSTORM_META\SDLMouseWheelEvent',
        'SDL_JoyAxisEvent' => '\PHPSTORM_META\SDLJoyAxisEvent',
        'SDL_JoyBallEvent' => '\PHPSTORM_META\SDLJoyBallEvent',
        'SDL_JoyHatEvent' => '\PHPSTORM_META\SDLJoyHatEvent',
        'SDL_JoyButtonEvent' => '\PHPSTORM_META\SDLJoyButtonEvent',
        'SDL_JoyDeviceEvent' => '\PHPSTORM_META\SDLJoyDeviceEvent',
        'SDL_JoyBatteryEvent' => '\PHPSTORM_META\SDLJoyBatteryEvent',
        'SDL_ControllerAxisEvent' => '\PHPSTORM_META\SDLControllerAxisEvent',
        'SDL_ControllerButtonEvent' => '\PHPSTORM_META\SDLControllerButtonEvent',
        'SDL_ControllerDeviceEvent' => '\PHPSTORM_META\SDLControllerDeviceEvent',
        'SDL_ControllerTouchpadEvent' => '\PHPSTORM_META\SDLControllerTouchpadEvent',
        'SDL_ControllerSensorEvent' => '\PHPSTORM_META\SDLControllerSensorEvent',
        'SDL_AudioDeviceEvent' => '\PHPSTORM_META\SDLAudioDeviceEvent',
        'SDL_TouchFingerEvent' => '\PHPSTORM_META\SDLTouchFingerEvent',
        'SDL_MultiGestureEvent' => '\PHPSTORM_META\SDLMultiGestureEvent',
        'SDL_DollarGestureEvent' => '\PHPSTORM_META\SDLDollarGestureEvent',
        'SDL_DropEvent' => '\PHPSTORM_META\SDLDropEvent',
        'SDL_SensorEvent' => '\PHPSTORM_META\SDLSensorEvent',
        'SDL_QuitEvent' => '\PHPSTORM_META\SDLQuitEvent',
        'SDL_OSEvent' => '\PHPSTORM_META\SDLOSEvent',
        'SDL_UserEvent' => '\PHPSTORM_META\SDLUserEvent',
        'SDL_SysWMmsg' => '\PHPSTORM_META\SDLSysWMmsg',
        'SDL_SysWMEvent' => '\PHPSTORM_META\SDLSysWMEvent',
        'SDL_Event' => '\PHPSTORM_META\SDLEvent',
        'SDL_Haptic' => '\PHPSTORM_META\SDLHaptic',
        'SDL_HapticDirection' => '\PHPSTORM_META\SDLHapticDirection',
        'SDL_HapticConstant' => '\PHPSTORM_META\SDLHapticConstant',
        'SDL_HapticPeriodic' => '\PHPSTORM_META\SDLHapticPeriodic',
        'SDL_HapticCondition' => '\PHPSTORM_META\SDLHapticCondition',
        'SDL_HapticRamp' => '\PHPSTORM_META\SDLHapticRamp',
        'SDL_HapticLeftRight' => '\PHPSTORM_META\SDLHapticLeftRight',
        'SDL_HapticCustom' => '\PHPSTORM_META\SDLHapticCustom',
        'SDL_HapticEffect' => '\PHPSTORM_META\SDLHapticEffect',
        'SDL_hid_device' => '\PHPSTORM_META\SDLHidDevice',
        'SDL_hid_device_info' => '\PHPSTORM_META\SDLHidDeviceInfo',
        'SDL_MessageBoxButtonData' => '\PHPSTORM_META\SDLMessageBoxButtonData',
        'SDL_MessageBoxColor' => '\PHPSTORM_META\SDLMessageBoxColor',
        'SDL_MessageBoxColorScheme' => '\PHPSTORM_META\SDLMessageBoxColorScheme',
        'SDL_MessageBoxData' => '\PHPSTORM_META\SDLMessageBoxData',
        'SDL_RendererInfo' => '\PHPSTORM_META\SDLRendererInfo',
        'SDL_Vertex' => '\PHPSTORM_META\SDLVertex',
        'SDL_Renderer' => '\PHPSTORM_META\SDLRenderer',
        'SDL_Texture' => '\PHPSTORM_META\SDLTexture',
        'SDL_WindowShapeParams' => '\PHPSTORM_META\SDLWindowShapeParams',
        'SDL_WindowShapeMode' => '\PHPSTORM_META\SDLWindowShapeMode',
        'SDL_version' => '\PHPSTORM_META\SDLVersion',
        'SDL_Locale' => '\PHPSTORM_META\SDLLocale',
        'IMG_Animation' => '\PHPSTORM_META\IMGAnimation',
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