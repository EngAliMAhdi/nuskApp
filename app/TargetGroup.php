<?php

namespace App;

enum TargetGroup: string
{
    case INDIVIDUALS = 'individuals';
    case FAMILIES = 'families';
    case GROUPS = 'groups';
    case COMPANIES = 'companies';
    public function label(): string
    {
        return match ($this) {
            self::INDIVIDUALS => 'أفراد',
            self::FAMILIES => 'عائلات',
            self::GROUPS => 'مجموعات',
            self::COMPANIES => 'شركات',
        };
    }
}
