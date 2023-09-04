<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        return view('admin.home', [
            'title' => 'Trang Quản Trị Admin'
        ]);
    }
}
