<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadStoreRequest;
use App\Http\Resources\Thread\ThreadCollection;
use App\Http\Resources\Thread\ThreadResource;
use App\Thread;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ThreadCollection
     */
    public function index()
    {
        return new ThreadCollection(Thread::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadStoreRequest $request)
    {
        return new ThreadResource(Thread::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return new ThreadResource($thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadStoreRequest $request, Thread $thread)
    {
        $thread->fill($request->all());
        $thread->save();

        return new ThreadResource($thread);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return response()->json(['Article with id ' . $thread->id . ' has been deleted.']);
    }
}
