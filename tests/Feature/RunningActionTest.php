<?php

namespace NovaKit\Tests\Feature;

use Mockery as m;
use function NovaKit\running_action;
use Orchestra\Testbench\TestCase;

/**
 * @testdox NovaKit\running_action() tests
 */
class RunningActionTest extends TestCase
{
    /** @test */
    public function it_can_validate_running_action_request()
    {
        $actionRequest = m::mock('alias:Laravel\Nova\Http\Requests\ActionRequest', 'Illuminate\Http\Request');
        $novaRequest = m::mock('alias:Laravel\Nova\Http\Requests\NovaRequest', 'Illuminate\Http\Request');

        $this->assertTrue(running_action($actionRequest));
        $this->assertFalse(running_action($novaRequest));
    }
}
