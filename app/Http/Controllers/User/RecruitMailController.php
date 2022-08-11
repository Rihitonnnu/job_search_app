<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserInfoRequest;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendTestMail;      //Mailableクラス
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RecruitMailController extends Controller
{
    public function index()
    {
        // dd('a');
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
        // dd($validator);

        if($validator->fails()) {
            return redirect('/mail')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validate();

        Mail::to(User::find(Auth::id())->email)->send(new SendTestMail($data));

        //フラッシュメッセージ
        session()->flash('message','応募が完了しました。');
        Session::flash('message','応募が完了しました。');

        return redirect()->route('user.dashboard')->with('message','応募が完了しました。');
    }
}