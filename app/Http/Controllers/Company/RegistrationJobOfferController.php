<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyOffer;
use App\Models\CompanyLanguage;
use App\Http\Requests\JobOfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $filename=$request->file('thumbnail')->store('');
        $thumbnail_path=$request->file('thumbnail')->storeAs('public/img/',$filename);

        //データ更新
        try {
            DB::transaction(function () use ($request,$thumbnail_path) {
                $offers = CompanyOffer::create([
                    'company_id' => Auth::id(),
                    'headline' => $request->headline,
                    'job_title' => $request->job_title,
                    'introduce' => $request->introduce,
                    'thumbnail'=>basename($thumbnail_path),
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
        session()->flash('message','登録が完了しました。');
        Session::flash('message','登録が完了しました。');

        return redirect()->route('company.registration.index')->with('message','登録が完了しました。');
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

    // public function storeToIndex($messageKey, $flashMessage, $foo)
    // {
    //     dd('a');
    //     if ($foo) {
    //         $offers = CompanyOffer::with('company_language')->get();
    //         $languages = ['ruby', 'javascript', 'java', 'python', 'c', 'php'];
    //         return view('company.registration.index',compact(['offers','languages','messageKey','flashMessage']));
    //     }
    // }
}