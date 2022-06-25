<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email'
    ];

    public function clientAddresses()
    {
        return $this->hasMany(Address::class);
    }
}
