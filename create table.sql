CREATE TABLE caroneiro(
	id_caroneiro INT PRIMARY KEY AUTO_INCREMENT,
    nm_caroneiro VARCHAR(255),
    updated_at DATETIME,
    created_at DATETIME
);

CREATE TABLE endereco(
	id_endereco INT PRIMARY KEY AUTO_INCREMENT,
    nm_municipio VARCHAR(255),
    nm_uf VARCHAR(100),
    cd_longitude VARCHAR(50),
    cd_latitude VARCHAR(50),
    updated_at DATETIME,
    created_at DATETIME
);

CREATE TABLE status(
    id_status INT PRIMARY KEY AUTO_INCREMENT,
    nm_status VARCHAR(100)
);

CREATE TABLE motorista(
    id_motorista INT PRIMARY KEY AUTO_INCREMENT,
    nm_motorista VARCHAR(100),
    nm_carro VARCHAR(100),
    updated_at DATETIME,
    created_at DATETIME
);

CREATE TABLE carona_caroneiro(
    id_carona_caroneiro INT PRIMARY KEY AUTO_INCREMENT,
    caroneiro_id INT,
    endereco_origem_id INT,
    endereco_destino_id INT,
    status_id INT,
    updated_at DATETIME,
    created_at DATETIME,

    FOREIGN KEY (caroneiro_id) REFERENCES caroneiro(id_caroneiro),
    FOREIGN KEY (endereco_origem_id) REFERENCES endereco(id_endereco),
    FOREIGN KEY (endereco_destino_id) REFERENCES endereco(id_endereco),
    FOREIGN KEY (status_id) REFERENCES status(id_status)

);

CREATE TABLE carona_motorista(
    id_carona_motorista INT PRIMARY KEY AUTO_INCREMENT,
    motorista_id INT,
    endereco_origem_id INT,
    endereco_destino_id INT,
    status_id INT,
    qtd_max_passageiro INT,
    raio DECIMAL(10,2),
    updated_at DATETIME,
    created_at DATETIME,

    FOREIGN KEY (motorista_id) REFERENCES motorista(id_motorista),
    FOREIGN KEY (endereco_origem_id) REFERENCES endereco(id_endereco),
    FOREIGN KEY (endereco_destino_id) REFERENCES endereco(id_endereco),
    FOREIGN KEY (status_id) REFERENCES status(id_status)

);

CREATE TABLE viagem(
    id_viagem INT PRIMARY KEY AUTO_INCREMENT,
    caroneiro_id INT,
    carona_motorista_id INT,
    status_id INT,
    updated_at DATETIME,
    created_at DATETIME,

    FOREIGN KEY (caroneiro_id) REFERENCES caroneiro(id_caroneiro),
    FOREIGN KEY (carona_motorista_id) REFERENCES carona_motorista(id_carona_motorista),
    FOREIGN KEY (status_id) REFERENCES status(id_status)

);


CREATE TABLE solicitacao(
    id_solicitacao INT PRIMARY KEY AUTO_INCREMENT,
    carona_caroneiro_id INT,
    carona_motorista_id INT,
    status_id INT,
    updated_at DATETIME,
    created_at DATETIME,

    FOREIGN KEY (carona_caroneiro_id) REFERENCES carona_caroneiro(id_carona_caroneiro),
    FOREIGN KEY (carona_motorista_id) REFERENCES carona_motorista(id_carona_motorista),
    FOREIGN KEY (status_id) REFERENCES status(id_status)
);