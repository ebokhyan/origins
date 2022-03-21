<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddBannerComponent extends Component
{
    public $details;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-banner-component');
    }
}
