<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * DBConstant enum.
 */
class DBConstant
{
    // user role
    const CLIENT = 1;
    const MOD = 2;
    const ADMIN = 3;

    // user male
    const MALE = 1;
    const FEMALE = 2;
    
    // image
    const SYSTEM = [
        '1' => 'slider',
        '2' => 'banner-top',
        '3' => 'banner-bot'
    ];

    // image
    const SLIDER_TYPE = 1;
    const BANNER_TOP_TYPE = 2;
    const BANNER_BOT_TYPE = 3;

    // contact status
    const NEW_STATUS = 0;
    const PROCESS_STATUS = 1;
    const COMPLETE_STATUS = 2;
}