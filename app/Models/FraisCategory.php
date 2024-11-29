<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisCategory extends Model
{
    use HasFactory;
    protected $table="tbl_category_frais_option";
    protected $primaryKey = 'category_frais_option_id';
    
    public $fillable = ['category_frais_id','category_option_id','montant','status'];
}
