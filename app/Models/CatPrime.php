<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPrime extends Model
{
    use HasFactory;
    protected $table="tbl_category_prime";
    protected $primaryKey = 'category_prime_id';
    
    public $fillable = ['category_prime','status'];
}
