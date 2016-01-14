-- Aufgaben

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%aufgaben_aufgaben` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `titel` varchar(255) DEFAULT NULL,
    `beschreibung` longtext DEFAULT NULL,
    `kategorie` int(10) DEFAULT NULL,
    `eigentuemer` int(10) DEFAULT NULL,
    `prio` int(10) DEFAULT NULL,
    `status` int(10) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Kategorien

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%aufgaben_kategorien` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `kategorie` varchar(255) DEFAULT NULL,
    `farbe` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Status

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%aufgaben_status` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `status` varchar(255) DEFAULT NULL,
    `icon` varchar(255)  DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%aufgaben_filter` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `user` int(10) DEFAULT NULL,
    `kategorie` int(10)  DEFAULT NULL,
    `eigentuemer` int(10)  DEFAULT NULL,
    `prio` int(10)  DEFAULT NULL,
    `status` int(10)  DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Status Inhalte

REPLACE INTO `%TABLE_PREFIX%aufgaben_status` VALUES
    (1,'Offen','fa-folder-open-o'),
    (2,'Wird bearbeitet','fa-gears'),
    (3,'Frage','fa-question'),
    (4,'Warten auf etwas','fa-hourglass-start'),
    (5,'Auf später verschoben','fa-calendar'),
    (6,'Erledigt','fa-check');
