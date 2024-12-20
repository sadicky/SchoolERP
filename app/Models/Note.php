<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="tbl_notes";
    protected $primaryKey = 'note_id';
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
