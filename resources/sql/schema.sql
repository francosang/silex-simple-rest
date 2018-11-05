CREATE TABLE users (
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    email VARCHAR (64) not null UNIQUE,
    pass VARCHAR(265) not null
);


CREATE TABLE notes (
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64),
    content VARCHAR(2048),
    id_user INTEGER not null,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

insert into users (name, email, pass) values('Franco', 'franconecat@gmail.com', '123');

insert into notes (name, content, id_user) values('one', 'content', (select id from users where email like 'franconecat@gmail.com'));


