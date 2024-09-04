create database FakeMeatCompany;

create table TApplyWork(
	id			integer not null,
	fname		varchar(12),
	lname		varchar(12),
	bdate		date,
	tel			varchar(10),
	branchno	integer not null,
	awdate		date,
	deptno		integer not null,
	constraint PK_TApplyWork primary key(id)
);

create table TBranch(
	branchno	integer not null,
	branch		varchar(12),
	bloc		varchar(12),
	constraint PK_TBranch primary key(branchno)
);

create table TDept(
	deptno		integer not null,
	dname		varchar(12),
	constraint PK_TDept primary key(deptno)
);

create table TrelationBD(
	branchno	integer not null,
	deptno		integer not null,
	constraint PK_TrelationBD primary key(branchno, deptno)
);

alter table TApplyWork
	add constraint FK_AWork_Branch foreign key(branchno)
	references TBranch(branchno);
alter table TApplyWork
	add constraint FK_AWork_Dept foreign key(deptno)
	references TDept(deptno);

alter table TrelationBD
	add constraint FK_Tre1 foreign key(branchno)
	references TBranch(branchno);
alter table TrelationBD
	add constraint FK_Tre2 foreign key(deptno)
	references TDept(deptno);

insert into TBranch values(1, 'B1', 'Koh Samui');
insert into TBranch values(2, 'B2', 'Kanchanaburi');
insert into TBranch values(3, 'B3', 'Chumphon');
select * from TBranch;

insert into TDept values(1, 'Accounting');
insert into TDept values(2, 'Kitchen');
insert into TDept values(3, 'Cleaning');
insert into TDept values(4, 'Maketing');
insert into TDept values(5, 'Operation');
insert into TDept values(6, 'Sales');
select * from TDept;

--delete from TDept where deptno = 6;