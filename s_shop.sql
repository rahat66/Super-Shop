-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 05:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(225) NOT NULL,
  `adminUser` varchar(225) NOT NULL,
  `adminEmail` varchar(225) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`) VALUES
(1, 'Suravi Saha', 'admin', 'admin@gmail.com', '123'),
(2, 'ABC', 'admin2', 'abc@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(3, 'Dell'),
(6, 'Pepsi'),
(9, 'TARME'),
(10, 'Taffy Candy'),
(11, 'Dilettante'),
(14, 'YumEarth '),
(15, 'TWIZZLERS '),
(16, 'Orbit '),
(17, 'ASUS '),
(18, 'HP'),
(19, 'Samsung '),
(22, 'M&M\'S'),
(23, 'Artelier'),
(24, 'Alex and Ani'),
(25, 'Michael Kors');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `qtn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sId`, `productId`, `qtn`) VALUES
(5, 'gc9abjlfbauheurvqldvnn45t0', 7, 1),
(6, 'gc9abjlfbauheurvqldvnn45t0', 12, 1),
(7, 'gc9abjlfbauheurvqldvnn45t0', 11, 1),
(9, 'fjsu5621aou56p5u0joea1fob6', 11, 1),
(10, 'nffs06mg7pt86qde153vbaed25', 9, 1),
(11, '7j9hocd3diee72l3n3bcm2pb41', 9, 1),
(12, 'dscmak6n5tsvc06a9rk98oj741', 5, 1),
(14, '3kr4dqm3qoi194nitfcvslps23', 12, 1),
(19, '01fu14fio6g64tgkgjlfnerah4', 9, 1),
(20, '01fu14fio6g64tgkgjlfnerah4', 11, 1),
(23, 'hb5bif0df7hoj29htiuhncieb7', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(9, 'Hardware'),
(11, 'Foods'),
(13, 'Jewelry');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `custName` varchar(225) NOT NULL,
  `custEmail` varchar(50) NOT NULL,
  `custPass` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `division` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `custName`, `custEmail`, `custPass`, `number`, `division`, `district`, `address`) VALUES
(1, 'Mr Z', 'mdz@gmail.com', '123', 1823394560, 'dsf', 'dsf', 'asdf'),
(2, 'Suravi Saha', 'suravisaha45@gmail.com', 'suravi', 1835567893, 'Comilla', 'Comilla', 'NSTU Sonapur, Noakhali.'),
(3, 'Tania', 'tania@gmail.com', '1234', 182334567, 'Chattogram', 'Noakhali', 'NSTU Sonapur, Noakhali.'),
(4, 'Pew Kaha', 'pew@gmail.com', '123', 1923345683, 'Chattogram', 'Noakhali', 'NSTU, Sonapur, Noakhali');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `orderId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `orderStatus` tinyint(4) NOT NULL,
  `amount` float(10,3) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`orderId`, `custId`, `orderStatus`, `amount`, `orderDate`) VALUES
(5, 3, 1, 36.820, '2018-05-02'),
(6, 2, 1, 114.000, '2018-05-02'),
(7, 3, 1, 71.000, '2018-05-04'),
(8, 3, 1, 175.000, '2018-05-04'),
(9, 4, 1, 391.000, '2018-05-05'),
(10, 4, 0, 272.000, '2018-05-06'),
(11, 2, 0, 155.000, '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `orderedproduct`
--

CREATE TABLE `orderedproduct` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qtn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderedproduct`
--

INSERT INTO `orderedproduct` (`orderId`, `productId`, `qtn`) VALUES
(5, 8, 2),
(5, 10, 1),
(6, 5, 1),
(6, 13, 1),
(7, 11, 2),
(8, 12, 1),
(9, 7, 2),
(9, 12, 1),
(10, 5, 1),
(10, 7, 1),
(11, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(225) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` longtext NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(225) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(4, 'Samsung Galaxy S9 Unlocked Smartphone', 9, 3, ' Super Speed Dual Pixel Camera\r\n Infinity Display: edge-to-edge immersive screen, enhancing your entertainment experience*\r\n\r\n IP68 rating: withstands splashes, spills, and rain so it can take a dip, worry-free***\r\n\r\nInternal Memory 64 GB. Expandable Storage up to 400GB****\r\nFast Wireless Charging: Avoid the wires and power up quickly by placing your phone on a Fast Wireless Charger.*****\r\n                            ', 260.00, 'uploads/b33cce9ab2.jpg', 0),
(5, 'Airheads Bars', 11, 10, '<ul>\r\n<li>Chewy, tangy and full of fruit flavor that won\'t stop. Each bar weighs 16 grams</li>\r\n<li>Nut-free, Gluten-free and Low-fat No â€œBIG 8â€ Allergens (no milk, eggs, peanuts, tree nuts, soy, fish, shellfish, wheat)</li>\r\n<li>Each box includes a variety of orange, blue raspberry, cherry, watermelon, grape and white mystery mini bars</li>\r\n<li>Perfect size for sharing, parties and holidays like Halloween</li>\r\n<li>Get creative and cut or mold Airheads into custom treats Visit pinterest com/airheadscandy for ideas</li>\r\n</ul>', 114.00, 'uploads/1f5c40c93f.jpg', 0),
(6, 'TruffleCremes Double Milk Chocolate', 11, 11, '<ul>\r\n<li>Lightly sweet with a cool mint flavor</li>\r\n<li>Individually wrapped Peppermint Chocolate candies</li>\r\n<li>Made with all natural, high quality, velvety milk chocolate & natural peppermint oil</li>\r\n<li>Total Net wt. 28oz; Bulk size great for parties, office occasions\r\n</li>\r\n</ul>', 120.00, 'uploads/bd83919607.jpg', 1),
(7, 'M&M\'S Milk Chocolate Candy', 11, 22, '<ul>\r\n<li>Contains one (1) 42-ounce bag of M&M\'S Milk Chocolate Candy</li>\r\n<li>Made with real milk chocolate and surrounded by a colorful candy shell. Soft and creamy chocolate center</li>\r\n<li>M&M\'S Party-size Bags have a resealable zipper so they\'re easy to serve at your next big celebration</li>\r\n<li>From cookies to brownies, M&M\'S Chocolate Candies are a colorful way to enhance your favorite desserts</li>\r\n<li>Add delicious fun and color to your day with M&M\'S Milk Chocolate Candies</li>\r\n</ul>\r\n', 108.00, 'uploads/5b1e07ac65.jpg', 0),
(8, 'YumEarth Organic Lollipops', 11, 14, '<ul>\r\n<li>Conatins one 12.3 oz bag (50 lollipops)</li>\r\n<li>USDA Organic, Vegan, Gluten Free, Non-GMO Project Verified, Kosher Pareve</li>\r\n<li>Free from top allergens. No Egg, fish, milk, peanuts, shellfish, soy, tree-nuts and gluten (Contains Annatto)</li>\r\n<li>Flavors May Include: Pomegranate Pucker, Wet-Face Watermelon, Strawberry Smash, Googly Grape, Very Very Cherry, Perfectly Peach, Razzmatazz Berry, Mango Tango</li>\r\n<li>No artificial flavors or colors</li>\r\n</ul>', 115.00, 'uploads/922599ef2d.jpg', 1),
(9, 'TWIZZLERS Licorice Candy', 11, 15, '<ul>\r\n<li>Contains one (1) 105-piece re-closable container of Twizzlers strawberry flavored candy</li>\r\n<li>Fresh individually wrapped candy that is perfect for Halloween trick-or-treat fun</li>\r\n<li>Twizzlers is the prime pantry item for everyday family treats or share at the office with your co-workers</li>\r\n<li>This chewy, low fat, long-lasting snack is great on-the go, even in warm weather</li>\r\n</ul>', 105.00, 'uploads/b6df609d8d.jpg', 0),
(10, 'Orbit Wintermint Sugarfree Gum', 11, 16, '<ul>\r\n<li>Make the most of the moment with the clean and fresh mouth feeling of Orbit Gum</li>\r\n<li>Weather any storm with the rush of cool mint flavor from Orbit Wintermint Gum</li>\r\n<li>A sweet treat for 5 calories or less per piece</li>\r\n<li>Orbit Gum has received the American Dental Association Seal of Acceptance in recognition of the oral-care benefits of chewing sugar-free gum</li>\r\n<li>Package includes 12 Orbit Wintermint Sugar Free Gum packs, 14 individually wrapped pieces in each pack.</li>\r\n</ul>', 111.00, 'uploads/d55bc55104.jpg', 1),
(11, 'Hinge Cuff Bracelet', 13, 23, '<ul>\r\n<li>The Sweet Pea story combines pave pods, marquise shapes and special cushion cut diamond simulant cubic zirconia.</li>\r\n<li>Made in China</li>\r\n<li>A statement cuff hinge bracelet featuring exquisite pave claws that wrap around the wrist</li>\r\n<li>Imported</li>\r\n</ul>', 120.00, 'uploads/5f9a07a13e.jpg', 0),
(12, 'Expandable Bracelet ', 13, 24, '<ul>\r\n<li>Expandable wire bangle bracelet featuring oval-shape floral \"friend\" charm and three smaller charms</li>\r\n<li>Made in the USA</li>\r\n</ul>', 125.00, 'uploads/71034e3335.jpg', 1),
(13, 'Tri-Tone and Pave Logo Grommet Stack Ring Set', 13, 25, '<ul>\r\n<li>Rings: 0.75\"</li>\r\n<li>Perfect for layering or wearing alone, this Michael Kors set includes three logo-accented, pavÃ© crystal-studded rings in gold-, silver-, and rose gold-tone metal.</li>\r\n<li>Measurements: 0.75\"</li>\r\n<li>Finish: Polished</li>\r\n</ul>', 185.00, 'uploads/ebcea7a38c.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productreview`
--

CREATE TABLE `productreview` (
  `reviewId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreview`
--

INSERT INTO `productreview` (`reviewId`, `productId`, `custId`, `body`, `date`) VALUES
(1, 11, 2, 'Very good product.', '2018-04-30'),
(2, 9, 2, 'Nice One', '2018-04-30'),
(4, 5, 3, 'Nice Product. Chewy, tangy and full of fruit flavor that won\'t stop. Each bar weighs 16 grams', '2018-05-01'),
(6, 7, 4, 'Made with real milk chocolate and surrounded by a colorful candy shell. Soft and creamy chocolate center', '2018-05-05'),
(7, 5, 4, 'Nice Product.', '2018-05-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderedproduct`
--
ALTER TABLE `orderedproduct`
  ADD PRIMARY KEY (`orderId`,`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productreview`
--
ALTER TABLE `productreview`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerorder`
--
ALTER TABLE `customerorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productreview`
--
ALTER TABLE `productreview`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
