<?php

namespace NovaKit\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Event;
use Laravel\Octane\Events\RequestReceived;
use function NovaKit\observe_eloquent;
use Orchestra\Testbench\TestCase;

class ObserveEloquentTest extends TestCase
{
    /** @test */
    public function it_can_observe_eloquent()
    {
        Event::fake();

        observe_eloquent(User::class, new class {

        });

        $this->assertTrue(Event::hasListeners(
            RequestReceived::class,
        ));
    }
}

class UserObserver {
    public function created($model) {

    }
}
