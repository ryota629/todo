<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;

class TaskController extends Controller
{
    public function index(int $id){

        //すべてのフォルダを取得する
        $folders = Folder::all();

        //選ばれたフォルダを取得する
        $current_folders = Folder::find($id);

        //選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folders->tasks()->get();

        return view('tasks/index',[
            'folders' => $folders,
            'current_folder_id' => $current_folders->$id,
            'tasks' => $tasks,
        ]);
    }
}
