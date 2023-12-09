<?php

namespace Domain\Supports\Concerns\Verifies;

use App\Models\VerifyEmail;
use App\Models\VerifyPhone;
use Illuminate\Support\Carbon;

trait HasActivateAccount
{
    public function sendEmailVerificationCode($email): VerifyEmail
    {
        $this->verifyEmail()->delete();

        return $this->verifyEmail()->create([
            'email' => $email,
            'otp' => generateOtp(),
        ]);
    }

    public function sendPhoneVerificationCode($phone): VerifyPhone
    {
        $this->verifyPhone()->delete();

        return $this->verifyPhone()->create([
            'phone' => $phone,
            'otp' => generateOtp(),
        ]);
    }


    public function setEmailAsVerified(): void
    {
        $this->forceFill(['email_verified_at' => now()])->save();
    }

    public function setPhoneAsVerified($phone): void
    {
        $this->forceFill(['phone_verified_at' => now(), 'phone' => $phone])->save();
    }

    public function IsEmailVerificationCodeIsExpire(): bool
    {
        return Carbon::parse($this->verifyEmail->created_ar)->addHours(24)->isPast();
    }

    public function IsPhoneVerificationCodeIsExpire(): bool
    {
        return Carbon::parse($this->verifyPhone->created_ar)->addHours(24)->isPast();
    }
}
