<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    /** Defines a many-to-many relationship between volumes and articles
     * @return BelongsToMany The type of the relationship
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
