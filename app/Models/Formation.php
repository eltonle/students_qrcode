<?php

namespace App\Models;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'mat_code','created_by','updated_by'];

    public function etudiants()
    {
    return $this->hasMany(Etudiant::class);
    }
}
