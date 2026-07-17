<?php

namespace App\Core;

class Application
{
    public function run(): void
    {
        // Here we are just calling the 'HttpKernel' class and its 'handle' method to process the incoming HTTP request.
        $kernel = new HttpKernel();
        $kernel->handle();
    }
}