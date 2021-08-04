<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Article
 * @package App\Models
 *
 * @property string id
 * @property string user_id
 * @property string editor_id
 * @property string title
 * @property string abstract
 * @property int state
 * @property Timestamp deleted_at
 * @property Timestamp created_at
 * @property Timestamp updated_at
 * @property int page_count
 * @property string note
 * @property string language
 * @property string doi
 * @property string source
 * @property int type_id
 * @property string latex_path
 * @property Collection categories
 * @property User user
 * @property User editor
 * @property Type type
 */
class Article extends Model
{
    use HasFactory, ApiResource, UUID;

    protected $fillable = ['title', 'abstract', 'state', 'users'];

    private const STATES = [ 'UNDER_REVIEW', 'ACCEPTED', 'REJECTED' ];

    protected $appends = ['stateText'];

    /**
     * Gets the available states
     * @return string[] The states
     */
    public function getStates(): array{
        return self::STATES;
    }

    /** Returns the state of the article.
     * @return string The state of the article, or UNKNOWN if not in STATES.
     */
    public function getStateTextAttribute(){
        return $this->state > count(self::STATES) || $this->state < 0
            ? 'UNKNOWN'
            : self::STATES[$this->state];

    }

    /** Set the state of the article
     * @throws InvalidParameterException If state text is not found in STATES
     */
    public function setStateTextAttribute($value){
        $value = Str::of($value)->replace(' ', '_')->upper();
        $index = array_search($value, self::STATES, false);
        if ($index < 0) throw new InvalidParameterException('Unknown State');

        $this->state = $index;
        $this->save();
    }

    /** Defines a one-to-one relationship between articles and users
     * @return BelongsTo The type of the relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Defines a one-to-one relationship between articles and users (editors)
     * @return BelongsTo The type of the relationship
     */
    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'editor_id');
    }

    /** Defines a many-to-one relationship between articles and volumes
     * @return BelongsTo The type of the relationship
     */
    public function volumes(): BelongsTo
    {
        return $this->belongsTo(Volume::class);
    }

    /** Defines a one-to-many relationship between articles and revisions
     * @return HasMany The type of the relationship
     */
    public function revisions(): HasMany {
        return $this->hasMany(Revision::class);
    }

    /** Defines a many-to-many relationship between articles and categories
     * @return BelongsToMany The type of the relationship
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /** Defines a 1-to-many relationship between articles and tags
     * @return HasOne The type of the relationship
     */
    public function type(): HasOne
    {
        return $this->hasOne(Type::class);
    }
}
