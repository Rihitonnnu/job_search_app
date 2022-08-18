<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyOffer;
use Illuminate\Http\Request;
use App\Models\SpreadSheet;
use Illuminate\Support\Facades\Session;


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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
