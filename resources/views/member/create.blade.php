@extends('layouts.app')
@section('title', 'Create '.$type)
@section('pagetitle', 'Create '.$type)

@php
    $search = "hide";
@endphp
 
@section('content')
<div class="default-height">
    <div class="container-fluid">
        <!-- Modal Trigger Button -->
        <button type="button" class="btn btn-dark mb-3" data-toggle="modal" data-target="#memberModal">
            + Add Member
        </button>

        <!-- Member Create Modal -->
       <div class="modal fade" id="memberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="memberForm" action="{{ route('memberstore') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create {{ $type }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>

                <div class="modal-body">
                        <div class="card mb-3">
                                <div class="card-header"><h6>Member Type Information</h6></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Member Type</label>
                                            <select name="role_id" class="form-control select" required>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Scheme Manager</label>
                                            <select name="scheme_id" class="form-control select" required>
                                                <option value="">Select Scheme</option>
                                                @foreach ($scheme as $scheme)
                                                    <option value="{{$scheme->id}}">{{$scheme->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if(Myhelper::hasRole("admin"))
                                            <div class="form-group col-md-4">
                                                <label>Company</label>
                                                <select name="company_id" class="form-control select" required>
                                                    <option value="">Select Company</option>
                                                    @foreach ($company as $company)
                                                        <option value="{{$company->id}}">{{$company->companyname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="card mb-3">
                                <div class="card-header"><h6>Personal Information</h6></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" required placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mobile</label>
                                            <input type="number" name="mobile" class="form-control" required placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" required placeholder="Enter Value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="2" required placeholder="Enter Value"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>State</label>
                                            <input type="text" name="state" class="form-control" required placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>District</label>
                                            <input type="text" name="district" class="form-control" required placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" required placeholder="Enter Value">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Pincode</label>
                                        <input type="number" name="pincode" class="form-control" required maxlength="6" minlength="6" placeholder="Enter Value">
                                    </div>
                                </div>
                            </div>

                            <!-- Business Information -->
                            <div class="card mb-3">
                                <div class="card-header"><h6>Business Information</h6></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Shop Name</label>
                                            <input type="text" name="shopname" class="form-control" required placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Pancard Number</label>
                                            <input type="text" name="pancard" class="form-control" required placeholder="Enter Value">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Adhaarcard Number</label>
                                            <input type="text" name="aadharcard" class="form-control" required maxlength="12" minlength="12" placeholder="Enter Value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('js/member/admin.js') }}"></script>
@endpush
