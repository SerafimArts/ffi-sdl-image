<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

interface InitFlags
{
    /**
     * IMG_Init JPG image format support flag
     */
    public const IMG_INIT_JPG = 0x00000001;

    /**
     * IMG_Init PNG image format support flag
     */
    public const IMG_INIT_PNG = 0x00000002;

    /**
     * IMG_Init TIF image format support flag
     */
    public const IMG_INIT_TIF = 0x00000004;

    /**
     * IMG_Init WEBP image format support flag
     */
    public const IMG_INIT_WEBP = 0x00000008;

    /**
     * IMG_Init JXL image format support flag
     */
    public const IMG_INIT_JXL = 0x00000010;

    /**
     * IMG_Init AVIF image format support flag
     */
    public const IMG_INIT_AVIF = 0x00000020;
}
