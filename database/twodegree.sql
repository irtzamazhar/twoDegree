-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 04:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twodegree`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `editor` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `editor`, `created_at`, `updated_at`) VALUES
(2, 'Testimonial Tuesday: Why Two Degrees is safer than other networking apps', '<p>I stumbled across this app called Two Degrees a few days after my roommate&rsquo;s tragic bumble date. By definition, Two Degrees is an app that connects you with real people in real life who are nearby based on mutual friends. Sounds simple enough, right? When two people discover that they are only separated by two degrees, new relationships can be made and a smoother transition can take place. I&rsquo;d have to fully agree. If my roommate finds out she has friends in common with the cute guy in our local bar, she&rsquo;s more inclined to feel a sense of security when talking to him and getting to know him. You probably have friends in common with people standing next to you all the time and don&rsquo;t even know it. Two Degrees was made for situations like this.</p>\r\n\r\n<p>I want my roommate to have more success with meeting new people in general. After researching, I suggested that she download this app and start forming friendships with people based on her mutual connections. Why put the pressure of having to date someone you just met for the first time? Two Degrees isn&rsquo;t a dating app, but it&rsquo;s an app that allows you to meet new people and expand your network in a safer way. Whether you use it for friendship, dating, business or to merely pass the time at a specific location, you&rsquo;ll be surprised at how many people around you know people that you do.</p>\r\n\r\n<p>Lets rewind a few days to learn more about why I started researching safer and more effective social networking apps for my roommate.</p>\r\n\r\n<h3><strong>THE STORY</strong></h3>\r\n\r\n<p>A few days ago my roommate went on a date with a guy from bumble. Not only did the guy lie about his job, height and age, he also didn&rsquo;t look anything like his profile photo. Nonetheless, she was bummed. Cue in the song &ldquo;another one bites the dust&rdquo; and it sings the story of her life. This is a pretty regular occurrence for bumble and tinder users. Online dating is tough, there&rsquo;s no doubt about it. However, online dating through an app&mdash; that&rsquo;s even tougher.</p>\r\n\r\n<p>I couldn&#39;t help but think about how much smoother the transition of forming relationships through technology could be. Imagine how different things would be if there was an icebreaker involved when you met someone over the internet. Whether you are looking for new friends, new love interests or new business connections, we can all agree that icebreakers ease the awkwardness of meeting complete strangers.</p>\r\n\r\n<p>As my roommate sat there all dopey eyed and upset, I realized there was a safer way to meet new people through technology. Personally, I&rsquo;m not the kind of person to meet anyone over the internet, unless some of my friends know the person well. *BOOM* &mdash; The lightbulb just went off in my head. What if my roommate could meet new friends and potential love interests with the security of knowing one of her friends is already close with that person? What if her childhood best friend went to college with that person? What if her neighbor played soccer with that person? What if there was a mutual connection bonding those two people together?</p>\r\n\r\n<p>What if you say&hellip;</p>\r\n\r\n<p>My roommate&rsquo;s tragic bumble date ultimately led me to stumbling across Two Degrees.</p>\r\n\r\n<p>Two Degrees is currently the safest and most effective way to meet people online.</p>\r\n\r\n<p>It&rsquo;s time to make your world a little smaller and expand your network two degrees at a time.</p>\r\n\r\n<p>I know I&rsquo;m downloading Two Degrees tonight. Are you? See you there.</p>', '2017-11-01 08:28:27', '2017-11-01 08:28:27'),
(4, 'The top 5 places to use the Two Degrees app', '<p><strong>Top 5 places to use the Two Degrees app</strong></p>\r\n\r\n<p>Not sure where to use the Two Degrees app at? Don&rsquo;t worry, we&rsquo;ve got you covered. Check out the top 10 places to utilize our app!</p>\r\n\r\n<h3><strong>1. A NIGHT OUT</strong></h3>\r\n\r\n<p>Maybe you&rsquo;re at the local bar or a new trendy restaurant in town. Perhaps you&rsquo;re curious about who&rsquo;s around you. A night out is the perfect time to open up your Two Degrees app. Social networking is one of the best ways to meet new people. Two Degrees breaks the ice and lets you talk to others around you &mdash; all within the comfort of knowing you both share mutual friends with each other.</p>\r\n\r\n<h3><strong>2. A BUSINESS OR NETWORKING CONFERENCE</strong></h3>\r\n\r\n<p>Have you ever been at a business conference or networking event and wanted to talk to the important CEO behind you but didn&#39;t know how to get the conversation started? Two Degrees was created with the business networking platform in mind. It&rsquo;s a lot easier to start a conversation with someone at a networking event when you can see that you both know some of the same people. Once you open your Two Degrees app and find out that you and the important CEO both know your cousin, the conversation will flow smoothly. Want to take the awkwardness out of business networking? Jump on Two Degrees and start conversations with people you share mutual friends who are nearby.</p>\r\n\r\n<h3><strong>3. COLLEGE</strong></h3>\r\n\r\n<p>Do you remember your freshman orientation week? Pretty overwhelming, wasn&rsquo;t it? Imagine if you had an app that showed you the people around you that shared mutual friends with you. It&rsquo;s the perfect way to make new friends and bond over the relationships that you both share. At any given time on a college campus there can be around 50,000 students within just a few miles of you. Out of those 50,000 students, you are guaranteed to share friends from back home with at least 5% of them. Two Degrees is the perfect solution for the overwhelming &ldquo;college welcome week&rdquo; that so many new freshmen experience every year.</p>\r\n\r\n<h3><strong>4. THE AIRPORT</strong></h3>\r\n\r\n<p>Okay, this one is pretty self-explanatory. We all know that sitting at the airport for hours can be one of the most boring, slow-moving experiences of our lives. If you thought there were a lot of people around you on a college campus, there are even more people surrounding you in an airport. Why not check out who around you might know some people you know? I&rsquo;ve always been curious about who around me at the airport might know people that I do. I&rsquo;ve even come across people I had mutual friends with on my specific flights. It&rsquo;s a small world out there. Make a new friend, pass some lonely airport time and get a drink together.</p>\r\n\r\n<h3><strong>5. SPORTS AND ENTERTAINMENT EVENTS</strong></h3>\r\n\r\n<p>Sporting events and entertainment events such as concerts are great places to meet and interact with new people. Sitting at a country concert tailgate? Open your Two Degrees app and see if you have any mutual friends with people around you. Popular sporting events, such as NFL games are great places to utilize Two Degrees and discover new connections. Not only will you have the same favorite sports team in common&mdash; you&rsquo;ll also now have friends in common too!</p>', '2017-11-01 09:33:28', '2017-11-02 02:02:19'),
(5, 'Two Degrees of separation', '<p>Imagine sitting at your local coffee shop swiping through your Snapchat stories on a Monday morning. Now picture the guy across the table randomly walking up to you and introducing himself. Sounds strange right? Not so much.</p>\r\n\r\n<p>Meet John. John is the guy across the table. John saw you on his Two Degrees app. You went to college with John&rsquo;s childhood best friend. You and John are now mutually connected.</p>\r\n\r\n<p><em>What? How? Why?</em></p>\r\n\r\n<p>Welcome to Two Degrees where worlds&nbsp;<strong>collide</strong>&nbsp;for a greater purpose.</p>\r\n\r\n<p>The Two Degrees algorithm unlocks connections and expands your network &mdash; two degrees at a time. Wouldn&rsquo;t it be nice to know your friends in common with someone before you met them? Sharing a friend in common creates the potential for a new friendship, connection or relationship to be made.</p>\r\n\r\n<p>We can all agree that it is always exciting when you find out you have a friend in common with someone. Truthfully, you probably have friends in common with the person standing next to you and don&#39;t even know it. For example, you probably had no idea that you shared a mutual friend with the guy next to you at your local coffee shop. When you discover that you are separated by only &quot;two degrees,&quot; new relationships can easily be made.</p>\r\n\r\n<p>The result? John and the guy from the coffee shop are now good friends. They regularly keep in touch and had an entertaining time explaining the run-in to their mutual friend, Kyle. Breaking the ice is a lot easier when you immediately have something &mdash; or in this case, someone to discuss. That someone? Well, that&rsquo;s completely dependent on your personal network. In this case, Mark went to college with John&rsquo;s childhood best friend, Kyle. These situations are more common than you think.</p>\r\n\r\n<p>In any given situation and at any given place, you likely share a mutual connection with someone around you. It&rsquo;s now up to you to utilize these connections.</p>\r\n\r\n<p><strong>Discover - Connect - Create</strong>&nbsp;#TwoDegrees</p>', '2017-11-02 01:53:58', '2017-11-07 09:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(19, 'irtza', 'mazhar', 'irtza@mail.com', 'My subject', 'nfdjghjkgnfmgdhm  dtymf f', '2017-11-01 02:08:05', '2017-11-01 02:08:05'),
(20, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'djkfbuibgiufkdvndfuibguieruikd', '2017-11-01 02:11:34', '2017-11-01 02:11:34'),
(21, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'asdfasdfsd', '2017-11-01 02:21:34', '2017-11-01 02:21:34'),
(22, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'lok', '2017-11-01 02:56:47', '2017-11-01 02:56:47'),
(23, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'lololo', '2017-11-01 02:58:08', '2017-11-01 02:58:08'),
(24, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'lololo', '2017-11-01 02:58:17', '2017-11-01 02:58:17'),
(25, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'lololo', '2017-11-01 02:58:19', '2017-11-01 02:58:19'),
(26, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'fsdfsdfasdf', '2017-11-01 02:58:49', '2017-11-01 02:58:49'),
(28, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'fdsfasdgsagsdf', '2017-11-01 03:02:15', '2017-11-01 03:02:15'),
(30, 'irtza', 'mazhar', 'logics.tester@gmail.com', 'My subject', 'svdfkvnos;l dfie ffnnfeo vheui eio', '2017-11-01 03:10:14', '2017-11-01 03:10:14'),
(33, 'irtza', 'mazhar', 'irtza@mail.com', 'My subject', 'vniuvnduvnsdivs   nuis nsi', '2017-11-01 03:55:25', '2017-11-01 03:55:25'),
(34, 'irtza', 'mazhar', 'irtza@opensolglobal.com', 'My subject', 'csdvkn sn s', '2017-11-01 03:56:06', '2017-11-01 03:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `faq_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_title`, `faq_content`, `faq_status`, `created_at`, `updated_at`) VALUES
(2, 'What is Two Degrees?', '<p>Two Degrees shows you friends you have in common with random people nearby.</p>', 1, '2017-11-07 02:40:39', '2017-11-07 02:40:39'),
(3, 'How does it work?', '<p>The Two Degrees algorithm identifies people in close proximity with whom you share mutual friends.</p>', 1, '2017-11-07 03:02:36', '2017-11-07 03:02:36'),
(4, 'Why do I have to sync my address book?', '<p>Two Degrees scans your address book to see which contacts you share in common with others, and are in your proximity. Your results depend on sharing your information privately with us. Phone numbers and email addresses from your address book will not appear in the app and we will not contact or share this information with anyone.</p>', 1, '2017-11-07 03:03:00', '2017-11-07 03:03:00'),
(5, 'Why do I have to sync my Facebook account?', '<p>Two Degrees scans your Facebook friends to see which friends you share in common with others, and are in your proximity. Your results depend on sharing your information privately with us. Phone numbers and email addresses from your address book will not appear in the app and we will not contact or share this information with anyone.</p>', 1, '2017-11-07 03:03:26', '2017-11-07 03:03:26'),
(6, 'Do I have to sync both my address book and Facebook?', '<p>Two Degrees will only work if you share one or the other &ndash; or both. Two Degrees needs to know who you know in order to show you your twodegree friends.</p>', 1, '2017-11-07 03:03:58', '2017-11-07 03:03:58'),
(7, 'Does Two Degrees contact people in my address book or share my private information with anyone?', '<p>We will not share your private information with other users or use it to contact your friends without your permission. We are not in the business of selling your private address book information to other companies.</p>', 1, '2017-11-07 03:04:16', '2017-11-07 03:04:16'),
(8, 'Does Two Degrees contact my Facebook friends or post anything on their walls?', '<p>We will not share your private information with other users or use it to contact your friends without your permission. We are not in the business of selling your private Facebook information to other companies.</p>', 1, '2017-11-07 03:04:40', '2017-11-07 03:04:40'),
(9, 'Why does Two Degrees track my location?', '<p>Two Degrees needs your continuous location in order to show you people close to you with whom you have friends in common</p>', 1, '2017-11-07 03:05:02', '2017-11-07 03:05:02'),
(10, 'How do I turn off location tracking?', '<p>In your phone settings, go to &quot;Location Services&quot;under &quot;Privacy&quot; and select Two Degrees. Here you can control your location access.</p>', 1, '2017-11-07 03:05:23', '2017-11-07 03:05:23'),
(11, 'What about battery life?', '<p>Very minimal impact. The app is optimized to have nearly no impact or drain on battery life. Altough the app is running in the background, it has minimal impact on battery.</p>', 1, '2017-11-07 03:05:41', '2017-11-07 04:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_27_061816_create_newsletters_table', 2),
(4, '2017_10_31_064209_create_contacts_table', 3),
(5, '2017_11_01_113250_create_blogs_table', 4),
(6, '2017_11_01_130910_add_title_to_blogs', 5),
(7, '2017_11_01_131146_create_blogs_table', 6),
(8, '2017_11_02_091235_create_events_table', 7),
(9, '2017_11_02_093522_create_events_table', 8),
(10, '2017_11_02_132909_add_place_lng_to_events', 9),
(11, '2017_11_02_133614_add_place_lat_to_events', 10),
(12, '2017_11_02_140213_add_address_to_events', 11),
(13, '2017_11_02_143143_create_site_events_table', 12),
(14, '2017_11_07_062610_create_faqs_table', 13),
(15, '2017_11_07_064936_create_faqs_table', 14),
(16, '2017_11_07_100514_create_pages_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'irtza@mail.com', '2017-10-27 01:24:40', '2017-10-27 01:24:40'),
(2, 'irtza@opensolglobal.com', '2017-10-27 01:36:52', '2017-10-27 01:36:52'),
(30, 'my43@mail.com', '2017-11-06 08:25:05', '2017-11-06 08:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_url`, `page_title`, `page_content`, `page_image`, `page_status`, `created_at`, `updated_at`) VALUES
(4, '/terms', 'Terms', '<p>Welcome to the twodegrees mobile application and www.twodegrees.io website (collectively, the &ldquo;App&rdquo;). This App is maintained and operated by&nbsp;<strong>Two Degrees, Inc.</strong>&nbsp;(&ldquo;Company&rdquo;).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Your access and use of the App is subject to the following terms and conditions (the &quot;terms and conditions&quot;) and all applicable laws. By accessing or using any part of the App, you accept, without limitation or qualification, these terms and conditions. If you do not agree with all of the terms and conditions set forth below, you may not use any portion of the App.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Authorized Use of App:</strong>&nbsp;&nbsp;This App is provided for your personal and non-commercial use and for informational purposes only. Any other use of the App requires the prior written consent of Company.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Unauthorized Use of App:</strong>&nbsp;&nbsp;You may not use spiders, robots, data mining techniques or other automated devices or programs to catalog, download or otherwise reproduce, store or distribute content available on the App. Further, you may not use any such automated means to manipulate the App, such as automating what are otherwise manual or one-off procedures. You may not take any action to interfere with, or disrupt, the App or any other user&#39;s use of the App, including, without limitation, via means of overloading, &ldquo;flooding&rdquo;, or &ldquo;crashing&rdquo; the App, circumventing security or user authentication measures or attempting to exceed the limited authorization and access granted to you under these Terms and Conditions. You may not frame portions of the App within another website or application. You may not resell use of, or access to, the App to any third party without our prior written consent.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Registration and Passwords:</strong>&nbsp;&nbsp; In order to access certain services on the App, you may be required to provide specific information. All information about you must be truthful, and you may not use any aliases or other means to mask your true identity. Any access codes or passwords provided should be safeguarded at all times. You are responsible for the security of your access codes and passwords and will be solely liable for any use or unauthorized use under such access codes or passwords. We may suspend or terminate your access at any time with or without notice. To understand how we use information collected from you, including information collected via social media connectivity, please read our Privacy Policy, www.twodegrees.io/privacy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Proprietary Rights:</strong>&nbsp;&nbsp;Company is the owner of or otherwise licensed to use all parts of the App, including all copy, software, graphics, designs and all copyrights, trademarks, service marks, trade names, logos, and other intellectual property or proprietary rights contained therein. Some materials on the App belong to third parties who have authorized Company to display the materials, such as portfolio works, client logos and trademarks and other proprietary materials. By using the Service, you agree not to copy, distribute, modify or make derivative works of any materials without the prior written consent of the owner of such materials.&nbsp;<strong>Except as expressly set forth in these Terms and Conditions, no license is granted to you and no rights are conveyed by virtue of accessing or using the App. All rights not granted under these Terms and Conditions are reserved by Company.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Comments or Materials Posted by You:&nbsp;</strong>&nbsp;&nbsp;Certain pages on the App may allow you to post text comments, photos, videos, check-ins at venues or other Content (&ldquo;Content&rdquo;). Unless otherwise specified, you may only post Content to the App if you are a resident of the United States and are thirteen (13) years of age or older. You may only post Content that you created or which the owner of the Content has given you permission to post. If Content depicts any person other than yourself, you must have permission from that person or, if that person is a minor, permission from that person&rsquo;s parent or legal guardian, before you post the Content. You may be required to provide proof of such permission to Company. You may not post or distribute Content that is illegal or that violates these Terms and Conditions. You represent and warrant that (a) you own all the rights to the Content or are authorized to use and distribute the Content to the App and (b) the Content does not and will not infringe any copyright, right of publicity, or any other third-party right nor violate any law or regulation.</p>\r\n\r\n<p>By submitting or posting Content to the App, you grant Company the irrevocable, perpetual, worldwide right to reproduce, display, perform, distribute, adapt, and promote this Content in any medium. Once you submit or post Content to the App, Company does not need to give you any further right to inspect or approve uses of such Content or to compensate you for any such uses. Company owns all rights, title, and interest in any compilation, collective work, or other derivative work created by Company using or incorporating Content posted to the Apps. You are solely responsible for anything you may post on the App and the consequences of posting anything on the App.</p>\r\n\r\n<p><strong>Content Posted by Other Users</strong></p>\r\n\r\n<p><strong>Activities Prohibited by App:&nbsp;</strong>&nbsp;&nbsp; Company expects all of its users to be respectful of other people. The following is a partial list of the types of conduct that are illegal or prohibited on the App or while using the App. Company reserves the right to investigate and take appropriate legal action against anyone who, in Company&rsquo;s sole discretion, engages in any of the prohibited activities. Without limitation, you agree that you will not post or transmit to other users anything that contains Content that:</p>\r\n\r\n<ul>\r\n	<li>is defamatory, abusive, obscene, profane or offensive;</li>\r\n	<li>infringes or violates another party&#39;s intellectual property rights (such as music, videos, photos or other materials for which you do not have written authority from the owner of such materials to post on the App);</li>\r\n	<li>violates any party&rsquo;s right of publicity or right of privacy;</li>\r\n	<li>is threatening, harassing or that promotes racism, bigotry, hatred or physical harm of any kind against any group or individual;</li>\r\n	<li>promotes or encourages violence;</li>\r\n	<li>is inaccurate, false or misleading in any way;</li>\r\n	<li>is illegal or promotes any illegal activities;</li>\r\n	<li>promotes illegal or unauthorized copying of another person&#39;s copyrighted work or links to them or providing information to circumvent security measures;</li>\r\n	<li>contains &ldquo;masked&rdquo; profanity (i.e., F*@&amp;#);</li>\r\n	<li>contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment; or</li>\r\n	<li>contains any advertising, promotional materials, &quot;junk mail,&quot; &quot;spam,&quot; &quot;chain letters,&quot; &quot;pyramid schemes,&quot; or any other form of solicitation.</li>\r\n</ul>\r\n\r\n<p>Company is under no obligation to screen or monitor Content, but may review Content from time to time at its sole discretion. Company will make all determinations as to what Content is appropriate in its sole discretion. Company may edit or remove any Content at any time without notice.</p>\r\n\r\n<p><strong>No Ideas Accepted:&nbsp;</strong>&nbsp;Company does not accept any unsolicited ideas from outside the Company including without limitation suggestions about advertising, promotion or merchandising of our products, additions to our product lines, services, or changes in methods of doing business. We may already be working on or may in the future work on a similar idea. This policy eliminates concerns about ownership of such ideas. If, notwithstanding this policy, you submit an unsolicited idea to this App, you understand and acknowledge that such idea is not submitted in confidence and Company assumes no obligation, expressed or implied, by considering it. You further understand that Company shall exclusively own all known or hereafter existing rights to the idea everywhere in the world, and that such idea is hereby irrevocably assigned to Company. Without limiting the foregoing, to the extent any such assignment is deemed unenforceable, you hereby grant Company an irrevocable, perpetual, world-wide license to use the idea in any manner, in any medium now known or hereafter developed, without compensation to you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Links:</strong>&nbsp;&nbsp; This App may contain links to other websites or applications not maintained by Company. Other websites or apps may also reference or link to our App. We encourage you to be aware when you leave our App and to read the terms and conditions and privacy statements of each and every website or app that you visit. We are not responsible for the practices or the content of such other websites or apps.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>No Warranties:</strong>&nbsp;&nbsp; WHILE COMPANY USES REASONABLE EFFORTS TO INCLUDE UP-TO-DATE INFORMATION ON THE APP, COMPANY MAKES NO WARRANTIES OR REPRESENTATIONS AS TO ITS ACCURACY OR COMPLETENESS. COMPANY ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ANY ERRORS OR OMISSIONS IN THE CONTENT ON THE APP. YOUR USE OF THE APP IS AT YOUR OWN RISK. THE APP, INCLUDING ALL CONTENT MADE AVAILABLE ON OR ACCESSED THROUGH THE APP, IS PROVIDED &quot;AS IS&quot; AND COMPANY MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND WHATSOEVER FOR THE CONTENT ON THE APP. FURTHER, TO THE FULLEST EXTENT PERMISSIBLE BY LAW, COMPANY DISCLAIMS ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, NON-INFRINGEMENT, TITLE, MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. COMPANY DOES NOT WARRANT THAT THE FUNCTIONS CONTAINED IN THE APP OR ANY MATERIALS OR CONTENT CONTAINED THEREIN WILL BE UNINTERRUPTED OR ERROR FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE APP OR THE SERVER THAT MAKES IT AVAILABLE IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. COMPANY SHALL NOT BE LIABLE FOR THE USE OF THE APP, INCLUDING, WITHOUT LIMITATION, THE CONTENT AND ANY ERRORS CONTAINED THEREIN. IN NO EVENT WILL COMPANY BE LIABLE UNDER ANY THEORY OF TORT, CONTRACT, STRICT LIABILITY OR OTHER LEGAL OR EQUITABLE THEORY FOR ANY LOST PROFITS, LOST DATA, LOST OPPORTUNITIES, COSTS OF COVER, EXEMPLARY, PUNITIVE, PERSONAL INJURY/WRONGFUL DEATH, SPECIAL, INCIDENTAL, INDIRECT OR OTHER CONSEQUENTIAL DAMAGES, OR FOR ANY DIRECT DAMAGES, EACH OF WHICH IS HEREBY EXCLUDED BY AGREEMENT OF THE PARTIES REGARDLESS OF WHETHER OR NOT EITHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>YOU ARE SOLELY RESPONSIBLE FOR YOUR INTERACTIONS WITH OTHER USERS OF THE APP. YOU UNDERSTAND THAT THE COMPANY CURRENTLY DOES NOT CONDUCT CRIMINAL BACKGROUND CHECKS OR SCREENINGS OF THESE OTHER USERS. THE COMPANY ALSO DOES NOT INQUIRE INTO THE BACKGROUNDS OF ITS USERS. THE COMPANY MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE CONDUCT OF ITS USERS OR THEIR COMPATIBILITY WITH ANY CURRENT OR FUTURE USERS FOR ANY PURPOSE.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If any part of these warranty disclaimers or limitations of liability is found to be invalid or unenforceable for any reason or if we are otherwise found to be liable to you in any manner, then our aggregate liability for all claims under such circumstances for liabilities, shall not exceed the amount paid by you, if any, for accessing this App.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Indemnification:</strong>&nbsp;&nbsp;You agree to indemnify, defend and hold harmless Company, its employees, directors, officers, agents, business partners, affiliates, contractors, distribution partners and representatives from and against any and all claims, demands, liabilities, costs or expenses, including attorney&rsquo;s fees and costs, arising from, or related to, any breach by you of any of these Terms and Conditions or applicable law.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Severability.</strong>&nbsp;&nbsp;If any part of these Terms and Conditions shall be held or declared to be invalid or unenforceable for any reason by any court of competent jurisdiction, such provision shall be ineffective but shall not affect any other part of these Terms and Conditions, and in such event, such provision shall be changed and interpreted so as to best accomplish the objectives of such unenforceable or invalid provision within the limits of applicable law or applicable court decisions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Waiver; Remedies:</strong>&nbsp;&nbsp;The failure of Company to partially or fully exercise any rights or the waiver of Company of any breach of these Terms and Conditions by you shall not prevent a subsequent exercise of such right by Company or be deemed a waiver by Company of any subsequent breach by you of the same or any other term of these Terms and Conditions. The rights and remedies of Company under these Terms and Conditions and any other applicable agreement between you and Company shall be cumulative, and the exercise of any such right or remedy shall not limit Company&#39;s right to exercise any other right or remedy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Digital Millennium Copyright Act (&quot;DMCA&quot;) Notice: [WE CAN DISCUSS DMCA REGISTRATION IF NECESSARY I.E. IF USERS CAN UPLOAD CONTENT. IF THAT IS NOT THE CASE, WHICH IT APPEARS NOT TO BE, WE CAN REMOVE THIS]</strong></p>\r\n\r\n<p>Materials may be made available via the App by third parties not within our control. We are under no obligation to, and do not, scan content posted on the App for the inclusion of illegal or impermissible content. However, we respect the copyright interests of others. It is our policy not to permit materials known by us to infringe another party&rsquo;s copyright to remain on the App.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you believe any materials on the App infringe a copyright, you should provide us with written notice that at a minimum contains:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>(i) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed;</p>\r\n\r\n<p>(ii) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online website are covered by a single notification, a representative list of such works at that website;</p>\r\n\r\n<p>(iii) &nbsp;&nbsp;&nbsp;&nbsp; Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit us to locate the material;</p>\r\n\r\n<p>(iv) &nbsp;&nbsp;&nbsp;&nbsp; Information reasonably sufficient to permit us to contact the complaining party, such as an address, telephone number, and, if available, an electronic mail address at which the complaining party may be contacted;</p>\r\n\r\n<p>(v) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and</p>\r\n\r\n<p>(vi) &nbsp;&nbsp;&nbsp;&nbsp; A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>All DMCA notices should be sent to our designated agent as follows:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Contact: Two Degrees Support</p>\r\n\r\n<p>Contact email address: support@twodegrees.io</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is our policy to terminate relationships regarding content with third parties who repeatedly infringe the copyrights of others.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>International Access:</strong>&nbsp;&nbsp;Our App is provided from the United States of America and all servers that make it available reside in the U.S.A. The laws of other countries may differ regarding the access and use of the App. We make no representations regarding the legality of this App in any other country and it is your responsibility to ensure that your use complies with all applicable laws outside of the U.S.A.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Additional Terms for Users of Apple Devices</strong></p>\r\n\r\n<p>If you have downloaded the App via the iTunes Store, the following shall apply: You acknowledge and agree that these Terms and Conditions are solely between you and us, not Apple, and that Apple has no responsibility for the Services. Your use of the Services must comply with Apple&rsquo;s App Store Terms and Conditions, located at http://www.apple.com/legal/internet-services/itunes/us/terms.html. You acknowledge that Apple has no obligation whatsoever to furnish any maintenance and support services with respect to the Services. In the event of any failure of the App to conform to any applicable warranty, you may notify Apple, and Apple will refund the purchase price, if any, for the App to you. To the maximum extent permitted by applicable law, Apple will have no other warranty obligation whatsoever with respect to the App, and any other claims, losses, liabilities, damages, costs or expenses attributable to any failure to conform to any warranty will be solely governed by these Terms and Conditions and any law applicable to us as provider of the software. You acknowledge that Apple is not responsible for addressing any claims by you or any third party relating to the App or your possession and/or use of the App including, but not limited to: (i) product liability claims; (ii) any claim that the iTunes-Sourced Software fails to conform to any applicable legal or regulatory requirement; and (iii) claims arising under consumer protection or similar legislation; and all such claims are governed solely by these Terms and Conditions and any law applicable to us as provider of the App. You acknowledge that, in the event of any third party claim that the App or your possession and use of the App infringes that third party&rsquo;s intellectual property rights, we, not Apple, will be solely responsible for the investigation, defense, settlement and discharge of any such intellectual property infringement claim to the extent required by these Terms and Conditions. You and we acknowledge and agree that Apple, and Apple&rsquo;s subsidiaries, are third party beneficiaries of these Terms and Conditions as relates to your license of the App, and that, upon your acceptance of these terms and conditions of these Terms and Conditions, Apple will have the right (and will be deemed to have accepted the right) to enforce these Terms and Conditions as relates to your license of the App against you as a third party beneficiary thereof. You represent that you are not located in a country that is subject to a U.S. Government embargo, or that has been designated by the U.S. Government as a &ldquo;terrorist supporting&rdquo; country; and you are not listed on any U.S. Government list of prohibited or restricted parties.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Governing Law.&nbsp;</strong>&nbsp;&nbsp;The laws of the State of New York shall govern these Terms and Conditions. YOU HEREBY WAIVE ALL RIGHTS TO TRIAL IN ANY ACTION OR PROCEEDING INSTITUTED IN CONNECTION WITH THE APP OR THESE TERMS OF USE. ANY CONTROVERSY OR CLAIM ARISING OUT OF OR RELATING TO THE APP OR THESE TERMS OF USE SHALL BE SETTLED BY BINDING ARBITRATION IN ACCORDANCE WITH THE COMMERCIAL ARBITRATION RULES OF THE AMERICAN ARBITRATION ASSOCIATION. ANY SUCH CONTROVERSY OR CLAIM SHALL BE ARBITRATED ON AN INDIVIDUAL BASIS, AND SHALL NOT BE CONSOLIDATED IN ANY ARBITRATION WITH ANY CLAIM OR CONTROVERSY OF ANY OTHER PARTY. THE ARBITRATION SHALL BE CONDUCTED IN NEW YORK.</p>\r\n\r\n<p>FOR ANY MATTERS WHICH ARE NOT SUBJECT TO ARBITRATION AS SET FORTH IN THESE TERMS OF USE AND/OR IN CONNECTION WITH THE ENTERING OF ANY JUDGMENT ON AN ARBITRATION AWARD IN CONNECTION WITH THESE TERMS OF USE, YOU HEREBY EXPRESSLY CONSENT TO EXCLUSIVE JURISDICTION AND VENUE IN THE COURTS LOCATED IN NEW YORK.</p>\r\n\r\n<p>ANY CLAIMS ASSERTED BY YOU IN CONNECTION WITH THE APP MUST BE ASSERTED IN WRITING TO US WITHIN ONE (1) YEAR OF THE DATE SUCH CLAIM FIRST AROSE, OR SUCH CLAIM IS FOREVER WAIVED BY YOU. EACH CLAIM SHALL BE ADJUDICATED INDIVIDUALLY, AND YOU AGREE NOT TO COMBINE YOUR CLAIM WITH THE CLAIM OF ANY THIRD PARTY.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Questions:</strong>&nbsp;&nbsp;Should you have any questions regarding these Terms and Conditions you may contact us at webmaster@twodegrees.io.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms and Conditions are effective and were last updated on January 25, 2016.</p>', 'noimage.jpg', 1, '2017-11-07 07:17:14', '2017-11-07 07:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nadeemcomsian73@gmail.com', '$2y$10$OQn.WQsxGSnhiiZL.7MXLOaZipJzsd.zjk7m1OpVRL4UUpk1HgAcW', '2017-10-11 03:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `site_events`
--

CREATE TABLE `site_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_day` date NOT NULL,
  `event_timing1` time NOT NULL,
  `event_timing2` time NOT NULL,
  `event_detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_lng` double(10,6) NOT NULL,
  `place_lat` double(10,6) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_events`
--

INSERT INTO `site_events` (`id`, `event_title`, `event_day`, `event_timing1`, `event_timing2`, `event_detail`, `event_image`, `place_lng`, `place_lat`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Startup Power Hour!', '2017-12-03', '07:30:00', '08:30:00', 'A few days ago my roommate went on a date with a guy from bumble. Not only did the guy lie about his job, height and age, he also didn’t look anything like his profile photo. Nonetheless, she was bummed. Cue in the song “another one bites the dust” and it sings the story of her life. This is a pretty regular occurrence for bumble and tinder users. Online dating is tough, there’s no doubt about it. However, online dating through an app— that’s even tougher.', 'Koala-1509633764.jpg', -80.100533, 26.383479, '901 NW 35th St, Boca Raton, FL 33431, USA', '2017-11-02 09:42:44', '2017-11-02 09:42:44'),
(3, 'Startup Power Hour 3!', '2018-02-02', '21:00:00', '22:00:00', 'Welcome to the reference for the experimental release of the Google JavaScript Maps API V3. This reference is kept up to date with the latest changes to the API. Please consult the Javascript Maps API release notes for information on what\'s new in each release', 'Tulips-1509696864.jpg', 74.401260, 31.474998, 'Lalik chowk, Lahore, Pakistan', '2017-11-03 03:14:24', '2017-11-03 03:14:24'),
(4, 'Startup Power Hour 2!', '2018-03-03', '15:00:00', '17:00:00', 'Premium Plan customers: For production-ready apps, you must use a browser-restricted API key that is set up in the Google Maps APIs Premium Plan project created for you when you purchased the Premium Plan. Alternatively, you can use a client ID in combination with URL registration (instead of an API key).', 'Penguins-1509706025.jpg', 74.378679, 31.529414, 'Tufail Road, Lahore Cantt، Lahore, Pakistan', '2017-11-03 05:47:05', '2017-11-03 06:39:16'),
(5, 'Startup Power Hour 3!', '2017-03-03', '04:00:00', '06:00:00', 'cbdkcjndacnsdkcnmacnsamcdsc adk nsd', 'Koala-1510047134.jpg', 74.406761, 31.489115, 'Ali View Garden Phase 3, Lahore, Pakistan', '2017-11-07 04:32:14', '2017-11-07 04:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Irtza Mazhar', 'logics.tester@gmail.com', '$2y$10$/h/Rl.fHw12buvy2g9spHuAWeTJnMP.BiXFjy6H/uysxbwd/Nvi76', 'vgJjgQEq2OqqoYXTvlAlO8KoovdmQCVYWn18mxls.jpeg', '9Q4lsXb18vge32Le0XeyNNbstaxGQRuSvUeGNdEiBjlDaTj6XrkesERDvuWk', '2017-10-09 06:21:45', '2017-10-19 08:46:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `site_events`
--
ALTER TABLE `site_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_events`
--
ALTER TABLE `site_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
