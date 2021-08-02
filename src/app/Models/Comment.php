<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;
use Symfony\Component\Routing\Exception\InvalidParameterException;

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
 * @property int review_num
 */
class Comment extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['content', 'user_id', 'revision_id'];

    private const REVIEWS = ['NOT SPECIFIED', 'DECLINED', 'REQUEST CHANGES', 'APPROVED' ];

    public static function getReviews(): array{
        return self::REVIEWS;
    }

    public function getReviewTextAttribute(){
        return $this->review_num > count(self::REVIEWS) || $this->review_num < 0
            ? 'UNKNOWN'
            : self::REVIEWS[$this->review_num];
    }

    public function setReviewTextAttribute($value){
        $value = Str::of($value)->upper();
        $index = array_search($value, self::REVIEWS, false);
        if ($index < 0) throw new InvalidParameterException('Unknown State');
        $this->review_num = $index;
        $this->save();
    }

    /** Defines an inverse one-to-many relationship between comments and users
     * @return BelongsTo The type of the relationship
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /** Defines an inverse one-to-many relationship between comments and revisions
     * @return BelongsTo The type of the relationship
     */
    public function revision(): BelongsTo {
        return $this->belongsTo(Revision::class);
    }

}
