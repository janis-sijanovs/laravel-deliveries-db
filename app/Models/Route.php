<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'routes';

    protected $primaryKey = 'id';

    protected $fillable = ['date, car_number, status, driver_name'];

    public function routeDeliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
