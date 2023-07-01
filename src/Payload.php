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
 * Class Payload
 *
 * Represents the payload of a JSend response.
 */
final class Payload implements PayloadInterface
{
    /**
     * Payload constructor.
     *
     * @param PayloadStatus $status The status of the payload.
     * @param mixed|null $data The data of the payload.
     * @param string|null $message The message of the payload.
     * @param int|null $code The code of the payload.
     */
    public function __construct(
        private readonly PayloadStatus $status,
        private readonly mixed $data = null,
        private readonly ?string $message = null,
        private readonly ?int $code = null,
    ) {
    }

    /**
     * Create a success payload.
     *
     * @param mixed|null $data The data of the payload.
     *
     * @return self The created success payload.
     */
    public static function success(mixed $data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_SUCCESS), $data);
    }

    /**
     * Create a fail payload.
     *
     * @param mixed|null $data The data of the payload.
     *
     * @return self The created fail payload.
     */
    public static function fail(mixed $data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_FAIL), $data);
    }

    /**
     * Create an error payload.
     *
     * @param string $message The message of the payload.
     * @param int|null $code The code of the payload.
     * @param mixed|null $data The data of the payload.
     *
     * @return self The created error payload.
     */
    public static function error(string $message, ?int $code = null, mixed $data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_ERROR), $data, $message, $code);
    }

    /**
     * Convert the payload to its array representation for JSON serialization.
     *
     * @return array<string, mixed> The array representation of the payload.
     */
    public function jsonSerialize(): array
    {
        $payload = [
            'status' => $this->status,
        ];

        if (null !== $this->data) {
            $payload['data'] = $this->data;
        }

        if (null !== $this->message) {
            $payload['message'] = $this->message;
        }

        if (null !== $this->code) {
            $payload['code'] = $this->code;
        }

        return $payload;
    }
}
