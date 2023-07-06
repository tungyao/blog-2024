<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        $html = [];
        $page = request('page', 1);
        $all = DB::table('post')
            ->where(['status' => 1])
            ->orderByDesc('id')
            ->select(['id', 'title', 'created_at'])
            ->simplePaginate(5);

        return view('index', ['data' => $all]);
    }
}
