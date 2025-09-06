@extends('layouts.app')
@section('title', 'Scheme Manager')
@section('pagetitle',  'Scheme Manager')
@php
    $table = "yes";
    $agentfilter = "hide";

    $status['type'] = "Scheme";
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
                        <h4 class="card-title">Scheme Manager</h4>
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-info btn-xs btn-labeled legitRipple" onclick="addSetup()"q data-loading-text="<b><i class='fa fa-spin fa-spinner'></i></b> Searching"><b><i class="flaticon-381-add-1" style="padding-right:5px;"></i></b> Add New</button></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
	</div>
</div>

<div id="setupModal" class="modal fade" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><span class="msg">Add</span> Scheme</h6>
            </div>
            <form id="setupManager" action="{{route('resourceupdate')}}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="actiontype" value="scheme">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Bank Name" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                </div>
            </form>
        </div> 
    </div> 
</div> 

@foreach($charge as $key => $value)
    <div id="{{$key}}Modal" class="modal fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-slate">
                    <h4 class="modal-title">{{$key}} Charge</h4>
                </div>
                <form class="commissionForm" method="post" action="{{ route('resourceupdate') }}">
                    <div class="modal-body p-0" style="margin-bottom:20px">
                        {!! csrf_field() !!}
                        <input type="hidden" name="actiontype" value="commission">
                        <input type="hidden" name="scheme_id" value="">                
                        <table class="table table-bordered m-0">
                            <thead>
                                <th>Operator</th>
                                @if (Myhelper::hasRole('admin'))
                                    <th>Charge Type</th>
                                @endif
                                <th>Value</th>
                            </thead>
                            <tbody>
                                @foreach ($value as $element)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="slab[]" value="{{$element->id}}">
                                            {{$element->name}}
                                        </td>
                                        @if (Myhelper::hasRole('admin'))     
                                            <td class="p-t-0 p-b-0">
                                                <select class="form-control" name="type[]" required="">
                                                    <option value="">Select Type</option>
                                                    <option value="percent">Percent (%)</option>
                                                    <option value="flat" selected="selected">Flat (Rs)</option>
                                                </select>
                                            </td>
                                        @endif
                                        <td class="p-t-0 p-b-0">
                                            <input type="number" step="any" name="apiuser[]" placeholder="Enter Value" class="form-control" >
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-info btn-raised legitRipple" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Submitting">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
@endforeach

<div id="commissionModal" class="modal fade" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header bg-slate">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Scheme <span class="schemename"></span> Commission/Charge</h4>
            </div>

            <div class="modal-body no-padding commissioData">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
@endsection
<script>
    window.schemeConfig = {
        fetchUrl: "{{ url('statement/list/fetch') }}/resource{{$type}}/0",
        updateUrl: "{{ route('resourceupdate') }}",
        getResourceUrl: "{{ url('resources/get') }}",
        getMemberCommissionUrl: "{{ route('getMemberCommission') }}",
        csrf: "{{ csrf_token() }}",
        charges: @json($charge), 
        isAdmin: @json(Myhelper::hasRole('admin'))
    };
</script>
@push('script')
   <script src="{{ asset('js/resource/schemeManager.js') }}"></script>
@endpush