<?php


namespace App\Http\Requests;


use App\Utils\ArrayReplacer;
use Illuminate\Foundation\Http\FormRequest;

class ExtendedFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function butSwitch(string $needle): ArrayReplacer
    {
        return new ArrayReplacer($this->validated(), $needle);
    }
}
