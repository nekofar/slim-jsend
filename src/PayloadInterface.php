<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\JSend;

use JsonSerializable;

/**
 * Interface PayloadInterface
 *
 * Represents the payload of a JSend response.
 */
interface PayloadInterface extends JsonSerializable
{
    // No additional methods defined in the interface
}
