-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2024 at 05:21 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yummydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodcategory`
--

DROP TABLE IF EXISTS `foodcategory`;
CREATE TABLE IF NOT EXISTS `foodcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryImage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `foodcategory`
--

INSERT INTO `foodcategory` (`id`, `categoryName`, `categoryImage`) VALUES
(1, 'Fried Rice', 'FriedRice.jpg'),
(2, 'Drinks', 'Drinks.jpg'),
(3, 'Pizza', 'Pizza.jpg'),
(4, 'Dim Sum', 'DimSum.jpg'),
(5, 'Breakfast', 'Breakfast.jpg'),
(6, 'Dessert', 'Macarons.jpg'),
(7, 'Western', 'Western.jpg'),
(8, 'Chinese Style', 'ChineseStyle.jpg'),
(9, 'Fast Food', 'FastFood.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

DROP TABLE IF EXISTS `foodmenu`;
CREATE TABLE IF NOT EXISTS `foodmenu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foodName` varchar(255) NOT NULL,
  `foodDescription` varchar(255) NOT NULL,
  `foodCategory` varchar(255) NOT NULL,
  `foodPrice` varchar(255) NOT NULL,
  `foodImage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`id`, `foodName`, `foodDescription`, `foodCategory`, `foodPrice`, `foodImage`) VALUES
(1, '100 Plus', '100 Plus (250ml) per unit', 'Drinks', '2.50', '100plus.jpg'),
(2, 'Nasi Goreng Cina', 'A Chinese-style fried rice dish popular in Malaysia and Indonesia, cooked with a mix of meats, vegetables, and soy sauce.', 'Fried Rice', '12.90', 'NasiGorengCina.jpg'),
(3, 'Nasi Goreng Ayam Kunyit', 'An Indonesian dish consisting of fried rice cooked with turmeric-marinated chicken pieces.', 'Daily Discover', '12.90', 'NasiGorengAyamKunyit.jpg'),
(4, 'Salmon Fried Rice', 'Salmon fried rice is a flavorful dish combining cooked rice, salmon pieces, vegetables, and seasonings stir-fried together.', 'Fried Rice', '17.90', 'Salmon-Fried-Rice.jpg'),
(5, 'Mushroom Pizza (Regular)', 'Mushroom pizza is a delicious option topped with various mushrooms, cheese, and savory seasonings.', 'Pizza', '16.90', 'mushroom-pizza-featured.jpg'),
(6, 'Crispy Chicken Burger Square', 'A delicious square-shaped burger with breaded chicken patty, perfect for a satisfying meal.', 'Burger', '13.90', 'CrispyChickenBurgerSquare.jpg'),
(7, 'Lotus Seed Bun', 'Sweet lotus seed paste dim sum buns.', 'Dim Sum', '3.90', 'LotusSeedBun.jpg'),
(8, 'Lo Bak Go', 'The real secret is the aroma from Chinese ham mixed inside (tastes like bacon!) and the sizzling slightly smoky aroma from the grill with a slight crunch on the outside.', 'Dim Sum', '7.90', 'LoBakGo.jpg'),
(9, 'Chao Zhou Dumpling', 'A plump and deliciously filled pouch of pork, cilantro, peanuts, mushrooms, and celery.', 'Dim Sum', '4.90', 'ChaoZhouDumpling.jpg'),
(10, 'Chee Cheong Fun', 'Ingredients of choice like shrimp, bbq pork, bean sprouts, or crunchy bean curd skin. Then it’s covered in a light soy sauce.', 'Dim Sum', '9.90', 'Chee-Cheong-Fun.jpg'),
(11, 'Crispy Spring Rolls', 'Extremely crispy and stuffed plump with chicken and vegetables.', 'Dim Sum', '5.90', 'Crispy-spring-rolls.jpg'),
(12, 'Xiao Long Bao', 'PLUMP with pork and stock that is an explosive risk to you and anyone around you.', 'Dim Sum', '7.90', 'XiaoLongBao.jpg'),
(13, 'Siu Mai', 'Filled with minced pork, bamboo shoots, water chestnut, and garnished with crab roe or sometimes even caviar, these juicy dumplings pop in your mouth with juice.', 'Dim Sum', '7.90', 'SiuMai.jpg'),
(14, 'Red Bean Buns', 'Soft, fluffy steamed buns filled with sweet, creamy red bean paste, Chinese red bean buns taste amazing when made from scratch.', 'Dim Sum', '3.90', 'RedBeanBao.jpg'),
(15, 'Kaya Butter Toast', 'Crispy toasted bread, slathered with a nice layer aromatic kaya jam (Malaysian coconut egg jam), and complete with a thin slice of cold butter.', 'Breakfast', '5.90', 'KayaButterToast.jpg'),
(16, 'Cappucino', 'An espresso-based coffee drink that is traditionally prepared with steamed milk including a layer of milk foam.', 'Daily Discover', '6.90', 'Cappucino.jpg'),
(17, 'Hainanese Chicken Rice', 'A comforting, one-pot dish featuring tender poached chicken and fragrant rice cooked in chicken broth.', 'Chinese Style', '15.90', 'HainaneseChickenRice.jpg'),
(18, 'Nasi Lemak Ayam', 'The rice is cooked with coconut milk to give it a unique taste and fragrance with fried chicken.', 'Daily Discover', '10.90', 'NasiLemakAyam.jpg'),
(19, 'Lemon Ice Tea', 'Refreshing and fruity ice tea with lemon is the perfect drink for summer.', 'Daily Discover', '4.90', 'LemonIceTea.jpg'),
(20, 'Spaghetti Carbonara', 'This classic Italian pasta dish combines a silky cheese sauce with crisp pancetta and black pepper.', 'Daily Discover', '12.90', 'SpaghettiCarbonara.jpg'),
(21, 'Grilled Chicken Chop', 'A piece of crumbed chicken, grilled or fried and served with brown gravy, vegetables and potatoes.', 'Daily Discover', '15.90', 'grilled-bbq-chicken-chop.jpg'),
(22, 'Lemon Honey Mule', 'Sipping a cool cup of water with honey and lemon is both tasty and soothing.', 'Drinks', '3.90', 'LemonHoney.jpg'),
(23, 'Double Choco Shake', 'Double Choco Shake Drink contains soy milk and more ingredients that are ideal for the body. This energy milk drink gives active daily value to the body as it is well mixed with essential ingredients.', 'Drinks', '7.90', 'Double Choco Shake.jpg'),
(24, 'Green Apple Drink', 'Green apple & kiwi juice, green apple with lemon & honey juice, or green apple with spinach, kale & cucumber juice are a must try to get the maximum benefits out of the pure juice.', 'Drinks', '3.90', 'GreenAppleDrink.jpg'),
(25, 'Grapes Juice', 'A completely different flavour profile is produced. Vibrant color and sweet, slightly tart flavor.', 'Drinks', '3.90', 'GrapesJuice.jpg'),
(26, 'Salad', 'Vibrant, in-season produce—fruits and veggies that taste so good on their own that it doesn’t take much to make them into a delicious meal.', 'Breakfast', '7.90', 'Salad.jpg'),
(27, 'Smashed Egg Toast', 'Golden toast topped with a perfectly smashed egg, creating a deliciously creamy and satisfying breakfast or snack.', 'Breakfast', '5.90', 'Smashed-Egg-Toast.jpg'),
(28, 'Panna Cotta', 'Delicate and smooth, our panna cotta is infused with vanilla bean and served with a vibrant berry coulis for a perfect balance of flavors and textures', 'Dessert', '6.90', 'Panna Cotta.jpg'),
(29, 'Chocolate Lava Cake', 'Indulge in rich, molten chocolate goodness with every bite of our decadent chocolate lava cake.', 'Dessert', '9.90', 'Chocolate Lava Cake.jpg'),
(30, 'Mango Sticky Rice', 'Transport yourself to tropical bliss with our refreshing mango sticky rice, featuring ripe mango slices atop sweet coconut-infused sticky rice, drizzled with coconut cream.', 'Dessert', '7.90', 'Mango Sticky Rice.jpg'),
(31, 'Apple Pie', 'Enjoy the comforting aroma and sweet-tart flavor of warm, cinnamon-spiced apples encased in a flaky, buttery crust in our homemade apple pie.', 'Dessert', '8.90', 'Apple Pie.jpg'),
(32, 'Chocolate Chip Cookies', 'Enjoy the simple pleasure of freshly baked chocolate chip cookies, with crisp edges, chewy centers, and generous chunks of chocolate in every bite.', 'Dessert', '5.90', 'Chocolate Chip Cookies.jpg'),
(33, 'New York Cheesecake', 'Savor the creamy, velvety texture and rich flavor of our New York-style cheesecake, topped with a tangy strawberry compote.', 'Dessert', '9.90', 'New York Cheesecake.jpg'),
(34, 'Tiramisu', 'Experience the perfect balance of creamy mascarpone cheese, espresso-soaked ladyfingers, and a dusting of cocoa in our classic tiramisu.', 'Dessert', '9.90', 'Tiramisu.jpg'),
(35, 'Grilled Ribeye Steak', 'Sink your teeth into a juicy, perfectly grilled ribeye steak, seasoned to perfection and served with your choice of side dishes.', 'Western', '16.90', 'Grilled Ribeye Steak.jpg'),
(36, 'Classic Cheeseburger', 'Bite into nostalgia with our classic cheeseburger, featuring a juicy beef patty, melted cheese, crisp lettuce, ripe tomato, and tangy pickles, all nestled in a soft bun.', 'Western', '11.90', 'Classic Cheeseburger.jpg'),
(37, 'Chicken Alfredo Pasta', 'Comfort food at its finest, our chicken Alfredo pasta features tender chicken breast strips tossed with creamy Alfredo sauce and served over a bed of fettuccine noodles.', 'Western', '14.90', 'Chicken Alfredo Pasta.jpg'),
(38, 'Chicken Caesar Wrap', 'Enjoy the classic flavors of a Caesar salad wrapped up in a convenient package with our chicken Caesar wrap, featuring grilled chicken, crisp romaine lettuce, Parmesan cheese, and Caesar dressing, all wrapped in a warm tortilla.', 'Western', '5.90', 'Chicken Caesar Wrap.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phoneNumber`, `address`, `password`) VALUES
(7, 'test3', 'test3@gmail.com', '0123456789', '123, jalan hi, taman hi,43000, sungai long, kajang', '25d55ad283aa400af464c76d713c07ad');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
