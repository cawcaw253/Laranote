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
  private function setNote(int $noteId)
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

      $tags = $this->upsertTags($request->input('tags'));

      $note->upsertTagMap($tags);
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

      $tags = $this->upsertTags($request->input('tags'));

      $this->note->upsertTagMap($tags);
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
      $tagMap = $this->note->tagMap()->get();

      foreach ($tagMap as $row) {
        $row->delete();
      }

      $this->note->delete();
    });
  }

  /**
   * Update and Insert tags
   * 
   * @param array $tags
   * @return Collection|null
   */
  private function upsertTags(array $tags): Collection|null
  {
    $updatedTags = array_map(
      function ($tag) {
        return ['title' => $tag['value'], 'color_code' => $tag['color']];
      },
      $tags
    );
    Tag::upsert($updatedTags, ['title'], null);

    return Tag::whereIn('title', array_column($updatedTags, 'title'))->get();
  }
}
