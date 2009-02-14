
use rowz;

create table rowz_groups(
 gid varchar(50) primary key,
 groupname varchar(50),
 admin_name varchar(50));

create table rowz_users (
  uid varchar(50) primary key,
  name varchar(50),
  password varchar(100),
  gid varchar(50));

drop table rowz_store;
create table rowz_store (
 sid int primary key AUTO_INCREMENT ,
 user_id varchar(50),
 entry_date DATETIME,
 title text,
 data TEXT,
 q_type int);

drop table rowz_annotations;
create table rowz_annotations (
  data TEXT,
  user_id varchar(50),
  entry_date DATETIME,
  store_id int);

create table queries(
 query TEXT,
 entry_date DATETIME,
 uid varchar(50)
);  




