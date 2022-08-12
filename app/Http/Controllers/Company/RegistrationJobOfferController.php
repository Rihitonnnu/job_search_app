<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyOffer;
use App\Models\CompanyLanguage;
use App\Http\Requests\JobOfferRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Throwable;

class RegistrationJobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $offers = CompanyOffer::with('company_language')->get();
        $languages = ['ruby', 'javascript', 'java', 'python', 'c', 'php'];
        return view('company.registration_job.index', compact(['offers', 'languages']));
    }
    // $messageKey,$flashMessage

    // ,'messageKey','flashMessage'

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.registration_job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobOfferRequest $request)
    {
        //thumbnailの保存
        $filename = $request->file('thumbnail')->store('');
        $thumbnail_path = $request->file('thumbnail')->storeAs('public/', $filename);

        //データ更新
        try {
            DB::transaction(function () use ($request, $thumbnail_path) {
                $offers = CompanyOffer::create([
                    'company_id' => Auth::id(),
                    'headline' => $request->headline,
                    'job_title' => $request->job_title,
                    'introduce' => $request->introduce,
                    'thumbnail' => basename($thumbnail_path),
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
        session()->flash('message', '登録が完了しました。');
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
            //リレーション先のcompany_languageを含めて取得
            $info = CompanyOffer::findOrFail($id)::with('company_language')->get();
        } catch (Throwable $e) {
            $info = null; //ここの見つからない場合の処理も考える必要がある？
        }
        $id--;
        // dd($info[0]->company_language->ruby);
        return view('company.registration_job.edit', compact(['info', 'id']));
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
        $id -= 1;
        $offers = CompanyOffer::findOrFail(Auth::id())->with('company_language')->get();
        $offer = $offers[$id];
        $offer->headline = $request->headline;
        $offer->job_title = $request->job_title;
        $offer->introduce = $request->introduce;
        $offer->thumbnail = $request->thumbnail;
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
        $offer->company_language->ruby = $languages['ruby'];
        $offer->company_language->javascript = $languages['javascript'];
        $offer->company_language->java = $languages['java'];
        $offer->company_language->python = $languages['python'];
        $offer->company_language->c = $languages['c'];
        $offer->company_language->php = $languages['php'];

        //変更保存
        $offer->save();
        $offer->company_language->save();

        //フラッシュメッセージ
        session()->flash('message', '更新が完了しました。');
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
        $id-=1;
        $offers = CompanyOffer::findOrFail(Auth::id())->with('company_language')->get();
        $offer=$offers[$id];
        $offer->delete();
        //フラッシュメッセージ
        session()->flash('message', '削除が完了しました。');
        Session::flash('message', '削除が完了しました。');
        return redirect()->route('company.registration.index')->with('message','削除が完了しました。');
    }
}
