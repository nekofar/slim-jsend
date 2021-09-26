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
     * @param PayloadStatus $status
     * @param mixed|null    $data
     * @param string|null   $message
     * @param integer|null  $code
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
     *
     * @return self
     */
    public static function success($data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_SUCCESS), $data);
    }

    /**
     * @param mixed|null $data
     *
     * @return self
     */
    public static function fail($data = null): self
    {
        return new self(PayloadStatus::fromString(PayloadStatus::STATUS_FAIL), $data);
    }

    /**
     * @param string       $message
     * @param integer|null $code
     * @param mixed|null   $data
     *
     * @return self
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

        if ($this->data !== null) {
            $payload['data'] = $this->data;
        }

        if ($this->message !== null) {
            $payload['message'] = $this->code;
        }

        if ($this->code !== null) {
            $payload['code'] = $this->code;
        }

        return $payload;
    }
}
