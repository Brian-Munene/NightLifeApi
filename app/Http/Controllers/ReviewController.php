<?php

namespace App\Http\Controllers;
use App\Review;
use App\User;
use DB;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return  $reviews;
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $this->validate($request,[
            'review' => 'required',
            'rating' => 'required'
        ]);
       $review = new Review;
       $review->user_id = $user_id;
       $review->review = $request->input('review');
       $review->rating = $request->input('rating');
       $review->save();
       return $review;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        return $review;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $this->validate($request,[
            'review' => 'required',
            'rating' => 'required'
        ]);
       $review = Review::find($id);
       $review->user_id = $user_id;
       $review->review = $request->input('review');
       $review->rating = $request->input('rating');
       $review->save();
       return $review;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return "Review Deleted";
    }
}
