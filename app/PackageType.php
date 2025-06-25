<?php

namespace App;


enum PackageType: string
{
    case ECONOMIC = 'economic';
    case PREMIUM = 'premium';
    case LUXURY = 'luxury';
    case CORPORATE = 'corporate';
    case CHILDREN = 'children';
    case SENIOR = 'senior';

    public function label(): string
    {
        return match ($this) {
            self::ECONOMIC => 'اقتصادية',
            self::PREMIUM => 'متميزة',
            self::LUXURY => 'فاخرة',
            self::CORPORATE => 'شركات',
            self::CHILDREN => 'أطفال',
            self::SENIOR => ' كبار سن وذوي احتياجات',
        };
    }
}
