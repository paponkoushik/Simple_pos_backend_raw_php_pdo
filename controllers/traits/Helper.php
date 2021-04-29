<?php

namespace App\Controllers\Traits;

trait Helper
{
    public function filterSpecialChar($array): array
    {
        $pattern = '/[^A-Za-z0-9-]/';
        return array_map(function ($item) use ($pattern) {
            return preg_replace($pattern,' ', $item);
        }, $array);
    }

    public function baseUrl(): string
    {
        return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    }

    public function setHeader()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
    }
}