<?php

declare(strict_types=1);

namespace Piersante\Lexorank;

use Exception;

class RankOverflow extends Exception
{
    public function __construct(string $prev, string $next, int $maxLength)
    {
        $this->message = sprintf(
            'impossible to find a rank between %s and %s with less then %s characters',
            $prev,
            $next,
            $maxLength
        );

        parent::__construct();
    }
}
