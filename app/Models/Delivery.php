<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $primaryKey = 'id';

    protected $fillable = ['address_id', 'route_id', 'type', 'status'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function lines()
    {
        return $this->hasMany(DeliveryLine::class);
    }
}
