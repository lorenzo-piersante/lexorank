<?php

declare(strict_types=1);

namespace Piersante\Lexorank;

class RankGenerator
{
    public const MIN_CHAR = '0';
    public const MAX_CHAR = 'z';

    /**
     * @throws RankOverflow
     */
    public function getRankBetween(?string $prev, ?string $next, int $maxLength = 255) : string
    {
        if ($prev === null) $prev = str_repeat(self::MIN_CHAR,  $maxLength);
        if ($next === null) $next = str_repeat(self::MAX_CHAR,  $maxLength);

        $rank = '';
        $i = 0;

        while (true) {
            $prevChar = $prev[$i] ?? self::MIN_CHAR;
            $nextChar = $next[$i] ?? self::MAX_CHAR;

            if ($prevChar === $nextChar) {
                $rank .= $prevChar;
                $i++;
                continue;
            }

            $midChar = ord($prevChar) > ord($nextChar) ? $prevChar : chr((int) round((ord($prevChar) + ord($nextChar)) / 2));

            if (in_array($midChar, [$prevChar, $nextChar])) {
                $rank .= $prevChar;
                $i++;
                continue;
            }

            $rank .= $midChar;
            break;
        }

        if (strlen($rank) > $maxLength) throw new RankOverflow($prev, $next, $maxLength);

        return $rank;
    }
}
