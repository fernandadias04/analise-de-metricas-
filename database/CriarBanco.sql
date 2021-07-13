create table clientes (
    nome varchar(100) not null,
    id int unsigned auto_increment PRIMARY KEY
);

create table anuncios (
    nome varchar(100) not null,
    data_inicio date not null,
    data_final date not null,
    valor_investido float not null,
    id int unsigned auto_increment PRIMARY KEY,
    cliente_id int unsigned 
);