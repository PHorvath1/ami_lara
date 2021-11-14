<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Volume
 * @package App\Models
 *
 * @property int id
 * @property string title
 * @property string title_str
 * @property int release_year
 * @property string description
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Volume extends Model
{
    use HasFactory, ApiResource;

    protected $appends = ['title'];

    protected $fillable = ['title', 'description', 'release_year'];

    /** Returns the title of the volume
     * @return string
     */
    public function getTitleAttribute(): string
    {
        return $this->title_str ?? "#$this->id";
    }

    /** Sets the title of the volume
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->title_str = $value;
    }

    /** Defines a one-to-many relationship between volumes and articles
     * @return HasMany The type of the relationship
     */
    public function articles(): HasMany
    {
        return $this->HasMany(Article::class);
    }
}
