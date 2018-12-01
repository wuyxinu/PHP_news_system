use news;
create table category(
	category_id int auto_increment primary key,
	name char(20) not null
);

create table users(
	user_id int auto_increment primary key,
	name char(20) not null,
	password char(32)
);

create table news(
	news_id int auto_increment primary key,
	user_id int,
	category_id int,
	title char(100) not null,
	content text,
	publish_time datetime,
	clicked int,
	attachment char(100),
	constraint FK_news_user foreign key (user_id) references users(user_id),
	constraint FK_news_category foreign key (category_id) references category(category_id)
);

create table review(
	review_id int auto_increment primary key,
	news_id int,
	content text,
	publish_time datetime,
	state char(10),
	ip char(15),
	constraint FK_review_news foreign key (news_id) references news(news_id)
);