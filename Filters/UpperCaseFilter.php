<?php

namespace Filters;

/**
 * Filter that converts strings to uppercase
 */
class UpperCaseFilter implements IFilter
{
    /**
     * Convert string data to uppercase
     * 
     * @param mixed $data Data to filter
     * @return mixed Uppercase data if string, unchanged otherwise
     */
    public function filter(mixed $data): mixed
    {
        if (is_string($data)) {
            return strtoupper($data);
        }
        
        if (is_array($data)) {
            return array_map([$this, 'filter'], $data);
        }
        
        return $data;
    }
}
