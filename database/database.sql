Drop table IF EXISTS `events`;
Drop table IF EXISTS `status`;
Drop table IF EXISTS `services`;
Drop table IF EXISTS `closed_days`;
Drop table IF EXISTS `contacts`;
Drop table IF EXISTS `users`;

create table `users`(
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `nick` VARCHAR(16) NOT NULL unique,
    `email` VARCHAR(50) NOT NULL unique,
    `cpf` CHAR(14) NOT NULL unique,
    `password` VARCHAR(64) NOT NULL,
    `is_admin` boolean default FALSE,
    `created_at` timestamp default CURRENT_TIMESTAMP,
    `updated_at` timestamp default CURRENT_TIMESTAMP,

    primary key(id)
);

INSERT INTO `users` (`name`, `nick`, `cpf`, `email`, `password`, `is_admin`) VALUES 
('Maria', 'Mariazinha', '000.000.000-01','maria@maria.com', '$2y$10$wCZUom//y63jA9hF0aUBEeOAYwP/LqSgFGgmI3d7vV/.kpmbKWjmS', FALSE),
('Joao', 'Joaozinho', '000.000.000-02','joao@joao.com', '$2y$10$wCZUom//y63jA9hF0aUBEeOAYwP/LqSgFGgmI3d7vV/.kpmbKWjmS', FALSE),
('souadmin', 'Admin', '000.000.000-03', 'souadmin@souadmin.com', '$2y$10$wCZUom//y63jA9hF0aUBEeOAYwP/LqSgFGgmI3d7vV/.kpmbKWjmS', TRUE);

CREATE TABLE `contacts`(
    `id` INTEGER AUTO_INCREMENT,        
    `name` VARCHAR(100) NOT NULL,             
    `email` VARCHAR(50) NOT NULL,       
    `text_email` VARCHAR(1000) NOT NULL,
    `status` CHARACTER(1) DEFAULT '0',    
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY(id)
);

create table `services`(
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(20)  NOT NULL UNIQUE,
    `price` float(6,2) NOT NULL,

    primary key(id)
);

insert into `services`(name, price) VALUES('Maquina', 8.00),('Tesouta', 12.00),('Maquina/Tesoura', 10.00),('Barba', 10.00);

create table `status`(
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(20) NOT NULL UNIQUE,

    primary key(id)
);

-- colocar uma cor pra cada status e preencher tabela event com essas cores dinamicamente

insert into `status`(name) VALUES('marcado'),('atendido'),('cancelado');

create table `closed_days`(     
    `id` INTEGER AUTO_INCREMENT,
    `date` DATE NOT NULL UNIQUE,         
    `created_at` timestamp default CURRENT_TIMESTAMP,
    `updated_at` timestamp default CURRENT_TIMESTAMP,

    primary key(id)
);

create table `events`(
    `id` INTEGER AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `status_id` INTEGER NOT NULL,
    `service_id` INTEGER NOT NULL,
    `start` DATETIME NOT NULL unique,
    `end` DATETIME NOT NULL unique,
    `color` varchar(20) NOT NULL,
    `textColor` varchar(20) NOT NULL,
    `title` varchar(20) NOT NULL,
    `created_at` timestamp default CURRENT_TIMESTAMP,
    `updated_at` timestamp default CURRENT_TIMESTAMP,

    primary key(id)
);

alter TABLE events ADD foreign key (user_id) references users(id) on delete cascade on update cascade;
alter TABLE events ADD foreign key (status_id) references status(id);
alter TABLE events ADD foreign key (service_id) references services(id);

INSERT INTO `events` (`user_id`, `status_id`,`service_id`, `start`, `end`,`color`, `textColor`, `title`) VALUES 

('2','1','1','2022-04-10T07:00:00', '2022-03-24T07:30:00','blue', 'white', 'Maria corte'),
('2','1','1','2022-04-10T07:30:00', '2022-03-24T08:00:00','blue', 'white', 'Maria corte'),
('1','2','1','2022-04-11T08:00:00', '2022-03-24T08:30:00','green', 'white', 'João corte'),
('1','1','3','2022-04-10T08:30:00', '2022-03-24T09:00:00','red', 'white', 'Maria corte/barba');
