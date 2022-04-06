<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests;

use Nekofar\Slim\JSend\Payload;
use Nekofar\Slim\JSend\PayloadStatus;
use PHPUnit\Framework\TestCase;

/**
 *
 */
final class PayloadTest extends TestCase
{
    /**
     *
     */
    public function testSuccessWithData(): void
    {
        $actual = Payload::success([
            'post' => [ 'id' => 1, 'title' => 'A blog post', 'body' => 'Some useful content' ],
        ]);

        $expected = new Payload(
            PayloadStatus::fromString('success'),
            [
                'post' => [ 'id' => 1, 'title' => 'A blog post', 'body' => 'Some useful content' ],
            ],
        );

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }

    /**
     *
     */
    public function testSuccessWithoutData(): void
    {
        $actual = Payload::success();

        $expected = new Payload(PayloadStatus::fromString('success'));

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }

    /**
     *
     */
    public function testFailWithData(): void
    {
        $actual = Payload::fail(['title' => 'A title is required']);

        $expected = new Payload(
            PayloadStatus::fromString('fail'),
            ['title' => 'A title is required'],
        );

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }

    /**
     *
     */
    public function testFailWithoutData(): void
    {
        $actual = Payload::fail();

        $expected = new Payload(PayloadStatus::fromString('fail'));

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }

    /**
     *
     */
    public function testErrorWithMessage(): void
    {
        $actual = Payload::error('Unable to communicate with database');

        $expected = new Payload(
            PayloadStatus::fromString('error'),
            null,
            'Unable to communicate with database',
        );

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }

    /**
     *
     */
    public function testErrorWithMessageAndCode(): void
    {
        $actual = Payload::error('Unable to communicate with database', 100);

        $expected = new Payload(
            PayloadStatus::fromString('error'),
            null,
            'Unable to communicate with database',
            100,
        );

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }

    /**
     *
     */
    public function testErrorWithMessageAndCodeAndData(): void
    {
        $actual = Payload::error(
            'Unable to communicate with database',
            100,
            [
                "some_extra_info" => "Extra info goes here",
            ],
        );

        $expected = new Payload(
            PayloadStatus::fromString('error'),
            [
                "some_extra_info" => "Extra info goes here",
            ],
            'Unable to communicate with database',
            100,
        );

        self::assertEquals($expected, $actual);
        self::assertSame(json_encode($expected), json_encode($actual));
    }
}
