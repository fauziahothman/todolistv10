<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    function index()
    {
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
    function show(Task $task)
    {
        $task = $task->load('comments.user','user');
        // dd($task);
        return view('tasks.show', compact('task'));
    }

    function ajaxloadtasks(Request $request) {
        $tasks = Task::with('user');

        return DataTables::of($tasks)
        ->addIndexColumn()
        ->addColumn('bil', function($task){
            return '1';
        })
        ->addColumn('user', function($task){
            return $task->user->name;
        })
        ->addColumn('due_date', function($task){
            return \Carbon\Carbon::parse($task->due_date)->format('d-m-Y');
        })
        ->addColumn('action', function($task){
            return '<a class="btn btn-primary btn-sm" href="'.route('tasks.show',['task'=>$task->uuid]).'">Show</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    function create(){
        $users = User::pluck('name','id'); //utk drop down list dari table user
        // dd($users);
        return view('tasks.create',compact('users'));
    }

    function store(Request $request){
        $request->validate([
            "title" => 'required|max:255',
            "user_id" => 'required',
            "due_date" => 'required|date|after_or_equal:today',
            "description" => 'required'
        ],[
            'title.required' => 'sila masukkan tajuk',
            'user_id.required' => 'sila masukkan user',
            'due_date.required' => 'sila masukkan tarikh',
            'due_date.after_or_equal' => 'tarikh selepas hari ini',
            'due_date.date' => 'sila masukkan tarikh',
            'description.required' => 'sila masukkan description'

        ]);

        $task = new Task();
        $task->uuid = Uuid::uuid4();
        $task->title    = $request->title;
        $task->user_id   = $request->user_id;
        $task->due_date  = $request->due_date;
        $task->description   = $request->description;
        $task->save();

        return redirect()->route('tasks.index');
        // dd($request);
    }

}
