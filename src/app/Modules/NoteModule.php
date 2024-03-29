<?php

namespace App\Modules;

use App\Models\Note;
use App\Models\Tag;
use App\Models\TagMap;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteModule
{
	/**
	 * @var Note
	 */
	protected Note $note;

	/**
	 * NoteModule Constructor
	 */
	private function __construct()
	{
	}

	/**
	 * NoteModule Constructor without target note
	 *
	 * @return self
	 */
	public static function withOutNote()
	{
		return (new self());
	}

	/**
	 * NoteModule Constructor with target note
	 *
	 * @param int $noteId
	 * @return self
	 */
	public static function withNote(int $noteId)
	{
		$self = new self();

		$self->setNote($noteId);
		return $self;
	}

	/**
	 * Set note
	 *
	 * @param int $noteId
	 * @return void
	 */
	public function setNote(int $noteId)
	{
		$this->note = Note::FromCurrentUser()->findOrFail($noteId);
	}

	/**
	 * Create new note
	 *
	 * @param Request $request
	 * @return void
	 */
	public function create(Request $request)
	{
		DB::transaction(function () use ($request) {
			$note = Note::create([
				'title' => $request->input('title'),
				'contents' => $request->input('contents'),
				'user_id' => auth()->id()
			]);

			$tagIds = $request->has('tags') ? Tag::createNewTag($request->input('tags')) : [];

			$note->tags()->sync($tagIds);
		});
	}

	/**
	 * Update target note
	 *
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request)
	{
		DB::transaction(function () use ($request) {
			$this->note->update([
				'title' => $request->input('title'),
				'contents' => $request->input('contents'),
			]);

			$tagIds = $request->has('tags') ? Tag::createNewTag($request->input('tags')) : [];

			$this->note->tags()->sync($tagIds);
		});
	}

	/**
	 * Delete targe note
	 *
	 * @return void
	 */
	public function delete()
	{
		DB::transaction(function () {
			$this->note->tags()->detach();
			$this->note->delete();
		});
	}
}
