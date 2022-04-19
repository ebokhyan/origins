<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LatestComponent extends Component
{
    public $type;
    public $items;
    public $banners;
    public $search;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $items, $banners, $search )
    {
        $this->type = $type;
        $this->items = $items;
        $this->banners  = $banners;
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latest-component');
    }
}
