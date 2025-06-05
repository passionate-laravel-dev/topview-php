<?php

namespace Passionatelaraveldev\Topview\Enum;

use Passionatelaraveldev\Topview\Concerns\HasEnumConvert;

enum Scene: string
{
    use HasEnumConvert;

    case VIDEO_AVATAR = 'video_avatar';
    case PRODUCT_AVATAR = 'product_avatar';

    public function label(): string
    {
        return match ($this) {
            self::VIDEO_AVATAR => 'Video Avatar',
            self::PRODUCT_AVATAR => 'Product Avatar'
        };
    }
}
