<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyOffer;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Session;


class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offers=CompanyOffer::with('language','company')->get();

        //それぞれの募集の期限を確認し期限切れの場合はソフトデリートする
        foreach($offers as $offer){
            if(now()>$offer->deadline){
                $offer->delete();
            }
        }
        $languages=['ruby','javascript','java','python','c','php'];
        return view('user.recruit.index',compact(['offers','languages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Auth::id();$id-=1;
        $user=User::with('user_info')->get();
        $user_name=$user[$id]->name;
        $info=$user[$id]->user_info;
        if($info==null){
            //フラッシュメッセージ
            Session::flash('message','基本情報を登録してください。');
            $status='error';
            return view('user.dashboard',compact('status'));
        }
        return view('user.recruit.create',compact('info','user_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer=CompanyOffer::findOrFail($id);
        $offer_languages=$offer->language;
        $languages=['ruby','javascript','java','python','c','php'];

        //開発言語を配列としてviewファイルに渡すための処理
        $cnt=0;
        foreach($languages as $language){
            if(!$offer_languages[$language]){
                unset($languages[$cnt]);
            }
            $cnt++;
        }
        return view('user.recruit.show',compact(['offer','languages']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
