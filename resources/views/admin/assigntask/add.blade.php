@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">FORM</h4>
            @if (Auth::user()->is_admin == 1)
                <a style="padding: 5px 15px;" href="{{ route('assigntask.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @else
                <a style="padding: 5px 15px;" href="{{ route('assigntask') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>
    </div>
</div>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">ADD<br>ASSIGN TASK</h3><br>
            <form action="{{ route('store.assigntask') }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Task Name</label>
                            <select name="task_id" class="form-control" required>
                                <option value="">----------</option>
                                @foreach ($tasks as $task)
                                <option value={{ ($task->id) }}>{{ ($task->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Assigned User</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">----------</option>
                                @foreach ($users as $user)
                                <option value={{ ($user->id) }}>{{ ($user->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">----------</option>
                                @foreach ($departments as $department)
                                <option value={{ ($department->id) }}>{{ ($department->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Task Status</label>
                                    <input type="text" class="form-control" name="description" required/>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-success" type="submit" style="padding: 10px 35px;"><i class="fas fa-save"></i>  ADD</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
