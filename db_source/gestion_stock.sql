<<<<<<< HEAD
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `Categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
);
=======

--
-- Database: `gestion_stock`
--
-- Categories: table
CREATE TABLE `Categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT ;

-- Products: table
CREATE TABLE `Products` (
  `ProductID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Price` decimal(10,2) DEFAULT NULL,
  `CategoryID` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `CategoryID` (`CategoryID`) USING BTREE,
  CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT ;

-- No native definition for element: CategoryID (index)

-- Roles: table
CREATE TABLE `Roles` (
  `RoleID` int NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT ;

-- Stock: table
CREATE TABLE `Stock` (
  `StockID` int NOT NULL AUTO_INCREMENT,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `StockStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`StockID`)
) ENGINE=InnoDB DEFAULT ;

-- Users: table
CREATE TABLE `Users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `RoleID` int NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `RoleID` (`RoleID`) USING BTREE,
  CONSTRAINT `Users___fk__role` FOREIGN KEY (`RoleID`) REFERENCES `Roles` (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT ;

-- No native definition for element: RoleID (index)


-- --------------------------------------------------------

--
-- Dumping data for table `Categories`
--
>>>>>>> 4553769f1fa7178229cb50ad2d59f73f1872361b

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Electronics'),
(2, 'Clothing'),
(3, 'Home Appliances');

<<<<<<< HEAD
CREATE TABLE `Products` (
  `ProductID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Price` decimal(10,2) DEFAULT NULL,
  `CategoryID` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
);


=======
-- --------------------------------------------------------

--
-- Dumping data for table `Products`
--
>>>>>>> 4553769f1fa7178229cb50ad2d59f73f1872361b

INSERT INTO `Products` (`ProductID`, `Name`, `Description`, `Price`, `CategoryID`, `image`) VALUES
(1, 'Smartphone', 'High-end smartphone with great features', 599.99, 1, 'product1.jpg'),
(2, 'LED TV', '55-inch LED TV with 4K resolution', 799.99, 1, 'product2.jpg'),
(3, 'T-shirt', 'Cotton T-shirt, white, size M', 19.99, 2, 'product3.jpg'),
(4, 'Refrigerator', 'Energy-efficient refrigerator', 899.99, 3, 'product4.jpg');

<<<<<<< HEAD


CREATE TABLE `Roles` (
  `RoleID` int NOT NULL,
  `RoleName` varchar(255) DEFAULT NULL
);



=======
>>>>>>> 4553769f1fa7178229cb50ad2d59f73f1872361b
INSERT INTO `Roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Employee');

<<<<<<< HEAD


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


=======
>>>>>>> 4553769f1fa7178229cb50ad2d59f73f1872361b

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `RoleID`) VALUES
(1, 'Ahmed', 'password123', 1),
(2, 'Layla', 'securepass', 2),
(3, 'Khaled', 'strongpwd', 3),
(4, 'Noura', 'mysecretpw', 3);
<<<<<<< HEAD


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
=======
>>>>>>> 4553769f1fa7178229cb50ad2d59f73f1872361b
