##  Sistema de Caronas.

### Descrição
#### Esse projeto tem com intuito disponibilizar funcionamento de caronas, onde é realizado o cadastro do Caroneiro e qual cidade ele está e qual cidade ele deseja ir. 
#### Para solicitar uma carona é necessário que tenha disponíveis um ou mais motoristas, em que o raio de distância entre o motorista e o caroneiro seja menor ou igual que foi cadastrado pelo motorista, para disponibilizar a carona.
#### Esse cálculo de distância é realizado entre a longitude e latitude do motorista e caroneiro.
#### Se existir motorista próximo ao caroneiro dentro do raio cadastrado, o caroneiro pode realizar a solicitação de carona para o motorista e o mesmo pode aprovar ou recusar a solicitação. Caso seja recusado o caroneiro pode realizar uma nova solicitação, para outro motorista, caso for aceita, o caroneiro é adicionado na viagem do motorista.

### Instalação
- Clonar o projeto
- Realizar a instalaçao do [Composer](https://getcomposer.org/ "Composer")
- Criar a base de dados `sistemacaronas`
- Executar os comandos:
- - `composer install`
- - Faça uma cópia do arquivo .env.example e renomeando-o para .env
- - `php artisan key:generate`
- - `php artisan migrate`
- - `php artisan serve`

### Rotas
#### Caroneiro
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

#### POST  `caroneiro/carona`
##### Salva um novo destino e origem de carona.
```json
    {
        "caroneiro_id" : 1,
        "endereco_origem_id" : 4932,
        "endereco_destino_id" : 2792
    }
```
#### GET  `caroneiro/carona/{id_caroneiro}`
##### Retorna motorista disponiveis para dar a carona.

#### POST  `caroneiro/solicitacao`
##### Salva uma nova solicitação de carona para determinado motorista.
```json
    {
        "carona_caroneiro_id" : 1,
        "carona_motorista_id" : 1 
    }
```
#### GET  `caroneiro/solicitacao/{id_solicitacao}`
##### Retorna status de solicitações de carona

#### Motorista

#### GET  `motorista`
##### Retorna todos os motoristaa cadastrados.

#### GET  `motorista/{id_motorista}`
##### Retorna o motorista de acordo com o id.

#### POST `motorista`
##### Salva um novo motorista.
```json
    {
        "nm_motorista" : "Nome do Motorista",
        "nm_carro" : "Nome carro do Motorista",
    }
```
#### PUT  `motorista/{id_motorista}`
##### Atualiza um motorista de acordo com o id.
```json
    {
        "nm_motorista" : "Novo nome do Motorista",
        "nm_carro" : "Novo carro do Motorista",
    }
```

#### DELETE  `motorista/{id_motorista}`
##### Deleta um motorista de acordo com o id.

#### GET  `motorista/solicitacao/{id_motorista}`
##### Retorna solicitações de carona de acordo com o id do motorista.

#### POST  `motorista/validacao`
##### Aprova ou recusa uma solicitacao da carona.
```json
    {
        "id_solicitacao" : "Id da solicitação de carona",
        "aprovacao" : "True or false",
    }