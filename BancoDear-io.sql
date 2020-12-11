create database deario;

use deario;

create table Users (
	id_user int not null AUTO_INCREMENT primary key,
	email varchar(40) not null,
	user_password varchar(25) not null
)engine=innodb;

create table Notes (
	id_note int not null AUTO_INCREMENT primary key,
	title varchar(50),
	content varchar(900) not null,
	id_user int not null,
	note_date datetime not null	
)engine=innodb;

alter table Notes
add constraint fk_users_notes
foreign key (id_user)
references Users (id_user)
on delete cascade;