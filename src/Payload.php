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
    /**
     * @var PayloadStatus
     */
    private $status;

    /**
     * @var mixed|null
     */
    private $data;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @var integer|null
     */
    private $code;

    /**
     * @param mixed|null $data
     */
    public function __construct(PayloadStatus $status, $data = null, ?string $message = null, ?int $code = null)
    {
        $this->status = $status;
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
    }

    /**
     * @param mixed|null $data
     */
    public static function success($data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_SUCCESS), $data);
    }

    /**
     * @param mixed|null $data
     */
    public static function fail($data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_FAIL), $data);
    }

    /**
     * @param mixed|null $data
     */
    public static function error(string $message, ?int $code = null, $data = null): self
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
