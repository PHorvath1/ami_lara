<?php

namespace App\Http\Requests;

use App\Exceptions\EmptyRequestException;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ArticleRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'pdf' => ['file'],
            'name' => [ 'required', 'min:10' ],
            'summary' => [ 'required', 'min:10' ],
            'state' => [ 'required' ],
            'page_count' => [ 'required' ],
            'article_type' => [ 'required' ],
            'note' => [],
            'related_url' => [],
            'doi' => [],
            'language' => []

        ];
    }

    /**
     * Upload a file
     * @throws BadRequestHttpException if request doesn't have input named $fileInputName
     * @throws FileException if file couldn't be moved or created
     * @returns string|bool Path of uploaded file or false on fail
     */
    public function upload(string $fileInputName, string $path = '', $throwErrorOnMissingFile = false): string|bool {
        $hasFile = $this->hasFile($fileInputName);

        if (!$hasFile && $throwErrorOnMissingFile) throw new BadRequestHttpException("Request does not have input file named $fileInputName");

        if ($hasFile) {
            $uploadedFile = $this->file($fileInputName);
            return $uploadedFile->move("uploads/$path", Str::random(8) . '_' . $uploadedFile->getClientOriginalExtension())->getFilename();
        }
        return false;
    }
}
