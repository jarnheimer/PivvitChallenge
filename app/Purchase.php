<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @package App
 *
 * @property int    $id
 * @property string $customerName
 * @property int    $offering_id
 * @property int    $quantity
 */
class Purchase extends Model
{
    protected $table = 'purchases';

    public function offering()
    {
        $this->belongsTo(\OfferingSeeder::class);
    }
}
