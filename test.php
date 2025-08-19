<?php

// Подключаем автозагрузчик Composer
require_once __DIR__ . '/vendor/autoload.php';

echo "Тест автозагрузки Composer\n";
echo "===========================\n\n";

// Проверяем, что классы загружаются
try {
    // Проверка загрузки классов
    if (class_exists('Filters\StringTrimFilter')) {
        echo "✓ Класс Filters\StringTrimFilter загружен успешно\n";
    } else {
        echo "✗ Класс Filters\StringTrimFilter не найден\n";
    }
    
    if (class_exists('Filters\UpperCaseFilter')) {
        echo "✓ Класс Filters\UpperCaseFilter загружен успешно\n";
    } else {
        echo "✗ Класс Filters\UpperCaseFilter не найден\n";
    }
    
    if (class_exists('Filters\FilterOptions\TextFiltering')) {
        echo "✓ Класс Filters\FilterOptions\TextFiltering загружен успешно\n";
    } else {
        echo "✗ Класс Filters\FilterOptions\TextFiltering не найден\n";
    }
    
    if (interface_exists('Filters\IFilter')) {
        echo "✓ Интерфейс Filters\IFilter загружен успешно\n";
    } else {
        echo "✗ Интерфейс Filters\IFilter не найден\n";
    }
    
    echo "\n";
    
    // Создаем объекты для проверки
    $trimFilter = new Filters\StringTrimFilter();
    echo "✓ Объект StringTrimFilter создан\n";
    
    $upperFilter = new Filters\UpperCaseFilter();
    echo "✓ Объект UpperCaseFilter создан\n";
    
    $textFilter = new Filters\FilterOptions\TextFiltering();
    echo "✓ Объект TextFiltering создан\n";
    
    // Простой тест
    echo "\n=== Простой тест фильтрации ===\n";
    $testString = '  hello world  ';
    echo "Исходная строка: '$testString'\n";
    
    $result = $trimFilter->filter($testString);
    echo "После trim: '$result'\n";
    
    $result = $upperFilter->filter($result);
    echo "После uppercase: '$result'\n";
    
    echo "\n✓ Все тесты пройдены успешно!\n";
    
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
    echo "Трассировка:\n";
    echo $e->getTraceAsString() . "\n";
}
