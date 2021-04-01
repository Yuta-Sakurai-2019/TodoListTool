<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        //ログインユーザー取得する
        $user = Auth::user();

        //ログインユーザーに紐づくフォルダを一つ取得
        $folder = $user->folders()->first();

        //今時点でフォルダが0件ならホームページをレスポンスする
        if(is_null($folder)){
            return view('home');
        }

        //フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index',[
           'folder' => $folder->id,
        ]);
    }

}
