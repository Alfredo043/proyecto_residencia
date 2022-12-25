-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-12-2022 a las 01:51:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Cr_Titulo` varchar(50) DEFAULT NULL,
  `Cr_Subtitulo` varchar(50) DEFAULT NULL,
  `Cr_Descripcion` text NOT NULL,
  `Oper_Alta` varchar(15) NOT NULL,
  `Fecha_Alta` date NOT NULL,
  `Oper_Modif` varchar(15) NOT NULL,
  `Fecha_Modif` date NOT NULL,
  `Oper_Baja` varchar(15) NOT NULL DEFAULT '"',
  `Fecha_Baja` date DEFAULT NULL,
  `Es_Cve_Estado` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Cr_Cve_Curso`, `Cr_Titulo`, `Cr_Subtitulo`, `Cr_Descripcion`, `Oper_Alta`, `Fecha_Alta`, `Oper_Modif`, `Fecha_Modif`, `Oper_Baja`, `Fecha_Baja`, `Es_Cve_Estado`) VALUES
('1', 'NIVEL BÁSICO 1', 'Configuración Inicial', 'En esta sección daremos un vistazo general al funcionamiento del punto de venta de ManagementPro.', '2', '2022-12-03', '', '0000-00-00', '\"', NULL, 'AC'),
('2', 'NIVEL BÁSICO 2', 'Configuración Inicial', 'En esta sección daremos el seguimiento del vistazo general al funcionamiento del punto de venta de ManagementPro.', '2', '2022-12-03', '', '0000-00-00', '\"', NULL, 'AC'),
('3', 'NIVEL INTERMEDIO 1', 'Configuración inicial Retail', 'En esta sección daremos el seguimiento del vistazo general al funcionamiento del punto de venta de ManagementPro.', '2', '2022-12-03', '', '0000-00-00', '\"', NULL, 'AC'),
('4', 'NIVEL AVANZADO 1', 'ManagementPro Retail', 'En esta sección daremos el seguimiento del vistazo general al funcionamiento del punto de venta de ManagementPro.', '2', '2022-12-03', '', '0000-00-00', '\"', NULL, 'AC'),
('5', 'NIVEL AVANZADO 2', 'ManagementPro Retail', 'En esta sección daremos el seguimiento del vistazo general al funcionamiento del punto de venta de ManagementPro.', '2', '2022-12-04', '', '0000-00-00', '\"', NULL, 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_tipo_usuario`
--

CREATE TABLE `curso_tipo_usuario` (
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Tu_Cve_Tipo_Usuario` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso_tipo_usuario`
--

INSERT INTO `curso_tipo_usuario` (`Cr_Cve_Curso`, `Tu_Cve_Tipo_Usuario`) VALUES
('1', '0'),
('2', '0'),
('3', '0'),
('4', '2'),
('5', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_usuario`
--

CREATE TABLE `curso_usuario` (
  `Us_Cve_Usuario` decimal(18,0) NOT NULL,
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Cu_Fecha_Inicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_usuario_video`
--

CREATE TABLE `curso_usuario_video` (
  `Us_Cve_Usuario` decimal(18,0) NOT NULL,
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Cv_Cve_Curso_Video` decimal(18,0) NOT NULL,
  `Cuv_Fecha` date NOT NULL,
  `Cuv_Fecha_Modif` date NOT NULL,
  `Cuv_Tiempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_video`
--

CREATE TABLE `curso_video` (
  `Cv_Cve_Curso_Video` decimal(18,0) NOT NULL,
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Cv_Titulo` varchar(50) DEFAULT NULL,
  `Cv_Descripcion` text DEFAULT NULL,
  `Cv_Tiempo` int(11) NOT NULL,
  `Cv_Url` text DEFAULT NULL,
  `Es_Cve_Estado` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso_video`
--

INSERT INTO `curso_video` (`Cv_Cve_Curso_Video`, `Cr_Cve_Curso`, `Cv_Titulo`, `Cv_Descripcion`, `Cv_Tiempo`, `Cv_Url`, `Es_Cve_Estado`) VALUES
('1', '1', '1. Crear Base de Datos', 'Aprende a crear una base de datos en el sistema y realizar la configuración inicial de tu empresa.', 0, 'https://www.youtube.com/embed/LIo4vWmLQZg', 'AC'),
('2', '1', '2. Catálogo de Clientes', 'Conocerás todos los campos que puedes utilizar para dar de alta la información de los clientes.', 0, 'https://www.youtube.com/embed/hknPGWIXnLw', 'AC'),
('3', '1', '3. Catálogo de Productos', 'Conoce la pantalla y aprende donde y cómo debes capturar cada uno de tus productos de manera manual en el Punto de Venta.', 0, 'https://www.youtube.com/embed/XPJgSLKJVq4', 'AC'),
('4', '1', '4. Carga Masiva de Clientes y Productos', '¿Demasiados productos para capturarlos uno por uno? No te preocupes, aprende a realizar una carga masiva de productos desde un archivo en formato MS Excel.', 0, 'https://www.youtube.com/embed/itRk_r5_-SU', 'AC'),
('5', '1', '5. Carga Inicial de Inventarios', 'Realiza la carga inicial de tus inventarios y configura el sistema para que los productos se descuenten del inventario con cada venta.', 0, 'https://www.youtube.com/embed/krTWF1adMPs', 'AC'),
('6', '1', '6. Alta de Cajas y Operadores', 'Realiza el alta de las cajas registradoras que utilizarás en tu negocio, así como el alta de todos los operadores. ¡Descúbrelo!', 0, 'https://www.youtube.com/embed/wHnLWIp1oa4', 'AC'),
('7', '1', '7. Operación del Punto de Venta', 'Conoce cuales son las funciones principales para la operación del punto de venta. (ventas, cancelaciones, cobros y corte de caja)', 0, 'https://www.youtube.com/embed/gP9BKqxBXb8', 'AC'),
('8', '1', '8. Consulta de Precios, Movimientos de Almacén', 'Aprende a realizar: consulta de precios, retiro de valores, movimientos de almacén, devolución de clientes, lista de funciones.', 0, 'https://www.youtube.com/embed/ldR_SEmiDgs', 'AC'),
('9', '2', '1. Configuración Factura Electrónica', 'Aprende a realizar la configuración de la facturación electrónica, debes tener tus sellos digitales y tu contraseña disponibles.', 0, 'https://www.youtube.com/embed/P388ztSu8SY', 'AC'),
('10', '2', '2. Formato de Factura', 'Configura el formato de factura ya sea para usar en ticket o bien en tamaño carta.', 0, 'https://www.youtube.com/embed/Kr38yCgk4UE', 'AC'),
('11', '2', '3. Compra de Timbres para CFDI', 'Listo para facturar? Aprende cómo adquirir tus timbres en Community y tenerlos disponibles para comenzar a facturar.', 0, 'https://www.youtube.com/embed/vTonV_2QeAs', 'AC'),
('12', '2', '4. Factura Electrónica', 'Realiza la emisión de tus facturas electrónicas desde el Punto de Venta.', 0, 'https://www.youtube.com/embed/z1HNbIyP6vU', 'AC'),
('13', '2', '5. Envío de Factura por E-Mail', 'Envía por correo electrónica la(s) facturas emitidas a tus clientes.', 0, 'https://www.youtube.com/embed/jUW6vGaiPpE', 'AC'),
('14', '2', '6. Clasificación de Productos', 'Usa los clasificadores de productos para ver reportes más específicos, con estos puedes configurar promociones, ofertas y monitorear tu información al máximo.', 0, 'https://www.youtube.com/embed/Z9yealvhW5Q', 'AC'),
('15', '2', '7. Reportes', 'Conoce los reportes que puedes imprimir desde el punto de venta y la forma en la que puedes revisar tus reportes administrativos.', 0, 'https://www.youtube.com/embed/G_KOu8KEC0A', 'AC'),
('16', '2', '8. Configuración de Promociones', 'Configura diferentes descuentos y promociones en tu Punto de Venta.', 0, 'https://www.youtube.com/embed/h7APZeCA6JE', 'AC'),
('17', '2', '9. Formas de Pago', 'Aprende cómo se configuran las diferentes formas de pago en el Punto de Venta.', 0, 'https://www.youtube.com/embed/kXqMRPgvFqs', 'AC'),
('18', '2', '10. Optimización de Menús', 'Aprende a restringir y optimizar los menús que más utilizas a través de permisos de usuarios (catálogos, ventas, inventarios y finanzas).', 0, 'https://www.youtube.com/embed/kQ-PATBDB48', 'AC'),
('19', '3', '1. Cotizaciones', 'Conoce la forma mas sencilla de realizar cotizaciones en el punto de venta ManagementPro y posteriormente realizar el cobro de ellas.', 0, 'https://www.youtube.com/embed/S-YT1v7E4NE', 'AC'),
('20', '3', '2. Alta y Venta de Productos a Granel', 'Conoce la forma de dar de alta los productos que vendes a Granel y como realizar su venta desde ManagementPro Retail.', 0, 'https://www.youtube.com/embed/AIST1QPsRWg', 'AC'),
('21', '3', '3. Configuración Descuentos por Volumen', 'Aprende a realizar la configuración de descuentos por volumen por artículo en la versión Retail.', 0, 'https://www.youtube.com/embed/3FDN7tW6GfA', 'AC'),
('22', '3', '4. Generar Ventas a Crédito', 'Aprende a generar ventas a crédito en el punto de venta.', 0, 'https://www.youtube.com/embed/vfhBz9wErLA', 'AC'),
('23', '3', '5. Cobro de Ventas a Crédito', 'Aprende a realizar el cobro de las ventas a crédito en el punto de venta.', 0, 'https://www.youtube.com/embed/ARz8x6ssCh0', 'AC'),
('24', '3', '6. Logo en el Formato de Ticket', 'Conoce la forma de como agregar tu logo en tu formato de ticket. Versión Retail!', 0, 'https://www.youtube.com/embed/C2_wJTZtazA', 'AC'),
('25', '3', '7. Monedero Electrónico', 'Aprende a configurar el sistema para otorgarle a tus clientes un monedero electrónico con puntos para recibir beneficios en tu negocio.', 0, 'https://www.youtube.com/embed/50BQPpssIsw', 'AC'),
('26', '4', '1. Variables del Punto de Venta', 'Conoce la forma de configurar las variables para procesos especiales del punto de venta.', 0, 'https://www.youtube.com/embed/GWb7fGGzX-E', 'AC'),
('27', '4', '2. Alta de Vendedores', 'Si necesitas manejar comisiones debes dar de alta a tus vendedores para poder asignarlos a cada venta. En este video te indicamos donde debes de dar de alta a los vendedores.', 0, 'https://www.youtube.com/embed/YKvSyhuB9Jg', 'AC'),
('28', '4', '3. Cambio de Vendedor	', 'Configura el punto de venta para que te permita asignar un vendedor a cada venta que realices.', 0, 'https://www.youtube.com/embed/olf5_n5FYuA', 'AC'),
('29', '4', '4. Alta Tipo de Movimientos de Almacén', 'En este video te mostraremos como dar de alta diferentes movimientos de almacén, esto te permitirá tener un mejor control sobre las entradas y salidas de productos.', 0, 'https://www.youtube.com/embed/H3QILjVp0FA', 'AC'),
('30', '4', '5. Captura Movimientos de Almacén', 'Aprende como aplicar cada tipo de movimiento de almacén desde el punto de venta Retail.', 0, 'https://www.youtube.com/embed/aed3iXHaPg0', 'AC'),
('31', '4', '6. Ajuste de  Inventario\r\n', 'Aprende a realizar ajustes a su inventario en caso de tener diferencias entre el físico y el que te indica el sistema.', 0, 'https://www.youtube.com/embed/DL3H-g0sotU', 'AC'),
('32', '4', '7. Descarga de Series y Lotes', 'Si tus productos manejan lotes y utilizas el punto de venta, conoce lo necesario para configurar y así pueda descargarse el inventario de los productos.', 0, 'https://www.youtube.com/embed/TRcfcyKaL2o', 'AC'),
('33', '5', '1. Imagen de Productos', 'Aprende a realizar la carga de imágenes a tu catálogo de productos y que estos se visualicen en el punto de venta.', 0, 'https://www.youtube.com/embed/zGiRrTYf-SI', 'AC'),
('34', '5', '2. Productos Kit', 'Los productos KIT son aquellos que estan confirmados por mas de 2 productos diferentes y que en combinación puedes o no tener un precio especial. Aquí te mostramos como utilizar este tipo de productos en el punto de venta.', 0, 'https://www.youtube.com/embed/09xHTBkNKGI', 'AC'),
('35', '5', '3. Productos Negados', 'Los productos negados son aquellos que dejamos de vender por no tener en existencias, En el siguiente video te mostramos como utilizar esta opción.', 0, 'https://www.youtube.com/embed/ff6dw9rUq4o', 'AC'),
('36', '5', '4. Tallas y Colores', 'Conoce la forma en la que se configuran productos de talla color que se utilizan generalmente en giros como: boutique y/o zapatearías.', 0, 'https://www.youtube.com/embed/D37Z518Pcqo', 'AC'),
('37', '5', '5. Configuración de Monedero Electrónico', 'Fideliza a tus clientes otorgándoles monederos electrónicos, en el siguiente video te indicaremos como configurarlo en MangementPro Retail', 0, 'https://www.youtube.com/embed/q1tvPxSXlLA', 'AC'),
('38', '5', '6. Operación de Monedero Electrónico', 'Conoce la forma de habilitar el monedero en el punto de venta para acumular puntos o dinero... y la forma en la que podemos realizar cobros con el mismo.', 0, 'https://www.youtube.com/embed/fj6TZLsEzp8', 'AC'),
('39', '5', '7. Operación de Servicio a Domicilio', 'Si ofreces a tus clientes la opción de servicio a domicilio, aquí te mostramos como utilizar esta opción en el punto de venta.\r\n', 0, 'https://www.youtube.com/embed/pWK9GuKuFfQ', 'AC'),
('40', '5', '8. Ventas Pendientes', 'No dejes a tu cliente esperando para cobrarle, aquí te mostraremos como dejar una venta en modo pendiente para poder cobrarle al cliente que sigue en la fila.', 0, 'https://www.youtube.com/embed/tjBks_GFius', 'AC'),
('41', '5', '9. Cancelación Nota de Venta', 'En el siguiente video te mostraremos la forma de cancelar una nota de venta. Esta opción solo esta disponible cuando la venta es del mismo día y previo a realizar el corte de caja.', 0, 'https://www.youtube.com/embed/DYB3KR9QSho', 'AC'),
('42', '5', '10. Formatos del Punto de Venta', 'En el siguiente video te mostraremos los videos que se ocupan del punto de venta que pueden personalizarse.\r\nNivel de complejidad: Intermedio', 0, 'https://www.youtube.com/embed/1FliBiKDI3o', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Es_Cve_Estado` varchar(4) NOT NULL,
  `Es_Descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Es_Cve_Estado`, `Es_Descripcion`) VALUES
('AC', 'Activo'),
('BA', 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Tu_Cve_Tipo_Usuario` decimal(18,0) NOT NULL,
  `Tu_Descripcion` varchar(50) DEFAULT NULL,
  `Es_Cve_Estado` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Tu_Cve_Tipo_Usuario`, `Tu_Descripcion`, `Es_Cve_Estado`) VALUES
('0', 'Usuario', 'AC'),
('1', 'Administrador', 'AC'),
('2', 'Cliente', 'AC'),
('3', 'Partner', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Us_Cve_Usuario` decimal(18,0) NOT NULL,
  `Tu_Cve_Tipo_Usuario` decimal(18,0) NOT NULL,
  `Us_Descripcion` varchar(50) NOT NULL,
  `Us_Email` varchar(100) NOT NULL,
  `Us_Password` varchar(15) NOT NULL,
  `Es_Cve_Estado` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Us_Cve_Usuario`, `Tu_Cve_Tipo_Usuario`, `Us_Descripcion`, `Us_Email`, `Us_Password`, `Es_Cve_Estado`) VALUES
('1', '0', 'Oscar Alberto', 'oscar@gmail.com', '12', 'AC'),
('2', '1', 'Jorge Aldana', 'jaldana@gmail.com', '123', 'AC'),
('3', '2', 'Marco Aldana', 'maldana@gmail.com', '1234', 'AC'),
('4', '3', 'Leydi Aldana', 'laldana@gmail.com', '12345', 'AC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Cr_Cve_Curso`),
  ADD KEY `Es_Cve_Estado` (`Es_Cve_Estado`);

--
-- Indices de la tabla `curso_tipo_usuario`
--
ALTER TABLE `curso_tipo_usuario`
  ADD PRIMARY KEY (`Cr_Cve_Curso`,`Tu_Cve_Tipo_Usuario`) USING BTREE;

--
-- Indices de la tabla `curso_usuario`
--
ALTER TABLE `curso_usuario`
  ADD PRIMARY KEY (`Us_Cve_Usuario`,`Cr_Cve_Curso`) USING BTREE;

--
-- Indices de la tabla `curso_usuario_video`
--
ALTER TABLE `curso_usuario_video`
  ADD PRIMARY KEY (`Us_Cve_Usuario`,`Cr_Cve_Curso`,`Cv_Cve_Curso_Video`) USING BTREE;

--
-- Indices de la tabla `curso_video`
--
ALTER TABLE `curso_video`
  ADD PRIMARY KEY (`Cv_Cve_Curso_Video`),
  ADD KEY `Cr_Cve_Curso` (`Cr_Cve_Curso`) USING BTREE;

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Es_Cve_Estado`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Tu_Cve_Tipo_Usuario`),
  ADD KEY `Es_Cve_Estado` (`Es_Cve_Estado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Us_Cve_Usuario`),
  ADD KEY `Tu_Cve_Tipo_Usuario` (`Tu_Cve_Tipo_Usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_estado_ibfk_1` FOREIGN KEY (`Es_Cve_Estado`) REFERENCES `estado` (`Es_Cve_Estado`);

--
-- Filtros para la tabla `curso_tipo_usuario`
--
ALTER TABLE `curso_tipo_usuario`
  ADD CONSTRAINT `curso_tipo_usuario_ibfk_1` FOREIGN KEY (`Tu_Cve_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Tu_Cve_Tipo_Usuario`);

--
-- Filtros para la tabla `curso_video`
--
ALTER TABLE `curso_video`
  ADD CONSTRAINT `curso_video_ibfk_1` FOREIGN KEY (`Cr_Cve_Curso`) REFERENCES `curso` (`Cr_Cve_Curso`);

--
-- Filtros para la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD CONSTRAINT `tipo_usuario_estado_ibfk_1` FOREIGN KEY (`Es_Cve_Estado`) REFERENCES `estado` (`Es_Cve_Estado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tu_Cve_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Tu_Cve_Tipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
