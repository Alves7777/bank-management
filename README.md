# API Bank Management
Projeto GESTÃO BANCÁRIA

# Está sendo usado as seguintes ferramentas
`PHP: 8.1`<br>
`Laravel: 10.48`<br>
`MySql: 8.0`

# Instalação

### Clone o projeto
`git clone https://github.com/Alves7777/bank-management.git ou git@github.com:Alves7777/bank-management.git`


### Execute o comando abaixo no terminal para adquirir o .env

`cp .env.example .env`

### Crie o banco de dados e adicione no .env

`DB_DATABASE=bank_management`<br>
`DB_USERNAME=*****` <br>
`DB_PASSWORD=*****`

### Execute o comando abaixo para instalar as dependências do laravel

`sudo composer install`

### Execute o comando a seguir para gerar as tabelas do banco de dados

`php artisan migrate`

### Pronto, agora é só adicionar o comando `php artisan serve` para acessar a aplicação

### Acesse o POSTMAN pra acessar os enpoints abaixo:

#### Criar Conta Bancária
Endpoint: POST http://localhost:8000/api/v1/account<br>
Descrição: Cria uma nova conta bancária.

`Request Body (JSON):`
{
"account_number": 12345678,
"balance": 100.00
}

#### Consultar Conta Bancária
Endpoint: GET http://localhost:8000/api/v1/account?account_number=12345678<br>
Descrição: Consulta uma conta bancária pelo número da conta.

#### Criar Transação (Crédito)
Endpoint: POST http://localhost:8000/api/v1/transaction<br>
Descrição: Cria uma nova transação de crédito em uma conta bancária.

`Request Body (JSON):`
{
"account_number": 12345678,
"value": 50.00,
"type": "credit"
}

### Caso queira, pode rodar todos os testes automatizados.

`php artisan test`

### Se preferir, pode rodar o teste filtrato.

`php artisan test --filter test_transaction_credit_success`
