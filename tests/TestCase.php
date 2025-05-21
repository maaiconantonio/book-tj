<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function factory($class, $count = null)
    {
        $factory = app(EloquentFactory::class);
        return $factory->of($class)->times($count ?: 1);
    }
}
