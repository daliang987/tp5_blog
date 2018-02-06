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


create table blog_webset(
    webset_id int unsigned auto_increment primary key,
    webset_name varchar(45) not null default '',
    webset_value varchar(45) not null default '',
    webset_desc varchar(45) not null default ''
);


create table blog_comment(
    comment_id int unsigned auto_increment primary key,
    comment_nickname varchar(30) not null default '',
    comment_email varchar(45),
    comment_url varchar(100),
    comment_content varchar(150) not null default '',
    create_time int unsigned not null default 0,
    arc_id int unsigned not null default 0
);

INSERT INTO `blog_webset` (`webset_id`, `webset_name`, `webset_value`, `webset_desc`) VALUES
(1, 'email', 'daliang987@126.com', '网站邮箱'),
(2, 'person_desc', '白帽子，普通安全爱好者一名，工作为与安全相关，多次接触政府网站安全相关问题，热爱技术<br>', '个人简介'),
(4, 'copyright', 'Copyright © 2018 Powered by Daliang''s Blog', '版权信息'),
(5, 'weibo', 'https://weibo.com/u/1780197770/home?wvr=5&lf=', ''),
(6, 'blog_title', 'Daliang''s Blog', '博客标题');