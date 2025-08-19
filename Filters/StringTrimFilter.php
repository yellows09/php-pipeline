<?php

namespace Filters;

/**
 * Filter that trims whitespace from strings
 */
class StringTrimFilter implements IFilter
{
    /**
     * Trim whitespace from string data
     * 
     * @param mixed $data Data to filter
     * @return mixed Trimmed data if string, unchanged otherwise
     */
    public function filter(mixed $data): mixed
    {
        if (is_string($data)) {
            return trim($data);
        }
        
        if (is_array($data)) {
            return array_map([$this, 'filter'], $data);
        }
        
        return $data;
    }
}
