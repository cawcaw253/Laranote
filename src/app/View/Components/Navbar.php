<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * The status variable
     *
     * @var string
     */
    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->status = "Hello World !!";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('components.navbar.authed', compact('user'));
        } else {
            return view('components.navbar.unauthed');
        }
    }
}
