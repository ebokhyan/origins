<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopNewsComponent extends Component
{
    public $topNews;
    public $latest;
    public $banner;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topNews,$banner,$latest)
    {
        $this->topNews = $topNews;
        $this->latest = $latest;
        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-news-component');
    }
}
