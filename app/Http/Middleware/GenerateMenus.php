<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Menus;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $url= '';
        \Menu::make('MenuList', function ($menu) use($url){
            $items = Menus::all();
            foreach ($items as $item) {
                if (substr($item->url, 0, 1) == '#') {
                    $menu->add($item->title, ['class' => ''])
                    ->prepend($item->icon)
                    ->nickname($item->nickname)
                    ->link->attr(["class" => ""])
                    ->href($item->url);
                    $subItems = Menus::where('parent_id',$item->id)->get();
                    foreach ($subItems as $key => $value) {
                    }
                }elseif($item->parent_id == 0){
                    $menu->add($item->title, ['route' => $item->url])
                    ->prepend($item->icon)
                    ->link->attr(['class' => '']);
                }
            }
        })->filter(function ($item) {
            return checkMenuRoleAndPermission($item);
        });
        return $next($request);
    }
}
