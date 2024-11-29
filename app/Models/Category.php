<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table="tbl_category_options";
    protected $primaryKey = 'category_option_id';
    
    public $fillable = ['category','status'];
    public $timestamps = false;
    
    // public function Periode(){
    //     return $this->belongsTo(Periode::class,'category_option_id','periode_id');
    // }

}
