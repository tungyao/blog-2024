<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    private $isAdmin = false;
    private $user = null;

    public function __construct()
    {

        if ($token = request('token')) {
            $this->user = Redis::get($token);
            if ($this->user) {
                $this->isAdmin = true;
                $this->user = json_decode($this->user);
            }
        }
    }


    public function index()
    {
        $html = [];
        $page = request('page', 1);
        $all = DB::table('post')
            ->where(['status' => 1])
            ->orderByDesc('id')
            ->select(['id', 'title', 'created_at'])
            ->simplePaginate(5);

        return view('index', ['data' => $all, 'user' => $this->user, 'admin' => $this->isAdmin]);
    }
}
