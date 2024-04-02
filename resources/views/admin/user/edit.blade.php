@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">EDIT USER</h4>
            @if (Auth::user()->is_admin == 1)
                <a style="padding: 5px 15px;" href="{{ route('users.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>
    </div>
</div>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            {{-- <h3 class="card-title text-center">FORM</h3> --}}
            <form action="{{ route('update.user', $data->id) }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">
                @if (Auth::user()->is_admin == 1)
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>User Type <small>(required)</small></label>
                            <select name="is_admin" class="form-control" required>
                                <option value="{{ $data->is_admin }}" selected>{{ ($data->is_admin) ? 'Admin' : 'User' }}</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                @endif

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Full Name <small>(required)</small></label>
                                <input value="{{ $data->name }}" type="text" class="form-control" name="name" placeholder="{{ $data->name }}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Email <small>(required)</small></label>
                                <input value="{{ $data->email }}" type="email" class="form-control" name="email" placeholder="{{ $data->email }}" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Password <small>(required)</small></label>
                                <input value="{{ $data->password }}" type="password" class="form-control" name="password" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                                <input value="{{ $data->date_of_birth }}" type="date" class="form-control" name="date_of_birth" placeholder="{{ $data->date_of_birth }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Position</label>
                                <input value="{{ $data->position }}" type="text" class="form-control" name="position" placeholder="{{ $data->position }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Salary <small></small></label>
                            <div data-date-autoclose="true">
                                <input value="{{ $data->position }}" type="text" class="form-control" id="salary" name="salary" placeholder="{{ $data->position }}" onkeyup="formatCurrency(this)"/>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-success" type="submit" style="padding: 10px 35px;"><i class="fas fa-save"></i>  SUBMIT</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function formatCurrency(input) {

        let value = input.value.replace(/[^0-9]/g, '');

        let formatter = new Intl.NumberFormat('en-PH', {
            style: 'currency',
            currency: 'PHP',
            minimumFractionDigits: 2
        });

        input.value = formatter.format(value / 100);
    }
</script>

@endsection
