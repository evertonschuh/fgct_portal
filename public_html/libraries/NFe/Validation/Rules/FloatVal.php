<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

//namespace Respect\Validation\Rules;
require_once(JPATH_LIBRARIES . DS . 'NFe'. DS . 'Validation' . DS . 'Rules' . DS . 'AbstractRule.php');

class FloatVal extends AbstractRule
{
    public function validate($input)
    {
        return is_float(filter_var($input, FILTER_VALIDATE_FLOAT));
    }
}
