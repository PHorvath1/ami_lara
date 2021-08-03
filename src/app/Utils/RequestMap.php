<?php


namespace App\Utils;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RequestMap
{
    /**
     * Remaps some input to a model id. For example if you have a `category` input taking the NAME of the category, but you need to store the category->id, this method will replace `category` with `category_id` and with the appropriate ID as value. Every other input field will be passed as is
     * @param FormRequest $request The Haystack. Request to validate.
     * @param string $model The Subject. The model we need to replace
     * @param string $byColumn The column that should be used for search
     * @return array Replaced and validated array
     */
    public static function nameToID(FormRequest $request, string $model, string $byColumn = 'name'): array
    {
        $snake = Str::of($model)->afterLast('\\')->snake();
        $validated = $request->validated();
        if (!$request->has("{$snake}_id")) {
            $validated["{$snake}_id"] = $model::where($byColumn, 'LIKE', $request->get($snake))?->first()?->id;
            unset($validated[$model]);
        }
        return $validated;
    }
}
