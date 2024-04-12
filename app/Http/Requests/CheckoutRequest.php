<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => ['required', 'regex:/^(0|\+84)?(3[2-9]\d{7}|5[6-9]\d{7}|7[0-9]\d{7}|8\d{8}|9\d{8})$/']
            // 'phone' => 'required|regex:/^((\+84)|0)?(3[0-9]\d{8}|9[0-8]\d{8}|81\d{8}|82\d{8}|83\d{8}|84\d{8}|85\d{8}|86\d{8}|87\d{8}|88\d{8}|89\d{8}|70\d{8}|76\d{8}|77\d{8}|78\d{8}|79\d{8}|99\d{8}|96\d{8}|97\d{8}|98\d{8})$/'

        ];
    }
    public function messages()
{
    return [
        'phone.regex' => 'Số điện thoại không hợp lệ.',
    ];
}
}
