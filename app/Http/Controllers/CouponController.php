<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons= Coupon::all();
        return response()->json($coupons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupons = new Coupon;
        $coupons->id = $request->id;
        $coupons->total_odds= $request->total_odds;
        $coupons->is_system = $request->is_system;
        $coupons->system_name = $request->system_name;
        $coupons->coupon_name = $request->coupon_name;
        $coupons->starting_date = $request->starting_date;
        $coupons->is_vip = $request->is_vip;
        $coupons->coupon_status = $request->coupon_status;
        $coupons->save();
        return response()->json('Veri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coupons = Coupon::find($id);
        return response()->json($coupons);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupons = Coupon::find($id);
        $coupons->id = $request->id;
        $coupons->total_odds= $request->total_odds;
        $coupons->is_system = $request->is_system;
        $coupons->system_name = $request->system_name;
        $coupons->coupon_name = $request->coupon_name;
        $coupons->starting_date = $request->starting_date;
        $coupons->is_vip = $request->is_vip;
        $coupons->coupon_status=$request->coupon_status;
        $coupons ->update();
        return response()->json('Veri başarıyla düzenlendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::destroy($id);
        return response()->json('Veri başarıyla silindi.');
    }
}
