<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required',
        'size' => 'required',
        'observation' => 'required',
        'trademarks_id' => 'required',
        'inventory_quantity' => 'required',
        'boarding_date' => 'required'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'size',
        'observation',
        'trademarks_id',
        'inventory_quantity',
        'boarding_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    public function Trademark(){
        return $this->hasOne('App\Models\Trademark', 'id', 'trademarks_id');
    }

}
