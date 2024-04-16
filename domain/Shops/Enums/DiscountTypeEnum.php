<?php

namespace Domain\Shops\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class DiscountTypeEnum extends Enum implements LocalizedEnum
{
    const PRICE = 'price';
    const PERCENTAGE = 'percentage';
    const NONE = 'none';
}
