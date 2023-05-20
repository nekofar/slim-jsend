<?php

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class ResponseFactoryDecorator implements ResponseFactoryInterface
{
    public function __construct(
        private readonly ResponseFactoryInterface $responseFactory,
        private readonly StreamFactoryInterface $streamFactory,
    ) {
    }

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $response = $this->responseFactory->createResponse($code, $reasonPhrase);

        return new Response($response, $this->streamFactory);
    }
}
