<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyOffer;
use App\Models\CompanyLanguage;
use App\Http\Requests\JobOfferRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Throwable;
use Carbon\Carbon;

class RegistrationJobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //自社の募集内容のみを取得
        $offers = Company::with(['offers.language'])->get();
        $myoffers = $offers[Auth::id() - 1]->offers;
        $languages = ['ruby', 'javascript', 'java', 'python', 'c', 'php'];
        return view('company.registration_job.index', compact(['myoffers', 'languages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.registration_job.create');
    }
    
    public function store(JobOfferRequest $request)
    {
        //thumbnailの保存
        $filename = $request->file('thumbnail')->store('');
        $thumbnail_path = $request->file('thumbnail')->storeAs('public/', $filename);

        //データ更新
        try {
            DB::transaction(function () use ($request, $thumbnail_path) {
                //募集締切時刻設定
                $now = Carbon::now();
                $deadline = $now->addDay($request->application_period);

                $offers = CompanyOffer::create([
                    'company_id' => Auth::id(),
                    'headline' => $request->headline,
                    'job_title' => $request->job_title,
                    'introduce' => $request->introduce,
                    'thumbnail' => basename($thumbnail_path),
                    'deadline' => $deadline,
                ]);

                //言語のtrue or falseのための初期化
                $languages = [
                    "ruby" => 0,
                    "javascript" => 0,
                    "java" => 0,
                    "python" => 0,
                    "c" => 0,
                    "php" => 0,
                ];

                foreach ($request->languages as $language) {
                    $languages[$language] = 1;
                }

                $company_language = CompanyLanguage::create([
                    'company_offer_id' => $offers->id,
                    'ruby' => $languages['ruby'],
                    'javascript' => $languages['javascript'],
                    'java' => $languages['java'],
                    'python' => $languages['python'],
                    'c' => $languages['c'],
                    'php' => $languages['php'],
                ]);
            }, 2);
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }

        //フラッシュメッセージ
        Session::flash('message', '登録が完了しました。');
        return redirect()->route('company.registration.index')->with('message', '登録が完了しました。');
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
            //リレーション先のlanguageを含めて取得
            $offer = CompanyOffer::findOrFail($id);
            $language = $offer->language;
        } catch (Throwable $e) {
            $offer = null; //ここの見つからない場合の処理も考える必要がある？
        }
        return view('company.registration_job.edit', compact(['offer', 'language']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobOfferRequest $request, $id)
    {
        $offer = CompanyOffer::findOrFail($id);
        $offer_language = $offer->language;

        //thumbnailの保存
        $filename = $request->file('thumbnail')->store('');
        $thumbnail_path = $request->file('thumbnail')->storeAs('public/', $filename);
        try {
            DB::transaction(function () use ($request, $thumbnail_path, $offer, $offer_language) {
                //募集締切時刻設定
                $now = Carbon::now();
                $deadline = $now->addDay($request->application_period);

                $offer->headline = $request->headline;
                $offer->job_title = $request->job_title;
                $offer->introduce = $request->introduce;
                $offer->thumbnail = basename($thumbnail_path);
                $offer->deadline = $deadline;

                //言語のtrue or falseのための初期化
                $languages = [
                    "ruby" => 0,
                    "javascript" => 0,
                    "java" => 0,
                    "python" => 0,
                    "c" => 0,
                    "php" => 0,
                ];

                //複数checkboxの内容を保存するための処理
                foreach ($request->languages as $language) {
                    $languages[$language] = 1;
                }

                //開発言語情報の更新処理
                $offer_language->ruby = $languages['ruby'];
                $offer_language->javascript = $languages['javascript'];
                $offer_language->java = $languages['java'];
                $offer_language->python = $languages['python'];
                $offer_language->c = $languages['c'];
                $offer_language->php = $languages['php'];

                //変更保存
                $offer->save();
                $offer_language->save();
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        //フラッシュメッセージ
        Session::flash('message', '更新が完了しました。');

        return redirect()->route('company.registration.index')->with('message', '更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = CompanyOffer::findOrFail($id);
        $offer->delete();

        //フラッシュメッセージ
        Session::flash('message', '削除が完了しました。');
        return redirect()->route('company.registration.index')->with('message', '削除が完了しました。');
    }
}
