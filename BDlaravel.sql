-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-03-2022 a las 03:03:48
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
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accessusers`
--

CREATE TABLE `accessusers` (
  `idUser` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo del usuario ',
  `macAddress` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mac Address desde donde se conecto',
  `ipAddress` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP desde donde se conecto',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accessusers`
--

INSERT INTO `accessusers` (`idUser`, `macAddress`, `ipAddress`, `created_at`, `updated_at`) VALUES
(500857, '', '192.168.1.80', '2022-03-07 19:33:53', '2022-03-07 19:33:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banks`
--

CREATE TABLE `banks` (
  `idBank` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo del Banco',
  `idCountry` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo de pais',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre del Banco',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'A Activo P Pasivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banks`
--

INSERT INTO `banks` (`idBank`, `idCountry`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'EC', 'Banco Pichincha', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(2, 'EC', 'Banco Guayaquil', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(3, 'EC', 'Produbanco', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centers`
--

CREATE TABLE `centers` (
  `idCenter` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo del centro suministrador',
  `idRegion` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo de la Region',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre del centro',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Si el centro esta Activo o Inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `centers`
--

INSERT INTO `centers` (`idCenter`, `idRegion`, `name`, `state`, `created_at`, `updated_at`) VALUES
('EC00', 3, 'Guayaquil Norte', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('EC02', 4, 'Quito Norte', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('EC03', 4, 'Quito Sur', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('EC25', 3, 'Guayaquil Sur', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `idCountry` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo del Pais',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre del Pais',
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Moneda del Pais',
  `simbol` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Simbolo de la moneda del Pais',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Si el pais esta Activo o Inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`idCountry`, `name`, `currency`, `simbol`, `state`, `created_at`, `updated_at`) VALUES
('EC', 'Ecuador', 'USD', '$', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('GT', 'Guatemala', 'QZT', 'Q', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('US', 'Estados Unidos', 'USD', '$', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `idLanguage` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`idLanguage`, `name`, `shortName`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Español', 'ES', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(2, 'English', 'EN', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(3, 'Portugués', 'PO', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2021_08_29_035852_create_countries_table', 1),
(18, '2021_08_29_035929_create_regions_table', 1),
(19, '2021_08_29_035930_create_centers_table', 1),
(20, '2021_08_29_035934_create_offices_table', 1),
(21, '2021_08_29_035935_create_routes_table', 1),
(22, '2021_08_29_040214_create_users_table', 1),
(23, '2021_08_29_040215_create_usercenters_table', 1),
(24, '2021_08_29_040223_create_banks_table', 1),
(25, '2021_08_29_040235_create_transfers_table', 1),
(26, '2021_08_29_040332_create_accessusers_table', 1),
(27, '2021_08_29_040351_create_languages_table', 1),
(28, '2021_08_29_040400_create_states_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offices`
--

CREATE TABLE `offices` (
  `idOffice` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo de la Oficina',
  `idCenter` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo del centro',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombr de la Oficina',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Si la oficina esta Activo o Inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `offices`
--

INSERT INTO `offices` (`idOffice`, `idCenter`, `name`, `state`, `created_at`, `updated_at`) VALUES
('ES01', 'EC00', 'Guayaquil Norte', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('ES02', 'EC25', 'Guayaquil Sur', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('ES07', 'EC00', 'Guayaquil Especiales', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('ES08', 'EC02', 'Quito Norte', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('ES10', 'EC03', 'Quito Sur', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
('ES13', 'EC03', 'Quito Especiales', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE `regions` (
  `idRegion` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo de la Region',
  `idCountry` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo del Pais',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la region',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Si la region esta Activo o Inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regions`
--

INSERT INTO `regions` (`idRegion`, `idCountry`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'EC', 'Costa', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(2, 'EC', 'Sierra', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(3, 'EC', 'Guayaquil', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(4, 'EC', 'Quito', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routes`
--

CREATE TABLE `routes` (
  `idRoute` bigint(20) UNSIGNED NOT NULL,
  `idOffice` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'E',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `routes`
--

INSERT INTO `routes` (`idRoute`, `idOffice`, `name`, `type`, `state`, `created_at`, `updated_at`) VALUES
(501201, 'ES01', 'Preventa 501201', 'E', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(501202, 'ES01', 'Preventa 501202', 'E', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(501203, 'ES01', 'Preventa 501203', 'E', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCountry` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Country Primary Key',
  `tableReference` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `idCountry`, `tableReference`, `value`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'EC', 'banks', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(2, 'EC', 'banks', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(3, 'EC', 'users', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(4, 'EC', 'users', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(5, 'EC', 'regions', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(6, 'EC', 'regions', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(7, 'EC', 'offices', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(8, 'EC', 'offices', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(9, 'EC', 'languages', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(10, 'EC', 'languages', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(11, 'EC', 'transfers', 'A', 'Aprobado', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(12, 'EC', 'transfers', 'R', 'Rechazado', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(13, 'EC', 'transfers', 'I', 'Ingresado', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(14, 'EC', 'countries', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(15, 'EC', 'countries', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(16, 'EC', 'routes', 'I', 'Inactivo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(17, 'EC', 'routes', 'A', 'Activo', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfers`
--

CREATE TABLE `transfers` (
  `idTransfer` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo unico de la transferencia',
  `idCountry` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo del Pais',
  `idUser` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo del usuario',
  `idBank` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo del Banco',
  `idCustomer` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo / Ruc / Cedula del cliente',
  `nameCustomer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre del cliente y/o tienda',
  `voucher` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Numero de documento deposito',
  `amount` double(8,2) NOT NULL COMMENT 'Monto del deposito',
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ruta de Imagen Servidor',
  `route` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo de la ruta de entrega',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'I' COMMENT 'I Ingresada, A Aprobada, R Rechazado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transfers`
--

INSERT INTO `transfers` (`idTransfer`, `idCountry`, `idUser`, `idBank`, `idCustomer`, `nameCustomer`, `voucher`, `amount`, `image`, `route`, `state`, `created_at`, `updated_at`) VALUES
(1, 'EC', 500857, 1, '1111111111111', 'dsfsdff', '001-002-000847389', 33.00, 'Transfers/2022/01/14/EC-1111111111111-20220114-200022.png', 501201, 'I', '2022-01-15 01:00:22', '2022-01-15 01:00:22'),
(2, 'EC', 500857, 2, '0923308654001', 'JeFF', '8383838', 44.00, 'Transfers/2022/01/14/EC-0923308654001-20220114-200615.png', 501202, 'I', '2022-01-15 01:06:15', '2022-01-15 01:06:15'),
(3, 'EC', 500857, 2, '2222222222', 'dfsafs', '33', 33.00, 'Transfers/2022/01/14/EC-2222222222-20220114-201241.png', 501202, 'I', '2022-01-15 01:12:41', '2022-01-15 01:12:41'),
(5, 'EC', 500857, 2, '7777777777', 'Bxjdnd', '6773', 63.00, 'Transfers/2022/01/14/EC-7777777777-20220114-225445.jpeg', 501202, 'I', '2022-01-15 03:54:45', '2022-01-15 03:54:45'),
(6, 'EC', 500857, 2, '5555555555222', 'asdasd', '33333', 3.00, 'Transfers/2022/01/18/EC-5555555555222-20220118-051925.png', 501202, 'I', '2022-01-18 10:19:25', '2022-01-18 10:19:25'),
(7, 'EC', 500857, 2, '2222222222', 'eddd', '2', 2.00, 'Transfers/2022/01/18/EC-2222222222-20220118-052011.png', 501201, 'I', '2022-01-18 10:20:11', '2022-01-18 10:20:11'),
(8, 'EC', 500857, 3, '5555555555', 'sdsd', '23', 2.00, 'Transfers/2022/01/18/EC-5555555555-20220118-052137.png', 501202, 'I', '2022-01-18 10:21:37', '2022-01-18 10:21:37'),
(9, 'EC', 500857, 2, '3333333333', 'sdfsdf', '3', 2.00, 'Transfers/2022/01/18/EC-3333333333-20220118-052317.png', 501201, 'I', '2022-01-18 10:23:18', '2022-01-18 10:23:18'),
(10, 'EC', 500857, 2, '4444444444', 'sds', '33', 33.00, 'Transfers/2022/01/18/EC-4444444444-20220118-052626.png', 501202, 'I', '2022-01-18 10:26:26', '2022-01-18 10:26:26'),
(11, 'EC', 500857, 1, '4444444444', 'sdasdf', '3', 3.00, 'Transfers/2022/01/18/EC-4444444444-20220118-053108.png', 501202, 'I', '2022-01-18 10:31:08', '2022-01-18 10:31:08'),
(12, 'EC', 500857, 1, '4444444444', 'sdfds', '44', 33.00, 'Transfers/2022/01/18/EC-4444444444-20220118-055736.png', 501202, 'I', '2022-01-18 10:57:36', '2022-01-18 10:57:36'),
(13, 'EC', 500857, 1, '4444444444', 'dsfs', '3', 3.00, 'Transfers/2022/01/18/EC-4444444444-20220118-055810.png', 501202, 'I', '2022-01-18 10:58:10', '2022-01-18 10:58:10'),
(14, 'EC', 500857, 3, '5555544444', 'asfsfasfs', '4455', 5544.00, 'Transfers/2022/01/18/EC-5555544444-20220118-055903.png', 501203, 'I', '2022-01-18 10:59:03', '2022-01-18 10:59:03'),
(15, 'EC', 500857, 2, '7777777777', 'Jdjdd', '636373', 72727.00, 'Transfers/2022/01/18/EC-7777777777-20220118-061226.jpg', 501202, 'I', '2022-01-18 11:12:27', '2022-01-18 11:12:27'),
(16, 'EC', 500857, 3, '8888888888', 'Jdjdjd', '626', 6363.00, 'Transfers/2022/01/18/EC-8888888888-20220118-061434.jpeg', 501203, 'I', '2022-01-18 11:14:34', '2022-01-18 11:14:34'),
(17, 'EC', 500857, 1, '4444444444', 'fsdf', '33', 33.00, 'Transfers/2022/01/18/EC-4444444444-20220118-061705.png', 501202, 'I', '2022-01-18 11:17:05', '2022-01-18 11:17:05'),
(18, 'EC', 500857, 2, '4444444444', 'dfsf', '444', 44.00, 'Transfers/2022/01/18/EC-4444444444-20220118-141910.png', 501201, 'I', '2022-01-18 19:19:10', '2022-01-18 19:19:10'),
(19, 'EC', 500857, 2, '0923308654', 'Jefferson Miranda', '2232', 23.00, 'Transfers/2022/01/28/EC-0923308654-20220128-162421.jpg', 501201, 'I', '2022-01-28 21:24:22', '2022-01-28 21:24:22'),
(20, 'EC', 500857, 2, '4444444444', 'wqew', '001-002-119191', 3.00, 'Transfers/2022/01/28/EC-4444444444-20220128-164109.jpg', 501202, 'I', '2022-01-28 21:41:09', '2022-01-28 21:41:09'),
(21, 'EC', 500857, 2, '0923308654', 'Jefferson Miranda', '001-908-8838383', 111.00, 'Transfers/2022/01/28/EC-0923308654-20220128-164228.jpg', 501202, 'I', '2022-01-28 21:42:28', '2022-01-28 21:42:28'),
(22, 'EC', 500857, 2, '0923308654', 'Jefferson Miranda', '001-001-99883838', 89.00, 'Transfers/2022/03/07/EC-0923308654-20220307-143908.png', 501202, 'I', '2022-03-07 19:39:09', '2022-03-07 19:39:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usercenters`
--

CREATE TABLE `usercenters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo del usuario',
  `idCenter` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Codigo del centro',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Codigo del centro',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usercenters`
--

INSERT INTO `usercenters` (`id`, `idUser`, `idCenter`, `state`, `created_at`, `updated_at`) VALUES
(1, 500000, 'EC00', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(2, 500000, 'EC25', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(3, 500857, 'EC00', 'A', '2022-01-14 15:26:35', '2022-01-14 15:26:35'),
(4, 500009, 'EC00', 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` bigint(20) UNSIGNED NOT NULL COMMENT 'Codigo de Empleado y/o Identificacion',
  `firtsName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de la persona',
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Apellido de la persona',
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Carga en la compañia',
  `profile` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'USR Usuario Final ADM Administrador APR Aprobador VIS Visualiza',
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Correo electronico para que lleguen las notificaiones',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Contraseña encriptada',
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Token de conexion',
  `state` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Si el usuario esta Activo o Inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `firtsName`, `lastName`, `position`, `profile`, `email`, `password`, `api_token`, `state`, `created_at`, `updated_at`) VALUES
(500000, 'EC00 GENERICO', 'EC00 GENERICO', 'Entregador', 'USR', '501101@cbc.co', '12345', NULL, 'A', '2022-01-14 20:11:48', '2022-01-14 20:11:48'),
(500009, 'Jeff', 'Miranda', 'IT', 'ADM', 'jmirandaa86@cbc.co', '$2y$10$5a4WZSRNUhXY2IOa05Ty.uD9vD0lC8vlKk0fyEFuM.67k71Ev1G/i', 'QlLkLGqDo8KuDJWuU80VlLhGMETs3bqLgZDhDFNKd0HSWdEWQQ7ObJn4L3wVZNH2txmykIiOjK7NQ2p4oLPVwyjgo6W3GuxbQo0enAINtbIFofBa6Li5CSvSsT7G3ZkmII083nSwVyUZEeNGRQkFDBKJhO2evOQC6w2UuOfX8JftV8JpOYkEQiJv4buMpWyUeaWRzbnIvZpLiwO80MtqVDVGZYEm7e6FlU7aW67SxZtijvXSOWAO1Ye1waDEU2K', 'A', '2022-03-07 19:20:25', '2022-03-07 19:20:39'),
(500857, 'Jeff', 'Miranda', 'IT', 'ADM', 'jm@cbc.co', '$2y$10$1oMVLHk0DqRN.gczfw64h.aP8YDVsJ7ZBSgVvcyshthLIrvrOulk2', 'p7gbVpj1hPzXzFTZq2duBW3mAQDrX0loorTXrE5LiAGnWDZXjCpLGwG0eJ5Bf959ApxSoGfPpLGLffraIaqUVIYYfffCvkUGVeCECtJHsGLG9NzcjYB4JXPWMzJsBsaGR3biYrivbnO9TfKuLw1l6gOJZ7j6fGGJXcM4bIWipcCV66dBglR1xEu3OUM8tM3r5nWsRNu6yD964oAwRvK2S2LrC7mpVBrh6GFFJUesEgj504CR5MM7Q14LY1iqO2X', 'A', '2022-01-14 20:25:37', '2022-03-07 19:33:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accessusers`
--
ALTER TABLE `accessusers`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`idBank`),
  ADD KEY `banks_idcountry_foreign` (`idCountry`);

--
-- Indices de la tabla `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`idCenter`),
  ADD KEY `centers_idregion_foreign` (`idRegion`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`idCountry`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`idLanguage`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`idOffice`),
  ADD KEY `offices_idcenter_foreign` (`idCenter`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`idRegion`),
  ADD KEY `regions_idcountry_foreign` (`idCountry`);

--
-- Indices de la tabla `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`idRoute`),
  ADD KEY `routes_idoffice_foreign` (`idOffice`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_idcountry_foreign` (`idCountry`);

--
-- Indices de la tabla `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`idTransfer`),
  ADD KEY `transfers_idcountry_foreign` (`idCountry`),
  ADD KEY `transfers_iduser_foreign` (`idUser`),
  ADD KEY `transfers_idbank_foreign` (`idBank`);

--
-- Indices de la tabla `usercenters`
--
ALTER TABLE `usercenters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usercenters_iduser_foreign` (`idUser`),
  ADD KEY `usercenters_idcenter_foreign` (`idCenter`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accessusers`
--
ALTER TABLE `accessusers`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo del usuario ', AUTO_INCREMENT=500858;

--
-- AUTO_INCREMENT de la tabla `banks`
--
ALTER TABLE `banks`
  MODIFY `idBank` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo del Banco', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `idLanguage` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `idRegion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Region', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `routes`
--
ALTER TABLE `routes`
  MODIFY `idRoute` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501204;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `transfers`
--
ALTER TABLE `transfers`
  MODIFY `idTransfer` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo unico de la transferencia', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usercenters`
--
ALTER TABLE `usercenters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Empleado y/o Identificacion', AUTO_INCREMENT=500858;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accessusers`
--
ALTER TABLE `accessusers`
  ADD CONSTRAINT `accessusers_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Filtros para la tabla `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_idcountry_foreign` FOREIGN KEY (`idCountry`) REFERENCES `countries` (`idCountry`);

--
-- Filtros para la tabla `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_idregion_foreign` FOREIGN KEY (`idRegion`) REFERENCES `regions` (`idRegion`);

--
-- Filtros para la tabla `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_idcenter_foreign` FOREIGN KEY (`idCenter`) REFERENCES `centers` (`idCenter`);

--
-- Filtros para la tabla `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_idcountry_foreign` FOREIGN KEY (`idCountry`) REFERENCES `countries` (`idCountry`);

--
-- Filtros para la tabla `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_idoffice_foreign` FOREIGN KEY (`idOffice`) REFERENCES `offices` (`idOffice`);

--
-- Filtros para la tabla `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_idcountry_foreign` FOREIGN KEY (`idCountry`) REFERENCES `countries` (`idCountry`);

--
-- Filtros para la tabla `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_idbank_foreign` FOREIGN KEY (`idBank`) REFERENCES `banks` (`idBank`),
  ADD CONSTRAINT `transfers_idcountry_foreign` FOREIGN KEY (`idCountry`) REFERENCES `countries` (`idCountry`),
  ADD CONSTRAINT `transfers_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Filtros para la tabla `usercenters`
--
ALTER TABLE `usercenters`
  ADD CONSTRAINT `usercenters_idcenter_foreign` FOREIGN KEY (`idCenter`) REFERENCES `centers` (`idCenter`),
  ADD CONSTRAINT `usercenters_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
