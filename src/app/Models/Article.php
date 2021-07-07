<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 *
 * @property string $id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Article extends Model
{
    use HasFactory, ApiResource;
}
