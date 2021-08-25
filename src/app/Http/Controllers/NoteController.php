<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Tag;
use App\Modules\NoteModule;

class NoteController extends Controller
{
    /** Size of page */
    const PER_PAGE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $notes = Note::fromCurrentUser()
            ->includeTags($request->input('tags'))
            ->orderBy('created_at', 'desc')
            ->paginate(self::PER_PAGE);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $tagList = Tag::all()->toArray();

        return view('notes.create', compact('tagList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'contents' => 'required|min:10',
            'tags' => 'array',
            'tags.*' => 'array',
            'tags.*.value' => 'string',
            'tags.*.color' => 'string'
        ]);

        NoteModule::withOutNote()->create($request);

        return response()->json([
            'status' => 'success',
            'redirect_url' => route('notes.index'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::FromCurrentUser()->findOrFail($id);

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::FromCurrentUser()->findOrFail($id);

        $tagList = Tag::all()->toArray();

        return view('notes.edit', compact('note', 'tagList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'contents' => 'required|min:10',
            'tags' => 'array',
            'tags.*' => 'array',
            'tags.*.value' => 'string',
            'tags.*.color' => 'string'
        ]);

        NoteModule::withNote($id)->update($request);

        return response()->json([
            'status' => 'success',
            'redirect_url' => route('notes.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NoteModule::withNote($id)->delete();

        return redirect()->to(route('notes.index'));
    }
}
