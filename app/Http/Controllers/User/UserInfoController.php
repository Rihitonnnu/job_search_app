<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use App\Http\Requests\UserInfoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserInfoController extends Controller
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
            //ユーザ情報の登録と保存処理
            DB::transaction(function () use ($request) {
                $request->merge(['user_id' => Auth::id()]);
                $attributes = $request->only(['user_id', 'grade', 'university', 'department', 'course', 'interest_area', 'strong_point']);
                $infos = UserInfo::create($attributes);
            }, 2);
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }

        //基本情報が登録済みに変更。一部UIが登録前と変わる
        $user = $request->user(); //認証中のユーザーのユーザー情報
        $user->registration = 1;
        $user->save();

        //フラッシュメッセージ
        Session::flash('message', '登録が完了しました。');
        return view('user.dashboard', compact('user'));
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
        try {
            $info = UserInfo::findOrFail($id);
        } catch (Throwable $e) {
            $info = null;
        }
        return view('user.info.edit', compact(['info']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserInfoRequest $request, $id)
    {
        $info = UserInfo::findOrFail($id);
        try {
            DB::transaction(function () use ($request, $info) {
                $update_info=$request->only(['grade','university','department','course','interest_area','strong_point']);
                $info->update($update_info);
                $info->save();
            }, 2);
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }
        //フラッシュメッセージ
        Session::flash('message', '更新が完了しました。');
        return redirect()->route('user.dashboard')->with('message', '更新が完了しました。');
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
