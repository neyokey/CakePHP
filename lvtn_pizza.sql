-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 08, 2018 lúc 08:51 PM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lvtn_pizza`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `name`, `position`, `status`) VALUES
(1, 'http://localhost/lvtn/img/img_main.jpg', 'index slide 01', 'index_slide01', 1),
(2, 'http://localhost/lvtn/img/img_main.jpg', 'index slide thumb 01', 'index_slide_thumb01', 1),
(3, 'http://localhost/lvtn/img/meatballs_banner.jpg', 'index slide 02', 'index_slide02', 1),
(4, 'http://localhost/lvtn/img/meatballs_banner.jpg', 'index slide thumb 02', 'index_slide_thumb02', 1),
(5, 'http://localhost/lvtn/img/dessertBanner1.jpg', 'index slide 03', 'index_slide03', 1),
(6, 'http://localhost/lvtn/img/dessertBanner1.jpg', 'index slide thumb 03', 'index_slide_thumb03', 1),
(7, 'http://localhost/lvtn/img/menuBanner.jpg', 'combo banner', 'combo_banner', 1),
(8, 'http://localhost/lvtn/img/dessertBanner1.jpg', 'drinks banner', 'drinks_banner', 1),
(9, 'http://localhost/lvtn/img/meatballs_banner.jpg', 'main banner', 'main_banner', 1),
(10, 'http://localhost/lvtn/img/salad-banner.jpg', 'appetizer banner', 'appetizer_banner', 1),
(11, 'http://localhost/lvtn/img/img_main.jpg', 'pizza banner', 'pizza_banner', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bantin`
--

DROP TABLE IF EXISTS `bantin`;
CREATE TABLE IF NOT EXISTS `bantin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  `loaibantin_id` int(10) NOT NULL,
  `nguoidung_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_loaibantin` (`loaibantin_id`) USING BTREE,
  KEY `id_nguodung` (`nguoidung_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bantin`
--

INSERT INTO `bantin` (`id`, `name`, `content`, `insert_time`, `status`, `loaibantin_id`, `nguoidung_id`) VALUES
(1, 'Sự kết hợp giữa Pizza x Marou', 'Chúng tôi hân hạnh được giới thiệu sự kết hợp đặc biệt giữa Phô Mai Nhà Làm của Pizza 4P’s, hòa quyện cùng dòng Chocolate thượng hạng của Maison Marou trong 3 món tráng miệng mới:Bánh Tart Sô-cô-la phủ kem Mascarpone vị chanh:&nbsp;Vị chua thanh của kem Mascarpone vị chanh tạo ra sự cân bằng với phần đế bánh được làm từ Sô-cô-la thượng hạng của Marou.<img width=\"600\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_6658-122a-1024x1024.jpg\" height=\"600\"><span>Bánh Su nhân kem Mascarpone với kem Camembert phủ Sô-cô-la:&nbsp;Hương vị đặc trưng của kem Camembert tạo nên dấu ấn độc đáo cho sự phối hợp giữa bánh Su kem Mascarpone và dòng Sô-cô-la nóng của Marou.</span><img width=\"600\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_6878-1-1024x1024.jpg\" height=\"600\">Ravioli nhân Sô-cô-la Ricotta với Kem vị chanh:&nbsp;Món ngọt được biến tấu từ mì Ravioli truyền thống của Ý. Kem vị chanh ấn tượng là điểm nhấn trong món tráng miệng này, góp phần tôn lên sự kết hợp đặc biệt giữa Sô-cô-la Marou hảo hạng và phô mai Ricotta tươi của Pizza 4P’s.<img width=\"600\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_6915b-1024x1024.jpg\" height=\"600\">Từ những hạt cacao hảo hạng, Marou đã tạo nên những thỏi Chocolate tinh tế làm say lòng nhiều người đam mê trên khắp thế giới.Pizza 4P’s tin rằng, với những đối tác tin cậy cùng đồng hành, chúng tôi có thể chia sẻ đam mê và triết lý “Delivering Wow, Sharing Happiness” hơn nữa đến quý khách tại nhà hàng.', '2018-07-05 21:32:19', 1, 2, 8),
(2, 'Pizza Chả Cá trên Kenh14.vn | “Khi văn hóa địa phương được quảng bá qua một món ăn”', 'Pizza Chả cá của chúng tôi đã xuất hiện trên Kenh14.vn. Từ những hình dung ban đầu về sự kết nối đặc biệt giữa một món ăn đặc trưng của Hà Nội và phô mai Camembert Nhà làm của Pizza 4P’s, Kenh14.vn đã ghé thăm nhà hàng Pizza 4P’s để khám phá hương vị đặc biệt và câu chuyện đằng sau Pizza Chả Cá.Bởi Pizza Chả cá cần giữ lại được nét đặc trưng của nguyên liệu truyền thống trong khi phải cân bằng được hương vị để phục vụ cho các thực khách quốc tế, Kenh14.vn đã đặt ra một câu hỏi về sự kết hợp giữa mắm tôm, nước mắm và phô mai trên một chiếc bánh Pizza.Chúng tôi xin gửi lời cảm ơn đến Kenh14.vn đã chia sẻ trải nghiệm của mình về Pizza Chả Cá. Thông tin chi tiết về bài viết, vui lòng đọc thêm tại đây:<br><a target=\"_blank\" rel=\"nofollow\" href=\"http://kenh14.vn/mon-moi-gay-xon-xao-cua-pizza-4ps-pizza-cha-ca-khi-mam-tom-duoc-ket-hop-cung-pho-mai-20180113154254103.chn\">http://kenh14.vn/mon-moi-gay-xon-xao-cua-pizza-4ps-pizza-cha-ca-khi-mam-tom-duoc-ket-hop-cung-pho-mai-20180113154254103.chn</a> <img width=\"1024\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/dscf3471nologo-1515829023503-1024x702.jpg\" height=\"702\"><img width=\"1024\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/dscf3485nologo-1515829023507-1024x682.jpg\" height=\"682\">', '2018-07-05 21:33:50', 1, 3, 8),
(3, 'Yuzu | Dòng Bia Thủ Công đầu tiên giữa Pizza x 7 Bridges', 'Crafted Beer (Bia thủ công) là một nét văn hóa truyền thống tại nhiều nước châu Âu. Khác với những loại bia thông thường, bia thủ công cho phéo người ủ thêm vào các thành phần đặc biệt để tạo ra công thức riêng dựa trên cảm hứng, kĩ thuật và cảm giác của họ.<img width=\"1024\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_8049-9c-1024x1024.jpg\" height=\"1024\">Tại Pizza 4P’s, chúng tôi sáng tạo những món ăn mới với mong muốn kết nối nền ẩm thực địa phương với hương vị quốc tế. Vì vậy, chúng tôi muốn tạo nên dòng bia của riêng mình để các thực khách có thể thưởng thức cùng với những món ăn tại Pizza 4P’s.Chia sẻ khát vọng cùng chúng tôi, 7 Bridges là một công ty chuyên sản xuất bia, hướng đến việc tạo ra “cầu nối” giữa hương vị địa phương với quốc tế bằng cách cung cấp những loại bia thủ công chất lượng cao đến mọi người tại Việt Nam.Lần này, chúng tôi rất vui được giới thiệu sự hợp tác giữa chúng tôi và 7 Bridges trong một dòng bia thủ công tự làm từ một loại quýt của Nhật – Yuzu.<img width=\"1024\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_8011a-1-1024x1024.jpg\" height=\"1024\">Góp mặt trong nhiều bí quyết ẩm thực, Yuzu tạo ra hương vị thanh mát đặc trưng cho các món ăn. Sự phối hợp giữa quýt Yuzu và muối biển trong dòng bia thủ công lần này mang đến vị bia tươi đặc biệt kết hợp hoàn hảo với các món Pasta và Phô Mai Nhà Làm của Pizza 4P’s.Chúng tôi hi vọng dòng bia thủ công này sẽ mang những trải nghiệm tươi mới đến quý khách. Bia thủ công Yuzu hiện đã có mặt tại các nhà hàng của chúng tôi ở Hà Nội, Đà Nẵng và Pizza 4P’s Hai Bà Trưng.', '2018-07-05 21:34:14', 1, 2, 8),
(4, 'Nước giấm Trái cây Nhà làm', 'Từ ngàn năm trước tại Nhật, nước giấm trái cây đã trở nên được ưa chuộng bởi những lợi ích dành cho sức khỏe.Tại Pizza 4P’s, chúng tôi tạo nên nước giấm trái cây từ syrup nhà làm – sự kết hợp giữa giấm uống và trái cây tự nhiên. Với hương vị tươi mát từ trái cây nhiệt đới hòa quyện cùng vị chua thanh của giấm, loại thức uống này mang đến cảm giác thư giãn và cân bằng cho bữa ăn.Nước giấm trái cây hiện đã có mặt tại Pizza 4P’s Hai Bà Trưng, với 3 hương vị trái cây tự nhiên: Dâu, Chanh Dây và Xoài. Chúng tôi mong rằng dòng thức uống mới này sẽ mang một trải nghiệm tươi mới hơn đến quý khách tại nhà hàng.<span><img width=\"300\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_7912a1-1024x1024.jpg\" height=\"300\">&nbsp;&nbsp; &nbsp;&nbsp;<img width=\"300\" alt=\"\" src=\"http://pizza4ps.com/admin/wp-content/uploads/2018/01/IMG_7932a1-1024x1024.jpg\" height=\"300\"></span>', '2018-07-05 21:35:51', 1, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `donhang_id` int(10) NOT NULL,
  `monan_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_donhang` (`donhang_id`),
  KEY `id_monan` (`monan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `donhang_id`, `monan_id`, `quantity`) VALUES
(38, 33, 9, 1),
(39, 34, 9, 1),
(40, 35, 7, 1),
(41, 36, 9, 1),
(42, 37, 5, 1),
(43, 38, 9, 3),
(44, 39, 5, 1),
(45, 43, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `price` int(50) DEFAULT NULL,
  `discount` int(50) NOT NULL DEFAULT '0',
  `ship_price` int(50) NOT NULL DEFAULT '0',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `nguoidung_id` int(10) DEFAULT NULL,
  `nguoigiaohang_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nguoidung` (`nguoidung_id`),
  KEY `id_nguoigiaohang` (`nguoigiaohang_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `price`, `discount`, `ship_price`, `insert_time`, `name`, `phone`, `address`, `status`, `nguoidung_id`, `nguoigiaohang_id`) VALUES
(33, 189000, 0, 20000, '2018-06-25 04:19:00', 'admin', '906464196', 'gfd', 2, 8, 3),
(34, 189000, 0, 20000, '2018-06-25 11:37:00', 'admin', '906464196', '15 Cao Lỗ2', 3, 8, 3),
(35, 69000, 0, 20000, '2018-06-25 11:39:00', 'admin', '906464196', '15 Cao Lỗ2', 2, 8, 1),
(36, 189000, 0, 20000, '2018-06-25 11:40:00', 'admin', '906464196', '15 Cao Lỗ', 3, 8, 1),
(37, 109000, 0, 20000, '2018-06-27 18:37:00', 'admin', '906464196', '15 Cao Lỗ1', 2, 8, 1),
(38, 567000, 0, 20000, '2018-06-28 19:56:00', 'mnaejj', '906464196', 'au duong lan f1 q8', 2, 12, 3),
(39, 109000, 10900, 0, '2018-06-28 19:57:00', 'mnaejj', '906464196', 'au duong lan f1 q8', 3, 12, 3),
(40, 189000, 0, 20000, '2018-07-03 19:00:59', 'fsdfsd', '906464196', 'sdfsdfsd', 0, NULL, NULL),
(41, 109000, 0, 20000, '2018-07-03 19:57:48', 'dfg', '906464196', 'au duong lan f1 q8', 0, NULL, NULL),
(42, 109000, 0, 20000, '2018-07-03 19:58:05', 'dfg', '906464196', 'au duong lan f1 q8', 0, NULL, NULL),
(43, 248000, 0, 20000, '2018-07-04 16:25:00', 'admin', '906464196', '15 Cao Lỗ', 1, 8, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioithieu`
--

DROP TABLE IF EXISTS `gioithieu`;
CREATE TABLE IF NOT EXISTS `gioithieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `content2` text CHARACTER SET utf8 NOT NULL,
  `page` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page` (`page`,`position`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `title`, `content`, `content2`, `page`, `position`, `status`) VALUES
(1, 'Chào mừng bạn đến với chúng tôi', '<img alt=\"\" src=\"http://pizza4ps.com/img2017/about/img_about2b.jpg\">', 'Với phương châm \"Delivering Wow, Sharing Happiness\", chúng tôi hướng tới mục tiêu mang đến những trải nghiệm tuyệt vời cho tất cả các khách hàng thân thiết của mình. Đối với chúng tôi, nhà hàng không chỉ là nơi để ăn uống. Chúng tôi thực sự mong muốn mỗi khách hàng khi đến với nhà hàng đều trở về với tâm trạng hạnh phúc bởi vì thức ăn, cung cách phục vụ và không khí ở nhà hàng, những thứ góp phần đem lại trải nghiệm \"Wow\" cho khách hàng<br><br>Chúng tôi sẽ tiếp tục trưởng thành và cải thiện mỗi ngày để có thể thực hiện được phương châm \"Delivering Wow, Sharing Happiness\" của chúng tôi.<br>', 'index', 1, 1),
(2, 'Chúng tôi hy vọng trở thành một \"ốc đảo đặc biệt\" khác với nơi chốn hàng ngày của bạn', '<img alt=\"\" src=\"http://pizza4ps.com/img2017/about/design/gallery/img_gallery1.jpg\"><br><br>Ở nơi nào mà người ta cứ muốn đến mãi, đến mãi?<span>Đó có thể là một nơi khác biệt với cuộc sống hàng ngày của bạn, nơi có thể làm cho trái tim bạn nhảy múa?<br><br>Đó phải là nơi tiện nghi để bạn lắng nghe hơi thở của mình và thư giãn?</span>Pizza&nbsp;4P\'s nỗ lực đem đến cho bạn tất cả những điều đó - Một nơi bạn cảm thấy hào hứng vì thoát ra được cuộc sống nhàm chán hàng ngày, nhưng vẫn đem lại cảm giác thoải mái cho bạn.<br><br>Đó là lý do tại sao chúng tôi đã bỏ ra rất nhiều thời gian và công sức vào việc thiết kế không gian nhà hàng của mình.<br><br>Đưa cam kết chất lượng phục vụ của mình vượt xa khỏi giới hạn thức ăn ngon.<br>', 'Chúng tôi nỗ lực luôn luôn đem lại thiết kế mới để khách hàng phải ngạc nhiên một cách thú vị, nhưng đồng thời cũng phải là một nơi thư giãn để bạn cứ muốn ở hoài nơi ấy.Pizza&nbsp;4P\'s không muốn gì hơn là một \"Ốc đảo đặc biệt\" của bạn.<br><br><img alt=\"\" src=\"http://pizza4ps.com/img2017/about/design/nishizawa/img_design1.jpg\"><br>', 'index', 2, 1),
(3, ' Tầm nhìn và Nhiệm vụ', '<img alt=\"\" src=\"http://pizza4ps.com/img2017/about/img_about1.jpg\"><br><br><span>Tham vọng của chúng tôi ở Pizza&nbsp;4P\'s không chỉ đơn giản là \"Một nhà hàng Pizza tuyệt vời\", chúng tôi có một tầm nhìn cao lớn hơn thế nữa - Làm cho thế giới mỉm cười vì Hòa bình.<br></span>Sứ mệnh của chúng tôi là chúng tôi đứng vững và làm việc hàng ngày để đạt được tầm nhìn này \"Mang lại WOW, Chia sẻ hạnh phúc\".<br>\"WOW\" diễn tả sự ngạc nhiên đầy thú vị, một trải nghiệm có thể khiến trái tim bạn nhảy múa, đem lại nguồn năng lượng tích cực dồi dào và một tinh thần hứng khởi.Niềm phấn khích và năng lực tích cực đó chính là một bước lớn đưa bạn đến cảm giác \"Hạnh Phúc\".<br>Bằng cách \"chia sẻ\" sự hạnh phúc đó với nhiều người , chúng tôi tin rằng hạnh phúc sẽ lan tỏa và lấp đầy thế giới.Thành quả của việc \"Mang lại \"Wow\", Chia sẻ hạnh phúc\" là nụ cười.<br>Làm việc là đầu tiên chúng tôi nở nụ cười với người đối diện. Sau đó, là làm việc để truyền bá nụ cười đi xa hơn nữa.Chỉ cần chúng tôi không ngừng lặp lại từng bước nhỏ thế này thôi thì chúng tôi tin chắc thế giới này sẽ được lấp đầy bằng những nụ cười.', '<img alt=\"\" src=\"http://pizza4ps.com/img2017/about/img_about2.jpg\"><br><br>Pizza khởi nguồn từ nước Ý đi khắp nơi với nhiều hình thái và phong cách khác nhau để rồi nó trở thành một món ăn yêu thích trên toàn thế giới.<br>Nó vượt qua mọi biên giới, tuổi tác và giới tính, và giờ đây phần lớn mọi người đều yêu thích. <br>Nhà sáng lập và bạn bè anh thích loại bánh đơn giản, tự do và linh hoạt.\"Làm cho tâm hồn mình giàu có hơn và lan tỏa hạnh phúc đi khắp thế giới có thể chỉ bằng những hành động nhỏ này thôi\".<br>Năm&nbsp;2011, phấn chấn trước sự hấp dẫn bởi đất nước Việt Nam và những kỷ niệm bên lò nướng bánh năm xưa ở Tokyo, nhà sáng lập đã quyết định xây dựng nên một nơi để lan tỏa hạnh phúc đi khắp thế giới.\"Sao chúng ta không thử mở một nhà hàng pizza ở Việt Nam?\"<br>Và giấc mơ bắt đầu được hiện thực hoá như thế.', 'about', 1, 1),
(4, 'Phô mai tự sản xuất', '<img alt=\"\" src=\"http://pizza4ps.com/img2017/about/cheese/img_cheese6.jpg\"><br><br>Đối với những món ăn kiểu Ý như pizza, một nguyên liệu quan trọng không thể thiếu đó là phô mai.<br>Tuy nhiên, vào những ngày mới mở cửa, Pizza&nbsp;4P\'s không thể tìm thấy loại phô mai mozzarella tươi nào ở Việt Nam ngoài phô mai nhập khẩu.<br><span>Vì vậy, để có thể \"cung cấp được phô mai tuơi, ngon, giá thành thấp\" chúng tôi đã tự sản xuất phô mai.<br></span><br>', '<img alt=\"\" src=\"http://pizza4ps.com/img2017/about/cheese/img_cheese2.jpg\"><br><br>Cơ sở sản xuất phô mai của chúng tôi tọa lạc tại thị trấn Đơn Dương, cách Đà Lạt- thành phố cao nguyên thơ mộng khoảng&nbsp;1&nbsp;giờ chạy xe.Mỗi sáng, chúng tôi dùng sữa tươi mới vắt từ những con bò được nuôi trong môi trường tự nhiên và cẩn thận làm từng bánh phô mai bằng tay. Bí quyết làm nên mùi vị thơm ngon của những bánh phô mai này là tâm huyết mong muốn đem lại cảm giác \"wow\" cho quý khách hàng.Nhà máy sản xuất phô mai được hình thành năm&nbsp;2011, cùng thời điểm khai trương nhà hàng Pizza&nbsp;4P\'s. Ban đầu, nhà máy chủ yếu sản xuất phô mai mozarella để cung cấp cho nhà hàng, nhưng cho đến bây giờ quy mô đã phát triển lên đến hơn&nbsp;20&nbsp;nhân viên sản xuất&nbsp;8&nbsp;loại phô mai, mỗi ngày cung cấp khoảng&nbsp;400&nbsp;phần. Đặc biệt, với sự có mặt của nhân viên người Nhật từ những ngày đầu thành lập nhà máy, quy trình sản xuất và chất lượng phô mai luôn được theo dõi, quản lý, phát triển để đưa ra thành phẩm thượng hạng nhất.', 'about', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvucgiaohang`
--

DROP TABLE IF EXISTS `khuvucgiaohang`;
CREATE TABLE IF NOT EXISTS `khuvucgiaohang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khuvucgiaohang`
--

INSERT INTO `khuvucgiaohang` (`id`, `name`, `status`) VALUES
(4, 'Quận 8', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
CREATE TABLE IF NOT EXISTS `lienhe` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `address` text CHARACTER SET utf8 NOT NULL,
  `phone` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `brand_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `X` double NOT NULL,
  `Y` double NOT NULL,
  `link_fb` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `link_ins` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `link_gl` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `address`, `phone`, `email`, `brand_name`, `X`, `Y`, `link_fb`, `link_ins`, `link_gl`) VALUES
(1, '180 Cao Lỗ, Phường 4, Quận 8, Hồ Chí Minh', '0906464196', 'tranngoctrongd14th03@gmail.com', 'Pizza STU', 106.677959, 10.738024, 'https://www.facebook.com/NeyoKey', 'https://www.instagram.com/neyokey', 'https://plus.google.com/105982857918030209631');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaibantin`
--

DROP TABLE IF EXISTS `loaibantin`;
CREATE TABLE IF NOT EXISTS `loaibantin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaibantin`
--

INSERT INTO `loaibantin` (`id`, `name`, `status`) VALUES
(1, 'Khuyến mãi', 1),
(2, 'Ẩm thực', 1),
(3, 'Truyền thông', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimonan`
--

DROP TABLE IF EXISTS `loaimonan`;
CREATE TABLE IF NOT EXISTS `loaimonan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaimonan`
--

INSERT INTO `loaimonan` (`id`, `name`, `status`) VALUES
(1, 'Món chính', 1),
(2, 'Món khai vị', 1),
(3, 'Món nước', 1),
(4, 'Pizza', 1),
(5, 'Combo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

DROP TABLE IF EXISTS `loainguoidung`;
CREATE TABLE IF NOT EXISTS `loainguoidung` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `discount` int(10) NOT NULL DEFAULT '0',
  `point` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loainguoidung`
--

INSERT INTO `loainguoidung` (`id`, `name`, `discount`, `point`, `status`) VALUES
(1, 'Cửa hàng trưởng', 0, -1, 1),
(2, 'Người quản trị', 0, -1, 1),
(3, 'Nhân viên', 0, -1, 1),
(4, 'Thành viên', 0, 0, 1),
(5, 'Thành viên bạc', 5, 50, 1),
(6, 'Thành viên vàng', 10, 100, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `position` float NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `position`, `status`) VALUES
(1, 'Home', '/home/index', 1, 1),
(2, 'About', '/home/about', 4, 1),
(3, 'Menu', '', 2, 1),
(9, 'Contact', '/home/contact', 5, 1),
(10, 'Login', '/home/login', 6, 1),
(11, 'Hello! $name', '', 8, 1),
(17, 'News', '/home/news', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `time`, `status`) VALUES
(1, 'blackerghost', 'Trong@yahoo.com', 'Chọn Yuin PK1 hay Shozy BK Stardust', 'sdfsdfs', '2018-06-27 18:27:12', 1),
(2, 'blackerghost', 'master@aruto.me', ' sdf sdfsd', '', '2018-06-27 18:27:12', 1),
(3, 'master@aruto.me', 'master@aruto.me', 'sdfsdf', 'sfsdfs', '2018-06-27 18:27:12', 1),
(4, 'master@aruto.me', 'master535345@aruto.me', 'Chọn Yuin PK1 hay Shozy BK Stardust', 'sdfsdfsdfsdf<br>&nbsp;sdfsdfsd<br>sdfsdfsd', '2018-06-27 18:27:12', 1),
(5, 'mnaejj', '2hfghfghf@yahoo.com', 'sdfsdf', 'cvbhfhfg', '2018-06-27 18:27:12', 1),
(6, '2hfghfghf@yahoo.com	', '2hfgh5555fghf@yahoo.com', 'Loại bánh nào đang được bán chạy', 'gdfgdfgdf', '2018-06-27 18:27:12', 1),
(7, 'master@aruto.me', 'sdfsdfsdfsdfsd@yahoo.com', 'Loại bánh nào đang được bán chạy', 'sdfsdfsdfsd \r\nsdfsd sdf\r\nsdfsdfsd', '2018-06-27 18:27:12', 0),
(8, 'sdfsdfsd', 'sdfs1dfsdfsdfsd@yahoo.com', 'sdfsdf', 'sdfsdfsdfsd \r\nsdfsd sdf\r\nsdfsdfsd', '2018-06-27 18:27:12', 0),
(9, 'master@aruto.me', 'master@aruto.me', 'Loại bánh nào đang được bán chạy', 'Có giao hàng ko? \r\nBánh nào ngon nhất v?', '2018-06-27 18:27:12', 1),
(10, 'master@aruto.me', 'master@aruto.me', 'Loại bánh nào đang được bán chạy', 'asdasdas', '2018-06-27 18:27:12', 1),
(11, 'master@aruto.me', 'master@aruto.me', 'Loại bánh nào đang được bán chạy', 'bánh nào ngon nhất?\r\ncó giao hàng ko', '2018-06-27 18:27:12', 1),
(12, 'Nhân viên', 'admin@gmail.com', ' dsfsdf ', 'sdfgdfgdf\r\ndfgdf\r\ngdf\r\ngdfgdf', '2018-06-27 18:29:46', 1),
(13, ' dfsdsdf', 'sdfsdfsdfsdfsd@yahoo.com', 'sdfsdfsds', 'dfsdfsdf', '2018-06-27 18:32:07', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

DROP TABLE IF EXISTS `monan`;
CREATE TABLE IF NOT EXISTS `monan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` int(50) NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL,
  `loaimonan_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `monan_ibfk_1` (`loaimonan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`id`, `name`, `price`, `detail`, `image`, `status`, `loaimonan_id`) VALUES
(2, 'Combo phô mai viên 3 vị', 3139000, '1 Bánh pizza phô mai viền 3 vị<br>1 salad cá ngừ<br>2 lon nước ngọt', 'http://localhost/lvtn/img/cb01.png', 0, 5),
(3, 'Combo mua 1 tặng 1', 248000, '2 bánh pizza tự chọn1 salad bogo1 chai nước ngọt 1,5l', 'http://localhost/lvtn/img/cb02.png', 0, 5),
(4, 'Spaghetti seafood black peper ', 119000, 'Mỳ ý hải sản với sốt tiêu đen cay nồng thơm ngon.', 'http://localhost/lvtn/img/mc01.png', 0, 1),
(5, 'Spaghetti bolognese', 109000, 'Mỳ ý bò bằm sốt cà chua', 'http://localhost/lvtn/img/mc02.png', 0, 1),
(6, 'Crinkle fries', 59000, 'Khoai tây chiên thơm ngon giòn rụm.', 'http://localhost/lvtn/img/mkv01135.png', 0, 2),
(7, 'Tuna bacon salad', 69000, 'Salad cá ngừ cùng với thịt xông khói.', 'http://localhost/lvtn/img/mkv02.png', 0, 2),
(8, 'Pizza Seafood Pesto', 189000, 'Bánh pizza hải sản với sốt pesto thơm lừng.', 'http://localhost/lvtn/img/pzsf01.png', 1, 4),
(9, 'Pizza Ocean Delight', 189000, 'Bánh pizza hải sản với các loại rau củ tươi ngon.', 'http://localhost/lvtn/img/pz02.png', 1, 4),
(10, 'Coca lon', 29000, 'Coca lon', 'http://localhost/lvtn/img/mn01.png', 1, 3),
(11, 'Fanta lon', 29000, 'Fanta lon', 'http://localhost/lvtn/img/mn02.png', 1, 3),
(12, 'Pizza Super Supreme', 199000, 'Bánh pizza thập cẩm', 'http://localhost/lvtn/img/pz03.png', 1, 4),
(13, 'Non-baked Cheese Cake', 1244254, 'Bánh phô mai', 'http://localhost/lvtn/img/timthumb.jpg', 1, 3),
(14, 'PIZZA VIỀN ĐÔI CÁ HỒI VƯỢT THÁC', 319000, 'Cá Hồi tươi, thịt nguội, cà chua bi, bí ngòi và xốt tiêu chanh', 'http://localhost/lvtn/img/8J05.png', 1, 4),
(15, 'PIZZA VIỀN ĐÔI BÒ SƯỞI NẮNG', 319000, 'Bò Xé, Thịt Xông Khói, thơm, bí ngòi và ớt chuông xanh với xốt Ma-yo', 'http://localhost/lvtn/img/8J07.png', 1, 4),
(16, 'PIZZA THỊT VÀ XÚC XÍCH', 189000, 'Thịt muối, thịt bò, thịt nguội và xúc xích nướng', 'http://localhost/lvtn/img/03.png', 1, 4),
(17, 'PIZZA TÔM XỐT CHEESY MAYO', 159000, 'Tôm, nấm, hành tây và ớt chuông đỏ phủ trên nền xốt Cheesy Mayo và phô mai Mozarella<br>', 'http://localhost/lvtn/img/14.png', 1, 4),
(18, 'NUI THỊT XÔNG KHÓI', 89000, '<div>Nui Thịt Xông Khói cổ điển với xốt Carbonara thơm béo</div><div></div>', 'http://localhost/lvtn/img/ZFA100.png', 1, 1),
(19, 'MÌ Ý CÁ HỒI XỐT KEM', 109000, '<div>Cá hồi xông khói, cà chua bi, nấm, mực nhỏ với xốt kem thơm béo</div><div></div>', 'http://localhost/lvtn/img/Z8101.png', 1, 1),
(20, 'CƠM CHIÊN TỎI VÀ CÁNH GÀ NƯỚNG', 109000, '<div>Cơm Chiên Tỏi Và Cánh Gà Nướng</div><div></div>', 'http://localhost/lvtn/img/GA09.png', 1, 1),
(21, 'MÌ Ý HẢI SẢN XỐT CÀ CHUA', 89000, '<div>MÌ Ý HẢI SẢN XỐT CÀ CHUA</div><div><br></div>', 'http://localhost/lvtn/img/FA18.png', 1, 1),
(22, 'MỲ Ý THỊT VIÊN TRỘN XỐT CÀ CHUA', 109000, '<div>MỲ Ý THỊT VIÊN TRỘN XỐT CÀ CHUA</div><div><br></div>', 'http://localhost/lvtn/img/FA22.png', 1, 1),
(23, 'MỰC CHIÊN GIÒN', 89000, '<div>MỰC CHIÊN GIÒN</div><div><br></div>', 'http://localhost/lvtn/img/HA32.png', 1, 2),
(24, 'XÚC XÍCH Ý', 109000, '<div>XÚC XÍCH Ý</div><h1><br></h1>', 'http://localhost/lvtn/img/HA31.png', 1, 2),
(25, 'XÀ LÁCH GÀ KIỂU Ý', 89000, '<div>XÀ LÁCH GÀ KIỂU Ý</div><br>', 'http://localhost/lvtn/img/IA12.png', 1, 2),
(26, 'XÀ LÁCH DÂU TÂY', 89000, '<div>Xà lách dâu tây, thịt nguội cùng phô mai, ô liu và xốt chua ngọt</div><div></div>', 'http://localhost/lvtn/img/Z4T21.png', 1, 2),
(27, 'TÔM CUỘN KHOAI TÂY', 89000, '<h3>TÔM CUỘN KHOAI TÂY</h3><div><br></div>', 'http://localhost/lvtn/img/HA34.png', 1, 2),
(28, 'NƯỚC SUỐI DASANI', 29000, '<div>NƯỚC SUỐI DASANI</div><div><br></div>', 'http://localhost/lvtn/img/NC31.png', 1, 3),
(29, 'HEINEKEN BEER', 49000, '<div>HEINEKEN BEER</div><div><br></div>', 'http://localhost/lvtn/img/NI04.png', 1, 3),
(30, 'COCA-COLA 1.5L', 39000, '<div>COCA-COLA 1.5L</div><div><br></div>', 'http://localhost/lvtn/img/NC99.png', 1, 3),
(31, 'FANTA 1.5L', 39000, '<h3>FANTA 1.5L</h3><div><br></div>', 'http://localhost/lvtn/img/NC101.png', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `point` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '1',
  `loainguoidung_id` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `nguoidung_ibfk_1` (`loainguoidung_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `name`, `email`, `password`, `birthday`, `phone`, `address`, `point`, `status`, `loainguoidung_id`) VALUES
(2, 'Tuấn Gay', 'GayTuan6969@gmail.com', '$2y$10$pJcsGi76GNFlE1g3mB2eXOtgr7a6DO2VroHq/E1eurUTY6sJqmywy', '1993-06-09', '0169693269', '35/75 Đường Trần Duy Hưng', 0, 1, 3),
(7, 'Trong', 'tranngoctrongd14th03@gmail.com', '$2y$10$QVduH4T81z20nxklVznOGO58P9pnNiH/CA/RvIP/GKaW/zWh6xsiC', '2018-04-03', '906464196', '287 Âu Dương Lân', 0, 0, 2),
(8, 'admin', 'master@aruto.me', '$2y$10$w3hneZ2YxDuypePcWFfGv.t.qm46fIkIzJCWxg/HAqZUWv2atW6kG', '2018-06-04', '906464196', '15 Cao Lỗ', 10, 1, 1),
(10, 'admin', 'admin@gmail.com', '$2y$10$9GbqrezYvYQbuVMsfkHbTOv.7dPCZUlLikoha85dJPQvzSByOmkU2', '2018-05-28', '906464196', '90 Phạm Hùng', 0, 1, 3),
(11, 'blackerghost', '1master@aruto.me', '$2y$10$Ba4BArWB2f6lH.7xQKYdwOGRGP.P2VPHGOFq0IB9zjqNLeU5PTAne', '2018-06-06', '906464196', 'au duong lan f1 q8', 0, 1, 3),
(12, 'mnaejj', 'master15@aruto.me', '$2y$10$mE.7rADyK8zSViX2HQDqWOBHQJcv3VfCTcGW4mIN6zNFnRKlCxyMa', '2018-06-07', '906464196', 'au duong lan f1 q8', 146, 1, 6),
(13, 'dasdas', 'fdgsdsfsf@yahoo.com', '$2y$10$/biXxZ0j0ORdRplzRsqlw.5BQdF3HkBekNsbN5Veuhh4.RgZa3aA2', '2018-06-22', '906464196', 'au duong lan f1 q8', 0, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoigiaohang`
--

DROP TABLE IF EXISTS `nguoigiaohang`;
CREATE TABLE IF NOT EXISTS `nguoigiaohang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoigiaohang`
--

INSERT INTO `nguoigiaohang` (`id`, `name`, `status`) VALUES
(1, 'Trọng', 1),
(2, 'Tuấn', 1),
(3, 'blackerghost', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `submenu`
--

DROP TABLE IF EXISTS `submenu`;
CREATE TABLE IF NOT EXISTS `submenu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `menu_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`position`,`menu_id`),
  KEY `submenu_ibfk_1` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `submenu`
--

INSERT INTO `submenu` (`id`, `name`, `link`, `position`, `status`, `menu_id`) VALUES
(1, 'Combo', '/home/combo', 1, 1, 3),
(2, 'Pizza', '/home/pizza', 2, 1, 3),
(3, 'Main', '/home/main', 3, 1, 3),
(4, 'Appetizer', '/home/appetizer', 4, 1, 3),
(5, 'Drinks', '/home/drinks', 5, 1, 3),
(6, 'Manage', '/admin/', 1, 1, 11),
(7, 'Account infomation', '/home/info/$id', 2, 1, 11),
(8, 'Cart', '/home/cart', 3, 1, 11),
(9, 'Logout', '/home/logout', 4, 1, 11);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bantin`
--
ALTER TABLE `bantin`
  ADD CONSTRAINT `bantin_ibfk_1` FOREIGN KEY (`loaibantin_id`) REFERENCES `loaibantin` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bantin_ibfk_2` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`monan_id`) REFERENCES `monan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`nguoigiaohang_id`) REFERENCES `nguoigiaohang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`loaimonan_id`) REFERENCES `loaimonan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`loainguoidung_id`) REFERENCES `loainguoidung` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
