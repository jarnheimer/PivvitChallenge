<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @package App
 *
 * @property int    $id
 * @property string $customer_name
 * @property int    $offering_id
 * @property int    $quantity
 */
class Purchase extends Model
{
    protected $table = 'purchases';

    protected $guarded = [];

    public $timestamps = false;

    public function offering()
    {
        return $this->belongsTo(Offering::class);
    }
}
