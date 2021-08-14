create database web_arbol;
use web_arbol;

create table tab_marcas
(
	id_marca int,
	nombre_marca varchar(30) not null,
	info_marca text not null,
	img_marca varchar(30) not null
);
