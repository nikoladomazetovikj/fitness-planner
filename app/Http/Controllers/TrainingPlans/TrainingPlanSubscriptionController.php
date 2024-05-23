<?php

namespace App\Http\Controllers\TrainingPlans;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingPlan\SubscribeRequest;
use App\Models\TrainingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrainingPlanSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscribeRequest $request)
    {
        $trainingPlan = TrainingPlan::find($request->id);

        $trainingPlan->members()->sync([auth()->user()->id]);

        return redirect()->route('training-plans.index')->with('success', 'Subscribed successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingPlan $trainingPlan, SubscribeRequest $request)
    {
        $trainingPlan->members()->detach(auth()->user()->id);

        return redirect()->route('training-plans.index')->with('success', 'Unsubscribed successfully.');
    }
}
