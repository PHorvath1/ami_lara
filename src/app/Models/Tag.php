<?php

namespace App\Models;

use App\Traits\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App\Models
 *
 * @property string name
 */
class Tag extends Model
{
    use HasFactory, ApiResource;
}
