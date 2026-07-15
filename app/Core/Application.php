<?php

namespace App\Core;

class Application
{
    public function run(): void
    {
        $kernel = new HttpKernel();
        $kernel->handle();
    }
}