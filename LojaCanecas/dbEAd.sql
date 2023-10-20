CREATE DATABASE db_EAD
default character set utf8
default collate utf8_general_ci;

use db_EAD;

CREATE TABLE tbCategorias (
	CodCategoria int PRIMARY KEY auto_increment,
    DescCategoria varchar(25) not null
)
default charset utf8;

CREATE TABLE tbFornecedor (
	CodFornecedor int PRIMARY KEY auto_increment,
    Nome varchar(50) not null
)
default charset utf8;

CREATE TABLE tbCaneca (
	CodCaneca int PRIMARY KEY auto_increment,
    DescCaneca text,
    ImageCaneca varchar(255) not null,
    CodCategoria int not null,
    CodFornecedor int not null,
    Capacidade decimal(3,0) not null,
    QtdEstoque int not null,
    Preco decimal (6,2),
    SgLancamento enum('S','N') not null,
    CONSTRAINT fk_cat FOREIGN KEY (CodCategoria) REFERENCES tbCategorias (CodCategoria),
    CONSTRAINT fk_Fornecedor FOREIGN KEY (CodFornecedor) REFERENCES tbFornecedor (CodFornecedor)
)
default charset utf8;

INSERT INTO tbCategorias VALUES
(default, 'Geek'),
(default, 'Frases'),
(default, 'Fofinhas'),
(default, 'Cores solidas'),
(default, 'Outros produtos');

INSERT INTO tbFornecedor VALUES
(default, 'ToyShow'),
(default, 'StartGeek'),
(default, 'Amazon'),
(default, 'Legião Nerd'),
(default, 'N COISAS'),
(default, 'Geek10'),
(default, 'Zazzle'),
(default, 'IKEA'),
(default, 'Zonacriativa'),
(default, 'LeroyMerlin');

INSERT INTO tbCaneca VALUES
(default, 'Caneca 3D DK: Donkey Kong Super Nintendo - M: Metal e Resina', 'Caneca_3D_DK.jpg', 1, 1, 300, 15, 79.00, 'N'),
(default, 'Caneca Jake - Hora Da Aventura - M: Pocelana', 'Caneca_Jake.jpg', 1, 2, 330, 15, 45.90, 'N'),
(default, 'Caneca Lgbt Frase Levanta Gay Bora Trabalhar - M: Porcelana', 'Caneca_LGBT.jpg', 2, 3, 325, 10, 29.90, 'N'),
(default, 'Caneca Mulherão da porra - M: Ceramica/Porcelana', 'Caneca_Mulherao.jpg', 2, 4, 325, 10, 49.90, 'N'),
(default, 'CANECA GIRASSOL letras do Alfabeto - M: Porcelana', 'Caneca_Girassol.jpg', 3, 5, 300, 15, 35.90, 'N'),
(default, 'Caneca quadrada star com sono - M: Cerâmica', 'Caneca_Star_com_sono.jpg', 3, 6, 200, 10, 49.90, 'N'),
(default, 'Caneca De Café Vidro Jateado Azul (Crayola) (cor sólida) - M: Vidro Fosco', 'Caneca_Vidro_Azul.jpg', 4, 7, 300, 10, 142.00, 'N'),
(default, 'VÄRDERA Branca - M: Porcelana feldspática', 'VÄRDERA_Branca.jpg', 4, 8, 300, 10, 13.45, 'N'),
(default, 'Caneca com infusor snoopy bloom - M.Caneca: Cerâmica - M.Boneco: Silicone', 'CANECA_COM_INFUSOR_SNOOPY.jpg', 5, 9, 350, 5, 74.90, 'S'),
(default, 'Caneca De Vidro Caveira Preta', 'Caneca_De_Vidro_Caveira_Preta.jpg', 5, 10, 500, 5, 30.00, 'N');

INSERT INTO tbCaneca VALUES
(default, 'Caneca Pernalonga - "Sabe Onde Eu Tô? Tô nem aí!" - Looney Tunes - M:Porcelana', 'Caneca_Pernalonga.jpg', 1, 2, 330, 0, 45.90, 'S'),
(default, 'Caneca Cuida Da Sua Vida - M:Cerâmica/Porcelana', 'Caneca_CuidaDaSuaVida.jpg', 2, 4, 325, 0, 49.90, 'N'),
(default, 'Caneca Já disse que te amo hoje? - M:Cerâmica/Porcelana', 'Caneca_TeAmo.jpg', 3, 4, 325, 1, 49.90, 'S'),
(default, 'Caneca The Mônia - M:Cerâmica/Porcelana', 'Caneca_themonia.jpg', 2, 4, 325, 0, 49.90, 'S'),
(default, 'Dinera, Caneca cinza - M: Grés, Vidrado colorido', 'Dinera_Canecacinza.jpg', 4, 8, 300, 0, 29.99, 'S');

select * from tbCaneca;
select count(*) from tbCaneca;

create view vwCaneca
as select
tbCaneca.CodCaneca,
tbCaneca.DescCaneca,
tbCaneca.ImageCaneca,
tbCategorias.DescCategoria,
tbFornecedor.Nome,
tbCaneca.Capacidade,
tbCaneca.QtdEstoque,
tbCaneca.Preco,
tbCaneca.SgLancamento
from tbCaneca inner join tbFornecedor
	on tbCaneca.CodFornecedor = tbFornecedor.CodFornecedor
inner join tbCategorias
	on tbCaneca.CodCategoria = tbCategorias.CodCategoria;
    
select * from vwCaneca;

select DescCaneca, Preco, ImageCaneca from vwCaneca where DescCategoria = "Fofinhas";

CREATE TABLE tbUsuario (
	CodUsu int PRIMARY KEY auto_increment,
	NomeUsu varchar(80) not null,
	dsEmail varchar(80) not null,
	dsSenha varchar(6) not null,
    dsStatus boolean not null,
    dsEndereco varchar(80) not null,
    dsCidade varchar(30) not null,
    numCep char(9) not null
) default charset utf8;

INSERT INTO tbUsuario VALUES(default, 'Alexa Heatcliff', 'Heat@gmail.com', 'AlexaH', 1, 'Rua Serindó, 7', 'São Paulo', 01455040); 

INSERT INTO tbUsuario VALUES
(default, 'Daniel Biondi', 'DanB@gmail.com', 'DanB79', 0, 'Av. Dr. Marthin Luther King 980', 'Osasco', 05352020),
(default, 'Andrea Regina', 'AndreaRe@gmail.com', 'AndRe4', 0, 'Av. Hilario Pereira de Souza, 492', 'Osasco', 01455040); 

select * from vwCaneca where DescCaneca like '%Porcelana%';

select * from tbCaneca;
delete from tbCaneca where CodCaneca = 46;

select * from tbUsuario;
use db_ead;