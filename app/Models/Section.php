<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table="tbl_section";
    protected $primaryKey = 'section_id';
    
    public $fillable = ['section_name','category_option_id','status'];
    // public $timestamps = false;
    
}
