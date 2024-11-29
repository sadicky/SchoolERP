<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Periode extends Model
{
    use HasFactory; 
    protected $table="tbl_periodes";
    protected $primaryKey = 'periode_id';
    
    public $fillable = ['periode_name','category_option_id','status'];
    public $timestamps = false;

    // public function Categories(){
    //     return $this->hasMany(Category::class,'category_option_id','periode_id');
    // }


}
