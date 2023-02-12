<?php

namespace Yagami\DtoToCsv;

class Props
{

    public function __construct(
        public string $headerDisplayName,
        public string $dtoProperty,
    )
    {
    }
}
