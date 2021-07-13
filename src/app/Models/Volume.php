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
 * @property int release_year
 * @property string description
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property string name
 * @property string name_str
 */
class Volume extends Model
{
    use HasFactory, ApiResource;

    protected $appends = ['name'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function getNameAttribute(): string
    {
        return $this->name_str ?? "#$this->id";
    }

    public function setNameAttribute($value)
    {
        $this->name_str = $value;
    }
}
