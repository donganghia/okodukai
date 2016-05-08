<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|max:25',
            'code' => 'required|min:1|unique:employee',  
            'email' => 'required|email|unique:employee', 
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool |
	 */
	public function authorize()
	{
		return true;
	}

}
