<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Volume
 * @package App\Models
 *
 * @property int id
 * @property int release_year
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Volume extends Model
{
    use HasFactory, ApiResource;
}
