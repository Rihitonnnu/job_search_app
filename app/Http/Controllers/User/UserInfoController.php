<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use App\Models\User;
use App\Models\UserInfo;
use App\Http\Requests\UserInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('a');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInfoRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $infos = UserInfo::create([
                    'user_id'=>Auth::id(),
                    'grade'=>$request->grade,
                    'university'=>$request->university,
                    'department'=>$request->department,
                    'course'=>$request->course,
                    'interest_area'=>$request->interest_area,
                    'strong_point'=>$request->strong_point,
                ]);
            }, 2);
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }

        //registration=1に
        $user=User::find(Auth::id());
        $user->registration=1;
        $user->save();
        return view('user.dashboard',compact('user'));
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
        //
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
