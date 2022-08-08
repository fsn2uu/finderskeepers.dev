<?php

namespace App\Http\Controllers;

use App\Models\Hirling;
use App\Models\Comment;
use Illuminate\Http\Request;

class HirlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hirlings = Hirling::all();

        return view('hirlings.index')
            ->withHirlings($hirlings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hirlings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hirling = Hirling::create($request->except(['_token', 'comment']));

        if($request->has('comment'))
        {
            $comment = new Comment(['body' => $request->comment]);
            $hirling->comments()->save($comment);
        }

        return redirect()->route('hirlings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hirling  $hirling
     * @return \Illuminate\Http\Response
     */
    public function show(Hirling $hirling)
    {
        return view('hirlings.show')
            ->withHirling($hirling);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hirling  $hirling
     * @return \Illuminate\Http\Response
     */
    public function edit(Hirling $hirling)
    {
        return view('hirlings.edit')
            ->withHirling($hirling);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hirling  $hirling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hirling $hirling)
    {
        $hirling->update($request->except(['_token', 'comment']));

        if($request->has('comment'))
        {
            $comment = new Comment(['body' => $request->comment]);
            $hirling->comments()->save($comment);
        }

        return redirect()->route('hirlings.show', $hirling);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hirling  $hirling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hirling $hirling)
    {
        $hirling->delete();

        return redirect()->route('hirlings.index');
    }
}
