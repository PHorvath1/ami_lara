<?php


namespace App\Datatable;


class Button
{
    public function __construct(public string $extend)
    {
    }


    public function where(string $string): static
    {
        $this->exportOption = new ExportOption(['columns' => $string]);
        return $this;
    }

    public function isIn(array $array): bool
    {
        foreach ($array as $item) {
            if (strtolower($item) === $this->extend) {
                return true;
            }
        }
        return false;
    }

    public function currentOnly(){
        if(!$this->exportOption){
            $this->exportOption = new ExportOption(['page' => 'current']);
        }else{
            $this->exportOption->add('page', 'current');
        }

        return $this;
    }
}
