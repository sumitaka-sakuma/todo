<?php

namespace App;

use App\Folder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function create(Request $request)
    {
        $folder = new Folder();

        //タイトルに入力値を代入する
        $folder->title = $request->title;

        $folder->save();

        return redirect()->route('task.index', [
            'id' => $folder->id,
        ]);
    }
}
