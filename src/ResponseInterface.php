<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

/**
 * @method getBody()
 * @method hasHeader(string $string)
 * @method getHeaderLine(string $string)
 */
interface ResponseInterface
{
    /**
     */
    public function getPayload(): ?PayloadInterface;

    /**
     */
    public function withPayload(PayloadInterface $payload): ResponseInterface;
}
