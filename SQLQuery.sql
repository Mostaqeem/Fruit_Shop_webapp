create database shop
use shop


-- Create Customer Table
CREATE TABLE Customer (
    CustomerID INT IDENTITY(1,1) PRIMARY KEY, -- Primary key for Customer table
    name NVARCHAR(100) NOT NULL,
    address NVARCHAR(255) NOT NULL,
    phoneNumber NVARCHAR(15) NOT NULL,
    email NVARCHAR(100) UNIQUE NOT NULL,
    exposure BIT NOT NULL
);




CREATE TABLE products (
    ProductId INT PRIMARY KEY IDENTITY(1,1),
    Name NVARCHAR(100) NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    StockQuantity INT NOT NULL,
    ReorderLevel INT NOT NULL
);-- Insert dummy data
INSERT INTO products (Name, Price, StockQuantity, ReorderLevel)
VALUES ('Apple', 1.99, 100, 30),
       ('Banana', 0.59, 150, 40);
select* from customers


 CREATE TABLE Orders (
    OrderId INT PRIMARY KEY IDENTITY(1,1),
    orderdate DATE,
    CustomerID INT,
    CustomerName VARCHAR(255),
    BillingAddress TEXT
);ALTER TABLE orders
ADD CONSTRAINT fk_customers FOREIGN KEY (CustomerId) REFERENCES Customer(CustomerID);

-- Create UserLogin Table
CREATE TABLE UserLogin (
    LoginID INT IDENTITY(1,1) PRIMARY KEY, -- Primary key for UserLogin table
    CustomerID INT NOT NULL, -- Foreign key linking to Customer table
    Username NVARCHAR(50) UNIQUE NOT NULL,
    Password NVARCHAR(255) NOT NULL, -- Store hashed passwords for security
    CONSTRAINT FK_UserLogin_Customer FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE CASCADE
);





-- Insert into Customer and retrieve the generated CustomerID
DECLARE @CustomerID INT;

INSERT INTO Customer (Name, Address, PhoneNumber, Email, Exposure)
VALUES ('John Doe', '123 Elm Street', '123-456-7890', 'johndoe@example.com', 0);

SET @CustomerID = SCOPE_IDENTITY();

-- Use the generated CustomerID to insert into UserLogin
INSERT INTO UserLogin (CustomerID, Username, Password)
VALUES (@CustomerID, 'johndoe',  'password123');


select* from userlogin
-- drop table UserLogin
-- drop table customer orders