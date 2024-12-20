<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Eleve extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="tbl_eleves";
    protected $primaryKey = 'eleve_id';
    
    
    public $fillable = [
        'nom',
        'prenom',
        'postnom',
        'email',
        'contact',
        'sexe',
        'adresse',
        'nationalite',
        'groupe_sanguin',
        'date_naissance',
        'provenance',
        'classe_id ',
        'user_id ',
        'statut'
    ];
    public $timestamps = false;

    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class,'user_id');
    }

    public function tuteur(){
        return $this->belongsTo(Tuteur::class,'tuteur_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
   
}
