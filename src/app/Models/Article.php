<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;
use Symfony\Component\Routing\Exception\InvalidParameterException;;

/**
 * Class Article
 * @package App\Models
 *
 * @property string id
 * @property string name
 * @property string summary
 * @property int state
 * @property DateTime deleted_at
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property int page_count
 * @property string article_type
 * @property string note
 * @property string related_url
 * @property string language
 * @property string doi
 * @property Collection categories
 * @property Collection users
 */
class Article extends Model
{
    use HasFactory, ApiResource, UUID;

    private const STATES = [ 'UNDER_REVIEW', 'ACCEPTED', 'REJECTED' ];

    protected $appends = ['stateText'];

    /** Returns the state of the article.
     * @return string The state of the article, or UNKNOWN if not in STATES.
     */
    public function getStateTextAttribute(){
        return $this->state > count(self::STATES) || $this->state < 0
            ? 'UNKNOWN'
            : self::STATES[$this->state];

    }

    /** Defines a one-to-many relationship between articles and revisions
     * @return HasMany The type of the relationship
     */
    public function revisions(): HasMany {
        return $this->hasMany(Revision::class);
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

    /** Defines a many-to-many relationship between articles and users
     * @return BelongsToMany The type of the relationship
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /** Defines a many-to-many relationship between articles and volumes
     * @return BelongsToMany The type of the relationship
     */
    public function volumes(): BelongsToMany
    {
        return $this->belongsToMany(Volume::class);
    }

    /** Defines a many-to-many relationship between articles and categories
     * @return BelongsToMany The type of the relationship
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /** Defines a many-to-many relationship between articles and tags
     * @return BelongsToMany The type of the relationship
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
