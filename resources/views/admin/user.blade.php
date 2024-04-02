@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">

            {{-- Cert Index --}}
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    {{-- <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            {{-- <th class="text-center">ACTION</th> --}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-wrap">{{ ($user->name) }}</td>
                                <td class="text-wrap">{{ ($user->email) }}</td>
                                <td class="text-wrap">{{ ($user->is_admin) ? 'admin' : 'user' }}</td>


                                {{-- action button --}}
                                {{-- <td class="text-center">
                                    <div>
                                        <button type="button" type="button" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 6px 10px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="ri-delete-bin-2-fill"></i></button>

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{ route('delete.user', $user->id) }}" type="button" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;">Confirm</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                </td> --}}
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
