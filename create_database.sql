create database if not exists tribalexotic;
use tribalexotic;

create table if not exists users (
userID int not null auto_increment,
userName varchar(100) not null,
fName varchar(40),
lName varchar(40),
password varchar(200) not null,
email varchar(200) not null,
primary key(userID));

create table if not exists persons (
personID int not null auto_increment,
fName varchar(40),
lName varchar(40),
email varchar(100) not null,
phoneNo varchar(40),
title varchar(100),
primary key(personID));

create table if not exists contacts (
contactID int not null auto_increment,
personID int,
primary key (contactID),
foreign key (personID) references persons(personID) on delete cascade);

create table if not exists leads (
leadID int not null auto_increment,
personID int,
leadSource varchar(100),
status varchar(40),
primary key (leadID),
foreign key (personID) references persons(personID) on delete set null);

create table if not exists deals (
dealID int not null auto_increment,
dealName varchar(40) not null,
amount decimal(50, 2),
date date,
contactID int,
description varchar(300),
closingDate date,
primary key(dealID),
foreign key(contactID) references contacts(contactID) on delete set null);

create table if not exists messages (
messageID int not null auto_increment,
message longtext,
reply longtext,
personID int,
primary key(messageID),
foreign key(personID) references persons(personID) on delete cascade);
