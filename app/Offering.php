<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offering
 *
 * @package App
 *
 * @property int    $id
 * @property string $title
 * @property float  $price
 */
class Offering extends Model
{
    protected $table = 'offerings';
}
