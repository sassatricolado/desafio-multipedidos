
# Desafio vaga backend PHP da Multipedidos

![Badge Concluido](http://img.shields.io/static/v1?label=STATUS&message=CONCLUÍDO&color=GREEN&style=for-the-badge)

API RESTFULL construída com o framework Laravel. Para o desafio de vaga para desenvolvedor backend júnior na Multipedidos.


## Instalação

Clone o projeto

```bash
  git clone https://github.com/sassatricolado/desafio-multipedidos.git
```

Entre no diretório do projeto

```bash
  cd desafio-multipedidos/
```

Instale as dependências com Docker

```bash
  docker run -v $(pwd):/app composer install
```

Copie o arquivo .env.exemple e faça as alterações de configuração necessárias no arquivo .env

```bash
  cp .env.example .env
```

Gere uma nova chave de aplicação

```bash
  sail art key:generate
```

Faça a migração de dados. Utilize a flag --seed no fim se quiser popular a tabela de usuários e de carros

```bash
  sail art migrate
```

Suba a aplicação

```bash
  ./vendor/bin/sail up
```

## Documentação da API

#### Retorna todos os carros

```http
  GET /api/cars
```

#### Cria um usuário

```http
  POST /api/users/store
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `name` | `string` | **Obrigatório**. Nome do usuário |
| `email` | `string` | **Obrigatório**. Email do usuário |
| `password` | `string` | **Obrigatório**. Senha do usuário | 

#### Cria um carro

```http
  POST /api/cars/store
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `model` | `string` | **Obrigatório**. Modelo do carro |
| `make` | `string` | **Obrigatório**. Marca do carro |
| `year` | `integer` | **Obrigatório**. Ano do carro |

#### Atualiza carro (Mesmos parâmetros obrigatórios da criação de carro)

```http
  PUT /api/cars/update/{car_id}
```

#### Atualiza usuário

```http
  PUT /api/users/update/{user_id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório**. Email do usuário |
| `password` | `string` | **Obrigatório**. Senha do usuário | 

#### Deleta carro/usuário e todas as relações que eles possuem

```http
  DELETE /api/cars/delete/{car_id}
  DELETE /api/users/delete/{user_id}
```

#### Cria uma relação entre o usuário e o carro

```http
  POST /api/associate/{user_id}/{car_id}
```

#### Retorna todos os carros em que o usuário está associado (10 carros por página)

```http
  GET /api/userCars/{user_id}
```

#### Dissocia carro e usuário

```http
  DELETE /api/disassociate/{user_id}/{car_id}
```

## Stack utilizada

Laravel, MySQL e Docker.

