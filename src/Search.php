<?php


namespace flipak180\pkrt;

interface Search
{

    /**
     * Search for a needle and return a line number
     *
     * @param string $needle
     * @return false|int
     */
    public function find(string $needle): int|false;
}
