# FFI SDL Image Bindings

This is a SDL Image bindings for PHP using [SDL PHP FFI bindings library](https://github.com/SerafimArts/ffi-sdl).

- [System Requirements](#requirements)
- [Installation](#installation)
- [Documentation](#documentation)
- [Initialization](#initialization)

## Requirements

- PHP ^8.1
- ext-ffi
- Windows, Linux or MacOS
    - Android, iOS, BSD or something else are not supported yet
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
$sdl = new Serafim\SDL\Image\Image(library: __DIR__ . '/path/to/library.so');

// Try to automatically resolve library's pathname
$sdl = new Serafim\SDL\Image\Image(library: null);
```
