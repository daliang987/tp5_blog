create database blog;
create table blog_admin(
    admin_id int auto_increment primary key,
    admin_username varchar(45) not null,
    admin_password varchar(32) not null
);


insert into blog_admin(admin_username,admin_password) values('admin',md5('admin123')); 