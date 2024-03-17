<?php

namespace Domain\Dashboard\Requests\SupportTickets;

use Domain\Shops\Enums\SupportTicketEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateSupportTicketRequest extends FormRequest
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
                Rule::in(SupportTicketEnum::getKeys())
            ]
        ];
    }

    protected function passedValidation(): void
    {
        $this->replace([
            'reply' => $this->reply,
            'status' => SupportTicketEnum::getValue($this->status),
        ]);
    }

    protected function failedValidation(Validator $validator): void
    {
        if ($validator->fails()) {
            throw new HttpResponseException(
                sendFailedResponse(
                    __('messages.validation_error'),
                    $validator->errors()->first(),
                    422
                )
            );
        }
    }
}
