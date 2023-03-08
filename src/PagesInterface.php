<?php

namespace cideale\libmergepdf;

interface PagesInterface
{
    /**
     * @return int[]
     */
    public function getPageNumbers(): array;
}
