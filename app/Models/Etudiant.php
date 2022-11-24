<?php

namespace App\Models;

use App\Models\Mention;
use App\Models\Section;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'phone',
        'formation_id',
        'section_id',
        'mention_id',
        'qr_code',
        'created_by',
        'updated_by'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }
}
