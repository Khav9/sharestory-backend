<?php

namespace App\Services;

use Parsedown;

class MarkdownService
{
    protected $parsedown;

    public function __construct()
    {
        $this->parsedown = new Parsedown();
    }

    /**
     * Convert Markdown content to HTML.
     *
     * @param string $content
     * @return string
     */
    public function parse(string $content): string
    {
        return $this->parsedown->text($content);
    }
}
