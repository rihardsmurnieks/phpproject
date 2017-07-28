<?php
namespace Bootcamp\Controlers;


use Bootcamp\ContainerInterface;

abstract class AbstractController implements ControlInterface
{
    /** @var \ContainerInterface */
    protected $container;
    public function __construct(ContainerInterface $dependencyContainer)
    {
        $this->container = $dependencyContainer;
    }
    public function render(string $template, array $content = []) : string
    {
        return include $this->container->get('resource.views') . $template;
    }
}