<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestRequest extends Request
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
     * @return array
     */
    public function rules()
    {
                return [
                  'name' => 'required',
                  'group_id' => 'required|exists:groups,id',
                  'number_questions'=>'required|max:100',
                ];
    }
}
