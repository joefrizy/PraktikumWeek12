<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $user   = User::all();

        return new RegisterResource(true, 'List data user', $user);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password'  => 'required',
            // 'confirm_password'  => 'required|same:password'
        ]);
        if ($validator->fails()){
            return new RegisterResource(false, 'Ada kesalahan', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $succsess['token'] = $user->createToken('auth_token')->plainTextToken;
        $succsess['name'] = $user->name;

        return new RegisterResource(true, 'Berhasil nambah user', $succsess);
    }


    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return new RegisterResource(true, 'Berhasil Menghapus User', $user);
    }
}