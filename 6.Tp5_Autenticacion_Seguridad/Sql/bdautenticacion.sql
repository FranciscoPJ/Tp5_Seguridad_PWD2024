CREATE TABLE `usuario` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `mail` VARCHAR(50) NOT NULL,
    `deshabilitado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `rol` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `usuariorol` (
    `idusuario` bigint(20) NOT NULL,
    `idrol` bigint(20) NOT NULL,
    PRIMARY KEY (`idusuario`, `idrol`),
    FOREIGN KEY (`idusuario`) REFERENCES `usuario`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`idrol`) REFERENCES `rol`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
