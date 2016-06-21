create database learnci;
use learnci;

create table player(
	id int not null auto_increment,
    name varchar (50),
    type varchar (50),
    gwon int,
    
    constraint pk_id_player primary key (id)
);

select * from player;