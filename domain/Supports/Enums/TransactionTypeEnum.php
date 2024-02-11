<?php

namespace Domain\Supports\Enums;

use BenSampo\Enum\Enum;

class TransactionTypeEnum extends Enum
{
    const DEPOSIT = 'deposit';
    const WITHDRAWAL = 'withdrawal';
}
