<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use InvalidArgumentException;

/**
 *
 */
final class PayloadStatus
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAIL = 'fail';
    public const STATUS_ERROR = 'error';

    /**
     * @var array<string>
     */
    private static array $validStates = [
        self::STATUS_SUCCESS,
        self::STATUS_FAIL,
        self::STATUS_ERROR,
    ];

    /**
     *
     */
    public function __construct(private string $name)
    {
    }

    /**
     *
     */
    public static function fromString(string $status): self
    {
        self::ensureIsValidName($status);

        return new self($status);
    }

    /**
     * @throws InvalidArgumentException
     */
    private static function ensureIsValidName(string $status): void
    {
        if (!in_array($status, self::$validStates, true)) {
            throw new InvalidArgumentException('Invalid status name given');
        }
    }

    /**
     *
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
