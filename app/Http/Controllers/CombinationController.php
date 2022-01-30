<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Combination;

class CombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT combinations.id, coupons.total_odds FROM combinations INNER JOIN coupons ON combinations.coupon_id = coupons.id INNER JOIN matches ON combinations.match_id = matches.id
        $combinations= Combination::select('combinations.coupon_id' , 'coupons.total_odds','coupons.is_vip','coupons.coupon_name', 'coupons.system_name','coupons.starting_date', 'coupons.coupon_status',  'matches.*')
        ->join('coupons', 'combinations.coupon_id', '=', 'coupons.id')
        ->join('matches', 'combinations.match_id', '=', 'matches.id')
        ->groupBy('coupon_id')->orderBy('id', 'desc')
        ->get();
        return response()->json($combinations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $combinations = new Combination;
        $combinations->id = $request->id;
        $combinations->coupon_id = $request->coupon_id;
        $combinations->match_id = $request->match_id;

        

        $combinations->save();

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
        $combinations = Combination::select('combinations.coupon_id' , 'coupons.total_odds', 'coupons.coupon_name', 'coupons.starting_date', 'coupons.coupon_status', 'matches.*')
        ->join('coupons', 'combinations.coupon_id', '=', 'coupons.id')
        ->join('matches', 'combinations.match_id', '=', 'matches.id')
        ->where("coupon_id",$id)->get();
        return $combinations;

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
        $combinations = Combination::find($id);
        $combinations->id = $request->id;
        $combinations->coupon_id = $request->coupon_id;
        $combinations->match_id = $request->match_id;
        $combinations->update();
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
        Combination::destroy($id);
        return response()->json('Veri başarıyla silindi.');
    }
}
