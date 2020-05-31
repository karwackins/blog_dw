<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        \Menu::make('MyNavBar', function($menu){

            $categories = Category::all();

            foreach ($categories as $category)
            {
                $about = $menu->add($category->name,    ['action' => ['CategoryController@show', 'id' => $category->id], 'class' => 'nav-item pt-1']);
                $about->link->attr(['class' => 'nav-link']);
            }

//            $menu->add('About',    ['route'  => 'page.about', 'class' => 'nav-item pt-2']);
//            $menu->add('About',    ['route'  => 'page.about', 'class' => 'nav-item pt-2']);
//            $menu->add('About',    ['route'  => 'page.about', 'class' => 'nav-item pt-2']);

        });

        return $next($request);
    }
}
