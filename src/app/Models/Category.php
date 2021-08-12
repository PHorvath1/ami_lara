<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $fillable = ['name'];

    /** Defines a many-to-many relationship between categories and articles
     * @return BelongsToMany The type of the relationship
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
