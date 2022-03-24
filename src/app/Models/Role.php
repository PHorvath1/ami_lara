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
 * @property string name
 * @property string title
 * @property int level
 * @property int scope
 */
class Role extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['name', 'title','level','scope'];
}
