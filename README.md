# PseudoDBCreator

App para geração de script para criar banco de dados baseado em anotações de classe.

## Getting started

Baixe o projeto e altere as configurações no `index.php` que é o arquivo de exemplo.

Para criar novas classes, basta criar uma entidade na pasta `model/Entity/` e utilizar os modelos de Anotações como nas classes de exemplo. E realizar a chamada para gerar o script para a tabela no arquivo `index.php` .

Para quem já é familiarizado com JPA o modelo é similar =)


## Restultado produzido automaticamente pelo `index.php`

```
DROP TABLE IF EXISTS user; 
CREATE TABLE user ( 
	id serial NOT NULL, 
	nome character varying, 
	cpf character varying, 
	idade integer, 
	senha character varying, 
	perfil integer, 
	ativo character varying, 
	CONSTRAINT user_perfil_fk FOREIGN KEY(perfil)
		REFERENCES perfil(id) MATCH SIMPLE
		ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT user_pk PRIMARY KEY (id) 
 );

 -- 

DROP TABLE IF EXISTS perfil; 
CREATE TABLE perfil ( 
	id serial NOT NULL, 
	descricao character varying, 
	CONSTRAINT perfil_pk PRIMARY KEY (id) 
 );

 -- 
```
