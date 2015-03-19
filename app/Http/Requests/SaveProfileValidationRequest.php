<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Auth\Guard;

class SaveProfileValidationRequest extends SaveUserValidationRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @param Illuminate\Auth\Guard $auth
	 * @param App\Models\User $user
	 * @return bool
	 */
	public function authorize(Guard $auth)
	{
		return ($auth->user()->id);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users,email,'.$this->get('id'),
			'birthdate' => 'date',
		];
	}

}
