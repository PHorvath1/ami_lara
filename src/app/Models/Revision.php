<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected $fillable = ['note', 'pdf_path', 'article_id'];

    /** Defines a one-to-many relationship between revisions and comments
     * @return HasMany The type of the relationship
     */
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    /** Defines an inverse one-to-many relationship between revisions and articles
     * @return BelongsTo The type of the relationship
     */
    public function article(): BelongsTo {
        return $this->belongsTo(Article::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)->withPivot(['state', 'content']);
    }
}
