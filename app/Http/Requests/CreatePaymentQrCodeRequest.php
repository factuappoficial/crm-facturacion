<?php

namespace App\Http\Requests;

use App\Models\PaymentQrCode;
use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentQrCodeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return PaymentQrCode::$rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The Title field is required',
            'qr_image.required' => 'The QR image field is required',
        ];
    }
}
