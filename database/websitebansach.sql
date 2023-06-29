-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2022 lúc 07:04 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

-- 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitebansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(10) NOT NULL DEFAULT 2,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `level`, `address`, `telephone`, `fullname`) VALUES
(2, 'huong', 'f5bb0c8de146c67b44babbf4e6584cc0', 'huongvuthanh@gmail.com', 1, '48 Nguyễn Khánh Toàn', '0989512342', 'Hương'),
(3, 'namdepham', '25f9e794323b453885f5181f1b624d0b', 'nampham@gmail.com', 2, '48 NKT', '0904525881', 'Phạm Hoài Nam'),
(14, 'adminluadao', '25f9e794323b453885f5181f1b624d0b', 'tqa2000@gmail.com', 2, '60 Đội Cấn', '0917412421', 'Trương Quốc Anh'),
(15, 'admin', 'f5bb0c8de146c67b44babbf4e6584cc0', 'thuhuonghanoi2005@yahoo.com', 2, '19 Đội Cấn, Ba Đình, Hà Nội', '0921424214', 'Hai Nam'),
(17, 'namph', 'f5bb0c8de146c67b44babbf4e6584cc0', 'nampham123@gmail.com', 2, '48 NKT', '0931412412', 'NamP'),
(18, 'nini', 'f5bb0c8de146c67b44babbf4e6584cc0', 'ninipieces@gmail.com', 2, '123/221 Võ Chí Công', '0924142941', 'Yến Nhi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `adminid` int(11) DEFAULT NULL,
  `paymethod` varchar(50) NOT NULL,
  `cardname` varchar(255) DEFAULT NULL,
  `cardnumber` varchar(255) DEFAULT NULL,
  `sId` varchar(255) NOT NULL,
  `orderdate` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1,
  `items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `adminid`, `paymethod`, `cardname`, `cardnumber`, `sId`, `orderdate`, `status`, `items`) VALUES
(71, 15, 'cash', NULL, NULL, 'vms4j60aigkqj8krgajrgq0ncp', '03/11/2022', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `idreligion` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `release_date` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `instock` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `img`, `price`, `idreligion`, `author`, `release_date`, `genre`, `language`, `instock`) VALUES
(10, 'The Art of Happiness by The Dalai Lama', 'The Dalai lama is the spiritual leader of Tibet and one of the most recognizable religious and political figures in the world. His fame has largely been driven by highly publicized international campaigns, where he often shares insightful nuggets of wisdom, as well as the immutable aura of positivity and optimism that he maintains in his interactions with people. Given the peaceful and charismatic nature of his being, it is no surprise then that this book in which he shares the secrets to maintaining his outlook on life would go on to garner such an overwhelmingly positive response from readers. Despite being over a decade old, this book remains highly relevant in a world that rife with social and political challenges that place enormous emotional stress on our psyche and it continues to inspire many authors to put pen to paper in contribute to the thriving genre of positive psychology.\r\n\r\n', 'book1.jpeg', '70000', 11, '14th Dalai Lama and Howard C. Cutler', 'October 1, 2009', 'Documentary', 'English', 2),
(11, 'The Zen art of simple living by Shunyo Masuno', 'As much as modern life awards us with a slew of privileges, it can be extremely stressful, erratic and downright exhausting. Yet the keys regaining control and balance in life may not necessarily lay in making big life-changing decisions but in in making small adjustments that that can accumulate to impact our lives in a more subtle but powerful way. This is the core idea put forward by Shunyo Masuno in his critically acclaimed book. Full of clear, pragmatic, and simple lessons, the book is a useful instructional for those who seek to restore some level of peace and balance in their lives, one small step at a time.\r\n\r\n', 'book2.jpeg', '80000', 11, 'Shunmyō Masuno', 'April 18th 2019', 'Story', 'English', 2),
(12, 'The poetry of impermanence, mindfulness, and joy by John Brehm', 'Asides from philosophy Buddhism has also had a big impact on art, particularly in literature and poetry. This book stands as a testament to this fact and features a wide range of poetry written by Buddhist poets such as Han Shan, Tu Fu, Saigyo, Ryokan, Basho and Issa. Most poems revolve around easily relatable themes of compassion, friendship, humor and spirituality. What’s more it also includes works from western poets like Wallace Stevens, Robert Frost, Elizabeth Bishop as well. All of whom share a connection to the teachings of Buddha as well. Comprising of elements of both east and west, this book promises to be a fun read for anyone looking for something that is both accessible and deep. \r\n\r\n', 'book3.jpg', '120000', 11, 'John Brem', 'June 6, 2017', 'Poem', 'English', 2),
(13, 'Waking the Buddha by Clark Strand', 'The place of religion in modern life is a matter of heated debate. Some argue that religion is still broadly influential while others are of the opinion that it should become a solely private matter. In this book, however, Clark Strand, a Buddhist teacher, journalist, and editor, demonstrates how religion continues to play a significant role in shaping socio-political life through his examination of the Soka Gokkai movement. One of the largest and most dynamic Buddhist movements today, the Soka Gokkai movement has set an example of how religion can be revitalized to positively effect communities. Through following the struggles of Soak Gokkai’s founders, the. Book tells a story of resilience that challenges stereotypes of Buddhism while also shedding light on how it has transformed in recent times.\r\n\r\n', 'book4.jpeg', '198000', 11, 'Clark Strand', 'May 1, 2014', 'Novel', 'English', 2),
(14, 'Hãy chăm sóc mẹ', 'Chạm đến tận cùng trái tim của người đọc, sách kể về một người mẹ bị lạc khi chuẩn bị bước lên tàu điện ngầm ở ga Seoul để đến thăm nhà con cả. Một ngày, một tuần, rồi gần một tháng trôi qua, người cha và đám con cái bỗng phát hiện ra sự thật: người mẹ không biết chữ và vì mắc bệnh ung thư vú nên đầu óc bà không còn minh mẫn.\r\n\r\nKhi những hy vọng tìm lại mẹ trở nên mong manh, mọi người trong gia đình suy nghĩ về mẹ nhiều hơn, những khoảnh khắc xúc động như thước phim chiếu chậm trong đầu mỗi người.', 'book5.jpg', '110000', 11, ' Kyung-sook', '2009', 'Novel', 'Vietnamese', 2),
(15, 'Ba ơi, mình đi đâu?', 'Là câu chuyện buồn nhưng không đẫm nước mắt, không ủy mị, bi thương bởi đó là cách lựa chọn của Jean-Louis Fournier trong suốt cuộc đời làm cha của mình. Uất hận, than trách cuộc đời, nổi điên hay buồn bã... cũng không thể làm thay đổi được 2 cậu bé luôn phải uống thuốc an thần mỗi ngày để yên lặng.\r\n\r\nBa ơi, mình đi đâu? giúp độc giả chiêm nghiệm nhiều điều về cuộc sống, về tình thương, lý trí và cảm xúc dưới góc độ của một người cha, về sự chiến thắng nghịch cảnh trong cuộc sống và luôn hài hước dẫu đời có đắng cay.', 'book6.jpg', '79000', 11, 'Jean–Louis Fournier', '2009', 'Story', 'Vietnam', 2),
(16, 'Hạnh phúc trong 5 lá thư của mẹ', 'Chloe 15 tuổi bỗng phải học cách sống một mình trước sự ra đi đột ngột của mẹ vì bà đã không qua khỏi sau khi phẫu thuật cắt bỏ khối u trong não. Thật ra Chloe còn có chị gái Joséphine 19 tuổi và anh trai Gaspard 17 tuổi, nhưng họ quá bận rộn. Đôi lúc Chloe tủi thân nghĩ rằng em bị bỏ rơi, và lúc ấy những kỷ niệm về mẹ lại trỗi dậy...\r\n\r\nKhông có những giọt nước mắt, không nặng nề và bi thương, cuốn sách như một hồi ký với những cảm xúc lạc quan và chân thật của mẹ và con.', 'book7.jpg', '85000', 11, 'Pascale Perrier', '2017 ', 'Novel', 'Vietnam', 2),
(17, 'Celebrating the Lantern Festival ', 'Little Mei wants to know why her grandpa is making a paper lantern. Grandpa tells her the story of the Jade Emperor of Heaven and how he ordered the earth to be destroyed by fire. Includes a quick recipe for yuanxiao, sticky rice dumplings.\r\n\r\n', 'book8.jpg', '25000', 11, 'Tang Sanmu ', 'September 10, 2010', 'Picture Book', 'English', 2),
(18, 'My Lantern and the Fairy: A Story of Light and Kindness Told in English and Chinese ', 'Little Mo and her family always compete in their village\'s annual lantern competition, but this year she has no new ideas and doesn\'t know where to begin. Little Mo finds herself wishing for help in front of a lamp post, when a thunderstorm suddenly rolls in. Worried that the rain will put the lamp\'s flame out, Little Mo uses her own umbrella to cover the lamp. Little did she know, an unexpected recipient of her selfless act would guide Little Mo to victory in the lantern competition in return.\r\n\r\n\r\nNot only does this book emphasize the importance of kindness, but presents the story in both English and Chinese. Children and parents will love learning about Chinese New Year\'s Lantern Festival and Mid-Autumn Festival.', 'book9.jpg', '39000', 11, ' Xin Lin', 'September 24, 2019', 'Story', 'English', 2),
(19, 'Moon Festival Wishes: Moon Cake and Mid-Autumn Festival Celebration (Fun Festivals) ', 'In this beautifully illustrated book, children aged 2 to 6 will follow Mei as she and her family prepare for and celebrate the Mid-autumn, Mooncake, or Moon Festival. They will also enjoy reading the story behind one of the most important Chinese celebrations. More interesting facts and questions for discussion are included at the back of the book.\r\n\r\nWritten in English and Chinese, Moon Festival Wishes is perfect as an early reader or to read aloud.', 'book10.jpg', '235000', 11, ' Jillian Lin', 'September 9, 2018', 'Story', 'English', 2),
(20, 'A Christmas Carol', 'A Christmas Carol is a novella by English author Charles Dickens. It was first published by Chapman & Hall on 19 December 1843. Carol tells the story of a bitter old miser named Ebenezer Scrooge and his transformation resulting from a supernatural visit by the ghost of his former business partner Jacob Marley and the Ghosts of Christmases Past, Present and Yet to Come. The novella met with instant success and critical acclaim.The book was written and published in early Victorian era Britain, a period when there was strong nostalgia for old Christmas traditions together with the introduction of new customs, such as Christmas trees and greeting cards. Dickens\' sources for the tale appear to be many and varied, but are, principally, the humiliating experiences of his childhood, his sympathy for the poor, and various Christmas stories and fairy tales\r\n', 'book12.jpg', '215000', 17, 'Charles Dickens', ' 19 December 1843', 'Story', 'English', 2),
(27, '7 Chakra Balancing and Healing: Unblock all 7 Chakras, Aura Cleansing and Boosting, Attract Positive Energy', 'CLEANSE, HEAL, RENEW, BALANCE, AND ATTRACT POSITIVE ENERGY <br>\r\n\r\nIt\'s lovely and healing to achieve bodily and mental balance. However, the path to peace might be difficult. This book on 7 Chakra Balancing and Healing is a straightforward guide for beginners, experts, and everyone to unblock and align their chakras, find balance, and heal both body and mind. <br>\r\n\r\n\r\n\r\nIn this book you\'ll learn: <br>\r\n\r\nWhat is Chakra Healing <br>\r\nHow to Awaken Your Higher Self through Guided Meditation <br>\r\nUse chakra meditation for spiritual healing <br>\r\nHow to balance your Chakras <br>\r\nHow to heal your mind and body through energy healing <br>\r\nGet rid of any negative energy in your body <br>\r\nReduce stress and anxiety <br>\r\nRecharge your body and mind.', 'book13.jpg', '150000', 13, ' PARVATI UPADHYAY', 'December 13, 2021', 'Story', 'English', 2),
(28, 'What In The World Is Baha\'i Do You Really Need To Know', 'The world is spiraling out of control at an accelerated rate. Look at our planet. Is it in trouble? Yes, it is. Look at people’s lives. Problems abound and are getting worse by the minute: health issues, financial challenges, interpersonal problems, mental strain, marital stress, and the list goes on. <br>\r\n\r\nWhat is happening to the earth and each of us? Is it the new norm? Will it keep getting worse? Why is there so much suffering? Can anyone really see any glimmer of light at the end of the tunnel? I’m not sure they can. <br>\r\n\r\nWhat if a solution was there all the time and most of us did not know about it? Would you want to find out what it is? <br>\r\n\r\nLearn why the Baha’i Faith is the fastest growing religion, yet most of the world has not even heard of it. <br>', 'book14.jpg', '500000', 13, ' Sam Sommer', 'December 22, 2021', 'Story', 'English', 2),
(29, 'A History of Judaism', 'A sweeping history of Judaism over more than three millennia. <br>\r\n\r\nJudaism is one of the oldest religions in the world, and it has preserved its distinctive identity despite the extraordinarily diverse forms and beliefs it has embodied over the course of more than three millennia. A History of Judaism provides the first truly comprehensive look in one volume at how this great religion came to be, how it has evolved from one age to the next, and how its various strains, sects, and traditions have related to each other. <br>\r\n\r\nIn this magisterial and elegantly authored audiobook, Martin Goodman takes listeners from Judaism\'s origins in the polytheistic world of the second and first millennia BC to the temple cult at the time of Jesus. He tells the stories of the rabbis, mystics, and messiahs of the medieval and early modern periods and guides us through the many varieties of Judaism today.  <br>\r\n\r\nGoodman\'s compelling narrative spans the globe, from the Middle East, Europe, and America to North Africa, China, and India. He explains the institutions and ideas on which all forms of Judaism are based and masterfully weaves together the different threads of doctrinal and philosophical debate that run throughout its history. <br>\r\n\r\nA History of Judaism is a spellbinding chronicle of a vibrant and multifaceted religious tradition that has shaped the spiritual heritage of humankind like no other.', 'book15.jpg', '350000', 16, 'Martin Goodman', 'August 21, 2018', 'Audio Book', 'English', 2),
(30, 'Here All Along: Finding Meaning, Spirituality, and a Deeper Connection to Life--in Judaism ', '“Sarah Hurwitz was Michelle Obama’s head speechwriter, and with this book she becomes Judaism’s speechwriter.”—Adam Grant, New York Times bestselling author of Give and Take, Originals, and co-author of Option B <br>\r\nHurwitz was the quintessential lapsed Jew—until, at age thirty-six, after a tough breakup, she happened upon an advertisement for an introductory class on Judaism. She attended on a whim, but was blown away by what she found: beautiful rituals, helpful guidance on living an ethical life, conceptions of God beyond the judgy bearded man in the sky—none of which she had learned in Hebrew school or during the two synagogue services she grudgingly attended each year. That class led to a years-long journey during which Hurwitz visited the offices of rabbis, attended Jewish meditation retreats, sat at the Shabbat tables of Orthodox families, and read hundreds of books about Judaism—all in dogged pursuit of answers to her biggest questions. What she found transformed her life, and she wondered: How could there be such a gap between the richness of what Judaism offers and the way so many Jews like her understand and experience it? <br>\r\nSarah Hurwitz is on a mission to close this gap by sharing the profound insights she discovered on everything from Jewish holidays, ethics, and prayer to Jewish conceptions of God, death, and social justice. In this entertaining and accessible book, she shows us why Judaism matters and how its message is more relevant than ever, and she inspires Jews to do the learning, questioning, and debating required to make this religion their own.\r\n', 'book16.jpg', '350000', 16, ' Sarah Hurwitz ', 'September 3, 2019', 'Story', 'English', 2),
(31, 'Mere Christianity ', 'One of the most popular and beloved introductions to the concept of faith ever written, Mere Christianity has sold millions of copies worldwide. <br>\r\n\r\nThis audiobook brings together C. S. Lewis\' legendary radio broadcasts during the war years, in which he set out simply to \"explain and defend the belief that has been common to nearly all Christians at all times.\" <br>\r\n\r\nRejecting the boundaries that divide Christianity\'s many denominations, Mere Christianity provides an unequalled opportunity for believers and nonbelievers alike to absorb a powerful, rational case for the Christian faith.', 'book19.jpg', '250000', 17, 'Julian Rhind-Tutt', 'May 13, 2014', 'Audio Book', 'English', 2),
(32, 'How Christianity Saved Civilization...and Must Do So Again', 'Ancient Rome\'s brutal culture exploited the weak and considered human life expendable. Women were used as property; unwanted children were left on the streets to die. <br>\r\n\r\nHow Christianity Saved Civilization was previously published as Seven Revolutions: How Christianity Changed the World and Can Change It Again. This new edition has been brought into print to offer hope that Christianity may once again transform our dark and hostile culture.', 'book20.jpg', '250000', 17, 'Mike Aquilina', 'June 20, 2019', 'Documentary', 'English', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `bookid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `sId`, `bookid`, `quantity`) VALUES
(1, 'crp74c7c9abam8ej375i1evc96', 11, 2),
(36, 'crp74c7c9abam8ej375i1evc96', 10, 1),
(37, 'crp74c7c9abam8ej375i1evc96', 13, 1),
(39, 'crp74c7c9abam8ej375i1evc96', 14, 2),
(40, 'crp74c7c9abam8ej375i1evc96', 12, 4),
(41, 'crp74c7c9abam8ej375i1evc96', 15, 1),
(42, 'crp74c7c9abam8ej375i1evc96', 20, 2),
(46, 'u78n8l6rs7g6jtosrkivjn5c2n', 17, 6),
(47, 'u78n8l6rs7g6jtosrkivjn5c2n', 11, 3),
(50, 'u78n8l6rs7g6jtosrkivjn5c2n', 20, 6),
(51, 'u78n8l6rs7g6jtosrkivjn5c2n', 10, 3),
(52, 'u78n8l6rs7g6jtosrkivjn5c2n', 12, 1),
(54, '8ofaia4tbj798i2pabiif6nv9p', 11, 1),
(55, '8ofaia4tbj798i2pabiif6nv9p', 14, 15),
(74, 'qijicgr5edjibjqcvih39vrlhb', 20, 1),
(75, 'qijicgr5edjibjqcvih39vrlhb', 10, 1),
(76, 'qijicgr5edjibjqcvih39vrlhb', 11, 12),
(77, 'qijicgr5edjibjqcvih39vrlhb', 13, 3),
(78, 'cg4b8if6rmaeb4mqlethoc9vch', 11, 1),
(79, 'cg4b8if6rmaeb4mqlethoc9vch', 10, 1),
(98, 'ep97fn61lgijn342jrh86aoo45', 10, 1),
(99, 'ep97fn61lgijn342jrh86aoo45', 18, 1),
(100, '68u7hmt0fb74j0s7l7gb3ubk0i', 18, 1),
(101, '68u7hmt0fb74j0s7l7gb3ubk0i', 19, 1),
(108, 'vms4j60aigkqj8krgajrgq0ncp', 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `feedbackdate` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `adminid`, `content`, `feedbackdate`, `rate`) VALUES
(22, 18, 'agagsa', '03/11/2022', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `festival`
--

CREATE TABLE `festival` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `idreligion` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `festival`
--

INSERT INTO `festival` (`id`, `name`, `description`, `place`, `img`, `idreligion`, `time`, `latitude`, `longtitude`) VALUES
(9, 'Great Buddha Day', 'It commemorates the Buddha\'s birth, enlightenment, and death, which are all said to have happened on the same date. It is held around May or Vesak, based on the lunar calendar.\r\nBuddhists do not believe in a single god who created the world and everything in it \\n\r\nMost Buddhists believe in the teachings of a man called Siddhartha Gautama - also known as the Buddha.\r\nSiddhartha is believed to have been a prince who was born into a wealthy family in what is now called Nepal in the 5th Century BC.\r\nIt\'s believed that Siddhartha Gautama realized that wealth and luxury did not guarantee happiness. So he traveled as a homeless holy man to learn more about the world and saw the suffering in the world.', ' India, Thailand, and North and South Korea.', 'fes31.jpg', 11, 'Sunday, May 15', '51.2087', '89.2344'),
(10, 'Vu Lan ceremony', 'Vu Lan ceremony or filial piety is the honor and respect children show their parents, grandparents, and elderly relatives. For example. when children demonstrate filial piety in China, they are viewed as trustworthy and respectable. Children who don’t show respect to the elderly in their lives are viewed as shameful and of a bad character.  \r\n\r\nWhile respect shown to all older adults can be viewed as a form of filial piety, the deepest dedication is to be given to parents alone. Filial piety is seen in many Eastern cultures through submission to the wishes of parents. They must help the elderly by making them happy and comfortable during the final years of their lives.\r\n\r\nAs opposed to Western culture, where adult children leave home and many never return, in Eastern culture, thanks to filial piety, adult children view it as their responsibility to take care of their parents until they die.\r\n\r\nVu Lan festival is usually held on the 15th day of the 7th lunar month every year.\r\n', 'Quang Phuoc Pagoda (Wat Anamnikayaram) and Canh Phuoc Pagoda (Wat Samananam Borihan) in Bangkok, Thailand', 'pic2.png', 11, 'Monday, August 22 ', '13.9131', '108.9171\n'),
(11, 'Lantern Festival', 'Lantern Festival, also called Yuan Xiao Festival, holiday celebrated in China and other Asian countries that honours deceased ancestors on the 15th day of the first month (Yuan) of the lunar calendar. The Lantern Festival aims to promote reconciliation, peace, and forgiveness. The holiday marks the first full moon of the new lunar year and the end of the Chinese New Year (see Lunar New Year). During the festival, houses are festooned with colourful lanterns, often with riddles written on them; if the riddle is answered correctly, the solver earns a small gift. Festival celebrations also include lion and dragon dances, parades, and fireworks. Small glutinous rice balls filled with fruits and nuts, called yuanxiao or tangyuan, are eaten during the festival. The round shape of the balls symbolizes wholeness and unity within the family. The Lantern Festival is celebrated on Tuesday, February 15, 2022.\n\nThe Lantern Festival may originate as far back as the Han dynasty (206 BCE to 220 CE), when Buddhist monks would light lanterns on the 15th day of the lunar year in honour of the Buddha. The rite was later adopted by the general population and spread throughout China and other parts of Asia. A legend concerning the festival’s origin tells the tale of the Jade Emperor (You Di), who became angered at a town for killing his goose. He planned to destroy the town with fire, but he was thwarted by a fairy who advised the people to light lanterns across the town on the appointed day of destruction. The emperor, fooled by all the light, assumed the town was already engulfed in flames. The town was spared, and in gratitude the people continued to commemorate the event annually by carrying colourful lanterns throughout the town.', 'Guangzhou, China', 'pic4.jpg', 11, 'Tuesday, February 15', '23.1302\n', '113.2593'),
(12, 'Christmas Day ', 'The 25th of December is the time when Western Christians celebrate the birth of Jesus who Christians believe to be both the Messiah (or in Greek: the Christ) and son of God (that is, divine). Eastern Orthodox Christians celebrate the birth on the 7th January.\r\n\r\nJesus\' birth or \'nativity\' is described in the Bible, in the New Testament Gospels of Matthew and Luke. There is disagreement among Christians about the status of the accounts, some regarding them as describing theological truths but not historical ones. The Gospels do not mention the date of Jesus\' birth which was set by Pope Julius in the 4th century CE in order to Christianise the Pagan celebrations that took place at that time of year.\r\n\r\nThe story of the nativity was taught through traditions of plays and also models of the manger, or crib, that Luke\'s Gospel states that the Jesus was born in. Today the Christmas festival has elements of Christian, Pagan and folk traditions and many Christians and non-Christians have concerns about its over-commercialisation.', 'Jersey, USA', 'pic5.png', 17, 'December 25', '39.0848', '-90.3303'),
(13, 'Epiphany Day', 'Epiphany on 6 January is a Greek word meaning \'to show\' and also marks the end of the 12 days of Christmas in Western Christian churches. The feast of the Epiphany celebrates the showing of Jesus to the non-Jewish world (or Gentiles), represented by the visit of the Magi (possibly wise men, astrologers or Persian priests) to Jesus as recorded in the gospel of Matthew (ch2 vv1-12). Matthew records that they brought three gifts: gold, frankincense and myrrh and so it is assumed that there were three Magi.\r\n\r\nThe gifts have been regarded as symbolic of the nature of Jesus: gold for a king, frankincense (offered to God during worship) for a priest or even God, and myrrh (used for healing and embalming the dead) for the death of Jesus which brings healing or wholeness to humankind.\r\n\r\nThe Epiphany or the Epiphany Season (lasting for at least the whole of January) is also associated with the baptism of Jesus in the River Jordan and the story, told by the writer of John\'s gospel, of the wedding at Cana in Galilee in which Jesus turns water into wine. Both are seen by Christians as a showing or revealing of the nature and work of Jesus. In particular, the story of the wedding at Cana in Galilee may be seen as a revealing of Jesus as the one who turns our selfish nature (water) into a loving, or divine, nature (wine).', 'Vienna, Austria ', 'pic6.jpg', 17, 'Friday, January 6', '48.2084\n', '16.3725\n'),
(14, 'Easter Day', 'Easter Day or Easter Sunday commemorates the resurrection of Jesus as the Christ (God\'s Anointed) after his death the Friday before (see Good Friday). His disciples began to experience Christ to be with them in a new way. Easter eggs are given which symbolise the new life which Christians experience and see at the heart of God\'s world. <br>\r\nSince Easter happens on the Sunday following the Paschal Full Moon, it can fall on any date between March 22 and April 25. <br>\r\nThe story behind Easter lies in the New Testament of the Bible which narrates how Jesus was arrested by the Roman authorities because he claimed to be the “Son of God”. He was then sentenced to death by Pontius Pilate, the Roman emperor by crucifixion. His resurrection three days later marks the occasion of Easter. This day is also closely associated with the Jewish festival of Passover.\r\n\r\n\r\n\r\n', 'Frankfurt, Germany', 'pic7.jpg', 17, 'Sunday, April 17', '50.1106', '8.6821'),
(15, 'Thanksgiving', 'Thanksgiving Day, annual national holiday in the United States and Canada celebrating the harvest and other blessings of the past year. Americans generally believe that their Thanksgiving is modeled on a 1621 harvest feast shared by the English colonists (Pilgrims) of Plymouth and the Wampanoag people.\r\n<br>\r\nThanksgiving Day is a national holiday in the United States, and Thanksgiving 2021 occurs on Thursday, November 25. In 1621, the Plymouth colonists and the Wampanoag shared an autumn harvest feast that is acknowledged today as one of the first Thanksgiving celebrations in the colonies. For more than two centuries, days of thanksgiving were celebrated by individual colonies and states. It wasn’t until 1863, in the midst of the Civil War, that President Abraham Lincoln proclaimed a national Thanksgiving Day to be held each November.', 'Québec, Canada', 'pic8.png', 17, 'Thursday, November 24', '46.8137', '-71.2084'),
(17, 'Holi Festival Of Color', 'Holi is a two-day Hindu festival that originated in India. On the first day, everyone will gather around the fire and celebrate the victory of good over evil. But that\'s the second day most people will recognize - that\'s when the aromatic powder called gulal is poured on people and made to stick with water pistols and balloons.\r\nThere are many Hindu legends that are said to contribute to the meaning of the festival, but there are two in particular that are said to be the most popular - each celebrated over a period of two days. Holika and Hiranyakashipu\r\nOn the first evening of Holi, ceremonies and celebrations take place around a bonfire. The legend that some believe inspires this tradition revolves around two demonic brothers, Holika and Hiranyakashipu.\r\nHiranyakashipu was a Demon King and was granted immortality… that sort of thing. What he has actually been endowed with are five special powers, meaning he cannot be killed under certain circumstances. Specifically, he cannot be killed:\r\n1. by animals or humans\r\n2. Indoor or outdoor\r\n3. day or night\r\n4. on land, in the air or in the water\r\n5. by bullets or by firearms.\r\nSo he is practically invincible. His immense power led him to believe that he was a god and he forced his subjects to worship him. If they didn\'t, they would be brutally punished or killed.\r\nDespite this, Hiranyakashipu\'s son Prahlad continued to worship the Hindu god Vishnu instead of his father. The demon king, not wanting special treatment for his son, devised a plan to kill his son.\r\n\r\nHiranyakashipu involved his sister Holika in the plan. She had a special cloak that protected her from fire, so she put Prahlad in the fire under the cloak, with the intention of taking it away, and thus killing him, once inside. . However, the cloak flew away from Holika and was replaced by Prahlad, protecting him and killing her.\r\nMeanwhile, Vishnu saw all this and decided it was time to get rid of the evil Hiranyakashipu once and for all.\r\n\r\nHe overcame Hiranyakashipu\'s five powers by:\r\n-coming in half lion, half human form (not animal or human)\r\n-to dusk (not day or night)\r\n-appears at the door of the house (not outdoors or indoors)\r\n-put Hiranyakashipu on his lap (not earth, water or air)\r\n-and kill Hiranyakashipu with his claws (not bullets or hand weapons)\r\n\r\nThe Holi festival is said to take its name from the demon sister Holika. That\'s also why the first evening of the festival takes place around a bonfire - it\'s a celebration of good triumphing over evil, light overcoming darkness. But it still doesn\'t explain why people are so willing to wear colorful powder from head to toe on the second day of Holi. For that, we need to move on to another myth.\r\n\r\nThe Legend of Krishna\r\nThe Hindu god Krishna is quite mischievous. He complains to Yashoda\'s mother that he doesn\'t like his dark blue skin and wants to be fairer, like the love of his life Radha.\r\n\r\nYashoda, who loves his son, asks him to paint Radha\'s face any color he wants, to make him feel better. So that\'s exactly what Krishna did. Krishna and Radha are still madly in love after he does this, so Radha clearly doesn\'t mind Krishna\'s little practical joke.\r\n\r\nSome believe this is why, during Holi, people throw each other with fragrant gulal powder. That might also be why one of Holi\'s names is \'festival of love\', as it partly celebrates the love between Krishna and Radha (as well as emulating his prank).\r\n\r\nGulal powder comes in many colors and some are said to denote specific things: 1. red = love\r\n2. blue = Krishna\r\n3. gold = turmeric (a spice used in many Indian dishes)\r\n4. green = spring', 'Jaipur, Rajasthan ,India', 'pic9.jpg', 13, 'Friday, March 18', '26.9155', '75.8190'),
(18, 'Um Diwali', 'Every year around October and November, Hindus around the world celebrate Diwali, or Deepavali—a festival of lights that stretches back more than 2,500 years. Diwali 2021 occurs on Thursday, November 4. In India, the five-day celebration traditionally marks the biggest holiday of the year. <br>\r\n\r\nLike many Hindu festivals, there isn’t just one reason to celebrate the five-day holiday. Pankaj Jain, a professor of anthropology, philosophy, and religion at the University of North Texas, says that the ancient celebration is linked to multiple stories in religious texts, and it’s impossible to say which came first, or how long ago Diwali started. <br>\r\n\r\nMany of these stories are about the triumph of good over evil. In northern India, a common tale associated with Diwali is about King Rama, one of the incarnations of the god Vishnu. When an evil king in Lanka (which some people associate with Sri Lanka) captures Rama’s wife Sita, he “builds up an army of monkeys” to rescue her, Jain says. <br>\r\n\r\nThe monkeys “build a bridge over from India to Sri Lanka, and they invade Sri Lanka and free Sita and kill that evil king,” he says. As Rama and Sita return to the north, “millions of lights are spread out across the city Ayodhya just to help them come back home, just to welcome them.” Lighting lamps has long been one of the ways that Hindus celebrate Diwali <br>\r\nThe name Diwali comes from Sanskirt Deepavali, which means \"row of lights,\" the Old Farmer\'s Almanac wrote. The five-day festival celebrates the triumph of light over dark and good over evil. During the celebration, adherents light oil lamps and place them around their homes, praying for health, knowledge and peace.', 'Uttar Pradesh, India', 'pic10.jpg', 13, 'Monday, October 24', '27.1303', '80.8597'),
(19, 'Maha Shivarati', 'History And Significance\r\n\r\nOf the 12 Shivratris observed in any given year, Maha Shivratri is considered especially auspicious. Shivratri is supposed to be the night of convergence of Shiva and Shakti, which in essence mean the masculine and feminine energies that balance the world. In Hindu culture, this is a solemn festival that marks the remembrance of ‘overcoming darkness and ignorance in life’. Different legends, throughout history, describe the significance of Maha Shivratri and according to one of them, it is on this night that Lord Shiva performs his cosmic dance of ‘creation, preservation and destruction’. Another legend dictates that on this night, offerings of Lord Shiva’s icons can help one overcome and let go of their sins and start on the path of righteousness, allowing the individual to reach Mount Kailash and achieve ‘moksha’.', 'West Bengal, India', 'pic11.jpg', 13, 'Tuesday, March 1\n', '22.9965', '87.6856'),
(20, 'Navatri-Dussehra-Durga Puja', 'Navratri, (Sanskrit: “Nine Nights”) in full Sharad Navratri, Navratri also spelled Navaratri, in Hinduism, major festival held in honour of the divine feminine. Navratri occurs over 9 days during the month of Ashvin, or Ashvina (in the Gregorian calendar, usually September–October). <br>\r\nDurga Pooja, also known as Durgotsava or Sharodotsava, is an annual Hindu festival originating in the Indian subcontinent which reveres and pays homage to the Hindu goddess Durga and is also celebrated because of Durga\'s victory over Mahishasur. It is particularly popular and traditionally celebrated in the Indian states of West Bengal, Bihar, Jharkhand, Odisha, Tripura, Assam and the country of Bangladesh. The festival is observed in the Indian calendar month of Ashwin, which corresponds to September–October in the Gregorian calendar. Durga Puja, is a ten-day festival, of which the last five are of the most significance.The puja is performed in homes and public, the latter featuring a temporary stage and structural decorations (known as pandals). The festival is also marked by scripture recitations, performance arts, revelry, gift-giving, family visits, feasting, and public processions. Durga puja is an important festival in the Shaktism tradition of Hinduism. <br>\r\nDurga puja in Kolkata has been inscribed on the Intangible cultural heritage list of UNESCO in December, 2021.', 'Mathura, India', 'pic12.jpg', 13, '26 September', '27.6333', '77.5833'),
(21, 'Losar', 'The origin of Losar can be taken back even before the Buddhism religion was established in Tibet. In the early pre-Buddhist period, the Tibetans followed the religion. During these celebrations, a spiritual custom was followed by the people in the winter season. They burned incense in large quantities to please the local spirits, deities and protectors. Eventually with the arrival of Buddhism in Tibet, the older ceremony of  was incorporated into the Buddhist tradition, thereby becoming the Buddhist Losar festival. This religious custom became an annual Buddhist festive occasion during the reign of the ninth king of Tibet, Pude Gungyal.\r\n<br>\r\nThis festival is known to have started when an old woman named Belma introduced the method of measuring time based on the phases of the moon. To add on, this festival was held during the flowering of the apricot trees in autumn in the Lhokha Yarla Shampo region. It is also believed to be the first celebration as a traditional farmers\' festival. Also, during this period, the art of cultivation, irrigation, refining iron from ore and building bridges were introduced in Tibet. These ceremonies can be related to be the precursors of the Losar festival. Later when the principles of astrology were introduced to Tibet, based on the five elements, this farmer\'s festival was renamed as Losar or New Year as we know today.\r\n<br>\r\nLosar is also referred to as Bal Gyal Lo, where \'bal\' means \'Tibet\'; \'gyal\' means \'king\' and \'lo\' means \'year\'. The Tibetan New Year is called Bal Gyal Lo since it was first celebrated after the enthronement of the first king. Today, different rituals and customs are followed to celebrate the Losar festival. Preparations begin almost one month in advance. Various attractive decorations are put up and offering, known as \'Lama Losar\', are made. People dress in new clothes and head off to monasteries, shrines and stupas to offer prayers to the Lord. Food and gifts are donated to monks and nuns. People exchange greetings and wish good luck by saying \'Tahsi Delek\'.\r\n', 'Tibet, Bhutan, Nepal, India', 'fes19.jpg', 11, 'Thursday, March 3', '28.1084', '84.0917'),
(22, 'Hanukkah, A Festival Of Lights', 'Hanukkah falls on the eve of the 25th of the Jewish month of Kislev and lasts eight days. That lands it somewhere in December on the Gregorian calendar (though in 2013 it fell on Thanksgiving in November, an extremely rare occurrence). Also called the Festival of Lights, Hanukkah celebrates events from more than 2,000 years ago. First and foremost, it commemorates the rededication of the Second Temple in Jerusalem after a successful revolt of the Jewish people led by Judah Maccabee against their Syrian-Greek oppressors, who had tried to assimilate the Jewish people and, in so doing, had desecrated the Temple. The reason the holiday is celebrated for eight days stems from what is told in the Talmud: when it came time for the rededication of the Second Temple, only one day’s worth of pure oil was found to use in the temple’s menorah—which was meant to burn all night every night—but miraculously the oil burned for eight days. This gave enough time to collect a fresh supply of oil and, with the belief that a miracle from God had occurred, a reason to celebrate for a full eight days. <br>\r\n\r\nToday, especially in North America, Hanukkah is often thought of as the Jewish counterpart to Christmas, an association that developed because of Hanukkah’s proximity to December 25. The giving of gifts and displaying of holiday decorations have nothing to do with the Jewish holiday but were customs adopted from Christmas traditions. True Hanukkah traditions include lighting the candles on a nine-branched menorah called a Hanukkiah and saying the blessings, making and eating potato latkes (pancakes) and sufganiyot (jelly doughnuts)—both cooked in oil—and playing dreidel, a game of chance played with a four-sided top.', ' around the world, wherever there are Jewish people', 'fes15.jpg', 16, 'Sunday, December 18', '31.5313', '34.8668'),
(23, 'Monlam Prayer', 'Considered the most important event for Tibetan Buddhists, the Monlam great prayer festival starts three days after the lunar new year in western China’s ethnic Tibetan region and is held for almost two weeks. During Monlam, millions of pilgrims travel to monasteries to pray for good fortune in the new year and make offerings to their late relatives. <br>\r\n4th–11th day of the 1st Tibetan month in Tibetan Buddhism.\r\nThe origin of Great Prayer Festival was to mark the display of the Buddha’s miraculous powers and the defeat of his doctrinal opponents in the town of Shravasti in ancient India. Following his victory, the Buddha delivered a discourse to a large assembly of devotees among whom many developed an altruistic aspiration for enlightenment.\r\n<br>\r\nTsong Khapa established the First Great Prayer Festival in Lhasa in 1409, to be held on the 3rd or 4th day of the first lunar month. The First Monlam was marked by the completion of a major restoration of the Jokhang temple in Lhasa. The preceding year, all the statue makers in the areas were summoned to clean, wash and repair the statues in the Jokhang. The celebrated Skyamuni statue, brought to Tibet in the 7th century by the Chinese Princess married to King Songtsen Gompo, was offered a new gold crown and ear pendants.\r\n', 'Mongolia, North Korea', 'fes13.jpg', 11, '17 February ', '46.8250', '103.8500');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `idfestival` int(11) DEFAULT NULL,
  `idworldfestival` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `source`, `idfestival`, `idworldfestival`) VALUES
(1, 'fes34.jpg', NULL, 14),
(4, 'fes37.jpg', NULL, 14),
(5, 'fes38.jpg', NULL, 1),
(7, 'fes40.jpg', NULL, 1),
(8, 'fes41.jpg', NULL, 4),
(9, 'fes42.jpg', NULL, 4),
(10, 'fes43.jpg', NULL, 4),
(11, 'fes44.jpg', NULL, 5),
(12, 'fes45.jpg', NULL, 5),
(14, 'fes47.jpg', NULL, 6),
(16, 'fes49.jpg', NULL, 6),
(17, 'fes50.jpg', NULL, 6),
(18, 'fes51.jpg', NULL, 7),
(19, 'fes52.jpg', NULL, 7),
(20, 'fes53.jpg', NULL, 8),
(21, 'fes54.jpg', NULL, 8),
(22, 'fes55.jpg', NULL, 9),
(23, 'fes56.jpg', NULL, 9),
(24, 'fes57.jpeg', NULL, 10),
(25, 'fes58.jpg', NULL, 11),
(26, 'fes59.jpg', NULL, 12),
(27, 'fes60.jpg', NULL, 13),
(28, 'fes61.jpg', NULL, 15),
(29, 'fes62.jpg', NULL, 16),
(31, 'fes64.jpg', NULL, 18),
(32, 'fes65.jpg', 21, NULL),
(53, 'fes67.jpg', 10, NULL),
(54, 'fes68.jpg', 11, NULL),
(55, 'fes69.jpg', 12, NULL),
(56, 'fes70.jpg', 12, NULL),
(57, 'fes71.jpg', 13, NULL),
(59, 'fes73.jpg', 13, NULL),
(60, 'fes75.jpg', 14, NULL),
(61, 'fes74.jpg', 14, NULL),
(63, 'fes76.jpg', 15, NULL),
(64, 'fes77.jpg', 15, NULL),
(65, 'fes78.jpg', 17, NULL),
(66, 'fes79.jpg', 18, NULL),
(67, 'fes80.jpg', 19, NULL),
(68, 'fes81.jpg', 19, NULL),
(69, 'fes82.jpg', 20, NULL),
(70, 'fes83.jpg', 22, NULL),
(71, 'fes15.jpg', 22, NULL),
(72, 'fes84.jpg', 23, NULL),
(73, 'fes13.jpg', 23, NULL),
(74, 'fes85.jpg', NULL, 17),
(75, 'fes31.jpg', 9, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `religion`
--

INSERT INTO `religion` (`id`, `name`, `description`) VALUES
(11, 'Buddha', 'Siddhartha Gautama, the founder of Buddhism who later became known as “the Buddha,” lived during the 5th century B.C. Gautama was born into a wealthy family as a prince in present-day Nepal. Although he had an easy life, Gautama was moved by suffering in the world'),
(13, 'Hinduism', 'Hinduism is the religion of the majority of people in India and Nepal. It also exists among significant populations outside of the sub continent and has over 900 million adherents worldwide'),
(16, 'Judaism', 'Judaism is the world’s oldest monotheistic religion, dating back nearly 4,000 years. Followers of Judaism believe in one God who revealed himself through ancient prophets. The history of Judaism is essential to understanding the Jewish faith, which has a rich heritage of law, culture and tradition.'),
(17, 'Christianity', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `sId`, `bookid`) VALUES
(9, 'u78n8l6rs7g6jtosrkivjn5c2n', 11),
(10, 'u78n8l6rs7g6jtosrkivjn5c2n', 10),
(11, 'u78n8l6rs7g6jtosrkivjn5c2n', 13),
(12, 'u78n8l6rs7g6jtosrkivjn5c2n', 12),
(13, 'u78n8l6rs7g6jtosrkivjn5c2n', 15),
(19, 'qijicgr5edjibjqcvih39vrlhb', 20),
(20, 'cg4b8if6rmaeb4mqlethoc9vch', 10),
(21, 'cg4b8if6rmaeb4mqlethoc9vch', 11),
(22, 'cg4b8if6rmaeb4mqlethoc9vch', 13),
(23, '6v337c6d3hrh4r22qf7suludri', 10),
(24, '6v337c6d3hrh4r22qf7suludri', 11),
(25, 'ep97fn61lgijn342jrh86aoo45', 10),
(26, 'ep97fn61lgijn342jrh86aoo45', 18),
(27, '68u7hmt0fb74j0s7l7gb3ubk0i', 19),
(28, '68u7hmt0fb74j0s7l7gb3ubk0i', 18),
(30, 'vms4j60aigkqj8krgajrgq0ncp', 27),
(31, 'vms4j60aigkqj8krgajrgq0ncp', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `worldfestival`
--

CREATE TABLE `worldfestival` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `worldfestival`
--

INSERT INTO `worldfestival` (`id`, `name`, `description`, `img`, `place`, `time`, `latitude`, `longtitude`) VALUES
(1, 'Carnevale Di Venezia', 'The Venice Carnival is the Venice-carnival-history-masquerade-costumeost well- known and one of the oldest festivals annually celebrated in the world. The word ‘carnival’ or ‘carnivale’ in Italian is believed to be derived from the Latin words ‘carnem levare’ or ‘carnelevarium’ which mean to take away or remove meat! Another meaning for the world carnival could be also from the Latin words ‘carne vale’ or ‘farewell to meat\'.That phrase perfectly describes a time devoted to preparing for Lent, the Christian tradition of the forty days period before Easter, during which abstinence from meat is practiced. The Venice Carnival takes place each year in February. It begins around two weeks before Ash Wednesday and ends on Shrove Tuesday, also known as Fat Tuesday (Mardi Gras in French or Martedi Grasso in Italian).<br>\r\n\r\nAnti-Mask Law <br>\r\n\r\nThe main feature of the Venice Carnival has always been the stunning masquerade costumes and masks. Masks used to have symbolic and functional features. During the Venice Carnivals in the past the streets of Venice were full of the people wearing masks which allowed them to protect their identity and remove any social differences. Besides, masks allowed a wearer hide his identity during licentious and dissolute activities. The earliest documented mention of people wearing masks dates back to 1268 when masked people were banned from playing various games by law.  <br>\r\n\r\nWhen the Great Council prohibited to throw scented eggs filled with rose water towards strolling ladies, Mattaccino masks became the first law regulated masks. They were worn by young nobles dressed as clowns. This ‘game’ turned out to be so popular that the government even made a decision to install nets to protect those ladies from soiling of their expensive garments. In 1339 another law prohibited masked people from visiting nun\'s convents, painting their faces and wearing false beards and wigs (in order to protect people from robbers and murders who regularly wore them). The lack of any other documented sources about masking suggests that people did not wear them frequently before the 13th century. <br>\r\n\r\nThe First Carnival <br>\r\n\r\nHowever, it is believed that the tradition to celebrate the Venice Carnival may have venice-carnival-history-bullstarted in 1162 with the celebration of the victory over Ulrich II of Treven, the Patriarch of Aquileia (an ancient Roman city in Italy). Urich II was taken prisoner together with his 12 vassals and eventually released on one specific condition. Every year on Holy Thursday the Patriarch was obliged to pay a tribute to Venice that included a bull and 12 pigs which than were slaughtered in the Piazza San Marco in front of Venetians to commemorate the victory. On that day the street celebrations, games, people dancing and bonfires would take over the streets of the city. <br>\r\n\r\nBy the 18th century the Venice Carnival became one of the most popular tourist attractions and attracted people from all over the Europe. The festivities continued for 6 months of the year. During that time, Venice was known as a centre of gambling, the ‘Las Vegas’ of its day. It was the place where music and dancing continued almost non-stop. This period is also associated with the Venetian painter Francesco Guardi and with the famous Venetian adventurer and ‘womanizer’ Giacomo Casanova. <br>\r\n\r\nUnfortunately, the Venice Carnival fell into decline after when Napoleon signed the Treaty of Campo Formio and Venice became part of the Austrian-held Kingdom of Lombardy-Venetia in 1797. On January 18, 1798 the Austrians took control of the whole city and the Carnival almost disappeared for nearly two centuries. In the 1930s Venice Carnival was banned by the fascist government and was finally revived only in the 1980s with its distinctive traditions and celebrations making Venice as one the best Carnival destinations for tourists from all over the world. ', 'fes20.jpg', 'Venice, Italy', 'Saturday, February 12', '45.440847', '12.315515'),
(4, 'Sapporo Snow ', 'The 1950 festival was held in conjuction with snowball fights, snow sculpture exhibitions, and a carnival. Despite low expectations, more than 50 thousand people showed up to the event. Following this, the snow festival became known as a seasonal event held every winter by the city citizens. Three years later (1953), for the first time, a towering 15 meter (~49 ft.3 in.) snow sculpture, \"Ascension\", was made. <br>\r\nIn 1955, the Japan Self-Defense Forces also participated, and challenged themselves to making a large-scale snow sculpture.\r\nThe 10th year anniversary in 1959 saw the rallying of 2,500 participants in the making of the snow sculptures. This was also the first time the event was introduced on television stations and newspaper articles. Accordingly, due to the exposure gained from the media, the following year\'s festival became a huge success with the increase in the number of tourists from Honshu. <br>\r\n\r\n\r\n1965, formally established the Makomanai venue as the second venue. <br>\r\nIn 1972, the Winter Olympics were held in Sapporo. This year\'s snow festival was held with the theme, \"Welcome to Sapporo\" - thus gaining exposure for the event on an international level.\r\n1974 was the year of adversity marked by the oil crisis. Gasoline was not able to be procured for the small trucks responsible for treading over the soft snow continuously to create solid, hard snow. Creative measures had to be taken to keep the snow statues standing, such as the usage of steel drums within the structures. Additionally, this year marked the start of the International Snow Sculpture Contest.<br>\r\n\r\n\r\nIn the ensuing years, following 1974, cosmopolitan locations with strong ties to Sapporo such as Shenyang, Alberta, Munich, Sydney, Poland, etc. were exhibited as snow sculptures, distinguishing the forming of the snow festival from a domestic event to an international event.<br>\r\nAfterwards, the 34th anniversary in 1983 came with the arrival of the Susukino venue as the third official venue, emerging with a spectacular display of neon-lit snow sculptures, pioneering a new aspect to the snow festival. From 1984, the two day event was extended to seven days. The continuing expansion fo the festival can be attributed to the popularity of the well loved snow festival with people worldwide. <br>\r\nIn 2005, the 40 year Makomanai venue closed down. From 2006 - 2008, the Sapporo Satoland venue was opened, and from 2009, the Tsudome venue was designated as the second venue. With every coming day, the snow festival will continue to evolve and move towards new innovative fronts.', 'fes21.jpg', 'Hokkaido, Japan', 'Saturday, February 5', '43.064615', '141.346807'),
(5, 'Sky Lantern Festival', 'Lantern Festival, also called Yuan Xiao Festival, holiday celebrated in China and other Asian countries that honours deceased ancestors on the 15th day of the first month (Yuan) of the lunar calendar. The Lantern Festival aims to promote reconciliation, peace, and forgiveness. The holiday marks the first full moon of the new lunar year and the end of the Chinese New Year (see Lunar New Year). During the festival, houses are festooned with colourful lanterns, often with riddles written on them; if the riddle is answered correctly, the solver earns a small gift. Festival celebrations also include lion and dragon dances, parades, and fireworks. Small glutinous rice balls filled with fruits and nuts, called yuanxiao or tangyuan, are eaten during the festival. The round shape of the balls symbolizes wholeness and unity within the family. The Lantern Festival is celebrated on Tuesday, February 15, 2022.\n\nThe Lantern Festival may originate as far back as the Han dynasty (206 BCE to 220 CE), when Buddhist monks would light lanterns on the 15th day of the lunar year in honour of the Buddha. The rite was later adopted by the general population and spread throughout China and other parts of Asia. A legend concerning the festival’s origin tells the tale of the Jade Emperor (You Di), who became angered at a town for killing his goose. He planned to destroy the town with fire, but he was thwarted by a fairy who advised the people to light lanterns across the town on the appointed day of destruction. The emperor, fooled by all the light, assumed the town was already engulfed in flames. The town was spared, and in gratitude the people continued to commemorate the event annually by carrying colourful lanterns throughout the town.', 'fes22.jpg', 'PingXi, Taiwan', '26 February', '24.918333', '121.8375'),
(6, 'Coachella Valley Music And Arts', 'The Coachella Valley Music and Arts Festival is an annual music and arts festival held at the Empire Polo Club in Indio, California, in the Coachella Valley in the Colorado Desert. It was co-founded by Paul Tollett and Rick Van Santen in 1999, and is organized by Goldenvoice, a subsidiary of AEG Presents.Held annually at the 78-acre Empire Polo Club in the beautiful Southern California desert, The Coachella Valley Music and Arts Festival is one of the most critically acclaimed music festivals in the world, eleven times selected by Pollstar as the “Festival of the Year”. Coachella mixes some of the most groundbreaking artists from all genres of music along with a substantial selection of art installations from all over the world.\n\nThe Coachella Valley Music and Arts Festival (commonly referred to as Coachella or the Coachella Festival) is an annual music and arts festival held at the Empire Polo Club in Indio, California, located in the Inland Empire\'s Coachella Valley, in the Colorado Desert. It was co-founded by Paul Tollett and Rick Van Santen in 1999, and is organized by Goldenvoice, a subsidiary of AEG Live as of 2001.[1] The event features many genres of music, including rock, indie, hip hop, and electronic dance music, as well as art installations and sculptures. Across the grounds, several stages continuously host live music. The main stages are the: Coachella Stage, Gobi Tent, Mojave Tent, Outdoor Theatre, and Sahara Tent; a smaller Oasis Dome was used in 2006 and 2011, while a new Yuma stage was introduced in 2013.\n\nThe festival\'s origins trace back to a 1993 concert that Pearl Jam performed at the Empire Polo Club while boycotting venues controlled by Ticketmaster. The show validated the site\'s viability for hosting large events, leading to the inaugural Coachella Festival\'s being held over the course of two days in October 1999—just three months after Woodstock \'99. After no event was held in 2000, Coachella returned on an annual basis beginning in April 2001, as a single-day event. In 2002, the festival reverted to a two-day format. Coachella was expanded to a third day in 2007 and eventually a second weekend in 2012; it is currently held on consecutive three-day weekends in April, with each weekend having identical lineups. Organizers began permitting spectators to camp on the grounds in 2003, one of several expansions and additions of amenities that have been made in the festival\'s history.\n\nCoachella showcases popular and established musical artists, as well as emerging artists and reunited groups. Coachella is one of the largest, most famous, and most profitable music festivals in the United States. The 2015 festival sold 198,000 tickets and grossed $84.3 million, both records.', 'fes23.jpg', 'Indio, California', 'Friday, April 15', '33.718651', '-116.218178'),
(7, 'Boseong Green Tea', 'Wild tea has been cultivated here as far back as the mid-300’s BC while green tea was introduced to Korea from China in the 600’s AD during the Silla Dynasty. During the Goryeo Dynasty, it was mainly farmed at the temples and the royal court, while in the Joseon Dynasty, it began to grow naturally in Jeolla and Gyeongsang provinces. <br>\r\nBoseong is considered the birthplace of the commercial tea industry and is the largest producer of tea in the country. At the Boseong Aromatic Tea Festival, some of the most popular festival events are the hands-on experience programs such as picking tea leaves, making tea, and sampling green tea snacks. Other events such as the tea exhibition & sales, and a number of celebratory performances are also scheduled to be held during the festival period. <br>\r\nAccording to the brochure, the best conditions for tea are:\r\n\r\n1,500mm or more of rainfall annually\r\nsoil that works with air and water\r\na cooler climate\r\na huge temperature range throughout the day\r\nhumid conditions like those found near bodies of water <br>\r\n\r\nAn official green tea plantation was developed in the 1930’s after the Japanese decided it was the best place to cultivate green tea in the peninsula. However, the plantation fell victim to the Korean War and was pretty much destroyed.<br>\r\n\r\nIn 1957, Chang Young Seop re-established the Daehan Tea Garden and built it into what it is now. (This is also why you’ll sometimes see “1957” on different souvenirs or stores.) <br>\r\n\r\nToday there are over 5.8 million tea trees and 3 million other trees around, and Boseong as a whole is responsible for 40% of Korea’s tea production. While there are some other privately owned plantations in the county, the Daehan one is the biggest. Its farming methods are also fully organic. \r\n', 'fes24.jpg', 'Boseong, South Korea', '30.4.2022', '34.843008', '127.272354'),
(8, 'La Tomatina', 'The origin of this popular festival is the result of a joke and like almost all great discoveries, a fluke. <br>\r\nLa Tomatina started in 1945 during a parade of Giants and Bigheads. Some local youth decided to take part in it, and some of the members of the party got angry. There was a small dispute near where there was a vegetable stand. <br>\r\nThe dispute became a tomato toss between both sides, until the police ended the “conflict.” <br>\r\nThe following year and successive years the same scenario was repeated until the authorities saw a high demand at the party. Due to this, the City Council took over the organization in 1980. Since then, La Tomatina has become popular every year and now it is a festival that each year attracts thousands of tourists of all nationalities, making it one of the festivals with a big international impact. <br>\r\n\r\nA mandatory festival for all those who are looking to spend a day in one of the best summer festivals in all Spain.\r\n is a festival that is held in the Valencian town of Buñol, in the east of Spain 30 kilometres from the Mediterranean, in which participants throw tomatoes and get involved in a tomato fight purely for entertainment purposes', 'fes32.jpg', 'Buñol, Spain', 'Wednesday, August 31', '39.420344', '-0.790133'),
(9, 'Oktoberfest', 'Oktoberfest, annual festival in Munich, Germany, held over a two-week period and ending on the first Sunday in October. The festival originated on October 12, 1810, in celebration of the marriage of the crown prince of Bavaria, who later became King Louis I, to Princess Therese von Sachsen-Hildburghausen. The festival concluded five days later with a horse race held in an open area that came to be called Theresienwiese (“Therese’s green”). The following year the race was combined with a state agricultural fair, and in 1818 booths serving food and drink were introduced. By the late 20th century the booths had developed into large beer halls made of plywood, with interior balconies and bandstands. Each of the Munich brewers erects one of the temporary structures, with seating capacities of some 6,000. The mayor of Munich taps the first keg to open the festival. Total beer consumption during Oktoberfest is upwards of 75,800 hectolitres (about 2 million gallons). The breweries are also represented in parades that feature beer wagons and floats along with people in folk costumes. Other entertainment includes games, amusement rides, music, and dancing. Oktoberfest draws more than six million people each year, many of them tourists.', 'fes33.jpg', 'Munich, Germany', 'Saturday, September 17 ', '48.136607', '11.577085'),
(10, 'Galway International Oyster And Seafood', 'The Galway International Oyster Festival is a food festival held annually in Galway on the west coast of Ireland on the last weekend of September, the first month of the oyster season. Inaugurated in 1954, it was the brainchild of the Great Southern Hotel manager, Brian Collins <br>\r\nDeemed one of Europe’s longest-running food extravaganzas, the Galway International Oyster & Seafood Festival was launched in September 1954 by Brian Collins, the manager of the Great Southern Hotel (now called Hotel Meyrick).\r\nThat year just 34 guests attended the first Oyster Festival Banquet and feasted on several dozen oysters each. These days, the event is one of the biggest on Ireland’s social calendar, drawing thousands of visitors to sample the famous native Galway Oysters at the end of September each year. Now the festival sees more than 20 competitors, representing countries from all over the world flock to Galway to vie for the World Championship title. <br>\r\n\r\nOver the last 64 years, the Irish food festival has featured prominently in the media including Bon Appétit Magazine, BBC Good Food, Food & Wine magazine, Easy Food Magazine, Time Magazine, Travel & Leisure Magazine, Conde Nast, The New York Times, The Sunday Times, Daily Mail, Daily Telegraph, Image Magazine, Fodors, The Lonely Planet Guide and The Rough Guide amongst many, many more. <br>\r\n\r\nIt has been described by the Sunday Times as “one of the 12 greatest shows on earth” and was listed in the AA Travel Guide one of Europe’s Seven Best Festivals. \r\n\r\nThe Galway International Oyster & Seafood Festival is held on the very last weekend in September to celebrate Galway’s rich annual oyster harvest (in season from September – April). It was originally organised in conjunction with Paddy Burke’s Bar in Clarenbridge but moved into the city centre of Galway in the 80’s.\r\n\r\nGrowing ever since, The Irish and World Oyster Opening or ‘shucking’ Championships are held during the festival, as well as top class entertainment, street parades, seafood trails, celebrated hospitality and the start of many new friendships.\r\n\r\nHistorically, guests have included director John Huston, actor Bob Hope, golfer Christy O’Connor JR, well known chefs such as Richard Corrigan, Clodagh McKenna and Martin Shanahan, Irish Rugby hero Brian O’Driscoll, current President of Ireland, Michael D. Higgins, current Taoiseach Leo Varadkar and many more.', 'fes27.jpg', 'Galway, Ireland', '23.9.2022', '53.273797', '9.05178'),
(11, 'Iceland Airwaves', 'Iceland Airwaves Festival is the world’s most northerly music showcase and industry festival, situated halfway between North America and Europe. Iceland Airwaves brings together the country’s brightest emerging musical talent and forward-thinking international acts.  <br>\r\n\r\nEach November for four days and nights, downtown Reykjavík comes alive, filled non-stop with music, with performances hosted everywhere from tiny record stores and art museums, to cool bars and stately churches, to nightclubs and large scale venues <br>\r\n\r\nFor two decades Airwaves has shone a spotlight on new talent, with early appearances from the likes of Mac DeMarco, James Blake, Sufjan Stevens, Young Fathers, Sigrid, Dan Deacon, Florence and The Machine, Hot Chip, Caribou, Dirty Projectors, Zola Jesus, Micachu and others, along with many local luminaries such as GusGus, múm, Singapore Sling, FM Belfast, Of Monsters and Men, Ásgeir, sóley, Sin Fang, Kaleo, Mugison and Vök, all of whom have gone on to great success. <br>\r\n\r\nAcross the years, established acts such as Björk, The Flaming Lips, The Knife, Kraftwerk, Sigur Rós, John Grant, Mumford & Sons, and Fleet Foxes have chosen to join music fans and delegates from over 50 countries for a truly dynamic four days of music and festivities. <br>\r\n\r\nIceland Airwaves is also an invaluable opportunity to connect with musicians, agents, journalists, promoters and managers from around the world, to build new relationships whilst celebrating some of the world’s latest musical discoveries and game-changers. <br>\r\n\r\nLaunched in 1999 as a one-off event in an airplane hangar, Airwaves has since become Iceland’s longest-established festival and best recognised music brand, and an integral part of Reykjavík’s yearly cultural calendar. <br>\r\n\r\nIceland Airwaves is now promoted and produced by the concert company Sena, with support by Iceland’s national airline and founding sponsor, Icelandair, and in cooperation with the City of Reykjavík. <br>\r\n\r\nSince 2020 the team behind Iceland Airwaves has expanded its musical scope by organizing standalone concerts, including Björk Orkestral, in Harpa and online, and a livestream festival called Live from Reykjavík. These new projects further support the Icelandic music industry and create opportunities for audiences to enjoy and discover Icelandic music.', 'fes29.jpg', 'Reykjavík, Iceland', '2.11.2022', '64.133333', '-21.933333'),
(12, 'Village Halloween Parade', 'The Village Halloween Parade is an annual holiday parade on the night of every Halloween, in the Greenwich Village neighborhood of New York City. The parade, initiated in 1974 by Greenwich Village puppeteer and mask maker Ralph Lee, is the world\'s largest Halloween parade and the only major nighttime parade in the United States. The parade reports itself to have 50,000 \"costumed participants\" and 2 million spectators. <br>\r\n\r\nThe Village Halloween Parade has been called \"New York\'s Carnival.\" The parade is largely a spontaneous event as individual marchers can just show up in costume at the starting point without registering or paying anything. The parade\'s signature features include its large puppets, which are animated by hundreds of volunteers. The official parade theme each year is applied to the puppets. In addition to the puppets, more than 50 marching bands participate each year. In addition, there are some commercial Halloween parade floats. <br>\r\n\r\nThe official route, on Sixth Avenue from Spring Street to 16th Street in Manhattan, is 1.4 miles long (the distance from the gathering spot on Sixth Avenue from Canal Street to Spring Street adds another 0.2 miles). The parade usually starts at 7 PM and lasts for about two to three hours. ', 'fes28.jpg', 'New York City.', ' Sunday, October 31', '40.7127', '-74.0060'),
(13, ' Whirling Dervishes Festival ', 'The Whirling Dervishes Festival is an important religious and cultural event that is held in Konya, Turkey, each year. The exact date of the celebration is based on the Islamic religious calendar, and as such, varies from year to year. However, the event is almost always held in November or December, as it will be this season. Individuals who have an interest in taking part in this important and wonderful festival should consider planning a trip to Konya, a city located about 10 hours from Istanbul, this winter. \r\n<br>\r\nThis year, the Whirling Dervishes Festival will begin on December 10 and continue until the 17th. The last day of the week-long event is typically the most festive and celebratory, as it commemorates the union of Mevlana Jelaleddin Rumi, a revered Sufi saint, with Allah. In fact, the entire festival is dedicated to Rumi, as the religious figure is normally called, a man that preached love, tolerance and forgiveness. Rumi also taught his followers that it is possible to forge a connection with God by dancing through the streets in joy, which is why his followers whirl around the city in an amazing dance during this festival.<br>\r\n\r\nThousands of Sufi Muslim pilgrims flock to Konya, Turkey, each year to celebrate the Whirling Dervishes Festival. In a ceremony known as Sema, Rumi’s religious followers participate in an intricate dance each evening, in which they quickly move and spin around in beautiful white and colored skirts. The ceremony is split into seven different parts, each of which is set to a distinct musical theme called a selam. Over the course of the night, the music changes from eerie to haunting to beautiful as the dancers continue their amazing whirling movements. <br>\r\n\r\nAlthough travelers may not identify as Sufi Muslim, the Whirling Dervishes Festival is still an event worth attending. The joyful way in which the religious pilgrims dance and celebrate their love for Rumi is truly magical, and although not all visitors to Knoya will participate, it is still an amazing phenomenon to observe. Individuals who decide to plan a trip to Turkey this December should keep in mind, however, that though this festival is an exciting and beautiful thing to watch, it also has a great deal of religious importance to those who celebrate it. As such, travelers should be sure to adopt a respectful attitude when visiting.', 'fes30.jpg', 'Konya, Turkey', '10.12.2022', '37.8725', '32.4943'),
(14, 'Glastonbury', 'Glastonbury Festival is a five-day festival of contemporary performing arts that takes place in Pilton, Somerset, in England. In addition to contemporary music, the festival hosts dance, comedy, theatre, circus, cabaret, and other arts.Glastonbury Festival (formally Glastonbury Festival of Contemporary Performing Arts and known colloquially as Glasto) is a five-day festival of contemporary performing arts that takes place in Pilton, Somerset, in England. In addition to contemporary music, the festival hosts dance, comedy, theatre, circus, cabaret, and other arts. Leading pop and rock artists have headlined, alongside thousands of others appearing on smaller stages and performance areas. Films and albums have been recorded at the festival, and it receives extensive television and newspaper coverage.\r\n\r\nGlastonbury is attended by around 200,000 people, thus requiring extensive security, transport, water, and electricity-supply infrastructure. While the number of attendees is sometimes swollen by gatecrashers, a record of 300,000 people was set at the 1994 festival, headlined by the Levellers, who performed on The Pyramid Stage. Most festival staff are volunteers, helping the festival to raise millions of pounds for charity organisations.\r\n\r\nRegarded as a major event in British culture, the festival is inspired by the ethos of the hippie, the counterculture of the 1960s, and the free-festival movement. Vestiges of these traditions are retained in the Green Fields area, which includes sections known as the Green Futures and Healing Field.Michael Eavis hosted the first festival, then called Pilton Festival, after seeing an open-air Led Zeppelin concert at the 1970 Bath Festival of Blues and Progressive Music.\r\n\r\nThe festival was held intermittently from 1970 until 1981, and has been held most years since then, except for \"fallow years\" taken mostly at five-year intervals, intended to give the land, local population, and organizers a break. 2018 was a \"fallow year”, and the following festival took place from 26 to 30 June 2019. There have been two consecutive \"fallow years” since then due to the COVID-19 pandemic.', 'fes8.jpg', 'Somerset, England', 'Wednesday, June 22 ', '51.014648', '-3.103450'),
(15, 'Tanabata', 'Tanabata, also known as the Star Festival, is a Japanese festival originating from the Chinese Qixi Festival. It celebrates the meeting of the deities Orihime and Hikoboshi. <br>\r\nTanabata originated from a Chinese legend called Qixi and was brought to Japan in the 8th century. This is the story of two lovers. Princess Orihime, the seamstress, wove beautiful clothes by the heavenly river, represented by the Milky Way. Because Orihime worked so hard weaving beautiful clothes, she became sad and despaired of ever finding love. Her father, who was a God of the heavens, loved her dearly and arranged for her to meet Hikoboshi, the cow herder who lived on the other side of the Milky Way. The two fell in love instantly and married. Their love and devotion was so deep that Orihime stopped weaving and Hikoboshi allowed his cows to wander the heavens. <br>\r\n\r\nOrihime’s father became angry and forbade the lovers to be together, but Orihime pleaded with him to allow them to stay. He loved his daughter, so he decreed that the two star-crossed lovers could meet once a year--on the 7th day of the 7th month if Orihime returned to her weaving. On the first day they were to be reunited, they found the river (Milky Way) to be too difficult to cross. Orihime became so despondent that a flock of magpies came and made a bridge for her. It is said that if it rains on Tanabata, the magpies will not come, and the two lovers must wait another year to be reunited, so Japanese always wish for good weather on Tanabata. There are many variations of this story, but this version is the most widely held.', 'fes9.jpg', 'Japan', 'Thursday, July 7', '36.5748', '139.2394'),
(16, 'Boryeong Mud', 'The Boryeong Mud Festival is an annual festival which takes place during the summer in Boryeong, a town around 200 km south of Seoul, South Korea. The first Mud Festival was staged in 1998 and, by 2007, the festival attracted 2.2 million visitors to Boryeong\r\n<br>\r\nBoryeong mud highly atracted people after various media reported it in addition to this successful event and on September, 1955, Boryeong mud pack business achieved a huge consequence as it received the grand prize from Korea National Business Competition held by tthe Ministry of Home Affairs (Ministry of Government Administration and Home Affairs now) to promote management mind of local economy. Based on this, when Kim Hak-hyun was assigned as the first mayor of popular election on July, 1995, he developed 8 types of mud cosmetic from 1996 to 1997 to promote \'mud business by using natural ocean mud of Boryeong\' but the sale stalled by little awareness.\r\n<br>\r\nBoryeong mud festival has been developed to be the best festival in Korea through consistent passion and efforts by public officials concerned and civilian volunteers and it was designated by the Ministry of Culture, Sports and Tourism, thus making global Boryeong mud festival of today.', 'fes10.jpg', ' Boryeong, Chungcheongnam-do, South Korea', '21.7.2022', '36.3515', '126.5966'),
(17, 'Halloween', 'Halloween or Hallowe\'en, less commonly known as Allhalloween, All Hallows\' Eve, or All Saints\' Eve, is a celebration observed in many countries on 31 October, the eve of the Western Christian feast of All Hallows\' Day.  <br>\r\nHalloween is a holiday celebrated each year on October 31, and Halloween 2021 will occur on Sunday, October 31. The tradition originated with the ancient Celtic festival of Samhain, when people would light bonfires and wear costumes to ward off ghosts. In the eighth century, Pope Gregory III designated November 1 as a time to honor all saints. Soon, All Saints Day incorporated some of the traditions of Samhain. The evening before was known as All Hallows Eve, and later Halloween. Over time, Halloween evolved into a day of activities like trick-or-treating, carving jack-o-lanterns, festive gatherings, donning costumes and eating treats.\r\n', 'fes2.jpg', 'Western countries', '31.10.2022', '21.0354', '105.8189'),
(18, 'Valentine\'s Day', 'Valentine’s Day, also called St. Valentine’s Day, holiday (February 14) when lovers express their affection with greetings and gifts. Given their similarities, it has been suggested that the holiday has origins in the Roman festival of Lupercalia, held in mid-February. The festival, which celebrated the coming of spring, included fertility rites and the pairing off of women with men by lottery. At the end of the 5th century, Pope Gelasius I forbid the celebration of Lupercalia and is sometimes attributed with replacing it with St. Valentine’s Day, but the true origin of the holiday is vague at best. Valentine’s Day did not come to be celebrated as a day of romance until about the 14th century. Valentine\'s Day is celebrated on Monday, February 14, 2022. <br>\r\n\r\nAlthough there were several Christian martyrs named Valentine, the day may have taken its name from a priest who was martyred about 270 CE by the emperor Claudius II Gothicus. According to legend, the priest signed a letter “from your Valentine” to his jailer’s daughter, whom he had befriended and, by some accounts, healed from blindness. Other accounts hold that it was St. Valentine of Terni, a bishop, for whom the holiday was named, though it is possible the two saints were actually one person. Another common legend states that St. Valentine defied the emperor’s orders and secretly married couples to spare the husbands from war. It is for this reason that his feast day is associated with love. <br>\r\nValentine\'s Day, also called Saint Valentine\'s Day or the Feast of Saint Valentine, is celebrated annually on February 14. It originated as a Christian feast day honoring one or two early Christian martyrs named Saint Valentine and, through later folk traditions, has become a significant cultural, religious, and commercial celebration of romance and love in many regions of the world.', 'fes3.jpg', 'around the world', '14.2.2022', '21.0354', '105.8189');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminid` (`adminid`);

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_book_religion` (`idreligion`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_cart_book` (`bookid`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_feedback_admin` (`adminid`);

--
-- Chỉ mục cho bảng `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_festival_religion` (`idreligion`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_gallery_festival` (`idfestival`),
  ADD KEY `lk_gallery_worldfestival` (`idworldfestival`);

--
-- Chỉ mục cho bảng `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_wishlist_book` (`bookid`);

--
-- Chỉ mục cho bảng `worldfestival`
--
ALTER TABLE `worldfestival`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `festival`
--
ALTER TABLE `festival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `worldfestival`
--
ALTER TABLE `worldfestival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `lk_book_religion` FOREIGN KEY (`idreligion`) REFERENCES `religion` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_cart_book` FOREIGN KEY (`bookid`) REFERENCES `book` (`id`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `lk_feedback_admin` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `festival`
--
ALTER TABLE `festival`
  ADD CONSTRAINT `lk_festival_religion` FOREIGN KEY (`idreligion`) REFERENCES `religion` (`id`);

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `lk_gallery_festival` FOREIGN KEY (`idfestival`) REFERENCES `festival` (`id`),
  ADD CONSTRAINT `lk_gallery_worldfestival` FOREIGN KEY (`idworldfestival`) REFERENCES `worldfestival` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `lk_wishlist_book` FOREIGN KEY (`bookid`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
