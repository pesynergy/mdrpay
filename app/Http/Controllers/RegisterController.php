<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Model\Scheme;
use App\Model\Company;
use App\Model\Provider;
use App\Model\Circle;
use App\Model\Role;
use App\Model\Permission;
use App\Model\Pindata;
use App\Model\Commission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DB;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate if the user has permission to create the role
        $role = Role::find($request->role_id);

        // Prepare user data for storage
        $userData = $request->all();
        $userData['id'] = 'new';
        $userData['parent_id'] = $request->reseller_id;
        $userData['kyc'] = 'pending';
        $userData['password'] = bcrypt($request->mobile);

        // Generate unique agent code based on the max user ID
        $maxId = User::max('id');
        $userData['agentcode'] = 'PAPI' . ($maxId + 20200);

        // Store or update the user data
        $user = User::updateOrCreate(['id' => $userData['id']], $userData);

        if ($user) {
            // Return a success response
            return response()->json(['status' => 'success'], 200);
        }

        // Return a failure response if the user couldn't be stored
        return response()->json(['status' => 'fail'], 400);
    }
}
