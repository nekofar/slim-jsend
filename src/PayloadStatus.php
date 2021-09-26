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
final class PayloadStatus
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAIL = 'fail';
    public const STATUS_ERROR = 'error';

    /**
     * @var string
     */
    private $name;

    /**
     *
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     *
     */
    public static function fromString(string $status): self
    {
        return new self($status);
    }

    /**
     *
     */
    public function __toString(): string
    {
        return $this->name;
    }
}