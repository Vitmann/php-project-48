<?php

namespace Hexlet\Code\DifferTest;

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

        // тест сравнения плоских JSON файлов
        $this->assertEquals($expected, genDiff('tests/fixtures/file1.json', 'tests/fixtures/file2.json'));

        //тест сравнения yml файлов
        $this->assertEquals($expected, genDiff('tests/fixtures/filepath1.yml', 'tests/fixtures/filepath2.yml'));

        echo 'Все тесты пройдены!';
    }
}
