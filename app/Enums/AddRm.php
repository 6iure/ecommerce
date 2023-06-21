<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AddRm extends Enum
{
    const ADICIONAR =   1;
    const REMOVER =   2;
}
