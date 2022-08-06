<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'university'=>'required|max:50',
            'department'=>'required',
            'course'=>'required',
            'interest_area'=>'required|max:50',
            'strong_area'=>'max:500',
        ];
    }

    public function messages()
    {
        return[
            'course.required'=>'学科を入力してください',
            'strong_area.required'=>'自分の強みは必ず記入してください',
        ];
    }

    public function attributes()
    {
        return[
            'university'=>'大学名',
            'department'=>'学部名',
            'course'=>'学科名',
            'interest_area'=>'興味のある分野',
            'strong_area'=>'自分の強み',
        ];
    }
}
