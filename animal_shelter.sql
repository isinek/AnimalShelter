-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 09:48 PM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
--
-- Database: `animal_shelter`
--
 
-- --------------------------------------------------------
 
--
-- Table structure for table `interested_in`
--
 
CREATE TABLE IF NOT EXISTS `interested_in` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Table structure for table `kategorija`
--
 
CREATE TABLE IF NOT EXISTS `kategorija` (
`id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `opis` text COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=8 ;
 
--
-- Dumping data for table `kategorija`
--
 
INSERT INTO `kategorija` (`id`, `ime`, `opis`) VALUES
(1, 'Psi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.'),
(2, 'Mačke', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.'),
(3, 'Ribice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.'),
(4, 'Ptice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.'),
(5, 'Glodavci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.'),
(6, 'Gmazovi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.'),
(7, 'Ostalo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo magna eget arcu fermentum consequat. Donec nec eros mollis, auctor sapien eu, tempus ipsum. In hac habitasse platea dictumst. Praesent a varius quam. Curabitur pellentesque velit sit amet urna pellentesque pretium. Donec faucibus leo elit, ac porta turpis fringilla congue. Vestibulum mollis nunc nec est bibendum, id luctus nulla lacinia. Phasellus velit tortor, porta ac lorem eget, vestibulum scelerisque sem. Vivamus ante dolor, posuere a blandit id, bibendum sed arcu. Morbi imperdiet ex eros, in interdum felis efficitur vitae. Ut ac cursus dui, a egestas felis. Donec eget enim sed lectus vulputate efficitur. Vivamus luctus massa a convallis accumsan. Curabitur auctor, quam at mollis pretium, est orci maximus nunc, eget condimentum erat lectus quis metus. Nulla facilisi.');
 
-- --------------------------------------------------------
 
--
-- Table structure for table `pets`
--
 
CREATE TABLE IF NOT EXISTS `pets` (
`id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `lokacija` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `opis` text COLLATE utf8_croatian_ci NOT NULL,
  `img_loc` varchar(200) COLLATE utf8_croatian_ci NOT NULL,
  `posvojen_od` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=6 ;
 
--
-- Dumping data for table `pets`
--
 
INSERT INTO `pets` (`id`, `kat_id`, `ime`, `lokacija`, `opis`, `img_loc`, `posvojen_od`) VALUES
(1, 1, 'Floki', 'Zagreb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://petsubjectsrescue.petethevet.com/wp-content/uploads/2013/11/Guide-Dogs_025-11.jpg', NULL),
(2, 1, 'Mehi', 'Split', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://p1.pichost.me/i/32/1547786.jpg', NULL),
(3, 1, 'Beni', 'Rijeka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/f/fe/American_Eskimo_Dog_1.jpg', NULL),
(4, 1, 'Rita', 'Varaždin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/4/47/American_Eskimo_Dog.jpg', NULL),
(5, 1, 'Čupko', 'Trogir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae maximus arcu. Integer auctor diam nec ante eleifend gravida. Praesent eu dignissim enim. Pellentesque fermentum diam eu nisl volutpat commodo. Donec velit ante, congue convallis ex a, interdum gravida arcu. Quisque venenatis pretium ex, quis porta arcu suscipit et. Nam dapibus, elit at pellentesque efficitur, est risus rutrum ligula, at sagittis leo erat sed metus. Donec maximus, lectus a rutrum convallis, enim nulla sollicitudin purus, sit amet imperdiet diam sapien nec ex. Integer tempus nisl interdum scelerisque dictum. Phasellus ultrices, ipsum in dictum maximus, sapien metus ullamcorper lectus, eu elementum dui sem id neque. Integer id dui pulvinar, gravida sapien et, feugiat orci. Sed fringilla est eget tellus feugiat pellentesque. Integer in vulputate risus.', 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Old_English_Sheep_Dog.JPG', NULL);
 
-- --------------------------------------------------------
 
--
-- Table structure for table `users`
--
 
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `tel` varchar(40) COLLATE utf8_croatian_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=3 ;
 
--
-- Dumping data for table `users`
--
 
INSERT INTO `users` (`id`, `ime`, `email`, `password`, `tel`, `adresa`) VALUES
(1, 'Ivan Petrić', 'ivan@ivan.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0919458698', 'Olympus 52A, Zagreb'),
(2, 'Josip Štefić', 'josip@josip.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0928969325', 'Ričeki 22C, Babina Greda');
 
--
-- Indexes for dumped tables
--
 
--
-- Indexes for table `interested_in`
--
ALTER TABLE `interested_in`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `kat_id` (`kat_id`);
 
--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
 ADD PRIMARY KEY (`id`);
 
--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
 ADD PRIMARY KEY (`id`), ADD KEY `kat_id` (`kat_id`), ADD KEY `posvojen_od` (`posvojen_od`);
 
--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);
 
--
-- AUTO_INCREMENT for dumped tables
--
 
--
-- AUTO_INCREMENT for table `interested_in`
--
ALTER TABLE `interested_in`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--
 
--
-- Constraints for table `interested_in`
--
ALTER TABLE `interested_in`
ADD CONSTRAINT `interested_in_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `interested_in_ibfk_2` FOREIGN KEY (`kat_id`) REFERENCES `kategorija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`kat_id`) REFERENCES `kategorija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`posvojen_od`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;