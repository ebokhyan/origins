<?php


namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class SettingsComposer
{
    private $settings;

    public function __construct()
    {
        $this->settings = Setting::first();
    }

    public function compose(View $view)
    {
        $view->with('settings',$this->settings);
    }
}
