-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 07:34 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auction_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `last_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auction_id`, `user_name`, `product_name`, `last_price`) VALUES
(1, 'Joker', 'Pair Vintage Solid Brass Victorian Piano Candelabra', 1200),
(2, 'Kyaw Lin Htwe', 'Lmp3Creation Forest Bronze Vintage Retro Antique Skeleton Hollow Dancing Analogue White Dial Chain Pocket Watch For Unisex', 1000),
(3, 'Ko Khant', 'Little India Antique Gemstone Brass Surahi Handicraft', 600),
(7, 'Kyaw Lin Htwe', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 560),
(8, 'Kyaw Lin Htwe', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 560);

-- --------------------------------------------------------

--
-- Table structure for table `auction_price`
--

CREATE TABLE `auction_price` (
  `price_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auction_price`
--

INSERT INTO `auction_price` (`price_id`, `user_name`, `product_name`, `price`, `product_id`) VALUES
(1, 'Ko Khant', 'Antique Gold Resin Multi Award Hero Trophy', 400, 3),
(2, 'Justin', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 420, 2),
(3, 'Justin', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 460, 2),
(4, 'Ko Khant', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 510, 2),
(5, 'Ko Khant', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 520, 2),
(8, 'Ko Khant', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 550, 2),
(9, 'Kyaw Lin Htwe', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 560, 2),
(10, 'Ko Khant', 'Little India Antique Gemstone Brass Surahi Handicraft', 570, 1),
(11, 'Ko Khant', 'Little India Antique Gemstone Brass Surahi Handicraft', 580, 1),
(12, 'Ko Khant', 'Little India Antique Gemstone Brass Surahi Handicraft', 590, 1),
(13, 'Ko Khant', 'Little India Antique Gemstone Brass Surahi Handicraft', 600, 1),
(14, 'Kyaw Lin Htwe', 'Set of 2 ornate antique brass putti candlestick holders.', 560, 4),
(15, 'Kyaw Lin Htwe', 'Set of 2 ornate antique brass putti candlestick holders.', 570, 4),
(16, 'Justin', 'Set of 2 ornate antique brass putti candlestick holders.', 575, 4),
(17, 'Ko Khant', 'Set of 2 ornate antique brass putti candlestick holders.', 600, 4),
(18, 'Kyaw Lin Htwe', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 570, 2),
(19, 'Ko Khant', 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 580, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(4, 'Books'),
(5, 'Coins'),
(6, 'Craft'),
(7, 'Jewelry'),
(8, 'Stamps'),
(9, 'Antique'),
(10, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `message`, `user_id`) VALUES
(1, 'Length - 5 inches, Width - 5 inches, Height - 9 inches.Sheesham Wood & Brass.Made by rural artist of India.Authentic design!! Not a replice!! All are Hand made so some imperfection might occur.Buy this & promote Indian rural artists!', 2),
(2, 'High quality brass mechanical pocket watch. It does not need battery. It has to be bound using the top knob once in 24 hours .Comes with a handcrafted sheesham wood box.Excellent for gifting,Antique style design,Comes with a long chain.', 1),
(3, 'Your Web Site is very Good.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `product_date` datetime NOT NULL,
  `image` longtext NOT NULL,
  `catid` int(11) NOT NULL,
  `auction_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `description`, `product_date`, `image`, `catid`, `auction_time`) VALUES
(1, 'Little India Antique Gemstone Brass Surahi Handicraft', 560, 'Guaranteed delivery to pincode 400001 - Mumbai by Friday, May 24 with Two-Day Delivery â€” Order in the next 5 hours and 42 minutes Details 6 offers from    549.00.Material: Pure Brass, Color: Brass.Package Contents: 1 Surahi.Item Size: 15 cm x 7 cm - Approx.Handcrafted brass surahi.Assorted design and color will be sent since it is a hand made product.', '2019-08-11 11:32:22', 'a:2:{i:0;s:12:\"Antique1.jpg\";i:1;s:12:\"Antique2.jpg\";}', 9, 0),
(2, 'Generic Itos365 Handmade Vintage Dummy Gramophone Only For Home Decor', 450, 'Length - 5 inches, Width - 5 inches, Height - 9 inches.Sheesham Wood & Brass.Made by rural artist of India.Authentic design!! Not a replice!! All are Hand made so some imperfection might occur.Buy this & promote Indian rural artists!', '2019-08-11 11:32:42', 'a:2:{i:0;s:12:\"Antique2.jpg\";i:1;s:13:\"Antique2a.jpg\";}', 9, 0),
(3, 'Antique Gold Resin Multi Award Hero Trophy', 560, 'Multi award Hero resin trophy measuring 18.5 cm, featuring an antique gold superhero figure with red cape and the word Hero on chest with one foot on laurel wreath, mounted on base complete with engraving plate.Free Engraving Available.Available for Other Sports.', '2019-08-11 11:33:09', 'a:2:{i:0;s:12:\"Antique3.jpg\";i:1;s:13:\"Antique12.jpg\";}', 9, 0),
(4, 'Set of 2 ornate antique brass putti candlestick holders.', 550, 'Set of 2 beautiful ornate antique putti / cherub candlestick holders. Beautifully detailed with Capricorns, floral motives, handles and bows.Measurements:Height (max) approx: 16 9/16 inch (42 cm),Width (max) approx: 8 7/16 inches (21.5 cm),Weight each: 4.5 kg ( 9.9 Lbs).These items are in a antique condition. There is some minor wear due age and use.', '2019-08-11 11:33:34', 'a:2:{i:0;s:12:\"Antique4.jpg\";i:1;s:12:\"Antique5.jpg\";}', 9, 0),
(5, 'Pair Vintage Solid Brass Victorian Piano Candelabra', 550, 'A pair of Vintage Solid Brass Victorian Piano Candle holders / Candle Wall SconcesPrice.Measurements:Length (max) approx: 9 1/16 inches (23 cm),Width (max) approx: 2 15/16 inches (7.5 cm).Take a good look at the pictures so you can see the actual condition of the item, this is the actual item you will receive.', '2019-08-11 11:33:53', 'a:2:{i:0;s:12:\"Antique4.jpg\";i:1;s:12:\"Antique5.jpg\";}', 9, 0),
(6, 'Artshai 17 Jewels Mechanical Pocket Watch with Chain ', 770, 'High quality brass mechanical pocket watch. It does not need battery. It has to be bound using the top knob once in 24 hours .Comes with a handcrafted sheesham wood box.Excellent for gifting,Antique style design,Comes with a long chain.', '2019-08-11 11:34:11', 'a:2:{i:0;s:12:\"Antique6.jpg\";i:1;s:12:\"Antique8.jpg\";}', 4, 0),
(7, 'Lmp3Creation Black Classic Vintage Retro Antique Spider Web Net Small Love Heart Shape Round Hole Belt Pocket Watch With Chain For Unisex', 870, '    	Customers will get 1 battery free with every Pocket watch.Forest Black Classic Vintage Retro Antique Spider Web Net Small Love Heart Shape Round Hole Belt .Pocket Watch With Chain.Easy-to-read hands and marker.Case Material: Metal, Case Diameter: 45 millimeters.Tread Mark Registred Original Forest Watch.', '2019-08-11 11:34:30', 'a:3:{i:0;s:12:\"Antique8.jpg\";i:1;s:12:\"Antique9.jpg\";i:2;s:13:\"Antique10.jpg\";}', 4, 0),
(8, 'Lmp3Creation Forest Bronze Vintage Retro Antique Skeleton Hollow Dancing Analogue White Dial Chain Pocket Watch For Unisex', 880, '    	Customers will get 1 battery free with every Pocket watch.Trendy FOREST Antique Finish Dancing Pair Of Peacock Style Chain Pocket watch.Easy-to-read hands and marker.Case Material: Metal, Case Diameter: 45 millimeters.Tread Mark Registred Original Forest Watch.', '2019-08-11 11:34:53', 'a:3:{i:0;s:12:\"Antique8.jpg\";i:1;s:12:\"Antique9.jpg\";i:2;s:13:\"Antique10.jpg\";}', 4, 0),
(9, 'LMP3Creation Forest Bronze Classic Vintage Retro Antique Skeleton Hollow Pocket Watch with Chain', 780, '    	Clients will get 1 battery with every pocket watch.Trendy forest antique forest bronze finish pocket watch.Easy-to-read hands and marker.Case material: metal, case diameter: 45 mm.Tread mark registred forest watch.', '2019-08-11 11:35:13', 'a:3:{i:0;s:12:\"Antique8.jpg\";i:1;s:12:\"Antique9.jpg\";i:2;s:13:\"Antique10.jpg\";}', 9, 0),
(10, 'Lmp3Creation Bronze Classic Vintage Retro Antique Skeleton Hollow Paris Chain Pocket Watch For Unisex', 1190, '    	Customers will get 1 battery free with every Pocket watch.Bronze Classic Vintage Retro Antique Finish Skeleton Hollow Paris Chain Pocket Watch.Easy-to-read hands and marker.Case Material: Metal, Case Diameter: 50 millimeters.Bronze Classic Vintage Retro Antique Finish Skeleton Hollow Pocket Watch.', '2019-08-11 11:35:33', 'a:2:{i:0;s:13:\"Antique10.jpg\";i:1;s:13:\"Antique12.jpg\";}', 9, 0),
(11, 'The Ognissanti Madonna', 1070, '    	The first rooms of the gallery are arranged in chronological order, from the most ancient works to modern ones, and are divided by artists, masters and pupils.If you wish to get a deep knowledge of the Uffizi Gallery artworks, we suggest you to book one of our private tours.', '2019-08-11 11:35:58', 'a:2:{i:0;s:8:\"Art1.jpg\";i:1;s:8:\"Art2.jpg\";}', 5, 0),
(12, 'La Primavera', 1050, '    	Another world-known masterpiece by Botticelli - in the Halls #10-14 - is the ', '2019-08-11 11:36:26', 'a:1:{i:0;s:0:\"\";}', 5, 0),
(13, 'Top Visionaries Who Changed the World', 290, 'Revised edition. Features Elon Musk, Bill Gates, Steve Jobs, Mark Zuckerberg, Jack Ma, Warren Buffett, Richard Branson, Oprah Winfrey and others. What if you could sit down to dine with some of the worldâ€™s most successful entrepreneurs and have a conver', '2019-08-10 21:52:31', 'a:3:{i:0;s:14:\"background.jpg\";i:1;s:18:\"backgroundpixa.jpg\";i:2;s:12:\"building.jpg\";}', 5, 0),
(15, 'Steve Jobs: Success Secrets', 540, 'Visionaries Who Changed the World Series brings significant moments from the professional and personal lives of entrepreneurs who have had a deep impact on the business world. Their determination to meet their goals and the challenges they overcame to suc', '2019-08-10 21:55:40', 'a:2:{i:0;s:13:\"education.jpg\";i:1;s:11:\"fashion.jpg\";}', 4, 0),
(16, 'Elon Musk: Success Secrets', 570, 'Visionaries Who Changed the World Series brings significant moments from the professional and personal lives of entrepreneurs who have had a deep impact on the business world. Their determination to meet their goals and the challenges they overcame to suc', '2019-08-10 21:56:30', 'a:4:{i:0;s:12:\"feelings.jpg\";i:1;s:9:\"food.jpeg\";i:2;s:35:\"Screenshot_2016-05-14-14-50-26.jpeg\";i:3;s:58:\"Screenshot_2018-08-13-23-07-02-494_com.facebook.katana.png\";}', 4, 0),
(17, 'hello hello', 560, '    	hello hello hello ', '2019-08-07 21:53:29', 'a:1:{i:0;s:18:\"Screenshot (7).png\";}', 7, 16),
(18, 'LG K10 ', 200, '    	This is phone', '2019-08-07 22:26:10', 'a:1:{i:0;s:9:\"music.jpg\";}', 10, 8),
(19, '1 plus', 123, 'hello', '2019-08-10 21:54:48', 'a:1:{i:0;s:0:\"\";}', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sent_product`
--

CREATE TABLE `sent_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `product_date` datetime NOT NULL,
  `image` longtext NOT NULL,
  `catid` int(11) NOT NULL,
  `auction_time` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sent_product`
--

INSERT INTO `sent_product` (`product_id`, `product_name`, `price`, `description`, `product_date`, `image`, `catid`, `auction_time`, `user_name`) VALUES
(1, 'Top Visionaries Who Changed the World', 290, 'Revised edition. Features Elon Musk, Bill Gates, Steve Jobs, Mark Zuckerberg, Jack Ma, Warren Buffett, Richard Branson, Oprah Winfrey and others. What if you could sit down to dine with some of the worldâ€™s most successful entrepreneurs and have a conver', '2019-06-27 11:02:12', '', 4, 0, 'Ko Khant'),
(2, 'Steve Jobs: Success Secrets', 540, 'Visionaries Who Changed the World Series brings significant moments from the professional and personal lives of entrepreneurs who have had a deep impact on the business world. Their determination to meet their goals and the challenges they overcame to suc', '2019-06-27 11:09:26', 'Books2.jpg', 4, 0, 'Justin'),
(3, 'Elon Musk: Success Secrets', 570, 'Visionaries Who Changed the World Series brings significant moments from the professional and personal lives of entrepreneurs who have had a deep impact on the business world. Their determination to meet their goals and the challenges they overcame to suc', '2019-06-27 11:12:38', 'Books3.jpg', 4, 0, 'Ko Khant'),
(4, 'Honda Inside', 421145, 'That is a nice car in myanmar', '2019-07-23 20:03:33', 'a:4:{i:0;s:16:\"honda_inside.jpg\";i:1;s:21:\"honda-civic-sedan.jpg\";i:2;s:15:\"lamborghini.jpg\";i:3;s:26:\"lamborghini_murcielago.jpg\";}', 1, 0, 'Ko Khant'),
(5, 'hello world', 560, 'hello hello', '2019-07-30 11:07:20', 'a:1:{i:0;s:12:\"computer.jpg\";}', 6, 0, 'Justin'),
(7, 'indigo', 300, 'That is best.', '2019-08-07 22:46:46', 'a:1:{i:0;s:10:\"juice1.jpg\";}', 9, 8, ''),
(9, 'choice', 333, 'haojfnkj anfcdn  ', '2019-08-07 22:55:25', 'a:1:{i:0;s:20:\"16-26-50-ff_icon.png\";}', 7, 8, 'Ko Khant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phNo` bigint(20) NOT NULL,
  `nrc` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `cartNo` bigint(20) NOT NULL,
  `user_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `email`, `phNo`, `nrc`, `password`, `address`, `dob`, `gender`, `role`, `cartNo`, `user_image`) VALUES
(1, 'Kyaw Lin Htwe', 'kyawlinhtwe97@gmail.com', 9696945971, '12/DALANA(N)123456', '$2y$10$V7pXGFLSQv/X36lGM92V7uLcqhqnfPzEPD0nQMfH7r6A6RS0x2hu.', 'Yangon', '05-01-1997', 'male', 'admin', 21567894354896741, 'cartoons.jpg'),
(2, 'Joker', 'joker@gmail.com', 9123456789, '12/dalana(n)123456', '$2y$10$NZNkzhW/YdUzD0HybpDjEu0slldREUU7Zg5X5eDfrJGtalZWudwSm', 'Yangon', '0000-00-00', 'male', 'admin', 0, 'cartoons.jpg'),
(3, 'Justin', 'justin@gmail.com', 9987654321, '12/dalana(n)654321', '$2y$10$TPwYTv/TatZnlnrj7Bw6/uPxxtCaYQl313u7YrJAV9ZKzfeRhFNli', 'Yangon', '1997-05-22', 'male', 'subscriber', 0, 'Screenshot_2016-05-14-14-50-26.jpeg'),
(4, 'Pyae Pyae', 'pyae@gmail.com', 9976976976, '12/dalana(n)147369', '$2y$10$GcLNfsJP0qQ3XenH4G/k3Ox43my8BoXaPAildLsP7RgeyaHzjlwmu', 'Yangon', '0000-00-00', 'male', 'subscriber', 15935725836914724, ''),
(5, 'Wati', 'wati@gmail.com', 9987123563, '12/dalana(n)654321', '$2y$10$Qg0rajGPt38hAuNTHMbaoOkt8AQG8EcI5pyrxsnARpyyWQPlxR0tS', 'Yangon', '11-11-1997', 'female', 'subscriber', 25814736915935700, ''),
(6, 'Ko Khant', 'kokhant@gmail.com', 9654789333, '12/dalana(n)123456', '$2y$10$JRbZ4YkoA3.89jxWplnT0uJMlmNIr6RjJvL9E3fgYa.sObTbIHvhW', 'Meiktila', '10-3-1990', 'male', 'subscriber', 12345678909876543, 'cartoons.jpg'),
(7, 'Than Swe', 'than@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$wAYn3/He8pzDlxEqH9so2e4pdzO7xryBfv.YQ1Q2uIyDnI4Rj0eie', 'Yangon', '4/2/1998', 'male', 'subscriber', 0, ''),
(8, 'Than Swe', 'than@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$gvgExK/F2ZZG9Ry9K7jKte51UG.BVnG1B1iV3M8ZilTClxXYQ28Q6', 'Yangon', '4/2/1998', 'male', 'subscriber', 0, ''),
(9, 'A Than Lay', 'athan@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$MiQuc2JRQjI5d7FRxqxoWO3trlnSh9JRfQQo6j2EX/.WDaQtSi1YC', 'Yangon', '6/4/1998', 'male', 'subscriber', 0, ''),
(10, 'Than Swe', 'than@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$5/.gxiI7KZ6GWHGk4bWmp.zvOE5RwnJ21VfzuSLIFGvJo/N9psCpa', 'Yangon', '8-5-2019', 'male', 'subscriber', 0, ''),
(11, 'Than Swe', 'than@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$LiQaiXeDAsKmNajIAcGdM.N0auPYjhYyX5ahYfOzT93UiWpsnBnc6', 'Yangon', '', 'male', 'subscriber', 0, ''),
(12, 'Than Swe', 'than@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$f8PCDyHvZTbtJTKvZx.piuB32uGXfaL1gws1ohg32q6Q1FtRYE1a.', 'Yangon', '', 'male', 'subscriber', 0, ''),
(13, 'Than Swe', 'than@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$CZJUJtQkbmKTcVB2rTOBZeVkyUptpGXsx17Z.QjBj.LS1IicmYEeq', 'Yangon', '', 'male', 'subscriber', 0, ''),
(14, 'May Thu Kyaw', 'may@gmail.com', 9456342187, '12/dalana(n)654321', '$2y$10$tmw3mxbBAEfFBmmL69V/EuFqBHfsnMbODyJDKx5U7fPmjbB3xVQFi', 'Yangon', '4/6/1998', 'female', 'subscriber', 0, ''),
(15, 'heinhtet', 'heinhtet@gmail.com', 9987654321, '12/dalana(n)654321', '$2y$10$Hd3J97j6JgXYDKB3ESN4YeRLo5lPI2Kh3PQ7a41eRAShVAyG2YhAe', 'Yangon', '12/8/1998', 'male', 'admin', 21354975631546978, 'education.jpg'),
(16, '<h1>hello</h1>', 'hello@gmail.com', 9696945971, '12/dalana(n)123456', '$2y$10$13FN117RGR0V7lMxhY1nCuUpVBFIZUviodWJYfEJlTBB32e/H6nKG', 'yangon', '8-5-1986', 'male', 'subscriber', 15935725836914724, ''),
(19, 'william david', 'david@gmail.com', 9696945971, '12/dalana(n)123456', '$2y$10$5.r3Pku66cYD8bMihdPGQeqyAq5Nqa4N24hq3Zb2MESSRfwx3yLK.', 'yangon', '14-4-1988', 'male', 'subscriber', 15935725836914724, ''),
(20, 'ggwp', 'ggwp@gmail.com', 9696945971, '12/dalana(n)654321', '$2y$10$K9l/GlwzsjdL4Eh8LBQhe.nk7.e/XqrFMeT2sZ1pt8zlamR7yKFji', 'yangon', '10-10-1983', 'male', 'subscriber', 1548487911985198518, ''),
(21, 'Ko Thuyein Soe', 'thuyein@gmail.com', 9987654321, '12/dalana(n)654321', '$2y$10$jD4HpL/A0SAdX2JZ4kd/pudKYmCL2QJXzGwqd8WUo4ahiP8VdBJYC', 'Yangon', '10-5-1991', 'male', 'subscriber', 15154145416774554, ''),
(22, 'shine', 'shine@gmail.com', 9987654321, '12/dalana(n)123456', '$2y$10$JZcDOnWy4lcOnFWP/X4hsObGnqFfI9lLXul8SjAUlNJIOraJQXtg.', 'Thakata', '14-4-1992', 'male', 'subscriber', 0, ''),
(24, 'Htet Myat Lwin', 'htet@gmail.com', 9987654321, '12/dalana(n)123456', '$2y$10$yY/xYEqaCHM.aCuKPEwu9.wP4mKT/cog8PK2e6k30uYjWV07hXwhS', 'Yangon', '12-3-1989', 'male', 'subscriber', 2512841245481545, 'computer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `auction_price`
--
ALTER TABLE `auction_price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sent_product`
--
ALTER TABLE `sent_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auction_price`
--
ALTER TABLE `auction_price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sent_product`
--
ALTER TABLE `sent_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
