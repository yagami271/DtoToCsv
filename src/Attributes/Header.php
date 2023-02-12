<?php

namespace Yagami\DtoToCsv\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Header
{
    public function __construct(private readonly int $position, private readonly string $name)
    {
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

