<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    

    protected $table="tbl_admins";
    protected $primaryKey = 'admin_id';
    
    public $fillable = [
        'nom',
        'prenom',
        'postnom',
        'email',
        'contact',
        'sexe',
        'user_id ',
        'statut'
    ];
    public $timestamps = false;
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class,'user_id'); 
    }
}
