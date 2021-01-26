drop table books;
CREATE table books(
id int(11)PRIMARY KEY AUTO_INCREMENT,
    name varchar(100)not null,
    authors varchar(100)not null,
    edition varchar(100)not null,
    status varchar(30)not null,
    quantity int(100)not null,
    type varchar(30)not null,
    pdf_file varchar(30)not null
)

drop table issue_book;
CREATE table issue_book(
id int(11)PRIMARY KEY AUTO_INCREMENT,
    name varchar(100)not null,
    id_number int(100)not null,
    b_name varchar(100)not null,
    status varchar(30)not null,
    issue_date varchar(100)not null,
    return_date varchar(100)not null,
)

drop table if exists users;
CREATE table users
(
user_id int(11)PRIMARY KEY AUTO_INCREMENT,
   first_name varchar(100)not null,
    last_name varchar(100)not null,
    gender varchar(5)not null,
    dor varchar(10)not null,
    email varchar(100)not null,
    phone int(15)not null,
    username varchar(100)not null,
    password varchar(30)not null
)
