<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Outros', 'Transporte', 'Supermercado', 'Pessoal', 'Lazer', 'Lanche', 'Gasolina', 'Presentes', 'Saúde', 'Educação', 'Academia', 'Investimento'
        ];
        foreach ($categories as $cat) {
            DB::table('categories')->updateOrInsert([
                'name' => $cat
            ], [
                'description' => $cat
            ]);
        }
    }
}
