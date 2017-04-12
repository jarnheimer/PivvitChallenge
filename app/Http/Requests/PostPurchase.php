<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class PostPurchase extends FormRequest
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
     * Custom response in case of error
     *
     * @param array $errors
     *
     * @return Response
     */
    public function response(array $errors)
    {
        return Response::api([], $errors);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|string|exists:users,name',
            'offering_id'   => 'required|integer|exists:offerings,id',
            'quantity'      => 'required|integer|min:1',
        ];
    }
}
