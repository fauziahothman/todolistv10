@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript: void(0);">ToDoList</a></li>
<li class="breadcrumb-item active"><a href="{{route('tasks.index')}}">Tasks</a></li>
<li class="breadcrumb-item active">Show</li>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Task Detail</div>

                <div class="card-body">
                   <h3>{{$task->title}}</h3>
                   ~{{$task->user->name}}
                   || {{\Carbon\Carbon::parse($task->due_date)->format('d-m-Y')}}
                   <hr>
                   <h5>Comment(s)</h5>
                   @forelse ($task->comments as $comment)
                   <div class="comment"></div>
                   <strong>{{$comment->user->name}}</strong><br>
                   {{$comment->content}}
                   <br>
                   <hr>
                   @empty
                   <center>No Comment to show</center>
                   @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
