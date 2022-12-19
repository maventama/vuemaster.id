<?php

namespace App\Http\Middleware;

use App\Models\MemberPurchaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth.user' => auth()->user(),
            'flash' => [
                'alert' => $request->session()->get('alert'),
            ],
            'active_buy' => DB::select("SELECT
                *
                FROM member_purchases
                WHERE (
                    is_life_time = 'yes'
                    OR
                    (
                        start_active <= '".date('Y-m-d')."'
                        AND
                        end_active >=  '".date('Y-m-d')."'
                    )
                )
                AND is_paid = 'yes'
                AND deleted_at IS NULL
                ORDER BY id DESC
                LIMIT 1
            ")
        ]);
    }
}
