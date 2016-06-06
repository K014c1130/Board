#!/bin/sh

#削除
mysql -uroot -proot -e "drop database board;"

#作成
mysql -uroot -proot -e "create database board character set utf8;"

#list作成
mysql -uroot -proot -e "create table list(id MEDIUMINT NOT NULL AUTO_INCREMENT
, item varchar(256), PRIMARY KEY (id))"

mysql -uroot -proot -e "select current_timestamp board;"
