<?php
namespace app\components;

class webpConverter
{
    public static function convert($source, $quality = 100, $removeOld = false)
    {
        $dir = pathinfo($source, PATHINFO_DIRNAME);
        $name = pathinfo($source, PATHINFO_FILENAME);
        $destination = $dir . DIRECTORY_SEPARATOR . $name . '.webp';
        $info = getimagesize($source);
        $isAlpha = false;

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($isAlpha = $info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($isAlpha = $info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        } else {
            return $source;
        }

        if ($isAlpha) {
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }

        imagewebp($image, $destination, $quality);

        if ($removeOld) {
            unlink($source);
        }

        return $destination;
    }

    public static function checkImage($path) {
        $image_info = pathinfo($_SERVER['DOCUMENT_ROOT'] . $path);

        $image = false;

        if (!empty($path)) {
            if ($image_info['extension'] !== 'webp') {
                $dir_info = scandir($image_info['dirname']);
                $name = $image_info['filename'] . '.webp';
                $webp_exist = array_search($name, $dir_info);

                if ($webp_exist) {
                    $image = str_replace($_SERVER['DOCUMENT_ROOT'], '', $image_info['dirname']) . '/' . $name;
                } else {
                    $image = str_replace($_SERVER['DOCUMENT_ROOT'], '', webpConverter::convert($_SERVER['DOCUMENT_ROOT'] . $path));
                }
            } else {
                $image = $path;
            }
        }

        return $image;
    }
}