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
);


create table blog_tag(
    tag_id int unsigned auto_increment primary key,
    tag_name varchar(50) not null default ''
);


create table blog_article(
    arc_id int unsigned auto_increment primary key,
    arc_title varchar(45) not null default '',
    arc_author varchar(45) not null default '',
    arc_sort int unsigned not null default 100,
    arc_digist varchar(200) not null default '',
    arc_content text,
    sendtime int not null default 0,
    updatetime int not null default 0,
    arc_click int not null default 0,
    is_recycle tinyint not null default 2,
    arc_thumb varchar(100),
    cate_id int,
    admin_id int
);

create table blog_arc_tag(
    arc_id int not null,
    tag_id int not null
);


create table blog_link(
    link_id int unsigned auto_increment primary key,
    link_name varchar(30) not null default '',
    link_url varchar(255) not null default '',
    link_sort int unsigned not null default 10
);