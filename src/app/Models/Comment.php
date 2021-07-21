<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 * @package App\Models
 *
 * @property int id
 * @property string content
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property string user_id
 * @property int revision_id
 */
class Comment extends Model
{
    use HasFactory, ApiResource;

    /** Defines an inverse one-to-many relationship between comments and users
     * @return BelongsTo The type of the relationship
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'uuid', 'id');
    }

    /** Defines an inverse one-to-many relationship between comments and revisions
     * @return BelongsTo The type of the relationship
     */
    public function revision(): BelongsTo {
        return $this->belongsTo(Revision::class, 'id', 'revision_id');
    }

}
