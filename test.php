<?php

/**
 * This file is part of SDL Image package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$image = new \Serafim\SDLImage\Image();

// ...

/** @var \Serafim\SDL\Version $ver */
$ver = $image->linkedVersion();

echo \sprintf('SDL Image v%d.%d.%d', $ver->major, $ver->minor, $ver->patch);
