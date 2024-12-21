<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenceE extends Model
{
    use HasFactory;
    protected $table="tbl_presences";
    protected $primaryKey = 'presence_id';
    
    public $fillable = ['eleve_id','classe_id','date_presence','presence','motif','justify'];
    public $timestamps = false;
}
