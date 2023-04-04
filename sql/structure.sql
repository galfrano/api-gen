create table users(
  first_name varchar(255) not null,
  last_name varchar(255) null,
  email varchar(255) not null,
  `password` varchar(255) not null,
  _id int(8)  not null auto_increment,
  primary key (_id)
) engine=innodb default charset=utf8;


create table classes(
  classname varchar(255) not null,
  description text not null,
  location varchar(255) null,
  `date` timestamp not null,
  no_of_places int(3) not null,
  created_by int(8) not null,
  foreign key(created_by) references users(_id) on delete restrict,
  created_date timestamp not null default current_timestamp,
  _id int(8)  not null auto_increment,
  primary key (_id)
) engine=innodb default charset=utf8;

create table attendees(
  attendee int(8) not null,
  foreign key(attendee) references users(_id),
  class int(8) not null,
  foreign key(class) references classes(_id) on delete restrict,
  _id int(8)  not null auto_increment,
  primary key (_id)
) engine=innodb default charset=utf8;
