<?php

declare(strict_types = 1);

namespace Cideale\Libmergepdf\Driver;

use Cideale\Libmergepdf\Source\SourceInterface;

final class DefaultDriver implements DriverInterface
{
    /**
     * @var DriverInterface
     */
    private $wrapped;

    public function __construct(DriverInterface $wrapped = null)
    {
        $this->wrapped = $wrapped ?: new Fpdi2Driver;
    }

    public function merge(SourceInterface ...$sources): string
    {
        return $this->wrapped->merge(...$sources);
    }
}
