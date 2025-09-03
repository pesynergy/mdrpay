<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Circle;
use App\User;
use App\Model\Report;
use App\Model\Complaint;
use App\Model\Api;
use App\Model\Apitoken;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['getmysendip', 'setpermissions','checkcommission']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if(\Myhelper::hasRole("admin")){
            $data['mainwallet'] = User::where('id', session("loginid"))->sum('mainwallet');
            $data['payoutwallet'] = User::where('id', session("loginid"))->sum('payoutwallet');
            $data['downlinepayoutwallet'] = round(User::where('id', '!=', session("loginid"))->sum('payoutwallet'), 2);

            $data['reports'] = \DB::table("reports")->whereDate("created_at", date("Y-m-d"))->where("status", "success")->where("rtype", "main")->orderBy("id", "desc")->take(10)->get(["product", "amount", "txnid", "trans_type", 'created_at']);
        }else{
            $data['mainwallet'] = User::where('id', session("loginid"))->sum('mainwallet');
            $data['payoutwallet'] = User::where('id', session("loginid"))->sum('payoutwallet');
            $data['downlinepayoutwallet'] = User::where('id', session("loginid"))->sum('payoutwallet');

            $data['reports'] = \DB::table("reports")->where('user_id', session("loginid"))->whereDate("created_at", date("Y-m-d"))->where("status", "success")->where("rtype", "main")->orderBy("id", "desc")->take(10)->get(["product", "amount", "txnid", "trans_type", 'created_at']);
        }

        return view('home')->with($data);
    }
    
    public function setpermissions()
    {
        $users = User::whereHas('role', function($q){ $q->whereIn('slug' ,['whitelable','md', 'distributor','retailer','retaillite']); })->get();
        \DB::table('user_permissions')->where('permission_id', 97)->delete();
        foreach ($users as $user) {
            \DB::table('user_permissions')->insert(['user_id'=> $user->id , 'permission_id'=> "97"]);
        }
    }

    public function setscheme()
    {
        $bcids = App\Model\Mahaagent::get(['phone1', 'id']);
        foreach ($bcids as $user) {
            $userdata = User::where('mobile', $user->phone1)->first(['id']);
            if($userdata){
                App\Model\Mahaagent::where('id', $user->id)->update(['user_id' => $userdata->id]);
            }
        }
    }

    public function mydata()
    {
        $data['fundrequest'] = \App\Model\Fundreport::where('credited_by', session("loginid"))->where('status', 'pending')->count();
        $data['member'] = \App\User::where('status', 'block')->where('kyc', 'pending')->count();
        $data['kycpending']      = User::where('kyc', 'pending')->whereHas('role', function ($q){
            $q->whereIn('slug', ['apiuser']);
        })->count();
        $data['kycsubmitted']    = User::where('kyc', 'submitted')->whereHas('role', function ($q){
            $q->whereIn('slug', ['apiuser']);
        })->count();
        $data['kycrejected']     = User::where('kyc', 'rejected')->whereHas('role', function ($q){
            $q->whereIn('slug', ['apiuser']);
        })->count();
        $data['complaint'] = Complaint::where('status', 'pending')->count();
        $data['apitoken']  = Apitoken::where('status', '0')->count();
        $data['pendingApprovals'] = $data['complaint'] + $data['apitoken'];
        $data['payin'] = \DB::table("reports")->where('user_id', session("loginid"))->whereDate("created_at", date("Y-m-d"))->where("status", "success")->where("rtype", "main")->where("product", "payin")->sum("amount");
        $data['payout'] = \DB::table("payoutreports")->where('user_id', session("loginid"))->whereDate("created_at", date("Y-m-d"))->where("status", "success")->where("rtype", "main")->where("product", "payout")->sum("amount");
        return response()->json($data);      
    }

    public function statics(Request $post)
    {
        if(\Myhelper::hasRole("apiuser")){
            $userid = session("loginid");
        }else{
            $userid = $post->userid;
        }

        $query = \DB::table('reports')
        ->where('rtype', 'main')
        ->where('status', 'success')
        ->whereBetween('created_at', [Carbon::now()->subDays(7)->format('Y-m-d'), Carbon::now()->addDay(1)->format('Y-m-d')]);

        if(\Myhelper::hasRole("apiuser")){
            $query->where('user_id', session("loginid"));
        }

        $data['main'] = $query->orderBy('created_at', "asc")              
        ->groupBy(\DB::raw('Date(created_at)'))
        ->select([
            'created_at',
            \DB::raw("sum(case when reports.product = 'qrcode' then reports.charge else 0 end) as qrcodesales"),
            \DB::raw("sum(case when reports.product = 'payout' then reports.amount else 0 end) as payoutsales"),
            \DB::raw("sum(case when reports.product = 'payin'  then reports.amount else 0 end) as payinsales"),
        ])->get();

        return response()->json($data);      
    }
}
