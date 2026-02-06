<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ShopController extends Controller
{
    /**
     * Handle item purchase.
     */
    public function buy(Request $request): JsonResponse
    {
        $request->validate([
            'item' => 'required|string',
            'price' => 'required|integer|min:0',
        ]);

        $user = $request->user();
        $price = (int)$request->input('price');

        try {
            $result = DB::transaction(function () use ($user, $price) {
                // Refetch user inside transaction to avoid stale values
                $freshUser = $user->fresh();

                if ($freshUser->balance < $price) {
                    return [
                        'success' => false,
                        'message' => 'Niet genoeg punten.',
                        'balance' => $freshUser->balance,
                    ];
                }

                $freshUser->balance -= $price;
                $freshUser->save();

                return [
                    'success' => true,
                    'message' => 'Aankoop gelukt.',
                    'balance' => $freshUser->balance,
                ];
            }, 5); // 5 retries

            if (!$result['success']) {
                return response()->json($result, 400);
            }

            return response()->json($result);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Er is iets misgegaan. Probeer opnieuw.',
            ], 500);
        }
    }
}
