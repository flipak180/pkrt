<?php

declare(strict_types=1);

namespace flipak180\pkrt;

class FileSearch implements Search
{
    /**
     * @var string
     */
    private string $filepath;

    /**
     * Create a new Search Instance
     *
     * @param string $filepath
     */
    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function find(string $needle): int|false
    {
        $line_number = false;

        if ($handle = fopen($this->filepath, "r")) {
            $count = 0;
            while (($line = fgets($handle, 4096)) !== false and !$line_number) {
                $count++;
                $line_number = (strpos($line, $needle) !== false) ? $count : $line_number;
            }
            fclose($handle);
        }

        return $line_number;
    }
}
