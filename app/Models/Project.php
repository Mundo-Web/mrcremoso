<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $filiable = [
        'titulo',
        'descripcion',
        'steps',
        'imagen',
        'status'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
