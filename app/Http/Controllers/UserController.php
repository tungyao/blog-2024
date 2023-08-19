<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        $name = md5(time() . time());
        $user = request()->user()->getOriginal();
        Redis::setex($name, 300, json_encode([
            'name' => $user['name'],
            'id' => $user['id']]));
        return view('login', ['user' => request()->user()->getOriginal(), 'token' => $name]);
    }

    private $isAdmin = false;
    private $user = null;

    public function edit()
    {
        if ($token = request('token')) {
            $this->user = Redis::get($token);
            if ($this->user) {
                $this->isAdmin = true;
                $this->user = json_decode($this->user);
            }
            // TODO 实现逻辑


        }
    }
}
