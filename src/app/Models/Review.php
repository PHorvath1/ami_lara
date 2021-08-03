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
 * @property int state
 * @property string content
 */
class Review extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['state', 'content', 'user'];

    private const STATES = [ 'WAITING', 'DECLINED', 'ACCEPTED', 'NOT_SPECIFIED', 'REJECTED', 'REQUEST', 'APPROVED' ];

    protected $appends = ['stateText'];

    /**
     * Gets the available states
     * @return string[] The states
     */
    public function getStates(): array{
        return self::STATES;
    }

    /** Returns the state of the review.
     * @return string The state of the review, or UNKNOWN if not in STATES.
     */
    public function getStateTextAttribute(){
        return $this->state > count(self::STATES) || $this->state < 0
            ? 'UNKNOWN'
            : self::STATES[$this->state];

    }

    /** Set the state of the review
     * @throws InvalidParameterException If state text is not found in STATES
     */
    public function setStateTextAttribute($value){
        $value = Str::of($value)->replace(' ', '_')->upper();
        $index = array_search($value, self::STATES, false);
        if ($index < 0) throw new InvalidParameterException('Unknown State');

        $this->state = $index;
        $this->save();
    }

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
