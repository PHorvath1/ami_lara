<?php


namespace App\Datatable;


class DatatableLayout
{
    private string $dom = '';

    public function __construct()
    {
    }

    public function __toString(): string
    {
        return $this->dom;
    }

    public function filteringInput(): static
    {
        $this->dom .= 'f';
        return $this;
    }

    public function Buttons(): static
    {
        $this->dom .= 'B';
        return $this;
    }

    public function processingDisplayElement(): static
    {
        $this->dom .= 'r';
        return $this;
    }

    public function table(): static
    {
        $this->dom .= 't';
        return $this;
    }

    public function informationSummary(): static
    {
        $this->dom .= 'i';
        return $this;
    }

    public function pagination(): static
    {
        $this->dom .= 'p';
        return $this;
    }
}
