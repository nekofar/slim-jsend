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
use JsonSerializable;

/**
 * Represents the status of a JSend payload.
 */
final class PayloadStatus implements JsonSerializable
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAIL = 'fail';
    public const STATUS_ERROR = 'error';

    /**
     * @var array<string> Valid payload status names.
     */
    private static array $validStates = [
        self::STATUS_SUCCESS,
        self::STATUS_FAIL,
        self::STATUS_ERROR,
    ];

    /**
     * Creates a new PayloadStatus instance from a string.
     */
    public function __construct(private readonly string $name)
    {
    }

    /**
     * Creates a new PayloadStatus instance from a string.
     *
     * @param string $status The payload status.
     *
     * @return self The created PayloadStatus instance.
     *
     * @throws InvalidArgumentException If an invalid status name is provided.
     */
    public static function fromString(string $status): self
    {
        self::ensureIsValidName($status);

        return new self($status);
    }

    /**
     * Serializes the payload status to a JSON-compatible string.
     *
     * @return string The payload status as a JSON-compatible string.
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }

    /**
     * Ensures that the provided status name is valid.
     *
     * @param string $status The payload status.
     *
     * @throws InvalidArgumentException If an invalid status name is provided.
     */
    private static function ensureIsValidName(string $status): void
    {
        if (!in_array($status, self::$validStates, true)) {
            throw new InvalidArgumentException('Invalid status name given');
        }
    }

    /**
     * Returns the payload status as a string.
     *
     * @return string The payload status.
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
