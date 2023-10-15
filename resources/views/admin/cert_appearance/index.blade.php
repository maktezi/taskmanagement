@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Certificate of Appearance</h4>
            <a href="{{ route('addcert.appearance') }}" type="button" class="btn btn-primary waves-effect waves-light" style="padding: 8px 15px;">FORM</a>
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
                            <th>OFFICIAL/PERSONNEL</th>
                            <th>INCLUSIVE DATES OF APPEARANCE</th>
                            <th>OFFICE/AGENCY</th>
                            <th>VENUE</th>
                            <th>PURPOSE OF TRAVEL</th>
                            <th>APPROVED BY</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($appearances as $appearance)
                            <tr>
                                {{-- action button --}}
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('view.cert.appearance', $appearance->id) }}" class="btn btn-primary waves-effect waves-light btn-warning" target="blank"><i class="ri-printer-fill"></i></a>
                                        {{-- <button type="button" style="padding: 5px 10px;" class="btn btn-primary waves-effect waves-light btn-warning" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="items-center fab fa-whmcs"></i></button> --}}
                                    </div>
                                </td>
                                {{-- end action --}}
                                <td class="text-wrap">{{ ($appearance->fullname) }}</td>
                                <td class="text-wrap">{{ ($appearance->date_start) }}{{ " - " }}{{ ($appearance->date_end) }}</td>
                                <td class="text-wrap">{{ ($appearance->office) }}</td>
                                <td class="text-wrap">{{ ($appearance->venue) }}{{ ", " }}{{ ($appearance->venue_address) }}</td>
                                <td class="text-wrap">{{ ($appearance->purpose) }}</td>
                                <td class="text-wrap">{{ ($appearance->approved_by) }}{{ " - " }}{{ ($appearance->designation) }}</td>
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
