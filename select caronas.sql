SELECT
    cm.id_carona_motorista,
    cm.motorista_id,
    m.nm_motorista,
    m.nm_carro,
    origem.nm_uf as nm_uf_origem,
    origem.nm_municipio as nm_municipio_origem,
    origem.cd_longitude as cd_longitude_origem,
    origem.cd_latitude as cd_latitude_origem,
    destino.nm_uf as nm_uf_destino,
    destino.nm_municipio as nm_municipio_destino,
    destino.cd_longitude as cd_longitude_destino,
    destino.cd_latitude as cd_latitude_destino,
    cm.raio
FROM
    carona_motorista as cm
INNER JOIN
    endereco as origem on cm.endereco_origem_id = origem.id_endereco
INNER JOIN
    endereco as destino on cm.endereco_destino_id = destino.id_endereco
INNER JOIN
    motorista as m on cm.motorista_id = m.id_motorista
WHERE
    cm.status_id = 4
    AND NOT EXISTS(
        SELECT 
            COUNT(v.caroneiro_id),
            v.carona_motorista_id
        FROM 
            viagem AS v 
        WHERE
            v.carona_motorista_id = cm.id_carona_motorista
        GROUP BY
            v.carona_motorista_id
        HAVING
            COUNT(v.caroneiro_id) >= cm.qtd_max_passageiro
    )


SELECT
    cc.id_carona_caroneiro,
    origem.nm_municipio as nm_municipio_origem,
    origem.nm_uf as nm_uf_origem,
    origem.cd_longitude as cd_longitude_origem,
    destino.nm_municipio as nm_municipio_destino,
    destino.nm_uf as nm_uf_destino,
    destino.cd_longitude as cd_longitude_destino,
    destino.cd_latitude as cd_latitude_destino
FROM
    carona_caroneiro as cc
INNER JOIN
    endereco as origem on cc.endereco_origem_id = origem.id_endereco
INNER JOIN
    endereco as destino on cc.endereco_destino_id = destino.id_endereco
WHERE
    cc.id_carona_caroneiro = 1
    AND cc.id_status = 1


SELECT
    cm.id_carona_motorista,
    cm.motorista_id,
    m.nm_motorista,
    m.nm_carro,
    origem.nm_uf as nm_uf_origem,
    origem.nm_municipio as nm_municipio_origem,
    origem.cd_longitude as cd_longitude_origem,
    origem.cd_latitude as cd_latitude_origem,
    destino.nm_uf as nm_uf_destino,
    destino.nm_municipio as nm_municipio_destino,
    destino.cd_longitude as cd_longitude_destino,
    destino.cd_latitude as cd_latitude_destino,
    cm.raio
FROM
    carona_motorista as cm
INNER JOIN
    endereco as origem on cm.endereco_origem_id = origem.id_endereco
INNER JOIN
    endereco as destino on cm.endereco_destino_id = destino.id_endereco
INNER JOIN
    motorista as m on cm.motorista_id = m.id_motorista
WHERE
    cm.status_id = 4
    AND NOT EXISTS(
        SELECT 
            COUNT(v.caroneiro_id),
            v.carona_motorista_id
        FROM 
            viagem AS v 
        WHERE
            v.carona_motorista_id = cm.id_carona_motorista
        GROUP BY
            v.carona_motorista_id
        HAVING
            COUNT(v.caroneiro_id) >= cm.qtd_max_passageiro
    )
    AND NOT EXISTS(
        SELECT 
            1
        FROM 
            viagem AS v 
        WHERE
            v.carona_motorista_id = cm.id_carona_motorista
            AND v.status_id <> 4
    )


SELECT
    sol.id_solicitacao,
    c.id_caroneiro,
    c.nm_caroneiro,
    origem.nm_uf as nm_uf_origem,
    origem.nm_municipio as nm_municipio_origem,
    destino.nm_uf as nm_uf_destino,
    destino.nm_municipio as nm_municipio_destino
FROM
    solicitacao as sol
INNER JOIN
    carona_caroneiro as cc on sol.carona_caroneiro_id = cc.id_carona_caroneiro
INNER JOIN
    caroneiro as c on cc.caroneiro_id = c.id_caroneiro
INNER JOIN
    endereco as origem on cc.endereco_origem_id = origem.id_endereco
INNER JOIN
    endereco as destino on cc.endereco_destino_id = destino.id_endereco
WHERE
    sol.status_id = 6


SELECT
    *
FROM
    solicitacao as sol
INNER JOIN
    carona_caroneiro as cc on sol.carona_caroneiro_id = cc.id_carona_caroneiro
WHERE
    sol.id_solicitacao = 

caroneiro_id | carona_motorista_id | status_id

SELECT
    sol.id_solicitacao,
    sol.carona_motorista_id,
    sol.carona_caroneiro_id,
    cc.caroneiro_id,
    cm.motorista_id,
    cm.qtd_max_passageiro
FROM
    solicitacao as sol
INNER JOIN
    carona_caroneiro as cc on sol.carona_caroneiro_id = cc.id_carona_caroneiro
INNER JOIN  
    carona_motorista as cm on cm.id_carona_motorista = sol.carona_motorista_id
WHERE
    sol.id_solicitacao = 1


SELECT
   COUNT(1) as qtd_viagem
FROM
    viagem as v
WHERE
    v.carona_motorista_id = 1


SELECT 
    sol.id_solicitacao,
    m.nm_motorista,
    s.nm_status
FROM
    solicitacao as sol
INNER JOIN
    status as s on s.id_status = sol.status_id
INNER JOIN
    carona_motorista as cm on cm.id_carona_motorista = sol.carona_motorista_id
INNER JOIN
    motorista as m on m.id_motorista = cm.motorista_id
WHERE
    sol.id_solicitacao = 2