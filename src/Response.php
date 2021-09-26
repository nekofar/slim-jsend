<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use Slim\Psr7\Response as BaseResponse;

/**
 * @mixin BaseResponse
 */
final class Response implements ResponseInterface
{
    /**
     * The response to delegate to.
     *
     * @var BaseResponse
     */
    private $response;

    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * Create a new response instance.
     */
    public function __construct()
    {
        $response = new BaseResponse();

        $this->response = $response->withHeader(
            'Content-Type',
            'application/json',
        );
    }

    /**
     * Gets the payload of the response.
     */
    public function getPayload(): ?PayloadInterface
    {
        return $this->payload;
    }

    /**
     * Return an instance with the specified response payload.
     */
    public function withPayload(PayloadInterface $payload): ResponseInterface
    {
        $this->payload = $payload;

        $this->response->getBody()->write(
            json_encode($this->payload, JSON_THROW_ON_ERROR),
        );

        return $this;
    }

    /**
     * Proxies calls to the original response object.
     *
     * @param array<int, object|callable|null> $arguments
     *
     * @return void|object|boolean
     */
    public function __call(string $method, array $arguments)
    {
        /* @phpstan-ignore-next-line */
        return $this->response->{$method}(...$arguments);
    }
}
