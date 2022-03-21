<?php


namespace App\View\Composers;

use App\Http\Controllers\Api\MenuItemController;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuComposer
{
    private $menu;
    private $innerMenu;

    public function __construct(MenuItemController $menu,Request $request)
    {
        $this->menu = $menu->getMenus(app()->getLocale());
        $this->innerMenu = $menu->getMenuBySlug($request->slug);
    }

    public function compose(View $view)
    {
        $view->with([
            'menu' => $this->menu,
            'innerMenu' => $this->innerMenu ? $this->innerMenu['parent'] : [],
            'selected' => $this->innerMenu ? $this->innerMenu['selected_menu'] : []
        ]);
    }
}
