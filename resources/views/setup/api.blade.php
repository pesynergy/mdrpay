@extends('layouts.app')
@section('title', 'Api Manager')
@section('pagetitle',  'Api Manager')
@php
    $table = "yes";
    $agentfilter = "hide";
    $status['type'] = "Api";
    $status['data'] = [
        "1" => "Active",
        "0" => "De-active"
    ];
@endphp

@section('content')
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">API Manager</h4>
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" onclick="addSetup()" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="flaticon-381-add-1" style="padding-right:5px;"></i></b> Add New</button></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Display Name</th>
                                        <th>Api Code</th>
                                        <th>Credentials</th>
                                        <th>Gst/Tds</th>
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

<div id="setupModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><span class="msg">Add</span> Api</h6>
            </div>
            <form id="setupManager" action="{{route('setupupdate')}}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="api">
                        {{ csrf_field() }}
                        <div class="form-group col-md-4">
                            <label>Product Name</label>
                            <input type="text" name="product" class="form-control" placeholder="Enter value" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Display Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter value" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Url</label>
                            <input type="text" name="url" class="form-control" placeholder="Enter url">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Value">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter url">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Optional1</label>
                            <input type="text" name="optional1" class="form-control" placeholder="Enter Value">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Api Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Enter url" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Product Type</label>
                            <input type="text" name="type" class="form-control" placeholder="Enter value" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Gst</label>
                            <input type="text" name="gst" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tds</label>
                            <input type="text" name="tds" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>
                    @if(Myhelper::hasRole('admin'))
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Security Pin</label>
                                <input type="password" name="mpin" autocomplete="off" class="form-control" required="">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                </div>
            </form>
        </div> 
    </div> 
</div> 
@endsection

 @push('script')
<script>
    window.setupConfig = {
        fetchUrl: "{{ url('statement/list/fetch') }}/setup{{$type}}/0",
        updateUrl: "{{ route('setupupdate') }}",
        csrf: "{{ csrf_token() }}"
    };
</script>
<script src="{{ asset('js/setuptools/apiManager.js') }}"></script>
@endpush
