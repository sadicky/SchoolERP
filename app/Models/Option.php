<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table="tbl_options";
    protected $primaryKey = 'option_id';
    
    public $fillable = ['option_name','section_id','status'];
}
