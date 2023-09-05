<?php

namespace App\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;

class MenuService
{
    function create($name, $parent_id, $description, $content, $active)
    {
        Menu::create([
            'name' => $name,
            'parent_id' => $parent_id,
            'description' => $description,
            'content' => $content,
            'slug' => Str::slug($name, '-'),
            'active' => $active,
        ]);
    }

    function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function show()
    {
        return Menu::select('name', 'id')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }
}
