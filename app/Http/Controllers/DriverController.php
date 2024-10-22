<?php

namespace App\Http\Controllers;

use App\Models\OrderDriver;
use Illuminate\Http\Request;
use App\Models\DetailOrderDriver;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_schedule_driver()
    {
        $get_driver = DB::table('tbl_driver')
            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_driver.deleted_at', '=', Null)->orderBy('users.name')->get();
        return view('layouts.driver.schedule', ['get_driver' => $get_driver]);
    }

    public function index_result_driver(Request $request)
    {
        $driver = $request->selected_driver;
        $driver_name = DB::table('tbl_driver')
            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
            ->where('tbl_driver.id_tbl_driver', '=', $driver)->get();
        $get_driver = DB::table('tbl_driver')
            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_driver.deleted_at', '=', Null)->orderBy('users.name')->get();
        // return view('layouts.driver.index', ['get_driver' => $get_driver]);
        $date = date("d-M-Y");
        $date1 = date("d-M-Y", strtotime('+ 1 days'));
        $date2 = date("d-M-Y", strtotime('+ 2 days'));
        $date3 = date("d-M-Y", strtotime('+ 3 days'));
        $date4 = date("d-M-Y", strtotime('+ 4 days'));
        $date5 = date("d-M-Y", strtotime('+ 5 days'));
        $date6 = date("d-M-Y", strtotime('+ 6 days'));


        $get_order_driver = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('tbl_driver.id_tbl_driver', '=', $driver)
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();

        $get_order_driver1 = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date1)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();

        $get_order_driver2 = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date2)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();

        $get_order_driver3 = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date3)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();

        $get_order_driver4 = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date4)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();

        $get_order_driver5 = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date5)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();

        $get_order_driver6 = DB::table('order_driver')
            ->select('*')
            ->join('detail_order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->where('order_driver.deleted_at', '=', NULL)
            ->where('detail_order_driver.order_arrive_date', '=', $date6)
            ->orderBy('detail_order_driver.order_arrive_time', 'ASC')->get();
        // dd(['get_order_driver' => $get_order_driver]);
        return view('layouts.driver.schedule_result', compact('driver_name', 'get_order_driver', 'get_order_driver1', 'get_order_driver2', 'get_order_driver3', 'get_order_driver4', 'get_order_driver5', 'get_order_driver6', 'get_driver'));
    }

    public function index_create_driver()
    {
        $get_user = DB::table('users')
            ->where('user_level', '=', 1)
            ->where('deleted_at', '=', NULL)
            ->orderBy('name', 'ASC')
            ->get();

        $get_driver = DB::table('tbl_driver')
            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_driver.deleted_at', '=', Null)->orderBy('users.name')->get();
        return view('layouts.driver.index_create_driver', compact('get_user', 'get_driver'));
    }

    public function store_create_driver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txt_id_driver'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'errors'    => $validator->errors()
            ], 401);
        } else {
            $flag_1 = DB::table('tbl_driver')->where('id_driver', '=', $request->txt_id_driver)->first();
            if ($flag_1) {
                Alert::error('Error', 'Driver Already added !!');
                return redirect()->route('index_create_driver');
            } else {
                Driver::create([
                    'id_driver' => $request->txt_id_driver
                ]);

                Alert::success('Success', 'Driver Added');
                return redirect()->route('index_create_driver');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function create_booking()
    {
        $get_driver = DB::table('tbl_driver')
            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_driver.deleted_at', '=', Null)->orderBy('users.name')->get();
        return view('layouts.driver.index_book', ['get_driver' => $get_driver]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function store_booking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inputOrderPickUpDate'      => 'required',
            'inputOrderPickUpTime'      => 'required',
            'arrive_date'               => 'required',
            'arrive_time'               => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'errors'    => $validator->errors()
            ], 401);
        } else {
            $driver_id = $request->driver_name;
            $order_pick_date = $request->inputOrderPickUpDate;
            $order_pick_time = $request->inputOrderPickUpTime;
            $order_arrive_date = $request->arrive_date;
            $order_arrive_time = $request->arrive_time;
            // Check point 1
            if ($order_pick_time >= $order_arrive_time) {
                Alert::error('Error', 'Pick Up Time can`t be greater than Arrive Time !!');
                return redirect()->route('create_book_driver');
            } else if ($order_arrive_time <= $order_pick_time) {
                Alert::error('Error', 'Arrive Time can`t lower than Pick Up Time !!');
                return redirect()->route('create_book_driver');
            } else {
                // Check point 2
                $flag_1 = DB::table('detail_order_driver')
                    ->join('order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
                    ->where('id_tbl_driver', '=', $driver_id)
                    ->where('order_pick_up_date', '=', $order_pick_date)
                    ->where('order_pick_up_time', '=', $order_pick_time)->first();
                $flag_2 = DB::table('detail_order_driver')
                    ->join('order_driver', 'order_driver.id_order_driver', '=', 'detail_order_driver.id_order_driver')
                    ->where('id_tbl_driver', '=', $driver_id)
                    ->where('order_arrive_date', '=', $order_arrive_date)
                    ->where('order_arrive_time', '=', $order_arrive_time)->first();

                if ($flag_1) {
                    Alert::error('Error', 'Pick Up Schedule has been Booked by another User !!');
                    return redirect()->route('create_book_driver');
                } else {
                    if ($flag_2) {
                        Alert::error('Error', 'Arrived Schedule has been Booked by another User !!');
                        return redirect()->route('create_book_driver');
                    } else {
                        // status
                        // 1 = arrived / completed
                        // 2 = on prosess
                        // 3 = waiting confirmation
                        // 4 = Rejected
                        OrderDriver::create([
                            'id_users'                      => Auth::user()->id,
                            'id_tbl_driver'                 => $request->driver_name,
                            'status_order_driver'           => '3',
                            'notes_driver'                  => NULL,
                            'created_at'                    => date('Y-m-d h:i:s'),
                            'updated_at'                    => date('Y-m-d h:i:s'),
                        ]);

                        $get_id = DB::table('order_driver')->select('id_order_driver')->orderBy('id_order_driver', 'asc')->get();
                        foreach ($get_id as $items) {
                            $id_order_driver = $items->id_order_driver;
                        }
                        DetailOrderDriver::create([
                            'id_order_driver'       => $id_order_driver,
                            'item_type'             => $request->item_type,
                            'order_pick_up_date'    => $request->inputOrderPickUpDate,
                            'order_pick_up_time'    => $request->inputOrderPickUpTime,
                            'pick_address'          => $request->txt_pick,
                            'note_sender'           => $request->txt_note,
                            'order_arrive_date'     => $request->arrive_date,
                            'order_arrive_time'     => $request->arrive_time,
                            'client'                => $request->txt_client,
                            'destination_address'   => $request->txt_dest,
                            'created_at'            => date('Y-m-d h:i:s'),
                            'updated_at'            => date('Y-m-d h:i:s'),
                        ]);

                        // Send Wa to GA
                        $get_ga = DB::table('users')
                            ->join('employee', 'users.id', '=', 'employee.id_users')
                            ->where('employee.user_job_status', '=', 'GA')
                            ->where('users.deleted_at', '=', NULL)->get();
                        foreach ($get_ga as $item_ga) {
                            $wa_num = $item_ga->user_phone;
                        }

                        $get_driver = DB::table('order_driver')
                            ->join('detail_order_driver', 'detail_order_driver.id_order_driver', '=', 'order_driver.id_order_driver')
                            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
                            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
                            ->join('employee', 'employee.id_users', '=', 'users.id')
                            ->where('order_driver.id_order_driver', '=', $id_order_driver)
                            ->get();
                        foreach ($get_driver as $item_driver) {
                            $driver_name = $item_driver->name;
                        }

                        $get_detail_order = DB::table('order_driver')
                            ->join('detail_order_driver', 'detail_order_driver.id_order_driver', '=', 'order_driver.id_order_driver')
                            ->join('users', 'users.id', '=', 'order_driver.id_users')
                            ->where('order_driver.id_order_driver', '=', $id_order_driver)
                            ->get();
                        foreach ($get_detail_order as $item_order) {
                            $nama_request = $item_order->name;
                            $jenis = $item_order->item_type;
                            $desc = $item_order->note_sender;
                            $add_pick = $item_order->pick_address;
                            $add_dest = $item_order->destination_address;
                            $dep_time = $item_order->order_pick_up_date . " " . $item_order->order_pick_up_time;
                            $max_time = $item_order->order_arrive_date . " " . $item_order->order_arrive_time;
                        }
                        $message =
                            '⭐ Pesanan Baru Order Driver ⭐' . "\n\n" .
                            '1. Nama User : ' . $nama_request . "\n" .
                            '2. Nama Driver : ' . $driver_name . "\n" .
                            '3. Waktu Berangkat : ' . $dep_time . "\n" .
                            '4. Jenis : ' . $jenis . "\n" .
                            '5. Deskripsi : ' . $desc . "\n" .
                            '6. Alamat Pickup : ' . $add_pick . "\n" .
                            '7. Alamat Tujuan : ' . $add_dest . "\n" .
                            '8. Maksimal Waktu Sampai : ' . $max_time . "\n" .
                            'Segera Check orderan Driver terbaru di https:://scheduling-app.inlingua.co.id ';
                        $no_wa = $wa_num;
                        $token = 'vVg3VwUmzcTxGy3kBzo6';

                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://api.fonnte.com/send',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array(
                                'target' => $no_wa,
                                'message' => $message,
                                'countryCode' => '62', //optional
                            ),
                            CURLOPT_HTTPHEADER => array(
                                'Authorization: ' . $token //change TOKEN to your actual token
                            ),
                        ));

                        $response = curl_exec($curl);
                        if (curl_errno($curl)) {
                            $error_msg = curl_error($curl);
                        }
                        curl_close($curl);

                        if (isset($error_msg)) {
                            echo $error_msg;
                        }

                        Alert::success('Success', 'Sending Order Details to GA !!');
                        return redirect()->route('index_driver');
                    }
                }
            }
        }
    }

    public function approve_driver(Request $request)
    {
        $order_id = $request->txt_id_order;
        $status = $request->btn_app;

        if ($status == "approve_order") {
            $order_update_app = OrderDriver::where('id_order_driver', '=', $order_id)->first();
            $order_update_app->update([
                'status_order_driver'   => "1",
                'updated_at'            => date('Y-m-d h:i:s')
            ]);
            return $this->sendWa($order_id);
        } else if ($status == "reject_order") {
            $order_update_rej = OrderDriver::where('id_order_driver', '=', $order_id)->first();
            $order_update_rej->update([
                'status_order_driver'   => "2",
                'updated_at'            => date('Y-m-d h:i:s')
            ]);

            Alert::success('Success', 'Order Rejected & Return Order to User !!');
            return redirect()->route('index_driver');
        }
    }

    public function sendWa($order_id)
    {

        $order_pick_date = date('Y-m-d');
        $order_pick_time = date('h:i:s');
        $order_arrive_date = date('Y-m-d');
        $order_arrive_time = date('h:i:s');
        $get_driver = DB::table('order_driver')
            ->join('detail_order_driver', 'detail_order_driver.id_order_driver', '=', 'order_driver.id_order_driver')
            ->join('tbl_driver', 'tbl_driver.id_tbl_driver', '=', 'order_driver.id_tbl_driver')
            ->join('users', 'users.id', '=', 'tbl_driver.id_driver')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('order_driver.id_order_driver', '=', $order_id)
            ->get();
        foreach ($get_driver as $item_driver) {
            $wa_num = $item_driver->user_phone;
        }
        $get_detail_order = DB::table('order_driver')
            ->join('detail_order_driver', 'detail_order_driver.id_order_driver', '=', 'order_driver.id_order_driver')
            ->join('users', 'users.id', '=', 'order_driver.id_users')
            ->where('order_driver.id_order_driver', '=', $order_id)
            ->get();
        foreach ($get_detail_order as $item_order) {
            $nama_request = $item_order->name;
            $jenis = $item_order->item_type;
            $desc = $item_order->note_sender;
            $add_pick = $item_order->pick_address;
            $add_dest = $item_order->destination_address;
            $dep_time = $item_order->order_pick_up_date . " " . $item_order->order_pick_up_time;
            $max_time = $item_order->order_arrive_date . " " . $item_order->order_arrive_time;
        }
        $message =
            '⭐ Pesanan Baru ⭐' . "\n\n" .
            '1. Nama : ' . $nama_request . "\n" .
            '2. Waktu Berangkat : ' . $dep_time . "\n" .
            '3. Jenis : ' . $jenis . "\n" .
            '4. Deskripsi : ' . $desc . "\n" .
            '5. Alamat Pickup : ' . $add_pick . "\n" .
            '6. Alamat Tujuan : ' . $add_dest . "\n" .
            '7. Maksimal Waktu Sampai : ' . $max_time;
        $no_wa = $wa_num;
        $token = 'vVg3VwUmzcTxGy3kBzo6';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $no_wa,
                'message' => $message,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        // echo $response;
        Alert::success('Success', 'Order Approved & Sending Details to Driver !!');
        return redirect()->route('index_driver');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
