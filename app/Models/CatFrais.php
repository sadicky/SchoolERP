<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatFrais extends Model
{
    use HasFactory;
    protected $table="tbl_category_frais";
    protected $primaryKey = 'category_frais_id';
    
    public $fillable = ['category_name','status'];
}
