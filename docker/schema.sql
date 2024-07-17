use hakenhero;
create table task (
  id int not null primary key AUTO_INCREMENT,
  description varchar(255) not null,
  is_done boolean default false
);