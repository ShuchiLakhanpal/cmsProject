-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql302.byetcluster.com
-- Generation Time: Nov 28, 2017 at 09:03 PM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b7_19983540_newscms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  `newsId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category`, `newsId`, `userId`) VALUES
(1, 'Add Category', NULL, NULL),
(3, 'news', NULL, NULL),
(4, 'Entertainment', NULL, NULL),
(5, 'World', NULL, NULL),
(6, 'Feature', NULL, NULL),
(7, 'Breaking', NULL, NULL),
(8, 'Sports', NULL, NULL),
(9, 'Food', NULL, NULL),
(10, 'Education', NULL, NULL),
(11, 'Technology', NULL, NULL),
(12, 'Culture', NULL, NULL),
(15, 'India', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `newsId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `address`, `newsId`, `email`, `status`, `comment`) VALUES
(2, 'ert', '', 165, 'asdd@gmail.com', 'pending', 'hhh'),
(15, 'Shuchi', '', 8, 'shuchi.lakhanpal@trisstudent.com', 'Approved', 'Hello, Modi visited Singapore to celebrate 50 years '),
(6, 'aseem', '', 166, 'aseem@gmail.com', 'Approved', 'qwerrtyy'),
(7, 'aseem', '', 166, 'aseem@gmail.com', 'pending', 'qwerrtyy'),
(8, 'Vivek', '', 166, 'v@gmail.com', 'pending', 'aseem '),
(9, 'Vivek', '', 166, 'v@gmail.com', 'Approved', 'aseem '),
(11, 'Vivek', '', 166, 'v@gmail.com', 'Approved', 'aseem '),
(12, 'Vivek', '', 166, 'v@gmail.com', 'Approved', 'aseem '),
(13, 'shuchi', '', 166, 'a@h.com', 'Pending', 'Hello'),
(14, 'name', '', 176, 'nae@gmail.com', 'Approved', 'hello\r\n\r\nExperiencing issues with phpMyAdmin? Log out of your control panel, clear cookies and sessions [not available in all browsers] and log back into your control panel and try again..\r\n\r\n\r\nDid you know premium hosting allows you to create individual MySQL users and privileges? All premium accounts have upto 1GB of mysql storage. To see a demo: Click here\r\n\r\nPremium hosting MySQL server benefits :\r\n- Create individual MySQL users.\r\n- Set individual MySQL grants per user.\r\n- Remote MySQL connections.\r\n'),
(16, 'Aseem', '', 4, 'aseem@gmail.com', 'Approved', 'Hi!\r\nBehind the light-hearted banter, the India-Singapore defence'),
(17, 'Aseem', '', 204, 'aseem@gmail.com', 'pending', 'Hello'),
(18, 'Testing', '', 203, 'test@gmail.com', 'Approved', 'test test\r\nAt least one expert said its lofted trajectory suggested an actual range of 13,000 kilometres that would bring every city in the continental United States within ran'),
(19, 'To test', '', 196, 'toy@r', 'Approved', 'The South Korean military responded by staging a precision-strike missile exercise as it has done following previous North Korean tests.');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`) VALUES
(124, 'facebook.png'),
(125, 'desert.jpg'),
(126, 'collage.jpg'),
(127, 'banner.jpg'),
(128, 'weather.jpg'),
(129, 'newsRoom.jpg'),
(130, 'baking.jpg'),
(131, 'DSCF3599.JPG'),
(132, 'DSCF3574.JPG'),
(135, 'DSCF3458.JPG'),
(137, 'DSCF3559.JPG'),
(139, 'DSCF3453.JPG'),
(140, 'DSCF3558.JPG'),
(141, 'cricket.jpg'),
(142, 'grapes.jpg'),
(143, '410.JPG'),
(144, '1471104_693097324055501_1782285232_n.jpg'),
(145, 'baking1.jpg'),
(146, 'fine-dining-table.png'),
(147, '23c694586a34c0273eb4931eef34d549fancyfurniture.jpg'),
(149, 'DSCF3137.JPG'),
(150, 'Luisberg_NewWaterford 007.JPG'),
(151, 'DSCF2952_t_b&w.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(600) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `descriptionId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `date`, `category`, `title`, `image`, `description`, `author`, `username`, `status`, `tags`, `userId`, `descriptionId`, `categoryId`) VALUES
(166, '2017-11-21 00:00:00', 'World', ' this is new report', 'HeaderBackground_v.png', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><img src="media/newsRoom.jpg" alt=" newsRoom.jpg" width="300" height="168" /></p>\r\n</body>\r\n</html>', 'aseem', '', 'published', 'save', NULL, NULL, NULL),
(192, '2017-11-28 00:00:00', 'Add Category', ' Former India captain Mahendra Singh Dhoni usually keeps mum on the controversial issues and refrains from giving replies to his critics. But this time, the Ranchi stalwart broke the mould and gave a fitting reply to his teammate and friend Suresh Raina o', 'collage.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Former India captain Mahendra Singh Dhoni usually keeps mum on the controversial issues and refrains from giving replies to his critics. But this time, the Ranchi stalwart broke the mould and gave a fitting reply to his teammate and friend Suresh Raina on his comment that Dhoni often gets angry on the cricket field.&nbsp;<a href="https://sports.ndtv.com/cricket/ms-dhoni-backs-virat-kohli-says-needs-preparation-time-for-tough-tours-1780242">Dhoni said he conducted himself</a>&nbsp;according to the situation. "We also enjoy inside the dressing room, we talk, the pitch-level is sometimes high and sometimes low. The meaning of cool that we associate is calm and if not cool then an angry one," he said. "There are many zones in the middle of it where you enjoy and make fun. Once (I am playing) in the ground, I do not joke around, but inside the dressing room I enjoy a lot. So, I conduct myself according to how I think I should conduct myself in different areas."</p>\r\n</body>\r\n</html>', 'aseem', '', 'draft', '', NULL, NULL, NULL),
(178, '2017-11-24 00:00:00', 'World', ' Similar to tables and dark tables, use the modifier classes', 'recipes.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><img src="media/fine-dining-table.png" alt=" fine-dining-table.png" width="100" height="42" /></p>\r\n<div>Hoverable rows</div>\r\n<p>Add&nbsp;<code class="highlighter-rouge">.table-hover</code>&nbsp;to enable a hover state on table rows within a</p>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(179, '2017-11-25 00:00:00', 'World', ' New Title', 'DSCF3133.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="media/baking1.jpg" alt=" baking1.jpg" width="200" height="150" /></p>\r\n<ul>\r\n<li>Hello</li>\r\n</ul>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(170, '2017-11-24 00:00:00', 'World', ' New', '410.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><img src="media/410.JPG" alt=" 410.JPG" width="200" height="150" /></p>\r\n</body>\r\n</html>', 'aseem', '', 'Published', '', NULL, NULL, NULL),
(191, '2017-11-28 00:00:00', 'World', ' Test India', 'bajrangi.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>"I am not a pilot," said Dr Ng, asked about whether Singapore plans to buy the Tejas. "But I can say it felt like I was riding in a car; it was really smooth."</p>\r\n<p>"I am not a pilot," said Dr Ng, asked about whether Singapore plans to buy the Tejas. "But I can say it felt like I was riding in a car; it was really smooth."</p>\r\n<p>"I am not a pilot," said Dr Ng, asked about whether Singapore plans to buy the Tejas. "But I can say it felt like I was riding in a car; it was really smooth."</p>\r\n<p>"I am not a pilot," said Dr Ng, asked about whether Singapore plans to buy the Tejas. "But I can say it felt like I was riding in a car; it was really smooth."</p>\r\n<p>"I am not a pilot," said Dr Ng, asked about whether Singapore plans to buy the Tejas. "But I can say it felt like I was riding in a car; it was really smooth."</p>\r\n</body>\r\n</html>', 'aseem', '', 'draft', '', NULL, NULL, NULL),
(175, '2017-11-24 00:00:00', 'Education', ' check', '410.JPG', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><img src="media/grapes.jpg" alt=" grapes.jpg" width="284" height="177" /></p>\r\n</body>\r\n</html>', 'aseem', '', 'draft', '', NULL, NULL, NULL),
(189, '2017-11-28 00:00:00', 'feature', 'test', 'cnn.jpg', 'test', 'aseem', '', 'draft', NULL, NULL, NULL, NULL),
(190, '2017-11-29 00:00:00', 'food', 'India ', 'cnn.jpg', 'India''s indigenous light combat aircraft, the Tejas, which is being inducted into the Air Force - has a new brand ambassador. Ng Eng Hen, 59, the Defence Minister of the island nation of Singapore, flew in the rear cockpit of the plane from the Kalaikunda airbase in West Bengal.', 'aseem', '', 'draft', NULL, NULL, NULL, NULL),
(187, '2017-11-26 00:00:00', 'Education', ' new pending', '410.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>new pending</p>\r\n</body>\r\n</html>', 'viveklakhan', '', 'draft', '', NULL, NULL, NULL),
(174, '2017-11-24 00:00:00', 'Feature', ' New news for', 'eggPlating.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><img src="media/fine-dining-table.png" alt=" fine-dining-table.png" width="200" height="83" /></p>\r\n</body>\r\n</html>', 'aseem', '', 'Published', '', NULL, NULL, NULL),
(180, '2017-11-25 00:00:00', 'Breaking', 'fret', '410.JPG', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>this is it<img src="media/baking1.jpg" alt=" baking1.jpg" width="100" height="75" /></p>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(181, '2017-11-25 00:00:00', 'Add Category', ' new try', 'Luisberg_NewWaterford 012.JPG', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>try test</p>\r\n</body>\r\n</html>', 'viveklakhan', '', 'draft', '', NULL, NULL, NULL),
(182, '2017-11-26 00:00:00', 'Feature', ' updated news', 'Luisberg_NewWaterford 005.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style="padding-left: 30px;"><img src="media/Luisberg_NewWaterford 007.JPG" alt=" Luisberg_NewWaterford 007.JPG" width="200" height="113" /></p>\r\n<p style="padding-left: 30px;">The pagination component should be wrapped in a&nbsp;<code>&lt;nav&gt;</code>&nbsp;element to identify it as a navigation section to screen readers and other assistive technologies. In addition, as a page is likely to have more than one such navigation section already (such as the primary navigation in the header, or a sidebar navigation), it is advisable to provide a descriptive&nbsp;<code>aria-label</code>&nbsp;for the&nbsp;<code>&lt;nav&gt;</code>which reflects its purpose. For example, if the pagination component is used to navigate between a set of search results, an appropriate label could be</p>\r\n<p style="padding-left: 30px;">The pagination component should be wrapped in a&nbsp;<code>&lt;nav&gt;</code>&nbsp;element to identify it as a navigation section to screen readers and other assistive technologies. In addition, as a page is likely to have more than one such navigation section already (such as the primary navigation in the header, or a sidebar navigation), it is advisable to provide a descriptive&nbsp;<code>aria-label</code>&nbsp;for the&nbsp;<code>&lt;nav&gt;</code>which reflects its purpose. For example, if the pagination component is used to navigate between a set of search results, an appropriate label could be</p>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(188, '2017-11-27 00:00:00', 'Culture', ' author', 'DSCF2950.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>author</p>\r\n</body>\r\n</html>', 'vivek', '', 'draft', '', NULL, NULL, NULL),
(193, '2017-11-28 00:00:00', 'Feature', ' PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.', 'cnn.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h1><strong><span style="font-size: 12pt;">After Low Turnout Alleged At Some PM Rallies, "Come See Son Of Gujarat" Campaign</span></strong></h1>\r\n<h2 class="ins_descp"><span style="font-size: 12pt;">PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</span></h2>\r\n<p><span style="font-size: 12pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="media/DSCF3137.JPG" alt=" DSCF3137.JPG" width="354" height="200" /></span></p>\r\n</body>\r\n</html>', 'aseem', '', 'Published', '', NULL, NULL, NULL),
(194, '2017-11-28 00:00:00', 'Feature', ' PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.', 'aiadmk-merger_650x400_41503319148.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h2 class="ins_descp"><span style="font-size: 12pt;">PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</span></h2>\r\n<h2 class="ins_descp"><span style="font-size: 12pt;">PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</span></h2>\r\n<h2 class="ins_descp"><span style="font-size: 12pt;">PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</span></h2>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(195, '2017-11-28 00:00:00', 'World', ' PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.', 'DSCF3935.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.<img src="media/410.JPG" alt=" 410.JPG" width="448" height="336" /></p>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(196, '2017-11-28 00:00:00', 'Feature', ' The PM held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.', 'DSCF3926.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>The PM held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>The PM held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>The PM held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>The PM held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>The PM held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</p>\r\n<p>BJP sources say that the party is concerned with the scale of the audience in Jasdan and Dhari. The CID section of the police, which compiles reports for the government on the turnout for security and others reasons, suggests that there were about 7,000 people to watch Mr Modi in Jasdan, and about 10,000 in Dhari.</p>\r\n<p>Anil Jain, a senior BJP leader in charge of the Gujarat campaign, told NDTV he did not wish to comment on reports of an underwhelming turnout at some rallies for the PM. "Talk to the local candidates," he said.</p>\r\n<div id="tbl-md-wid">&nbsp;<img src="media/DSCF2952_t_b&amp;w.jpg" alt=" DSCF2952_t_b&amp;w.jpg" width="354" height="200" /></div>\r\n</body>\r\n</html>', 'toy', '', 'Published', '', NULL, NULL, NULL),
(197, '2017-11-28 00:00:00', 'Add Category', ' The missile reportedly flew east from South Pyongang Province!!!!!', 'banner.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class="ins_headline">\r\n<h2 class="ins_descp"><strong><span style="font-size: 14pt;">The North has stoked international alarm over its banned nuclear missile program but before Tuesday it had not staged a missile test since September 15, raising hopes that ramped-up sanctions were having an impact.</span></strong></h2>\r\n<p><span style="font-size: 10pt;">The North has stoked international alarm over its banned nuclear missile program but before Tuesday it had not staged a missile test since September 15, raising hopes that ramped-up sanctions were having an impact.</span></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</body>\r\n</html>', 'toy', '', 'Published', '', NULL, NULL, NULL),
(198, '2017-11-28 00:00:00', 'World', ' Pyongyang has conducted its first ballistic test launch in two-months, reigniting tensions in the region', 'DSCF3925.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class="hide-on-mobile"><header class="content__head tonal__head tonal__head--tone-news\r\n    \r\n    ">\r\n<div class="tonal__standfirst u-cf">\r\n<div class="gs-container">\r\n<div class="content__main-column">\r\n<div class="content__standfirst" data-link-name="standfirst" data-component="standfirst">\r\n<p>Pyongyang has conducted its first ballistic test launch in two-months, reigniting tensions in the region</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</header></div>\r\n<div class="content__main tonal__main tonal__main--tone-news">\r\n<div class="gs-container">\r\n<div class="content__main-column content__main-column--article js-content-main-column ">\r\n<div class="js-score">&nbsp;</div>\r\n<div class="js-sport-tabs football-tabs content__mobile-full-width">&nbsp;</div>\r\n<figure id="img-1" class="media-primary media-content()  " data-component="image" data-media-id="8c4073ec3817bf4a6aef93eae9179f754251c1eb">\r\n<div class="u-responsive-ratio"><picture><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=620&amp;q=20&amp;auto=format&amp;usm=12&amp;fit=max&amp;dpr=2&amp;s=a9ecbdd9ddff4eacf39ce50b3fc64f05 1240w" media="(min-width: 980px) and (-webkit-min-device-pixel-ratio: 1.25), (min-width: 980px) and (min-resolution: 120dpi)" sizes="620px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=620&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=9d5aab77d8dc1e2bd19923d1f6858221 620w" media="(min-width: 980px)" sizes="620px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=700&amp;q=20&amp;auto=format&amp;usm=12&amp;fit=max&amp;dpr=2&amp;s=f87ded3f23609e4e21ba86f8a9c70e76 1400w" media="(min-width: 740px) and (-webkit-min-device-pixel-ratio: 1.25), (min-width: 740px) and (min-resolution: 120dpi)" sizes="700px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=700&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=3ecd061e395eca190954f9ba8ce85fd9 700w" media="(min-width: 740px)" sizes="700px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=620&amp;q=20&amp;auto=format&amp;usm=12&amp;fit=max&amp;dpr=2&amp;s=a9ecbdd9ddff4eacf39ce50b3fc64f05 1240w" media="(min-width: 660px) and (-webkit-min-device-pixel-ratio: 1.25), (min-width: 660px) and (min-resolution: 120dpi)" sizes="620px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=620&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=9d5aab77d8dc1e2bd19923d1f6858221 620w" media="(min-width: 660px)" sizes="620px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=645&amp;q=20&amp;auto=format&amp;usm=12&amp;fit=max&amp;dpr=2&amp;s=9c170b83872d531d237ae5644820a281 1290w" media="(min-width: 480px) and (-webkit-min-device-pixel-ratio: 1.25), (min-width: 480px) and (min-resolution: 120dpi)" sizes="645px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=645&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=efa10c416d6e9b4e1785154f3ca06e92 645w" media="(min-width: 480px)" sizes="645px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=465&amp;q=20&amp;auto=format&amp;usm=12&amp;fit=max&amp;dpr=2&amp;s=1b723939c274fd37507733deca63bc1a 930w" media="(min-width: 0px) and (-webkit-min-device-pixel-ratio: 1.25), (min-width: 0px) and (min-resolution: 120dpi)" sizes="465px" /><source srcset="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=465&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=d038b3d71e1754c18fdd1277631ba07e 465w" media="(min-width: 0px)" sizes="465px" /><img class="maxed responsive-img" src="https://i.guim.co.uk/img/media/8c4073ec3817bf4a6aef93eae9179f754251c1eb/959_304_1230_738/master/1230.jpg?w=300&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=20c07e9d96d5b1826f7a1d04377f89e7" alt="The North Korean leader, Kim Jong-un." /></picture></div>\r\n<figcaption class="caption caption--main caption--img">&nbsp;The North Korean leader, Kim Jong-un. Photograph: UPI / Barcroft Images</figcaption>\r\n</figure>\r\n<div class="content__meta-container js-content-meta js-football-meta u-cf\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    ">\r\n<div class="meta__extras ">\r\n<div class="meta__social" data-component="share">&nbsp;</div>\r\n<div class="meta__numbers">\r\n<div class="u-h meta__number" data-discussion-id="/p/7k7e6" data-commentcount-format="content" data-discussion-closed="true">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p class="byline" data-link-name="byline" data-component="meta-byline"><a class="tone-colour" href="https://www.theguardian.com/profile/julianborger" rel="author" data-link-name="auto tag link">Julian Borger</a>&nbsp;in Washington and&nbsp;<a class="tone-colour" href="https://www.theguardian.com/profile/justinmccurry" rel="author" data-link-name="auto tag link">Justin McCurry</a>&nbsp;in Tokyo</p>\r\n<p class="content__dateline" aria-hidden="true"><time class="content__dateline-wpd js-wpd content__dateline-wpd--modified" datetime="2017-11-28T18:46:47+0000" data-timestamp="1511894807000">Tuesday 28 November 2017&nbsp;<span class="content__dateline-time">18.46&nbsp;GMT</span></time><time class="content__dateline-lm js-lm u-h" datetime="2017-11-28T21:25:40+0000" data-timestamp="1511904340000">Last modified on Tuesday 28 November 2017&nbsp;<span class="content__dateline-time">21.25&nbsp;GMT</span></time></p>\r\n</div>\r\n<div class="content__article-body from-content-api js-article__body" data-test-id="article-review-body">\r\n<p><a class="u-underline" href="https://www.theguardian.com/world/north-korea" data-link-name="in body link">North Korea</a>&nbsp;has conducted a night test of a long-range ballistic missile which landed off the coast of Japan, triggering a South Korea test-launch in response and bringing a return to high tension to the region after a lull of more than two months.</p>\r\n<p>The Pentagon issued a statement saying that the weapon tested was an intercontinental ballistic missile (ICBM). Initial reports from Seoul suggested that it came from a mobile launcher, and was fired at about 3am local time.</p>\r\n<p>The missile was reported to have flown for 50 minutes, on a very high trajectory reaching 4,500 km above the earth (more than ten times higher than the orbit of Nasa&rsquo;s International Space Station) before coming down nearly 1,000 km from the launch site off the west coast of Japan.</p>\r\n<aside class="element element-rich-link element--thumbnail element-rich-link--upgraded" data-component="rich-link" data-link-name="rich-link-2 | 1">\r\n<div class="rich-link tone-news--item ">\r\n<div class="rich-link__container">\r\n<div class="rich-link__image-container u-responsive-ratio"><img src="https://i.guim.co.uk/img/media/7983d2aefbc5654bf53875c866a8650178a2c161/0_0_4896_2938/master/4896.jpg?w=460&amp;q=55&amp;auto=format&amp;usm=12&amp;fit=max&amp;s=28df0bb545ac4bda19916cd324850333" /></div>\r\n<div class="rich-link__header">\r\n<h1 class="rich-link__title"><a class="rich-link__link">Donald Trump plans to declare North Korea a state sponsor of terror</a></h1>\r\n</div>\r\n<div class="rich-link__read-more">\r\n<div class="rich-link__arrow">&nbsp;</div>\r\n&nbsp;\r\n<div class="rich-link__read-more-text">Read more</div>\r\n</div>\r\n</div>\r\n</div>\r\n</aside>\r\n<p>This would make it the most powerful of the three ICBM&rsquo;s&nbsp;<a class="u-underline" href="https://www.theguardian.com/world/north-korea" data-link-name="auto-linked-tag" data-component="auto-linked-tag">North Korea</a>&nbsp;has tested so far. Furthermore, the mobile night launch appeared aimed at testing new capabilities and demonstrating that Pyongyang would be able to strike back to any attempt at a preventative strike against the regime.</p>\r\n<p>&ldquo;The missile was launched from Sain Ni, North Korea, and traveled about 1,000 km before splashing down in the Sea of Japan, within Japan&rsquo;s economic exclusion zone. We are working with our interagency partners on a more detailed assessment of the launch,&rdquo; Pentagon spokesman, Col Robert Manning said.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 'werty', '', 'Published', '', NULL, NULL, NULL),
(199, '2017-11-28 00:00:00', 'World', ' Bali volcano: glowing red lava seen on Mount Agung', 'drought.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>The glow from a ring of incandescent red lava in the crater of Bali&rsquo;s&nbsp;<a class="u-underline" href="https://www.theguardian.com/world/mount-agung" data-link-name="auto-linked-tag" data-component="auto-linked-tag">Mount Agung</a>is clearly visible, as the likelihood of a large eruption on the popular holiday island continues to grow.</p>\r\n<p>The Balinese volcano, the highest point on the island, has grown increasingly restless over the past week, with the alert system raised to its highest level early on Monday, as the nature of the eruptions has shifted from phreatic, or steam-based, to magmatic.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="media/weather.jpg" alt=" weather.jpg" width="300" height="168" /></p>\r\n</body>\r\n</html>', 'aseem', '', 'Published', '', NULL, NULL, NULL),
(200, '2017-11-28 00:00:00', 'World', ' The glow from a ring of incandescent red lava in the crater of Bali’s Mount Agung is clearly visible, as the likelihood of a large eruption on the popular holiday island continues to grow.', 'DSCF3133.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>The glow from a ring of incandescent red lava in the crater of Bali&rsquo;s&nbsp;<a class="u-underline" href="https://www.theguardian.com/world/mount-agung" data-link-name="auto-linked-tag" data-component="auto-linked-tag">Mount Agung</a>is clearly visible, as the likelihood of a large eruption on the popular holiday island continues to grow.</p>\r\n<p>The glow from a ring of incandescent red lava in the crater of Bali&rsquo;s&nbsp;<a class="u-underline" href="https://www.theguardian.com/world/mount-agung" data-link-name="auto-linked-tag" data-component="auto-linked-tag">Mount Agung</a>is clearly visible, as the likelihood of a large eruption on the popular holiday island continues to grow.</p>\r\n<p>The glow from a ring of incandescent red lava in the crater of Bali&rsquo;s&nbsp;<a class="u-underline" href="https://www.theguardian.com/world/mount-agung" data-link-name="auto-linked-tag" data-component="auto-linked-tag">Mount Agung</a>is clearly visible, as the likelihood of a large eruption on the popular holiday island continues to grow.</p>\r\n<p>The Balinese volcano, the highest point on the island, has grown increasingly restless over the past week, with the alert system raised to its highest level early on Monday, as the nature of the eruptions has shifted from phreatic, or steam-based, to magmatic.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="media/newsRoom.jpg" alt=" newsRoom.jpg" width="300" height="168" /></p>\r\n</body>\r\n</html>', 'newre', '', 'Published', '', NULL, NULL, NULL),
(201, '2017-11-28 00:00:00', 'Add Category', ' Worst possible scenario involves pyroclastic flows – currents of hot gas and rock moving at 70 miles per hour', 'aiadmk-merger_650x400_41503319148.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>The Balinese volcano, the highest point on the island, has grown increasingly restless over the past week, with the alert system raised to its highest level early on Monday, as the nature of the eruptions has shifted from phreatic, or steam-based, to magmatic.</p>\r\n<p>The Balinese volcano, the highest point on the island, has grown increasingly restless over the past week, with the alert system raised to its highest level early on Monday, as the nature of the eruptions has shifted from phreatic, or steam-based, to magmatic.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="media/Luisberg_NewWaterford 007.JPG" alt=" Luisberg_NewWaterford 007.JPG" width="200" height="113" /></p>\r\n<ol>\r\n<li>Worst possible scenario involves pyroclastic flows &ndash; currents of hot gas and rock moving at 70 miles per hour\r\n<ol>\r\n<li>Worst possible scenario involves pyroclastic flows &ndash; currents of hot gas and rock moving at 70 miles per hour</li>\r\n<li>Worst possible scenario involves pyroclastic flows &ndash; currents of hot gas and rock moving at 70 miles per hour</li>\r\n</ol>\r\n</li>\r\n<li>\r\n<h2><span style="font-size: 14pt;"><strong>Has Agung erupted before?</strong></span></h2>\r\n<p>Yes, the last eruption was in 1963 and killed more than 1,000 people. &ldquo;Far more would die this time in a similar eruption [without evacuation] because population density has gone up,&rdquo; says Rothery.</p>\r\n</li>\r\n</ol>\r\n</body>\r\n</html>', 'viveklakhan', '', 'Published', '', NULL, NULL, NULL),
(202, '2017-11-28 00:00:00', 'World', ' Test News 1234', 'entertainment.gif', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Testing news for sure</p>\r\n</body>\r\n</html>', 'vivek', '', 'Published', 'Test', NULL, NULL, NULL),
(203, '2017-11-28 00:00:00', 'Feature', ' Test News 12345', 'entertainment.gif', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Testing news for sure</p>\r\n</body>\r\n</html>', 'vivek', '', 'Published', 'Testing', NULL, NULL, NULL),
(204, '2017-11-28 00:00:00', 'Breaking', ' Test image upload', 'collage.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp;</p>\r\n<p>The Democrats said they would negotiate with Republican lawmakers instead.</p>\r\n<p>Averting a federal shutdown is just one of this month''s big challenges for Republicans, who control Capitol Hill.</p>\r\n<p>The party''s lawmakers are also under pressure to pass a far-reaching tax plan that they can send to the president''s desk by the end of the year.</p>\r\n<p>The Republican tax bill cleared the Senate Budget Committee on Tuesday in a 12-11 vote along party lines, with a full vote by the chamber expected this week.</p>\r\n<p>"I think we''re going to get it passed," Mr Trump said of the bill on Tuesday afternoon after meeting lawmakers on Capitol Hill.</p>\r\n<figure class="media-landscape has-caption full-width"><span class="image-and-copyright-container"><img class="responsive-image__img js-image-replace" src="https://ichef-1.bbci.co.uk/news/624/cpsprodpb/1627B/production/_98974709_hi042761181.jpg" alt="House Minority Leader Nancy Pelosi (D-CA) and Senate Minority Chuck Schumer (D-NY)" width="292" height="164" data-highest-encountered-width="624" /><span class="off-screen">Image copyright</span><span class="story-image-copyright">REUTERS</span></span>\r\n<figcaption class="media-caption"><span class="off-screen">Image caption</span><span class="media-caption__text">Nancy Pelosi (L) and Chuck Schumer are regular sparring partners of the president</span></figcaption>\r\n</figure>\r\n<p>However, Congress must also agree a year-end spending package to keep the US government running beyond 8 December.</p>\r\n<p>Democrats have suggested negotiations could hinge on saving an Obama-era programme that allowed undocumented immigrants who entered the US as children to stay.</p>\r\n<p>Mr Trump tweeted on Tuesday morning: "Meeting with ''Chuck and Nancy'' today about keeping government open and working.</p>\r\n<p>"Problem is they want illegal immigrants flooding into our Country unchecked, are weak on Crime and want to substantially RAISE Taxes. I don''t see a deal!"</p>\r\n<p>House Democratic leader Nancy Pelosi and Chuck Schumer, who is her Senate equivalent, later issued a joint statement abruptly calling off the meeting.</p>\r\n<p>Later on Tuesday the president told reporters of Mrs Pelosi and Mr Schumer: "They''ve been all talk and no action."</p>\r\n<figure class="media-landscape no-caption body-width"><span class="image-and-copyright-container"><img class="responsive-image__img js-image-replace" src="https://ichef-1.bbci.co.uk/news/624/cpsprodpb/CF5C/production/_98848035_line976.jpg" alt="Grey line" width="464" height="2" data-highest-encountered-width="624" /></span></figure>\r\n<h2 class="story-body__crosshead">Winter of discontent</h2>\r\n<p><strong>Analysis by Anthony Zurcher, BBC News</strong></p>\r\n<p>In mid-September Donald Trump and Democratic leaders Nancy Pelosi and Chuck Schumer seemed on the verge of establishing a functional working relationship. Over a Chinese dinner they, along with congressional Republicans,&nbsp;<a class="story-body__link" href="http://www.bbc.co.uk/news/world-us-canada-41192767">hammered out what appeared to be a framework for co-operation on budget and immigration issues</a>.</p>\r\n</body>\r\n</html>', 'vivek', '', 'Published', 'test', NULL, NULL, NULL),
(210, '2017-11-28 00:00:00', 'Feature', ' At least one expert said its lofted trajectory suggested an actual range of 13,000 kilometres that would bring every city in the continental United States within range. Test', 'breakingNews.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>North Korea''s immediate neighbours were less restrained, with Japanese Prime Minister Shinzo Abe calling the test an intolerable, "violent" act and South Korean President Moon Jae-In condemning Pyongyang''s "reckless" behaviour.</p>\r\n</body>\r\n</html>', 'vivek', '', 'Published', 'news', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news-new`
--

CREATE TABLE IF NOT EXISTS `news-new` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(600) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(100) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news-new`
--

INSERT INTO `news-new` (`newsId`, `date`, `category`, `title`, `image`, `description`, `author`, `username`, `status`, `tags`, `userId`, `categoryId`) VALUES
(1, '2017-11-28 00:00:00', 'Add Category', ' Testing Testing', 'dining.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>$query is undefined. I believe you meant to use $sqlinsert which you defined as</p>\r\n<div class="bbcode_container">\r\n<div class="bbcode_description">PHP Code:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src="media/baking1.jpg" alt=" baking1.jpg" width="267" height="200" /></div>\r\n</div>\r\n</body>\r\n</html>', 'aseem', NULL, 'draft', '', NULL, NULL),
(2, '2017-11-28 00:00:00', 'World', ' North Korea Fires Ballistic Missile, Renews Tension The missile flew eastward from South Pyongan Province according to Yonhap news agency, which said the South Korean military and US were analysing.', 'breakingNews.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h1><span style="font-size: 14pt;">North Korea Fires Ballistic Missile, Renews Tension</span></h1>\r\n<h2 class="ins_descp"><span style="font-size: 14pt;">The missile flew eastward from South Pyongan Province according to Yonhap news agency, which said the South Korean military and US were analysing.</span></h2>\r\n<p><span style="font-size: 14pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src="media/DSCF3558.JPG" alt=" DSCF3558.JPG" width="354" height="200" /></span></p>\r\n</body>\r\n</html>', 'vivek', NULL, 'Published', '', NULL, NULL),
(3, '2017-11-28 00:00:00', 'Feature', ' After Low Turnout Alleged At Some PM Rallies, "Come See Son Of Gujarat" Campaign', 'diningout.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h1><strong><span style="font-size: 14pt;">After Low Turnout Alleged At Some PM Rallies, "Come See Son Of Gujarat" Campaign</span></strong></h1>\r\n<h2 class="ins_descp"><span style="font-size: 14pt;">PM Modi held public meetings yesterday in Bhuj in Kutch, in Jasdan and Dhari in the region of Saurashtra and in Kadodara in Surat.</span></h2>\r\n<p><span style="font-size: 14pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>\r\n</body>\r\n</html>', 'vivek', NULL, 'Published', '', NULL, NULL),
(4, '2017-11-28 00:00:00', 'World', '"It Was Really Smooth": Singapore Defence Minister Flies India''s Tejas Fighter', 'cnn.jpg', '"It Was Really Smooth": Singapore Defence Minister Flies India''s Tejas Fighter\r\n', 'vivek', NULL, 'published', '', NULL, NULL),
(5, '2017-11-28 00:00:00', 'Feature', ' test', 'banquet.png', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>test</p>\r\n</body>\r\n</html>', 'vivek', NULL, 'Published', '', NULL, NULL),
(6, '2017-11-28 00:00:00', 'World', ' Test Form update', 'diningout.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties between the two countries.</p>\r\n</body>\r\n</html>', 'vivek', NULL, 'draft', '', NULL, NULL),
(7, '2017-11-28 00:00:00', 'Feature', ' Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties ', 'cnn.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties between the two countries.</p>\r\n</body>\r\n</html>', 'vivek', NULL, 'Published', '', NULL, NULL),
(8, '2017-11-28 00:00:00', 'World', ' Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties ', 'DSCF3925.JPG', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties between the two countries.</p>\r\n<p>Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties between the two countries.</p>\r\n<p>Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties between the two countries.</p>\r\n<p>Behind the light-hearted banter, the India-Singapore defence cooperation agreement is serious business. It was signed first in 2003 and then upgraded in November 2015 when Prime Minister Modi visited Singapore to celebrate 50 years of of diplomatic ties between the two countries.</p>\r\n</body>\r\n</html>', 'vivek', NULL, 'Published', '', NULL, NULL),
(9, '2017-11-28 00:00:00', 'World', ' This is latest news related to world,testing test', 'cricket.jpg', ' <!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>This is latest news related to world</p>\r\n<p>This is latest news related to world</p>\r\n<p>This is latest news related to world</p>\r\n</body>\r\n</html>', 'aseem', NULL, 'Published', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `firstName`, `lastName`, `username`, `email`, `image`, `password`, `role`, `details`) VALUES
(1, '2017-11-09', 'Vivek1', 'Lakhanpal2', 'aseem', 'aseem@gmail.com', 'DSCF3134.JPG', 'aseem', 'admin', '                                                        I am Vivek'),
(2, '2017-11-10', 'Vivek1', 'Lakhanpal2', 'vivek', 'vivek@gmail.com', 'DSCF2952_bl&w.jpg', 'vivek', 'author', '   I am Vivek  I am Vivek                                                    '),
(35, '2017-11-19', 'Vivek1', 'Lakhanpal2', 'shuchi', 'admin', 'bigcat.jpg', 'admin', 'admin', 'Hello'),
(47, '2017-11-24', 'Vivek1', 'Lakhanpal2', 'user', 'user@gmail.com', 'DSCF3134.JPG', '123456', 'author', '                                                        I am Vivek'),
(44, '2017-11-20', 'mmm', 'opiyu', 'vivekl', 'l@gmail.com', 'DSCF3163.JPG', 'lvivek', 'admin', 'm'),
(45, '2017-11-20', 'Vivek1', 'Lakhanpal2', 'aseemvivek', 'a@gmail.com', 'DSCF3134.JPG', 'aseemv', 'admin', '                                                        I am Vivek'),
(46, '2017-11-22', 'Vivek2', 'Lakhanpal2', 'viveklakhan', 'v@q.com', 'Luisberg_NewWaterford 012.JPG', 'viveklakhan', 'admin', '                                                                                      Hello Everyone                          '),
(59, '2017-11-24', '', '', 'toy', 'toy@r', 'DSCF3574.JPG', 'toy', 'author', ''),
(51, '2017-11-24', 'Vivek1', 'Lakhanpal2', 'mm', 'mmmm', 'DSCF3583.JPG', '888', 'admin', ''),
(57, '2017-11-24', 'dfgg', 'dfg', '', 'aseem', 'DSCF3584.JPG', 'aseem', 'admin', ''),
(58, '2017-11-24', 'bus', 'bus', 'loiuyt', 'ppp', 'DSCF3584.JPG', 'aseem', 'author', ''),
(65, '2017-11-25', 'newrew', 'nwre', 'newre', 'asee', 'DSCF3583.JPG', 'asee', 'author', ''),
(69, '2017-11-25', 'aswer', 'aswer', 'werty', 'ert', 'Luisberg_NewWaterford 007.JPG', '1234', 'author', ''),
(60, '2017-11-24', 'all', 'all', 'newtest', 'new@new', 'DSCF3588.JPG', '1234', 'author', ''),
(61, '2017-11-24', 'Sophia', 'Sharma', 'sophia', 's', 'DSCF3583.JPG', 'sophia', 'admin', ''),
(64, '2017-11-25', 'ASDD', 'ASDF', 'asdf', 'asdf', 'DSCF3583.JPG', '123456yui', 'admin', ''),
(70, '2017-11-28', 'Testtest', 'Testtest', 'testttt', 'tt@gmail.com', 'banquet.png', '12345', 'admin', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
