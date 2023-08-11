<?php

declare(strict_types=1);

use FFI\Generator\Metadata\CastXMLGenerator;
use FFI\Generator\Metadata\CastXMLParser;
use FFI\Generator\PhpStormMetadataGenerator;
use FFI\Generator\SimpleNamingStrategy;

require __DIR__ . '/../vendor/autoload.php';

const INPUT_HEADERS = __DIR__ . '/../resources/headers/SDL_image.h';
const OUTPUT_METADATA = __DIR__ . '/metadata.xml';
const OUTPUT_FILE = __DIR__ . '/../resources/generated/.phpstorm.meta.php';

fwrite(STDOUT, " - [1/4] Generating metadata files\n");

if (!is_file(OUTPUT_METADATA)) {
    (new CastXMLGenerator())
        ->generate(INPUT_HEADERS, includes: [\realpath(__DIR__ . '/SDL'),])
        ->save(OUTPUT_METADATA)
    ;
}

fwrite(STDOUT, " - [2/4] Building AST\n");

$ast = (new CastXMLParser())
    ->parse(OUTPUT_METADATA)
;

fwrite(STDOUT, " - [3/4] Generating IDE helper\n");

$result = (new PhpStormMetadataGenerator(
        argumentSetPrefix: 'ffi_sdl_image_',
        ignoreDirectories: ['/usr', \realpath(__DIR__ . '/SDL')],
        naming: new class(
            entrypoint: Serafim\SDL\Image\Image::class,
            externalNamespace: 'Serafim\SDL\Image',
        ) extends SimpleNamingStrategy {
            protected function getEnumTypeName(string $name): string
            {
                return match ($name) {
                    'IMG_InitFlags' => \Serafim\SDL\Image\InitFlags::class,
                    default => throw new \InvalidArgumentException(
                        "Unprocessable mapping of enum \"$name\"",
                    ),
                };
            }
        }
    ))
        ->generate($ast)
    ;

fwrite(STDOUT, " - [4/4] Saving result\n");

file_put_contents(OUTPUT_FILE, (string)$result);

fwrite(STDOUT, "   [ ✓ ] DONE!\n");
