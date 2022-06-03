<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContestRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_email_can_be_entered_into_the_contest()
    {
        $this->withoutExceptionHandling();

        $this->post('/contest', [
            'email' => 'abc@abc.com'
        ]);

        $this->assertDatabaseCount('contest_entries', 1);
    }

    /** @test */
    public function email_is_required()
    {
        $this->withoutExceptionHandling();

        $this->post('/contest', [
            'email' => 'wqerewr'
        ]);

        $this->assertDatabaseCount('contest_entries', 0);
    }

    /** @test */
    public function email_needs_to_be_an_email()
    {
        $this->post('/contest', [
            'email' => ''
        ]);

        $this->assertDatabaseCount('contest_entries', 1);
    }
}
