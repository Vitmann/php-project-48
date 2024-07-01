<?php

namespace Hexlet\Code;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use Symfony\Component\Yaml\Yaml;

function fileParser($pathToFile): array
{
    $path_parts = pathinfo($pathToFile);
    $extension = $path_parts['extension']; //определяем расширение файла

    if ($extension === 'json') {
        $file = file_get_contents($pathToFile); //получаем содержимое файла из полученного пути
        $file = json_decode($file, true); //конвертируем содержимое файла в json
        ksort($file); //сортируем массив по ключу
        return $file;
    }

    if ($extension === 'yml' || $extension === 'yaml') {
        $file = Yaml::parseFile($pathToFile);
        ksort($file);
        return $file;
    }

    return [];
}
