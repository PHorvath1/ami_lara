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
 */
class Volume extends Model
{
    use HasFactory, ApiResource;

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_volumes');
    }
}
