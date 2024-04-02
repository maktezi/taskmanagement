@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">ASSIGN TASK</h4>
            @if (Auth::user()->is_admin == 1)
            <a href="{{ route('add.assigntask') }}" type="button" class="btn btn-primary waves-effect waves-light" style="padding: 8px 15px;">ADD</a>
            @endif
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12">

            {{-- Cert Index --}}
            <div class="card">
                <div class="card-body">
                    <table
                    @if (Auth::user()->is_admin == 1)
                    id="datatable-buttons"
                    @endif
                    class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>TASK</th>
                            <th>ASSIGNED USER</th>
                            <th>DEPARTMENT</th>
                            <th>TASK STATUS</th>
                            @if (Auth::user()->is_admin == 1)
                            <th class="text-center">ACTION</th>
                            @elseif (Auth::user()->is_admin == 0)
                            <th class="text-center">ACTION</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($assigntasks as $assigntask)
                            <tr>
                                <td class="text-wrap">{{ ($assigntask->task->name) }}</td>
                                <td class="text-wrap">{{ ($assigntask->user->name) }}</td>
                                <td class="text-wrap">{{ ($assigntask->department->name) }}</td>
                                <td class="text-wrap">{{ ($assigntask->description) }}</td>
                                {{-- action button --}}

                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('edit.assigntask', $assigntask->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                        @if (Auth::user()->is_admin == 1)
                                        <a href="{{ route('delete.assigntask', $assigntask->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
                                        @endif
                                    </div>
                                </td>
                                {{-- end action --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Cert Index --}}

        </div>
    </div>

    <script>
        function confirmDelete(event) {
            if (!confirm("Are you sure you want to delete?")) {
                event.preventDefault();
            }
        }
    </script>

@endsection
