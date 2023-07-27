<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use Alert;
use App\Models\User;
use DB;
use Auth;
use Hash;
use Mail;
use Validator;
use DataTables;

class UserController extends Controller
{

    public function getData()
    {
        $users = User::orderBy('users.created_at', 'desc');
            
        return DataTables::of($users)
            ->rawColumns(['action'])
            ->make(true);
    }

    public function allUsers()
    {
        $menu = "users";
        
        return view('pages.users.index', compact(
            'menu'
        ));
    }

    public function addUser(Request $request)
    {
        $menu = "users";
        
        return view('pages.users.add', compact(
            'menu'
        ));
    }

    public function storeUser(Request $request)
    {
        $menu = "users";
        $validate = Validator::make($request->all(), [
            'userEmail' => 'required|unique:users,email',
            'userFullName' => 'required',
            'userConfirmPassword' => 'required',
        ], [
            'userFullName.required' => 'Maaf kamu belum input nama lengkap',
            'userEmail.required' => 'Maaf kamu belum input email',
            'userEmail.unique' => 'Maaf email kamu masukan sudah di gunakan!',
            'userConfimPassword.required' => 'Maaf kamu belum input password',
        ]);
        
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        
        DB::beginTransaction();
        try {
            $create = new User();
            $create->full_name = $request->userFullName;
            $create->email = $request->userEmail;
            $create->password = bcrypt($request->userConfirmPassword);
            $create->save();
            
            DB::commit();
            Alert::success('Berhasil', 'Menambah user Baru');
            return redirect()->route('users');
        } catch (\Exception $e) {
            return $e->getMessage();
            DB::rollback();
            Alert::error('Gagal', 'Maaf gagal menambahkan data');
            return back();
        }
    }

    public function delete(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $menu = "users";
            
            $checkUser = User::where('id', $id)->first();
            if(empty($checkUser)){
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400,
                    'message'   => 'Maaf tidak ada data user tersebut!'
                ], 400);
            }

            User::where('id', $id)->delete();

            DB::commit();
            return response()->json([
                'status'    => 'failed', 
                'code'      => 200,
                'message'   => 'Berhasil menghapus data pengguna'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'    => 'failed', 
                'code'      => 500,
                'message'   => 'Maaf ada kendala server!'
            ], 500);
        }
    }
}
