<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Class Revision
 * @package App\Models
 *
 * @property int id
 * @property string pdf_path
 * @property string latex_path
 * @property DateTime deleted_at
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property string article_id
 */
class Revision extends Model
{
    use HasFactory, ApiResource;

    public function comments(): Relation {
        return $this->hasMany(Comment::class, 'revision_id', 'id');
    }

    public function article(): Relation {
        return $this->belongsTo(Article::class, 'id', 'article_id');
    }

}
