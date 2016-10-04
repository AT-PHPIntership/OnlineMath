<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class LessonRequest extends Request
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
        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                return [
                  'name'   => 'required',
                  'group_id' => 'required',
                  'description'=>'required|max:200|min:40',
                  'category_id'=>'required',
                  'page'=>'required|min:2',
                ];
            case 'POST':
                return [
                  'name'   => 'required|unique:lessons',
                  'group_id' => 'required',
                  'description'=>'required|max:200|min:40',
                  'page'=>'required|min:2',
                ];
            default:
                return [];
        }
    }
}
