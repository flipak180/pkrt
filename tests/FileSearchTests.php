<?php

declare(strict_types=1);

namespace flipak180\pkrt;

use PHPUnit\Framework\TestCase;

class FileSearchTests extends TestCase
{
    /**
     * Test that line is correct when needle exists
     */
    public function testNeedleExists()
    {
        $fileSearch = new FileSearch(dirname(dirname(__FILE__)) . '/composer.json');
        $lineNumber = $fileSearch->find('php');

        $this->assertTrue($lineNumber === 20);
    }

    /**
     * Test that line is correct when needle exists
     */
    public function testNeedleNotExists()
    {
        $fileSearch = new FileSearch(dirname(dirname(__FILE__)) . '/LICENSE.md');
        $lineNumber = $fileSearch->find('php');

        $this->assertTrue($lineNumber === false);
    }
}
