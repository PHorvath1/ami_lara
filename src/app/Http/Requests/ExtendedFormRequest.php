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

    /**
     * Extracts an array from a string field where the items are separated by the $separator. Also trims the results.
     * @param string $field_name Field to extract
     * @param string $separator Separator between elements
     * @return array Items
     */
    public function extract(string $field_name, string $separator): array{
        return array_map(
            fn(string $item) => trim($item),
            explode($separator, $this->validated()[$field_name])
        );
    }
}
