/*Drop table staff;
Drop table customer;
Drop table customerselect;
Drop table ITEM_OPTION;
Drop table item;
Drop table orderinfo;*/

CREATE TABLE STAFF (
StaffID INTEGER NOT NULL Primary KEY AUTO_INCREMENT,
FirstName VarChar(15) NOT NULL,
LastName VarChar(10) NOT NULL,
Username VarChar(10) NOT NULL,
UserPassword VarChar(10) NOT NULL
);

CREATE TABLE CUSTOMER (
CustomerID INTEGER NOT NULL Primary KEY AUTO_INCREMENT,
FirstName VarChar(10) NOT NULL,
LastName VarChar(10) NOT NULL,
Username VarChar(10) NOT NULL,
UserPassword VarChar(10) NOT NULL
);

CREATE TABLE ORDERINFO (
OrderID INTEGER NOT NULL Primary KEY AUTO_INCREMENT,
CustomerID VarChar(10) NOT NULL,
Price_Money decimal(5,2)
);

CREATE TABLE ITEM (
ItemID INTEGER NOT NULL Primary KEY AUTO_INCREMENT,
Item_Name VarChar(20),
Price_Money decimal(5,2),
Photo blob
);

insert into ITEM (ITEM_Name, Price_Money, Photo) VALUES ("Hamburger", 5.25, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJQkCY4Z9s2sqzQRoPCq72k_43YmvtOldBnw&usqp=CAU');
insert into ITEM (ITEM_Name, Price_Money, Photo) VALUES ("French Fries", 2.45, 'data:image/jpeg;base64,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');
insert into ITEM (ITEM_Name, Price_Money, Photo) VALUES ("Chicken Nuggets", 3.15 ,'https://upload.wikimedia.org/wikipedia/commons/6/64/Chicken_Nuggets.jpg');

CREATE TABLE ITEM_OPTION(
ItemID INTEGER NOT NULL Primary KEY AUTO_INCREMENT,
OptionID int NOT NULL,
Option_Name VarChar(10) NOT NULL,
Price_Money decimal(5,2),
FOREIGN KEY (ItemID) REFERENCES ITEM(ItemID)
);

CREATE TABLE CUSTOMERSELECT (
OrderID int NOT NULL,
ItemID int NOT NULL,
OptionID int NULL,
ItemQuantity int NOT NULL
);