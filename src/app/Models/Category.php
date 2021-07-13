<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property Collection articles
 */
class Category extends Model
{
    use HasFactory, ApiResource;

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
