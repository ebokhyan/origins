<?php


namespace App\View\Composers;

use App\Http\Controllers\Api\MenuItemController;
use App\Models\Contacts;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuComposer
{
    private $menu;

    public function __construct(Menu $menu,Request $request)
    {
        $this->menu = $menu->get()->pluck('title','tag');
    }

    public function compose(View $view)
    {
        $view->with([
            'menu' => $this->menu,
        ]);
    }
}
