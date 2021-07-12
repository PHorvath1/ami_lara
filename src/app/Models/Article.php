<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
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
 * @property string user_id
 * @property int page_count
 * @property string article_type
 * @property string note
 * @property string related_url
 * @property string language
 * @property string doi
 */
class Article extends Model
{
    use HasFactory, ApiResource, UUID;

    private const STATES = [ 'UNDER_REVIEW', 'ACCEPTED', 'REJECTED' ];

    protected $appends = ['stateText'];

    public function getStateTextAttribute(){
        return $this->state > count(self::STATES) || $this->state < 0
            ? 'UNKNOWN'
            : self::STATES[$this->state];

    }

    /**
     * @throws InvalidParameterException If state text is not found in STATES
     */
    public function setStateTextAttribute($value){
        $value = Str::of($value)->replace(' ', '_')->upper();
        $index = array_search($value, self::STATES, false);
        if ($index < 0) throw new InvalidParameterException('Unknown State');

        $this->state = $index;
        $this->save();
    }

    public function revisions(): Relation {
        return $this->hasMany(Revision::class, 'article_id', 'id');
    }

    public function user(): Relation {
        return $this->belongsTo(User::class, 'uuid', 'id');
    }
}
