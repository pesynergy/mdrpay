@extends('layouts.app')
@section('title', 'Api Tokens')
@section('pagetitle',  'Api Tokens')
@php
    $table = "yes";
    $agentfilter = "hide";
    $status['type'] = "Status";
    $status['data'] = [
        "1" => "Active",
        "0" => "De-active"
    ];
@endphp

@section('content')
<!--<div class="content-body default-height">-->
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">API Token Manager</h4>
    					<div class="heading-elements">
                            <button type="button" class="btn btn-sm btn-info btn-raised heading-btn legitRipple" onclick="addSetup()">
                                <i class="flaticon-381-add-1" style="padding-right:5px;"></i> Add New
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Details</th>
                                        <th>IP</th>
                                        <th>Token</th>
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
@endsection
@push('script')
<script>
    var setupUpdateRoute = "{{ route('setupupdate') }}";
    var type = "{{$type}}";
</script>
<script src="{{ asset('js/pendingApproval/apiToken.js') }}"></script>
@endpush