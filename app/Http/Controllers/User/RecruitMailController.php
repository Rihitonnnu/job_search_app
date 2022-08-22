<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserInfoRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendMail;

class RecruitMailController extends Controller
{
    public function index()
    {
        return view('user.error');
    }

    public function send(Request $request)
    {   
        $rules = [
            'name'=>'required',
            'university'=>'required|max:50',
            'department'=>'required',
            'course'=>'required',
            'interest_area'=>'required|max:50',
            'strong_area'=>'max:500',
        ];

        $messages = [
            'course.required'=>'学科を入力してください',
            'strong_area.required'=>'自分の強みは必ず記入してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect('/mail')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $validator->validate();

        SendMail::dispatch($data);

        //フラッシュメッセージ
        Session::flash('message','応募が完了しました。');

        return redirect()->route('user.dashboard')->with('message','応募が完了しました。');
    }
}