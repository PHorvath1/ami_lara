<?php


namespace App\Utils;


use Closure;

class ArrayReplacer
{

    public function __construct(
        protected array $baseArray,
        protected string $needle,
        protected string $replacement = ''
    ) {
    }

    public function to(string $replacement): static
    {
        $this->replacement = $replacement;
        return $this;
    }

    public function byApplying(Closure $function): ArrayReplacer
    {
        $this->baseArray[$this->replacement] = $function($this->baseArray[$this->needle]);
        unset($this->baseArray[$this->needle]);
        return $this;
    }

    public function toSimpleArray(): array
    {
        return $this->baseArray;
    }

    public function butSwitch(string $needle): static
    {
        $this->needle = $needle;
        return $this;
    }
}
