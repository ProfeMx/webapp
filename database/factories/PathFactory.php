<?php

namespace Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use App\Models\Path;
use Illuminate\Database\Eloquent\Factories\Factory;

class PathFactory extends Factory
{

    protected $model = Path::class;

    public function definition()
    {
        return [
            'name' => 'Ruta 1',
            'description' => 'Descripción de la ruta'
        ];
    }

}
