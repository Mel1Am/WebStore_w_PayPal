describe Photos;
describe Client;
describe Addresses;

SELECT * from Client;
SELECT * FROM Addresses;
SELECT * FROM Photos;

DELETE FROM Client WHERE ID in(1,2,3,4,5,6,7,8);

ALTER table Client auto_increment=1;

TRUNCATE table Client;
TRUNCATE table Addresses; 

ALTER Table Client modify PNumber varchar(15) NULL;
ALTER Table Client modify Address varchar(80) NULL;
ALTER Table Client modify Email varchar(80) NULL;
ALTER Table Addresses modify ZipCode varchar(10) NULL;
ALTER Table Addresses modify Country varchar(10) NULL;

CREATE table Addresses (
ClientID int(10) NOT NULL Auto_increment,
Street varchar(20) NULL,
ZipCode int(10) default 1234,
State varchar(15) NULL,
Country varchar(10) default 'USA',
Foreign Key (ClientID) references client(ID)
);

ALTER table Photos add Title varchar(30) NULL Default 'Anonymus';


INSERT into	Photos values('1','300','202007','320','240','1');
UPDATE Photos set Title = 'Dawn of The Opera' WHERE ID = 1;
UPDATE Photos set Title = 'Into The Wild' WHERE ID = 2;
UPDATE Photos set Title = 'Last One Standing' WHERE ID = 3;
INSERT into	Photos values('2','200','202107','320','240','5');
INSERT into	Photos values('3','100','202207','320','240','2');

SELECT * FROM Photos;

SELECT * FROM Photos ORDER BY ID ASC;
SELECT * FROM Photos ORDER BY ID ASC;




