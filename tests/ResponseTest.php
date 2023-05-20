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
use Nekofar\Slim\JSend\Response;
use Nekofar\Slim\JSend\ResponseFactoryDecorator;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Psr7\Factory\StreamFactory;

/**
 *
 */
final class ResponseTest extends TestCase
{
    private ResponseFactoryInterface $responseFactory;

    public function testWithPayload(): void
    {
        $data = ['foo' => 'bar'];
        $payload = Payload::success($data);

        /** @var Response $originalResponse */
        $originalResponse = $this->responseFactory->createResponse();
        $response = $originalResponse->withPayload($payload);

        self::assertEquals($originalResponse->getStatusCode(), $response->getStatusCode());
        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));

        $body = $response->getBody();
        $body->rewind();
        $dataJson = $body->getContents();

        $originalBody = $originalResponse->getBody();
        $originalBody->rewind();
        $originalContents = $originalBody->getContents();

        // Test that the original body hasn't been replaced
        self::assertNotEquals($dataJson, $originalContents);
        self::assertEquals('{"status":"success","data":{"foo":"bar"}}', $dataJson);

        $response = $response->withStatus(201)->withJson([]);
        self::assertEquals(201, $response->getStatusCode());
    }

    public function testWithSuccessPayload(): void
    {
        /** @var Response $originalResponse */
        $originalResponse = $this->responseFactory->createResponse();
        $response = $originalResponse->withSuccessPayload(['foo' => 'bar']);

        self::assertEquals($originalResponse->getStatusCode(), $response->getStatusCode());
        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));

        $body = $response->getBody();
        $body->rewind();
        $dataJson = $body->getContents();

        $originalBody = $originalResponse->getBody();
        $originalBody->rewind();
        $originalContents = $originalBody->getContents();

        // Test that the original body hasn't been replaced
        self::assertNotEquals($dataJson, $originalContents);
        self::assertEquals('{"status":"success","data":{"foo":"bar"}}', $dataJson);
    }

    public function testWithFailPayload(): void
    {
        /** @var Response $originalResponse */
        $originalResponse = $this->responseFactory->createResponse();
        $response = $originalResponse->withFailPayload(['foo' => 'bar']);

        self::assertEquals($originalResponse->getStatusCode(), $response->getStatusCode());
        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));

        $body = $response->getBody();
        $body->rewind();
        $dataJson = $body->getContents();

        $originalBody = $originalResponse->getBody();
        $originalBody->rewind();
        $originalContents = $originalBody->getContents();

        // Test that the original body hasn't been replaced
        self::assertNotEquals($dataJson, $originalContents);
        self::assertEquals('{"status":"fail","data":{"foo":"bar"}}', $dataJson);
    }

    public function testWithErrorPayload(): void
    {
        /** @var Response $originalResponse */
        $originalResponse = $this->responseFactory->createResponse();
        $response = $originalResponse->withErrorPayload('An error occurred', 5, ['foo' => 'bar']);

        self::assertEquals($originalResponse->getStatusCode(), $response->getStatusCode());
        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));

        $body = $response->getBody();
        $body->rewind();
        $dataJson = $body->getContents();

        $originalBody = $originalResponse->getBody();
        $originalBody->rewind();
        $originalContents = $originalBody->getContents();

        // Test that the original body hasn't been replaced
        self::assertNotEquals($dataJson, $originalContents);
        self::assertEquals('{"status":"error","data":{"foo":"bar"},"message":"An error occurred","code":5}', $dataJson);
    }

    protected function setUp(): void
    {
        $this->responseFactory = new ResponseFactoryDecorator(
            new ResponseFactory(),
            new StreamFactory(),
        );
    }
}
