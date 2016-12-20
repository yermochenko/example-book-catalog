CREATE DATABASE IF NOT EXISTS `book_catalog` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `book_catalog`;

CREATE TABLE `author` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `surname` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `author`
(`id`, `name`,     `surname`) VALUES
(   1, 'Jack',     'London'),
(   2, 'Jules',    'Verne'),
(   3, 'Rudyard',  'Kipling'),
(   4, 'Fenimore', 'Cooper'),
(   5, 'Jack',     'Kerouac'),
(   6, 'William',  'Jacobs'),

CREATE TABLE `book` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `author_id` INT NOT NULL,
    `pages` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `book`
(`id`, `title`,                                                                 `author_id`, `pages`) VALUES
(   1, 'The Call of the Wild',                                                            1,     231),
(   2, 'The Sea-Wolf',                                                                    1,     425),
(   3, 'White Fang',                                                                      1,     298),
(   4, 'The Little Lady of the Big House',                                                1,     244),
(   5, 'Hearts of Three',                                                                 1,     384),
(   6, 'Les Enfants du capitaine Grant',                                                  2,     925),
(   7, 'Vingt mille lieues sous les mers',                                                2,     672),
(   8, 'Le tour du monde en quatre-vingts jours',                                         2,     217),
(   9, 'L''Île mystérieuse',                                                              2,     320),
(  10, 'Un capitaine de quinze ans',                                                      2,     566),
(  11, 'Rikki-Tikki-Tavi',                                                                3,      73),
(  12, 'Mowgli''s Brothers',                                                              3,      56),
(  13, 'Kaa''s Hunting',                                                                  3,      32),
(  14, 'Tiger! Tiger!',                                                                   3,      56),
(  15, 'The Prairie',                                                                     4,     566),
(  16, 'The Last of the Mohicans',                                                        4,     336),
(  17, 'The Pathfinder, or The inland sea',                                               4,     512),
(  18, 'The Deerslayer: or The First Warpath',                                            4,     304),
(  19, 'The Pioneers: or The Sources of the Susquehanna',                                 4,     460),
(  20, 'The two admirals',                                                                4,     257),
(  21, 'Afloat and Ashore: or The Adventures of Miles Wallingford. A Sea Tale',           4,     380),
(  22, 'The Sea Lions: The Lost Sealers',                                                 4,     444),
(  23, 'On the Road',                                                                     5,     384),
(  24, 'The Dharma Bums',                                                                 5,     187),
(  25, 'Big Sur',                                                                         5,     256),
(  26, 'Skipper’s Wooing',                                                                6,     190),
(  27, 'A Master of Craft',                                                               6,     200);


ALTER TABLE `author`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `book`
    ADD PRIMARY KEY (`id`),
    ADD KEY `author_id` (`author_id`);

ALTER TABLE `book`
    ADD CONSTRAINT `book_vs_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);