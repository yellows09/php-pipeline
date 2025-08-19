<?php

namespace Filters\FilterOptions;

/**
 * Concrete implementation of BaseFiltering for text processing
 */
class TextFiltering extends BaseFiltering
{
    /**
     * Process text through all registered filters
     * 
     * @param string|array $text Text to process
     * @return mixed Processed text
     */
    public function processText(string|array $text): mixed
    {
        return $this->filter($text);
    }
}
