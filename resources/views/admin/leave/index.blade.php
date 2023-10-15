@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Application for Leave</h4>
            <a href="{{ route('add.leave') }}" type="button" class="btn btn-primary waves-effect waves-light" style="padding: 8px 15px;">FORM</a>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12">

            {{-- Cert Index --}}
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th class="text-center">ACTION</th>
                            <th>OFFICE</th>
                            <th>NAME</th>
                            <th>DATE OF FILING</th>
                            <th>POSITION</th>
                            <th>SALARY</th>
                            <th>APPROVED BY</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($leaves as $leave)
                            <tr>
                                {{-- action button --}}
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('view.leave.form', $leave->id) }}" class="btn btn-primary waves-effect waves-light btn-warning" target="blank"><i class="ri-printer-fill"></i></a>
                                        {{-- <button type="button" style="padding: 5px 10px;" class="btn btn-primary waves-effect waves-light btn-warning" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="items-center fab fa-whmcs"></i></button> --}}
                                    </div>
                                </td>
                                {{-- end action --}}
                                <td class="text-wrap">{{ ($leave->office) }}</td>
                                <td class="text-wrap">{{ ($leave->fname) }}{{ " " }}{{ ($leave->mname) }}{{ " " }}{{ ($leave->lname) }}{{ " " }}{{ ($leave->suffix) }}</td>
                                <td class="text-wrap">{{ ($leave->date_filing) }}</td>
                                <td class="text-wrap">{{ ($leave->position) }}</td>
                                <td class="text-wrap">{{ ($leave->salary) }}</td>
                                <td class="text-wrap">{{ ($leave->approved_by) }} {{ " - " }}{{ ($leave->designation) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Cert Index --}}

        </div>
    </div>

@endsection
