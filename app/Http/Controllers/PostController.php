<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $title = request('title');
        $content = DB::table('post')->where(['title' => $title])->first(['created_at', 'post', 'updated_at']);
        if (!$content) {
            throw new \Symfony\Component\HttpKernel\Exception\HttpException(404);
        }
        $html = Str::markdown($content->post);
        return view('post', ['html' => $html]);
    }

    public function add()
    {
        $data = request()->json()->all();
        $id = DB::table('post')->insertGetId([
            'title' => $data['title'],
            'post' => $data['post'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response()->json(['id' => $id]);
    }

    public function update()
    {
        $data = request()->json()->all();
        $ok = DB::table('post')->where(['id' => $data['id']])
            ->update(['updated_at' => date('Y-m-d H:i:s'), 'status' => $data['status'],
                'sort' => $data['sort'], 'post' => $data['post']]);
        return response()->json(['ok' => $ok ? 'yes' : 'no']);
    }
}
