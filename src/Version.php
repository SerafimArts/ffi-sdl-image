<?php

declare(strict_types=1);

namespace Serafim\SDL\Image;

use FFI\Contracts\Headers\Version as UserVersion;
use FFI\Contracts\Headers\Version\Comparable;
use FFI\Contracts\Headers\Version\ComparableInterface;
use FFI\Contracts\Headers\VersionInterface;

enum Version: string implements VersionInterface, ComparableInterface
{
    use Comparable;

    /**
     * @link https://www.libsdl.org/projects/SDL_image/release/
     */
    case V2_0_0 = '2.0.0';

    /**
     * @link https://www.libsdl.org/projects/SDL_image/release/
     */
    case V2_0_1 = '2.0.1';

    /**
     * @link https://www.libsdl.org/projects/SDL_image/release/
     */
    case V2_0_2 = '2.0.2';

    /**
     * @link https://www.libsdl.org/projects/SDL_image/release/
     */
    case V2_0_3 = '2.0.3';

    /**
     * @link https://www.libsdl.org/projects/SDL_image/release/
     */
    case V2_0_4 = '2.0.4';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.0.5
     */
    case V2_0_5 = '2.0.5';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.5.1
     *
     * @deprecated This is prerelease version
     */
    case V2_5_1 = '2.5.1';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.5.2
     *
     * @deprecated This is prerelease version
     */
    case V2_5_2 = '2.5.2';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.5.3
     *
     * @deprecated This is prerelease version
     */
    case V2_5_3 = '2.5.3';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.6.0
     */
    case V2_6_0 = '2.6.0';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.6.1
     */
    case V2_6_1 = '2.6.1';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.6.2
     */
    case V2_6_2 = '2.6.2';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases/tag/release-2.6.3
     */
    case V2_6_3 = '2.6.3';

    /**
     * @link https://github.com/libsdl-org/SDL_image/releases
     */
    public const LATEST = self::V2_6_3;

    /**
     * @param non-empty-string $version
     */
    public static function create(string $version): VersionInterface
    {
        /** @var array<non-empty-string, VersionInterface> $versions */
        static $versions = [];

        return self::tryFrom($version) ?? $versions[$version] ??= UserVersion::fromString($version);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
