<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailUserInformation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_data = DB::table('users')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('users.deleted_at', '=', NULL)
            ->orderBy('users.id', 'ASC')->get();
        return view('layouts.user.index', ['user_data' => $user_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txt_name' => 'required',
            'txt_email' => 'required',
            'txt_pass' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'errors'    => $validator->errors()
            ]);
        } else {
            User::create([
                'name'          => $request->txt_name,
                'email'         => $request->txt_email,
                'password'      => Hash::make($request->txt_pass),
                'user_level'    => '1',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ]);
            $get_id = DB::table('users')->select('id')->orderBy('id', 'asc')->get();
            foreach ($get_id as $items) {
                $id_users = $items->id;
            }
            Employee::create([
                'id_users'          => $id_users,
                'user_phone'        => $request->txt_phone,
                'user_job_status'   => $request->txt_job,
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s')
            ]);

            $get_data = DB::table('users')->where('id', '=', $id_users)->where('deleted_at', '=', NULL)->get();
            foreach ($get_data as $item) {
                $name = $item->name;
                $email = $item->email;
            }
            $data = [
                'name'      => $name,
                'email'     => $email,
                'password'  => "semangat"
            ];
            Mail::to($email)->send(new SendEmailUserInformation($data));
            Alert::success('Success', 'Insert Data Successfully');
            return redirect()->route('index_user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fetch_data = DB::table('users')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('users.deleted_at', '=', NULL)
            ->where('users.id', '=', $id)
            ->orderBy('users.id', 'ASC')->get();
        return view('components.modals.user_management.show', ['fetch_data' => $fetch_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit_data = DB::table('users')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('users.deleted_at', '=', NULL)
            ->where('users.id', '=', $id)
            ->orderBy('users.id', 'ASC')->get();
        return view('components.modals.user_management.update', ['edit_data' => $edit_data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users_data = User::where('id', '=', $id)->first();
        $employee_data = Employee::where('id_users', '=', $id)->first();
        $validator = Validator::make($request->all(), [
            'txt_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'errors'    => $validator->errors()
            ], 401);
        } else {
            $users_data->update([
                'name'        => $request->txt_name,
                'updated_at'  => date('Y-m-d h:i:s')
            ]);

            $employee_data->update([
                'user_phone'        => $request->txt_phone,
                'user_job_status'   => $request->txt_job,
                'updated_at'        => date('Y-m-d h:i:s')
            ]);
            Alert::success('Success', 'Successfully Update Users Data');
            return redirect()->route('index_user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users_data = User::where('id', '=', $id)->first();
        $employee_data = Employee::where('id_users', '=', $id)->first();
        $users_data->delete();
        $employee_data->delete();
        Alert::success('Success', 'Data Deleted Successfully');
        return redirect()->route('index_user');
    }

    public function sendMail(Request $request)
    {
        $user_id = $request->txt_id;
        $get_data = DB::table('users')->where('id', '=', $user_id)->where('deleted_at', '=', NULL)->get();
        foreach ($get_data as $item) {
            $name = $item->name;
            $email = $item->email;
        }
        $data = [
            'name'      => $name,
            'email'     => $email,
            'password'  => "semangat"
        ];
        Mail::to($email)->send(new SendEmailUserInformation($data));
    }
}
