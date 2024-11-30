<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $table="tbl_cours";
    protected $primaryKey = 'cours_id';
    
    public $fillable = ['cours_name','manuel','status'];
}
