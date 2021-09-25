<?php

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

/**
 *
 */
class PayloadStatus
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAIL = 'fail';
    public const STATUS_ERROR = 'error';

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public static function fromString(string $status): self
    {
        return new self($status);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
