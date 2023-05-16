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
 *
 */
final class Payload implements PayloadInterface
{
    public function __construct(
        private readonly PayloadStatus $status,
        private readonly mixed $data = null,
        private readonly ?string $message = null,
        private readonly ?int $code = null,
    ) {
    }

    /**
     */
    public static function success(mixed $data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_SUCCESS), $data);
    }

    /**
     */
    public static function fail(mixed $data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_FAIL), $data);
    }

    /**
     */
    public static function error(string $message, ?int $code = null, mixed $data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_ERROR), $data, $message, $code);
    }

    /**
     * @return array<string, mixed>
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
            $payload['message'] = $this->code;
        }

        if (null !== $this->code) {
            $payload['code'] = $this->code;
        }

        return $payload;
    }
}
