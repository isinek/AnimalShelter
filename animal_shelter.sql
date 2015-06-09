-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Računalo: localhost
-- Vrijeme generiranja: Lip 09, 2015 u 12:20 PM
-- Verzija poslužitelja: 5.6.11-log
-- PHP verzija: 5.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `animal_shelter`
--
CREATE DATABASE IF NOT EXISTS `animal_shelter` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `animal_shelter`;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `opis` text COLLATE utf8_croatian_ci NOT NULL,
  `jezik` text COLLATE utf8_croatian_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_croatian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=8 ;

--
-- Izbacivanje podataka za tablicu `categories`
--

INSERT INTO `categories` (`id`, `ime`, `opis`, `jezik`, `url`) VALUES
(1, 'Psi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'psi'),
(2, 'Mačke', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'macke'),
(3, 'Ribice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'ribice'),
(4, 'Ptice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'ptice'),
(5, 'Glodavci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'glodavci'),
(6, 'Gmazovi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'gmazovi'),
(7, 'Ostalo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.', 'hr', 'ostalo');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `interested_in`
--

CREATE TABLE IF NOT EXISTS `interested_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `kat_id` (`kat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `lokacija` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `opis` text COLLATE utf8_croatian_ci NOT NULL,
  `img_loc` varchar(200) COLLATE utf8_croatian_ci NOT NULL,
  `posvojen_od` int(11) DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_croatian_ci DEFAULT NULL,
  `jezik` char(2) COLLATE utf8_croatian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kat_id` (`kat_id`),
  KEY `posvojen_od` (`posvojen_od`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `pets`
--

INSERT INTO `pets` (`id`, `kat_id`, `ime`, `lokacija`, `opis`, `img_loc`, `posvojen_od`, `url`, `jezik`) VALUES
(1, 1, 'Floki', 'Zagreb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://petsubjectsrescue.petethevet.com/wp-content/uploads/2013/11/Guide-Dogs_025-11.jpg', NULL, 'floki', 'hr'),
(2, 1, 'Mehi', 'Split', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://p1.pichost.me/i/32/1547786.jpg', NULL, 'mehi', 'hr'),
(3, 1, 'Beni', 'Rijeka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/f/fe/American_Eskimo_Dog_1.jpg', NULL, 'beni', 'hr'),
(4, 1, 'Rita', 'Varaždin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/4/47/American_Eskimo_Dog.jpg', NULL, 'rita', 'hr'),
(5, 1, 'Čupko', 'Trogir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Old_English_Sheep_Dog.JPG', NULL, 'cupko', 'hr');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `static_words`
--

CREATE TABLE IF NOT EXISTS `static_words` (
  `word_id` varchar(256) COLLATE utf8_croatian_ci NOT NULL,
  `word` varchar(256) COLLATE utf8_croatian_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_croatian_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`),
  KEY `word_2` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=5 ;

--
-- Izbacivanje podataka za tablicu `static_words`
--

INSERT INTO `static_words` (`word_id`, `word`, `lang`, `id`) VALUES
('Kategorije', 'Kategorije', 'hr', 1),
('Kategorije', 'Categories', 'en', 2),
('homepage_slideshow_message', 'Neka prigodna poruka', 'hr', 3),
('homepage_slideshow_message', 'Appropriate message', 'en', 4);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `tel` varchar(40) COLLATE utf8_croatian_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `users`
--

INSERT INTO `users` (`id`, `ime`, `email`, `password`, `tel`, `adresa`) VALUES
(1, 'Ivan Petrić', 'ivan@ivan.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0919458698', 'Olympus 52A, Zagreb'),
(2, 'Josip Štefić', 'josip@josip.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0928969325', 'Ričeki 22C, Babina Greda');

--
-- Ograničenja za izbačene tablice
--

--
-- Ograničenja za tablicu `interested_in`
--
ALTER TABLE `interested_in`
  ADD CONSTRAINT `interested_in_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `interested_in_ibfk_2` FOREIGN KEY (`kat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`kat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`posvojen_od`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
