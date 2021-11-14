<?php

namespace App\Actions\File;

use App\Http\Requests\ArticleCreateRequest;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FileManager
{
    /**
     * Upload a file
     * @throws BadRequestHttpException if request doesn't have input named $fileInputName
     * @throws FileException if file couldn't be moved or created
     * @returns string|bool Path of uploaded file or false on fail
     */
    public function upload(\App\Http\Requests\ExtendedFormRequest $request, string $fileInputName, string $path = '', $throwErrorOnMissingFile = false): string|bool {
        $hasFile = $request->hasFile($fileInputName);

        if (!$hasFile && $throwErrorOnMissingFile) throw new BadRequestHttpException("Request does not have input file named $fileInputName");

        if ($hasFile) {
            $uploadedFile = $request->file($fileInputName);
            return $uploadedFile->move("uploads/$path", Str::random(8) . '.' . $uploadedFile->getClientOriginalExtension())->getFilename();
        }
        return false;
    }
}
