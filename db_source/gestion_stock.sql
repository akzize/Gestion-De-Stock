SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `Categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
);

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Electronics'),
(2, 'Clothing'),
(3, 'Home Appliances');

CREATE TABLE `Products` (
  `ProductID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Price` decimal(10,2) DEFAULT NULL,
  `CategoryID` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
);



INSERT INTO `Products` (`ProductID`, `Name`, `Description`, `Price`, `CategoryID`, `image`) VALUES
(1, 'Smartphone', 'High-end smartphone with great features', 599.99, 1, 'product1.jpg'),
(2, 'LED TV', '55-inch LED TV with 4K resolution', 799.99, 1, 'product2.jpg'),
(3, 'T-shirt', 'Cotton T-shirt, white, size M', 19.99, 2, 'product3.jpg'),
(4, 'Refrigerator', 'Energy-efficient refrigerator', 899.99, 3, 'product4.jpg');



CREATE TABLE `Roles` (
  `RoleID` int NOT NULL,
  `RoleName` varchar(255) DEFAULT NULL
);



INSERT INTO `Roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Employee');



CREATE TABLE `Stock` (
  `StockID` int NOT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `StockStatus` varchar(50) DEFAULT NULL
);


CREATE TABLE `Users` (
  `UserID` int NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `RoleID` int DEFAULT NULL
);



INSERT INTO `Users` (`UserID`, `Username`, `Password`, `RoleID`) VALUES
(1, 'Ahmed', 'password123', 1),
(2, 'Layla', 'securepass', 2),
(3, 'Khaled', 'strongpwd', 3),
(4, 'Noura', 'mysecretpw', 3);


ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryID`);


ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);


ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleID`);


ALTER TABLE `Stock`
  ADD PRIMARY KEY (`StockID`);


ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);


ALTER TABLE `Users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `Products`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`);


ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `Roles` (`RoleID`);
COMMIT;