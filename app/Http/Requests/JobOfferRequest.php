<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_id',
            'headline',
            'job_title',
            'introduce',
            'languages'=>'required',
            'thumbnail'=>'required',
            'application_period'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'course.required' => '学科を入力してください',
            'strong_area.required' => '自分の強みは必ず記入してください',
            'languages.required'=>'開発環境を1つ以上選択してください。',
            'thumbnail.required'=>'サムネイル画像をアップロードしてください。',
            'application_period.required'=>'募集期間を選択してください',
        ];
    }

    public function attributes()
    {
        return [
            'headline'=>"求人の見出し",
            'job_title'=>"職種名",
            'introduce'=>"紹介文",
            'languages'=>'開発環境',
            'application_period'=>'募集期間',
        ];
    }
}
