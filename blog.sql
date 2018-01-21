create database blog;
create table blog_admin(
    admin_id int auto_increment primary key,
    admin_username varchar(45) not null,
    admin_password varchar(32) not null
);


insert into blog_admin(admin_username,admin_password) values('admin',md5('admin123')); 


create table blog_cate(
    cate_id int unsigned auto_increment primary key,
    cate_name varchar(45) not null default '',
    cate_pid int not null default 0,
    cate_sort int not null default 100
)


create table blog_tag(
    tag_id int unsigned auto_increment primary key,
    tag_name varchar(50) not null default ''
)