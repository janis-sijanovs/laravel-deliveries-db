<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryLine extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'delivery_lines';

    protected $primaryKey = 'id';

    protected $fillable = ['delivery_id', 'item', 'price', 'qty'];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
