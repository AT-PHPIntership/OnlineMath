<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'username'   => 'required|regex:/^[A-Za-z \t]*\p{L}+/i|max:50|min:3',
            'address'    => 'regex:/^[.,\-\/A-Za-z0-9 \t]*\p{L}+/i|max: 100|min:6',
            'birthday' => 'required|date_format:d/m/Y',
            'name' => 'required|min:4|max:100',
            'birthday' => 'required',
            'gender' => 'required|boolean',
            'address' => 'required|max:255',
            'role_id' => 'required|integer|between:2,3',
        ];
    }
}
