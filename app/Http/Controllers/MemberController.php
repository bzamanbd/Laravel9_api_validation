<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    function testApi(Request $req){
        $rules = array(
            'address'=>'required'
        );

        $validator= Validator::make($req->all(),[
            'name'=> 'required | min:5',
            'address'=> 'required',
        ]);

        if (!$validator->fails()) {
            $member = new Member;
            $member->name = $req->name;
            $member->address = $req->address;
            $result = $member->save();
            if ($result) {
                return 'one data is added';
            } else {

            }

            return 'operation failed';

        } else {
            return response()->json($validator->errors(),401);

        }


    }
}