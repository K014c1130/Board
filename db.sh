#!/bin/sh

#削除
mysql -uroot  -e "drop database board;"

#作成
mysql -uroot  -e "create database board character set utf8;"





#list作成j
mysql -uroot board -e "create table userlist(id MEDIUMINT NOT NULL AUTO_INCREMENT
, name varchar(256) NOT NULL,massage varchar(256),pass varchar(256) NOT NULL, ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  dt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (id));"


mysql -uroot board -e "create table messagelist(id MEDIUMINT NOT NULL AUTO_INCREMENT
, name varchar(256) NOT NULL,massage varchar(256), ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  dt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (id));"
