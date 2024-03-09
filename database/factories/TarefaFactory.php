<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->realText(50),
            'tipo' => fake()->randomElement(['Incidente', 'Solicitação de Serviço', 'Melhorias', 'Projetos']),
            'prioridade' => fake()->randomElement(['alta', 'baixa', 'media', 'Sem prioridade']),
            'descricao' => fake()->paragraph(),
            'situacao' => fake()->boolean(0),
            'responsavel_id' => fake()->numberBetween(1,11),
        ];
    }
}