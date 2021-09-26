<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests;

use JsonException;
use Nekofar\Slim\JSend\Payload;
use Nekofar\Slim\JSend\PayloadStatus;
use Nekofar\Slim\JSend\Response as JSendResponse;
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Response;

/**
 *
 */
class ResponseTest extends TestCase
{
    /**
     * @throws JsonException
     */
    public function testWithPayload(): void
    {
        $payload = new Payload(PayloadStatus::fromString(
            PayloadStatus::STATUS_SUCCESS,
        ));
        $response = JSendResponse::fromResponse(new Response());
        $response = $response->withPayload($payload);

        self::assertTrue($response->hasHeader('Content-Type'));
        self::assertSame('application/json', $response->getHeaderLine('Content-Type'));

        self::assertEquals($payload, $response->getPayload());
        self::assertSame(json_encode($payload), (string) $response->getBody());
        self::assertSame(json_encode($payload), json_encode($response->getPayload()));
    }
}
