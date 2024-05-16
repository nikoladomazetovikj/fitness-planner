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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'training_plans_categories', 'training_plan_id', 'category_id');
    }
}
