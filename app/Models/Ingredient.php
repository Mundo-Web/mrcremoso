<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $filiable = [
        'project_id',
        'titulo',
        'imagen'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
