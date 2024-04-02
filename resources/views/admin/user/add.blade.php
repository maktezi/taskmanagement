@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">ADD USER</h4>
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
            <form action="{{ route('store.user') }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">
                @if (Auth::user()->is_admin == 1)
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>User Type <small>(required)</small></label>
                            <select id="is_admin" name="is_admin" class="form-control" required>
                                <option value="" selected disabled>Select User</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                @endif
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Full Name <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" id="name" name="name" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Email <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Password <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input min="8" type="password" class="form-control" id="password" name="password" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Date of Birth <small></small></label>
                            <div data-date-autoclose="true">
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Position <small></small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" id="position" name="position" placeholder=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Salary <small></small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" id="salary" name="salary" placeholder="₱" onkeyup="formatCurrency(this)"/>
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
