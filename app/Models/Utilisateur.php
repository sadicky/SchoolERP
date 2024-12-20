<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory;
    protected $table="tbl_users";
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    
    public $fillable = ['matricule','pwd','role_id','status'];	

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    public function tuteur(){
        return $this->hasOne(Tuteur::class,'user_id');
    }

    public function eleve(){
        return $this->hasOne(Eleve::class,'user_id');
    }
    public function admin(){
        return $this->hasOne(Admin::class,'user_id');
    }

    public function enseignant(){
        return $this->hasOne(Enseignant::class,'user_id');
    }

    // Récupérer le rôle en texte
    public function getRoleTextAttribute()
    {
        switch ($this->role_id) {
            case 1:
                return 'Admin';
            case 2:
                return 'Eleve';
            case 3:
                return 'Tuteur';
            case 4:
                return 'Enseignant';
            default:
                return 'Inconnu';
        }
    }

}
