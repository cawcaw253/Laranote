<?php

namespace App\View\Components\Widgets;

use App\Models\Tag as ModelsTag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Tag extends Component
{
    /**
     * @var array
     */
    private Collection $tags;

    /**
     * Create a new component instance.
     *
     * @param int $userId
     * @return void
     */
    public function __construct(int $userId)
    {
        $this->tags = ModelsTag::fromUserId($userId)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.widgets.tag', ['tags' => $this->tags]);
    }
}
