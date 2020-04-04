# FFI SDL Image Bindings

This is a SDL Image bindings for PHP using [SDL php ffi bindings library](https://github.com/SerafimArts/ffi-sdl).

- [System Requirements](#requirements)
- [Installation](#installation)
    - [Linux](#linux)
    - [MacOS](#macos)
    - [Windows](#windows)
- [Documentation](#documentation)

## Requirements

- PHP >= 7.4
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

#### Linux

- `sudo apt install libsdl2-image-2.0-0 -y`

#### MacOS

- `brew install sdl2_image`

#### Windows

- SDL Image (v2.0.5) are already bundled

## Documentation

The library API completely supports and repeats the analogue in the C language.

- [SDL2 Image official documentation](https://www.libsdl.org/projects/SDL_image/docs/index.html)

To support autocomplete, please add a link to `\SDL\Image\ImageNativeApiAutocomplete`:

```php
/** @var \SDL\Image\ImageNativeApiAutocomplete $image */
$image = new \SDL\Image\Image();
```

In addition, the library contains functionality adapted for PHP.
- All methods are converted to the PSR style.
- In case of errors, methods throw exceptions.
- Removed passing arguments by reference during initialization.
- All arguments that accept a boolean in c-format (short int) are replaced by a boolean.
- Added default arguments in some methods.

Please note that when using the original calls, you will have to cast the 
types to the desired ones with your hands!

```php
/** @var \SDL\Image\ImageNativeApiAutocomplete $image */
$image = new \SDL\Image\Image();

$surface = $image->IMG_Load(__DIR__ . '/path/to/image');

/** @var \SDL\SDL|\SDL\SDLNativeApiAutocomplete $sdl */
$sdl = new \SDL\SDL();

$sdlSurface = $sdl->cast(\SDL\SurfacePtr::class, $surface); // <<<<< HERE
$sdl->SDL_FreeSurface($sdlSurface);
```

### init

Loads dynamic libraries and prepares them for use.
Flags should be one or more flags from `\Serafim\SDL\InitFlags` OR'd together.

Throws SDLException on error.

```php
use SDL\Image\Image;

$image = new Image();
$image->init(Image::IMG_INIT_JPG | Image::IMG_INIT_PNG);
```

### linkedVersion

This function returns the version of the dynamically linked SDL_image library.

```php
$image = new SDL\Image\Image();

// ...

$ver = $image->linkedVersion();

echo \sprintf('SDL Image v%d.%d.%d', $ver->major, $ver->minor, $ver->patch);
```

### quit

Unloads libraries loaded with `$image->init(...)`

### loadTypedRw

Load an image from an SDL data source.
The 'type' may be one of: "BMP", "GIF", "PNG", etc (see `\SDL\Image\ImageType`)

If the image format supports a transparent pixel, SDL will set the
colorkey for the surface.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$jpg = $sdl->SDL_RWFromFile('path/to/file/a.jpg', 'rb');
$png = $sdl->SDL_RWFromFile('path/to/file/b.png', 'rb');


$image = new Image();

// ...

// Close "$jpg" resource after reading
$surfaceA = $image->loadTypedRw($jpg, Image::IMAGE_TYPE_JPG);


// Do not close "$png" resource
$surfaceB = $image->loadTypedRw($png, Image::IMAGE_TYPE_PNG, false);
```

### load

Load file for use as an image in a new surface. This actually calls
`loadTypedRw`, with the file extension used as the type string.
This can load all supported image files, including TGA as long as the
filename ends with ".tga". It is best to call this outside of event
loops, and rather keep the loaded images around until you are really
done with them, as disk speed and image conversion to a surface is not
that speedy.

Don't forget to `$sdl->freeSurface(...)` the returned surface pointer when you
are through with it.

```php
$sdl = new \SDL\SDL();
$image = new \SDL\Image\Image();

$surface = $image->load(__DIR__ . '/path/to/file.png');

// Do something

$sdl->SDL_FreeSurface($surface);
```

### loadRw

Load src for use as a surface. This can load all supported image formats,
except TGA. Using `RWops` is not covered here, but they enable you
to load from almost any source.

```php
$sdl = new \SDL\SDL();
$jpg = $sdl->SDL_RWFromFile('path/to/file/a.jpg', 'rb');


$image = new \SDL\Image\Image();

// Free "$jpg" resource after reading
$image->loadRw($jpg);

// Do not close "$jpg" resource after reading
$image->loadRw($jpg, false);
```

### loadTexture

Load an image directly into a render texture.

```php
$image = new \SDL\Image\Image();

// Where $renderer is an instance of \Serafim\SDL\RendererPtr
$image->loadTexture($renderer, __DIR__ . '/path/to/file.png');
```

### loadTextureRw

Load an image directly into a render texture.

```php
$sdl = new \SDL\SDL();
$jpg = $sdl->SDL_RWFromFile('path/to/file/a.jpg', 'rb');

$image = new \SDL\Image\Image();

// Where $renderer is an instance of \Serafim\SDL\RendererPtr
// Free "$jpg" resource after reading
$image->loadTextureRw($renderer, $jpg);


// Where $renderer is an instance of \Serafim\SDL\RendererPtr
// Do not close "$jpg" resource after reading
$image->loadTextureRw($renderer, $jpg, false);
```

### loadTextureTypedRw

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$jpg = $sdl->SDL_RWFromFile('path/to/file/a.jpg', 'rb');

$image = new Image();

// Where $renderer is an instance of \Serafim\SDL\RendererPtr
// Free "$jpg" resource after reading
$image->loadTextureTypedRw($renderer, $jpg, Image::IMAGE_TYPE_JPG);

// Where $renderer is an instance of \Serafim\SDL\RendererPtr
// Do not close "$jpg" resource after reading
$image->loadTextureTypedRw($renderer, $jpg, Image::IMAGE_TYPE_JPG, false);
```

### isIco

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isIco($file));
```

### isCur

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isCur($file));
```

### isBmp

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isBmp($file));
```

### isGif

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isGif($file));
```

### isJpg

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isJpg($file));
```

### isLbm

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isLbm($file));
```

### isPcx

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isPcx($file));
```

### isPng

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isPng($file));
```

### isPnm

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isPnm($file));
```

### isSvg

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isSvg($file));
```

### isTif

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isTif($file));
```

### isXcf

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isXcf($file));
```

### isXpm

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isXpm($file));
```

### isXv

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isXv($file));
```

### isWebp

Functions to detect a file type, given a seekable source.

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->SDL_RWFromFile('path/to/file', 'rb');

var_dump($image->isWebp($file));
```

### loadIcoRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadIcoRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadCurRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadCurRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadBmpRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadBmpRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadGifRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadGifRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadJpgRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadJpgRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadLbmRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadLbmRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadPcxRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadPcxRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadPngRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadPngRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadPnmRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadPnmRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadSvgRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadSvgRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadTgaRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadTgaRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadTifRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadTifRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadXcfRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadXcfRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadXpmRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadXpmRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadXvRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadXvRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### loadWebpRw

Individual loading function

```php
use SDL\SDL;
use SDL\Image\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadWebpRw($sdl->SDL_RWFromFile('path/to/file', 'rb'));
```

### readXpmFromArray

// TODO

### savePng

Individual saving function

```php
$image = new \SDL\Image\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->savePng($surface, __DIR__ . '/path/to/output.png');
```

### savePngRw

Individual saving function

```php
$sdl = new \SDL\SDL();
$image = new \SDL\Image\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->savePngRw($surface, $sdl->SDL_RWFromFile(__DIR__ . '/path/to/output.png', 'wb'));
```

### saveJpg

Individual saving function

```php
$image = new \SDL\Image\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->saveJpg($surface, __DIR__ . '/path/to/output-quality-100.jpg');
$image->saveJpg($surface, __DIR__ . '/path/to/output-quality-80.jpg', 80);
```

### saveJpgRw

Individual saving function

```php
$sdl = new \SDL\SDL();
$image = new \SDL\Image\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->saveJpgRw($surface, $sdl->SDL_RWFromFile(__DIR__ . '/path/to/output-quality-100.jpg', 'wb'));
$image->saveJpgRw($surface, $sdl->SDL_RWFromFile(__DIR__ . '/path/to/output-quality-80.jpg', 'wb'), 80);
```
