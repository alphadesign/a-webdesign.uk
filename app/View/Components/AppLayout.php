<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    // for showing footer call to action banner
    public $callToAction = false; //for consistency

    public function __construct($callToAction = false)
    {
        $this->callToAction = $callToAction;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
