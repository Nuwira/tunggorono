<?php

namespace Tests\Feature\Web;

use Tests\Feature\WebTestCase as TestCase;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        
        $this->referer = ['HTTP_REFERER' => route('login.form')];
    }
    
    /**
     * @test
     */
    public function testUserCanLogin()
    {
        $user = factory(User::class)->states('active', 'administrator')->create([
            'email' => 'tunggorono@nuwira.co.id',
            'password' => bcrypt('rahasia')
        ]);
        
        $response = $this->post(route('login'), [
            'email' => 'tunggorono@nuwira.co.id',
            'password' => 'rahasia'
        ], $this->referer);

        $response->assertRedirect(route('dashboard'));
    }
    
    /**
     * @test
     */
    public function testUnregisteredUserCannotLogin()
    {
        $response = $this->post(route('login'), [
            'email' => 'tunggorono@nuwira.co.id',
            'password' => 'rahasia'
        ], $this->referer);

        $response->assertRedirect(route('login.form'));
    }
    
    /**
     * @test
     */
    public function testInactiveUserCannotLogin()
    {
        $user = factory(User::class)->states('inactive', 'administrator')->create([
            'email' => 'tunggorono@nuwira.co.id',
            'password' => bcrypt('rahasia')
        ]);
        
        $response = $this->post(route('login'), [
            'email' => 'tunggorono@nuwira.co.id',
            'password' => 'rahasia'
        ], $this->referer);

        $response->assertRedirect(route('login.form'));
    }
    
    /**
     * @test
     */
    public function testCannotLoginWithoutParameter()
    {
        $response = $this->post(route('login'), [], $this->referer);
        
        $response->assertRedirect(route('login.form'));
    }
}
