<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use App\Models\Comment;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quests = Quest::all();

        return view('quests.index')
            ->withQuests($quests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quest = Quest::create($request->except(['_token', 'comment']));
        if($request->has('comment'))
        {
            $comment = new Comment(['body' => $request->comment]);
            $quest->comments()->save($comment);
        }
        return redirect()->route('quests.show', $quest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        return view('quests.show')
            ->withQuest($quest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        return view('quests.edit')
            ->withQuest($quest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quest $quest)
    {
        $quest->update($request->except(['_token', 'comment']));

        if($request->has('comment'))
        {
            $comment = new Comment(['body' => $request->comment]);
            $quest->comments()->save($comment);
        }

        return redirect()->route('quests.show', $quest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        $quest->delete();

        return redirect()->route('quests.index');
    }
}
