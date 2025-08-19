<?php

namespace Filters\FilterOptions;

use Filters\IFilter;

abstract class BaseFiltering
{
    /**
     * @var IFilter[] Array of filter instances
     */
    protected array $filters = [];
    
    public function __construct()
    {
    }

    /**
     * Add a filter to the filter chain
     * 
     * @param IFilter $filter Filter instance to add
     * @return self For method chaining
     */
    public function addFilter(IFilter $filter): self
    {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * Apply all filters to the given data
     * 
     * @param mixed $data Data to filter
     * @return mixed Filtered data
     */
    public function filter(mixed $data): mixed
    {
        foreach ($this->filters as $filter) {
            $data = $filter->filter($data);
        }
        return $data;
    }
}