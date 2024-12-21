<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;
    protected $table="tbl_horaires";
    
    // protected $guarded = []; 
    public $fillable = [
        'jours',
        'heure_debut',
        'heure_fin',
        'cours_id',
        'classe_id',
        'date_jour',
        'status'
    ];
    
    protected $primaryKey = 'horaire_id';
    public $timestamps = false; 

}
