# Filtering Pipeline

Простая реализация паттерна Pipeline для фильтрации данных в PHP.

## Что это такое

Pipeline (или Chain of Responsibility) - это паттерн, который позволяет обрабатывать данные через цепочку фильтров. Каждый фильтр получает данные, обрабатывает их и передает следующему фильтру.

## Структура проекта

```
Filters/
├── IFilter.php              # Интерфейс для всех фильтров
├── BaseFiltering.php        # Базовая логика pipeline
├── FilterOptions/
│   ├── TextFiltering.php    # Конкретная реализация
│   └── BaseFiltering.php    # Базовый класс
├── StringTrimFilter.php     # Пример фильтра
└── UpperCaseFilter.php      # Пример фильтра
```

## Как использовать

### 1. Создать фильтр

```php
use Filters\IFilter;

class MyFilter implements IFilter
{
    public function filter(mixed $data): mixed
    {
        // Ваша логика фильтрации
        return $processedData;
    }
}
```

### 2. Использовать pipeline

```php
use Filters\FilterOptions\TextFiltering;

$filtering = new TextFiltering();
$filtering
    ->addFilter(new StringTrimFilter())
    ->addFilter(new UpperCaseFilter());

$result = $filtering->filter("  hello world  ");
// Результат: "HELLO WORLD"
```

## Примеры фильтров

- **StringTrimFilter** - убирает пробелы в начале и конце строки
- **UpperCaseFilter** - переводит строку в верхний регистр

## Преимущества

- Легко добавлять новые фильтры
- Можно комбинировать фильтры в любом порядке
- Каждый фильтр отвечает за одну задачу
- Простое тестирование

## Установка

```bash
composer install
```

## Запуск тестов

```bash
php test.php
```
