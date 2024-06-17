<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;

use function Hexlet\Code\genDiff;

class DifferTest extends TestCase
{

    public function testGendiff(): void
    {
        $expected = '{
- follow: false
  host: hexlet.io
- proxy: 123.234.53.22
- timeout: 50
+ timeout: 20
+ verbose: true
}';

        $this->assertEquals($expected, genDiff('src/file1.json', 'src/file2.json'));


        echo 'Все тесты пройдены!';
    }
}
