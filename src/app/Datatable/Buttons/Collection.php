<?php


namespace App\Datatable\Buttons;


use App\Datatable\Button;
use App\Datatable\Datatable;
use JetBrains\PhpStorm\Pure;

class Collection extends Button
{

    public array $buttons;
    public string $text;

    #[Pure] public static function of(array $array): static
    {
        $collection = new static('collection');
        foreach ($array as $item){
            $collection->buttons[] = new Button($item);
        }
        return $collection;
    }

    public function text(string $string): static
    {
        $this->text = $string;
        return $this;
    }

    public function foreach(\Closure $param): static
    {
        foreach ($this->buttons as $button) {
            $param($button);
        }
        return $this;
    }

    public function for(array $array, \Closure $param): static
    {
        /** @var Button $button */
        foreach ($this->buttons as $button) {
            if ($button->isIn($array)) {
                $param($button);
            }
        }
        return $this;
    }

    public static function exports(): Collection
    {
        return self::of(['copy', 'print', 'csv', 'excel'])
            ->foreach(fn (Button $btn) => $btn->where('th:not(:last-child)'))
            ->for(['csv', 'excel'], fn(Button $btn) => $btn->filename = Datatable::DefaultFilename())
            ->text('Export All');
    }
}
