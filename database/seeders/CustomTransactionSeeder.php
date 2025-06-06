<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomTransactionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['date' => '2025-05-27', 'title' => 'Pix empresa - confra empresa', 'amount' => 13.15, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-27', 'title' => 'Claro Flex - celular', 'amount' => 39.99, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-27', 'title' => 'Uber Uber *Trip Help.U - saídas', 'amount' => 29.93, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-26', 'title' => 'Supermercado', 'amount' => 57.45, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-25', 'title' => 'Iap Cosmeticos - saídas', 'amount' => 21.99, 'category_name' => 'Pessoal', 'month' => 'Maio'],
            ['date' => '2025-05-25', 'title' => 'Nathalialirade - saídas lanche', 'amount' => 57.80, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-24', 'title' => 'Topfrutas - lanche me', 'amount' => 12.25, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-05-22', 'title' => 'Mp *Topfrutas -  lanche me', 'amount' => 15.69, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-05-21', 'title' => 'Posto Papagaio - gasolina', 'amount' => 14.80, 'category_name' => 'Gasolina', 'month' => 'Maio'],
            ['date' => '2025-05-20', 'title' => 'Posto Modelo - gasolina', 'amount' => 70.00, 'category_name' => 'Gasolina', 'month' => 'Maio'],
            ['date' => '2025-05-20', 'title' => 'Estacionamento Ig Fort', 'amount' => 4.00, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-19', 'title' => 'Pizzaria Fornelle saídas lanche', 'amount' => 67.98, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-18', 'title' => 'Sal e Brasa saídas lanche', 'amount' => 139.48, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-18', 'title' => 'Sobral e Palacio 2001- NA', 'amount' => 16.98, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-17', 'title' => 'Maria Ercilia dos Santos mae', 'amount' => 20.68, 'category_name' => 'Presentes', 'month' => 'Maio'],
            ['date' => '2025-05-16', 'title' => 'Bom Vizinho Distribuid supermercado', 'amount' => 41.94, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-16', 'title' => 'Mercado', 'amount' => 6.69, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-14', 'title' => 'Topfrutas - mercado', 'amount' => 8.50, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Alexandre Macedo Ferna', 'amount' => 7.30, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Ferrovia - Parcela 1/6 - oculos', 'amount' => 50.00, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Fran Padaria - lanche me', 'amount' => 5.69, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Dragao do Leste lanche saídas', 'amount' => 9.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Francisconetode', 'amount' => 10.00, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Posto Amuarama gasolina', 'amount' => 73.79, 'category_name' => 'Gasolina', 'month' => 'Maio'],
            ['date' => '2025-05-11', 'title' => 'Jeudasiosilvarest', 'amount' => 109.78, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-10', 'title' => 'Lendpay*Mr Denny cabelo', 'amount' => 50.00, 'category_name' => 'Pessoal', 'month' => 'Maio'],
            ['date' => '2025-05-10', 'title' => 'Bom Vizinho Distribuid supermercado', 'amount' => 66.95, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-10', 'title' => 'Lendpay*Mr Denny cabelo', 'amount' => 7.00, 'category_name' => 'Pessoal', 'month' => 'Maio'],
            ['date' => '2025-05-09', 'title' => 'L M Estacionamento - Estacionamento centro', 'amount' => 9.00, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-09', 'title' => 'Uber* Trip', 'amount' => 9.89, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-08', 'title' => 'Pague Menos remedio', 'amount' => 4.99, 'category_name' => 'Saúde', 'month' => 'Maio'],
            ['date' => '2025-05-08', 'title' => 'Ki Acai Nordeste', 'amount' => 16.61, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-05-07', 'title' => 'SUHAI SEGURADORA AS seguro moto', 'amount' => 193.42, 'category_name' => 'Saúde', 'month' => 'Maio'],
            ['date' => '2025-05-07', 'title' => 'Natação', 'amount' => 400.00, 'category_name' => 'Educação', 'month' => 'Maio'],
            ['date' => '2025-05-07', 'title' => 'Mercado', 'amount' => 10.90, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'Touca Natação saídas - Parcela 1/2', 'amount' => 58.49, 'category_name' => 'Educação', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'Bom Vizinho Distribuid supermercado', 'amount' => 13.99, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'Lanche com a saídas', 'amount' => 32.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'Ne Estacionamento', 'amount' => 4.00, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'Estacionamento Ig Fort', 'amount' => 4.00, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'pagode Uber saídas', 'amount' => 28.99, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-05', 'title' => 'Milky Moo Iguatemi Bos  saídas', 'amount' => 24.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-04', 'title' => 'pagode Uber  saídas', 'amount' => 18.97, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-04', 'title' => 'Pagode da Diretoria  saídas', 'amount' => 81.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-04', 'title' => 'APLICATIVO MAKEMYNIGHT  saídas', 'amount' => 55.88, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-05-04', 'title' => 'Pizza do pagode  saídas', 'amount' => 69.90, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-04', 'title' => 'melancia mercado', 'amount' => 15.87, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-05-04', 'title' => 'Invictus Idiomas ingles', 'amount' => 249.00, 'category_name' => 'Educação', 'month' => 'Maio'],
            ['date' => '2025-05-03', 'title' => 'Posto Papagaio - gasolina', 'amount' => 75.66, 'category_name' => 'Gasolina', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'Pac Maxgym Academia academia', 'amount' => 139.99, 'category_name' => 'Academia', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'dias das mães - mae', 'amount' => 155.60, 'category_name' => 'Presentes', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'cinema 2 sorvete saídas', 'amount' => 27.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'lanche cinema 2 saídas', 'amount' => 107.80, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'cinema 2 pipoca saídas', 'amount' => 37.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'desodorante me', 'amount' => 18.39, 'category_name' => 'Pessoal', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'Estacionamento Ig Fort saídas', 'amount' => 4.00, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-05-02', 'title' => 'cinema 2 saídas', 'amount' => 81.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-04-30', 'title' => 'Bom Vizinho Distribuid supermercado', 'amount' => 34.59, 'category_name' => 'Supermercado', 'month' => 'Maio'],
            ['date' => '2025-04-28', 'title' => 'lanche saídas', 'amount' => 41.54, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-04-28', 'title' => 'pão lanche', 'amount' => 3.70, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-04-28', 'title' => 'estacionamento', 'amount' => 4.00, 'category_name' => 'Transporte', 'month' => 'Maio'],
            ['date' => '2025-04-28', 'title' => 'Fran Padaria', 'amount' => 11.70, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'lanche mercado', 'amount' => 24.80, 'category_name' => 'Lanche', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'cinema 1 saídas', 'amount' => 68.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'cinema 1 saídas', 'amount' => 30.97, 'category_name' => 'Lazer', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'Tecido - Parcela 2/3', 'amount' => 141.77, 'category_name' => 'Investimento', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'Claro Flex celular', 'amount' => 39.99, 'category_name' => 'Outros', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'gasolina', 'amount' => 50.00, 'category_name' => 'Gasolina', 'month' => 'Maio'],
            ['date' => '2025-04-27', 'title' => 'cinema 1 saidas', 'amount' => 25.00, 'category_name' => 'Lazer', 'month' => 'Maio'],
            // Abril e Junho omitidos por limitação de espaço
        ];
        $data = array_map(function($item) {
            $item['type'] = 'NUBANK';
            return $item;
        }, $data);
        DB::table('custom_transactions')->insert($data);
    }
}
