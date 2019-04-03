-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2019 a las 21:47:35
-- Versión del servidor: 5.7.25-0ubuntu0.16.04.2
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `promesa`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_Comentario` (IN `_idComentario` INT)  BEGIN
	DECLARE flag int;
	SELECT COUNT(idComentario) INTO flag FROM comentario WHERE idComentario = _idComentario;
    IF(flag < 1) THEN
		SELECT "El id ingresado no se encuentra en la base de datos"; 
    ELSE
		DELETE FROM comentario WHERE idComentario = _idComentario;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modify_Comentario` (IN `_idComentario` INT, IN `_comentario_idUsuario` INT, IN `_leido` TINYINT(4))  BEGIN
	DECLARE aux int;
    
	SELECT COUNT(*) INTO aux FROM comentario WHERE idComentario = _idComentario;
    
    IF(aux < 1)THEN
		SELECT "El comentario no se encuentra";
	ELSEIF (_comentario_idUsuario = "") THEN
		SELECT "Hacen falta parametros y no se puede modificar";
	ELSE
		UPDATE comentario SET comentario_idUsuario = _comentario_idUsuario, leido = _leido
		WHERE idComentario = _idComentario;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_AddPregunta` (IN `_pregunta_idUsuario` VARCHAR(11), IN `_nombrePregunta` VARCHAR(100), IN `_repuesta` TEXT, IN `_publicado` TINYINT(4))  BEGIN
    DECLARE nomPsinEspacio VARCHAR(100);
    DECLARE resinEspacio text;
    DECLARE aux int;
    
    SELECT TRIM(_nombrePregunta) INTO nomPsinEspacio;
    SELECT TRIM(_repuesta) INTO resinEspacio;
    
    SELECT COUNT(nombrePregunta) INTO aux FROM pregunta WHERE nombrePregunta = nomPsinEspacio;
    
    IF (aux > 1) THEN
		SELECT "La pregunta ya fue agregada";
	ELSEIF (nomPsinEspacio = "") THEN
		SELECT "El campo PREGUNTA no puede estar vacio";
	ELSEIF (resinEspacio = "") THEN
		SELECT "El campo RESPUESTA no puede estar vacio";
	ELSEIF (_publicado = "") THEN
		SELECT "El campo PUBLICADO no puede estar vacio";
	ELSE
		INSERT INTO pregunta VALUES (null, _pregunta_idUsuario, nomPsinEspacio, resinEspacio, _publicado);
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_AddProducto` (IN `_nombreProducto` VARCHAR(50), IN `_descripcion` TEXT, IN `_pProducto` DOUBLE, IN `_pVenta` DOUBLE, IN `_stock` INT, IN `_lanzamiento` TINYINT, IN `_producto_idUsuario` INT, IN `_imagen_1` VARCHAR(50), IN `_imagen_2` VARCHAR(50), IN `_imagen_3` VARCHAR(50))  BEGIN
	DECLARE SnombreProducto varchar(50);
    DECLARE Sdescripcion text;
	DECLARE Sganancia double;
    DECLARE Sgana double;
	DECLARE Sstock int;
	DECLARE SEimagen1 varchar(50);
	DECLARE SEimagen2 varchar(50);
	DECLARE SEimagen3 varchar(50);   
		
	SELECT TRIM(_nombreProducto) INTO SnombreProducto;
    SELECT TRIM(_descripcion) INTO Sdescripcion;

	SELECT TRIM(_imagen_1) INTO SEimagen1;
	SELECT TRIM(_imagen_2) INTO SEimagen2;
	SELECT TRIM(_imagen_3) INTO SEimagen3;

	SELECT (_pVenta - _pProducto) INTO Sganancia;
    SELECT (_stock * Sganancia) INTO Sgana;
            
	IF (SnombreProducto = "") THEN
		SELECT "El campo Nombre no puede estar vacio";
    ELSEIF (Sdescripcion = "") THEN
		SELECT "El campo Descripcion Producto no puede estar vacio";
	ELSEIF (SEimagen1 = "") THEN
		SELECT "El campo IMAGEN_1 Producto no puede estar vacio";
	ELSEIF (SEimagen2 = "") THEN
		SELECT "El campo IMAGEN_2 Producto no puede estar vacio";
	ELSEIF (SEimagen3 = "") THEN
		SELECT "El campo IMAGEN_3 Producto no puede estar vacio";
	ELSEIF (_pProducto = "") THEN
		SELECT "El campo Precio Producto no puede estar vacio";
	ELSEIF (_pVenta = "") THEN
		SELECT "El campo PRECIO VENTA no puede estar vacio";
	ELSEIF (_stock = "") THEN
		SELECT "El campo STOCK no puede estar vacio";
	ELSE
		INSERT INTO imagen VALUES (null, SEimagen1, SEimagen2, SEimagen3);
        	set @idImagen_last = last_insert_id();
		INSERT INTO producto VALUES (null, @idImagen_last, SnombreProducto, _pProducto, 
		_pVenta, Sgana, _stock, 0, _lanzamiento, _producto_idUsuario, Sdescripcion);
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_AddUsuario` (IN `_usuario` VARCHAR(50), IN `_contrasena` VARCHAR(150), IN `_clave` VARCHAR(10), IN `_estatus` TINYINT(4))  BEGIN
	DECLARE ususinEspacio VARCHAR(50);
    DECLARE consinEspacio VARCHAR(50);
    DECLARE clasinEspacio VARCHAR(50);
    DECLARE estsinEspacio VARCHAR(50);
    DECLARE aux int;
    
    SELECT TRIM(_usuario) INTO ususinEspacio;
    SELECT TRIM(_contrasena) INTO consinEspacio;
    SELECT TRIM(_clave) INTO clasinEspacio;
    SELECT TRIM(_estatus) INTO estsinEspacio;
    
 
	SELECT COUNT(nombre) INTO aux FROM usuario WHERE nombre = ususinEspacio;
    
    IF (aux > 1) THEN
		SELECT "El usuario ya esta agregado";
    ELSEIF (ususinEspacio = "") THEN
		SELECT "El campo Usuario no puede estar vacio";
	ELSEIF (consinEspacio = "") THEN
		SELECT "El campo Contraseña no puede estar vacio";
	ELSEIF (clasinEspacio = "") THEN
		SELECT "El campo clave no puede estar vacio";
    ELSEIF (estsinEspacio = "") THEN
		SELECT "El campo Estatus no puede estar vacio";
	ELSE
		INSERT INTO usuario VALUES (null, ususinEspacio, consinEspacio, clasinEspacio, estsinEspacio);
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_deleteProduc` (IN `_idProducto` INT, IN `_idUsuario` INT, IN `_baja_logica` INT)  BEGIN
	DECLARE aux int;
    
    SELECT COUNT(idProducto) INTO aux FROM producto WHERE idProducto = _idProducto;
    
    IF (aux < 1) THEN
		SELECT "El producto no existe o ya se elimino.";
	ELSE
		UPDATE producto SET baja_logica = _baja_logica, producto_idUsuario = _idUsuario
		WHERE idProducto = _idProducto;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_eliminarUsuario` (IN `_idUsuario` INT)  BEGIN
    DECLARE aux int;
    
    SELECT COUNT(idUsuario) INTO aux FROM usuario WHERE idUsuario = _idUsuario;
    
    IF (aux < 1) THEN
		SELECT "El usuario no existe";
	ELSE
		DELETE FROM usuario WHERE idUsuario = _idUsuario;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_ModiPregunta` (IN `_id_Pregunta` INT(11), IN `_pregunta_idUsuario` INT(11), IN `_nombrePregunta` VARCHAR(100), IN `_respuesta` TEXT)  BEGIN
    DECLARE nomPsinEspacio VARCHAR(100);
    DECLARE resinEspacio text;
    DECLARE aux int;
    
    SELECT TRIM(_nombrePregunta) INTO nomPsinEspacio;
    SELECT TRIM(_respuesta) INTO resinEspacio;
    
    SELECT COUNT(idPregunta) INTO aux FROM pregunta WHERE idPregunta = _id_Pregunta;

    IF (aux < 1) THEN
		SELECT "No se encontro la pregunta";
	ELSEIF (_pregunta_idUsuario = "") THEN
		SELECT "El campo ID USUARIO no puede estar vacio";
	ELSEIF (nomPsinEspacio = "") THEN
		SELECT "El campo PREGUNTA no puede estar vacio";
	ELSEIF (resinEspacio = "") THEN
		SELECT "El campo RESPUESTA no puede estar vacio";
	ELSE
		UPDATE pregunta SET pregunta_idUsuario = _pregunta_idUsuario, nombrePregunta = nomPsinEspacio, respuesta = resinEspacio
		WHERE idPregunta =  _id_Pregunta;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_ModUsuario` (IN `_idUsuario` INT, IN `_usuario` VARCHAR(50), IN `_contrasena` VARCHAR(150), IN `_clave` VARCHAR(10))  BEGIN
   
	DECLARE ususinEspacio VARCHAR(50);
    DECLARE consinEspacio VARCHAR(50);
	DECLARE clasinEspacio VARCHAR(50);
    DECLARE aux int;

    SELECT TRIM(_usuario) INTO ususinEspacio;
    SELECT TRIM(_contrasena) INTO consinEspacio;
    SELECT TRIM(_clave) INTO clasinEspacio;
    
    SELECT COUNT(idUsuario) INTO aux FROM usuario WHERE idUsuario = _idUsuario;
	
    IF (aux < 1) THEN
		SELECT "El usuario no existe";
	ELSEIF (ususinEspacio = "") THEN
		SELECT "El campo Usuario no puede estar vacio";
	ELSEIF (consinEspacio = "") THEN
		SELECT "El campo Contraseña no puede estar vacio";
	ELSEIF (clasinEspacio = "") THEN
		SELECT "El campo Estatus no puede estar vacio";
	ELSE
		UPDATE usuario SET nombre = ususinEspacio, contrasena = consinEspacio, clave = clasinEspacio
		WHERE idUsuario = _idUsuario;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_publiPregunta` (IN `_id_Pregunta` INT(11), IN `_publicado` TINYINT(4))  BEGIN
    DECLARE aux int;
    
    SELECT COUNT(idPregunta) INTO aux FROM pregunta WHERE idPregunta = _id_Pregunta;
    
	IF (aux < 1) THEN
		SELECT "No se encontro la pregunta.";
	ELSE
		UPDATE pregunta SET publicado = _publicado WHERE idPregunta =  _id_Pregunta;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_UpdateProducto` (IN `_idProducto` INT, IN `_idImagen` INT, IN `_nombreProducto` VARCHAR(50), IN `_descripcion` TEXT, IN `_pProducto` DOUBLE, IN `_pVenta` DOUBLE, IN `_stock` INT, IN `_producto_idUsuario` INT, IN `_imagen_1` VARCHAR(50), IN `_imagen_2` VARCHAR(50), IN `_imagen_3` VARCHAR(50), IN `_lanzamiento` TINYINT)  BEGIN
	DECLARE SnombreProducto varchar(50);
	DECLARE Sganancia double;
    DECLARE Sgana double;
	DECLARE Simagen_1 VARCHAR(50);
    DECLARE Simagen_2 VARCHAR(50);
    DECLARE Simagen_3 VARCHAR(50);
	DECLARE aux int;
	DECLARE SEdescripcion text;  
		
	SELECT TRIM(_nombreProducto) INTO SnombreProducto;
	SELECT TRIM(_imagen_1) INTO Simagen_1;
    SELECT TRIM(_imagen_2) INTO Simagen_2;
    SELECT TRIM(_imagen_3) INTO Simagen_3;
	SELECT TRIM(_descripcion) INTO SEdescripcion;
            
	SELECT (_pVenta-_pProducto) INTO Sganancia;
    SELECT (_stock*Sganancia) INTO Sgana;

	SELECT COUNT(idProducto) INTO aux FROM producto WHERE idProducto = _idProducto;

	IF (aux < 1) THEN
		SELECT "No se encontro el producto o no existe";    
	ELSEIF (SnombreProducto = "") THEN
		SELECT "El campo Nombre no puede estar vacio";
	ELSEIF (Simagen_1 = "") THEN
		SELECT "El campo Imagen 1 no puede estar vacio";
	ELSEIF (Simagen_2 = "") THEN
		SELECT "El campo Imagen 2 no puede estar vacio";
	ELSEIF (Simagen_3 = "") THEN
		SELECT "El campo Imagen 3 no puede estar vacio";
	ELSEIF (SEdescripcion = "") THEN
		SELECT "El campo DESCRIPCIÓN no puede estar vacio";		
	ELSE
		UPDATE imagen SET imagen_1 = _imagen_1, imagen_2 = _imagen_2, imagen_3 = _imagen_3
        WHERE idImagen = _idImagen;
                     
		UPDATE producto SET nombreProducto = SnombreProducto, 
		pProducto = _pProducto, pVenta = _pVenta, ganancia = Sgana, stock = _stock, 
		lanzamiento = _lanzamiento, producto_idUsuario = _Producto_idUsuario, descripcion = SEdescripcion
		WHERE idProducto = _idProducto;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `save_Comentario` (IN `_nombre` VARCHAR(50), IN `_comentario` TEXT, IN `_mail` VARCHAR(50))  BEGIN
	DECLARE nombreSE varchar(50);
    DECLARE mailSE varchar(50);
    
    SELECT TRIM(_nombre) INTO nombreSE;
    SELECT TRIM(_mail) INTO mailSE;
    
    IF (nombreSE = "") THEN
		SELECT "El nombre es obligatorio.";
	ELSEIF (mailSE = "") THEN 
		SELECT "El correo es obligatorio";
	ELSEIF (_comentario = "") THEN
		SELECT "Es necesario el comentario.";
	ELSE
		INSERT INTO comentario VALUES (null, null, nombreSE, _comentario, mailSE, 0);
	END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `comentario_idUsuario` int(11) DEFAULT NULL,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `comentario` text,
  `mail` varchar(50) DEFAULT NULL,
  `leido` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `comentario_idUsuario`, `nombreUsuario`, `comentario`, `mail`, `leido`) VALUES
(5, 1, 'Pedrito Sola', 'Este es un mensaje de Pedrito Sola desde el formulario.', 'pedritoSola@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idImagen` int(11) NOT NULL,
  `imagen_1` varchar(50) NOT NULL,
  `imagen_2` varchar(50) NOT NULL,
  `imagen_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idImagen`, `imagen_1`, `imagen_2`, `imagen_3`) VALUES
(2, 'two4.jpg', 'trhree3.jpg', '-8129279648.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idPregunta` int(11) NOT NULL,
  `pregunta_idUsuario` int(11) DEFAULT NULL,
  `nombrePregunta` varchar(100) DEFAULT NULL,
  `respuesta` text,
  `publicado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idPregunta`, `pregunta_idUsuario`, `nombrePregunta`, `respuesta`, `publicado`) VALUES
(1, 1, 'Question update with Administrator', 'More text heres where the form :)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `producto_idImagen` int(11) DEFAULT NULL,
  `nombreProducto` varchar(50) DEFAULT NULL,
  `pProducto` double DEFAULT NULL,
  `pVenta` double DEFAULT NULL,
  `ganancia` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `baja_logica` tinyint(4) NOT NULL,
  `lanzamiento` tinyint(4) NOT NULL,
  `producto_idUsuario` int(11) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `producto_idImagen`, `nombreProducto`, `pProducto`, `pVenta`, `ganancia`, `stock`, `baja_logica`, `lanzamiento`, `producto_idUsuario`, `descripcion`) VALUES
(2, 2, 'Modificación juan', 123.12, 1234.1, 3332.94, 3, 1, 0, 5, 'Segunda descripcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contrasena` varchar(150) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `estatus` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `contrasena`, `clave`, `estatus`) VALUES
(1, 'Administrador', '12345', '1234567', 1),
(5, 'Mario Perez', '123456asdf', '1238956', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fk_UsuarioC` (`comentario_idUsuario`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`idImagen`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `fk_UsuarioPregunta` (`pregunta_idUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_imagenP` (`producto_idImagen`),
  ADD KEY `fkUsuarioP` (`producto_idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_UsuarioC` FOREIGN KEY (`comentario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_UsuarioPregunta` FOREIGN KEY (`pregunta_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fkUsuarioP` FOREIGN KEY (`producto_idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_imagenP` FOREIGN KEY (`producto_idImagen`) REFERENCES `imagen` (`idImagen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
