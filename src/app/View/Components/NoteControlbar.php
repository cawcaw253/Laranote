<?php

namespace App\View\Components;

use App\Models\Note;
use Illuminate\View\Component;

class ControllerBar extends Component
{
    /**
     * Current note
     *
     * @var Note
     */
    public $note;

    /**
     * Create a new component instance.
     *
     * @param Note|null $note
     * @return void
     */
    public function __construct(Note|null $note)
    {
        $this->note = $note;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.controlbar');
    }
}
