<?php

namespace Passionatelaraveldev\Topview\Enum;

use Passionatelaraveldev\Topview\Concerns\HasEnumConvert;

enum Gender: string
{
    use HasEnumConvert;

    case FEMALE = 'female';
    case MALE = 'male';

    public function label(): string
    {
        return match ($this) {
            self::FEMALE => 'female',
            self::MALE => 'male'
        };
    }
}
