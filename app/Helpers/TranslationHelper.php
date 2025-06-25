<?php

namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslationHelper
{
    public static function translate($text, $target = 'en', $source = 'ar')
    {
        try {
            $tr = new GoogleTranslate();
            $tr->setSource($source);
            $tr->setTarget($target);
            return $tr->translate($text);
        } catch (\Exception $e) {
            return $text; 
        }
    }
}
