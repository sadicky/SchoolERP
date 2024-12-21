<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prime extends Model
{
    use HasFactory,SoftDeletes; 
    protected $table="tbl_primes";
    
    // protected $guarded = []; 
    public $fillable = [
        'category_prime_id',
        'montant',
        'matricule',
        'date_prime',
        'user_id',
        'status'
    ];
    
    protected $primaryKey = 'prime_id';
    public $timestamps = false;
}
