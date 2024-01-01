<?php

namespace Domain\Shops\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class CoboneTypeEnum extends Enum implements LocalizedEnum
{
    const TOTAL_ORDER = 1;
    const SPECIFIC_PRODUCT = 2;
}
