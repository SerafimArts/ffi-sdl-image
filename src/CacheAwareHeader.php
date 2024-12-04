<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\Contracts\Headers\HeaderInterface;
use FFI\Contracts\Headers\VersionInterface;
use FFI\Contracts\Preprocessor\PreprocessorInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Serafim\SDL\Image
 */
final class CacheAwareHeader implements HeaderInterface
{
    private ?string $key = null;

    public function __construct(
        private readonly VersionInterface $sdlVersion,
        private readonly VersionInterface $imageVersion,
        private readonly PreprocessorInterface $pre,
        private readonly CacheInterface $cache,
    ) {}

    private function getKey(): string
    {
        return $this->key ??= \hash('xxh64', \vsprintf('%s:%s', [
            $this->imageVersion->toString(),
            self::class,
        ]));
    }

    public function __toString(): string
    {
        /** @var string|null $result */
        $result = $this->cache->get($this->getKey());

        if ($result === null) {
            $result = (string) Header::create($this->sdlVersion, $this->imageVersion, $this->pre);

            $this->cache->set($this->getKey(), $result);
        }

        return $result;
    }
}
