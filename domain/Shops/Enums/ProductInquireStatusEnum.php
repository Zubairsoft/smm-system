<?php

namespace Domain\Shops\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class ProductInquireStatusEnum extends Enum implements LocalizedEnum
{
    const PENDING = 1;
    const REPLIED = 2;
}
