<?php

namespace Yagami\DtoToCsv\Example;

use Yagami\DtoToCsv\Attributes\Header;

class DtoExample
{
    #[Header(position: 1, name: 'identifer')]
    public int $id;

    #[Header(position: 3, name: 'age')]
    public string $age;

    #[Header(position: 2, name: 'email_parent')]
    public string $emailParent;

    /**
     * @param int $id
     * @param string $age
     * @param string $emailParent
     */
    public function __construct(int $id, string $age, string $emailParent)
    {
        $this->id = $id;
        $this->age = $age;
        $this->emailParent = $emailParent;
    }


}

