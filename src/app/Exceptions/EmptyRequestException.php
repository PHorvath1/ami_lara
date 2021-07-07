<?php


namespace App\Exceptions;


use Exception;
use JetBrains\PhpStorm\Pure;

class EmptyRequestException extends Exception
{
    #[Pure] function __construct(
        protected string $class,
        protected string $fileName = '',
        protected int $line = 0,
        protected string $functionName = ''
    ) {
        parent::__construct("Empty instance of '$this->class' request caught at $this->fileName:$this->line in $this->functionName"
        );
    }
}
