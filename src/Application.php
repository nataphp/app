<?php

namespace App;

use Nata\Http\BaseApplication;
use Nata\Http\Middleware\Routing;
use Nata\Http\MiddlewareQueue;

class Application extends BaseApplication {

    public function middleware(MiddlewareQueue $middlewareQueue) {
        $middlewareQueue->add(new Routing(['configDir' => $this->_configDir]));
        return $middlewareQueue;
    }

}
