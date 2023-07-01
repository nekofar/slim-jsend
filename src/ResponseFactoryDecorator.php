<?php

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class ResponseFactoryDecorator implements ResponseFactoryInterface
{
    /**
     * ResponseFactoryDecorator constructor.
     *
     * @param ResponseFactoryInterface $responseFactory The original response factory.
     * @param StreamFactoryInterface $streamFactory The stream factory for creating response streams.
     */
    public function __construct(
        private readonly ResponseFactoryInterface $responseFactory,
        private readonly StreamFactoryInterface $streamFactory,
    ) {
    }

    /**
     * Create a new response instance with the specified status code and reason phrase.
     *
     * @param int $code The status code for the response.
     * @param string $reasonPhrase The reason phrase associated with the status code.
     *
     * @return ResponseInterface The newly created response instance.
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $response = $this->responseFactory->createResponse($code, $reasonPhrase);

        return new Response($response, $this->streamFactory);
    }
}
