# RouteGenerator

## Example route handler

```
<?php

namespace App\RouteHandlers;

use App\Entity\User;
use LoremIpsum\RouteGeneratorBundle\RouteHandlerInterface;
use Symfony\Component\Routing\RouterInterface;

class DefaultRouteHandler implements RouteHandlerInterface
{
    protected $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function handle($value, $view = null, $context = [])
    {
        if ($value instanceof User) {
            return $this->router->generate('userView', array_merge(['user' => $value->getId()], $context));
        }
        return null;
    }
}
```