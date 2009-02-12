
use rowz;

create table rowz_groups(gid varchar(50) primary key,groupname varchar(50),admin_name varchar(50));

create table rowz_users (uid varchar(50) primary key,name varchar(50),password varchar(100),gid varchar(50));

create table rowz_store (sid int primary key AUTO_INCREMENT ,user_id varchar(50),entry_date DATETIME,Data TEXT,q_type int);

create table rowz_annotations (data TEXT,date DATETIME,store_id int);



