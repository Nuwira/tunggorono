<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	protected $baseUrl = env('APP_URL', 'http://localhost');
	
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

}
