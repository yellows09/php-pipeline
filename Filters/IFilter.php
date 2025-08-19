<?php

namespace Filters;

interface IFilter
{
    /**
     * Apply filter to the given data
     * 
     * @param mixed $data Data to filter
     * @return mixed Filtered data
     */
    public function filter(mixed $data): mixed;
}
