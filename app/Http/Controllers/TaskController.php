<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index() {
        // $task = Task::limit(10)->get();
        // $task = Task::latest()->limit(10)->get();
        // $tasks = Task::where('id','<','30')->get();
        // $tasks = Task::where('id','<=','30')->where('id','>=','20')->get();
        // $tasks = Task::whereBetween('id',[20,30])->get();
        // $tasks = Task::where('id',30)->get();
        // $tasks = Task::where('title','like','%Nulla%')->get();
        // dd ($tasks);

        // $task = Task::all();
        $tasks = Task::with('user')->get(); //eager loading
        return view('tasks.index', compact('tasks'));


        // $task = Task::find(30);
        // dd ($task);
    }

//Task adalah model,  $task dari route Route::get('tasks/{task}'
    function show(Task $task){
        $task = $task->load('comments.user','user');
        // dd($task);
        return view('tasks.show', compact('task'));



    }



}
