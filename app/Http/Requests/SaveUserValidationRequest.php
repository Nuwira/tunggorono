<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Auth\Guard;

class SaveUserValidationRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @param Illuminate\Auth\Guard $auth
	 * @param App\Models\User $user
	 * @return bool
	 */
	public function authorize(Guard $auth)
	{
		//dd($auth->user()->roles[0]->id);

		return ((
		    $auth
		    &&
		    (int) $auth->user()->roles[0]->id < (int) $this->get('role')
        ) || (
            $auth->user()->id && $this->get('id')
        ));
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'required|min:3|max:20|unique:users,username,'.$this->get('id'),
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users,email,'.$this->get('id'),
			'birthdate' => 'date',
			'password' => 'confirmed|min:6',
		];
	}

}