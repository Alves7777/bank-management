<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomTransactionAbrilJunhoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Abril
            ['date' => '2025-04-26', 'title' => 'Supermercado Cometa - mercado', 'amount' => 119.86, 'category_name' => 'Supermercado', 'month' => 'Abril'],
            ['date' => '2025-04-25', 'title' => 'Mercado', 'amount' => 14.40, 'category_name' => 'Supermercado', 'month' => 'Abril'],
            ['date' => '2025-04-24', 'title' => 'Ki Acai Nordeste - lanche', 'amount' => 14.60, 'category_name' => 'Lanche', 'month' => 'Abril'],
            ['date' => '2025-04-23', 'title' => 'D Textil - Parcela 1/3 - investimento', 'amount' => 141.76, 'category_name' => 'Investimento', 'month' => 'Abril'],
            ['date' => '2025-04-22', 'title' => 'Uber* Trip - transporte', 'amount' => 26.94, 'category_name' => 'Transporte', 'month' => 'Abril'],
            ['date' => '2025-04-21', 'title' => 'Skillburger - lazer', 'amount' => 81.38, 'category_name' => 'Lazer', 'month' => 'Abril'],
            ['date' => '2025-04-21', 'title' => 'Jjbuggy - transporte', 'amount' => 7.00, 'category_name' => 'Transporte', 'month' => 'Abril'],
            ['date' => '2025-04-20', 'title' => 'Supermercado Moranguin', 'amount' => 29.15, 'category_name' => 'Supermercado', 'month' => 'Abril'],
            ['date' => '2025-04-20', 'title' => 'Fran Padaria lanche', 'amount' => 14.54, 'category_name' => 'Lanche', 'month' => 'Abril'],
            ['date' => '2025-04-19', 'title' => 'Mp *Aurilio mercado', 'amount' => 42.00, 'category_name' => 'Supermercado', 'month' => 'Abril'],
            ['date' => '2025-04-19', 'title' => 'Uniao Comercio de Comb mercado', 'amount' => 38.05, 'category_name' => 'Supermercado', 'month' => 'Abril'],
            ['date' => '2025-04-19', 'title' => 'Mp *Aurilio mercado', 'amount' => 3.50, 'category_name' => 'Supermercado', 'month' => 'Abril'],
            ['date' => '2025-04-19', 'title' => 'Pague Menos farmacia', 'amount' => 11.99, 'category_name' => 'Saúde', 'month' => 'Abril'],
            ['date' => '2025-04-18', 'title' => 'Uber Uber *Trip Help.U - transporte', 'amount' => 10.37, 'category_name' => 'Transporte', 'month' => 'Abril'],
            ['date' => '2025-04-18', 'title' => 'Uber Uber *Trip Help.U transporte', 'amount' => 10.60, 'category_name' => 'Transporte', 'month' => 'Abril'],
            ['date' => '2025-04-17', 'title' => 'Pague Menos farmacia', 'amount' => 13.24, 'category_name' => 'Saúde', 'month' => 'Abril'],
            ['date' => '2025-04-16', 'title' => 'Ne Estacionamento', 'amount' => 4.00, 'category_name' => 'Transporte', 'month' => 'Abril'],
            ['date' => '2025-04-16', 'title' => 'Topfrutas', 'amount' => 2.50, 'category_name' => 'Outros', 'month' => 'Abril'],
            ['date' => '2025-04-15', 'title' => 'Petrocar', 'amount' => 74.53, 'category_name' => 'Gasolina', 'month' => 'Abril'],
            // ... (adicione mais conforme necessário)
            // Junho
            ['date' => '2025-05-30', 'title' => 'Caixa Fies', 'amount' => 193.08, 'category_name' => 'Outros', 'month' => 'Junho'],
            ['date' => '2025-05-30', 'title' => 'Oculos - Edilson', 'amount' => 156.27, 'category_name' => 'Outros', 'month' => 'Junho'],
            ['date' => '2025-05-30', 'title' => 'DAS', 'amount' => 86.47, 'category_name' => 'Outros', 'month' => 'Junho'],
            ['date' => '2025-05-30', 'title' => 'CREDICARD', 'amount' => 69.38, 'category_name' => 'Outros', 'month' => 'Junho'],
            ['date' => '2025-05-30', 'title' => 'Posto - Gasolina', 'amount' => 85.04, 'category_name' => 'Transporte', 'month' => 'Junho'],
            ['date' => '2025-05-30', 'title' => 'Ingles - Tracado - 1/4', 'amount' => 50.00, 'category_name' => 'Educação', 'month' => 'Junho'],
            ['date' => '2025-05-28', 'title' => 'Tecido - Parcela 3/3', 'amount' => 141.77, 'category_name' => 'Investimento', 'month' => 'Junho'],
            ['date' => '2025-05-28', 'title' => 'Ferrovia - Parcela 2/6 - oculos', 'amount' => 50.00, 'category_name' => 'Outros', 'month' => 'Junho'],
            ['date' => '2025-05-28', 'title' => 'churrasco - lazer', 'amount' => 49.00, 'category_name' => 'Lazer', 'month' => 'Junho'],
            ['date' => '2025-05-28', 'title' => 'Estacionamento', 'amount' => 3.00, 'category_name' => 'Transporte', 'month' => 'Junho'],
            ['date' => '2025-05-28', 'title' => 'Esporte - touca natação 2/2', 'amount' => 58.49, 'category_name' => 'Academia', 'month' => 'Junho'],
            ['date' => '2025-05-28', 'title' => 'Farmacia Patricia', 'amount' => 50.83, 'category_name' => 'Educação', 'month' => 'Junho'],
        ];
        DB::table('custom_transactions')->insert($data);
    }
}
