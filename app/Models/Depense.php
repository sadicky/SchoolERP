<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depense extends Model
{
    use HasFactory,SoftDeletes; 
    protected $table="tbl_depenses";
    
    // protected $guarded = []; 
    public $fillable = [
        'montant',
        'beneficiaire',
        'motif',
        'date_depense',
        'status'
    ];
    
    protected $primaryKey = 'depense_id';
    public $timestamps = false;
}
