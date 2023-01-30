<?php

namespace App\Domain\Entity\ValueObject;

enum EventTypeEnum : string
{
    case INSERT = 'insert';

    case UPDATE = 'update';
}
