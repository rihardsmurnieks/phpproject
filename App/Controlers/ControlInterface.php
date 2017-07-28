<?php
namespace Bootcamp\Controlers;

interface ControlInterface
{
    public function render(string $template, array $content = []) : string;
}