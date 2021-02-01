##  Sistema de Caronas  para Eventos de Tecnologia.

### Descrição
#### Esse projeto tem com intuito disponibilizar funcionamento de caronas, onde é realizado o cadastro do Caroneiro e qual cidade ele está e qual cidade ele deseja ir. 
#### Para solicitar uma carona é necessário que tenha disponíveis motorista, em que o raio de distância entre o motorista e o caroneiro seja menor ou igual que foi cadastrado pelo motorista, para disponibilizar a carona.
#### Esse cálculo de distância é realizado entre a longitude e latitude do motorista e caroneiro.
#### Se existir motorista próximo ao caroneiro, o caroneiro pode realizar a solicitação de carona para o motorista e o mesmo pode aprovar ou recusar a solicitação. Caso seja recusado o caroneiro pode realizar uma nova solicitação, para outro motorista, caso for aceita, o caroneiro é adicionado na viagem do motorista. **

### Instalação
- Clonar o projeto
- Realizar a instalaçao do [Composer](https://getcomposer.org/ "Composer")
- Criar a base de dados `sistemacaronas`
- Executar os comandos:
- - `composer install`
- - `php artisan migrate:fresh`
- - `php artisan serve`

### Rotas
#### GET  `caroneiro`
##### Retorna todos os caroneiros cadastrados.

#### GET  `caroneiro/{id_caroneiro}`
##### Retorna caroneiro de acordo com o id.

#### POST `caroneiro`
##### Salva um novo Caroneiro.
```json
    {
        "nm_caroneiro" : "Nome do Caroneiro"
    }
```
#### PUT  `caroneiro/{id_caroneiro}`
##### Atualiza um caroneiro de acordo com o id.
```json
    {
        "nm_caroneiro" : "Novo nome do Caroneiro"
    }
```

#### DELETE  `caroneiro/{id_caroneiro}`
##### Deleta um caroneiro de acordo com o id.

#### GET  `caroneiro/carona/{id_caroneiro}`
##### Retorna caroneiro de acordo com o id.

#### POST  `caroneiro/carona`
##### Salva um novo destino e origem de carona.
```json
    {
        "caroneiro_id" : 1,
        "endereco_origem_id" : 4932 ,
        "endereco_destino_id" : 2792,
    }
```