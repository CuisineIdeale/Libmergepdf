<?php

namespace cideale\libmergepdf\Driver;

use cideale\libmergepdf\Source\SourceInterface;

interface DriverInterface
{
    /**
     * Merge multiple sources
     */
    public function merge(SourceInterface ...$sources): string;
}
