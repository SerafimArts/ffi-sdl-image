# FFI SDL Image Bindings

This is a SDL Image bindings for PHP using [SDL php ffi bindings library](https://github.com/SerafimArts/ffi-sdl).

- [System Requirements](#requirements)
- [Installation](#installation)
    - [Linux](#linux)
    - [MacOS](#macos)
    - [Windows](#windows)
- [API Documentation](#api)

## Requirements

- PHP >=7.4
- ext-ffi
- MacOS, Linux or MacOS (BSD or something else are not supported yet).
- SDL >= 2.0
- SDL Image >= 2.0

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


## API

### init

Loads dynamic libraries and prepares them for use.
Flags should be one or more flags from `\Serafim\SDLImage\InitFlags` OR'd together.

Throws SDLImageException on error.

```php
use Serafim\SDLImage\Image;

$image = new Image();
$image->init(Image::IMG_INIT_JPG | Image::IMG_INIT_PNG);
```

### linkedVersion

This function returns the version of the dynamically linked SDL_image library.

```php
$image = new Serafim\SDLImage\Image();

// ...

$ver = $image->linkedVersion();

echo \sprintf('SDL Image v%d.%d.%d', $ver->major, $ver->minor, $ver->patch);
```

### quit

Unloads libraries loaded with `$image->init(...)`

### loadTypedRw

Load an image from an SDL data source.
The 'type' may be one of: "BMP", "GIF", "PNG", etc (see `\Serafim\SDLImage\ImageType`)

If the image format supports a transparent pixel, SDL will set the
colorkey for the surface.  You can enable RLE acceleration on the
surface afterwards by calling:

```php
//
// Calling SDL's API "setColorKey" method may differ from this example
//
$sdl->setColorKey($image, SDL::SDL_RLEACCEL, $image->format->colorkey);
```

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$jpg = $sdl->rwFromFile('path/to/file/a.jpg', 'rb');
$png = $sdl->rwFromFile('path/to/file/b.png', 'rb');


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
$sdl = new \Serafim\SDL\SDL();
$image = new \Serafim\SDLImage\Image();

$surface = $image->load(__DIR__ . '/path/to/file.png');

// Do something

$sdl->freeSurface($surface);
```

### loadRw

Load src for use as a surface. This can load all supported image formats,
except TGA. Using `RWops` is not covered here, but they enable you
to load from almost any source.

```php
$sdl = new \Serafim\SDL\SDL();
$jpg = $sdl->rwFromFile('path/to/file/a.jpg', 'rb');


$image = new \Serafim\SDLImage\Image();

// Free "$jpg" resource after reading
$image->loadRw($jpg);

// Do not close "$jpg" resource after reading
$image->loadRw($jpg, false);
```

### loadTexture

Load an image directly into a render texture.

```php
$image = new \Serafim\SDLImage\Image();

// Where $renderer is an instance of \Serafim\SDL\RendererPtr
$image->loadTexture($renderer, __DIR__ . '/path/to/file.png');
```

### loadTextureRw

Load an image directly into a render texture.

```php
$sdl = new \Serafim\SDL\SDL();
$jpg = $sdl->rwFromFile('path/to/file/a.jpg', 'rb');

$image = new \Serafim\SDLImage\Image();

// Where $renderer is an instance of \Serafim\SDL\RendererPtr
// Free "$jpg" resource after reading
$image->loadTextureRw($renderer, $jpg);


// Where $renderer is an instance of \Serafim\SDL\RendererPtr
// Do not close "$jpg" resource after reading
$image->loadTextureRw($renderer, $jpg, false);
```

### loadTextureTypedRw

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$jpg = $sdl->rwFromFile('path/to/file/a.jpg', 'rb');

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
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isIco($file));
```

### isCur

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isCur($file));
```

### isBmp

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isBmp($file));
```

### isGif

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isGif($file));
```

### isJpg

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isJpg($file));
```

### isLbm

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isLbm($file));
```

### isPcx

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isPcx($file));
```

### isPng

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isPng($file));
```

### isPnm

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isPnm($file));
```

### isSvg

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isSvg($file));
```

### isTif

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isTif($file));
```

### isXcf

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isXcf($file));
```

### isXpm

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isXpm($file));
```

### isXv

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isXv($file));
```

### isWebp

Functions to detect a file type, given a seekable source.

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$file = $sdl->rwFromFile('path/to/file', 'rb');

var_dump($image->isWebp($file));
```

### loadIcoRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadIcoRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadCurRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadCurRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadBmpRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadBmpRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadGifRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadGifRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadJpgRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadJpgRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadLbmRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadLbmRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadPcxRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadPcxRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadPngRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadPngRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadPnmRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadPnmRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadSvgRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadSvgRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadTgaRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadTgaRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadTifRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadTifRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadXcfRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadXcfRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadXpmRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadXpmRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadXvRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadXvRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### loadWebpRw

Individual loading function

```php
use Serafim\SDL\SDL;
use Serafim\SDLImage\Image;

$sdl = new SDL();
$image = new Image();

$surface = $image->loadWebpRw($sdl->rwFromFile('path/to/file', 'rb'));
```

### readXpmFromArray

// TODO

### savePng

Individual saving function

```php
$image = new \Serafim\SDLImage\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->savePng($surface, __DIR__ . '/path/to/output.png');
```

### savePngRw

Individual saving function

```php
$sdl = new \Serafim\SDL\SDL();
$image = new \Serafim\SDLImage\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->savePngRw($surface, $sdl->rwFromFile(__DIR__ . '/path/to/output.png', 'wb'));
```

### saveJpg

Individual saving function

```php
$image = new \Serafim\SDLImage\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->saveJpg($surface, __DIR__ . '/path/to/output-quality-100.jpg');
$image->saveJpg($surface, __DIR__ . '/path/to/output-quality-80.jpg', 80);
```

### saveJpgRw

Individual saving function

```php
$sdl = new \Serafim\SDL\SDL();
$image = new \Serafim\SDLImage\Image();

$surface = $image->load(__DIR__ . '/path/to/file.jpg');

$image->saveJpgRw($surface, $sdl->rwFromFile(__DIR__ . '/path/to/output-quality-100.jpg', 'wb'));
$image->saveJpgRw($surface, $sdl->rwFromFile(__DIR__ . '/path/to/output-quality-80.jpg', 'wb'), 80);
```
