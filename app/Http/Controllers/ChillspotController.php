<?php

namespace App\Http\Controllers;
use App\Chillspot;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Resources\ChillspotResource;

class ChillspotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chillspots = Chillspot::all();

        return $chillspots;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user_id = auth()->user()->id;
        //$user = User::find($user_id);
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'rating' => 'required',
            'owner_id' => 'required'
        ]);
        
        $chillspot = new Chillspot;
        $chillspot->name = $request->input('name');
        $chillspot->category = $request->input('category');
        $chillspot->latitude = $request->input('latitude');
        $chillspot->longitude = $request->input('longitude');
        $chillspot->rating = $request->input('rating');
        $chillspot->owner_id = $request->input('owner_id');
       // $chillspot->owner_id = $user_id;

        $chillspot->save();
        return "Location Saved";
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chillspot = Chillspot::find($id);

        return $chillspot;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chillspot = Chillspot::finf($id);
        $chillspot->delete();
        return "Location Removed";
    }
}
