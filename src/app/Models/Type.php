<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Type
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property boolean active
 */
class Type extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['name', 'active'];

    /**
     * Defines an inverse one-to-many relationship between the articles and the types.
     * @return BelongsTo The type of the relationship
     */
    public function article(): BelongsTo{
        return $this->belongsTo(Article::class);
    }

}
