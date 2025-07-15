-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2025 at 11:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `ID_Admin` int(11) NOT NULL,
  `Clave_Admin` varchar(200) NOT NULL,
  `ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`ID_Admin`, `Clave_Admin`, `ID_Persona`) VALUES
(2, '9d965b5cc033abbb85051a3672eabfbb', 1001327410);

-- --------------------------------------------------------

--
-- Table structure for table `Almacen`
--

CREATE TABLE `Almacen` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Cuenta`
--

CREATE TABLE `Cuenta` (
  `ID_Cuenta` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Tot_Cuenta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Empleado`
--

CREATE TABLE `Empleado` (
  `ID_Empleado` int(11) NOT NULL,
  `Clave_Empleado` varchar(200) NOT NULL,
  `ID_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `EstadoCuenta`
--

CREATE TABLE `EstadoCuenta` (
  `ID_Estado` int(11) NOT NULL,
  `Val_Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `EstadoProducto`
--

CREATE TABLE `EstadoProducto` (
  `ID_Estado` int(11) NOT NULL,
  `Val_Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Pago`
--

CREATE TABLE `Pago` (
  `ID_Pago` int(11) NOT NULL,
  `Fecha_Pago` date NOT NULL,
  `ID_Cuenta` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_TipoPago` int(11) NOT NULL,
  `ID_Empleado` int(11) NOT NULL,
  `Cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Pago_Producto`
--

CREATE TABLE `Pago_Producto` (
  `ID_Pago` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `Cant` int(11) NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Persona`
--

CREATE TABLE `Persona` (
  `ID_Persona` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `ID_Id` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Persona`
--

INSERT INTO `Persona` (`ID_Persona`, `Nombre`, `ID_Id`, `Correo`, `Telefono`, `Direccion`) VALUES
(1001327410, 'Jose Samir Gonzalez Ortiz', 1, 'josagoor@gmail.com', '3044113724', 'Cra 79F #38C 46Sur');

-- --------------------------------------------------------

--
-- Table structure for table `Photo`
--

CREATE TABLE `Photo` (
  `ID_Photo` int(11) NOT NULL,
  `ID_Persona` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `localizacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Producto`
--

CREATE TABLE `Producto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `ID_Tipo` int(11) NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TipoId`
--

CREATE TABLE `TipoId` (
  `ID_Id` int(11) NOT NULL,
  `Val_TipoId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TipoId`
--

INSERT INTO `TipoId` (`ID_Id`, `Val_TipoId`) VALUES
(1, 'C.C');

-- --------------------------------------------------------

--
-- Table structure for table `TipoPago`
--

CREATE TABLE `TipoPago` (
  `ID_Tipo` int(11) NOT NULL,
  `Val_Tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TipoProducto`
--

CREATE TABLE `TipoProducto` (
  `ID_Tipo` int(11) NOT NULL,
  `Valor_Tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`ID_Admin`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indexes for table `Almacen`
--
ALTER TABLE `Almacen`
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Estado` (`ID_Estado`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indexes for table `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD PRIMARY KEY (`ID_Cuenta`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Estado` (`ID_Estado`);

--
-- Indexes for table `Empleado`
--
ALTER TABLE `Empleado`
  ADD PRIMARY KEY (`ID_Empleado`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indexes for table `EstadoCuenta`
--
ALTER TABLE `EstadoCuenta`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indexes for table `EstadoProducto`
--
ALTER TABLE `EstadoProducto`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indexes for table `Pago`
--
ALTER TABLE `Pago`
  ADD PRIMARY KEY (`ID_Pago`),
  ADD KEY `ID_Cuenta` (`ID_Cuenta`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_TipoPago` (`ID_TipoPago`),
  ADD KEY `ID_Empleado` (`ID_Empleado`);

--
-- Indexes for table `Pago_Producto`
--
ALTER TABLE `Pago_Producto`
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Pago` (`ID_Pago`);

--
-- Indexes for table `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`ID_Persona`),
  ADD KEY `ID_Id` (`ID_Id`);

--
-- Indexes for table `Photo`
--
ALTER TABLE `Photo`
  ADD PRIMARY KEY (`ID_Photo`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indexes for table `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `ID_Tipo` (`ID_Tipo`);

--
-- Indexes for table `TipoId`
--
ALTER TABLE `TipoId`
  ADD PRIMARY KEY (`ID_Id`);

--
-- Indexes for table `TipoPago`
--
ALTER TABLE `TipoPago`
  ADD PRIMARY KEY (`ID_Tipo`);

--
-- Indexes for table `TipoProducto`
--
ALTER TABLE `TipoProducto`
  ADD PRIMARY KEY (`ID_Tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cuenta`
--
ALTER TABLE `Cuenta`
  MODIFY `ID_Cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Empleado`
--
ALTER TABLE `Empleado`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `EstadoCuenta`
--
ALTER TABLE `EstadoCuenta`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `EstadoProducto`
--
ALTER TABLE `EstadoProducto`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pago`
--
ALTER TABLE `Pago`
  MODIFY `ID_Pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Photo`
--
ALTER TABLE `Photo`
  MODIFY `ID_Photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Producto`
--
ALTER TABLE `Producto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TipoId`
--
ALTER TABLE `TipoId`
  MODIFY `ID_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `TipoPago`
--
ALTER TABLE `TipoPago`
  MODIFY `ID_Tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TipoProducto`
--
ALTER TABLE `TipoProducto`
  MODIFY `ID_Tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`ID_Persona`) REFERENCES `Persona` (`ID_Persona`);

--
-- Constraints for table `Almacen`
--
ALTER TABLE `Almacen`
  ADD CONSTRAINT `Almacen_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `Producto` (`ID_Producto`),
  ADD CONSTRAINT `Almacen_ibfk_2` FOREIGN KEY (`ID_Estado`) REFERENCES `EstadoProducto` (`ID_Estado`);

--
-- Constraints for table `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD CONSTRAINT `Cuenta_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `Cliente` (`ID_Cliente`),
  ADD CONSTRAINT `Cuenta_ibfk_2` FOREIGN KEY (`ID_Estado`) REFERENCES `EstadoCuenta` (`ID_Estado`);

--
-- Constraints for table `Empleado`
--
ALTER TABLE `Empleado`
  ADD CONSTRAINT `Empleado_ibfk_1` FOREIGN KEY (`ID_Persona`) REFERENCES `Persona` (`ID_Persona`);

--
-- Constraints for table `Pago`
--
ALTER TABLE `Pago`
  ADD CONSTRAINT `Pago_ibfk_1` FOREIGN KEY (`ID_Cuenta`) REFERENCES `Cuenta` (`ID_Cuenta`),
  ADD CONSTRAINT `Pago_ibfk_2` FOREIGN KEY (`ID_Cliente`) REFERENCES `Cliente` (`ID_Cliente`),
  ADD CONSTRAINT `Pago_ibfk_3` FOREIGN KEY (`ID_TipoPago`) REFERENCES `TipoPago` (`ID_Tipo`),
  ADD CONSTRAINT `Pago_ibfk_4` FOREIGN KEY (`ID_Empleado`) REFERENCES `Empleado` (`ID_Empleado`);

--
-- Constraints for table `Pago_Producto`
--
ALTER TABLE `Pago_Producto`
  ADD CONSTRAINT `Pago_Producto_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `Producto` (`ID_Producto`),
  ADD CONSTRAINT `Pago_Producto_ibfk_2` FOREIGN KEY (`ID_Pago`) REFERENCES `Pago` (`ID_Pago`);

--
-- Constraints for table `Persona`
--
ALTER TABLE `Persona`
  ADD CONSTRAINT `Persona_ibfk_1` FOREIGN KEY (`ID_Id`) REFERENCES `TipoId` (`ID_Id`);

--
-- Constraints for table `Photo`
--
ALTER TABLE `Photo`
  ADD CONSTRAINT `Photo_ibfk_1` FOREIGN KEY (`ID_Persona`) REFERENCES `Persona` (`ID_Persona`);

--
-- Constraints for table `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`ID_Tipo`) REFERENCES `TipoProducto` (`ID_Tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
