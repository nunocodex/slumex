<?php

namespace NunoCodex\Slumex\Container;

interface ContainerAwareInterface
{
    public function getContainer(): ContainerInterface;

    public function setContainer(ContainerInterface $container);
}
