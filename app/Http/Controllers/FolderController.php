<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Http\Request;

/**
 * Class FolderController
 * @property
 */

class FolderController extends Controller
{
    //
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request): \Illuminate\Http\RedirectResponse
    {
        //フォルダモデルのインスタンス生成
        $folder = new Folder();

        //タイトルに入力値を代入する
        $folder->title = $request->title;

        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index',[
            'folder' => $folder->id,
        ]);
    }
}
