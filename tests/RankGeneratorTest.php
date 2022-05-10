<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Piersante\Lexorank\RankGenerator;
use Piersante\Lexorank\RankOverflow;

class RankGeneratorTest extends TestCase
{
    public function dataProvider(): array {
        return [
            [null, null, 255, 'U'],
            [null, '2', 255, '1'],
            ['x', null, 255, 'y'],
            ['aaaa', 'aaab', 255, 'aaaaU'],
            ['az', 'b', 255, 'azU'],
            ['az', 'b', 255, 'azU'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider dataProvider
     */
    public function it_does_generate_a_new_rank($prev, $next, $maxLength, $expected) : void
    {
        $rankGenerator = new RankGenerator();
        $newRank = $rankGenerator->getRankBetween($prev, $next, $maxLength);
        $this->assertEquals($expected, $newRank);
    }

    /** @test */
    public function it_does_throw_exception_on_rank_length_overflow() : void
    {
        $rankGenerator = new RankGenerator();
        $this->expectException(RankOverflow::class);
        $rankGenerator->getRankBetween('aa', 'aab', 2);
    }
}
