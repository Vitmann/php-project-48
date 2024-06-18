<?php

namespace Hexlet\Code;

function genDiff($file1, $file2): string
{
    $file1 = file_get_contents($file1); //получаем содержимое файла из полученного пути
    $file1 = json_decode($file1, true); //конвертируем содержимое файла в json

    $file2 = file_get_contents($file2); //получаем содержимое файла из полученного пути
    $file2 = json_decode($file2, true); //конвертируем содержимое файла в json

    ksort($file1); //сортируем по алфавиту содержимое массива
    ksort($file2); //сортируем по алфавиту содержимое массива

    $result = [];

    foreach ($file1 as $key => $value) {
        if (array_key_exists($key, $file2)) {
            if ($file2[$key] === $value) {
                $value = convertType($value);
                $result[] = "  {$key}: {$value}";
            } else {
                $value = convertType($value);
                $result[] = "- {$key}: {$value}";
                $result[] = "+ {$key}: {$file2[$key]}";
            }
        } else {
            $value = convertType($value);
            $result[] = "- {$key}: {$value}";
        }
    }

    foreach ($file2 as $key => $value) {
        if (!array_key_exists($key, $file1)) {
            $value = convertType($value);
            $result[] = "+ {$key}: {$value}";
        }
    }

    return '{' . PHP_EOL . implode(PHP_EOL, $result) . PHP_EOL . '}';
}

function convertType($value)
{
    if ($value === false) {
        return 'false';
    }
    if ($value === true) {
        return 'true';
    }

    return $value;
}
