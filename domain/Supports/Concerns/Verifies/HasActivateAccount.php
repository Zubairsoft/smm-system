<?php

namespace Domain\Supports\Concerns\Verifies;


trait HasActivateAccount
{
    public function sendEmailVerification()
    {
        $this->verifyEmail()->delete();

        return $this->verifyEmail()->create([
            'email' => $this->email,
            'otp' => generateOtp(),
        ]);
    }

    public function setEmailAsVerified()
    {
        return $this->forceFill(['email_verified_at' => now()])->save();
    }

    public function setPhoneAsVerified()
    {
        return $this->forceFill(['phone_verified_at' => now()])->save();
    }
}
