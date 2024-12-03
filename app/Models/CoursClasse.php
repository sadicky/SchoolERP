<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursClasse extends Model
{
    use HasFactory;
    protected $table="tbl_cours_classes";
    protected $primaryKey = 'cours_classes_id';
    
    public $fillable = ['cours_id','classe_id','ponderation','status'];
    public $timestamps = false;
}
