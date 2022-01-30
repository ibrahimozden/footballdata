<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Match;


class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches= Match::all();
        return response()->json($matches);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matches = new Match;
        $matches->id = $request->id;
        $matches->match_no= $request->match_no;
        $matches->match_type = $request->match_type;
        $matches->team_1= $request->team_1;
        $matches->team_2 = $request->team_2;
        $matches->match_prediction = $request->match_prediction;
        $matches->odds = $request->odds;
        $matches->match_date = $request->match_date;
        $matches->save();
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
        $matches = Match::find($id);
        return response()->json($matches);

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
        $matches = Match::find($id);
        $matches->id = $request->id;
        $matches->match_no= $request->match_no;
        $matches->match_type = $request->match_type;
        $matches->team_1= $request->team_1;
        $matches->team_2 = $request->team_2;
        $matches->match_prediction = $request->match_prediction;
        $matches->odds = $request->odds;
        $matches->match_date = $request->match_date;
        $matches ->update();
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
        Match::destroy($id);
        return response()->json('Veri başarıyla silindi.');
    }
}
