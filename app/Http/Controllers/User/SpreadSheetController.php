<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyOffer;
use Illuminate\Http\Request;
use App\Models\SpreadSheet;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SpreadSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::findOrFail(Auth::id());
        // dd($user);
        try{
            DB::transaction(function () use($request,$user) {
                $user->sheet_url=$request->name;
            });
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }
        $user->save();
        Session::flash('message','シートの登録が完了しました。');
        return to_route('user.dashboard');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer=CompanyOffer::findOrfail($id);
        $company=$offer->company;
        $spread_sheet = new SpreadSheet();
        $url=User::find(Auth::id())->url;
        if($url==null){
            Session::flash('message','シートのurlを登録して下さい。');
            return to_route('user.sheet.create');
        }

        // スプレッドシートに格納するテストデータです
        $insert_data = [
            'company_name' => $company->company_name,
            'job_title' => $offer->job_title,
            'headline'  => $offer->headline,
            'deadline'  => $offer->deadline,
        ];

        // dd($insert_data);

        $spread_sheet->insert_spread_sheet($insert_data);

        // return response('格納に成功！！', 200);
        Session::flash('message','シートに募集情報を記入しました。');
        return to_route('user.recruit.index');
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
