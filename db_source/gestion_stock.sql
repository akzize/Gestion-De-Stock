
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

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Electronics'),
(2, 'Clothing'),
(3, 'Home Appliances');

-- --------------------------------------------------------

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductID`, `Name`, `Description`, `Price`, `CategoryID`, `image`) VALUES
(1, 'Smartphone', 'High-end smartphone with great features', 599.99, 1, 'product1.jpg'),
(2, 'LED TV', '55-inch LED TV with 4K resolution', 799.99, 1, 'product2.jpg'),
(3, 'T-shirt', 'Cotton T-shirt, white, size M', 19.99, 2, 'product3.jpg'),
(4, 'Refrigerator', 'Energy-efficient refrigerator', 899.99, 3, 'product4.jpg');

INSERT INTO `Roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Employee');


INSERT INTO `Users` (`UserID`, `Username`, `Password`, `RoleID`) VALUES
(1, 'Ahmed', 'password123', 1),
(2, 'Layla', 'securepass', 2),
(3, 'Khaled', 'strongpwd', 3),
(4, 'Noura', 'mysecretpw', 3);
