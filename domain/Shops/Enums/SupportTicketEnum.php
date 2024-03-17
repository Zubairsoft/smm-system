<?php

namespace Domain\Shops\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class SupportTicketEnum extends Enum implements LocalizedEnum
{
    const UNDER_REVIEW = 1;
    const SOLVED = 2;
}
