<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;
    protected $table="tbl_annee";
    
    // protected $guarded = [];
    public $fillable = ['annee'];
    
    protected $primaryKey = 'annee_id';
}
