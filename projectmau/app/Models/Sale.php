<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey = 'sale_id';
    public function Medicine(){
        return $this->belongsTo(Medicine::class,'medicine_id','medicine_id');

    }
    
    protected $fillable = ['sale_id','medicine_id','quantity','sale_date','customer_phone'];
}
