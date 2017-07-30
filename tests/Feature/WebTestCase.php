<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

abstract class WebTestCase extends TestCase
{
    use DatabaseMigrations;
}
