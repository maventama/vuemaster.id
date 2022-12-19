<?php

namespace App\Http\Controllers;

use App\Models\PricingModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlanController extends Controller
{
    public function tap_to_payment(Request $request)
    {
        $plan = PricingModel::find($request->get('buy_plan_id'));
        $data = [
            'plan' => $plan
        ];
        return Inertia::render('TapPlan', $data);
    }
}
