<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Parents;

class ControllerUser extends Controller
{
    public function Show_Login()
    {
        return view('unregistered.login');
    }

    public function Show_Register()
    {
        return view('unregistered.register');
    }

    public function Post_Login(Request $request)
    {
        $email              = $request->email;
        $password           = $request->password;
        $hash_pass          = "";
        $parents_status     = "NO";
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $parents           = \DB::select("select * from parents where email = '".$email."'");
        foreach($parents as $row_parents)
        {
            $hash_pass        = $row_parents->password;
        }

        if(password_verify($password, $hash_pass))
        {
            $parents_status = "YES";
        }

        if($parents_status == "YES")
        {
            $id_saya = 0;
            $parents           = \DB::select("select * from parents where email = '".$email."'");
            foreach($parents as $row_parents)
            {
                $id_saya              = $row_parents->id;
                $st_membership        = $row_parents->membership;
            }
            // echo $id_saya;
            if($st_membership == "FREE")
            {
                // echo "free";
                $parents_status = "NO";
            }
            else
            {
                $param['user_saya']           = \DB::select("select * from users where id_parents = '".$id_saya."'");
                return view('WP_Parents.select_child')->with($param);
            }
        }
        if($parents_status == "NO")
        {
            echo "anak";
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $data = [
                'email'     => $request->input('email'),
                'password'  => $request->input('password'),
            ];

            Auth::attempt($data);

            if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
                //Login Success
                // session()->put('loginuser',Auth::user()->email);
                // session()->put('tipe_member',Auth::user()->tipe_member);
                // session()->put('parent','yes');
                return redirect()->route('dashboard');
            }else{
                //Login Fail
                Session::flash('error', 'Email atau password salah');
                return redirect()->route('login');
            }
        }
        else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function masuk_ke_wp($id)
    {
        echo $id;
        $wp           = \DB::select("select * from users where id = '".$id."' ");
        Auth::loginUsingId($id);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            // session()->put('loginuser',Auth::user()->email);
            // session()->put('tipe_member',Auth::user()->tipe_member);
            // session()->put('parent','yes');
            return redirect()->route('dashboard');
        }
        else
        {
            echo "err";
        }
    }

    public function Post_Register(Request $request)
    {
        $new_name = $_POST['param_name'];
        $new_email = $_POST['param_email'];
        $new_pass = $_POST['param_pass'];
        $new_tipe = $_POST['param_tipe'];

        // $kalimat = "param : " . $a . "|" . $b . "|" . $c . "|" . $z . "|";
        // return $kalimat;

        \DB::table('regis')->insert(
            [
                'uname' => $new_name,
                'uemail' => $new_email,
                'upass' => $new_pass,
                'tipe' => $new_tipe,
                // 'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                // 'show_status' => 1
            ]
        );
        if($new_tipe == 'free'){
            \DB::table('parents')->insert(
                [
                    'name' => $new_name,
                    'email' => $new_email,
                    'password' => bcrypt($new_pass),
                    'membership' => strtoupper($new_tipe),
                    'start_membership' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'exp_membership' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'show_status' => 1
                ]
            );
            $parents = Parents::where('email',$new_email)->first();
            \DB::table('users')->insert(
                [
                    'id_parents'=>$parents->id,
                    'nama_lengkap' => $new_name,
                    'email' => $new_email,
                    'password' => bcrypt($new_pass),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]
            );
            $data = [
                'email'     => $new_email,
                'password'  => $new_pass,
            ];

            Auth::attempt($data);

            if (Auth::check()) {
                return redirect()->route('dashboard');
            }
        }else{
            \DB::table('parents')->insert(
                [
                    'name' => $new_name,
                    'email' => $new_email,
                    'password' => bcrypt($new_pass),
                    'membership' => strtoupper($new_tipe),
                    'start_membership' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'exp_membership' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'show_status' => 1
                ]
            );
            $parents = Parents::where('email',$new_email)->first();
            \DB::table('users')->insert(
                [
                    'id_parents'=>$parents->id,
                    'nama_lengkap' => $new_name,
                    'email' => $new_name.$parents->id.rand(0,9999),
                    'password' => bcrypt($new_pass),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]
            );
            \DB::table('users')->insert(
                [
                    'id_parents'=>$parents->id,
                    'nama_lengkap' => $new_name,
                    'email' => $new_name.$parents->id.rand(0,9999),
                    'password' => bcrypt($new_pass),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]
            );
            if($new_tipe == 'platinum'){
                \DB::table('users')->insert(
                    [
                        'id_parents'=>$parents->id,
                        'nama_lengkap' => $new_name,
                        'email' => $new_name.$parents->id.rand(0,9999),
                        'password' => bcrypt($new_pass),
                        'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    ]
                );
            }

            $id_saya              = $parents->id;
            $st_membership        = $parents->membership;

            $param['user_saya']           = \DB::select("select * from users where id_parents = '".$id_saya."'");
            return view('WP_Parents.select_child')->with($param);
        }

        \Session::flash('success', 'Register Berhasil');
    }

    public function Show_Dashboard()
    {
        $id_wp = Auth::user()->id;

        $param['kategori_bank']                 = \DB::select("select distinct bank.jenis from bank");
        $param['bank']                          = \DB::select("select * from bank");
        $param['RDN']                           = \DB::select("select * from sekuritas");
        $param['sumber_dana']                   = \DB::select("SELECT *, bank.nama_bank as namabank from sumber_dana LEFT JOIN bank on bank.kode_bank = sumber_dana.Nama_Bank where ID_WP ='".$id_wp."' and sumber_dana.Jenis != 'RDN' order by sumber_dana.ID_Record");
        $param['sumber_rdn']                    = \DB::select("SELECT *, sekuritas.Nama as namasekuritas from sumber_rdn LEFT JOIN sekuritas on sekuritas.Kode_Sekuritas = sumber_rdn.Kode_Sekuritas where ID_WP ='".$id_wp."' order by sumber_rdn.ID_Record");
        $param['pemasukan']                     = \DB::table('pemasukan')
                                                    ->where('ID_WP', '=', $id_wp)
                                                    ->where('show_status', '=', 1)
                                                    ->get();
        $param['pengeluaran']                   = \DB::table('pengeluaran')
                                                    ->where('ID_WP', '=', $id_wp)
                                                    ->where('show_status', '=', 1)
                                                    ->get();
        $param['mutasi_rdn_depo']               = \DB::table('mutasi_rdn')
                                                    ->where('ID_WP', '=', $id_wp)
                                                    ->where('Tipe', '=', 'DEPOSIT')
                                                    ->where('show_status', '=', 1)
                                                    ->get();
        $param['mutasi_rdn_withdraw']           = \DB::table('mutasi_rdn')
                                                    ->where('ID_WP', '=', $id_wp)
                                                    ->where('Tipe', '=', 'WITHDRAW')
                                                    ->where('show_status', '=', 1)
                                                    ->get();
        $param['buy_saham']                     = \DB::table('saham')
                                                    ->where('ID_WP', '=', $id_wp)
                                                    ->where('Action', '=', 'BUY')
                                                    ->where('show_status', '=', 1)
                                                    ->get();
        $param['sell_saham']                     = \DB::table('saham')
                                                    ->where('ID_WP', '=', $id_wp)
                                                    ->where('Action', '=', 'SELL')
                                                    ->where('show_status', '=', 1)
                                                    ->get();
        return view('index')->with($param);
    }

    public function User_logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function daftardummy()
    {
        // $tanggal_sekarang = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // $tanggal_tambahan = \Carbon\Carbon::now()->addMonths(12)->format('Y-m-d H:i:s');
        // echo $tanggal_sekarang . " sampai " . $tanggal_tambahan . "<br>" ;

        //Buat Parents
        // $parents = new Parents;
        // $parents->name = "pgold";
        // $parents->email = "pgold@gmail.com";
        // $parents->password = Hash::make("pgold123");
        // $parents->membership = "GOLD";
        // $parents->start_membership = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // $parents->exp_membership = \Carbon\Carbon::now()->addMonths(6)->format('Y-m-d H:i:s');
        // $parents->show_status = 1;
        // $simpan = $parents->save();

        // $parents = new Parents;
        // $parents->name = "pplat";
        // $parents->email = "pplat@gmail.com";
        // $parents->password = Hash::make("pplat123");
        // $parents->membership = "Platinum";
        // $parents->start_membership = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // $parents->exp_membership = \Carbon\Carbon::now()->addMonths(12)->format('Y-m-d H:i:s');
        // $parents->show_status = 1;
        // $simpan = $parents->save();

        //Buat User Free
        // $parents = new Parents;
        // $parents->name = "parents_free";
        // $parents->email = "pfree@gmail.com";
        // $parents->password = Hash::make("pfree123");
        // $parents->membership = "FREE";
        // $parents->start_membership = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // $parents->exp_membership = \Carbon\Carbon::now()->addMonths(3)->format('Y-m-d H:i:s');
        // $parents->show_status = 1;
        // $simpan = $parents->save();

        // $user = new User;
        // $user->id_parents = 3;
        // $user->nama_lengkap = "user_free";
        // $user->email = "pfree@gmail.com";
        // $user->password = Hash::make("pfree123");
        // $parents->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // $simpan = $user->save();


        echo "daftar dummymymymy";
    }

    public function updatebayar(Request $request)
    {
        $paramsesi = intval($_POST['paramsessi']);
        $number = $_POST['paramsessi'];

        // RegisteredUser::where('nomorid', $number)
        //                 ->update(
        //                     [
        //                         'status' => 2,
        //                         'payment_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //                     ]
        //                 );
        session()->forget('key_id');
        return "suksess " . $number;
    }

    public function cekpembayaran(Request $request)
    {
        $paramsesi = intval($_POST['paramsessi']);
        $number = intval($paramsesi);
        // $number = $_POST['paramsessi'];
        $param['status'] = "param";

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/$number/status",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-type: application/json",
            "Authorization: Basic ".base64_encode("SB-Mid-server-MJ3or9mOMb3EA2R0w8Y28Mzx"),
          ),
        ));

        $response   = curl_exec($curl);
        $err        = curl_error($curl);

        curl_close($curl);

        if ($err) {
			// print_r("atas");
			echo "Eror : " . "cURL Error #:" . $err;
            $param['status'] = "mid eror";
        } else {
			// print_r("bawah");
			// echo "Sukses : " . $response;
            // echo "<br>";
            // echo "<hr>";

            // $res = json_decode($res);
            if(!str_contains($response, '404'))
            {
                $res = json_decode($response);
                // print_r($res);

                // ga semua pembayaran sama bisa diambil gini
                // echo "Pembayaran melalui : " . $res->va_numbers[0]->bank . " - ". $res->va_numbers[0]->va_number;
                // echo "<br>";
                // echo "Terbayar pada " . $res->payment_amounts[0]->paid_at;

                if($res->status_message == "Success, transaction is found") {
                    if($res->transaction_status == "settlement")
                    {
                        // echo "<h1> sukses </h1>";
                        // $data = cust_order_header::find($row->Id_order);
                        // $data->Status = 2;
                        // $data->save();

                        $param['status'] = "Sukses";
                    }
                }
                if($res->status_message == "Success, transaction is found") {
                    if($res->transaction_status == "pending")
                    {
                        // echo "<h1> pending </h1>";
                        // $data = cust_order_header::find($row->Id_order);
                        // $data->Status = 2;
                        // $data->save();

                        $param['status'] = "Pending";
                    }
                }
                if($res->status_message == "Success, transaction is found") {
                    if($res->transaction_status == "deny")
                    {
                        // echo "<h1> ditolak </h1>";
                        // $data = cust_order_header::find($row->Id_order);
                        // $data->Status = 2;
                        // $data->save();

                        $param['status'] = "Ditolak";
                    }
                }
                if($res->status_message == "Success, transaction is found") {
                    if($res->transaction_status == "cancel")
                    {
                        // echo "<h1> cancel </h1>";
                        // $data = cust_order_header::find($row->Id_order);
                        // $data->Status = 2;
                        // $data->save();
                        $param['status'] = "Cancel";
                    }
                }
            }

        }
        return $param;
    }


    public function pendaftaran(Request $request)
    {
        $uemail = $_POST['paramemail'];
        $email = $uemail;

        $unama = $_POST['paramnama'];
        $nama = $unama;

        $upass = $_POST['parampass'];
        $tipe = $_POST['tipe'];
        $param['nama']            = $unama;
        $pilmember = strtoupper($tipe);
        // $harga = 1;

        // $nomorid = "ab123";
        // $nama = "corb";
        // $email = "corb@gmail.com";
        // $pilmember = "PLATINUM";

        $harga = $this->cek_harga($pilmember);

        // $jumcount = 1;
        // $jumcount = \DB::table('registered_user')->count();
        // $jumcount++;
        // session()->forget('id_recs');
        // session()->put('id_recs', $jumcount);

        $nomorid = date('Ymd').RAND(4,100000);
        // $param['noid'] = is_numeric($nomorid);


        $midtrans = new CreateSnapTokenService($nomorid,$email,$nama,$pilmember,$harga);
        $snapToken = $midtrans->getSnapToken();

        $param['token']            = $snapToken;
        $param['nomorid'] = $nomorid;

        // $simpan = new RegisteredUser;
        // $simpan->nomorid = $nomorid;
        // $simpan->tipe = $pilmember;
        // $simpan->harga = $harga;
        // $simpan->email = $email;
        // $simpan->token = $snapToken;
        // $simpan->status = 1;
        // $simpan->payment = "-";
        // $simpan->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // $simpan->updated_at = "";
        // $simpan->save();


        session()->forget('key_id');
        session()->put('key_id', $nomorid);
        // session()->forget('key_token');
        // session()->put('key_token', $snapToken);

        return $param;
    }

    public function cek_harga($tipemember)
    {
        if($tipemember == "FREE")
        {
            $harga = 0;
        }
        else if($tipemember == "GOLD")
        {
            $harga = 175000;
        }
        else if($tipemember == "PLATINUM")
        {
            $harga = 250000;
        }

        return $harga;
    }

    public function Post_Cekemail(Request $request)
    {
        $email = $request->email;
        $exist = Parents::where('email',$email)->first();
        if($exist)
            return ['success'=>false];
        return ['success'=>true];
    }
}
