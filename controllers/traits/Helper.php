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
        header('Content-Type: multipart/form-data');
    }

    public function fileHandler($file): string
    {
        $file_name = $file['name'];

        $file_temp = $file['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        move_uploaded_file($file_temp, $uploaded_image);

        return $uploaded_image;
    }
}