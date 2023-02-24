-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-02-2023 a las 20:49:01
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
    `id` int NOT NULL,
    `id_usuario` int NOT NULL,
    `correo` varchar(255) NOT NULL,
    `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
    `id` int NOT NULL,
    `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
    `titulo` varchar(255) NOT NULL,
    `autor` varchar(255) NOT NULL,
    `isbn` varchar(100) NOT NULL,
    `resumen` varchar(255) NOT NULL,
    `formato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `imagen`, `titulo`, `autor`, `isbn`, `resumen`, `formato`) VALUES
(1, 'chica-nieve.png', 'La chica de nieve', 'Javier Castillo', 9788491292661, 'En la cabalgata de Acción de Gracias de 1998, Kiera Templeton desaparece y, años después, sus padres reciben un paquete con una cinta VHS de Kiera con 8 años jugando en una habitación desconocida. Miren Triggs, una estudiante de periodismo, investiga el caso y descubre oscuros secretos de su propio pasado. Javier Castillo, autor de "El día que se perdió la cordura" y "El día que se perdió el amor", presenta "La chica de nieve", una novela que muestra que lo peor siempre pasa inadvertido.', 'original'),
(2, 'bestia.png', 'La bestia', 'Carmen Mola', 9788408249849, 'En 1834, Madrid sufre una epidemia de cólera y la aparición de cadáveres desmembrados de niñas que nadie reclama. La Bestia es el principal sospechoso, pero nadie lo ha visto. Cuando Clara desaparece, su hermana Lucía, un policía, un periodista y un monje guerrillero se unen para encontrarla con vida. En su búsqueda, descubren un misterioso anillo de oro con dos mazas cruzadas que todos quieren y por el que algunos están dispuestos a matar.', 'original'),
(3, 'magia-orden.png', 'La magia del orden', 'Marie Kondo', 9781607747307, 'Es una guía práctica para organizar y simplificar tu vida. Kondo comparte su método KonMari, que se enfoca en conservar sólo lo que te hace feliz y deshacerte de todo lo demás. En lugar de organizar por habitación, Kondo recomienda hacerlo por categoría y en un orden específico, como ropa, libros, papeles, etc. También enseña técnicas para doblar y almacenar la ropa, y cómo deshacerte de objetos que ya no necesitas de manera consciente y respetuosa. Este libro puede ayudarte a transformar tu hogar y tu vida mediante el poder de la organización.', 'fotocopiado'),
(4, 'mercader-libros.png', 'El mercader de libros', 'Luis Zueco', 9788466667005, 'Es una novela de ficción histórica ambientada en la España del siglo XV. La historia sigue la vida de un vendedor de libros judío, Moshe, quien debe navegar por los peligros de la Inquisición y la intriga política de la época. Moshe se ve envuelto en un misterio relacionado con un manuscrito robado que podría tener consecuencias de gran alcance. La novela ofrece una visión del mundo de los libros y el conocimiento durante un período tumultuoso de la historia, así como las luchas enfrentadas por la comunidad judía en España.', 'fotocopiado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
    `id` int NOT NULL,
    `nombre` varchar(255) NOT NULL,
    `apellido` varchar(255) NOT NULL,
    `correo` varchar(255) NOT NULL,
    `contrasena` varchar(100) NOT NULL,
    `telefono` int NOT NULL,
    `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
    ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
