<?php

declare(strict_types=1);

/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2022 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Yasumi\Filters;

use Iterator;
use Yasumi\Provider\AbstractProvider;
use Yasumi\ProviderInterface;

/**
 * OnFilter is a class used for filtering holidays based on a given date.
 *
 * Filters for all holidays that happen on the given date.
 *
 * Note: this class can be used separately, however is implemented by the AbstractProvider::on method.
 */
class OnFilter extends AbstractFilter
{
    /** date to check for holidays */
    private string $date;

    /**
     * Construct the On FilterIterator Object.
     *
     * @param Iterator<ProviderInterface> $iterator Iterator object of the Holidays Provider
     * @param \DateTimeInterface          $date     Start date of the time frame to check against
     */
    public function __construct(
        Iterator $iterator,
        \DateTimeInterface $date
    ) {
        parent::__construct($iterator);
        $this->date = $date->format('Y-m-d');
    }

    public function accept(): bool
    {
        $holiday = $this->getInnerIterator()->current()->format('Y-m-d');

        return $holiday === $this->date;
    }
}
