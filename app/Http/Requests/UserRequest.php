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
        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                return [
                'name' => 'required|min:4|max:100',
                'birthday' => 'required|date_format:d/m/Y',
                'gender' => 'required|boolean',
                'address' => 'required|max:255',
                'role_id' => 'required|integer|between:2,3',
                ];
            case 'POST':
                return [
                  'name' => 'required|max:100',
                  'username' => 'required|max:255|unique:users',
                  'password' => 'required|max:32|min:6|confirmed',
                  'password_confirmation' => 'required|max:32|min:6',
                  'birthday' => 'required|date_format:d/m/Y',
                  'role_id' => 'required|integer|between:1,2,3',
                ];
            default:
                return [];
        }
    }
}
