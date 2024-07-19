@extends('layouts.app')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('pageTitle','Create Task')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript: void(0);">ToDoList</a></li>
<li class="breadcrumb-item active">Create New Task</li>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Task Form</div>
                <form method="POST" name="createForm" id="createForm" action="{{route('tasks.store')}}">
                    @csrf
                    @include('tasks._form')
                    <div class="btn-group float-right">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>

                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$('#user_id').select2({
    placeholder : "Sila pilih",
    allowClear: true
});

</script>
@endsection


