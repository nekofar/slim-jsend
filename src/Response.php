<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use Psr\Http\Message\ResponseInterface;

/**
 * @mixin \Slim\Psr7\Response
 */
final class Response
{
    /**
     * The response to delegate to.
     *
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * Create a new response instance.
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response->withHeader(
            'Content-Type',
            'application/json',
        );
    }

    /**
     * Create a new Response from another response.
     *
     * @return static
     */
    public static function fromResponse(ResponseInterface $response)
    {
        return new self($response);
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
     *
     * @return static
     *
     * @throws \JsonException
     */
    public function withPayload(PayloadInterface $payload)
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
