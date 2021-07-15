<?php

namespace App\Providers;

use App\Mixins\PaginatorMixin;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;

/**
 * Class MixinServiceProvider
 * @package App\Providers
 *
 * Mixins are like Extension methods in C#, however there is no auto discover. You need to register each mixin here
 */
class MixinServiceProvider extends ServiceProvider
{
    /** @var string[][] $mixins Always mix */
    private array $mixins = [
        //[ORIGINAL::class, MIXIN::class]
    ];

    /** @var string[][] $testingMixins Mix only when testing */
    private array $testingMixins = [];

    public function register()
    {
        foreach ($this->mixins as $mixin) {
            $mixin[0]::mixin(new $mixin[1]);
        }

        if ($this->app->environment('testing')) {
            foreach ($this->testingMixins as $class => $mixin) {
                $mixin[0]::mixin(new $mixin[1]);
            }
        }
    }
}
