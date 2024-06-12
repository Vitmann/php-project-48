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
    $read1 = file_get_contents($file1);
    $read1 = json_decode($read1, true);

    $read2 = file_get_contents($file2);
    $read2 = json_decode($read2, true);

    ksort($read1);
    ksort($read2);

    $result = [];

    foreach ($read1 as $key => $value) {
        if (array_key_exists($key, $read2)) {
            if ($read2[$key] === $value) {
                $value = convertType($value);
                $result[] = "  {$key}: {$value}";
            } else {
                $value = convertType($value);
                $result[] = "- {$key}: {$value}";
                $result[] = "+ {$key}: {$read2[$key]}";
            }
        } else {
            $value = convertType($value);
            $result[] = "- {$key}: {$value}";
        }
    }

    foreach ($read2 as $key => $value) {
        if (!array_key_exists($key, $read1)) {
            $value = convertType($value);
            $result[] = "+ {$key}: {$value}";
        }
    }

    return '{' . PHP_EOL .  implode(PHP_EOL, $result) . PHP_EOL . '}';
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