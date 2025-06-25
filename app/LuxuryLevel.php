<?php

namespace App;


enum LuxuryLevel: string
{
    case BASIC = 'basic';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    public function label(): string
    {
        return match ($this) {
            self::BASIC => 'أساسي',
            self::MEDIUM => 'متوسط',
            self::HIGH => 'مرتفع',
        };
    }
}
