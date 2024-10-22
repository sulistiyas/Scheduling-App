<?php

namespace App\Http\Controllers;

use App\Models\DetailOrderMessenger;
use App\Models\Messenger;
use Illuminate\Http\Request;
use App\Models\OrderMessenger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MessengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_create_messenger()
    {
        $get_user = DB::table('users')
            ->where('user_level', '=', 1)
            ->where('deleted_at', '=', NULL)
            ->orderBy('name', 'ASC')
            ->get();

        $get_messenger  = DB::table('tbl_messenger')
            ->join('users', 'users.id', '=', 'tbl_messenger.id_messenger')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_messenger.deleted_at', '=', Null)->orderBy('users.name')->get();
        return view('layouts.messenger.index_create', compact('get_user', 'get_messenger'));
    }

    public function store_create_messenger(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txt_id_messenger'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'errors'    => $validator->errors()
            ], 401);
        } else {
            $flag_1 = DB::table('tbl_messenger')->where('id_messenger', '=', $request->txt_id_messenger)->first();
            if ($flag_1) {
                Alert::error('Error', 'Messenger Already added !!');
                return redirect()->route('index_create_messenger');
            } else {
                Messenger::create([
                    'id_messenger' => $request->txt_id_messenger
                ]);

                Alert::success('Success', 'Messenger Added');
                return redirect()->route('index_create_messenger');
            }
        }
    }

    public function index_schedule_messenger()
    {
        $get_messenger = DB::table('tbl_messenger')
            ->join('users', 'users.id', '=', 'tbl_messenger.id_messenger')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_messenger.deleted_at', '=', Null)->orderBy('users.name')->get();
        return view('layouts.messenger.schedule', ['get_messenger' => $get_messenger]);
    }

    public function index_result_messenger(Request $request)
    {
        $messenger = $request->selected_messenger;
        $get_messenger = DB::table('tbl_messenger')
            ->join('users', 'users.id', '=', 'tbl_messenger.id_messenger')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_messenger.deleted_at', '=', Null)->orderBy('users.name')->get();
        // return view('layouts.driver.index', ['get_driver' => $get_driver]);
        $date = date("d-M-Y");
        $date1 = date("d-M-Y", strtotime('+ 1 days'));
        $date2 = date("d-M-Y", strtotime('+ 2 days'));
        $date3 = date("d-M-Y", strtotime('+ 3 days'));
        $date4 = date("d-M-Y", strtotime('+ 4 days'));
        $date5 = date("d-M-Y", strtotime('+ 5 days'));
        $date6 = date("d-M-Y", strtotime('+ 6 days'));


        $get_order_messenger = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();

        $get_order_messenger1 = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date1)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();

        $get_order_messenger2 = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date2)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();

        $get_order_messenger3 = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date3)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();

        $get_order_messenger4 = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date4)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();

        $get_order_messenger5 = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date5)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();

        $get_order_messenger6 = DB::table('order_messenger')
            ->select('*')
            ->join('detail_order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->where('tbl_messenger.id_tbl_messenger', '=', $messenger)
            ->where('order_messenger.deleted_at', '=', NULL)
            ->where('detail_order_messenger.order_arrive_date', '=', $date6)
            ->orderBy('detail_order_messenger.order_arrive_time', 'ASC')->get();
        // dd(['get_order_messenger' => $get_order_messenger]);
        return view('layouts.messenger.schedule_result', compact('get_order_messenger', 'get_order_messenger1', 'get_order_messenger2', 'get_order_messenger3', 'get_order_messenger4', 'get_order_messenger5', 'get_order_messenger6', 'get_messenger'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_book_messenger()
    {
        $get_messenger = DB::table('tbl_messenger')
            ->join('users', 'users.id', '=', 'tbl_messenger.id_messenger')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('tbl_messenger.deleted_at', '=', Null)->orderBy('users.name')->get();
        return view('layouts.messenger.index_book', ['get_messenger' => $get_messenger]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_book_messenger(Request $request)
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
            $messenger_id = $request->messenger_name;
            $order_pick_date = $request->inputOrderPickUpDate;
            $order_pick_time = $request->inputOrderPickUpTime;
            $order_arrive_date = $request->arrive_date;
            $order_arrive_time = $request->arrive_time;
            // Check point 1
            if ($order_pick_time >= $order_arrive_time) {
                Alert::error('Error', 'Pick Up Time can`t be greater than Arrive Time !!');
                return redirect()->route('create_book_messenger');
            } else if ($order_arrive_time <= $order_pick_time) {
                Alert::error('Error', 'Arrive Time can`t lower than Pick Up Time !!');
                return redirect()->route('create_book_messenger');
            } else {
                // Check point 2
                $flag_1 = DB::table('detail_order_messenger')
                    ->join('order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
                    ->where('id_tbl_messenger', '=', $messenger_id)
                    ->where('order_pick_up_date', '=', $order_pick_date)
                    ->where('order_pick_up_time', '=', $order_pick_time)->first();
                $flag_2 = DB::table('detail_order_messenger')
                    ->join('order_messenger', 'order_messenger.id_order_messenger', '=', 'detail_order_messenger.id_order_messenger')
                    ->where('id_tbl_messenger', '=', $messenger_id)
                    ->where('order_arrive_date', '=', $order_arrive_date)
                    ->where('order_arrive_time', '=', $order_arrive_time)->first();

                if ($flag_1) {
                    Alert::error('Error', 'Pick Up Schedule has been Booked by another User !!');
                    return redirect()->route('create_book_messenger');
                } else {
                    if ($flag_2) {
                        Alert::error('Error', 'Arrived Schedule has been Booked by another User !!');
                        return redirect()->route('create_book_messenger');
                    } else {
                        // status
                        // 1 = arrived / completed
                        // 2 = on prosess
                        // 3 = waiting confirmation
                        // 4 = Rejected
                        OrderMessenger::create([
                            'id_users'                      => Auth::user()->id,
                            'id_tbl_messenger'                 => $request->messenger_name,
                            'status_order_messenger'           => '3',
                            'notes_messenger'                  => NULL,
                            'created_at'                    => date('Y-m-d h:i:s'),
                            'updated_at'                    => date('Y-m-d h:i:s'),
                        ]);

                        $get_id = DB::table('order_messenger')->select('id_order_messenger')->orderBy('id_order_messenger', 'asc')->get();
                        foreach ($get_id as $items) {
                            $id_order_messenger = $items->id_order_messenger;
                        }
                        DetailOrderMessenger::create([
                            'id_order_messenger'    => $id_order_messenger,
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
                        // return $this->sendWaMessenger($messenger_id, $id_order_messenger);
                        // Send Wa to GA
                        $get_ga = DB::table('users')
                            ->join('employee', 'users.id', '=', 'employee.id_users')
                            ->where('employee.user_job_status', '=', 'GA')
                            ->where('users.deleted_at', '=', NULL)->get();
                        foreach ($get_ga as $item_ga) {
                            $wa_num = $item_ga->user_phone;
                        }

                        $get_messenger = DB::table('order_messenger')
                            ->join('detail_order_messenger', 'detail_order_messenger.id_order_messenger', '=', 'order_messenger.id_order_messenger')
                            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
                            ->join('users', 'users.id', '=', 'tbl_messenger.id_messenger')
                            ->join('employee', 'employee.id_users', '=', 'users.id')
                            ->where('order_messenger.id_order_messenger', '=', $id_order_messenger)
                            ->get();
                        foreach ($get_messenger as $item_messenger) {
                            $messenger_name = $item_messenger->name;
                        }

                        $get_detail_order = DB::table('order_messenger')
                            ->join('detail_order_messenger', 'detail_order_messenger.id_order_messenger', '=', 'order_messenger.id_order_messenger')
                            ->join('users', 'users.id', '=', 'order_messenger.id_users')
                            ->where('order_messenger.id_order_messenger', '=', $id_order_messenger)
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
                            '⭐ Pesanan Baru Order Messenger ⭐' . "\n\n" .
                            '1. Nama User : ' . $nama_request . "\n" .
                            '2. Nama Messenger : ' . $messenger_name . "\n" .
                            '3. Waktu Berangkat : ' . $dep_time . "\n" .
                            '4. Jenis : ' . $jenis . "\n" .
                            '5. Deskripsi : ' . $desc . "\n" .
                            '6. Alamat Pickup : ' . $add_pick . "\n" .
                            '7. Alamat Tujuan : ' . $add_dest . "\n" .
                            '8. Maksimal Waktu Sampai : ' . $max_time . "\n" .
                            'Segera Check orderan Messenger terbaru di https:://scheduling-app.inlingua.co.id ';
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
                                // 'target' => '082110873602',
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
                        Alert::success('Success', 'The order has been sent to GA');
                        return redirect()->route('create_book_messenger');
                    }
                }
            }
        }
    }

    public function approve_messenger(Request $request)
    {
        $order_id = $request->txt_id_order;
        $status = $request->btn_app;

        if ($status == "approve_order") {
            $order_update_app = OrderMessenger::where('id_order_messenger', '=', $order_id)->first();
            $order_update_app->update([
                'status_order_messenger'   => "1",
                'updated_at'            => date('Y-m-d h:i:s')
            ]);
            return $this->sendWaMessenger($order_id);
        } else if ($status == "reject_order") {
            $order_update_rej = OrderMessenger::where('id_order_messenger', '=', $order_id)->first();
            $order_update_rej->update([
                'status_order_messenger'   => "2",
                'updated_at'            => date('Y-m-d h:i:s')
            ]);

            Alert::success('Success', 'Order Rejected & Return Order to User !!');
            return redirect()->route('index_schedule_messenger');
        }
    }

    public function sendWaMessenger($order_id)
    {

        $get_messenger = DB::table('order_messenger')
            ->join('detail_order_messenger', 'detail_order_messenger.id_order_messenger', '=', 'order_messenger.id_order_messenger')
            ->join('tbl_messenger', 'tbl_messenger.id_tbl_messenger', '=', 'order_messenger.id_tbl_messenger')
            ->join('users', 'users.id', '=', 'tbl_messenger.id_messenger')
            ->join('employee', 'employee.id_users', '=', 'users.id')
            ->where('order_messenger.id_order_messenger', '=', $order_id)
            ->get();
        foreach ($get_messenger as $item_messenger) {
            $wa_num = $item_messenger->user_phone;
        }
        $get_detail_order = DB::table('order_messenger')
            ->join('detail_order_messenger', 'detail_order_messenger.id_order_messenger', '=', 'order_messenger.id_order_messenger')
            ->join('users', 'users.id', '=', 'order_messenger.id_users')
            ->where('order_messenger.id_order_messenger', '=', $order_id)
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
                // 'target' => '082110873602',
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
        // echo $message;
        Alert::success('Success', 'Order Approved & Sending Details to Messenger !!');
        return redirect()->route('index_schedule_messenger');
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
