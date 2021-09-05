<?php

namespace App\View\Composers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserNoteComposer
{
    /**
     * User id
     *
     * @var int
     */
    protected $userId;

    /**
     * Create a new profile composer.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->userId = auth()->user()->id;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $tags = Tag::fromUserId($this->userId)->get();
        $view->with('tags', $tags);
    }
}
