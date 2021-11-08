<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'name' => 'unique:users|required',
            'email' => 'unique:users|email|required',
            'password' => 'required'
        ];

        $input = $request->only('name', 'email', 'password');
        $validator = validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);

        return response(200);
    }
}
