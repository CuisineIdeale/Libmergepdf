<?php

namespace Cideale\Libmergepdf\Driver;

use Cideale\Libmergepdf\Source\SourceInterface;

interface DriverInterface
{
    /**
     * Merge multiple sources
     */
    public function merge(SourceInterface ...$sources): string;
}
