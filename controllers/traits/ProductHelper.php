<?php

namespace App\Controllers\Traits;

trait ProductHelper
{
    public function filterSpecialChar($array): array
    {
        $pattern = '/[^A-Za-z0-9-]/';
        return array_map(function ($item) use ($pattern) {
            return preg_replace($pattern,' ', $item);
        }, $array);
    }
}