<?php

namespace App\Application\Ehd\Command\Station\Sync;

use App\Application\Ehd\Command\City\Sync\Command;
use St\AbstractService\Bus\Command\CommandHandlerInterface;

class Handler implements CommandHandlerInterface
{
    public function __invoke(Command $command): void
    {

    }
}