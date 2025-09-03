<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index($type="aeps", $id=0)
    {
        $data['type'] = $type;
        $data['id'] = $id;

        switch ($type) {
            case 'payout':
                $permission = "payout_statement";
                break;

            case 'payin':
            case 'chargeback':
                $permission = "collection_statement";
                break;

            case 'upiintent':
                $permission = "qr_statement";
                break;
        }

        if (isset($permission) && !\Myhelper::can($permission)) {
            abort(404);
        }

        switch ($type) {
            case 'payoutwallet':
            case 'mainwallet':
                return view('statement.ledger')->with($data);
                break;
            
            default:
                return view('statement.transaction')->with($data);
                break;
        }
    }

    public function fetchData(Request $request)
    {
        $userid = $request->user_id;
        $data   = [];

        if($request->todate == "" || $request->todate == NULL){
            $request['todate'] = $request->fromdate;
        }

        switch ($request->type) {
            case 'payin':
            case 'chargeback':
            case 'upiintent':
            case 'oldpayout':
                $tables = "reports";
                $query  = \DB::table($tables)->leftJoin('users', 'users.id', '=', $tables.'.user_id')
                        ->leftJoin('apis', 'apis.id', '=', $tables.'.api_id')
                        ->leftJoin('providers', 'providers.id', '=', $tables.'.provider_id')
                        ->where($tables.'.rtype', "main")
                        ->orderBy($tables.'.id', 'desc');

                switch ($request->type) {
                    case 'payin':
                        $query->where($tables.'.product', 'payin')
                        ->where($tables.'.status', "success");
                        $date = "created_at";
                        break;
                        
                    case 'chargeback':
                        $query->where($tables.'.product', 'payin')->where($tables.'.status', 'chargeback')
                        ->orderBy($tables.'.updated_at', 'desc');
                        $date = "updated_at";
                        break;

                    case 'upiintent':
                        $date = "created_at";
                        $query->where($tables.'.product', 'qrcode');
                        break;

                    case 'oldpayout':
                        $date = "created_at";
                        $query->where($tables.'.product', 'payout');
                        break;
                }

                if(!empty($request->agent) && \Myhelper::hasRole("admin")){
                    $query->where($tables.'.user_id', $request->agent);
                }else{
                    if(\Myhelper::hasNotRole("admin")){
                        $query->where($tables.'.user_id', $userid);
                    }else{
                        $query->where($tables.'.user_id', '!=', "1");
                    }
                }

                $dateFilter = 1;
                if(!empty($request->searchtext)){
                    $serachDatas = ['txnid', 'option1', 'option2', 'option3', 'refno'];
                    $query->where( function($q) use($request, $serachDatas, $tables){
                        foreach ($serachDatas as $value) {
                            $q->orWhere($tables.".".$value , 'like', '%'.$request->searchtext.'%');
                        }
                    });
                    $dateFilter = 0;
                }

                if(isset($request->product) && $request->product != '' && $request->product != null){
                    $query->where($tables.'.api_id', $request->product);
                    $dateFilter = 0;
                }
                
                if(isset($request->status) && $request->status != '' && $request->status != null){
                    $query->where($tables.'.status', $request->status);
                    $dateFilter = 0;
                }

                $query->whereBetween($tables.'.'.$date, [Carbon::createFromFormat('Y-m-d', $request->fromdate)->format('Y-m-d'), Carbon::createFromFormat('Y-m-d', $request->todate)->addDay(1)->format('Y-m-d')]);

                $selects = ['id','mobile' ,'number', 'txnid', 'apitxnid', 'api_id', 'amount', 'profit', 'charge','tds', 'gst', 'payid', 'refno', 'balance', 'closing', 'status', 'rtype', 'trans_type', 'user_id', 'credit_by', 'created_at', 'product', 'remark','option1', 'option3', 'option2', 'option4', 'option5', 'description'];

                $selectData = [];
                foreach ($selects as $select) {
                    $selectData[] = $tables.".".$select;
                }

                $selectData[] = 'users.name as username';
                $selectData[] = 'users.mobile as usermobile';
                $selectData[] = 'users.agentcode as useragentcode';
                $selectData[] = 'apis.name as apiname';
                $selectData[] = 'providers.name as providername';

                $exportData = $query->select($selectData);  
                $count = intval($exportData->count());

                if(isset($request['length'])){
                    $exportData->skip($request['start'])->take($request['length']);
                }

                $data = array(
                    "draw"            => intval($request['draw']),
                    "recordsTotal"    => $count,
                    "recordsFiltered" => $count,
                    "data"            => $exportData->get()
                );
                break;

            case 'payout':
            case 'payoutreport':
                $tables = "payoutreports";
                $query  = \DB::table($tables)->leftJoin('users', 'users.id', '=', $tables.'.user_id')
                        ->leftJoin('apis', 'apis.id', '=', $tables.'.api_id')
                        ->leftJoin('providers', 'providers.id', '=', $tables.'.provider_id')
                        ->where($tables.'.rtype', "main")
                        ->orderBy($tables.'.id', 'desc');

                switch ($request->type) {
                    case 'payout':
                    case 'payoutreport':
                        $date = "created_at";
                        $query->where($tables.'.product', 'payout');
                        break;
                }

                if(!empty($request->agent) && \Myhelper::hasRole("admin")){
                    $query->where($tables.'.user_id', $request->agent);
                }else{
                    if(\Myhelper::hasNotRole("admin")){
                        $query->where($tables.'.user_id', $userid);
                    }else{
                        $query->where($tables.'.user_id', '!=', "1");
                    }
                }

                $dateFilter = 1;
                if(!empty($request->searchtext)){
                    $serachDatas = ['option4', 'txnid', 'option5', 'refno', 'option6'];
                    $query->where( function($q) use($request, $serachDatas, $tables){
                        foreach ($serachDatas as $value) {
                            $q->orWhere($tables.".".$value , 'like', '%'.$request->searchtext.'%');
                        }
                    });
                    $dateFilter = 0;
                }

                if(isset($request->product) && $request->product != '' && $request->product != null){
                    $query->where($tables.'.api_id', $request->product);
                    $dateFilter = 0;
                }
                
                if(isset($request->status) && $request->status != '' && $request->status != null){
                    $query->where($tables.'.status', $request->status);
                    $dateFilter = 0;
                }

                $query->whereBetween($tables.'.'.$date, [Carbon::createFromFormat('Y-m-d', $request->fromdate)->format('Y-m-d'), Carbon::createFromFormat('Y-m-d', $request->todate)->addDay(1)->format('Y-m-d')]);

                $selects = ['id','mobile' ,'number', 'txnid', 'apitxnid', 'api_id', 'amount', 'profit', 'charge','tds', 'gst', 'payid', 'refno', 'balance', 'closing', 'status', 'rtype', 'trans_type', 'user_id', 'credit_by', 'created_at', 'product', 'remark','option1', 'option3', 'option2', 'option4', 'option5', 'option7', 'description'];

                $selectData = [];
                foreach ($selects as $select) {
                    $selectData[] = $tables.".".$select;
                }

                $selectData[] = 'users.name as username';
                $selectData[] = 'users.mobile as usermobile';
                $selectData[] = 'users.agentcode as useragentcode';
                $selectData[] = 'apis.name as apiname';
                $selectData[] = 'providers.name as providername';

                $exportData = $query->select($selectData);  
                $count = intval($exportData->count());

                if(isset($request['length'])){
                    $exportData->skip($request['start'])->take($request['length']);
                }

                $data = array(
                    "draw"            => intval($request['draw']),
                    "recordsTotal"    => $count,
                    "recordsFiltered" => $count,
                    "data"            => $exportData->get()
                );
                break;

            case 'mainwallet':
                $tables = "reports";
                $query = \DB::table($tables)
                        ->leftJoin('users', 'users.id', '=', $tables.'.user_id')
                        ->leftJoin('users as sender', 'sender.id', '=', $tables.'.credit_by')
                        ->leftJoin('providers', 'providers.id', '=', $tables.'.provider_id')
                        ->whereIn($tables.'.status', ["success", "pending", "reversed", "chargeback", "refunded"])
                        ->orderBy($tables.'.id', 'desc');

                if(!empty($request->agent) && \Myhelper::hasRole("admin")){
                    $query->where($tables.'.user_id', $request->agent);
                }else{
                    $query->where($tables.'.user_id', $userid);
                }

                $dateFilter = 1;
                $query->whereBetween($tables.'.created_at', [Carbon::createFromFormat('Y-m-d', $request->fromdate)->format('Y-m-d'), Carbon::createFromFormat('Y-m-d', $request->todate)->addDay(1)->format('Y-m-d')]);
                $selects = ['id','mobile' ,'number', 'txnid', 'api_id', 'amount', 'profit', 'charge','tds', 'gst', 'payid', 'refno', 'balance', 'status', 'rtype', 'trans_type', 'user_id', 'credit_by', 'created_at', 'product', 'remark','option1', 'option3', 'option2', 'option5', 'closing'];

                $selectData = [];
                foreach ($selects as $select) {
                    $selectData[] = $tables.".".$select;
                }

                $selectData[] = 'users.name as username';
                $selectData[] = 'users.mobile as usermobile';
                $selectData[] = 'sender.name as sendername';
                $selectData[] = 'sender.mobile as sendermobile';
                $selectData[] = 'providers.name as providername';

                
                $exportData = $query->select($selectData);   
                $count = intval($exportData->count());

                if(isset($request['length'])){
                    $exportData->skip($request['start'])->take($request['length']);
                }

                $data = array(
                    "draw"            => intval($request['draw']),
                    "recordsTotal"    => $count,
                    "recordsFiltered" => $count,
                    "data"            => $exportData->get()
                );
                break;

            case 'payoutwallet':
                $tables = "payoutreports";
                $query = \DB::table($tables)
                        ->leftJoin('users', 'users.id', '=', $tables.'.user_id')
                        ->leftJoin('users as sender', 'sender.id', '=', $tables.'.credit_by')
                        ->leftJoin('providers', 'providers.id', '=', $tables.'.provider_id')
                        ->whereIn($tables.'.status', ["success", "pending", "reversed", "chargeback", "refunded"])
                        ->orderBy($tables.'.id', 'desc');

                if(!empty($request->agent) && \Myhelper::hasRole("admin")){
                    $query->where($tables.'.user_id', $request->agent);
                }else{
                    $query->where($tables.'.user_id', $userid);
                }

                $dateFilter = 1;
                $query->whereBetween($tables.'.created_at', [Carbon::createFromFormat('Y-m-d', $request->fromdate)->format('Y-m-d'), Carbon::createFromFormat('Y-m-d', $request->todate)->addDay(1)->format('Y-m-d')]);
                $selects = ['id','mobile' ,'number', 'txnid', 'api_id', 'amount', 'profit', 'charge','tds', 'gst', 'payid', 'refno', 'balance', 'status', 'rtype', 'trans_type', 'user_id', 'credit_by', 'created_at', 'product', 'remark','option1', 'option3', 'option2', 'option5', 'closing'];

                $selectData = [];
                foreach ($selects as $select) {
                    $selectData[] = $tables.".".$select;
                }

                $selectData[] = 'users.name as username';
                $selectData[] = 'users.mobile as usermobile';
                $selectData[] = 'sender.name as sendername';
                $selectData[] = 'sender.mobile as sendermobile';
                $selectData[] = 'providers.name as providername';

                
                $exportData = $query->select($selectData);   
                $count = intval($exportData->count());

                if(isset($request['length'])){
                    $exportData->skip($request['start'])->take($request['length']);
                }

                $data = array(
                    "draw"            => intval($request['draw']),
                    "recordsTotal"    => $count,
                    "recordsFiltered" => $count,
                    "data"            => $exportData->get()
                );
                break;
        }
        echo json_encode($data);
    }
}
