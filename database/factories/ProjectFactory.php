<?php

namespace Database\Factories;

use App\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_jefe_proyecto' => $this->faker->numberBetween(1, 10),
            'descripcion' => $this->faker->text(63),
            'fecha_inicio' => $this->faker->dateTime,
            'fecha_fin' => $this->faker->dateTime,
            'estado' => $this->faker->boolean(50),
        ];
    }
}

