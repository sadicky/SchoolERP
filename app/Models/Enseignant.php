<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enseignant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="tbl_enseignants";
    protected $primaryKey = 'enseignant_id';
        
    public $fillable = [
        'nom',
        'prenom',
        'postnom',
        'email',
        'contact',
        'sexe',
        'adresse',
        'description',
        'nationalite',
        'groupe_sanguin',
        'image',
        'category_option_id',
        'grade',
        'user_id ',
        'status'
    ];
    public $timestamps = false;
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class,'user_id');
    }

}
