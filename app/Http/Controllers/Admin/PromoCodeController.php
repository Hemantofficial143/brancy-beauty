<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $promoCodes = new PromoCode();
        $promoCodes = $promoCodes->paginate(10);

        return view('admin.coupon.list',['promoCodes' => $promoCodes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'code' => ['required','unique:'.(new PromoCode())->getTable()],
            'type' => ['required'],
        ],[
            'code.required' => 'Coupon code is required.',
            'code.unique' => 'Coupon code already used.',
        ]);


        $promocode = new PromoCode();
        $promocode->code = $data['code'];
        $promocode->type = $data['type'];
        $promocode->value = $data['value'];
        if(!empty($data['min_order_value'])){
            $promocode->min_order_value = $data['min_order_value'];
        }
        $promocode->save();


        return ['success' => true, 'data' => $promocode,'message' => 'promo code created successfully.'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        PromoCode::find($id)->delete();
        return ['success' => true, 'message' => 'Promo code deleted successfully.'];
    }
}
