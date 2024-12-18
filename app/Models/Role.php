<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table="tbl_roles";
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    

    public $fillable = ['role_name','status'];	
    public function users()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
