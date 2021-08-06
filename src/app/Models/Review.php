<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Review
 * @package App\Models
 *
 * @property int id
 * @property string content
 */
class Review extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['content', 'user'];

    /** Defines a one-to-many relationship between reviews and users
     * @return BelongsTo The type of the relationship
     */
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    /** Defines a one-to-many relationship between reviews and revisions
     * @return BelongsTo The type of the relationship
     */
    public function revision() : BelongsTo {
        return $this->belongsTo(Revision::class);
    }
}
