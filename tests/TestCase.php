<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    public function setUp(): void
    {
        
        parent::setUp();
        // additional setup

        // 1. En phpunit.xml actualiza: DB_CONNECTION y DB_DATABASE

        // 2. Cargar las migraciones
        \Artisan::call('migrate');

        // 3. Crear un usuario
        $this->user = \App\Models\User::factory()->create();

        // 4. Autenticar al usuario
        $this->actingAs($this->user);

        // Nota: No olvidar añadir la columna deleted_at en la tabla users
        // Nota: Añadir /auth/create-token a las uri sin protección csrf
        // Nota: Instalar el driver para code coverage

    }

    protected function getPackageProviders($app)
    {
        
        return [
            //
        ];

    }

    protected function getEnvironmentSetUp($app)
    {
        
        // perform environment setup

    }

}
