<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menus' => []
        ]);
    }

    function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => []
        ]);
    }

    function store(CreateFormRequest $request)
    {

        return redirect()->back();
    }
}
