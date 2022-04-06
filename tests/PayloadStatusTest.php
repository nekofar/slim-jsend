<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use Nekofar\Slim\JSend\PayloadStatus;
use PHPUnit\Framework\TestCase;

/**
 *
 */
final class PayloadStatusTest extends TestCase
{
    /**
     *
     */
    public function testFromString(): void
    {
        $actual = PayloadStatus::fromString('success');
        $expected = new PayloadStatus('success');

        self::assertEquals($expected, $actual);
        self::assertSame((string) $expected, (string) $actual);
    }

    /**
     *
     */
    public function testWithInvalidString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid status name given');

        PayloadStatus::fromString('invalid');
    }
}
