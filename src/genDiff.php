<?php

namespace Hexlet\Code;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}


function genDiff($file1, $file2): string
{
    $file1 = fileParser($file1);
    $file2 = fileParser($file2);

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