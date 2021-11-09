<?php

namespace Modules\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class QueryStringHelper
{
    /**
     * Extract from string to Collection
     */
    public static function fromCommaSeparatedToCollection(string $commaSeparated): Collection
    {
        return Str::of($commaSeparated)
            ->explode(',')
            ->filter(function ($item) {
                return is_numeric($item);
            })
            ->map(function ($item) {
                return (int)$item;
            });
    }
}
