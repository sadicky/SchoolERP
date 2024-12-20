<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Communique extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="tbl_communiques";
    
    // protected $guarded = []; 
    public $fillable = [
        'description',
        'date_communique',
        'statut_communique',
        'concerned',
        'annee_id',
        'status'
    ];
    
    protected $primaryKey = 'communique_id';
    public $timestamps = false; 	

}
