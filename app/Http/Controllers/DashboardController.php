<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\CustomValue;
use App\Models\Transaction;
use App\Models\GoldPriceResponse;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $menu = "dashboard";
        $allTransaction = Transaction::select('id')->whereRaw('transaction_date < DATE(NOW())')->count();
        $todayTransaction = Transaction::select('id')->whereRaw('transaction_date = DATE(NOW())')->count();

        $fetch = GoldPriceResponse::whereDate('created_at', '=', Carbon::today())
                ->first();

        $fetchG = json_decode($fetch->response);

        $goldPrice = floor($fetchG->items[0]->xauPrice/31.103);
        $margin = CustomValue::where('key','additional_price')->select('value')->first()->value;

        return view('pages.home.index', compact(
            'menu', 
            'allTransaction',
            'todayTransaction',
            'goldPrice',
            'margin',
        ));
    }
}
