<?php

declare(strict_types=1);

namespace PHPSTORM_META {

    registerArgumentsSet('ffi_sdl_image_img_initflags',
        \Serafim\SDL\Image\InitFlags::IMG_INIT_JPG,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_PNG,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_TIF,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_WEBP,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_JXL,
        \Serafim\SDL\Image\InitFlags::IMG_INIT_AVIF
    );

    expectedArguments(\Serafim\SDL\Image\Image::IMG_Init(), 0, argumentsSet('ffi_sdl_image_img_initflags'));

}
