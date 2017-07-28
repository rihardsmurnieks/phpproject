<?php

namespace bootcamp;
interface ContainerInterface
{
    public function get(string $dependencyName);
}