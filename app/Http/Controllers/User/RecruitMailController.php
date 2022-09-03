<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendMail;
use Illuminate\Support\Facades\Auth;


class RecruitMailController extends Controller
{
    public function index()
    {
        return view('user.error');
    }

    public function send(Request $request)
    {   
        //応募した人のデータ取得
        $data=User::find(Auth::id());

        //メール送信処理
        SendMail::dispatch($data);

        //フラッシュメッセージ
        Session::flash('message','応募が完了しました。');

        return redirect()->route('user.dashboard')->with('message','応募が完了しました。');
    }
}