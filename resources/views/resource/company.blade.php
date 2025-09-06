@extends('layouts.app')
@section('title', 'Company Manager')
@section('pagetitle',  'Company Manager')
@php
    $table = "yes";
    $agentfilter = "hide";

    $status['type'] = "Company";
    $status['data'] = [
        "1" => "Active",
        "0" => "De-active"
    ];
@endphp
@section('content')
<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Company Manager</h4>
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" onclick="addSetup()" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="flaticon-381-add-1" style="padding-right:5px;"></i></b> Add New</button></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table id="datatable" class="table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Domain</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<div id="setupModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><span class="msg">Add</span> Company</h6>
            </div>
            <form id="setupManager" action="{{ route('resourceupdate') }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="company">
                        {{ csrf_field() }}

                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="companyname" class="form-control" placeholder="Enter Bank Name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" placeholder="Enter Website" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Senderid</label>
                            <input type="text" name="senderid" class="form-control" placeholder="Enter Sms Senderid">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Smsuser</label>
                            <input type="text" name="smsuser" class="form-control" placeholder="Enter Sms Username">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Smspwd</label>
                            <input type="text" name="smspwd" class="form-control" placeholder="Enter Sms Password">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-info" type="submit">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>
@endsection
<script>
    const base_url = "{{ url('') }}";
    const type = "{{ $type ?? '' }}";
    const resourceupdate_url = "{{ route('resourceupdate') }}";
</script>

@push('script')
    <script src="{{ asset('js/resource/companyManager.js') }}"></script>
@endpush