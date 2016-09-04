-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2015 a las 03:31:33
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `audiologia_laboral`
--
CREATE DATABASE IF NOT EXISTS `audiologia_laboral` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `audiologia_laboral`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_archivo`
--

CREATE TABLE IF NOT EXISTS `tbl_archivo` (
  `id_archivo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_registros` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_empresa` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_archivo_trabajador`
--

CREATE TABLE IF NOT EXISTS `tbl_archivo_trabajador` (
  `id_archivo_trabajador` int(10) NOT NULL AUTO_INCREMENT,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_archivo` int(10) DEFAULT NULL,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_archivo_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_audio_tonal_od`
--

CREATE TABLE IF NOT EXISTS `tbl_audio_tonal_od` (
  `id_audio_tonal_od` int(10) NOT NULL AUTO_INCREMENT,
  `od_250` int(11) DEFAULT NULL,
  `od_500` int(11) DEFAULT NULL,
  `od_1000` int(11) DEFAULT NULL,
  `od_2000` int(11) DEFAULT NULL,
  `od_3000` int(11) DEFAULT NULL,
  `od_4000` int(11) DEFAULT NULL,
  `od_6000` int(11) DEFAULT NULL,
  `od_8000` int(11) DEFAULT NULL,
  `od_sts` float DEFAULT NULL,
  `od_khz` float DEFAULT NULL,
  `retest` smallint(6) DEFAULT '0',
  `fail` smallint(6) DEFAULT '0',
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_audio_tonal_od`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_audio_tonal_oi`
--

CREATE TABLE IF NOT EXISTS `tbl_audio_tonal_oi` (
  `id_audio_tonal_oi` int(10) NOT NULL AUTO_INCREMENT,
  `oi_250` int(11) DEFAULT NULL,
  `oi_500` int(11) DEFAULT NULL,
  `oi_1000` int(11) DEFAULT NULL,
  `oi_2000` int(11) DEFAULT NULL,
  `oi_3000` int(11) DEFAULT NULL,
  `oi_4000` int(11) DEFAULT NULL,
  `oi_6000` int(11) DEFAULT NULL,
  `oi_8000` int(11) DEFAULT NULL,
  `oi_sts` float DEFAULT NULL,
  `oi_khz` float DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_audio_tonal_oi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_diagnostico`
--

CREATE TABLE IF NOT EXISTS `tbl_diagnostico` (
  `id_diagnostico` int(10) NOT NULL AUTO_INCREMENT,
  `escala_klockhoff_od` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interpretacion_od` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `escala_klockhoff_oi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interpretacion_oi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cie_10` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interpretacion_klock` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicion_auditiva` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_diagnostico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE IF NOT EXISTS `tbl_empresa` (
  `id_empresa` int(10) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruc` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa_trabajador`
--

CREATE TABLE IF NOT EXISTS `tbl_empresa_trabajador` (
  `id_empresa_trabajador` int(10) NOT NULL AUTO_INCREMENT,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  `id_empresa` int(10) DEFAULT NULL,
  `id_experiencia_laboral` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_empresa_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_experiencia_laboral`
--

CREATE TABLE IF NOT EXISTS `tbl_experiencia_laboral` (
  `id_experiencia_laboral` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `area_trabajo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_area` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puesto_trabajo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempo_servicio` float DEFAULT NULL,
  `nivel_ruido` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_epp` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_nrr` float DEFAULT NULL,
  `tiempo_uso` float DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_experiencia_laboral`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_informe`
--

CREATE TABLE IF NOT EXISTS `tbl_informe` (
  `id_informe` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_informe` datetime DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  `id_audio_tonal_od` int(10) DEFAULT NULL,
  `id_audio_tonal_oi` int(10) DEFAULT NULL,
  `id_diagnostico` int(10) DEFAULT NULL,
  `id_otoscopia` int(10) DEFAULT NULL,
  `id_recomendacion` int(10) DEFAULT NULL,
  `id_experiencia_laboral` int(10) DEFAULT NULL,
  `id_linea_base` int(10) DEFAULT NULL,
  `id_empresa` int(10) DEFAULT NULL,
  `id_menoscabo` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_informe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_linea_base`
--

CREATE TABLE IF NOT EXISTS `tbl_linea_base` (
  `id_linea_base` int(10) NOT NULL AUTO_INCREMENT,
  `estado` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  `id_audio_tonal_od` int(10) DEFAULT NULL,
  `id_audio_tonal_oi` int(10) DEFAULT NULL,
  `id_otoscopia` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_linea_base`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_menoscabo`
--

CREATE TABLE IF NOT EXISTS `tbl_menoscabo` (
  `id_menoscabo` int(10) NOT NULL AUTO_INCREMENT,
  `porcentaje_od` float DEFAULT NULL,
  `porcentaje_oi` float DEFAULT NULL,
  `binaural` float DEFAULT NULL,
  `mglobal` float DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_menoscabo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_opciones`
--

CREATE TABLE IF NOT EXISTS `tbl_opciones` (
  `id_opciones` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id_opciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbl_opciones`
--

INSERT INTO `tbl_opciones` (`id_opciones`, `descripcion`, `estado`) VALUES
(1, 'Inicio', 1),
(2, 'Pacientes', 1),
(3, 'Buscar Paciente', 1),
(4, 'Empresas', 1),
(5, 'Buscar Empresa', 1),
(6, 'Excel', 1),
(7, 'Cargar Excel', 1),
(8, 'Ajustes', 1),
(9, 'Nuevo Usuario', 1),
(10, 'Nuevo Rol', 1),
(11, 'Gestionar Permisos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_otoscopia`
--

CREATE TABLE IF NOT EXISTS `tbl_otoscopia` (
  `id_otoscopia` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_audiometria` date DEFAULT NULL,
  `descripcion_od` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_oi` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edad_trabajador` int(3) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_otoscopia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil_opcion`
--

CREATE TABLE IF NOT EXISTS `tbl_perfil_opcion` (
  `id_perfil_opcion` int(10) NOT NULL AUTO_INCREMENT,
  `estado` smallint(6) DEFAULT '1',
  `id_rol` int(10) DEFAULT NULL,
  `id_opciones` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_perfil_opcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recomendacion`
--

CREATE TABLE IF NOT EXISTS `tbl_recomendacion` (
  `id_recomendacion` int(10) NOT NULL AUTO_INCREMENT,
  `rgeneral` text COLLATE utf8_unicode_ci,
  `especifica` text COLLATE utf8_unicode_ci,
  `complementarios` text COLLATE utf8_unicode_ci,
  `conclusion` text COLLATE utf8_unicode_ci,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_trabajador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_recomendacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE IF NOT EXISTS `tbl_rol` (
  `id_rol` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id_rol`, `nombre`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Operador', 1),
(3, 'Super Administrador', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_temporal`
--

CREATE TABLE IF NOT EXISTS `tbl_temporal` (
  `id_temporal` int(10) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruc` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dni` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `area_trabajo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puesto_trabajo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_area` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempo_servicio` float DEFAULT NULL,
  `fecha_audiometria` date DEFAULT NULL,
  `tipo_epp` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_nrr` float DEFAULT NULL,
  `nivel_ruido` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_od` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_oi` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `od_250` int(11) DEFAULT NULL,
  `od_500` int(11) DEFAULT NULL,
  `od_1000` int(11) DEFAULT NULL,
  `od_2000` int(11) DEFAULT NULL,
  `od_3000` int(11) DEFAULT NULL,
  `od_4000` int(11) DEFAULT NULL,
  `od_6000` int(11) DEFAULT NULL,
  `od_8000` int(11) DEFAULT NULL,
  `porcentaje_od` float DEFAULT NULL,
  `oi_250` int(11) DEFAULT NULL,
  `oi_500` int(11) DEFAULT NULL,
  `oi_1000` int(11) DEFAULT NULL,
  `oi_2000` int(11) DEFAULT NULL,
  `oi_3000` int(11) DEFAULT NULL,
  `oi_4000` int(11) DEFAULT NULL,
  `oi_6000` int(11) DEFAULT NULL,
  `oi_8000` int(11) DEFAULT NULL,
  `escala_klockhoff_od` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `escala_klockhoff_oi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interpretacion_klock` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicion_auditiva` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `porcentaje_oi` float DEFAULT NULL,
  `binaural` float DEFAULT NULL,
  `mglobal` float DEFAULT NULL,
  `interpretacion_od` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interpretacion_oi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cie_10` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rgeneral` text COLLATE utf8_unicode_ci,
  `especifica` text COLLATE utf8_unicode_ci,
  `complementarios` text COLLATE utf8_unicode_ci,
  `od_khz` float DEFAULT NULL,
  `oi_khz` float DEFAULT NULL,
  `od_sts` float DEFAULT NULL,
  `oi_sts` float DEFAULT NULL,
  PRIMARY KEY (`id_temporal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajador`
--

CREATE TABLE IF NOT EXISTS `tbl_trabajador` (
  `id_trabajador` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dni` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrasenia` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_rol` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre`, `usuario`, `contrasenia`, `estado`, `created_at`, `updated_at`, `id_rol`) VALUES
(1, 'Administrador del Sistema', 'admin', 'admin', 1, '2015-05-09 01:34:38', '2015-05-16 05:19:56', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vst_busqueda_empresa`
--
CREATE TABLE IF NOT EXISTS `vst_busqueda_empresa` (
`id_empresa` int(10)
,`razon_social` varchar(60)
,`ruc` varchar(12)
,`direccion` varchar(60)
,`contacto` varchar(60)
,`id_archivo` int(10)
,`nombre_archivo` varchar(100)
,`tipo` varchar(45)
,`cantidad_registros` int(11)
,`fecha_registro` date
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vst_busqueda_pacientes`
--
CREATE TABLE IF NOT EXISTS `vst_busqueda_pacientes` (
`id_trabajador` int(10)
,`nombre` varchar(45)
,`apellidos` varchar(45)
,`dni` varchar(12)
,`fecha_nacimiento` date
,`sexo` varchar(10)
,`estado` smallint(6)
,`id_empresa` int(10)
,`razon_social` varchar(60)
,`ruc` varchar(12)
,`direccion` varchar(60)
,`contacto` varchar(60)
,`id_otoscopia` int(10)
,`fecha_audiometria` date
,`descripcion_od` varchar(15)
,`descripcion_oi` varchar(15)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vst_busqueda_empresa`
--
DROP TABLE IF EXISTS `vst_busqueda_empresa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vst_busqueda_empresa` AS select `e`.`id_empresa` AS `id_empresa`,`e`.`razon_social` AS `razon_social`,`e`.`ruc` AS `ruc`,`e`.`direccion` AS `direccion`,`e`.`contacto` AS `contacto`,`a`.`id_archivo` AS `id_archivo`,`a`.`nombre_archivo` AS `nombre_archivo`,`a`.`tipo` AS `tipo`,`a`.`cantidad_registros` AS `cantidad_registros`,`a`.`fecha_registro` AS `fecha_registro` from (`tbl_empresa` `e` left join `tbl_archivo` `a` on((`a`.`id_empresa` = `e`.`id_empresa`))) where ((`e`.`estado` = 1) and (`a`.`estado` = 1));

-- --------------------------------------------------------

--
-- Estructura para la vista `vst_busqueda_pacientes`
--
DROP TABLE IF EXISTS `vst_busqueda_pacientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vst_busqueda_pacientes` AS select `t`.`id_trabajador` AS `id_trabajador`,`t`.`nombre` AS `nombre`,`t`.`apellidos` AS `apellidos`,`t`.`dni` AS `dni`,`t`.`fecha_nacimiento` AS `fecha_nacimiento`,`t`.`sexo` AS `sexo`,`t`.`estado` AS `estado`,`e`.`id_empresa` AS `id_empresa`,`e`.`razon_social` AS `razon_social`,`e`.`ruc` AS `ruc`,`e`.`direccion` AS `direccion`,`e`.`contacto` AS `contacto`,`o`.`id_otoscopia` AS `id_otoscopia`,`o`.`fecha_audiometria` AS `fecha_audiometria`,`o`.`descripcion_od` AS `descripcion_od`,`o`.`descripcion_oi` AS `descripcion_oi` from (((`tbl_trabajador` `t` left join `tbl_otoscopia` `o` on((`o`.`id_trabajador` = `t`.`id_trabajador`))) left join `tbl_empresa_trabajador` `et` on((`et`.`id_trabajador` = `t`.`id_trabajador`))) left join `tbl_empresa` `e` on((`e`.`id_empresa` = `et`.`id_empresa`))) where ((`t`.`estado` = 1) and (`e`.`estado` = 1) and (`o`.`estado` = 1));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
