<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LatestFeaturesComponent extends Component
{
    public $articles;
    public $banners;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($articles, $banners)
    {
        $this->articles = $articles;
        $this->banners  = $banners;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latest-features-component');
    }
}
