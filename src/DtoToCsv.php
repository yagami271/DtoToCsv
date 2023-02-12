<?php

namespace Yagami\DtoToCsv;

use Yagami\DtoToCsv\Attributes\Header;
use Yagami\DtoToCsv\Example\DtoExample;

class DtoToCsv
{
    public static function toCsv(): void
    {
        $data = [
            new DtoExample(1, "20 ans ", 'yolo'),
            new DtoExample(2, "2 ans ", 'toto'),
            new DtoExample(3, "1 ans ", 'tata'),
            new DtoExample(4, "1 ans ", 'ninja'),
        ];

        if ($data === []) {
            return;
        }

        // Step on get the header name

        $reflexion = new \ReflectionClass($data[0]);
        $headers = [];
        foreach ($reflexion->getProperties() as $property) {
            if($property->isPublic() !== true){
                throw new \RuntimeException('property visibility must be public');
            }
            foreach ($property->getAttributes(Header::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute) {
                /** @var Header $instance */
                $instance = $attribute->newInstance();
                if (array_key_exists($instance->getPosition(), $headers)) {
                    throw new \RuntimeException(\sprintf('Position must be unique for each property %s', $property->getName()));
                }
                $headers[$instance->getPosition()] = new Props(
                    $instance->getName(),
                    $property->getName()
                );
            }
        }

        ksort($headers);

        $csv = [];

        // Add title to the csv
        foreach ($headers as $header){
            $csv[] = $header->headerDisplayName;
        }

        foreach ($data as $key => $item){
            foreach ($headers as $header){
                $csv[] = $item->{$header->dtoProperty};
            }
        }

        dd($csv);

        dd($headers);
        dd('dsqd');
    }
}
