<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Throwable;
use App\Models\CompanyApplicants;
use App\Models\CompanyOffer;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    public function registration($id)
    {
        $company_id=CompanyOffer::findOrFail($id)->company->id;

        //ユーザーが応募した募集内容
        $offer_headline = CompanyOffer::findOrFail($id)->headline;
        
        //応募したユーザーの名前
        $user_name = User::findOrFail(Auth::id())->name;
        
        //応募したユーザーの詳細情報
        $user_info = User::findOrFail(Auth::id())->user_info;
        if($user_info==null){
            Session::flash('message', '基本情報を登録してください。');
            return view('user.dashboard');
        }
        
        //募集とユーザーの間の中間テーブルを作成
        $offer=CompanyOffer::find($id);
        $offer->users()->syncWithoutDetaching([
            Auth::id()=>['registration'=>true],
        ]);

        try {
            //応募したユーザの情報の登録と保存処理
            DB::transaction(function ()use($company_id,$offer_headline,$user_name,$user_info) {
                $infos = CompanyApplicants::create([
                    'company_id'=>$company_id,
                    'subject_application'=>$offer_headline,
                    'name'=>$user_name,
                    'grade'=>$user_info->grade,
                    'university'=>$user_info->university,
                    'department'=>$user_info->department,
                    'course'=>$user_info->course,
                    'interest_area'=>$user_info->interest_area,
                    'strong_point'=>$user_info->strong_point,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        // return to_route('user.dashboard');
        return redirect('/mail');
    }
}
