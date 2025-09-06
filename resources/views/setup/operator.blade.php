@extends('layouts.app')
@section('title', 'Operator List')
@section('pagetitle',  'Operator List')
@php
    $table = "yes";
    $agentfilter = "hide";
    $product['type'] = "Operator Type";
    $product['data'] = [
        "collection" => "Collection",
        "fund"   => "Fund",
        "payout" => "Payout"
    ];

    $status['type'] = "Operator";
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
                    <form id="updateFormAll" action="{{route("setupupdate")}}" method="post">
                        <input type="hidden" name="actiontype" value="operatorall">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h4 class="card-title">Update Operator</h4>
                            <div class="heading-elements">
                                <div class="heading-elements">
                                        <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="flaticon-381-sync" style="padding-right:5px;"></i></b> Update</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="panel panel-default">
                                <div class="panel-body p-tb-10 row">
                                    @if(isset($product))
                                        <div class="form-group col-md-4">
                                            <select name="type" class="form-control select">
                                                <option value="">Select {{$product['type'] ?? ''}}</option>
                                                @if (isset($product['data']) && sizeOf($product['data']) > 0)
                                                    @foreach ($product['data'] as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    @endif
            
                                    @if($apis)
                                    <div class="form-group col-md-4">
                                        <select name="api_id" class="form-control select">
                                            <option value="">Select Api</option>
                                            @if (sizeOf($apis) > 0)
                                                @foreach ($apis as $myapi)
                                                    <option value="{{$myapi->id}}">{{$myapi->product}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Operator List</h4>
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" onclick="addSetup()" data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="flaticon-381-add-1" style="padding-right:5px;"></i></b> Add New</button></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Operator Api</th>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h6 class="modal-title"><span class="msg">Add</span> Operator</h6>
            </div>
            <form id="setupManager" action="{{route('setupupdate')}}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="operator">
                        {{ csrf_field() }}
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter value" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Code 1</label>
                            <input type="text" name="recharge1" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Min Range (Min Amount For Collection)</label>
                            <input type="text" name="range1" class="form-control" placeholder="Enter value" required="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>Max Range (Max Amount For Collection)</label>
                            <input type="text" name="range2" class="form-control" placeholder="Enter value" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Operator Type</label>
                            <select name="type" class="form-control select" required>
                                <option value="">Select Operator Type</option>

                                @foreach ($product['data'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Api</label>
                            <select name="api_id" class="form-control select" required>
                                <option value="">Select Api</option>
                                @foreach ($apis as $api)
                                <option value="{{$api->id}}">{{$api->product}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                </div>
            </form>
        </div> 
    </div> 
</div> 
@endsection
 @push('script')
<script>
    var operatorSetupConfig = {
        fetchUrl: "{{ url('statement/list/fetch') }}/setup{{$type}}/0",
        updateUrl: "{{ route('setupupdate') }}",
        csrf: "{{ csrf_token() }}",
        apis: @json($apis)
    };
</script>
<script src="{{ asset('js/setuptools/operatorManager.js') }}"></script>
@endpush
