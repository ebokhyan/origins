<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopBannerComponent extends Component
{

    public $banner;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-banner-component');
    }
}
