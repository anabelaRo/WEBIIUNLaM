-- phpMyAdmin SQL Dump
-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2014 a las 05:40:37
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: 'aerolinea'
--
CREATE DATABASE IF NOT EXISTS aerolinea DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE aerolinea;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'aeropuerto'
--
-- Creación: 29-06-2014 a las 18:29:27
--

CREATE TABLE IF NOT EXISTS aeropuerto (
	codigo_OACI		char(4)			COLLATE utf8_spanish_ci NOT NULL,
	ciudad			int(3)			NOT NULL,
	provincia		int(2)			NOT NULL,
	nombre_aerop	varchar(150)	COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA aeropuerto:
--   provincia
--       ciudad -> cod_prov
--   ciudad
--       ciudad -> codigo
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'avion'
--
-- Creación: 29-06-2014 a las 18:58:07
--

CREATE TABLE IF NOT EXISTS avion (
	codigo				int(2)		NOT NULL,
	marca				varchar(30)	COLLATE utf8_spanish_ci NOT NULL,
	modelo				varchar(50)	COLLATE utf8_spanish_ci NOT NULL,
	total_pasajes		int(3)		NOT NULL,
	asientos_economy	int(3)		NOT NULL,
	filas_economy		int(2)		NOT NULL,
	columnas_economy	int(1)		NOT NULL,
	asientos_primera	int(3)		NOT NULL,
	filas_primera		int(2)		NOT NULL,
	columnas_primera	int(1)		NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'ciudad'
--
-- Creación: 29-06-2014 a las 18:56:23
--

CREATE TABLE IF NOT EXISTS ciudad (
	cod_prov	int(2)		NOT NULL,
	codigo		int(3)		NOT NULL,
	descripcion	varchar(50)	COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA ciudad:
--   cod_prov
--       provincia -> codigo
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'forma_pago'
--
-- Creación: 29-06-2014 a las 18:58:25
--

CREATE TABLE IF NOT EXISTS forma_pago (
	codigo		int(1)		NOT NULL,
	descripcion	varchar(50)	COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pago'
--
-- Creación: 29-06-2014 a las 14:24:39
--

CREATE TABLE IF NOT EXISTS pago (
	codigo			int(6)			PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cod_reserva		int(6)			NOT NULL,
	cod_forma_pago	int(1)			NOT NULL,
	nro_tarjeta		bigint(20)		DEFAULT NULL,
	importe			decimal(6,2)	NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA pago:
--   cod_forma_pago
--       forma_pago -> codigo
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pasaje'
--
-- Creación: 30-06-2014 a las 03:40:00
--

CREATE TABLE IF NOT EXISTS pasaje (
	cod_reserva		int(6)		PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cod_vuelo		int(6)		NOT NULL,
	cod_usuario		int(6)		NOT NULL,
	clase_pasaje	char(1)		NOT NULL,
	fecha_reserva	datetime	NOT NULL,
	flag_check_in	tinyint(1)	DEFAULT NULL,
	fecha_vuelo		datetime	NOT NULL,
	cod_asiento		varchar(4)	COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA pasaje:
--   cod_pago
--       pago -> codigo
--   cod_usuario
--       usuario -> codigo
--   cod_vuelo
--       vuelo -> codigo
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'provincia'
--
-- Creación: 29-06-2014 a las 18:28:59
--

CREATE TABLE IF NOT EXISTS provincia (
	codigo		int(2)		NOT NULL,
	descripcion	varchar(50)	COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'usuario'
--
-- Creación: 29-06-2014 a las 19:01:31
--

CREATE TABLE IF NOT EXISTS usuario (
	codigo				int(6)		PRIMARY KEY NOT NULL AUTO_INCREMENT,
	dni					int(9)		NOT NULL,
	nombre_apellido		varchar(60)	COLLATE utf8_spanish_ci NOT NULL,
	fecha_nacimiento	date		NOT NULL,
	email				varchar(50)	COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'vuelo'
--
-- Creación: 29-06-2014 a las 22:13:30
--

CREATE TABLE IF NOT EXISTS vuelo (
	codigo			int(6)			NOT NULL,
	origen			char(4)			COLLATE utf8_spanish_ci NOT NULL,
	destino			char(4)			COLLATE utf8_spanish_ci NOT NULL,
	cod_avion		int(2)			NOT NULL,
	precio_primera	decimal(7,2)	NOT NULL,
	precio_economy	decimal(7,2)	NOT NULL,
	lunes			tinyint(1)		DEFAULT NULL,
	martes			tinyint(1)		DEFAULT NULL,
	miercoles		tinyint(1)		DEFAULT NULL,
	jueves			tinyint(1)		DEFAULT NULL,
	viernes			tinyint(1)		DEFAULT NULL,
	sabado			tinyint(1)		DEFAULT NULL,
	domingo			tinyint(1)		DEFAULT NULL,
	hora_vuelo		varchar(5)		COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA vuelo:
--   destino
--       aeropuerto -> codigo_OACI
--   origen
--       aeropuerto -> codigo_OACI
--   cod_avion
--       avion -> codigo
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla aeropuerto
--
ALTER TABLE aeropuerto
	ADD PRIMARY KEY (codigo_OACI),
	ADD KEY (ciudad),
	ADD KEY (provincia);
--	ADD KEY (ciudad,provincia);


--
-- Indices de la tabla avion
--
ALTER TABLE avion
	ADD PRIMARY KEY (codigo);

--
-- Indices de la tabla ciudad
--
ALTER TABLE ciudad
	ADD PRIMARY KEY (cod_prov,codigo),
	ADD KEY (cod_prov),
	ADD KEY (codigo);

--
-- Indices de la tabla forma_pago
--
ALTER TABLE forma_pago
	ADD PRIMARY KEY (codigo);

--
-- Indices de la tabla pago
--
ALTER TABLE pago
	-- ADD PRIMARY KEY (codigo),
	ADD KEY (cod_forma_pago),
	ADD KEY (cod_reserva);

--
-- Indices de la tabla pasaje
--
ALTER TABLE pasaje
	ADD KEY (cod_usuario),
	ADD KEY (cod_vuelo);

--
-- Indices de la tabla provincia
--
ALTER TABLE provincia
	ADD PRIMARY KEY (codigo);

--
-- Indices de la tabla usuario
--
-- ALTER TABLE usuario
	-- ADD PRIMARY KEY (codigo);

--
-- Indices de la tabla vuelo
--
ALTER TABLE vuelo
	ADD PRIMARY KEY (codigo),
	ADD KEY (cod_avion),
	ADD KEY (destino),
	ADD KEY (origen);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla ciudad
--
ALTER TABLE ciudad
	ADD CONSTRAINT FK_Ciudad_Provincia FOREIGN KEY (cod_prov)
		REFERENCES provincia (codigo);

--
-- Filtros para la tabla aeropuerto
--
ALTER TABLE aeropuerto
	ADD CONSTRAINT FK_Aeropuerto_Ciudad FOREIGN KEY (ciudad)
		REFERENCES ciudad (codigo),
	ADD CONSTRAINT FK_Aeropuerto_CiudadProvincia FOREIGN KEY (provincia)
		REFERENCES ciudad (cod_prov);
	-- ADD CONSTRAINT aeropuerto_ibfk_1 FOREIGN KEY (ciudad, provincia)
		-- REFERENCES ciudad (codigo, cod_prov),
	-- ADD CONSTRAINT aeropuerto_ibfk_2 FOREIGN KEY (ciudad, provincia)
		-- REFERENCES ciudad (codigo, cod_prov),
	-- ADD CONSTRAINT aeropuerto_ibfk_3 FOREIGN KEY (ciudad)
		-- REFERENCES ciudad (codigo);

--
-- Filtros para la tabla pago
--
ALTER TABLE pago
	ADD CONSTRAINT FK_Pago_FormaPago FOREIGN KEY (cod_forma_pago)
		REFERENCES forma_pago (codigo),
	ADD CONSTRAINT FK_Pago_Reserva FOREIGN KEY (cod_reserva)
		REFERENCES pasaje (cod_reserva);

--
-- Filtros para la tabla pasaje
--
ALTER TABLE pasaje
	ADD CONSTRAINT FK_Pasaje_Usuario FOREIGN KEY (cod_usuario)
		REFERENCES usuario (codigo),
	ADD CONSTRAINT FK_Pasaje_Vuelo FOREIGN KEY (cod_vuelo)
		REFERENCES vuelo (codigo);

--
-- Filtros para la tabla vuelo
--
ALTER TABLE vuelo
	ADD CONSTRAINT FK_VueloDestino_Aeropuerto FOREIGN KEY (destino)
		REFERENCES aeropuerto (codigo_OACI),
	ADD CONSTRAINT FK_VueloOrigen_Aeropuerto FOREIGN KEY (origen)
		REFERENCES aeropuerto (codigo_OACI),
	ADD CONSTRAINT FK_Vuelo_Avion FOREIGN KEY (cod_avion)
		REFERENCES avion (codigo);
