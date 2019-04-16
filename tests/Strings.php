<?php


namespace Qpdb\Tests;


class Strings
{
    /**
     * @param $content
     * @return string|string[]|null
     */
    public static function removeAllSpacesFromString($content) {
        return preg_replace('/[\s+\n+\t+]/m', '', $content);
    }
}