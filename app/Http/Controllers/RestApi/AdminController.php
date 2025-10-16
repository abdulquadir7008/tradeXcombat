<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paymentMethodLimit;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

   public function create_payment_method(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'method_id'     => 'required|string|max:50|unique:payment_methods,method_id',
            'method_name' => 'required|string|max:50',
            'min_amount'   => 'required|numeric|min:0',
            'max_amount'   => 'required|numeric|gte:min_amount',
            'method_icon'  => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()]);
        }

        try {
            $icon_path = null;

            if ($request->hasFile('method_icon')) {
                $file = $request->file('method_icon');
                $icon_path = $file->store('payment_method_icons', 'public');
            }

            $method = paymentMethodLimit::create([
                'method_id'     => $request->method_id,
                'method_name' => $request->method_name,
                'min_amount'   => $request->min_amount,
                'max_amount'   => $request->max_amount,
                'method_icon'  => $icon_path,
                'status'  => $request->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create Payment Method',
                'error' => $e->getMessage()
            ], 200);
        }

        return response()->json([
            'message' => 'Payment type created successfully',
            'status' => true,
            'response' => [
                'id' => $method->id,
                'methodId'     => $method->method_id,
                'method_name' => $method->method_name,
                'min_amount'   => (float) $method->min_amount,
                'max_amount'   => (float) $method->max_amount,
                'method_icon'  => asset('storage/app/public/' . $method->method_icon),
                'status' => $method->status
            ]
        ], 200);
    }

}
