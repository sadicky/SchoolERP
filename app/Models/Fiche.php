<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;
    protected $table="tbl_notes";
    protected $primaryKey = 'note_id';
    public $timestamps = false;

    public $fillable = [
        'eleve_id','cours_id','periode_id','annee_id','category_note_id','note',
        'ponderation','sanction','motif','date_note','status'
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
