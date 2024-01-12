<?php

namespace Database\Factories\GalehLudi;

use App\Models\GalehLudi\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('id_ID');

        $gelar = ['S.Kom', 'M.Kom', 'M.Si.Kom', 'S.TI', 'M.TI', 'M.SI', 'M.RPL', 'S.T', 'M.TE'];

        return [
            'dosen_id' => 'D' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'nama_dosen' => "{$faker->name}, {$faker->randomElement($gelar)}",
            'alamat' => $faker->address,
            'handphone' => $faker->phoneNumber,
        ];
    }
}
