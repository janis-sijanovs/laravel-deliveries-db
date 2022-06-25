<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'addresses';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function last_delivery()
    {
        return $this->hasOne(Delivery::class)->latest();
    }
}
