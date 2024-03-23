<?php

namespace Domain\Dashboard\Requests\ProductInquires;

use Domain\Shops\Enums\ProductInquireStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductInquireRequest extends FormRequest
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
            'reply' => [
                'string',
                'max:255'
            ],
            'status' => [
                'required',
                Rule::in(ProductInquireStatusEnum::getKeys())
            ]
        ];
    }

    protected function passedValidation(): void
    {
        $this->replace([
            'reply' => $this->reply,
            'status' => ProductInquireStatusEnum::getValue($this->status),
        ]);
    }
}
