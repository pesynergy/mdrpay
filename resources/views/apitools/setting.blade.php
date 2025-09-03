@extends('layouts.app')
@section('title', "Api Setting")
@section('pagetitle', "Api Setting")

@php
    $table = "yes";
@endphp

@php
    $search = "hide";
@endphp

@section('content')
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Api Token</h4>
                    </div>
                    <div class="card-body">
                        <form class="callbackForm" action="{{route('apitokenstore')}}" method="post">
                            {{ csrf_field() }}
                            <div class="panel-body" style="padding:16px">
                                <div class="form-group">
                                    <label>Token</label>
                                    <textarea name="token" class="form-control" cols="30" rows="2">{{$token->token ?? ""}}</textarea>
                                </div>
                            </div>
    
                            <div class="panel-footer">
                                <button class="btn btn-info btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Generate New Token</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Call Back</h4>
                    </div>
                    <div class="card-body">
                        <form class="callbackForm" action="{{route('apitokenstore')}}" method="post">
                            {{ csrf_field() }}
                            <div class="panel-body" style="padding:16px">
                                <div class="form-group">
                                    <label>Upi Webhook</label>
                                    <textarea name="upicallbackurl" class="form-control" cols="30" rows="2" required placeholder="Enter Upi Webhook">{{$token->upicallbackurl ?? ""}}</textarea>
                                </div>
    
                                <div class="form-group">
                                    <label>Payout Webhook</label>
                                    <textarea name="payoutcallbackurl" class="form-control" cols="30" rows="2" required placeholder="Enter Payout Webhook">{{$token->payoutcallbackurl ?? ""}}</textarea>
                                </div>
                            </div>
    
                            <div class="panel-footer">
                                <button class="btn btn-info btn-raised legitRipple pull-right" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> Updating...">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        var url = "{{url('statement/list/fetch')}}/apitoken/0";
        Dropzone.options.qrupload = {
            paramName: "file",
            maxFilesize: 1,
            complete: function(file) {
                this.removeFile(file);
            },
            success : function(file, data){
                $("[name='merchant_upi']").val(data);
                $("#qrModal").modal("hide");
            }
        };

        var onDraw = function() {};

        var options = [
            { "data" : "ip"},
            { "data" : "token"},
            { "data" : "id",
                render:function(data, type, full, meta){
                    var check = "<label class='label label-danger'>In-Active</label>";
                    if(full.status == "1"){
                        check = "<label class='label label-success'>Active</label>";
                    }

                    return check;
                }
            },
            { "data" : "id",
                render:function(data, type, full, meta){
                    return `<button type="button" class="btn bg-danger btn-raised legitRipple btn-xs" onclick="deleteToken(`+full.id+`)"> <i class="fa fa-trash"></i></button>`;
                }
            },
        ];
        datatableSetup(url, options, onDraw);
        
        $('.callbackForm').submit(function(event) {
            var form = $(this);
            form.ajaxSubmit({
                dataType:'json',
                beforeSubmit:function(){
                    form.find('button[type="submit"]').button('loading');
                },
                success:function(data){
                    if(data.status == "success"){
                        form.find('button[type="submit"]').button('reset');
                        notify("Task Successfully Completed", 'success');
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000);
                    }else{
                        notify(data.status, 'warning');
                    }
                },
                error: function(errors) {
                    showError(errors, form);
                }
            });
            return false;
        });
    });
</script>
@endpush
