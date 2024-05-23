<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TrainingPlan extends Model
{
    protected $fillable = ['name', 'description', 'coach_id'];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'training_plans_categories', 'training_plan_id', 'category_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'training_plans_members', 'training_plan_id', 'user_id');
    }
}
