<?php

namespace Tests\Feature\Web;

use Tests\Feature\WebTestCase as TestCase;
use App\Models\User;

class IndexPageTest extends TestCase
{
    /**
     * @test
     */
    public function testShowLoginScreenIfNotLoggedIn()
    {
        $response = $this->get('/');

        $response->assertRedirect(route('login.form'));
    }
    
    /**
     * @test
     */
    public function testRedirectToDashboardIfLoggedIn()
    {
        $user = factory(User::class)->states('active', 'administrator')->create();
        
        $response = $this->actingAs($user)->get('/');
        
        $response->assertRedirect(route('dashboard'));
    }
}
