<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Services\Menu\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    function __construct(protected MenuService $menuService)
    {
    }

    function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menus' => $this->menuService->getAll(),
        ]);
    }

    function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    function store(CreateFormRequest $request)
    {
        try {
            $this->menuService->create(
                $request->input('name'),
                $request->input('parent_id'),
                $request->input('description'),
                $request->input('content'),
                $request->input('active'),
            );
            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return redirect()->back();
    }
}
