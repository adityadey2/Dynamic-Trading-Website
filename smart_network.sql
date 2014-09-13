-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2014 at 04:50 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smart_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_auction`
--

CREATE TABLE IF NOT EXISTS `item_auction` (
  `auction_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_no` int(11) NOT NULL,
  `auction_member_id` int(11) NOT NULL,
  `auction_price` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `item_auction`
--

INSERT INTO `item_auction` (`auction_id`, `item_no`, `auction_member_id`, `auction_price`, `date`) VALUES
(1, 4, 1, 40200, 1388698917),
(2, 4, 3, 44000, 1388332999),
(10, 7, 2, 450000, 1388735439),
(11, 3, 2, 1900, 1388735489),
(12, 3, 1, 1945, 1388735592),
(13, 6, 1, 10, 1388736319),
(14, 8, 3, 973259, 1388858656);

-- --------------------------------------------------------

--
-- Table structure for table `item_query`
--

CREATE TABLE IF NOT EXISTS `item_query` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `query` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_query`
--

INSERT INTO `item_query` (`id`, `item_no`, `user_id`, `query`, `date`) VALUES
(1, 8, 2, 'Whats this?? I dont get it..', 1388756553),
(2, 8, 6, 'Can I get it here in India?? Please reply ASAP', 1388764000);

-- --------------------------------------------------------

--
-- Table structure for table `item_query_comment`
--

CREATE TABLE IF NOT EXISTS `item_query_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `query_id` int(11) NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_stat`
--

CREATE TABLE IF NOT EXISTS `item_stat` (
  `item_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imagepath` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expected_price` int(11) NOT NULL,
  `traded_price` int(11) NOT NULL,
  `date_added` bigint(11) NOT NULL,
  `date_traded` bigint(11) NOT NULL,
  `status` int(1) NOT NULL,
  `rating` int(4) NOT NULL,
  PRIMARY KEY (`item_no`),
  UNIQUE KEY `item_code` (`item_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `item_stat`
--

INSERT INTO `item_stat` (`item_no`, `item_code`, `owner_id`, `title`, `category`, `location`, `imagepath`, `description`, `expected_price`, `traded_price`, `date_added`, `date_traded`, `status`, `rating`) VALUES
(1, '1AcO342s', 1, 'Sony Ericson', 0, 'Kolkata', 'Tulips.jpg-Chrysanthemum.jpg-', 'Its a very nice mobile.Freewall is a cross-browser and responsive jQuery plugin to help you create many types of grid layouts: flexible layouts, images layouts, nested grid layouts, metro style layouts, pinterest like layouts ... with nice CSS3 animation effects and call back events. Freewall is all-in-one solution for creating dynamic grid layouts for desktop, mobile and tablet.Based on the width (or height) of a container and the width (height) of a cell unit, It will create a virtual matrix. Scaning the matrix at each cell will find a free cell around to made a free area, then try to fit a block element into it. In case no block can fit the gap, it will resize the block to fill the gap (that is one of the options).', 10000, 0, 1388332000, 0, 1, 0),
(3, '3bv6TS0I', 3, 'Hoffman', 2, 'Jaipur', 'yo.jpg-Jellyfish.jpg-', 'Its really nice.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.', 2000, 0, 1388331345, 0, 1, 0),
(4, '4c298AXz', 2, 'HP-Pavilion', 0, 'Bhopal', 'Hydrangeas.jpg-d13f7cf2cfef44165bdae8e4f442014e.jpg-3b3438f6fed783e6b5d9b0c6bbe955a1.jpg-Penguins.jpg-joker1.jpg-batman.jpg-', 'Its really nice.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.', 50000, 0, 1388331001, 0, 1, 0),
(6, '6k6UZYWk', 2, 'Networking Notes', 5, 'Chakdaha', '0586e367ce1a33084bced91ee1c83add.jpg-83d2cba89c7365ee6703b590de88e657.jpg-420de30930cbf49d366fa75ec360a600.jpg-', 'Its really nice.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.', 200, 0, 1388684386, 0, 1, 0),
(7, '7VtWFJhX', 1, 'Superman', 5, 'Canada', 'd72aa27c1768044abd180f4d294bde57.jpg-245a45fd0328dda85b66a792a11c2dce.jpg-5d5d486a1438d6ce3366af18512a3bc3.jpg-', 'Its really nice.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.', 500000, 0, 1388734356, 0, 1, 0),
(8, '8tp8Kz7Z', 1, 'Joker', 1, 'Australia', '56abcd91edda92f227632419299326bf.jpg-2e93d9e114fc79405172fa40cc1c692d.jpg-0501a73079c9ae5d170ffd463f621a45.jpg-', 'Its really nice.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non\n\ntortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna\n\nconsequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus.', 1000000, 0, 1388736553, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `my_cart`
--

CREATE TABLE IF NOT EXISTS `my_cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `my_cart`
--

INSERT INTO `my_cart` (`id`, `item_no`, `user_id`) VALUES
(1, 1, 2),
(2, 4, 1),
(3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `profession` int(1) NOT NULL,
  `country` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_time` bigint(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `firstname`, `lastname`, `gender`, `profession`, `country`, `creation_time`) VALUES
(1, 'aditya.dey2', 'pritam.jadavpur.it@gmail.com', 'MAykbBxu', 'Pritam', 'Dey', 1, 1, 'India', 1388330999),
(2, 'aish.rai2', 'theindiantongue@gmail.com', 'aishrai', 'Aish', 'Rai', 2, 1, 'India', 1388330000),
(3, 'punam.dey', 'punam.dey118@gmail.com', 'punamdey', 'Punam', 'Dey', 2, 1, 'India', 1388334000),
(4, 'tanuja', 'tanuja.dey@gmail.com', 'tanuja', 'Tanuja', 'Dey', 2, 8, 'India', 1388334432),
(5, 'suraj', 'suraj.shaw@gmail.com', 'suraj', 'Suraj', 'Shaw', 1, 1, 'India', 1388334123),
(6, 'paltu', 'paltu.dey@gmail.com', 'paltu', 'Paltu', 'Dey', 1, 2, 'India', 1388339876),
(7, 'prabir', 'prabir.dey@gmail.com', 'prabir', 'Prabir', 'Dey', 1, 2, 'India', 1388335467);

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE IF NOT EXISTS `user_photos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `imagepath` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `albumname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`id`, `user_id`, `imagepath`, `albumname`, `status`) VALUES
(1, 1, '6be81cf31fd197ac641218c8c7093654.jpg', 'Profile_Picture', 1),
(2, 3, 'DSCN0756.jpg', 'Profile_Picture', 1),
(4, 2, 'DSCN0555.jpg', 'Profile_Picture', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
