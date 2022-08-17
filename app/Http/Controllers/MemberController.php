<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    function testApi(Request $req){
        $rules = array(
            'name'=> 'required | min:5',
            'address'=>'required'
        );

        $validator= Validator::make($req->all(),$rules);

        if (!$validator->fails()) {
            $member = new Member;
            $member->name = $req->name;
            $member->address = $req->address;
            $result = $member->save();
            if ($result) {
                return 'one data is added';
            } else {

                return response()->json($validator->errors(),401);
            }
        } else {
            return response()->json($validator->errors(),401);

        }


    }
}