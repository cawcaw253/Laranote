<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\TagMap;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class NoteController extends Controller
{
    /** Size of page */
    const PER_PAGE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notes = Note::FromCurrentUser()->orderBy('created_at', 'desc')->paginate(self::PER_PAGE);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('notes.create');
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
            'tags' => 'required|array|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $note = Note::create([
                'title' => $request->input('title'),
                'contents' => $request->input('contents'),
                'user_id' => auth()->id()
            ]);

            $tagMap = [];
            foreach ($request->input('tags') as $tag) {
                array_push($tagMap, ['note_id' => $note->id, 'tag_id' => $tag['id'],]);
            }
            $note->tagMap()->createMany($tagMap);
        });

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

        return view('notes.edit', compact('note'));
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
            'tags' => 'required|array|min:1',
        ]);

        $note = Note::FromCurrentUser()->findOrFail($id);

        DB::transaction(function () use ($note, $request) {
            $note->update([
                'title' => $request->input('title'),
                'contents' => $request->input('contents'),
            ]);

            TagMap::where('note_id', $note->id)->delete();

            $tagMap = [];
            foreach ($request->input('tags') as $tag) {
                array_push($tagMap, ['note_id' => $note->id, 'tag_id' => $tag['id'],]);
            }
            $note->tagMap()->createMany($tagMap);
        });

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
        $note = Note::FromCurrentUser()->findOrFail($id);

        $note->delete();

        return redirect()->to(route('notes.index'));
    }
}
