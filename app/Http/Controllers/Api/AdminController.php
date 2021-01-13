<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'family' => 'required',
                'password' => 'required',
            ]);
        if ($validator->fails()) {

            return response()->json(['error'=>$validator->errors()], 401);

        }


        $admin = new Admin();
        $admin->name = $request->name;
        $admin->family = $request->family;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->save();

        if ($this->token) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $admin
        ], Response::HTTP_OK);    }
}
