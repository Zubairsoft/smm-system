<?php

namespace Domain\Dashboard\Enums;

use BenSampo\Enum\Enum;

class NotificationTemplateTypeEnum extends Enum
{
    const SPECIFIC_SHOP = 'specific_shop';
    const SPECIFIC_DELIVERY_WORKER = 'specific_delivery_worker';
    const SPECIFIC_USER = 'specific_user';
    const ALl_SHOP = 'all_shop';
    const All_DELIVERY_WORKER = 'all_delivery_worker';
    const All_USER = 'all_user';
}
