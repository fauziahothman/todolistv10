<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index() {
        $tasks = Task::all();
        // $task = Task::limit(10)->get();
        // $task = Task::latest()->limit(10)->get();
        $tasks = Task::where('id','<','30')->get();
        $tasks = Task::where('id','<=','30')->where('id','>=','20')->get();
        $tasks = Task::whereBetween('id',[20,30])->get();
        $tasks = Task::where('id',30)->get();
        $tasks = Task::where('title','like','%Nulla%')->get();
        dd ($tasks);


        // $task = Task::find(30);
        // dd ($task);
    }
}
