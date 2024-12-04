# FFI SDL Image Bindings

<p align="center">
    <a href="https://packagist.org/packages/serafim/ffi-sdl-image"><img src="https://poser.pugx.org/serafim/ffi-sdl-image/require/php?style=for-the-badge" alt="PHP 8.1+"></a>
    <a href="https://github.com/libsdl-org/SDL_image"><img src="https://img.shields.io/badge/SDL_image-2.6.3-132B48.svg?style=for-the-badge&logo=c%2b%2b" alt="SDL_image"></a>
    <a href="https://packagist.org/packages/serafim/ffi-sdl-image"><img src="https://poser.pugx.org/serafim/ffi-sdl-image/version?style=for-the-badge" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/serafim/ffi-sdl-image"><img src="https://poser.pugx.org/serafim/ffi-sdl-image/v/unstable?style=for-the-badge" alt="Latest Unstable Version"></a>
    <a href="https://packagist.org/packages/serafim/ffi-sdl-image"><img src="https://poser.pugx.org/serafim/ffi-sdl-image/downloads?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://raw.githubusercontent.com/serafim/ffi-sdl-image/master/LICENSE.md"><img src="https://poser.pugx.org/serafim/ffi-sdl-image/license?style=for-the-badge" alt="License MIT"></a>
</p>

A SDL_image extension FFI bindings for the PHP language compatible with [SDL FFI bindings for the PHP language](https://github.com/SerafimArts/ffi-sdl).

- [System Requirements](#requirements)
- [Installation](#installation)
- [Documentation](#documentation)
- [Initialization](#initialization)
- [Example](#example)

## Requirements

- PHP ^8.1
- ext-ffi
- Windows, Linux, BSD or MacOS
    - Android, iOS or something else are not supported yet
- SDL and SDL Image >= 2.0

## Installation

Library is available as composer repository and can be 
installed using the following command in a root of your project.

```bash
$ composer require serafim/ffi-sdl-image
```

Additional dependencies:
  - Debian-based Linux: `sudo apt install libsdl2-image-2.0-0 -y`
  - MacOS: `brew install sdl2_image`
  - Window: Can be [downloaded from here](https://github.com/libsdl-org/SDL_image/releases)

## Documentation

The library API completely supports and repeats the analogue in the C language.

- [SDL2 Image official documentation](https://www.libsdl.org/projects/SDL_image/docs/index.html)

## Initialization

In the case that you need a specific SDL instance, it should be passed 
explicitly:

```php
$sdl = new Serafim\SDL\SDL(version: '2.28.3');
$image = new Serafim\SDL\Image\Image(sdl: $sdl);

// If no argument is passed, the latest initialized
// version will be used.
$image = new Serafim\SDL\Image\Image(sdl: null);
```

> ! It is recommended to always specify the SDL dependency explicitly.

To specify a library pathname explicitly, you can add the `library` argument to
the `Serafim\SDL\Image\Image` constructor.

> By default, the library will try to resolve the binary's pathname automatically.

```php
// Load library from pathname (it may be relative or part of system-dependent path)
$image = new Serafim\SDL\Image\Image(library: __DIR__ . '/path/to/library.so');

// Try to automatically resolve library's pathname
$image = new Serafim\SDL\Image\Image(library: null);
```

You can also specify the library version explicitly. Depending on this version,
the corresponding functions of the SDL Image will be available.

> By default, the library will try to resolve SDL Image version automatically.

```php
// Use v2.0.5 from string
$image = new Serafim\SDL\Image\Image(version: '2.0.5');

// Use v2.6.3 from predefined versions constant
$image = new Serafim\SDL\Image\Image(version: \Serafim\SDL\Image\Version::V2_6_3);

// Use latest supported version
$image = new Serafim\SDL\Image\Image(version: \Serafim\SDL\Image\Version::LATEST);
```

To speed up the header compiler, you can use any PSR-16 compatible cache driver.

```php
$image = new Serafim\SDL\Image\Image(cache: new Psr16Cache(...));
```

In addition, you can control other preprocessor directives explicitly:

```php
$pre = new \FFI\Preprocessor\Preprocessor();
$pre->define('true', 'false'); // happy debugging!

$image = new Serafim\SDL\Image\Image(pre: $pre);
```

## Example

```php
use Serafim\SDL\SDL;
use Serafim\SDL\Image\Image;

$sdl = new SDL();
$image = new Image(sdl: $sdl);

$sdl->SDL_Init(SDL::SDL_INIT_EVERYTHING);
$image->IMG_Init(Image::IMG_INIT_PNG);

$surface = $image->IMG_Load(__DIR__ . '/path/to/image.png');
$image->IMG_SaveJPG($surface, __DIR__ . '/path/to/image.jpg', quality: 80);


$image->IMG_Quit();
$sdl->SDL_Quit();
```
