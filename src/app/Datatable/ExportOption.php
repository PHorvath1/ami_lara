<?php


namespace App\Datatable;


class ExportOption
{


    public function __construct(array $options = [])
    {
        foreach ($options as $option => $value) {
            $this->{$option} = $value;
        }
    }

    public function add(string $key, string $value): static
    {
        $this->{$key} = $value;
        return $this;
    }
}
