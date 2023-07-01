<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use Slim\Http\Response as DecoratedResponse;

final class Response extends DecoratedResponse
{
    /**
     * Return an instance with the specified response payload.
     *
     * @param PayloadInterface $payload The response payload.
     */
    public function withPayload(PayloadInterface $payload): self
    {
        return $this->withJson($payload);
    }

    /**
     * Set the response payload as a success.
     *
     * @param mixed|null $data The success data.
     */
    public function withSuccessPayload(mixed $data = null): self
    {
        $payload = Payload::success($data);

        return $this->withPayload($payload);
    }

    /**
     * Set the response payload as a failure.
     *
     * @param mixed|null $data The failure data.
     */
    public function withFailPayload(mixed $data = null): self
    {
        $payload = Payload::fail($data);

        return $this->withPayload($payload);
    }

    /**
     * Set the response payload as an error.
     *
     * @param string $message The error message.
     * @param int|null $code The error code.
     * @param mixed|null $data The error data.
     */
    public function withErrorPayload(string $message, ?int $code = null, mixed $data = null): self
    {
        $payload = Payload::error($message, $code, $data);

        return $this->withPayload($payload);
    }
}
