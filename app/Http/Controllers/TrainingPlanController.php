<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\TrainingPlan\CreateRequest;
use App\Http\Requests\TrainingPlan\DeleteRequest;
use App\Http\Requests\TrainingPlan\UpdateRequest;
use App\Models\Category;
use App\Models\Coach;
use App\Models\TrainingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TrainingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('TrainingPlans/Index', [
            'trainingPlans' => TrainingPlan::with('coach.user', 'categories')
                ->when(auth()->user()->role_id === RoleEnum::COACH->value, function ($query) {
                    $query->where('coach_id', auth()->user()->coach->id);
                })
                ->orderByDesc('created_at')
                ->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('TrainingPlans/Create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $trainingPlan = TrainingPlan::create([
            'name' => $request->name,
            'description' => $request->description,
            'coach_id' => Coach::where('user_id', auth()->user()->id)->value('id'),
        ]);

        $trainingPlan->categories()->sync($request->categories_ids);

        return redirect()->route('training-plans.index')->with('success', 'Training Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingPlan $trainingPlan)
    {
        return Inertia::render('TrainingPlans/Show',
            ['trainingPlan' => $trainingPlan->load('coach.user', 'categories')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingPlan $trainingPlan)
    {
        return Inertia::render('TrainingPlans/Edit', [
            'trainingPlan' => $trainingPlan->load('categories'),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, TrainingPlan $trainingPlan)
    {
        $trainingPlan->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $trainingPlan->categories()->sync($request->categories_ids);

        return redirect()->route('training-plans.index')->with('success', 'Training Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingPlan $trainingPlan, DeleteRequest $request)
    {
        $trainingPlan->categories()->detach();
        $trainingPlan->delete();

        return redirect()->route('training-plans.index')->with('success', 'Training Plan deleted successfully.');
    }
}
