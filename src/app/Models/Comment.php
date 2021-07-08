<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Class Comment
 * @package App\Models
 *
 * @property int id
 * @property string content
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property string user_id
 */
class Comment extends Model
{
    use HasFactory, ApiResource;

    public function user(): Relation {
        return $this->belongsTo(User::class, 'uuid', 'id');
    }

}
