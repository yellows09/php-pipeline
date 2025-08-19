<?php

// Подключаем автозагрузчик Composer
require_once __DIR__ . '/vendor/autoload.php';

use Filters\StringTrimFilter;
use Filters\UpperCaseFilter;
use Filters\FilterOptions\TextFiltering;

// Создаем экземпляр фильтрации текста
$textFilter = new TextFiltering();

// Добавляем фильтры в цепочку
$textFilter->addFilter(new StringTrimFilter())
    ->addFilter(new UpperCaseFilter());

// Тестовые данные
$testData = [
    '  hello world  ',
    '   php filtering   ',
    'composer autoload',
    '  namespace example  '
];

echo "=== Пример работы фильтров ===\n\n";
echo "Исходные данные:\n";
print_r($testData);

// Применяем фильтры
$filteredData = $textFilter->processText($testData);

echo "\nДанные после фильтрации (trim + uppercase):\n";
print_r($filteredData);

// Пример с одной строкой
$singleString = '   test string   ';
echo "\n=== Фильтрация одной строки ===\n";
echo "Исходная строка: '$singleString'\n";
echo "После фильтрации: '" . $textFilter->processText($singleString) . "'\n";
