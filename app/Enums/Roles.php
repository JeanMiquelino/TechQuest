<?php


namespace Gamify\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static Player()
 */
final class Roles extends Enum implements LocalizedEnum
{
    const Admin = 'administrator';

    const Player = 'user';
}
