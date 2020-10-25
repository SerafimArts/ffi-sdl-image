<?php

/**
 * This file is part of SDL Image package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Serafim\FFILoader\Loader;
use Serafim\Preprocessor\Preprocessor;
use Serafim\SDL\Image\Image;
use Serafim\SDL\Image\Library as SDLImageLibrary;
use Serafim\SDL\Library as SDLLibrary;

Loader::onLoad([Image::class], function () {
    $loader = new Loader($pre = new Preprocessor());

    $image = new SDLImageLibrary(new SDLLibrary());
    $image->extend($loader, $pre);

    $injector = static function() use ($loader, $image): void {
        self::$ffi = $loader->cdef($image);
        self::$version = $image->getVersion();
        self::$directory = \dirname($image->getBinary());
    };

    ($injector)->bindTo(null, Image::class)();
});



