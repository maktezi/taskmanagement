@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">FORM</h4>
            @if (Auth::user()->is_admin == 1)
                <a style="padding: 5px 15px;" href="{{ route('task.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @else
                <a style="padding: 5px 15px;" href="{{ route('task') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>
    </div>
</div>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">ADD<br>TASK</h3><br>
            <form action="{{ route('store.task') }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Task Name</label>
                            <input type="text" class="form-control" name="name" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Difficulty</label>
                            <select name="difficulty" class="form-control" required>
                                <option value="">----------</option>
                                <option value="novice">Novice</option>
                                <option value="normal">Normal</option>
                                <option value="master">Master</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select name="priority" class="form-control" required>
                                <option value="">----------</option>
                                <option value="no-prio">No-prio</option>
                                <option value="low-prio">low-prio</option>
                                <option value="mid-prio">Mid-prio</option>
                                <option value="high-prio">High-prio</option>
                            </select>
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
