<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table="tbl_classes";
    protected $primaryKey = 'classe_id';
    
    public $fillable = ['classe_name','option_id','status'];
}
