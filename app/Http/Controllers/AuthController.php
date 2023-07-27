<?php

namespace App\Http\Controllers;

use App\Models\GoldPriceResponse;
use Illuminate\Http\Request;
use ErrorException;
use Mail;
use Auth;
use Session;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    
    public function login()
    {
        $check = Auth::user();
        if(!empty($check)) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function checkGold()
    {
        try {
            $currentDateTime = Carbon::now();

            $fetch = GoldPriceResponse::whereDate('created_at', '=', Carbon::today())
                ->whereRaw('created_at <= (created_at + INTERVAL 6 HOUR)')
                ->first();

            if($fetch !== null){
                return response()->json([
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'successfully get prices',
                    'data' => json_decode($fetch->response)
                ], 200);
            }

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://data-asg.goldprice.org/dbXRates/IDR',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: lagrange_session=371abeb1-8793-47fc-befd-54f5ec712a7f; wcid=7krfKlb09pHzAAAC'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            GoldPriceResponse::create([
                'response' => $response
            ])->save();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'successfully get prices',
                'data' => json_decode($response)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => 400,
                'message' => $th->getMessage(),
                'data' => null,
            ], 400);
        }
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {            
            return redirect()->route('dashboard');
        }
  
        return redirect("login")->withErrors('Email atau sandi yang anda masukan salah');
    }

    public function logOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function successVerification()
    {
        return view('pages.emails.success_verification');
    }

    public function notAuthorized()
    {
        return view('pages.errors.401');
    }

}
