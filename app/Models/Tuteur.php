<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    use HasFactory;
    protected $table="tbl_tuteurs";
    protected $primaryKey = 'tuteur_id';
    public $timestamps = false;
    

    protected $guard = "tuteurs";
    public $fillable = [
        'nom','prenom','postnom','relation','email','contact','sexe','adresse',
        'profession','nationalite','photo','user_id'
    ];

    public function user(){
        return $this->belongsTo(Utilisateur::class,'user_id');
    }

    public function eleves(){
        return $this->hasMany(Eleve::class,'tuteur_id');
    }
}
