@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Users</h4>
                <a href="{{ route('add.user') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">Add</a>
            </div>

            {{-- Cert Index --}}
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    {{-- <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                        <thead>
                        <tr>
                            <th>ROLE</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-wrap">{{ ($user->is_admin) ? 'ADMIN' : 'USER' }}</td>
                                <td class="text-wrap">{{ ($user->name) }}</td>
                                <td class="text-wrap">{{ ($user->email) }}</td>


                                {{-- action button --}}
                                <td class="text-center">
                                            <a href="{{ route('edit.user', $user->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                            <a href="{{ route('delete.user', $user->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
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

@endsection

<script>
    function confirmDelete(event) {
        if (!confirm("Are you sure you want to delete?")) {
            event.preventDefault();
        }
    }
</script>
