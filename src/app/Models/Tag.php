<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 * @package App\Models
 *
 * @property string name
 */
class Tag extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['name'];

    /** Defines a many-to-many relationship between tags and articles
     * @return BelongsToMany The type of the relationship
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
