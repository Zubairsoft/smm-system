<?php

namespace Domain\Dashboard\DataTransferToObject\Shops;

use Domain\Dashboard\DataTransferToObject\BankAccounts\StoreBankAccountData;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreShopData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        #[DataCollectionOf(StoreBankAccountData::class)]
        public DataCollection $bank_accounts,//TODO update validation
        public string $name,
        public string $owner_name,
        public string $address, //TODO make foreign key
        public string $email,
        public string $description,
        public UploadedFile $avatar,
        public string $phone,
        public string $password = "0000",
        public bool $is_active = true,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:100',
            ],
            'owner_name' => [
                'required',
                'max:255',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('shops', 'email'),
                'max:255',
            ],
            'avatar' => [
                'required',
                File::types(['png', 'jpeg', 'jpg', 'png'])->max(2 * 1024),
            ],
            'phone' => [
                'required',
                'max:100',
                Rule::unique('shops', 'phone'),
            ],
            'description' => [
                'required',
                'min:8',
            ],
            'password' => [
                'min:8',
            ],
            'is_active' => [
                'boolean',
            ],
        ];
    }
}
