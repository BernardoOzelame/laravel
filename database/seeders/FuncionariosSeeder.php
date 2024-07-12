<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionariosSeeder extends Seeder {
    public function run(): void {
        DB::table('funcionarios')->insert([
            [
                'nome' => 'Abacaxi',
                'cargo' => 'Analista',
                'departamento' => 'ERP',
                'salario' => '2024.40'
            ],
            [
                'nome' => 'Berinjela',
                'cargo' => 'Dev',
                'departamento' => 'Gestão Financeira',
                'salario' => '2025.50'
            ],
        ]);
    }
}
