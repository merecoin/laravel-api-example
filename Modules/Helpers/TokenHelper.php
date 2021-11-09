<?php

namespace Modules\Helpers;

use Illuminate\Support\Str;

class TokenHelper
{

    /**
     * Generate Token
     */

    public static function generatePlainToken(): string
    {
        return Str::random(40);
    }
}
