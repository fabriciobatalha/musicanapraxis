///////////////////////////////////////////////////////////////

CREATE DATABASE painelmnp

///////////////////////////////////////////////////////////////

CREATE TABLE adm
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  nome VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(50) NOT NULL,
  
  PRIMARY KEY(id)
) ENGINE = InnoDB;

///////////////////////////////////////////////////////////////

INSERT INTO adm
(
  nome, email, senha
)
VALUES
(
  'Grupo FaroSys',
  'grupofarosys@gmail.com',
  'trescaras'
);

///////////////////////////////////////////////////////////////

CREATE TABLE artigos
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  artigo VARCHAR(100) NOT NULL,
  textoartigo TEXT NOT NULL,
  caminho_img VARCHAR(255) NOT NULL,
  topico_id INT NOT NULL,
  subtopico_id INT NOT NULL,
  data_cad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY(id)
);

CREATE TABLE topicos
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  topico VARCHAR(50) NOT NULL,
  data_cad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY(id)
);

CREATE TABLE subtopicos
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  subtopico VARCHAR(50) NOT NULL,
  topico_id INT NOT NULL,
  data_cad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY(id)
);

CREATE TABLE livros
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  livro VARCHAR(70) NOT NULL,
  link_livro VARCHAR(100) NOT NULL,
  nome_img VARCHAR(255) NOT NULL,
  textodescricao TEXT NOT NULL,
  data_cad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  
  PRIMARY KEY(id)
);

CREATE TABLE usuarios
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  nome VARCHAR(60) NOT NULL,
  sobrenome VARCHAR(60) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY(id)
);

CREATE TABLE forum
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  titulo VARCHAR(100) NOT NULL,
  textodescricao TEXT NOT NULL,
  id_usuario INT NOT NULL,
  data_cad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY(id)
);

CREATE TABLE comentarios
(
  id INTEGER AUTO_INCREMENT NOT NULL,
  comentario TEXT NOT NULL,
  id_usuario INT NOT NULL,
  id_artigo_forum INT NOT NULL,
  data_cad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY(id)
);


----------------------------------DEFAULT INSERTS-------------------------------------

 INSERT INTO topicos(topico) VALUES("Música e Marxismo");
 INSERT INTO topicos(topico) VALUES("Música Popular e Erudita");
 INSERT INTO topicos(topico) VALUES("Música na Amazônia");

 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Relações de Trabalho", 1);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Sindicalismo na Música", 1);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Séc XIX, XX, XXI", 2);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Paradigma Nacional-Republicano", 2);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Autonomia da Música e Cânone", 2);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Batuques Amazônicos", 3);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Carimbó, Lambada, Guitarrada e Beiradão", 3);
 INSERT INTO subtopicos(subtopico,topico_id) VALUES ("Música Indígena", 3);