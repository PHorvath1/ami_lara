<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 *
 * @property int id
 * @property string content
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Comment extends Model
{
    use HasFactory, ApiResource;
}
