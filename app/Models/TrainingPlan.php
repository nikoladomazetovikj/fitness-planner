<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'coach_id'];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
