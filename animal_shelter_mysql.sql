USE `animal_shelter`;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `articles`
--

DROP TABLE IF EXISTS `articles`;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext,
  `lang` varchar(2) NOT NULL,
  `url` varchar(255) NOT NULL,
  `in_menu` bit(1) NOT NULL,
  `menu_weight` int(11) DEFAULT NULL,
  `summary` text,
  `on_homepage` bit(1) NOT NULL,
  `translation_of` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Izbacivanje podataka za tablicu `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `lang`, `url`, `in_menu`, `menu_weight`, `summary`, `on_homepage`, `translation_of`) VALUES
(1, 'O nama', '<p>Ovo je tekst o nama.</p>', 'hr', 'o_nama', b'1', 1, '', b'0', 2),
(2, 'About Us', '<p>This is text about us.</p>\r\n', 'en', 'about_us', b'1', 1, '', b'0', 1),
(3, 'Kontakt', '<p>Ovo je stranica sa našim kontaktima.</p>', 'hr', 'kontakt', b'1', 2, '<p>Ovo je summary za stranicu sa našim kontaktima.</p>', b'1', 4),
(4, 'Contact', '<p>This is page with contact informations.</p>', 'en', 'contact', b'1', 2, '<p>This is summary for page with contact informations.</p>', b'1', 3);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `categories`
--

DROP TABLE IF EXISTS `categories`;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` longtext,
  `lang` varchar(2) NOT NULL,
  `url` varchar(256) DEFAULT NULL,
  `summary` text,
  `on_homepage` bit(1) NOT NULL,
  `translation_of` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Izbacivanje podataka za tablicu `categories`
--

INSERT INTO `categories` (`id`, `title`, `body`, `lang`, `url`, `summary`, `on_homepage`, `translation_of`) VALUES
(1, 'Psi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'psi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.', b'1', 8),
(2, 'Mačke', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'macke', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.', b'1', 0),
(5, 'Glodavci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'glodavci', '', b'0', 0),
(7, 'Ostalo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'ostalo', '', b'0', 0),
(8, 'Dogs', 'Dogs, dogs and dogs.', 'en', 'dogs', 'Just dogs.', b'1', 1);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `pets`
--

DROP TABLE IF EXISTS `pets`;

CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `body` longtext,
  `img_loc` varchar(200) NOT NULL,
  `url` varchar(256) DEFAULT NULL,
  `lang` char(2) DEFAULT NULL,
  `summary` text,
  PRIMARY KEY (`id`),
  KEY `kat_id` (`category_id`)
);

--
-- Izbacivanje podataka za tablicu `pets`
--

INSERT INTO `pets` (`id`, `category_id`, `title`, `location`, `body`, `img_loc`, `url`, `lang`, `summary`) VALUES
(1, 1, 'Floki', 'Zagreb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://petsubjectsrescue.petethevet.com/wp-content/uploads/2013/11/Guide-Dogs_025-11.jpg', 'floki', 'hr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.'),
(2, 1, 'Mehi', 'Split', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://p1.pichost.me/i/32/1547786.jpg', 'mehi', 'hr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.'),
(3, 1, 'Beni', 'Rijeka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/f/fe/American_Eskimo_Dog_1.jpg', 'beni', 'hr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.'),
(4, 1, 'Rita', 'Varaždin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/4/47/American_Eskimo_Dog.jpg', 'rita', 'hr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.'),
(5, 1, 'Čupko', 'Trogir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Old_English_Sheep_Dog.JPG', 'cupko', 'hr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst.');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `static_words`
--

DROP TABLE IF EXISTS `static_words`;

CREATE TABLE IF NOT EXISTS `static_words` (
  `word_id` varchar(256) NOT NULL,
  `word` varchar(256) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);

--
-- Izbacivanje podataka za tablicu `static_words`
--

INSERT INTO `static_words` (`word_id`, `word`, `lang`, `id`) VALUES
('categories', 'Kategorije', 'hr', 1),
('categories', 'Categories', 'en', 2),
('homepage_slideshow_message', 'Tražiš novog najboljeg prijatelja?', 'hr', 3),
('homepage_slideshow_message', 'Looking For a New Best Friend?', 'en', 4),
('footer_donated_by', 'Web dizajnirali i donirali Mislav Plazzeriano i Ivan Sinek', 'hr', 5),
('footer_donated_by', 'Web designed and donated by Mislav Plazzeriano and Ivan Sinek', 'en', 6),
('about_us', 'O nama', 'hr', 7),
('about_us', 'About Us', 'en', 8),
('contact', 'Kontakt', 'hr', 9),
('contact', 'Contact', 'en', 10),
('articles', 'Articles', 'en', 11),
('articles', 'Članci', 'hr', 12),
('pets', 'Pets', 'en', 13),
('pets', 'Ljubimci', 'hr', 14),
('users', 'Useri', 'hr', 15),
('users', 'Users', 'en', 16),
('static_words', 'Static words', 'en', 17),
('static_words', 'Statične riječi', 'hr', 18),
('title', 'Title', 'en', 19),
('title', 'Naziv', 'hr', 20),
('lang', 'Language', 'en', 21),
('lang', 'Jezik', 'hr', 22),
('on_homepage', 'On Homepage', 'en', 23),
('on_homepage', 'Na početnoj stranici', 'hr', 24),
('actions', 'Actions', 'en', 25),
('actions', 'Akcije', 'hr', 26),
('category', 'Category', 'en', 27),
('category', 'Kategorija', 'hr', 28),
('word_id', 'Word ID', 'en', 29),
('word_id', 'ID Riječi', 'hr', 30),
('word', 'Word', 'en', 31),
('word', 'Riječ', 'hr', 32);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Izbacivanje podataka za tablicu `users`
--

INSERT INTO `users` (`id`, `ime`, `email`, `password`) VALUES
(1, 'Ivan Sinek', 'isinek@gmail.com', '8fe2b8a4c448693a8140a54b91cba9a7');
