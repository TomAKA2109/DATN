-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2019 lúc 03:58 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 
-- Cơ sở dữ liệu: `db_sachhay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dondathang` smallint(5) UNSIGNED NOT NULL,
  `id_sach` int(10) UNSIGNED NOT NULL,
  `soluong` tinyint(4) NOT NULL,
  `dongia` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_dondathang`, `id_sach`, `soluong`, `dongia`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 1, 108000.00, '2019-05-07 17:05:18', '2019-05-07 17:05:18'),
(4, 5, 5, 2, 90000.00, '2019-05-07 19:05:00', '2019-05-07 19:05:00'),
(6, 6, 31, 3, 76540.00, '2019-05-08 09:40:16', '2019-05-08 09:40:16'),
(9, 8, 14, 1, 87200.00, '2019-05-09 07:51:24', '2019-05-09 07:51:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsach`
--

CREATE TABLE `chitietsach` (
  `masach` int(10) UNSIGNED NOT NULL,
  `mangonngu` tinyint(3) UNSIGNED NOT NULL,
  `sotrang` int(10) UNSIGNED NOT NULL,
  `namxuatban` smallint(5) UNSIGNED NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kichthuoc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trongluong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayphathanh` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsach`
--

INSERT INTO `chitietsach` (`masach`, `mangonngu`, `sotrang`, `namxuatban`, `noidung`, `kichthuoc`, `trongluong`, `ngayphathanh`, `created_at`, `updated_at`) VALUES
(5, 1, 225, 2018, '‘Vương Đại Minh!’ Cô giáo tròn xoe mắt.\r\n\r\n‘Dạ!’ Tôi giơ cao tay.\r\n\r\n‘… Bố em bị hòa tan rồi!’ Cô thất thần nhìn tôi, volume giọng mở lớn hơn nữa.\r\n\r\nTôi sững sờ. Cả lớp cũng sững sờ. Một tích tắc sau đó, tất cả cười rần rần như sấm dậy!\r\n\r\n \r\n\r\nCô giáo giơ roi mây quất thật mạnh lên bảng, quát lớn: ‘Bố bạn Minh bị hòa tan, thì có gì để cười?’\r\n\r\nCười là thứ không khí rất dễ lây nhiễm, chỉ cần một người không dừng lại được thì cả đám không ai dừng được.', '14.5 x 20.5 cm', '600', '2019-04-19', '2019-05-08 12:14:01', '2019-05-08 12:14:01'),
(6, 1, 382, 2017, '<p>Trong biệt thự nh&agrave; Mashiba Yoshitaka, người chồng tr&uacute;ng độc chết tr&ecirc;n s&agrave;n, thạch t&iacute;n c&ograve;n s&oacute;t lại trong cốc c&agrave; ph&ecirc; đổ l&ecirc;nh l&aacute;ng b&ecirc;n cạnh. Mọi nghi vấn tập trung v&agrave;o hai đối tượng: người vợ Ayane vốn l&agrave; nghệ nh&acirc;n nổi tiếng với c&aacute;c t&aacute;c phẩm thảm gh&eacute;p vải độc đ&aacute;o đắt tiền trưng b&agrave;y ở khu Ginza, v&agrave; c&ocirc; người t&igrave;nh b&iacute; mật Wakayama Hiromi, cũng l&agrave; học tr&ograve; của Ayane. Nhưng cả hai đều c&oacute; chứng cứ ngoại phạm vững chắc. V&agrave; cảnh s&aacute;t đau đầu v&igrave; vấn đề h&oacute;c b&uacute;a: L&agrave;m thế n&agrave;o hung thủ bỏ thạch t&iacute;n hạ độc Yoshitaka, khi kh&ocirc;ng ai kh&aacute;c c&oacute; khả năng tiếp cận nạn nh&acirc;n quanh thời điểm xảy ra vụ &aacute;n.</p>\r\n\r\n<p>Một lần nữa thi&ecirc;n t&agrave;i &ldquo;th&aacute;m tử Galileo&rdquo; Yukawa Manabu nhập cuộc. Anh đ&atilde; t&igrave;m ra đ&aacute;p &aacute;n, nhưng l&agrave; một &ldquo;đ&aacute;p &aacute;n ảo&rdquo;, chỉ&nbsp;<em>&ldquo;c&oacute; thể suy nghĩ về mặt l&yacute; thuyết nhưng kh&ocirc;ng thể tồn tại trong hiện thực&rdquo;</em>. Từng bước lật lại c&aacute;c t&igrave;nh tiết, t&aacute;c giả đại t&agrave;i Keigo đ&atilde; ch&igrave;a ra cho ch&uacute;ng ta ch&acirc;n tướng đ&aacute;ng kinh ngạc của một sự thật v&ocirc; c&ugrave;ng chua x&oacute;t&hellip;</p>', '14.5 x 20.5 cm', '700', '2019-04-01', '2019-05-08 15:23:05', '2019-05-08 15:23:05'),
(1, 1, 57, 2016, '<p>Những người bạn đồng h&agrave;nh của con người từ rất l&acirc;u đ&atilde; lu&ocirc;n được y&ecirc;u chiều nhất mực, v&agrave; đỉnh điểm sẽ l&agrave; khi &ldquo;chủ ăn g&igrave;, c&uacute;n được ăn nấy&rdquo;. Ấy thế nhưng, đ&oacute; lại kh&ocirc;ng phải c&aacute;ch cung cấp dinh dưỡng đ&uacute;ng chuẩn v&agrave; thuận tự nhi&ecirc;n cho c&uacute;n đ&acirc;u nh&eacute;.</p>\r\n\r\n<p>Với ti&ecirc;u ch&iacute; đặt sức khỏe của c&uacute;n l&ecirc;n h&agrave;ng đầu, Robertson sẽ hưỡng dẫn cho bạn từng bước để tạo ra c&aacute;c m&oacute;n ăn thiết thực, đầy đủ dưỡng chất, c&acirc;n bằng m&agrave; lại hết sức kinh tế.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ cho độc giả 50 c&ocirc;ng thức đồ ăn đơn giản v&agrave; tiết kiệm thời gian, t&aacute;c giả c&ograve;n cung cấp những th&ocirc;ng tin ngắn gọn về c&aacute;c loại thức ăn c&oacute; lợi v&agrave; c&oacute; hại với c&uacute;n, những mẹo nhỏ d&agrave;nh ri&ecirc;ng cho c&uacute;n con, những ch&uacute; ch&oacute; đ&atilde; &ldquo;c&oacute; tuổi&rdquo; hay những ch&uacute; c&uacute;n biếng ăn. Với c&aacute;c m&oacute;n ăn đa dạng từ b&aacute;nh quy ăn vặt, thịt hầm, trứng chi&ecirc;n tới b&aacute;nh sinh nhật đẳng cấp 5 sao, c&uacute;n cưng nh&agrave; bạn chắc chắn sẽ c&oacute; những bữa ăn l&agrave;nh mạnh xứng tầm c&aacute;c boss!</p>', '14.5 x 20.5 cm', '500', '2019-04-12', '2019-05-09 01:05:47', '2019-05-09 01:05:47'),
(2, 1, 200, 2018, '<p>Combo Harvard Business School l&agrave; một bộ s&aacute;ch kinh doanh đang được đ&ocirc;ng đảo bạn đọc quan t&acirc;m. Combo n&agrave;y sẽ đem đến cho người đọc những kinh nghiệm thực tế về b&aacute;n h&agrave;ng, thương lượng, khởi sự, x&acirc;y dựng, điều h&agrave;nh một doanh nghiệp, quản l&yacute; con người,... Trong combo n&agrave;y, bao gồm ba cuốn s&aacute;ch:</p>\r\n\r\n<p>Những điều trường Harvard thật sự dạy bạn l&agrave; cuốn s&aacute;ch trả lời cho c&acirc;u hỏi: Người ta đ&atilde; dạy g&igrave; cho học vi&ecirc;n trong những năm th&aacute;ng học tập tại Havard để đ&agrave;o tạo n&ecirc;n những con người xuất sắc như vậy? Cuốn s&aacute;ch m&ocirc; tả trải nghiệm của bản th&acirc;n t&aacute;c giả v&agrave; c&aacute;c bạn học trong c&aacute;i n&ocirc;i của chủ nghĩa tư bản. Khối lượng b&agrave;i học nặng nề, nhất l&agrave; trong những tuần đầu ti&ecirc;n, học vi&ecirc;n phải đ&aacute;nh vật với c&aacute;c lĩnh vực chuy&ecirc;n m&ocirc;n của kinh doanh như t&agrave;i ch&iacute;nh, kế to&aacute;n, điều h&agrave;nh, marketing v&agrave; ứng xử trong tổ chức. V&agrave;i th&aacute;ng sau, bản th&acirc;n &aacute;p lực t&igrave;m việc, một c&ocirc;ng việc &ldquo;th&iacute;ch hợp&rdquo;, đ&atilde; l&agrave; một qu&aacute; tr&igrave;nh gi&aacute;o dục ri&ecirc;ng, vượt xa những g&igrave; xảy ra trong lớp học. T&aacute;c giả cuốn s&aacute;ch Những điều trường Havard thật sự dạy bạn cho biết &lsquo;&rsquo;T&ocirc;i y&ecirc;u qu&yacute; hai năm ở Harvard. C&aacute;c bạn học của t&ocirc;i rất lịch thiệp v&agrave; &acirc;n cần. Hầu hết giảng vi&ecirc;n trong khoa tận tụy truyền cho sinh vi&ecirc;n niềm say m&ecirc; m&ocirc;n học. Cơ sở vật chất v&agrave; con người đều rất tốt. Chẳng c&oacute; chỗ n&agrave;o quan s&aacute;t chủ nghĩa tư bản tốt hơn nơi n&agrave;y. Đối với t&ocirc;i v&agrave; với những người t&ocirc;i biết, Harvard đ&atilde; l&agrave;m thay đổi c&aacute;ch nh&igrave;n nhận tương lai v&agrave; cơ hội bằng con đường kinh doanh&rsquo;&rsquo;. Nếu bạn quan t&acirc;m đến tấm bằng MBA, những g&igrave; được giảng dạy tại Havard, hay đơn giản l&agrave; kh&aacute;m ph&aacute; tại sao MBA &ndash; ba chữ c&aacute;i qu&yacute; b&aacute;u n&agrave;y- lại trở th&agrave;nh tấm v&eacute; &ldquo;v&agrave;o cửa&rdquo;, trong một số trường hợp c&ograve;n l&agrave; y&ecirc;u cầu bắt buộc, để th&agrave;nh c&ocirc;ng trong kinh doanh, h&atilde;y t&igrave;m c&acirc;u trả lời trong cuốn s&aacute;ch th&uacute; vị n&agrave;y.</p>\r\n\r\n<p>Cuốn thứ hai trong combo n&agrave;y l&agrave; Những Điều Trường Harvard Vẫn Kh&ocirc;ng Dạy Bạn. Đ&acirc;y l&agrave; c&acirc;u chuyện ch&acirc;n thực, một c&uacute; h&iacute;ch mạnh mẽ v&agrave; những chỉ dẫn thực tế để bạn biết c&aacute;ch tổ chức, tiến về ph&iacute;a trước v&agrave; c&oacute; được lợi thế cạnh tranh. Cuốn s&aacute;ch sẽ gi&uacute;p cho bạn thấy được những chiến lược th&agrave;nh c&ocirc;ng của một doanh nh&acirc;n t&agrave;i ba về mua b&aacute;n, quản l&yacute; cũng như đ&agrave;m ph&aacute;n.</p>', '14.5 x 20.5 cm', '890', '2018-09-11', '2019-05-09 01:08:06', '2019-05-09 01:08:06'),
(3, 1, 120, 2017, '<p>Đỗ Trạch l&agrave; một t&ecirc;n độc giả anti fan (rởm), ch&iacute;nh v&igrave; c&aacute;i l&yacute; luận trai kh&ocirc;ng hư g&aacute;i kh&ocirc;ng thương, độc giả kh&ocirc;ng n&eacute;m đ&aacute; t&aacute;c giả kh&ocirc;ng nh&igrave;n thấy.</p>\r\n\r\n<p>T&ecirc;n độc giả ngốc nghếch cuồng t&iacute;n v&agrave;o ch&acirc;n l&yacute; &ldquo;c&agrave;ng y&ecirc;u c&agrave;ng chửi&rdquo;, cứ thế theo d&otilde;i tiểu thuyết d&agrave;i kỳ trong nỗi niềm đau đớn cứ tuần ho&agrave;n hết n&eacute;m đ&aacute; rồi lại bấm phiếu đề cử, bấm phiếu đề cử rồi lại n&eacute;m đ&aacute;&hellip;</p>\r\n\r\n<p>M&agrave; h&ocirc;m nay, một b&igrave;nh luận n&eacute;m đ&aacute; Đỗ Trạch gửi cho t&aacute;c phẩm mới &ldquo;Hỗn Huyết&rdquo; của t&aacute;c giả, kh&ocirc;ng ngờ lại để t&aacute;c giả đọc được!</p>\r\n\r\n<p>Kể từ đ&oacute;, nh&acirc;n vật ch&iacute;nh tươi s&aacute;ng ngời ngời &ndash; Tu &ndash; từ một thiếu ni&ecirc;n thi&ecirc;n t&agrave;i của học viện ph&eacute;p thuật tức khắc thức tỉnh d&ograve;ng m&aacute;u Undead, biến th&agrave;nh một bộ xương trắng ởn một c&aacute;ch thần kỳ!</p>\r\n\r\n<p>T&ecirc;n độc giả anti fan ngốc nghếch liền tức &oacute;i m&aacute;u&hellip;</p>\r\n\r\n<p>T&aacute;c! Giả! Anh! Thắng! Rồi!</p>\r\n\r\n<p>Bất ngờ hơn c&ograve;n ở ph&iacute;a sau.</p>\r\n\r\n<p>Chủ h&agrave;ng nơi Đỗ Trạch mua s&aacute;ch đ&atilde; gửi nhầm cuốn đồng nh&acirc;n cao H của &ldquo;Hỗn Huyết&rdquo; cho cậu, v&agrave; thế l&agrave; Đỗ Trạch &ndash; mắt đeo k&iacute;nh cận d&agrave;y cộp, tai đeo m&aacute;y trợ th&iacute;nh &ndash; cứ thế xuy&ecirc;n-kh&ocirc;ng v&agrave;o trong &ldquo;Hỗn Huyết&rdquo; một c&aacute;ch phản khoa học!</p>', '14.5 x 20.5 cm', '400', '2017-06-11', '2019-05-09 01:14:01', '2019-05-09 01:14:01'),
(4, 1, 120, 2019, '<p>Triều đại n&agrave;y l&agrave; một triều đại k&igrave; lạ. N&oacute; c&oacute; sự phồn hoa người người ngưỡng mộ, c&oacute; văn h&oacute;a m&agrave; đời sau kh&ocirc;ng thể theo kịp, nhưng lại chịu nỗi khổ ngh&egrave;o đ&oacute;i v&agrave; yếu đuối, li&ecirc;n tục bị c&aacute;c tộc người kh&aacute;c g&acirc;y sức &eacute;p.&nbsp;<br />\r\nD&ugrave; trong triều c&oacute; kh&ocirc;ng &iacute;t tranh chấp, nhưng cũng c&oacute; sự s&aacute;ng suốt m&agrave; tiền triều kh&ocirc;ng c&oacute;, một sĩ đại phu cũng c&oacute; thể ph&ecirc; b&igrave;nh ch&iacute;nh trị m&agrave; kh&ocirc;ng bị bức hại.<br />\r\n<br />\r\nĐ&acirc;y l&agrave; triều đại n&agrave;o?</p>', '14.5 x 20.5 cm', '300', '2019-02-11', '2019-05-09 01:16:43', '2019-05-09 01:16:43'),
(7, 1, 150, 2019, '<p>Một ng&agrave;y nọ, người vợ đang mang thai s&aacute;u th&aacute;ng của cảnh s&aacute;t h&igrave;nh sự Triệu Diệc Thần l&agrave; Hồ Gia Anh gọi điện thoại đến b&aacute;o &aacute;n. Cuộc gọi tiến h&agrave;nh đến gi&acirc;y thứ mười một th&igrave; đột nhi&ecirc;n kết th&uacute;c, Hồ Gia Anh cũng mất t&iacute;ch từ l&uacute;c đ&oacute;.</p>\r\n\r\n<p>Trong qu&aacute; tr&igrave;nh điều tra, Triệu Diệc Thần ph&aacute;t hiện tất cả những giấy tờ chứng minh th&acirc;n phận của vợ m&igrave;nh đều l&agrave; giả, manh mối cũng v&igrave; thế m&agrave; đứt đoạn.</p>\r\n\r\n<p>Ch&iacute;n năm sau, anh nhận được một cuộc gọi k&igrave; lạ, sau đ&oacute; kh&ocirc;ng l&acirc;u h&ograve;m thư trước nh&agrave; lại nhận được hai tấm ảnh, trong ảnh l&agrave; l&agrave; người vợ đ&atilde; mất t&iacute;ch nhiều năm của anh v&agrave; một c&ocirc; b&eacute; c&oacute; gương mặt rất giống anh.</p>\r\n\r\n<p>Anh lần theo cuộc gọi đ&oacute; m&agrave; t&igrave;m đến nh&agrave; của một người xa lạ, đợi chờ anh ngo&agrave;i một khoản di sản lớn th&igrave; c&ograve;n c&oacute; tin vợ m&igrave;nh đ&atilde; qua đời từ năm ngo&aacute;i, v&agrave; một c&ocirc; con g&aacute;i mắc chứng trầm cảm m&agrave; mất khả năng ng&ocirc;n ngữ...</p>\r\n\r\n<p>Trong 9 năm đằng đẵng đ&oacute;, đ&atilde; xảy ra chuyện g&igrave;? Ngo&agrave;i ra, b&iacute; mật n&agrave;o trong qu&aacute; khứ được người vợ xinh đẹp, th&ocirc;ng minh ch&ocirc;n giấu? Đứa trẻ đ&oacute;... v&igrave; sao?</p>\r\n\r\n<p>Tr&iacute;ch dẫn hay:</p>\r\n\r\n<p><em>&ldquo;Con người c&oacute; bao nhi&ecirc;u ham muốn, th&igrave; sẽ sống với bấy nhi&ecirc;u g&aacute;nh nặng. Kh&ocirc;ng thể tr&aacute;ch người kh&aacute;c.&rdquo;</em></p>\r\n\r\n<p><em>&ldquo;Tr&ecirc;n đời n&agrave;y chỉ c&oacute; tự vệ v&agrave; lương thiện l&agrave; kh&ocirc;ng cần c&oacute; l&iacute; do.&rdquo;</em></p>', '14.5 x 20.5 cm', '420', '2019-03-14', '2019-05-09 01:17:56', '2019-05-09 01:17:56'),
(8, 1, 150, 2019, '<p><strong>Anh L&agrave; Tất Cả Những G&igrave; Em Gh&eacute;t Nhất</strong>&nbsp;l&agrave; tập hợp những mẩu chuyện ngắn ấm &aacute;p v&agrave; h&agrave;i hước, giống như mộtcuốn nhật k&yacute; ghi lại qu&atilde;ng thời gian y&ecirc;u nhau của hai nh&acirc;n vật ch&iacute;nh Tiểu Bố v&agrave;Tam Gia. Họ quen biết nhau từ năm đầu cấp ba, v&agrave; ch&iacute;nh thức trở th&agrave;nh người y&ecirc;u khi học năm nhất đại học. Tiểu Bố v&agrave; Tam Gia do ho&agrave;n cảnh học tập v&agrave; c&ocirc;ng việc n&ecirc;n y&ecirc;u xa suốt 8 năm. Tuy một người ở đất bắc, một người nới trời nam, nhưng cả hai người vẫn lu&ocirc;n cố gắng duy tr&igrave; v&agrave; vun v&eacute;n cho t&igrave;nh y&ecirc;u n&agrave;y.</p>\r\n\r\n<p>Nh&acirc;n vật được lấy h&igrave;nh mẫu từ t&aacute;c giả v&agrave; chồng.</p>\r\n\r\n<p><strong>Tr&iacute;ch đoạn:</strong></p>\r\n\r\n<p>&ldquo;Một h&ocirc;m t&ocirc;i đang đọc s&aacute;ch trong ph&ograve;ng ngủ, h&ocirc;m đấy gi&oacute; rất lớn, cửa sổ bị gi&oacute;đập v&agrave;o vang l&ecirc;n rầm rầm, th&ecirc;m cả tiếng gi&oacute; r&iacute;t g&agrave;o ngo&agrave;i trời.</p>\r\n\r\n<p>Tam Gia đột nhi&ecirc;n gọi điện thoại cho t&ocirc;i: &ldquo;Anh vừa đi qua một h&agrave;ng c&acirc;y cổ thụ, l&aacute;xanh biếc, nắng đẹp v&ocirc; c&ugrave;ng.&rdquo;</p>\r\n\r\n<p>T&ocirc;i n&oacute;i, &ldquo;Bắc Kinh đang nổi gi&oacute; cực lớn.&rdquo;</p>\r\n\r\n<p>Tam Gia tiếp tục. &ldquo;Nh&igrave;n nắng rọi l&ecirc;n l&aacute; c&acirc;y, anh chợt nhớ đến em.&rdquo;</p>\r\n\r\n<p>T&ocirc;i kh&ocirc;ng hiểu nổi logic của l&atilde;o, liền thắc mắc: &ldquo;Hở?&rdquo;</p>', '14.5 x 20.5 cm', '420', '2019-03-14', '2019-05-09 01:19:22', '2019-05-09 01:19:22'),
(9, 1, 200, 2016, '<p>Trần Thuật : C&ocirc; ấy l&agrave; n&agrave;ng ti&ecirc;n nhỏ trong cuộc đời t&ocirc;i. Trường học đồn đại Học b&aacute; Trần Thuật ki&ecirc;u ngạo ph&aacute;ch lối thế m&agrave; lại ngoan ngo&atilde;n ngồi trong lớp gi&uacute;p bạn g&aacute;i l&agrave;m b&agrave;i tập. Quần ch&uacute;ng ăn dưa h&acirc;m m&ocirc;: Bạn g&aacute;i cậu ta chắc l&agrave; hoa kh&ocirc;i trường An Nguyệt nhỉ? C&oacute; người vội bay ra đ&iacute;nh ch&iacute;nh tin đồn: &ldquo;Kh&ocirc;ng phải hoa kh&ocirc;i trường, l&agrave; em g&aacute;i của hoa kh&ocirc;i! H&ocirc;m qua trong tiết thể dục, m&igrave;nh trở về ph&ograve;ng học lấy đồ, đ&uacute;ng l&uacute;c tận mắt nh&igrave;n thấy Trần Thuật nắm tay em g&aacute;i hoa kh&ocirc;i c&uacute;i đầu n&oacute;i g&igrave; đ&oacute; b&ecirc;n tai c&ocirc; ấy, vẻ mặt cậu ta rất cưng chiều.&rdquo;</p>', '14.5 x 20.5 cm', '700', '2016-02-14', '2019-05-09 01:23:45', '2019-05-09 01:23:45'),
(11, 1, 205, 2018, '<p>&quot;Tuy hơi đường đột nhưng m&agrave; Kanie kun ơi, c&ugrave;ng đi c&ocirc;ng vi&ecirc;n giải tr&iacute; với t&ocirc;i nh&eacute;?&quot;</p>\r\n\r\n<p>Sento Isuzu - nữ sinh xinh đẹp v&agrave; b&iacute; ẩn vừa chuyển trường đến đưa ra lời mời hẹn h&ograve; với Kanie Seiya tại lớp học sau giờ tan trường. Chuyện được một nữ sinh nổi tiếng ngay từ ng&agrave;y đầu chuyển tới đưa ra lời mời như thế thật sự kh&ocirc;ng tệ. Thế nhưng đ&oacute; l&agrave; chỉ khi cậu kh&ocirc;ng bị d&iacute; một KHẨU S&Uacute;NG HỎA MAI v&agrave;o đầu.</p>\r\n\r\n<p>Miễn cưỡng chấp nhận, nơi cậu được dắt tới l&agrave; &ldquo;Amagi Brilliant Park&rdquo;. Một c&ocirc;ng vi&ecirc;n nổi tiếng như một điểm hẹn h&ograve; tệ hại. Tại đ&oacute; Seiya đ&atilde; được giới thiệu với một n&agrave;ng c&ocirc;ng ch&uacute;a &quot;h&agrave;ng thật&quot; t&ecirc;n Latifa.</p>\r\n\r\n<p>C&ocirc; g&aacute;i đ&oacute; n&oacute;i với cậu rằng: &quot;Em muốn anh trở th&agrave;nh người quản l&yacute; của Amagi Brilliant Park n&agrave;y.&quot;</p>', '14.5 x 20.5 cm', '320', '2018-11-17', '2019-05-09 01:33:22', '2019-05-09 01:33:22'),
(12, 1, 205, 2018, '<p>Ch&agrave;ng trai 17 tuổi năm ấy bạn từng y&ecirc;u...</p>\r\n\r\n<p>L&agrave; người đ&atilde; bước đi b&ecirc;n cạnh bạn một qu&atilde;ng đường vừa đủ nhưng ngập tr&agrave;n hạnh ph&uacute;c v&agrave; b&igrave;nh y&ecirc;n. L&agrave; người c&ugrave;ng bạn trốn học hay ki&ecirc;n tr&igrave; chở bạn đi tr&ecirc;n chiếc xe đạp cũ kĩ. L&agrave; người sẵn s&agrave;ng nhịn ăn s&aacute;ng để d&agrave;nh tiền mua cho bạn chiếc cặp t&oacute;c mới. L&agrave; mối t&igrave;nh đầu trong s&aacute;ng nhất trong cuộc đời.</p>\r\n\r\n<p>Ch&agrave;ng trai 17 tuổi năm ấy bạn từng y&ecirc;u...</p>\r\n\r\n<p>L&agrave; người m&agrave; cả đời n&agrave;y bạn sẽ kh&ocirc;ng bao giờ qu&ecirc;n nhưng chẳng thể n&agrave;o đi c&ugrave;ng bạn tới suốt cuộc đời. D&ugrave; cả hai đ&atilde; c&ugrave;ng nhau trải qua thời thanh xu&acirc;n ng&ocirc;ng cuồng tươi đẹp như thế, ở b&ecirc;n nhau v&agrave;o những ng&agrave;y th&aacute;ng học h&agrave;nh thi cử khổ sở nhất như thế. Nhưng sau n&agrave;y lại kh&ocirc;ng thể ở b&ecirc;n nhau nữa.</p>\r\n\r\n<p>&quot;Cảm ơn cậu đ&atilde; xuất hiện v&agrave; ở b&ecirc;n tớ trong những ng&agrave;y th&aacute;ng thanh xu&acirc;n đẹp nhất. D&ugrave; sau n&agrave;y, ch&uacute;ng m&igrave;nh chẳng thể c&ugrave;ng nhau đi đến cuối con đường.</p>\r\n\r\n<p>Tớ nhớ t&oacute;c cậu rất mềm, khi cậu cười sẽ c&oacute; một c&aacute;i l&uacute;m đồng tiền nho nhỏ ở m&aacute; phải, cậu c&oacute; một c&aacute;i m&aacute;y nghe nhạc cũ m&agrave;u xanh l&aacute; c&acirc;y, th&iacute;ch ăn b&aacute;nh bao v&agrave;o buổi s&aacute;ng... Khi nhớ được một điều, những điều kh&aacute;c thuộc về cậu cũng nối đu&ocirc;i nhau xuất hiện, khiến tớ kh&ocirc;ng khỏi cười thầm. Th&igrave; ra ng&agrave;y xưa tớ để &yacute; cậu ấy nhiều đến nỗi như đ&atilde; học thuộc l&ograve;ng ch&uacute;ng.</p>\r\n\r\n<p>Thanh xu&acirc;n của mỗi người trong ch&uacute;ng ta, ai cũng đ&atilde; đều bỏ lỡ một ai đ&oacute;. Bởi v&igrave; v&agrave;o những năm th&aacute;ng ngốc nghếch trẻ dại ấy, ch&uacute;ng ta c&ograve;n chưa biết c&aacute;ch y&ecirc;u một người, chưa học được c&aacute;ch tr&acirc;n trọng. Nhưng tớ rất muốn hỏi một c&acirc;u tại sao lại l&agrave; người ấy lại l&agrave; cậu?&quot;</p>', '14.5 x 20.5 cm', '320', '2018-11-20', '2019-05-09 01:34:09', '2019-05-09 01:34:09'),
(13, 1, 220, 2017, '<p>C&oacute; những gia đ&igrave;nh kh&ocirc;ng trọn vẹn, cha mẹ Giờ Ph&uacute;t v&agrave; Giờ Gi&acirc;y chia tay nhau, rốt cục khiến 2 đứa trẻ chỉ c&ograve;n biết sống nương tựa v&agrave;o nhau. Nhưng bi kịch gia đ&igrave;nh kh&ocirc;ng khiến cho 2 đứa trẻ bi quan ủ dột m&agrave; ngược lại, ch&uacute;ng vẫn tận hưởng niềm vui cuộc sống b&ecirc;n bạn b&egrave; thầy c&ocirc;, v&agrave; c&agrave;ng y&ecirc;u qu&yacute; tr&acirc;n trọng người anh trai/ em g&aacute;i của m&igrave;nh hơn.</p>', '14.5 x 20.5 cm', '320', '2017-11-20', '2019-05-09 01:34:58', '2019-05-09 01:34:58'),
(14, 1, 220, 2017, '<p>C&oacute; những gia đ&igrave;nh kh&ocirc;ng trọn vẹn, cha mẹ Giờ Ph&uacute;t v&agrave; Giờ Gi&acirc;y chia tay</p>\r\n\r\n<p>nhau, rốt cục khiến 2 đứa trẻ chỉ c&ograve;n biết sống nương tựa v&agrave;o nhau.</p>\r\n\r\n<p>Nhưng bi kịch gia đ&igrave;nh kh&ocirc;ng khiến cho 2 đứa trẻ bi quan ủ dột m&agrave; ngược</p>\r\n\r\n<p>lại, ch&uacute;ng vẫn tận hưởng niềm vui cuộc sống b&ecirc;n bạn b&egrave; thầy c&ocirc;, v&agrave; c&agrave;ng</p>\r\n\r\n<p>y&ecirc;u qu&yacute; tr&acirc;n trọng người anh trai/ em g&aacute;i của m&igrave;nh hơn.</p>\r\n\r\n<p><strong>Giới thiệu T&aacute;c giả - Họa sĩ:</strong></p>\r\n\r\n<p>T&aacute;c giả: U Linh</p>\r\n\r\n<p>U* Linh &ndash; Chị em sinh đ&ocirc;i, t&aacute;c giả truyện tranh nổi tiếng.</p>', '14.5 x 20.5 cm', '320', '2018-01-10', '2019-05-09 01:36:14', '2019-05-09 01:36:14'),
(15, 1, 220, 2017, '<p><em>&ldquo;Việc g&igrave; m&agrave; phải để t&acirc;m đến những g&igrave; người kh&aacute;c nghĩ?&rdquo;</em>&nbsp;l&agrave; một trong v&agrave;i nguy&ecirc;n tắc sống của Joris Terlinck, vi&ecirc;n thị trưởng lạnh l&ugrave;ng, chuy&ecirc;n quyền, một người lu&ocirc;n gieo rắc quanh m&igrave;nh sợ h&atilde;i v&agrave; nước mắt. Nhưng cũng c&ugrave;ng người đ&agrave;n &ocirc;ng ấy, một ng&agrave;y kia, lại bắt đầu thay đổi. Chẳng ai c&oacute; thể nhận ra vi&ecirc;n thị trưởng xưa nữa&hellip;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Viết c&acirc;u chuyện người đ&agrave;n &ocirc;ng miệng l&uacute;c n&agrave;o cũng ngậm x&igrave; g&agrave; ấy, Georges Simenon đ&atilde; ghi t&ecirc;n m&igrave;nh v&agrave;o danh s&aacute;ch (rất d&agrave;i) chủ nh&acirc;n c&aacute;c t&aacute;c phẩm nghệ thuật lấy h&igrave;nh tượng &ldquo;vi&ecirc;n thị trưởng&rdquo; của những th&agrave;nh phố miền Bắc ch&acirc;u &Acirc;u lục địa l&agrave;m nh&acirc;n vật.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuy Simenon hay h&uacute;t tẩu chứ kh&ocirc;ng phải x&igrave; g&agrave;, người ta vẫn nhận ra rất nhiều b&oacute;ng d&aacute;ng ch&iacute;nh &ocirc;ng trong h&igrave;nh ảnh &ldquo;vi&ecirc;n thị trưởng ở Furnes&rdquo; - cuốn tiểu thuyết đồ sộ theo c&aacute;ch ri&ecirc;ng m&agrave; kh&ocirc;ng ai ngo&agrave;i Simenon (vốn dĩ cũng chẳng bao giờ để t&acirc;m tới những g&igrave; người kh&aacute;c nghĩ) nắm được b&iacute; quyết tạo ra.</p>', '14.5 x 20.5 cm', '320', '2018-01-10', '2019-05-09 01:37:27', '2019-05-09 01:37:27'),
(16, 1, 220, 2017, '<p>Ai l&agrave; &ldquo;sếp&rdquo; của c&aacute;c vị thần Hy Lạp? Vị thần Ai cập n&agrave;o c&oacute; đầu lừa? Con mắt thứ ba của thần Shiva d&ugrave;ng để l&agrave;m g&igrave;? T&oacute;c của Medusa l&agrave;m bằng g&igrave;? Oedipus đ&atilde; cưới ai m&agrave; ch&agrave;ng kh&ocirc;ng hề hay biết? Năm mới Trung quốc bắt nguồn từ con vật n&agrave;o? Với người Aztec, con người đầu ti&ecirc;n xuất hiện như thế n&agrave;o?<br />\r\n<br />\r\nHơn 200 c&acirc;u hỏi-đ&aacute;p th&uacute; vị về thần thoại Hy Lạp, Ai Cập, Viking, Ấn Độ, Nhật Bản&hellip; v&agrave; c&ograve;n nhiều thứ kh&aacute;c nữa.</p>\r\n\r\n<p><em>* Gi&aacute; sản phẩm tr&ecirc;n Tiki đ&atilde; bao gồm thuế VAT. Tuy nhi&ecirc;n tuỳ v&agrave;o từng loại sản phẩm hoặc phương thức, địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh, ...</em></p>', '14.5 x 20.5 cm', '320', '2018-01-10', '2019-05-09 01:38:00', '2019-05-09 01:38:00'),
(17, 1, 120, 2018, '<p>Kaizaki Arata, 27 tuổi, thất nghiệp, ch&aacute;n nản với cuộc đời. T&igrave;nh cờ trong một lần say xỉn, anh trở th&agrave;nh đối tượng th&iacute; nghiệm của dự &aacute;n mang t&ecirc;n&nbsp;ReLIFE, bị thu nhỏ về h&igrave;nh dạng của một học sinh cao trung 17 tuổi, từ đ&oacute; bắt đầu h&agrave;nh tr&igrave;nh học lại kỹ năng sống, l&agrave;m lại cuộc đời.</p>', '14.5 x 20.5 cm', '320', '2019-01-12', '2019-05-09 01:38:38', '2019-05-09 01:38:38'),
(18, 1, 120, 2018, '<p>Trận chiến giữa c&aacute;c Ma Vương kết th&uacute;c với phần thắng thuộc về Ma Vương {S&aacute;ng Tạo} Procel.</p>\r\n\r\n<p>Nhưng chưa dừng lại ở đ&oacute;, Procel c&ugrave;ng những c&ocirc; con g&aacute;i của m&igrave;nh phải đối mặt với cuộc chiến c&ograve;n kinh khủng hơn nữa - cuộc chiến với con người.</p>\r\n\r\n<p>Để chuẩn bị cho cuộc chiến n&agrave;y, c&oacute; rất nhiều thứ được s&aacute;ng tạo ra, v&agrave; cả sự xuất hiện của những Y&ecirc;u Ma ho&agrave;n to&agrave;n mới.</p>', '14.5 x 20.5 cm', '320', '2019-01-12', '2019-05-09 01:39:19', '2019-05-09 01:39:19'),
(19, 1, 120, 2019, '<p>Một ch&agrave;ng trai trẻ bị đ&acirc;m đến chết v&igrave; những con c&aacute; qu&yacute; gi&aacute; của m&igrave;nh. Một &ocirc;ng tr&ugrave;m ch&acirc;u &Aacute; mua con c&aacute; rồng độc nhất v&ocirc; nhị với gi&aacute; 150.000 đ&ocirc; la. Một th&aacute;m tử đuổi theo những kẻ bu&ocirc;n lậu th&uacute; cưng qua đường phố New York... Cuốn s&aacute;ch Con rồng sau bể k&iacute;nh kể chuyện lại những c&acirc;u chuyện phi thường về nỗi &aacute;m ảnh, sự hoang tưởng v&agrave; những t&ecirc;n tội phạm li&ecirc;n quan đến một lo&agrave;i c&aacute; kh&ocirc;ng giống bất k&igrave; lo&agrave;i vật n&agrave;o kh&aacute;c: một động vật ăn thịt hung dữ xuất hiện từ thời kỳ khủng long c&ograve;n tồn tại tr&ecirc;n tr&aacute;i đất.&nbsp;<br />\r\n&quot;Một cuốn s&aacute;ch c&oacute; t&iacute;nh khai mở lạ k&igrave;.&quot; - The New York Times&nbsp;<br />\r\n&quot;Mang m&agrave;u sắc căng thẳng của một tiểu thuyết trinh th&aacute;m, Voigt đ&atilde; vẽ n&ecirc;n một thế giới sống động của những vụ giết người, bu&ocirc;n b&aacute;n chợ đen v&agrave; việc hủy hoại m&ocirc;i trường sinh tồn của một lo&agrave;i c&aacute; m&agrave; trớ tr&ecirc;u thay, n&oacute; lại được coi l&agrave; biểu tượng của may mắn v&agrave; sức cuốn h&uacute;t.&quot; - Discover<br />\r\n&quot;Một c&acirc;u chuyện v&ocirc; c&ugrave;ng ấn tượng, đầy bất ngờ v&agrave; hồi hộp... Mọi thứ bỗng trở n&ecirc;n k&igrave; dị.&quot; - The Wall Street Journal</p>\r\n\r\n<p>(Con rồng sau bể k&iacute;nh kể về h&agrave;nh tr&igrave;nh nữ nh&agrave; b&aacute;o Emily Voigt đi t&igrave;m c&aacute; rồng hoang d&atilde; - lo&agrave;i c&aacute; cảnh đắt nhất thế giới. H&agrave;nh tr&igrave;nh n&agrave;y đ&atilde; đưa c&ocirc; đi khắp to&agrave;n cầu, theo ch&acirc;n những người nu&ocirc;i c&aacute; cảnh k&igrave; lạ đến c&aacute;c khu rừng xa x&ocirc;i nhất h&agrave;nh tinh để lần theo dấu vết của c&aacute; rồng tự nhi&ecirc;n.)&nbsp;</p>', '14.5 x 20.5 cm', '500', '2019-03-12', '2019-05-09 01:40:06', '2019-05-09 01:40:06'),
(20, 1, 120, 2019, '<p>Truyện xoay quanh cuộc sống của ch&agrave;ng trai Đinh Tuấn Kiệt v&agrave; c&ocirc; thi&ecirc;n kim tiểu thư L&acirc;m Tiểu N&ecirc;. Họ y&ecirc;u nhau, họ xa nhau, họ c&oacute; những vướng mắc trong cuộc sống, họ c&oacute; khoảnh khắc hạnh ph&uacute;c, họ đến với nhau, họ c&ugrave;ng sinh ra những đứa con m&agrave; họ hết mực y&ecirc;u thương, để rồi họ chia tay nhau v&igrave; những l&yacute; do thật sự kh&ocirc;ng ai ngờ tới. Kh&ocirc;ng &agrave;o ạt dồn dập, kh&ocirc;ng đi theo một logic n&agrave;o, t&igrave;nh cảm của họ cứ tr&ocirc;i một c&aacute;ch ngẫu hứng để rồi họ cảm thấy y&ecirc;u nhau từ l&uacute;c n&agrave;o kh&ocirc;ng biết. Một ch&agrave;ng trai th&agrave;nh đạt v&agrave; c&oacute; phần kh&oacute; t&iacute;nh, hơi truyền thống, một c&ocirc; g&aacute;i nh&iacute; nhảnh, hồn nhi&ecirc;n, một cặp đ&ocirc;i so le ... hạnh ph&uacute;c.</p>\r\n\r\n<p>Hạnh ph&uacute;c tuởng như đ&atilde; đuợc định đoạt, thế nhưng &quot;... c&oacute; ai ngờ rằng, c&oacute; một số việc nh&igrave;n qua th&igrave; thấy b&igrave;nh y&ecirc;n nhưng kỳ thật sau ch&uacute;ng tiềm ẩn rất nhiều phong ba, nhưng kh&ocirc;ng ai c&oacute; thể suốt đời dẹp y&ecirc;n được những trận phong ba đ&oacute;.&quot;</p>\r\n\r\n<p>Một c&aacute;i kết đầy bất ngờ sẽ l&agrave; lời giải đ&aacute;p cho tất cả mớ b&ograve;ng bong tr&ecirc;n...</p>', '14.5 x 20.5 cm', '500', '2019-03-12', '2019-05-09 01:40:39', '2019-05-09 01:40:39'),
(21, 1, 70, 2018, '<p>Kyoka vừa ch&iacute;nh thức trở th&agrave;nh nh&acirc;n vi&ecirc;n c&ocirc;ng ty th&aacute;m tử th&igrave; c&oacute; một y&ecirc;u cầu c&ocirc;ng việc nặc danh đ&ograve;i đ&iacute;ch th&acirc;n c&ocirc; b&eacute; thực hiện.</p>\r\n\r\n<p>Kyoka c&ugrave;ng Atsushi đi điều tra, nhưng kh&ocirc;ng hiểu sao Montgomery cứ chen v&agrave;o ph&aacute; đ&aacute;m!?</p>\r\n\r\n<p>Người đ&agrave;n &ocirc;ng tưởng chừng đ&atilde; chết t&aacute;i xuất, c&ograve;n Dostoevsky cuối c&ugrave;ng cũng nhe nanh về ph&iacute;a c&ocirc;ng ty th&aacute;m tử v&agrave; mafia.</p>\r\n\r\n<p>&ldquo;Con quỷ&rdquo; đ&aacute;ng sợ đ&oacute; đang chậm r&atilde;i nhưng chắc chắn, nuốt trọn mặt tối của Yokohama.</p>', '14.5 x 20.5 cm', '500', '2018-03-16', '2019-05-09 01:41:40', '2019-05-09 01:41:40'),
(22, 1, 150, 2019, '<p><strong><em>&ldquo;...&nbsp;</em></strong><em>tại sao con người lại l&agrave;m thế n&agrave;y với nhau? S&uacute;a muốn hỏi, v&igrave; sao S&uacute;a chấp nhận l&agrave;m vợ Phống rồi, ở y&ecirc;n trong nh&agrave; họ Tr&aacute;ng rồi m&agrave; Phống vẫn kh&ocirc;ng vừa l&ograve;ng? Phống c&ograve;n muốn S&uacute;a như một con b&ograve; c&aacute;i, khi chồng leo l&ecirc;n người phải rống l&ecirc;n từng cơn. Phống l&agrave; người hay kh&ocirc;ng phải người?... S&uacute;a thấy sợ Phống. Thấy gh&ecirc; tởm. Kh&ocirc;ng ai dạy S&uacute;a khi l&agrave;m vợ th&igrave; phải biết k&ecirc;u l&ecirc;n khi chồng n&oacute; leo l&ecirc;n người. Tại sao đ&agrave;n b&agrave; lại phải k&ecirc;u l&ecirc;n như b&ograve;? S&uacute;a r&ugrave;ng m&igrave;nh, buồn n&ocirc;n.&rdquo;</em></p>\r\n\r\n<p>&ldquo;... tại sao con người lại l&agrave;m thế n&agrave;y với nhau?&rdquo;&nbsp;<em>Lặng y&ecirc;n dưới vực s&acirc;u</em>, với lối viết ch&acirc;n thực đến gai người, kh&ocirc;ng ngừng tra vấn ch&uacute;ng ta bằng c&acirc;u hỏi nhức nhối ấy.&nbsp;T&igrave;nh y&ecirc;u&nbsp;bị ch&agrave; đạp, th&acirc;n phận bị gi&agrave;y v&ograve;, hy vọng bị dối lừa, những con người mộc mạc nhưng m&atilde;nh liệt trong thẳm s&acirc;u t&acirc;m hồn nơi v&ugrave;ng cao U Khố Sủ đau đớn đi t&igrave;m c&acirc;u trả lời, để rồi, như một định mệnh oan nghiệt, bị l&ocirc;i tuột xuống đ&aacute;y vực s&acirc;u hun h&uacute;t, tối, v&agrave; lặng c&acirc;m.&nbsp;Tiểu thuyết&nbsp;của Đỗ B&iacute;ch Th&uacute;y l&agrave; nỗi trăn trở kh&ocirc;n ngu&ocirc;i về cuộc sống với biết bao những bi kịch, những ngang tr&aacute;i r&igrave;nh rập nuốt chửng con người.</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:42:23', '2019-05-09 01:42:23'),
(23, 1, 150, 2019, '<p>Georgiana l&agrave; người phụ nữ quyền lực nhất Anh Quốc - Nữ ho&agrave;ng của thế giới ngầm London m&agrave; kh&ocirc;ng ai c&oacute; thể chống lại.</p>\r\n\r\n<p>Duncan West l&agrave; người duy nhất đủ th&ocirc;ng minh để kh&aacute;m ph&aacute; sự thật, để ph&aacute; huỷ tất cả những g&igrave; c&ocirc; đ&atilde; g&acirc;y dựng, bao gồm cả tr&aacute;i tim th&eacute;p m&agrave; c&ocirc; t&ocirc;i luyện.</p>\r\n\r\n<p>C&ocirc; mang trong m&igrave;nh th&acirc;n phận b&iacute; ẩn, anh sống với th&acirc;n thế tội lỗi của bản th&acirc;n. Hai người &ndash; v&ocirc; số b&iacute; mật, đều ra sức che đậy, giấu giếm sự thật v&agrave; t&igrave;nh cảm của ch&iacute;nh m&igrave;nh, liệu sẽ ra sao khi tất cả được phơi b&agrave;y?</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:42:54', '2019-05-09 01:42:54'),
(24, 1, 150, 2019, '<p>&ldquo;Đi n&agrave;o Asuna! Nắm chặt v&agrave;o! Tilnel, xuất ph&aacute;t!&rdquo;</p>\r\n\r\n<p>Tạm biệt nữ kị sĩ b&iacute; ẩn Kizmel thuộc tộc Hắc tinh linh, Kirito v&agrave; Asuna tiến đến tầng tiếp theo. Trải rộng khắp tầng 4 của Aincrad l&agrave; &ldquo;thủy lộ&rdquo;.</p>\r\n\r\n<p>Hai người đ&atilde; xoay xở thế n&agrave;o đ&oacute; để đặt ch&acirc;n l&ecirc;n được một th&agrave;nh phố tạo n&ecirc;n từ v&ocirc; v&agrave;n chiếc thuyền đ&aacute;y bằng m&agrave;u trắng c&oacute; k&iacute;ch cỡ lớn nhỏ kh&aacute;c nhau nổi bồng bềnh tr&ecirc;n mặt hồ. Muốn tự do đi lại ở tầng n&agrave;y, họ bắt buộc phải lấy được một chiếc thuyền đ&aacute;y bằng chuy&ecirc;n d&ugrave;ng cho việc di chuyển.</p>\r\n\r\n<p>Để kiếm nguy&ecirc;n liệu l&agrave;m thuyền, Kirito v&agrave; Asuna phải đối mặt với con gấu lửa khổng lồ Magnatherium! Sau đ&oacute;, ở tầng 4 n&agrave;y, họ đ&atilde; bất ngờ gặp lại một người&hellip;</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:43:16', '2019-05-09 01:43:16'),
(25, 1, 150, 2019, '<p>Amakawa Haruto &ndash; một ch&agrave;ng trai b&igrave;nh thường sinh ra tại thế kỷ XXI, nhưng kh&ocirc;ng may mất mạng trong một vụ tai nạn kinh ho&agrave;ng.</p>\r\n\r\n<p>Rio &ndash; một cậu b&eacute; ở thế giới kh&aacute;c, đang ng&agrave;y đ&ecirc;m sinh tồn trong một khu &ocirc; chuột h&ocirc;i h&aacute;m v&agrave; bẩn thỉu.</p>\r\n\r\n<p>Hai mảnh gh&eacute;p tưởng chừng như chẳng hề li&ecirc;n quan đến nhau ấy, bỗng một ng&agrave;y kia lại c&oacute; chung một cuộc đời, một số phận, thậm ch&iacute; l&agrave; cả một sứ mệnh chung</p>\r\n\r\n<p>Năm Haruto học năm thứ ba đại học, một tai nạn xe bỗng đổ ập xuống v&agrave; cướp đi mạng sống của cậu. Nhưng khi mở mắt ra lần nữa, Haruto đ&atilde; kh&ocirc;ng c&ograve;n l&agrave; m&igrave;nh, m&agrave; trở th&agrave;nh một cậu nh&oacute;c 7 tuổi t&ecirc;n &ldquo;Rio&rdquo;. Xung quanh cậu l&agrave; một thế giới xa lạ, một khu ổ chuột với đủ hạng người &ndash; nơi m&agrave; Rio đang phải đấu tranh để gi&agrave;nh giật lại mạng sống từng ng&agrave;y từng giờ.</p>\r\n\r\n<p>Một người sẽ ra sao khi c&oacute; tận hai nh&acirc;n c&aacute;ch kh&aacute;c nhau c&ugrave;ng hai d&ograve;ng k&yacute; ức t&aacute;ch biệt?</p>\r\n\r\n<p>Một Rio lu&ocirc;n lu&ocirc;n th&ugrave; hận kẻ đ&atilde; giết chết mẹ m&igrave;nh v&agrave; một Haruto lu&ocirc;n t&acirc;m niệm về người bạn thời thơ ấu liệu c&oacute; thể chung sống h&ograve;a hợp trong một cơ thể?</p>\r\n\r\n<p>Trong l&uacute;c vẫn c&ograve;n đang m&ocirc;ng lung trước th&acirc;n phận của m&igrave;nh, Rio lại bị vướng v&agrave;o vụ bắt c&oacute;c một b&eacute; g&aacute;i v&agrave; ph&aacute;t&nbsp; hiện ra năng lực kh&ocirc;ng ngờ của bản th&acirc;n. Thế nhưng b&eacute; g&aacute;i m&agrave; cậu cứu lại l&agrave; một c&ocirc; c&ocirc;ng ch&uacute;a?!</p>\r\n\r\n<p>Điều g&igrave; đang chờ đợi Rio ở ph&iacute;a trước?</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:43:44', '2019-05-09 01:43:44'),
(26, 1, 150, 2019, '<p>Thanh xu&acirc;n đ&oacute;, họ gặp nhau...</p>\r\n\r\n<p>Một mối t&igrave;nh học tr&ograve; trong s&aacute;ng giữa hai người bạn chung b&agrave;n, chung lớp nảy nở tựa như những đ&oacute;a hoa th&aacute;ng tư...</p>\r\n\r\n<p>Người ta vẫn n&oacute;i t&igrave;nh y&ecirc;u học tr&ograve; thường mong manh, khi chưa ai đủ trưởng th&agrave;nh để bảo vệ t&igrave;nh y&ecirc;u, v&agrave; cũng kh&ocirc;ng đủ ki&ecirc;n định đi c&ugrave;ng nhau đến cuối h&agrave;nh tr&igrave;nh...</p>\r\n\r\n<p>T&igrave;nh y&ecirc;u tuổi học tr&ograve;, mạnh mẽ nhưng phải vụng về giấu k&iacute;n...</p>\r\n\r\n<p>C&oacute; khi rực rỡ như nắng s&acirc;n trường, c&oacute; l&uacute;c buồn b&atilde; như ng&agrave;y ướt mưa...</p>\r\n\r\n<p>Biết bao s&oacute;ng gi&oacute;, biết bao c&aacute;ch trở khiến c&ocirc; nghĩ rằng &quot;ch&agrave;ng trai năm ấy&quot; m&atilde;i chỉ l&agrave; người trong mộng.</p>\r\n\r\n<p>Chỉ m&igrave;nh anh chứng minh điều ngược lại, kẻ cứng đầu như anh, khi đ&atilde; phải l&ograve;ng một người năm mười s&aacute;u tuổi, cả cuộc đời sẽ chỉ chọn ở b&ecirc;n người đ&oacute;...</p>\r\n\r\n<p>&quot;Thời ni&ecirc;n thiếu ch&uacute;ng ta mắc biết bao lỗi lầm. Nhưng nhiều năm sau nhớ lại, mới biết th&aacute;ng năm hoa mộng ấy sao m&agrave; đẹp đẽ, tựa như ngọn đ&egrave;n s&aacute;ng l&ecirc;n trong cơn mưa đ&ecirc;m. Tuổi xu&acirc;n của mỗi người con g&aacute;i đều mong ước c&oacute; được một người con trai như thế - một người lu&ocirc;n bảo vệ v&agrave; y&ecirc;u thương m&igrave;nh v&ocirc; điều kiện, phải kh&ocirc;ng?&quot;</p>\r\n\r\n<p>Người L&agrave; Th&aacute;ng Tư Của Thế Gian&nbsp;- Một c&acirc;u chuyện về t&igrave;nh y&ecirc;u v&agrave; những th&aacute;ng ng&agrave;y thanh xu&acirc;n m&agrave; ch&uacute;ng ta ai cũng đ&atilde; một lần nếm trải...</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:44:31', '2019-05-09 01:44:31'),
(27, 1, 100, 2019, '<p>Kaizaki Arata, 27 tuổi, thất nghiệp, ch&aacute;n nản với cuộc đời. T&igrave;nh cờ trong một lần say xỉn, anh trở th&agrave;nh đối tượng th&iacute; nghiệm của dự &aacute;n mang t&ecirc;n&nbsp;ReLIFE, bị thu nhỏ về h&igrave;nh dạng của một học sinh cao trung 17 tuổi, từ đ&oacute; bắt đầu h&agrave;nh tr&igrave;nh học lại kỹ năng sống, l&agrave;m lại cuộc đời.</p>\r\n\r\n<p><strong>Giới thiệu T&aacute;c giả - Họa sĩ:</strong></p>\r\n\r\n<p><strong>YAYOISO &ndash;&nbsp;</strong>T&aacute;c giả c&oacute; lượng view cao nhất web đọc truyện online COMICO, với t&aacute;c phẩm đ&atilde; được chuyển thể th&agrave;nh phim hoạt h&igrave;nh, phim điện ảnh v&agrave; tiểu thuyết.</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:45:04', '2019-05-09 01:45:04'),
(28, 1, 100, 2019, '<p>D&ugrave; chưa phải ho&agrave;n to&agrave;n, Chise đ&atilde; c&oacute; thể chấp nhận con người Elias v&agrave; cả bản th&acirc;n c&ocirc;.</p>\r\n\r\n<p>Khi Cartaphilus ch&igrave;m v&agrave;o giấc ngủ d&agrave;i v&agrave; Chise lấy lại được b&igrave;nh tĩnh, &ldquo;Học viện&rdquo; - nơi c&aacute;c thuật sĩ hỗ trợ lẫn nhau - đ&atilde; gửi đến c&ocirc; lời mời nhập học&hellip;</p>\r\n\r\n<p>S&acirc;u b&ecirc;n dưới Thư viện Anh, tr&ecirc;n một s&acirc;n khấu mới, c&acirc;u chuyện mới mở m&agrave;n.</p>\r\n\r\n<p>Con người học hỏi, ngẫm nghĩ, v&agrave; dần trưởng th&agrave;nh&hellip; C&ograve;n phi nh&acirc;n th&igrave; sao?</p>', '14.5 x 20.5 cm', '350', '2019-03-16', '2019-05-09 01:45:49', '2019-05-09 01:45:49'),
(29, 1, 220, 2017, '<p>T&ocirc; Căng Bắc- MC, diễn vi&ecirc;n nổi tiếng đi l&ecirc;n nhờ thực lực, từ fan h&acirc;m mộ cho đến người trong giới đều kh&ocirc;ng hay biết c&ocirc; vốn l&agrave; tiểu thư nh&agrave; họ T&ocirc; danh tiếng lẫy lừng ở phương nam.</p>\r\n\r\n<p>Đại minh tinh T&ocirc; l&agrave; người như thế n&agrave;o? C&ocirc; ch&iacute;nh l&agrave; một người c&oacute; niềm đam m&ecirc; v&ocirc; hạn với c&aacute;i đẹp, bao gồm cả&hellip; trai đẹp. Trong một lần gi&uacute;p nam thần m&agrave; c&ocirc; đang m&ecirc; mẩn dạo gần đ&acirc;y chạy trốn khỏi đ&aacute;m ph&oacute;ng vi&ecirc;n săn tin. T&ocirc; Căng Bắc xui xẻo gặp tai nạn giao th&ocirc;ng v&agrave; phải nằm viện hai th&aacute;ng. Kh&ocirc;ng ngờ bước ngoặt n&agrave;y lại dẫn đến cuộc gặp gỡ định mệnh giữa c&ocirc; với Chu Thời Uẩn- b&aacute;c sĩ trị liệu cho c&ocirc; v&agrave; cũng ch&iacute;nh l&agrave; vị h&ocirc;n phu được gia đ&igrave;nh mai mối, người&nbsp; m&agrave; T&ocirc; Căng Bắc kh&ocirc;ng th&egrave;m để &yacute; suốt hai mươi năm qua, thậm ch&iacute; c&ograve;n căm gh&eacute;t đến tận xương tủy v&igrave; d&aacute;m bỏ rơi c&ocirc; trong h&ocirc;n lễ.</p>\r\n\r\n<p>Từ đ&acirc;y, trong l&ograve;ng T&ocirc; Căng Bắc, những anh ch&agrave;ng đẹp trai ngời ngời ngo&agrave;i kia đều chẳng thể s&aacute;nh được với b&aacute;c sĩ Chu lạnh l&ugrave;ng, cao ngạo nh&agrave; c&ocirc; nữa&hellip;&rdquo;</p>\r\n\r\n<p>Tr&iacute;ch đoạn:</p>\r\n\r\n<p>-------------</p>\r\n\r\n<p>Ph&oacute;ng vi&ecirc;n: Ưu điểm lớn nhất của chồng c&ocirc; l&agrave; g&igrave;?</p>\r\n\r\n<p>T&ocirc; Căng Bắc: Đẹp trai, nhiều tiền, sống tốt.</p>\r\n\r\n<p>Ph&oacute;ng vi&ecirc;n: Sống&hellip; sống tốt?</p>', '14.5 x 20.5 cm', '500', '2017-02-16', '2019-05-09 01:46:40', '2019-05-09 01:46:40'),
(30, 1, 100, 2017, '<p>Sau khi gặp Misa, tức &ldquo;Kira thứ hai&rdquo;, Raito l&ecirc;n kế hoạch lợi dụng đ&ocirc;i mắt tử thần để x&oacute;a sổ L. Nhưng tổ điều tra bắt giữ Misa v&igrave; t&igrave;nh nghi l&agrave; Kira thứ hai. Bước tới đường c&ugrave;ng, Raito tự nguyện để bị giam giữ! Cuối c&ugrave;ng cậu tuy&ecirc;n bố với Ryuk từ bỏ cuốn sổ tử thần. Rốt cuộc Raito đang suy t&iacute;nh điều g&igrave;&hellip;? Trong khi đ&oacute;, một Kira mới bắt đầu h&agrave;nh động trong b&oacute;ng tối. Raito được thả để điều tra c&ugrave;ng L trong t&igrave;nh trạng hai người c&ograve;ng tay v&agrave;o nhau. Họ x&aacute;c định Kira mới thuộc tập đo&agrave;n Yotsuba v&agrave; phạm vi nghi ngờ thu hẹp c&ograve;n 8 nh&acirc;n vật. Ch&acirc;n tướng sự việc sắp bắt đầu h&eacute; lộ!</p>', '14.5 x 20.5 cm', '300', '2017-02-16', '2019-05-09 01:47:31', '2019-05-09 01:47:31'),
(31, 1, 100, 2017, '<p>Đỗ Trạch l&agrave; một t&ecirc;n độc giả anti fan (rởm), ch&iacute;nh v&igrave; c&aacute;i l&yacute; luận trai kh&ocirc;ng hư g&aacute;i kh&ocirc;ng thương, độc giả kh&ocirc;ng n&eacute;m đ&aacute; t&aacute;c giả kh&ocirc;ng nh&igrave;n thấy.</p>\r\n\r\n<p>T&ecirc;n độc giả ngốc nghếch cuồng t&iacute;n v&agrave;o ch&acirc;n l&yacute; &ldquo;c&agrave;ng y&ecirc;u c&agrave;ng chửi&rdquo;, cứ thế theo d&otilde;i tiểu thuyết d&agrave;i kỳ trong nỗi niềm đau đớn cứ tuần ho&agrave;n hết n&eacute;m đ&aacute; rồi lại bấm phiếu đề cử, bấm phiếu đề cử rồi lại n&eacute;m đ&aacute;&hellip;</p>\r\n\r\n<p>M&agrave; h&ocirc;m nay, một b&igrave;nh luận n&eacute;m đ&aacute; Đỗ Trạch gửi cho t&aacute;c phẩm mới &ldquo;Hỗn Huyết&rdquo; của t&aacute;c giả, kh&ocirc;ng ngờ lại để t&aacute;c giả đọc được!</p>\r\n\r\n<p>Kể từ đ&oacute;, nh&acirc;n vật ch&iacute;nh tươi s&aacute;ng ngời ngời &ndash; Tu &ndash; từ một thiếu ni&ecirc;n thi&ecirc;n t&agrave;i của học viện ph&eacute;p thuật tức khắc thức tỉnh d&ograve;ng m&aacute;u Undead, biến th&agrave;nh một bộ xương trắng ởn một c&aacute;ch thần kỳ!</p>\r\n\r\n<p>T&ecirc;n độc giả anti fan ngốc nghếch liền tức &oacute;i m&aacute;u&hellip;</p>\r\n\r\n<p>T&aacute;c! Giả! Anh! Thắng! Rồi!</p>\r\n\r\n<p>Bất ngờ hơn c&ograve;n ở ph&iacute;a sau.</p>\r\n\r\n<p>Chủ h&agrave;ng nơi Đỗ Trạch mua s&aacute;ch đ&atilde; gửi nhầm cuốn đồng nh&acirc;n cao H của &ldquo;Hỗn Huyết&rdquo; cho cậu, v&agrave; thế l&agrave; Đỗ Trạch &ndash; mắt đeo k&iacute;nh cận d&agrave;y cộp, tai đeo m&aacute;y trợ th&iacute;nh &ndash; cứ thế xuy&ecirc;n-kh&ocirc;ng v&agrave;o trong &ldquo;Hỗn Huyết&rdquo; một c&aacute;ch phản khoa học!</p>', '14.5 x 20.5 cm', '300', '2017-02-16', '2019-05-09 01:48:55', '2019-05-09 01:48:55'),
(32, 1, 100, 2017, '<p>Kh&ocirc;ng đi t&igrave;m chết th&igrave; ắt kh&ocirc;ng chết.</p>\r\n\r\n<p>Trước lời tỏ t&igrave;nh phạm quy &ldquo;chỉ cho ph&eacute;p nghe kh&ocirc;ng cho ph&eacute;p từ chối&rdquo; của Tu, Đỗ Trạch liền biết d&ugrave; m&igrave;nh c&oacute; đi t&igrave;m chết hay kh&ocirc;ng th&igrave; cũng chết chắc rồi.</p>\r\n\r\n<p>Thần &Aacute;nh s&aacute;ng đ&atilde; m&ograve; đến tận cửa, tay phải muốn về nh&agrave;, tay tr&aacute;i lại muốn nh&acirc;n vật ch&iacute;nh.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; định &eacute;p chết độc giả phải kh&ocirc;ng?</p>\r\n\r\n<p>Mới trải nghiệm ch&acirc;n t&igrave;nh, ngay cả Thần cũng kh&ocirc;ng ngăn được.</p>\r\n\r\n<p>Thuộc t&iacute;nh &ldquo;ngựa đực&rdquo; đ&atilde; gi&aacute;c ngộ, y&ecirc;u đương đa chủng tộc c&aacute;i n&agrave;y c&aacute;i n&agrave;y c&aacute;i n&agrave;y&hellip;</p>\r\n\r\n<p>T&aacute;c giả, tiết th&aacute;o của &ocirc;ng đ&acirc;u rồi!? Tiểu sinh thật sự kh&ocirc;ng chịu nổi!</p>\r\n\r\n<p>Cậu, l&agrave; anti-fan hại nh&acirc;n vật ch&iacute;nh rơi v&agrave;o cảnh ngộ th&ecirc; thảm.</p>\r\n\r\n<p>Cậu, l&agrave; fan cuồng ngốc nghếch ch&acirc;n th&agrave;nh y&ecirc;u nh&acirc;n vật ch&iacute;nh.</p>', '14.5 x 20.5 cm', '800', '2017-02-16', '2019-05-09 01:49:39', '2019-05-09 01:49:39'),
(33, 1, 120, 2017, '<p>C&oacute; thể, bạn đ&atilde; từng c&oacute; những trải nghiệm k&igrave; lạ nhưng vẫn chưa t&igrave;m ra sự thật.</p>\r\n\r\n<p>C&oacute; thể, bạn đang vướng v&agrave;o một cơn &aacute;c mộng nhưng chẳng c&oacute; c&aacute;ch n&agrave;o tho&aacute;t ra.</p>\r\n\r\n<p>C&oacute; thể, chỉ đơn giản l&agrave; bạn th&iacute;ch những sự kiện b&iacute; ẩn v&agrave; muốn giải m&atilde; ch&uacute;ng.</p>\r\n\r\n<p>C&oacute; thể, bạn khao kh&aacute;t t&igrave;nh y&ecirc;u v&agrave; đang t&igrave;m kiếm định mệnh của đời m&igrave;nh.</p>\r\n\r\n<p>C&oacute; lẽ, tất cả những điều bạn kiếm t&igrave;m, đều ở trong cuốn s&aacute;ch n&agrave;y.</p>\r\n\r\n<p><em>&ldquo;Con người rốt cuộc sợ h&atilde;i điều g&igrave;, lo lắng điều g&igrave;?</em></p>\r\n\r\n<p><em>Đ&acirc;u l&agrave; căn nguy&ecirc;n của nỗi sợ h&atilde;i ấy?&rdquo;</em></p>', '14.5 x 20.5 cm', '360', '2018-02-16', '2019-05-09 01:50:17', '2019-05-09 01:50:17'),
(34, 1, 120, 2017, '<p><em>&ldquo;Trong mắt người đ&oacute; nh&igrave;n n&oacute;, c&oacute; kinh ngạc nhưng kh&ocirc;ng sợ h&atilde;i, c&oacute; thương x&oacute;t m&agrave; kh&ocirc;ng gh&eacute;t bỏ. Dần dần, thương x&oacute;t trở th&agrave;nh y&ecirc;u thương, cưng chiều n&oacute;.&rdquo;</em></p>\r\n\r\n<p>Người t&agrave;i đến mấy cũng kh&ocirc;ng thể chống lại thi&ecirc;n tai nh&acirc;n họa.</p>\r\n\r\n<p>Để cha kh&ocirc;ng phải ra ngo&agrave;i cướp tiền về nu&ocirc;i gia đ&igrave;nh, Trương B&igrave;nh vốn &ocirc;m mộng th&agrave;nh thi&ecirc;n hạ đệ nhất cao thủ tự nguyện v&agrave;o cung l&agrave;m th&aacute;i gi&aacute;m.</p>\r\n\r\n<p>Một ho&agrave;ng tử m&agrave; lại gầy như bộ xương kh&ocirc;, đ&acirc;y l&agrave; ấn tượng đầu ti&ecirc;n của y về Ho&agrave;ng Phủ Kiệt.</p>\r\n\r\n<p>Một ho&agrave;ng tử m&agrave; lại quỳ xuống trước mặt th&aacute;i gi&aacute;m v&ocirc; phẩm, cả người đầy vết thương&hellip;</p>\r\n\r\n<p>Kh&ocirc;ng phải chỉ xấu hơn, lạ hơn người thường một ch&uacute;t th&ocirc;i sao? Xấu x&iacute; th&igrave; kh&ocirc;ng phải con người &agrave;?</p>\r\n\r\n<p>Hừ, Trương B&igrave;nh ta quyết định rồi, ta sẽ bồi dưỡng ra thi&ecirc;n hạ đệ nhị trong ho&agrave;ng cung n&agrave;y!</p>', '14.5 x 20.5 cm', '800', '2018-02-16', '2019-05-09 01:51:05', '2019-05-09 01:51:05'),
(35, 1, 120, 2019, '<p>Một cuốn s&aacute;ch rung động tận t&acirc;m can về giai đoạn lịch sử hưng vong của Trung Nguy&ecirc;n, một kh&uacute;c chiến ca thời loạn trải quả mười năm d&agrave;i đằng đẵng. Thi&ecirc;n hạ ngập kh&oacute;i&nbsp; lửa, non s&ocirc;ng bị t&agrave;n ph&aacute;, vương đạo ở ngay trong l&ograve;ng mỗi người.</p>\r\n\r\n<p>Liệu với đại nghĩa v&agrave; th&acirc;m t&igrave;nh, con người ta c&oacute; thể chiến thắng mọi kh&oacute; khăn.</p>\r\n\r\n<p><strong>Tập 1</strong></p>\r\n\r\n<p>Vốn l&agrave; một cậu ấm mười s&aacute;u tuổi ăn sung mặc sướng, trước gia cảnh đột ngột thay đổi, Du Diểu chỉ c&ograve;n mỗi sơn trang hoang vu do người mẹ qu&aacute; cố để lại v&agrave; người n&ocirc; bộc Khuyển Nhung rất mực trung th&agrave;nh. Ho&agrave;n cảnh kh&oacute; khăn quẫn b&aacute;ch khi lập nghiệp từ hai b&agrave;n tay trắng đ&atilde; trở th&agrave;nh thử th&aacute;ch lớn lao đầu ti&ecirc;n trong đời cậu...</p>\r\n\r\n<p><strong>Tập 2</strong></p>\r\n\r\n<p>Đến kỳ khoa cử, Du Diểu v&agrave;o kinh dự thi, ngờ đ&acirc;u bộ tộc phương Bắc x&acirc;m lược, thế như chẻ tre đ&aacute;nh thẳng xuống ph&iacute;a Nam, người H&aacute;n ồ ạt chạy nạn, kh&oacute;i lửa bốn bề, nước mất nh&agrave; tan, lang thang phi&ecirc;u bạt kh&ocirc;ng chốn lương th&acirc;n...</p>\r\n\r\n<p><strong>Tập 3</strong></p>\r\n\r\n<p>Du Hiểu v&agrave; c&aacute;c huynh đệ kết nghĩa vượt qua cảnh ngộ lưu lạc c&ugrave;ng khốn, về đến Giang Nam dốc hết sức lực gầy dựng nửa mảnh giang sơn đ&atilde; bị gi&agrave;y x&eacute;o dưới g&oacute;t sắt qu&acirc;n th&ugrave;...</p>', '14.5 x 20.5 cm', '800', '2019-02-20', '2019-05-09 01:51:57', '2019-05-09 01:51:57'),
(36, 1, 120, 2019, '<p>Một cuốn s&aacute;ch rung động tận t&acirc;m can về giai đoạn lịch sử hưng vong của Trung Nguy&ecirc;n, một kh&uacute;c chiến ca thời loạn trải quả mười năm d&agrave;i đằng đẵng. Thi&ecirc;n hạ ngập kh&oacute;i&nbsp; lửa, non s&ocirc;ng bị t&agrave;n ph&aacute;, vương đạo ở ngay trong l&ograve;ng mỗi người.</p>\r\n\r\n<p>Liệu với đại nghĩa v&agrave; th&acirc;m t&igrave;nh, con người ta c&oacute; thể chiến thắng mọi kh&oacute; khăn.</p>\r\n\r\n<p><strong>Tập 1</strong></p>\r\n\r\n<p>Vốn l&agrave; một cậu ấm mười s&aacute;u tuổi ăn sung mặc sướng, trước gia cảnh đột ngột thay đổi, Du Diểu chỉ c&ograve;n mỗi sơn trang hoang vu do người mẹ qu&aacute; cố để lại v&agrave; người n&ocirc; bộc Khuyển Nhung rất mực trung th&agrave;nh. Ho&agrave;n cảnh kh&oacute; khăn quẫn b&aacute;ch khi lập nghiệp từ hai b&agrave;n tay trắng đ&atilde; trở th&agrave;nh thử th&aacute;ch lớn lao đầu ti&ecirc;n trong đời cậu...</p>\r\n\r\n<p><strong>Tập 2</strong></p>\r\n\r\n<p>Đến kỳ khoa cử, Du Diểu v&agrave;o kinh dự thi, ngờ đ&acirc;u bộ tộc phương Bắc x&acirc;m lược, thế như chẻ tre đ&aacute;nh thẳng xuống ph&iacute;a Nam, người H&aacute;n ồ ạt chạy nạn, kh&oacute;i lửa bốn bề, nước mất nh&agrave; tan, lang thang phi&ecirc;u bạt kh&ocirc;ng chốn lương th&acirc;n...</p>\r\n\r\n<p><strong>Tập 3</strong></p>\r\n\r\n<p>Du Hiểu v&agrave; c&aacute;c huynh đệ kết nghĩa vượt qua cảnh ngộ lưu lạc c&ugrave;ng khốn, về đến Giang Nam dốc hết sức lực gầy dựng nửa mảnh giang sơn đ&atilde; bị gi&agrave;y x&eacute;o dưới g&oacute;t sắt qu&acirc;n th&ugrave;...</p>', '14.5 x 20.5 cm', '800', '2019-02-20', '2019-05-09 01:52:20', '2019-05-09 01:52:20'),
(37, 1, 120, 2019, '<p>Trận chiến với The Guild kết th&uacute;c, c&ocirc;ng ty th&aacute;m tử cũng tạm thời đ&igrave;nh chiến với mafia.</p>\r\n\r\n<p>Atsushi tiếp nhận điều tra một vụ tai nạn giao th&ocirc;ng, Kunikida th&igrave; bị cuốn v&agrave;o một vụ đ&aacute;nh bom v&agrave; phải đối mặt với cuộc sống khắc nghiệt v&igrave; l&yacute; tưởng.</p>\r\n\r\n<p>Người bạn từng l&agrave;m trong c&ocirc;ng ty th&aacute;m tử của Kunikida, n&agrave;ng &ldquo;tiểu thư t&oacute;c đen&rdquo;, ban l&atilde;nh đạo Port Mafia, c&ugrave;ng nhiều nh&acirc;n vật kh&aacute;c bắt đầu rục rịch. Trong khi đ&oacute;, &ldquo;con quỷ&rdquo; Dostoevsky người Nga &acirc;m thầm h&agrave;nh động&hellip;</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:53:00', '2019-05-09 01:53:00'),
(38, 1, 120, 2019, '<p>Kh&ocirc;ng đi t&igrave;m chết th&igrave; ắt kh&ocirc;ng chết.</p>\r\n\r\n<p>Trước lời tỏ t&igrave;nh phạm quy &ldquo;chỉ cho ph&eacute;p nghe kh&ocirc;ng cho ph&eacute;p từ chối&rdquo; của Tu, Đỗ Trạch liền biết d&ugrave; m&igrave;nh c&oacute; đi t&igrave;m chết hay kh&ocirc;ng th&igrave; cũng chết chắc rồi.</p>\r\n\r\n<p>Thần &Aacute;nh s&aacute;ng đ&atilde; m&ograve; đến tận cửa, tay phải muốn về nh&agrave;, tay tr&aacute;i lại muốn nh&acirc;n vật ch&iacute;nh.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; định &eacute;p chết độc giả phải kh&ocirc;ng?</p>\r\n\r\n<p>Mới trải nghiệm ch&acirc;n t&igrave;nh, ngay cả Thần cũng kh&ocirc;ng ngăn được.</p>\r\n\r\n<p>Thuộc t&iacute;nh &ldquo;ngựa đực&rdquo; đ&atilde; gi&aacute;c ngộ, y&ecirc;u đương đa chủng tộc c&aacute;i n&agrave;y c&aacute;i n&agrave;y c&aacute;i n&agrave;y&hellip;</p>\r\n\r\n<p>T&aacute;c giả, tiết th&aacute;o của &ocirc;ng đ&acirc;u rồi!? Tiểu sinh thật sự kh&ocirc;ng chịu nổi!</p>\r\n\r\n<p>Cậu, l&agrave; anti-fan hại nh&acirc;n vật ch&iacute;nh rơi v&agrave;o cảnh ngộ th&ecirc; thảm.</p>\r\n\r\n<p>Cậu, l&agrave; fan cuồng ngốc nghếch ch&acirc;n th&agrave;nh y&ecirc;u nh&acirc;n vật ch&iacute;nh.</p>\r\n\r\n<p>Nh&acirc;n vật ch&iacute;nh &ldquo;Hỗn Huyết&rdquo; đang dần dần thức tỉnh, bạn độc giả xuy&ecirc;n kh&ocirc;ng đang dần dần lạc hướng.</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:53:44', '2019-05-09 01:53:44');
INSERT INTO `chitietsach` (`masach`, `mangonngu`, `sotrang`, `namxuatban`, `noidung`, `kichthuoc`, `trongluong`, `ngayphathanh`, `created_at`, `updated_at`) VALUES
(39, 1, 120, 2019, '<p><em>Owen giải th&iacute;ch: &ldquo;Marie l&agrave; nữ gi&uacute;p việc người Singapore, Isaac l&agrave; con vẹt, Albert l&agrave; con c&aacute; nhiệt đới.&rdquo;</em></p>\r\n\r\n<p><em>Ch&acirc;n &Aacute;i kh&ocirc;ng thể tin được, &ldquo;Anh d&ugrave;ng t&ecirc;n của Einstein v&agrave; Newton đặt t&ecirc;n cho th&uacute; cưng sao?&rdquo;</em></p>\r\n\r\n<p><em>&ldquo;D&ugrave; t&ocirc;i đ&aacute;nh gi&aacute; cao c&ocirc; đ&atilde; nh&igrave;n ra xuất xứ t&ecirc;n c&aacute;c c&ocirc; n&agrave;ng nhưng t&ocirc;i kh&ocirc;ng th&iacute;ch th&aacute;i độ của c&ocirc; với ch&uacute;ng.&rdquo; Ng&ocirc;n Tố ki&ecirc;u căng hất cằm, rất bất m&atilde;n. &ldquo;Albert l&agrave; con c&aacute; nhiệt đới rất th&ocirc;ng minh, c&ograve;n Isaac thuộc được ba định luật Newton bằng tiếng Anh, khẩu &acirc;m quận Devon nước Anh. C&ograve;n nữa, n&oacute; rất th&iacute;ch ăn t&aacute;o.&rdquo;</em></p>\r\n\r\n<p><em>Ch&acirc;n &Aacute;i gật đầu: &ldquo;Anh chọn Marie l&agrave;m nữ gi&uacute;p việc kh&ocirc;ng phải v&igrave; t&ecirc;n c&ocirc; ấy giống với Marie Cuirie chứ?&rdquo;</em></p>\r\n\r\n<p><em>Ng&ocirc;n Tố nheo mắt nh&igrave;n c&ocirc; hồi l&acirc;u, m&iacute;m m&ocirc;i: &ldquo;C&ocirc; th&ocirc;ng minh hơn t&ocirc;i tưởng. OK, c&ocirc; c&oacute; thể t&aacute; t&uacute;c ở nh&agrave; t&ocirc;i.&rdquo;</em></p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:54:06', '2019-05-09 01:54:06'),
(40, 1, 120, 2019, '<p><strong>1.</strong>&nbsp;<strong>Tập 9A: Hắc Thủy Nộ Y&ecirc;u</strong></p>\r\n\r\n<p>Để điều tra manh mối Kh&ocirc; Diệp để lại, Triển Chi&ecirc;u Bạch Ngọc Đường c&ugrave;ng mọi người tr&ugrave;ng tr&ugrave;ng điệp điệp đến Đại L&yacute;.</p>\r\n\r\n<p>Kh&ocirc;ng ngờ vừa xuống thuyền đ&atilde; c&oacute; người chỉ v&agrave;o Triển Chi&ecirc;u m&agrave; h&ocirc; &ldquo;M&egrave;o tinh&rdquo;!</p>\r\n\r\n<p>Ma nữ &aacute;o đỏ kh&ocirc;ng ngừng xuất hiện, lại th&ecirc;m lời nguyền diệt m&ocirc;n quỷ dị, Nộ Y&ecirc;u h&igrave;nh ch&oacute; ba đầu, căn nh&agrave; ma với v&ocirc; số thi thể bị ch&ocirc;n v&ugrave;i b&ecirc;n dưới&hellip;</p>\r\n\r\n<p>Mọi người c&ograve;n chưa kịp ổn định chỗ ở đ&atilde; bị y&ecirc;u ma quỷ qu&aacute;i lũ lượt k&eacute;o đến l&agrave;m to&aacute;t mồ h&ocirc;i lạnh.</p>\r\n\r\n<p>Trước mặt Bạch Ngọc Đường, cơ quan tinh xảo đến mấy cũng sẽ lộ sơ hở.</p>\r\n\r\n<p>Nhưng, tại sao chỉ m&igrave;nh Triển Chi&ecirc;u thấy được ma nữ &aacute;o đỏ?</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:54:45', '2019-05-09 01:54:45'),
(41, 1, 120, 2019, '<p>&nbsp;- qu&agrave; tặng k&egrave;m 1&nbsp; postcard</p>\r\n\r\n<p>&nbsp;1huy hiệu random</p>\r\n\r\n<p>&nbsp; 6 trang m&agrave;u</p>\r\n\r\n<p>bọc platis miễn ph&iacute;</p>\r\n\r\n<p>&quot;Tuy hơi đường đột nhưng m&agrave; Kanie kun ơi, c&ugrave;ng đi c&ocirc;ng vi&ecirc;n giải tr&iacute; với t&ocirc;i nh&eacute;?&quot;</p>\r\n\r\n<p>Sento Isuzu - nữ sinh xinh đẹp v&agrave; b&iacute; ẩn vừa chuyển trường đến đưa ra lời mời hẹn h&ograve; với Kanie Seiya tại lớp học sau giờ tan trường. Chuyện được một nữ sinh nổi tiếng ngay từ ng&agrave;y đầu chuyển tới đưa ra lời mời như thế thật sự kh&ocirc;ng tệ. Thế nhưng đ&oacute; l&agrave; chỉ khi cậu kh&ocirc;ng bị d&iacute; một KHẨU S&Uacute;NG HỎA MAI v&agrave;o đầu.</p>\r\n\r\n<p>Miễn cưỡng chấp nhận, nơi cậu được dắt tới l&agrave; &ldquo;Amagi Brilliant Park&rdquo;. Một c&ocirc;ng vi&ecirc;n nổi tiếng như một điểm hẹn h&ograve; tệ hại. Tại đ&oacute; Seiya đ&atilde; được giới thiệu với một n&agrave;ng c&ocirc;ng ch&uacute;a &quot;h&agrave;ng thật&quot; t&ecirc;n Latifa.</p>\r\n\r\n<p>C&ocirc; g&aacute;i đ&oacute; n&oacute;i với cậu rằng: &quot;Em muốn anh trở th&agrave;nh người quản l&yacute; của Amagi Brilliant Park n&agrave;y.&quot;</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:55:21', '2019-05-09 01:55:21'),
(42, 1, 0, 2019, '<p>&nbsp;c&oacute; quai s&aacute;ch</p>\r\n\r\n<p>khổ 60x80cm</p>\r\n\r\n<p>&nbsp;vảii canvas d&agrave;y</p>\r\n\r\n<p>in 2 mặt</p>\r\n\r\n<p>&nbsp;</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:56:19', '2019-05-09 01:56:19'),
(43, 1, 130, 2019, '<p><strong>Tập 1</strong></p>\r\n\r\n<p>Ở ng&otilde; Thanh Mộc c&oacute; một tiệm quan t&agrave;i, &ocirc;ng chủ tiệm t&ecirc;n l&agrave; Đồng Thất, t&iacute;nh t&igrave;nh khi&ecirc;m tốn lễ độ, tao nh&atilde; đạm bạc.</p>\r\n\r\n<p>Chỉ c&oacute; điều, tiệm n&agrave;y trước đ&acirc;y c&oacute; tin đồn về quỷ, khiến ai ai đi ngang cũng vừa sợ sệt vừa t&ograve; m&ograve;, đến trẻ con cũng nhịn kh&ocirc;ng được phải tới xem trong tiệm c&oacute; ma quỷ g&igrave; kh&ocirc;ng.</p>\r\n\r\n<p>Chỉ c&oacute; mấy người lớn tuổi nh&igrave;n tiệm quan t&agrave;i đầy k&iacute;nh sợ, v&igrave; bọn họ ch&uacute; &yacute; đến một k&yacute; hiệu nho nhỏ tr&ecirc;n bảng hiệu.</p>\r\n\r\n<p>Truyền thuyết n&oacute;i rằng, c&oacute; một loại người c&oacute; thể nối liền &acirc;m dương&hellip;</p>\r\n\r\n<p>&Ocirc;ng chủ Đồng s&aacute;ng mở cửa b&aacute;n &aacute;o liệm, v&ograve;ng hoa. Đ&ecirc;m đến đ&oacute;ng cửa lại nhận những giao dịch kh&aacute;c.</p>\r\n\r\n<p>Chẳng hạn như kiếm đầu người mất, chẳng hạn như t&igrave;m x&aacute;c dưới s&ocirc;ng.</p>\r\n\r\n<p>Cuộc sống đi lại giữa c&aacute;c chốn thần ti&ecirc;n y&ecirc;u ma quỷ qu&aacute;i của Đồng Thất tưởng chừng sẽ m&atilde;i v&ocirc; vị tr&ocirc;i đi như vậy, cho đến ng&agrave;y Thẩm Trạch xuất hiện, khiến con đường sinh mệnh của cả hai đều rẽ ngoặt sang hướng kh&aacute;c&hellip;</p>\r\n\r\n<p><strong>Tập 2</strong></p>\r\n\r\n<p>Thẩm Trạch t&igrave;nh cờ bắt được một con hạc giấy biết bay, đem n&oacute; tới tiệm quan t&agrave;i để chọc ph&aacute; Đồng Thất. H&agrave;nh động trẻ con n&agrave;y kh&ocirc;ng ngờ lại v&ocirc; t&igrave;nh khiến &ocirc;ng chủ Đồng vốn l&atilde;nh đạm thờ ơ phải d&ugrave;ng đến linh lực của m&igrave;nh m&agrave; &ldquo;gi&aacute;o huấn&rdquo; cậu. Thế rồi, duy&ecirc;n phận giữa hai người cũng từ đ&oacute; m&agrave; bắt đầu.</p>\r\n\r\n<p>L&agrave; người của Đồng gia, Đồng Thất d&ugrave; kh&ocirc;ng muốn cũng buộc phải kế thừa linh lực v&agrave; nhiệm vụ của gia tộc.</p>\r\n\r\n<p>Thế nhưng từ khi gặp Thẩm Trạch, c&ugrave;ng trải qua những vui vẻ hờn giận thường t&igrave;nh chốn nh&acirc;n gian, tất cả những g&igrave; Đồng Thất mong muốn lại chỉ l&agrave; một cuộc sống b&igrave;nh ph&agrave;m an ổn, c&oacute; thể ở b&ecirc;n người kia nh&agrave;n tản suốt đời.</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:56:56', '2019-05-09 01:56:56'),
(44, 1, 130, 2019, '<p>&ldquo;Đi n&agrave;o Asuna! Nắm chặt v&agrave;o! Tilnel, xuất ph&aacute;t!&rdquo;</p>\r\n\r\n<p>Tạm biệt nữ kị sĩ b&iacute; ẩn Kizmel thuộc tộc Hắc tinh linh, Kirito v&agrave; Asuna tiến đến tầng tiếp theo. Trải rộng khắp tầng 4 của Aincrad l&agrave; &ldquo;thủy lộ&rdquo;.</p>\r\n\r\n<p>Hai người đ&atilde; xoay xở thế n&agrave;o đ&oacute; để đặt ch&acirc;n l&ecirc;n được một th&agrave;nh phố tạo n&ecirc;n từ v&ocirc; v&agrave;n chiếc thuyền đ&aacute;y bằng m&agrave;u trắng c&oacute; k&iacute;ch cỡ lớn nhỏ kh&aacute;c nhau nổi bồng bềnh tr&ecirc;n mặt hồ. Muốn tự do đi lại ở tầng n&agrave;y, họ bắt buộc phải lấy được một chiếc thuyền đ&aacute;y bằng chuy&ecirc;n d&ugrave;ng cho việc di chuyển.</p>\r\n\r\n<p>Để kiếm nguy&ecirc;n liệu l&agrave;m thuyền, Kirito v&agrave; Asuna phải đối mặt với con gấu lửa khổng lồ Magnatherium! Sau đ&oacute;, ở tầng 4 n&agrave;y, họ đ&atilde; bất ngờ gặp lại một người&hellip;</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:57:35', '2019-05-09 01:57:35'),
(45, 1, 130, 2019, '<p>Phụ nữ Nhật Bản v&agrave; b&iacute; mật giản đơn kh&ocirc;ng ngờ cho một l&agrave;n da &ldquo;kh&ocirc;ng tuổi&rdquo;</p>\r\n\r\n<p>T&ocirc;i đ&atilde; từng đọc ở đ&acirc;u đ&oacute; lời v&iacute; von so s&aacute;nh l&agrave;n da của phụ nữ Nhật Bản giống như một miếng đậu phụ non, trắng trẻo, mềm mại v&agrave; tuyệt đối mịn m&agrave;ng. Phụ nữ Nhật sở hữu một l&agrave;n da trắng mịn trứ danh v&agrave; kỳ diệu thay điều n&agrave;y lại kh&ocirc;ng phải c&aacute; biệt, phần lớn phụ nữ Nhật đều sở hữu một l&agrave;n da đẹp đồng đều như thế. Điều kỳ diệu thứ hai l&agrave; l&agrave;n da đ&oacute; dường như &ldquo;kh&ocirc;ng tuổi&rdquo;, ngay cả những người phụ nữ đ&atilde; bước v&agrave;o thời kỳ trung ni&ecirc;n, khu&ocirc;n mặt d&ugrave; c&oacute; xuất hiện dấu hiệu tuổi t&aacute;c, th&igrave; da của họ vẫn rất mịn m&agrave;ng v&agrave; đặc biệt trắng trẻo.</p>\r\n\r\n<p>Một trong những điểm kh&aacute;c biệt kh&aacute; lớn ở chu tr&igrave;nh dưỡng da của người Nhật l&agrave; họ kh&ocirc;ng qu&aacute; phụ thuộc v&agrave;o c&aacute;c sản phẩm hay c&ocirc;ng nghệ dưỡng da đắt tiền, đối với người Nhật, th&oacute;i quen tập luyện cộng th&ecirc;m lối sống v&agrave; tinh thần mới l&agrave; những yếu tố quan trọng để mang tới một l&agrave;n da tươi trẻ v&agrave; sức khỏe dồi d&agrave;o.</p>\r\n\r\n<p>Nghe th&igrave; c&oacute; vẻ hơi xa vời, nhưng người Nhật c&oacute; một quan niệm kh&aacute; tương đồng với người Ph&aacute;p trong chuyện chăm s&oacute;c sắc đẹp. Họ c&oacute; xu hướng đầu tư v&agrave;o việc bảo tr&igrave; v&agrave; nu&ocirc;i dưỡng da dẻ về l&acirc;u về d&agrave;i, hơn l&agrave; những biện ph&aacute;p chăm s&oacute;c tức thời như đi thẩm mỹ hay tin v&agrave;o những sản phẩm dưỡng da mang lại hiệu quả tức thời. Ch&iacute;nh sự đầu tư cơ bản nhưng d&agrave;i hạn, trải d&agrave;i từ khi tuổi đời c&ograve;n rất trẻ v&agrave; rất c&oacute; thể cho tới hết cuộc đời, đ&atilde; biến việc chăm s&oacute;c sắc đẹp kh&ocirc;ng c&ograve;n l&agrave; một chu tr&igrave;nh rắc rối hay gượng &eacute;p, m&agrave; đ&atilde; trở th&agrave;nh một điều quen thuộc tựa như việc đ&aacute;nh răng rửa mặt h&agrave;ng ng&agrave;y. Việc chăm s&oacute;c l&agrave;n da tuyệt đối kh&ocirc;ng phải l&agrave; một g&aacute;nh nặng duy tr&igrave; nhan sắc, n&oacute; l&agrave; một nghi thức tự chăm s&oacute;c bản th&acirc;n m&agrave; phụ nữ Nhật nhất nhất t&ocirc;n thờ v&agrave; chăm chỉ thực hiện ng&agrave;y qua ng&agrave;y.</p>\r\n\r\n<p>Phương ph&aacute;p trẻ h&oacute;a da kh&ocirc;ng-tốn-một-đồng của h&agrave;ng triệu phụ nữ Nhật</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:57:59', '2019-05-09 01:57:59'),
(46, 1, 130, 2019, '<p>Bạch Lăng Lăng, nữ sinh khoa Điện kh&iacute;, trẻ trung, xinh đẹp v&agrave; rất tự h&agrave;o khi quen được một người bạn l&yacute; tưởng qua mạng, ch&agrave;ng du học sinh của một trường nổi tiếng của Mỹ, người mang biệt danh &ldquo;nh&agrave; khoa học&rdquo;: M&atilde;i M&atilde;i L&agrave; Bao Xa. Qua những cuộc chuyện tr&ograve; tr&ecirc;n QQ, Lăng Lăng đ&atilde; gắn b&oacute; với ch&agrave;ng trai đ&oacute; l&uacute;c n&agrave;o c&ocirc; cũng kh&ocirc;ng hay, cảm x&uacute;c lớn dần, sự chia sẻ lớn dần v&agrave; đến một ng&agrave;y c&ocirc; ph&aacute;t hiện ra m&igrave;nh đ&atilde; y&ecirc;u người con trai &ldquo;t&agrave;i giỏi&rdquo; v&agrave; kh&ocirc;ng một ch&uacute;t khuyết điểm ấy. Nhưng sự tỉnh t&aacute;o gi&uacute;p c&ocirc; &yacute; thức được rằng, thế giới mạng chỉ l&agrave; ảo, họ ở c&aacute;ch nhau cả một đại dương m&ecirc;nh m&ocirc;ng, anh lại qu&aacute; xuất sắc v&agrave; ưu t&uacute;, mối quan hệ của họ sẽ kh&ocirc;ng c&oacute; kết quả g&igrave;. Nhất l&agrave; khi anh th&ocirc;ng b&aacute;o, nếu anh tiếp tục sự nghiệp nghi&ecirc;n cứu lần n&agrave;y, rất c&oacute; thể anh phải định cư b&ecirc;n Mỹ, m&atilde;i m&atilde;i kh&ocirc;ng trở về. Khi nghe tin đ&oacute;, c&ocirc; đ&atilde; gục xuống trước m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh v&agrave; kh&oacute;c. Tất cả như sụp đổ, tia hy vọng cuối c&ugrave;ng dập tắt, anh sẽ kh&ocirc;ng về nước nữa, khoảng c&aacute;ch giữa họ l&agrave; m&atilde;i m&atilde;i&hellip; C&ocirc; cay đắng n&oacute;i với anh lời từ biệt v&agrave; đưa nick của anh v&agrave;o danh s&aacute;ch đen, kh&ocirc;ng bao giờ xuất hiện khi c&ocirc; đăng nhập QQ nữa&hellip;</p>\r\n\r\n<p>Một năm tr&ocirc;i qua, Lăng Lăng tưởng đ&atilde; qu&ecirc;n đi &ldquo;nh&agrave; khoa học&rdquo; ở b&ecirc;n kia thế giới của m&igrave;nh, b&ecirc;n c&ocirc; đ&atilde; c&oacute; U&ocirc;ng Đ&agrave;o, bạn trai, người mang lại cho c&ocirc; cảm gi&aacute;c an to&agrave;n, người c&ocirc; muốn lấy l&agrave;m chồng d&ugrave; cảm x&uacute;c d&agrave;nh cho anh chưa hẳn l&agrave; t&igrave;nh y&ecirc;u. C&ocirc; bảo vệ đề &aacute;n tốt nghiệp, U&ocirc;ng Đ&agrave;o lu&ocirc;n quấn qu&yacute;t b&ecirc;n c&ocirc;&hellip; V&agrave; điều bất ngờ trong buổi bảo vệ đề &aacute;n, Dương Lam H&agrave;ng, một giảng vi&ecirc;n trẻ vừa trở về từ MIT, trường đại học danh tiếng của Mỹ, xuất th&acirc;n từ một gia đ&igrave;nh danh gi&aacute;, đ&atilde; tới tham dự buổi bảo vệ của c&ocirc; v&agrave; đưa ra những c&acirc;u hỏi phản biện thật &ldquo;kh&oacute; chịu&rdquo;. Với c&ocirc;, Tất cả c&aacute;c nữ sinh trong trường đều ngưỡng mỗ v&agrave; ao ước được trở th&agrave;nh b&oacute;ng hồng trong tr&aacute;i tim của Dương Lam H&agrave;ng, nhưng với c&ocirc;, đ&oacute; đ&uacute;ng l&agrave; &ocirc;ng thầy &ldquo;biến th&aacute;i&rdquo;. Sự trớ tr&ecirc;u của số phận đun đẩy khiến c&ocirc; ng&agrave;y c&agrave;ng tiếp x&uacute;c với anh nhiều hơn, v&agrave; ch&iacute;nh anh l&agrave; người gợi &yacute; v&agrave; n&acirc;ng đỡ cho c&ocirc; học tiếp thạc sĩ để c&oacute; cơ hội ở lại trường.</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:58:22', '2019-05-09 01:58:22'),
(47, 1, 130, 2019, '<p>Vốn l&agrave; học sinh xuất sắc, song v&igrave; thi kh&ocirc;ng đủ điểm m&agrave; Tạ Mạnh đến học ở Trung học W. Tại đ&acirc;y cậu gặp gỡ Qu&yacute; Kh&acirc;m Dương &ndash; một người c&oacute; t&iacute;nh c&aacute;ch ho&agrave;n to&agrave;n đối lập m&igrave;nh. Trong những năm th&aacute;ng thanh xu&acirc;n d&agrave;o dạt tại Trung học, hai thiếu ni&ecirc;n dần nảy sinh t&igrave;nh cảm, c&ugrave;ng nhau thi l&ecirc;n Đại học. Trải qua thanh xu&acirc;n, qua những mơ mộng c&ugrave;ng trui r&egrave;n trong cuộc sống, t&igrave;nh cảm hai người c&agrave;ng l&uacute;c c&agrave;ng s&acirc;u sắc, để sau c&ugrave;ng trở về qu&ecirc; cũ, cả hai lại c&ugrave;ng nắm tay l&agrave;m bạn đời, &ocirc;n chuyện những th&aacute;ng năm qua.</p>\r\n\r\n<p>T&aacute;c giả d&ugrave;ng b&uacute;t ph&aacute;p dịu d&agrave;ng, kể lại mượt m&agrave; những năm th&aacute;ng xanh tươi ấy, từng ch&uacute;t triển khai tỉ mỉ, khắc hoạ s&acirc;u sắc h&igrave;nh tượng hai thiếu ni&ecirc;n tới l&uacute;c trưởng th&agrave;nh, thanh xu&acirc;n tuỳ &yacute; bung nở. Kết hợp với phong thổ nhiều nơi, c&ugrave;ng sự kh&aacute;c biệt giữa cuộc sống đời thường v&agrave; hiện thực, c&acirc;u chuyện xoay quanh t&igrave;nh bạn, t&igrave;nh th&acirc;n cũng như t&igrave;nh y&ecirc;u của hai nh&acirc;n vật ch&iacute;nh, khiến độc giả tựa như đi qua th&aacute;ng năm, đi qua li&ecirc;n tiếp qu&aacute; khứ v&agrave; tương lai. C&acirc;u chuyện về qu&atilde;ng thời gian tr&ocirc;i qua như nước, như hoa mĩ quyến, về tuổi trẻ như mộng, vừa tốt đẹp, cũng rất đỗi dịu d&agrave;ng.</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:58:43', '2019-05-09 01:58:43'),
(48, 1, 130, 2019, '<p>Thiếp -&nbsp; một thiếu nữ ng&acirc;y thơ kh&ocirc;ng hiểu chuyện đời</p>\r\n\r\n<p>Ch&agrave;ng - một thiếu ni&ecirc;n lạnh l&ugrave;ng thoi th&oacute;p hơi t&agrave;n bị v&ugrave;i dưới tuyết</p>\r\n\r\n<p>Buổi đầu gặp gỡ ấy, chẳng ai đo&aacute;n trước được sau n&agrave;y m&igrave;nh sẽ c&oacute; vai tr&ograve; thế n&agrave;o trong cuộc đời nhau.</p>\r\n\r\n<p>Ch&uacute;ng ta kh&ocirc;ng tin v&agrave;o vận mệnh, song lại chẳng c&oacute; sức để phản kh&aacute;ng sự thao t&uacute;ng của vận mệnh.</p>\r\n\r\n<p>Vậy nhưng, d&ugrave; c&otilde;i nh&acirc;n gian đều coi ch&agrave;ng l&agrave; kẻ địch, thiếp vẫn chẳng ch&uacute;t hối hận khi s&aacute;nh bước b&ecirc;n ch&agrave;ng.</p>', '14.5 x 20.5 cm', '300', '2019-02-20', '2019-05-09 01:59:16', '2019-05-09 01:59:16'),
(49, 1, 110, 2018, '<p>Ngay trong năm đầu ti&ecirc;n ph&aacute;t h&agrave;nh - 1960, Sự trỗi dậy v&agrave; suy t&agrave;n của Đế chế thứ ba đ&atilde; b&aacute;n được tới 1 triệu bản tại Mỹ v&agrave; được t&aacute;i bản hơn 20 lần. Cuốn s&aacute;ch l&agrave; bản tường thuật hết sức chi tiết về nước Đức, dưới sự cai trị của Adolf Hitler v&agrave; Đảng Quốc x&atilde;. T&aacute;c giả đ&atilde; nghi&ecirc;n cứu kĩ lưỡng về sự ra đời của Đế chế thứ ba ở Đức, con đường dẫn đến quyền lực tuyệt đối của Đảng Quốc x&atilde;, diễn biến của Chiến tranh thế giới lần thứ hai v&agrave; sự thất bại của Ph&aacute;t x&iacute;t Đức. Nguồn t&agrave;i liệu của cuốn s&aacute;ch bao gồm lời khai của c&aacute;c nh&agrave; l&atilde;nh đạo Đảng Quốc x&atilde;, nhật k&iacute; của c&aacute;c quan chức, c&ugrave;ng h&agrave;ng loạt c&aacute;c qu&acirc;n lệnh v&agrave; thư mật. Sự trỗi dậy v&agrave; suy t&agrave;n của Đế chế thứ ba l&agrave; một trong những c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu lịch sử quan trọng nhất, n&oacute;i về một trong những giai đoạn u &aacute;m nhất của lịch sử lo&agrave;i người.</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:01:02', '2019-05-09 02:01:02'),
(49, 1, 110, 2018, '<p>Bộ truyện&nbsp;<strong>&ldquo;B&aacute;c sĩ ph&aacute;p y Tần Minh&rdquo;</strong>&nbsp;được ch&iacute;nh tay b&aacute;c sĩ ph&aacute;p y Tần Minh (c&ugrave;ng t&ecirc;n) viết. &Ocirc;ng c&oacute; nhiều năm kinh nghiệm trong nghề ph&aacute;p y v&agrave; mỗi c&acirc;u chuyện &ocirc;ng viết đều lấy từ chất liệu thực tế trong nghề của &ocirc;ng. Bộ truyện viết về h&agrave;nh tr&igrave;nh ph&aacute; &aacute;n dựa tr&ecirc;n chứng cứ ph&aacute;p y khoa học, thuyết phục&nbsp; của b&aacute;c sĩ ph&aacute;p y Tần Minh v&agrave; đồng nghiệp. Kết cấu mỗi tập l&agrave; 1 vụ &aacute;n ch&iacute;nh xuy&ecirc;n suốt (kẻ s&aacute;t nh&acirc;n thường l&agrave; kẻ s&aacute;t nh&acirc;n h&agrave;ng loạt) v&agrave; đan xen l&agrave; c&aacute;c vụ &aacute;n nhỏ kh&aacute;c, cuối mỗi vụ &aacute;n l&agrave; những ph&uacute;t lắng l&ograve;ng, trăn trở, suy tư của nh&acirc;n vật t&ocirc;i. Đồng thời, qua bộ truyện n&agrave;y người đọc cũng thấu nỗi vất vả, cũng như l&ograve;ng y&ecirc;u nghề, tận t&acirc;m với nghề của c&aacute;c b&aacute;c sĩ ph&aacute;p y.</p>\r\n\r\n<p><strong>&ldquo;Người sống s&oacute;t&rdquo;</strong>&nbsp;l&agrave; tập thứ 5 trong bộ truyện&nbsp;<strong>&ldquo;B&aacute;c sĩ ph&aacute;p y Tần Minh&rdquo;</strong>&nbsp;kể về chuỗi những &aacute;n mạng song song xảy ra tr&ecirc;n 2 địa b&agrave;n kh&aacute;c nhau, c&oacute; thời gian s&iacute;t so&aacute;t nhau, c&aacute;c nạn nh&acirc;n ở mỗi vụ &aacute;n song song c&oacute; c&ugrave;ng chung 1 đặc điểm (c&ugrave;ng l&agrave; c&ocirc; d&acirc;u, c&ugrave;ng l&agrave; trẻ em, hoặc c&ugrave;ng l&agrave; người gi&agrave; neo đơn&hellip;). Hung thủ l&agrave; ai? Đang trốn ở gầm trời n&agrave;o?</p>\r\n\r\n<p>Truyện khởi đầu bằng hai đ&aacute;m cưới đẫm m&aacute;u dường như kh&ocirc;ng c&oacute; điểm chung, nhưng c&aacute;c nạn nh&acirc;n đều l&agrave; những c&ocirc; d&acirc;u c&oacute; c&ugrave;ng độ tuổi v&agrave; danh t&iacute;nh của kẻ giết người bỏ lại ph&iacute;a sau h&igrave;nh dạng in gi&agrave;y, k&iacute;ch thước, dấu v&acirc;n tay, dấu ch&acirc;n một c&aacute;ch ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một kẻ giết người t&acirc;m thần ph&acirc;n liệt? Hai hay nhiều người phạm tội?</p>\r\n\r\n<p>L&agrave; một sự bắt chước? Hoặc l&agrave; một cuộc th&aacute;ch đố thể thỏa m&atilde;n bản th&acirc;n?</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:02:12', '2019-05-09 02:02:12'),
(50, 1, 110, 2018, '<p>Bộ truyện&nbsp;<strong>&ldquo;B&aacute;c sĩ ph&aacute;p y Tần Minh&rdquo;</strong>&nbsp;được ch&iacute;nh tay b&aacute;c sĩ ph&aacute;p y Tần Minh (c&ugrave;ng t&ecirc;n) viết. &Ocirc;ng c&oacute; nhiều năm kinh nghiệm trong nghề ph&aacute;p y v&agrave; mỗi c&acirc;u chuyện &ocirc;ng viết đều lấy từ chất liệu thực tế trong nghề của &ocirc;ng. Bộ truyện viết về h&agrave;nh tr&igrave;nh ph&aacute; &aacute;n dựa tr&ecirc;n chứng cứ ph&aacute;p y khoa học, thuyết phục&nbsp; của b&aacute;c sĩ ph&aacute;p y Tần Minh v&agrave; đồng nghiệp. Kết cấu mỗi tập l&agrave; 1 vụ &aacute;n ch&iacute;nh xuy&ecirc;n suốt (kẻ s&aacute;t nh&acirc;n thường l&agrave; kẻ s&aacute;t nh&acirc;n h&agrave;ng loạt) v&agrave; đan xen l&agrave; c&aacute;c vụ &aacute;n nhỏ kh&aacute;c, cuối mỗi vụ &aacute;n l&agrave; những ph&uacute;t lắng l&ograve;ng, trăn trở, suy tư của nh&acirc;n vật t&ocirc;i. Đồng thời, qua bộ truyện n&agrave;y người đọc cũng thấu nỗi vất vả, cũng như l&ograve;ng y&ecirc;u nghề, tận t&acirc;m với nghề của c&aacute;c b&aacute;c sĩ ph&aacute;p y.</p>\r\n\r\n<p><strong>&ldquo;Người sống s&oacute;t&rdquo;</strong>&nbsp;l&agrave; tập thứ 5 trong bộ truyện&nbsp;<strong>&ldquo;B&aacute;c sĩ ph&aacute;p y Tần Minh&rdquo;</strong>&nbsp;kể về chuỗi những &aacute;n mạng song song xảy ra tr&ecirc;n 2 địa b&agrave;n kh&aacute;c nhau, c&oacute; thời gian s&iacute;t so&aacute;t nhau, c&aacute;c nạn nh&acirc;n ở mỗi vụ &aacute;n song song c&oacute; c&ugrave;ng chung 1 đặc điểm (c&ugrave;ng l&agrave; c&ocirc; d&acirc;u, c&ugrave;ng l&agrave; trẻ em, hoặc c&ugrave;ng l&agrave; người gi&agrave; neo đơn&hellip;). Hung thủ l&agrave; ai? Đang trốn ở gầm trời n&agrave;o?</p>\r\n\r\n<p>Truyện khởi đầu bằng hai đ&aacute;m cưới đẫm m&aacute;u dường như kh&ocirc;ng c&oacute; điểm chung, nhưng c&aacute;c nạn nh&acirc;n đều l&agrave; những c&ocirc; d&acirc;u c&oacute; c&ugrave;ng độ tuổi v&agrave; danh t&iacute;nh của kẻ giết người bỏ lại ph&iacute;a sau h&igrave;nh dạng in gi&agrave;y, k&iacute;ch thước, dấu v&acirc;n tay, dấu ch&acirc;n một c&aacute;ch ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một kẻ giết người t&acirc;m thần ph&acirc;n liệt? Hai hay nhiều người phạm tội?</p>\r\n\r\n<p>L&agrave; một sự bắt chước? Hoặc l&agrave; một cuộc th&aacute;ch đố thể thỏa m&atilde;n bản th&acirc;n?</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:02:27', '2019-05-09 02:02:27'),
(51, 1, 110, 2018, '<p>Sức mạnh của cuốn s&aacute;ch n&agrave;y l&agrave; c&oacute; thể cuốn h&uacute;t cả trẻ con cũng như người lớn. Trẻ con th&igrave; thấy giống qu&aacute;, người lớn th&igrave; thấy nhớ qu&aacute;...</p>\r\n\r\n<p>Một cuốn s&aacute;ch nặng, d&agrave;y hơn 400 trang -kể ra l&agrave; một th&aacute;ch thức kh&ocirc;ng nhỏ trong thời buổi con người ta đang bị cuốn v&agrave;o những lo toan kinh tế thường nhật. Nhưng nếu bạn đ&atilde; lướt qua h&igrave;nh ảnh một ch&uacute; nh&oacute;c thoạt đầu đ&atilde; thấy si&ecirc;u quậy tr&ecirc;n trang b&igrave;a, lại chăm ch&uacute; trước hai c&aacute;i t&ecirc;n Goscinny v&agrave; Semp&eacute;. Nhất l&agrave; Goscinny, người đ&atilde; s&aacute;ng tạo ra Lucky Luke, những cuộc phi&ecirc;u lưu của Ast&eacute;rix...</p>\r\n\r\n<p>Tr&ograve; hờn dỗi lu&ocirc;n được nh&oacute;c Nicolas g&agrave;o l&ecirc;n ở mọi l&uacute;c, mọi nơi khi n&oacute; gặp phải chuyện g&igrave; kh&ocirc;ng vừa &yacute;. Từ việc l&agrave;n da đỏ au khi đi biển về kh&ocirc;ng kiếm đ&acirc;u bạn th&acirc;n để ngắm, lần đầu ti&ecirc;n ăn cơm ở trường cảm gi&aacute;c đ&aacute;ng sợ l&agrave;m sao, phải l&agrave;m b&agrave;i tập số học kinh ho&agrave;ng đến thế n&agrave;o, v&igrave; điểm &ldquo;Kh&ocirc;ng&rdquo; m&ocirc;n Ngữ ph&aacute;p n&ecirc;n bị cấm xem phim... cho tới h&ocirc;m b&agrave;i ch&iacute;nh tả &iacute;t lỗi nhất lớp kh&ocirc;ng được bố mẹ xem x&eacute;t nghi&ecirc;m chỉnh. Nh&oacute;c Nicolas lặp m&atilde;i b&agrave;i ca: Nếu cứ bị mọi người &eacute;p sẽ ph&aacute;t ch&aacute;n m&agrave; bỏ nh&agrave; ra đi, sẽ bị chết v&agrave; cả nh&agrave; tha hồ m&agrave; thương tiếc...</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:06:02', '2019-05-09 02:06:02'),
(52, 1, 110, 2018, '<p>Kaizaki Arata, 27 tuổi, thất nghiệp, ch&aacute;n nản với cuộc đời. T&igrave;nh cờ trong một lần say xỉn, anh trở th&agrave;nh đối tượng th&iacute; nghiệm của dự &aacute;n mang t&ecirc;n&nbsp;ReLIFE, bị thu nhỏ về h&igrave;nh dạng của một học sinh cao trung 17 tuổi, từ đ&oacute; bắt đầu h&agrave;nh tr&igrave;nh học lại kỹ năng sống, l&agrave;m lại cuộc đời.</p>\r\n\r\n<p><strong>Giới thiệu T&aacute;c giả - Họa sĩ:</strong></p>\r\n\r\n<p><strong>YAYOISO &ndash;&nbsp;</strong>T&aacute;c giả c&oacute; lượng view cao nhất web đọc truyện online COMICO, với t&aacute;c phẩm đ&atilde; được chuyển thể th&agrave;nh phim hoạt h&igrave;nh, phim điện ảnh v&agrave; tiểu thuyết.</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:06:30', '2019-05-09 02:06:30'),
(53, 1, 110, 2018, '<p>Tiếp nối th&agrave;nh c&ocirc;ng của cuốn s&aacute;ch vạn bản in NHỮNG MẢNH GH&Eacute;P CUỘC ĐỜI (PIECES OF YOU), Tablo tiếp tục cuộc hội ngộ với độc giả Việt Nam qua cuốn s&aacute;ch đặc biệt được h&agrave;ng triệu fan h&acirc;m mộ mong chờ c&oacute; t&ecirc;n BLONOTE.</p>\r\n\r\n<p>Tablo (Epik High) đ&atilde; bi&ecirc;n soạn một cuốn s&aacute;ch theo c&aacute;ch rất th&ocirc;ng minh v&agrave; s&acirc;u sắc c&oacute; t&ecirc;n &quot;Blonote&quot;, trong đ&oacute; gồm những tấm thẻ nhỏ k&egrave;m với d&ograve;ng ghi ch&uacute; m&agrave; rapper đọc cho người nghe đ&agrave;i của m&igrave;nh trong chương tr&igrave;nh ph&aacute;t thanh c&aacute; nh&acirc;n &quot;Dreaming With Tablo&quot;. C&aacute;c d&ograve;ng note kể về những ho&agrave;i niệm v&agrave;o những ng&agrave;y kh&aacute;c nhau của anh, cũng như chữ viết tay từ những nghệ sĩ nổi tiếng kh&aacute;c như G- Dragon, Gong Hyo Jin, Lee Sung Kyung,...</p>\r\n\r\n<p>Nhiều người vốn đ&atilde; qu&aacute; quen thuộc với một Tablo gai g&oacute;c, c&aacute; t&iacute;nh qua những ca kh&uacute;c mang nhiều th&ocirc;ng điệp cổ vũ lối suy nghĩ t&iacute;ch cực. Nhưng trong những trang văn của m&igrave;nh, anh lại thể hiện một kh&iacute;a cạnh kh&aacute;c của t&acirc;m hồn với những g&oacute;c s&aacute;ng tối mu&ocirc;n m&agrave;u của cuộc sống c&ugrave;ng với những h&igrave;nh ảnh ẩn dụ &yacute; nghĩa, c&oacute; chiều s&acirc;u v&agrave; đề cao t&iacute;nh tư duy.</p>\r\n\r\n<p>Như trong những trang viết mở đầu cuốn s&aacute;ch Tablo viết:</p>\r\n\r\n<p>&ldquo;Đ&acirc;y l&agrave; những cảm nghĩ bất chợt thay cho lời ch&agrave;o tạm biệt cuối mỗi chương tr&igrave;nh ph&aacute;t thanh đ&ecirc;m khuya m&agrave; t&ocirc;i chủ tr&igrave;. Những c&acirc;u văn n&agrave;y kh&ocirc;ng cố tỏ ra l&agrave; phần mở đầu hay kết th&uacute;c của bất kỳ &yacute; tưởng lớn lao n&agrave;o nhưng t&ocirc;i mong rằng ch&uacute;ng sẽ l&agrave; xuất ph&aacute;t điểm của một nguồn cảm hứng v&agrave; l&agrave; nơi kết th&uacute;c của mỗi nỗi niềm trăn trở. H&atilde;y đặt cuốn s&aacute;ch n&agrave;y ở một nơi bạn c&oacute; thể dễ d&agrave;ng chạm tới mỗi khi thấy canh c&aacute;nh trong l&ograve;ng.&rdquo;</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:06:54', '2019-05-09 02:06:54'),
(54, 1, 110, 2018, '<p>&ldquo;Tốt nhất l&agrave; kh&ocirc;ng gặp, kh&ocirc;ng gặp sẽ kh&ocirc;ng y&ecirc;u.</p>\r\n\r\n<p>Tốt nhất kh&ocirc;ng quen, kh&ocirc;ng quen sẽ kh&ocirc;ng nhớ.</p>\r\n\r\n<p>Nhưng từng gặp th&igrave; sẽ quen, gặp hay kh&ocirc;ng gặp kh&aacute;c g&igrave; nhau?</p>\r\n\r\n<p>Đ&agrave;nh c&ugrave;ng người quyết đoạn tuyệt, tr&aacute;nh được thương nhớ giữa sống chết.&rdquo;</p>\r\n\r\n<p>Nếu biết c&ograve;n 7 ng&agrave;y để sống, t&ocirc;i sẽ&hellip;&hellip;&hellip;</p>\r\n\r\n<p>Đ&atilde; bao giờ bạn tưởng tượng bạn sẽ được b&aacute;o trước 7 ng&agrave;y nữa m&igrave;nh sẽ chết?</p>\r\n\r\n<p>Nghe thật buồn cười nhưng một ng&agrave;y như thế sẽ l&agrave;m bạn phải suy nghĩ lại chứ?</p>\r\n\r\n<p>Những lời n&agrave;o bạn muốn n&oacute;i</p>\r\n\r\n<p>Người n&agrave;o bạn muốn gặp gỡ</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:07:35', '2019-05-09 02:07:35'),
(55, 1, 110, 2018, '<p>Cổ vật trong&nbsp;&Aacute; X&aacute;, mỗi một vật đều c&oacute; c&acirc;u chuyện của ri&ecirc;ng m&igrave;nh, cất giữ rất nhiều năm, chẳng ai lắng nghe.</p>\r\n\r\n<p>Bởi v&igrave;,&nbsp;ch&uacute;ng đều kh&ocirc;ng biết n&oacute;i&hellip;</p>\r\n\r\n<p>Sơn Hải Kinh</p>\r\n\r\n<p>Một chiếc thẻ tre gi&ograve;n yếu đến mức kh&ocirc;ng chịu nổi một c&uacute; va chạm nhưng lại phong ấn ma th&uacute; lớn mạnh từ thời viễn cổ.</p>\r\n\r\n<p>Ngọc Thủy Hương</p>\r\n\r\n<p>Một miếng tượng ch&uacute;a c&oacute; thể trao đổi linh hồn giữa hai người, khiến thế giới của họ ho&agrave;n to&agrave;n đảo lộn.</p>\r\n\r\n<p>Rối m&ecirc; hoặc</p>\r\n\r\n<p>Một con rối gỗ mang theo t&igrave;nh y&ecirc;u hai ngh&igrave;n năm, biến h&oacute;a ra thế giới m&agrave; chủ nh&acirc;n mong muốn.</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:07:54', '2019-05-09 02:07:54'),
(56, 1, 110, 2018, '<p>Sự kiện đầu ti&ecirc;n sau khi Triển Chi&ecirc;u v&agrave; Bạch Ngọc Đường th&agrave;nh th&acirc;n!</p>\r\n\r\n<p>Hai người trở về từ tuần trăng mật tr&ecirc;n H&atilde;m Kh&ocirc;ng Đảo, đ&uacute;ng l&uacute;c gặp phải vụ &aacute;n phủ do&atilde;n Th&agrave;nh Đ&ocirc; l&agrave; Hạ Ch&iacute;nh tham &ocirc;.</p>\r\n\r\n<p>Bao đại nh&acirc;n v&agrave; Triệu Phổ phụng mệnh vi h&agrave;nh điều tra, mi&ecirc;u thử v&agrave; C&ocirc;ng T&ocirc;n ti&ecirc;n sinh đương nhi&ecirc;n cũng phải theo c&ugrave;ng.</p>\r\n\r\n<p>Nhưng kh&ocirc;ng ngờ c&ograve;n chưa đến Thục Trung, đ&atilde; nghe được c&acirc;u chuyện ma mị về m&egrave;o Ngũ Mệnh.</p>\r\n\r\n<p>Chưa hết, trong qu&aacute; tr&igrave;nh điều tra, bọn họ kh&ocirc;ng chỉ ph&aacute;t hiện Hạ Ch&iacute;nh cấu kết với ngoại tộc, m&agrave; trong phủ c&ograve;n c&oacute; một bộ tộc kỳ dị được xưng l&agrave; &quot;dạ h&agrave;nh giả&quot; tụ tập.</p>\r\n\r\n<p>Nghe n&oacute;i c&aacute;c dạ h&agrave;nh giả n&agrave;y sợ &aacute;nh nắng, h&uacute;t m&aacute;u m&agrave; sống, sinh hoạt hỗn loạn hoang đường, hơn nữa c&ograve;n trẻ m&atilde;i kh&ocirc;ng gi&agrave;, trường sinh bất l&atilde;o!</p>\r\n\r\n<p>Để điều tra ch&acirc;n tướng, đương nhi&ecirc;n Triển Chi&ecirc;u v&agrave; Bạch Ngọc Đường ti&ecirc;n phong th&acirc;m nhập.</p>\r\n\r\n<p>C&aacute;ch tốt nhất hiển nhi&ecirc;n l&agrave; ngụy trang th&agrave;nh một &quot;dạ h&agrave;nh giả&quot;!</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:08:19', '2019-05-09 02:08:19'),
(57, 1, 110, 2018, '<p>&ldquo;C&oacute; những ng&agrave;y d&agrave;i thật buồn, b&oacute; gối trong căn ph&ograve;ng nhỏ, nh&igrave;n ra bầu trời cao rộng ngo&agrave;i kia, t&ocirc;i lu&ocirc;n mang trong m&igrave;nh suy nghĩ bầu trời ấy kh&ocirc;ng c&oacute; chỗ d&agrave;nh cho t&ocirc;i. T&ocirc;i lu&ocirc;n tự hỏi &ldquo;M&igrave;nh muốn l&agrave;m g&igrave;?&rdquo;, &ldquo;M&igrave;nh phải l&agrave;m g&igrave;?&rdquo;, &ldquo;M&igrave;nh cố gắng v&igrave; điều g&igrave;?&rdquo;,&hellip;&rdquo;</p>\r\n\r\n<p>Ch&uacute;ng ta, ai cũng từng trải qua những ng&agrave;y như thế. Đ&oacute; l&agrave; qu&atilde;ng thời gian ta cứ quẩn quanh đ&acirc;y đ&oacute; t&igrave;m kiếm c&acirc;u trả lời m&igrave;nh l&agrave; ai, m&igrave;nh thực sự muốn g&igrave;. Giữa những ch&ocirc;ng ch&ecirc;nh của tuổi trẻ, khi đứng giữa qu&aacute; nhiều ng&atilde; rẽ, ch&uacute;ng ta&nbsp; bắt buộc phải đưa ra một sự lựa chọn cho ri&ecirc;ng m&igrave;nh. Con đường n&agrave;o cũng hấp dẫn, cũng mời gọi, nhưng cũng đầy thử th&aacute;ch v&agrave; ch&ocirc;ng gai.</p>\r\n\r\n<p>Đừng l&atilde;ng ph&iacute; những ng&agrave;y đẹp trời l&agrave; cuốn s&aacute;ch viết về những năm th&aacute;ng thanh xu&acirc;n đầy hoang mang, khi t&acirc;m tr&iacute; ta lấp đầy bởi những c&acirc;u hỏi cần lời giải đ&aacute;p. Nhưng ngo&agrave;i những ng&agrave;y &acirc;m u, tuổi thanh xu&acirc;n của ch&uacute;ng ta l&agrave; &ldquo;những ng&agrave;y đẹp trời, những ng&agrave;y c&otilde;i l&ograve;ng an y&ecirc;n đến lạ; những ng&agrave;y m&agrave; đến cả nỗi buồn, sự c&ocirc; đơn, cũng trở n&ecirc;n thật đẹp.&rdquo; D&ugrave; những ng&agrave;y sau bạn th&agrave;nh c&ocirc;ng, vi&ecirc;n m&atilde;n đến chừng n&agrave;o, th&igrave; những năm th&aacute;ng hai mươi cũng l&agrave; qu&atilde;ng thời gian đẹp đẽ nhất, đ&aacute;ng nhớ nhất trong cuộc đời.</p>\r\n\r\n<p>C&oacute; thể ngay l&uacute;c n&agrave;y đ&acirc;y, bạn muốn nhanh thật nhanh bước ra khỏi tuổi trẻ của m&igrave;nh, để trưởng th&agrave;nh hơn, để c&oacute; trong tay nhiều thứ hơn. Nhưng đừng vội v&atilde;, đừng l&atilde;ng ph&iacute; những ng&agrave;y đẹp trời đ&oacute;, bởi tuổi trẻ tr&ocirc;i qua, ta sẽ trưởng th&agrave;nh.</p>\r\n\r\n<p>&ldquo;Thanh xu&acirc;n l&agrave; một lần đi xa m&atilde;i kh&ocirc;ng về.</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:08:43', '2019-05-09 02:08:43'),
(58, 1, 110, 2018, '<p><strong>&ldquo;Chiến tranh tiền tệ&rdquo;</strong>&nbsp;gi&uacute;p ch&uacute;ng ta hiểu nhiều điều, rằng Bill Gates chưa phải l&agrave; người gi&agrave;u nhất h&agrave;nh tinh, rằng tỉ lệ tử vong của c&aacute;c tổng thống Mỹ lại cao hơn tỉ lệ tử trận của binh l&iacute;nh Mỹ ngo&agrave;i chiến trường, hay v&igrave; sao phố Wall lại mạo hiểm đổ hết vốn liếng của m&igrave;nh cho việc &ldquo;đầu tư&rdquo; v&agrave;o Hitler.</p>\r\n\r\n<p><strong>&ldquo;Chiến tranh tiền tệ&rdquo;</strong>&nbsp;đề cập đến một cuộc chiến khốc liệt, kh&ocirc;ng khoan nhượng v&agrave; dai dẳng giữa một nh&oacute;m nhỏ c&aacute;c &ocirc;ng tr&ugrave;m t&agrave;i ch&iacute;nh - đứng đầu l&agrave; gia tộc Rothschild - với c&aacute;c thể chế t&agrave;i ch&iacute;nh kinh tế của nhiều quốc gia. Đ&oacute; l&agrave; một cuộc chiến m&agrave; đồng tiền l&agrave; s&uacute;ng đạn v&agrave; mức s&aacute;t thương thật l&agrave; gh&ecirc; gớm. Một cuốn s&aacute;ch thực sự l&agrave;m sửng sốt với những ai muốn t&igrave;m hiểu về bản chất tiền tệ để từ đ&oacute; nhận ra những hiểm hoạ t&agrave;i ch&iacute;nh tiềm ẩn nhằm chuẩn bị t&acirc;m l&yacute;</p>\r\n\r\n<p>cho một cuộc chiến tiền tệ &ldquo;kh&ocirc;ng đổ m&aacute;u&rdquo;.</p>\r\n\r\n<p>B&ecirc;n cạnh việc phơi b&agrave;y những &acirc;m mưu của c&aacute;c nh&agrave; t&agrave;i phiệt thế giới trong việc tạo ra những cơn &ldquo;hạn h&aacute;n&rdquo; hay &ldquo;b&atilde;o lũ&rdquo; về tiền tệ để thu lợi nhuận, cuốn s&aacute;ch cũng đề cập đến sự ph&aacute;t triển của c&aacute;c định chế t&agrave;i ch&iacute;nh thế giới - những cơ cấu được x&acirc;y dựng nhằm đ&aacute;p ứng nhu cầu ph&aacute;t triển vũ b&atilde;o của nền kinh tế to&agrave;n cầu.</p>', '14.5 x 20.5 cm', '320', '2018-04-20', '2019-05-09 02:09:08', '2019-05-09 02:09:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tendanhmuc` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhdaidien` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `anhdaidien`, `thutu`, `created_at`, `updated_at`) VALUES
(1, 'Nổi bật', 'dm_notimg.jpg', 1, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(2, 'Sách kinh tế', 'dm_kinhte.jpg', 2, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(3, 'Văn học nước ngoài', 'dm_vhnuocngoai.jpg', 3, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(4, 'Văn học trong nước', 'dm_vhtrongnuoc.jpg', 4, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(5, 'Sách kĩ năng sống', 'dm_kinnangsong.jpg', 5, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(6, 'Sách tuổi teen', 'dm_tuoiteen.jpg', 6, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(7, 'Học Ngoại Ngữ', 'dm_ngoaingu.jpg', 7, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(8, 'Sách thiếu nhi', 'dm_thieunhi.jpg', 8, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(9, 'Thưởng thức đời sống', 'dm_thuongthucdoisong.jpg', 9, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(10, 'Sách chuyên nghành', 'dm_chuyennghanh.jpg', 10, '2019-04-09 03:43:57', '2019-04-09 03:43:57'),
(11, 'Văn phòng phẩm', 'qua-tang__16149.jpg', 11, '2019-04-09 03:43:57', '2019-04-22 14:28:29'),
(12, 'Công ty phát hành', 'dm_notimg.jpg', 12, '2019-04-09 03:43:57', '2019-04-09 03:43:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_khachhang` smallint(5) UNSIGNED NOT NULL,
  `tongtien` double(8,2) NOT NULL,
  `phuongthucthanhtoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`id`, `id_khachhang`, `tongtien`, `phuongthucthanhtoan`, `hoten`, `gioitinh`, `email`, `diachi`, `sodienthoai`, `ghichu`, `created_at`, `updated_at`) VALUES
(3, 1, 108000.00, 'COD', 'Lưu Tùng Dương', 'nam', 'luutungduong1411@gmail.com', 'Đông Kết', '0326347291', 'Bưu điện xã đông kết', '2019-05-07 17:05:18', '2019-05-09 03:34:29'),
(5, 1, 180000.00, 'COD', 'Đỗ Như Biên', 'nam', 'donhubien@gmail.com', 'Khoái Châu', '0326347291', 'Đóng gói cẩn thận', '2019-05-07 19:05:00', '2019-05-08 08:03:04'),
(6, 13, 229620.00, 'COD', 'Lưu Tùng Dương', 'nam', 'luutungduong1411@gmail.com', 'Khoái Châu', '0326347291', 'abc', '2019-05-08 09:40:16', '2019-05-08 09:40:16'),
(8, 1, 87200.00, 'COD', 'lưu tùng dương', 'nam', 'luutungduong1411@gmail.com', 'khoái châu', '0326347291', 'note', '2019-05-09 07:51:24', '2019-05-09 07:51:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten`, `username`, `password`, `sdt`, `diachi`, `mail`, `created_at`, `updated_at`) VALUES
(1, 'Lưu Tùng Dương', 'duong1998', '$2y$10$oRf5FGfFybfCar5ofeYRe.pv0VNbxtWUGQn36lfryBCaRxcbAx9jK', '0326347291', 'Khoái Châu-Hưng Yên', 'luutungduong1411@gmail.com', NULL, '2019-05-09 04:25:20'),
(4, 'Nguyễn Huy Hoài Nam', 'nguyenhuyhoainam', '$2y$10$wY8/uAS0EPuGuaYC9fwqcO89Cvq2KZiKzchXTrqqoF07ftQc9X9yW', '0326347294', 'Vĩnh phúc', 'namvp@gmail.com', NULL, '2019-04-22 06:01:45'),
(6, 'Hà Ngọc Anh', 'hangocanh', '$2y$10$6GQpiXwFPAnqbc5UqNTVtuUBIQEK/b28uPQMWm2mAsBhGd1nCSIlC', '0326347296', 'Mỹ Hào-Hưng Yên', 'hangocanh@gmail.com', NULL, NULL),
(7, 'Lê Ngọc Anh', 'lengocanh', '$2y$10$po/0iaDmuuAt.AaL08qdSO0vIWO8186VgH3Q9pBCdGWVUFYou/C8q', '0326347297', 'Khoái Châu-Hưng Yên', 'lengocanh@gmail.com', NULL, NULL),
(8, 'Nguyễn Thị Đào', 'nguyenthidao', '$2y$10$CDQiE6KZS7U1cRp5bBqnUeN9D91SSNhp70XK0/lA1jveNTaFK0LXO', '0326347298', 'Văn Giang-Hưng Yên', 'nguyenthidao@gmail.com', NULL, NULL),
(9, 'Trần Chí Doãn', 'trantridoan', '$2y$10$OXrETK56ss8nmA7d/0VwOeDQidSENzlRv0DP8LwSXRH72Yzizt2LO', '0326347299', 'Văn Lâm-Hưng Yên', 'trantridoan@gmail.com', NULL, NULL),
(10, 'Đào Thị Duyên', 'daothiduyen', '$2y$10$OG4LBILezjdYeXJUxoa7L.CuG6T7PqyHNvvz3HEHoTfXxw1hmEHDS', '0326347210', 'Khoái Châu-Hưng Yên', 'daothiduyen@gmail.com', NULL, NULL),
(12, 'Đỗ Như Biên', 'donhubien', '$2y$10$zLdnCgOK0otQRQDCPMTDAOTczYfBw7pVxHjA9kxHjQy.VZeLeRSjm', '0326347291', 'Khoái Châu-Hưng Yên', 'donhubien@gmail.com', NULL, NULL),
(13, 'Nguyen văn a', 'nguyenvana', '$2y$10$i.l.lgHYGYrC9WpsO.ZdFethD0mDUfYCHMnRQdIKxEhqX0uSpJK4C', '0326347291', 'Hưng Yên', 'nguyenvana@gmail.com', '2019-05-08 08:33:03', '2019-05-08 08:33:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiquangcao`
--

CREATE TABLE `loaiquangcao` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `tenloaiquangcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiquangcao`
--

INSERT INTO `loaiquangcao` (`id`, `tenloaiquangcao`, `created_at`, `updated_at`) VALUES
(1, 'slide', '2019-04-10 14:35:40', '2019-04-10 14:35:40'),
(2, 'Quảng cáo sản phẩm', '2019-04-10 14:35:40', '2019-04-10 14:35:40'),
(3, 'Quảng cáo cho thương hiệu', '2019-04-10 14:35:40', '2019-04-10 14:35:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `madanhmuc` tinyint(3) UNSIGNED NOT NULL,
  `tenloai` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhbia` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`id`, `madanhmuc`, `tenloai`, `anhbia`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sách bán chạy', 'sachbanchay.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(2, 1, 'Sách mới', 'sachmoi.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(3, 1, 'Sắp phát hành', 'sapphathanh.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(4, 1, 'Sách giảm giá', 'sachgiamgia.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(5, 2, 'Tài chính - Kế toán', 'taichinhketoan.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(6, 2, 'Quản Trị - Lãnh đạo', 'quantrilanhdao.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(7, 2, 'Marketing - Bán hàng', 'marketing.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(8, 2, 'Kỹ năng làm việc', 'kynanglamviec.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(9, 2, 'Kinh tế học', 'kinhtehoc.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(10, 2, 'Khởi nghiệp', 'khoinghiep.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(11, 2, 'Danh nhân - Tập đoàn', 'doanhnhantapdoan.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(12, 2, 'Bài học kinh doanh', 'baihockinhdoanh.jpg', '2019-04-10 13:46:51', '2019-04-10 13:46:51'),
(13, 3, 'Tiểu sử - Hồi ký', 'hoiky.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(14, 3, 'Truyện lịch sử - Kiếm hiệp', 'kiemhiep.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(15, 3, 'Truyện ngắn - Tản văn', 'truyenngan.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(16, 3, 'Tác phẩm kinh điển', 'kinhdien.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(17, 3, 'Huyền bí - Giả tưởng', 'giatuong.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(18, 3, 'Truyện trinh thám - Kinh dị', 'kinhdi.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(19, 3, 'Tiểu thuyết tình cảm - Lãng mạn', 'langman.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(20, 3, 'Tiểu thuyết đam mỹ', 'tieuthuyetdammy.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(21, 3, 'Bách hợp', 'bachhop.jpg', '2019-04-10 13:56:11', '2019-04-10 13:56:11'),
(31, 4, 'Tiểu thuyết', 'tieuthuyet.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(32, 4, 'Truyện ngắn - Tản văn', 'tanvan.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(33, 4, 'Huyền bí - Giả tưởng', 'huyenbi.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(34, 4, 'Phóng sự - Ký sự', 'kysu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(35, 4, 'Trinh thám - Kinh dị', 'trinhtham.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(36, 4, 'Tiểu sử - Hồi ký', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(37, 5, 'Kĩ năng sống', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(38, 5, 'Nghệ thuật sống đẹp', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(39, 6, 'Văn học teen', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(40, 6, 'Hướng nghiệp - Kỹ năng', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(41, 6, 'Light Novel', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(42, 6, 'Truyện tranh', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(43, 7, 'Từ điển', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(44, 7, 'Sách học tiếng Anh', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(45, 7, 'Sách học tiếng Hoa', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(46, 7, 'Sách học tiếng Nhật', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(47, 8, 'Truyện cổ tích - Thần thoại', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(48, 8, 'Vừa học vừa chơi', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(49, 8, 'Kiến thức - Kĩ năng', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(50, 8, 'Văn học', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(51, 8, 'Truyện kể cho bé', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(52, 9, 'Văn hóa - Du lịch', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(53, 9, 'Chăm sóc sức khỏe', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(54, 9, 'Phong thủy - Nhà cửa', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(55, 9, 'Nấu ăn', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(56, 9, 'Giải trí - Thể thao', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(57, 10, 'Giáo dục', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(58, 10, 'Công nghệ thông tin', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(59, 10, 'Lịch sử - Địa lý', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(60, 10, 'Khoa học tự nhiên', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(61, 10, 'Mỹ thuật - Kiến trúc', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(62, 10, 'Chính trị - Triết học', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(63, 10, 'Doanh nhân - Người nổi tiếng', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(64, 10, 'Tâm linh - Tôn giáo', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(65, 10, 'Y Dược', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(66, 10, 'Khoa học xã hội', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(67, 11, 'Hộp bút - Bút bi', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(68, 11, 'Bình nước, bình giữ nhiệt', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38'),
(69, 11, 'Thiệp, Qùa tặng', 'tieusu.jpg', '2019-04-10 14:17:38', '2019-04-10 14:17:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2019_02_16_130744_create_table_sach_table', 2),
('2019_02_16_135105_create_table_users_table', 3),
('2019_02_16_140454_add_create_at_to_users', 4),
('2019_02_16_142101_create_users_table', 5),
('2019_04_08_224000_danhmuc', 6),
('2019_04_08_223924_nhanvien', 7),
('2019_04_08_223841_khachhang', 8),
('2019_04_08_223800_tacgia', 9),
('2019_04_08_223726_ngongu', 10),
('2019_04_08_223633_nhaxuatban', 11),
('2019_04_08_224124_vanchuyen', 12),
('2019_04_08_224313_loaiquangcao', 13),
('2019_04_08_224759_phanquyen', 14),
('2019_04_08_223457_createloaisach', 15),
('2019_04_08_224036_quangcao', 16),
('2019_04_08_224451_sach', 17),
('2019_04_08_224718_rohang', 18),
('2019_04_09_090504_chitietsach', 19),
('2019_04_09_091056_tintuc', 20),
('2019_04_09_094928_rating', 21),
('2019_04_08_224359_toaikhoan', 22),
('2019_05_07_215235_dondathang', 23),
('2019_05_07_215036_chitietdonhang', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngonngu`
--

CREATE TABLE `ngonngu` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ngonngu`
--

INSERT INTO `ngonngu` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Tiếng Việt', '2019-04-09 03:50:04', '2019-04-09 03:50:04'),
(2, 'Tiếng Anh', '2019-04-09 03:50:04', '2019-04-09 03:50:04'),
(3, 'Tiếng Trung', '2019-04-09 03:50:04', '2019-04-09 03:50:04'),
(4, 'Tiếng Hàn', '2019-04-09 03:50:04', '2019-04-09 03:50:04'),
(5, 'Tiếng Nhật', '2019-04-09 03:50:04', '2019-04-09 03:50:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten`, `sdt`, `diachi`, `mail`, `gioitinh`, `chucvu`, `created_at`, `updated_at`) VALUES
(1, 'Lưu Tùng Dương', '0326347291', 'Khoái Châu-Hưng Yên', 'luutungduong1411@gmail.com', 'Nam', 'Quản lý', '2019-04-10 14:22:22', '2019-04-10 14:22:22'),
(2, 'Đỗ Như biên', '0332369291', 'Khoái Châu-Hưng Yên', 'donhubien@gmail.com', 'Nam', 'Quản lý kho', '2019-04-10 14:26:36', '2019-04-10 14:26:36'),
(3, 'Đỗ Đắc Hoàng', '0326347291', 'Khoái Châu-Hưng Yên', 'dodachoang@gmail.com', 'Nam', 'Quản lý kho', '2019-04-10 14:26:36', '2019-04-10 14:26:36'),
(4, 'Đỗ Đình Hiếu', '0326347291', 'Hưng Yên', 'dodinhieu@gmail.com', 'Nam', 'Nhân viên bán hàng', '2019-04-10 14:26:36', '2019-04-10 14:26:36'),
(5, 'Nguyễn Huy Hoài Nam', '0326347291', 'Vĩnh phúc', 'namvp@gmail.com', 'Nam', 'Quản lý kho', '2019-04-10 14:26:36', '2019-04-10 14:26:36'),
(6, 'Nguyễn Tuấn Anh', '0326347291', 'Khoái Châu-Hưng Yên', 'nguyentuananh@gmail.com', 'Nam', 'Quản lý sản phẩm', '2019-04-10 14:26:36', '2019-04-10 14:26:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tennhaxuatban` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`id`, `tennhaxuatban`, `logo`, `diachi`, `email`, `fax`, `created_at`, `updated_at`) VALUES
(1, 'Alphabooks', 'logo-alphabooks__81581.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Alphabooks@gmai.com', '04337792', '2019-04-09 03:06:44', '2019-04-09 03:06:44'),
(2, 'Amak', 'logo-amak__08040.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Amak@gmai.com', '04337792', '2019-04-09 03:06:44', '2019-04-09 03:06:44'),
(3, 'Asbooks', 'logo-asbooks__40145.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Asbooks@gmai.com', '04337792', '2019-04-09 03:06:44', '2019-04-09 03:06:44'),
(4, 'Bách Việt', 'logo-bachviet__07071.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'BachViet@gmai.com', '04337792', '2019-04-09 03:06:44', '2019-04-09 03:06:44'),
(5, 'Cẩm Phong', 'camphong__68570.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Camphong@gmai.com', '04337792', '2019-04-09 03:06:44', '2019-04-09 03:06:44'),
(6, 'Bắc Hà Books ', 'logo-bachabook__82093.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'BacHa@gmai.com', '04337792', '2019-04-09 03:06:44', '2019-04-09 03:06:44'),
(7, 'Chibooks', 'chibooks__00524.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Chibooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(8, 'Cổ Nguyệt', 'co-nguyet__27730.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'CoNguyetBooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(9, 'Dtbooks', 'dtbooks__93550.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Dtbooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(10, 'First News - Trí Việt', 'first-news-tri-viet__62371.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'TriVietbooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(11, 'Fujibooks', 'noimage.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Fujibooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(12, 'Hương Giang', 'huong-giang__04646.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'HuongGiang@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(13, 'Hương Trang', 'huong-trang__90150.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'huong-trang@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(14, 'Huy Hoàng', 'huy-hoang-book__45019.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'huy-hoang-book@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(15, 'IPM', 'ipm__74608.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'ipm_book@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(16, 'Lantabra', 'lantabra__40646.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'lantabra@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(17, 'Limbooks', 'limbooks__45149.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'limbooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(18, 'Long Minh', 'longminhbooks__48154.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'longminhbooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(19, 'Minh Châu Books', 'minh-chau__76192.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'minhchau@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(20, 'Minh Long', 'minh-long__77539.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'minhlong@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(21, 'Thái Hà', 'thai-ha__24637.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'thaihabooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(22, 'Minh Thắng', 'minh-thang__91108.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'minhthang@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(23, 'Newstarbooks', 'newstarbook__33512.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'newstarbooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(24, 'Ngòi Bút Việt', 'noimage.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Ngoibutviet@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(25, 'Người Trẻ Việt', 'nguoi-tre-viet__42925.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'NguoiTreViet@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(26, 'Nhã Nam', 'nha-nam__37691.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'NhaNam@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(27, 'NXB Kim Đồng', 'nxb-kim-dong__54705.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'NXBKimĐong@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(28, 'NXB Phụ Nữ', 'nxb-phu-nu__56562.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'NXBPhuNu@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(29, 'NXB Trẻ', 'nxb-tre__00732.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'NXBTre@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(30, 'NXB Tổng Hợp', 'nxb-tong-hop__37997.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'NXBTongHop@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00'),
(31, 'Owlbooks', 'owlbooks__29030.jpg', 'số 23 thị trấn Mỹ Hào-Hưng Yên', 'Owlbooks@gmai.com', '04337792', '2019-04-09 03:26:00', '2019-04-09 03:26:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tenquyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id`, `tenquyen`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản lý toàn bộ website', '2019-04-10 14:30:12', '2019-04-10 14:30:12'),
(2, 'ql nhập hàng', 'Quản lý thao tác nhập hàng và kho', '2019-04-10 14:30:12', '2019-04-10 14:30:12'),
(3, 'ql bán hàng', 'Quản lý thao tác bán hàng', '2019-04-10 14:30:12', '2019-04-10 14:30:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `maloaiquangcao` smallint(5) UNSIGNED NOT NULL,
  `tenquangcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chitiet` longtext COLLATE utf8mb4_unicode_ci,
  `lienket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` tinyint(3) UNSIGNED NOT NULL,
  `ngaydang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`maloaiquangcao`, `tenquangcao`, `anh`, `chitiet`, `lienket`, `thutu`, `ngaydang`, `created_at`, `updated_at`) VALUES
(1, 'slide', NULL, NULL, 'slide_img1.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img2.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img3.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img4.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img5.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img6.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img7.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img8.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img9.jpg', 1, '2019-04-10', NULL, NULL),
(1, 'slide', NULL, NULL, 'slide_img10.jpg', 1, '2019-04-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratting`
--

CREATE TABLE `ratting` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `masach` int(10) UNSIGNED NOT NULL,
  `makhachhang` smallint(5) UNSIGNED NOT NULL,
  `xeploai` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rohang`
--

CREATE TABLE `rohang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masach` int(10) UNSIGNED NOT NULL,
  `makhachhang` smallint(5) UNSIGNED NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhbia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloai` tinyint(3) UNSIGNED NOT NULL,
  `manhaxuatban` tinyint(3) UNSIGNED NOT NULL,
  `tensach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tacgia` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` smallint(5) UNSIGNED NOT NULL,
  `dongia` double(8,2) UNSIGNED NOT NULL,
  `luotxem` smallint(6) NOT NULL DEFAULT '0',
  `luotmua` smallint(6) NOT NULL DEFAULT '0',
  `khuyenmai` tinyint(3) UNSIGNED DEFAULT '0',
  `anhbia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tap` smallint(5) UNSIGNED DEFAULT '0',
  `sotap` smallint(5) UNSIGNED DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id`, `maloai`, `manhaxuatban`, `tensach`, `tacgia`, `soluong`, `dongia`, `luotxem`, `luotmua`, `khuyenmai`, `anhbia`, `tap`, `sotap`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'HÔM NAY ĂN GÌ? - PHIÊN BẢN THÚ CƯNG', 'Debora Robertson', 30, 80000.00, 0, 0, NULL, '978604775892_1_1__60664_thum_135.jpg', NULL, NULL, 1, '2019-04-11 03:24:40', '2019-05-03 05:49:56'),
(2, 5, 3, 'Combo Harvard Business School', 'Mario Prickens', 30, 120000.00, 0, 0, 10, 'diem-doi-lua-2014__90791_thum_135.jpg', 1, 1, 0, '2019-04-14 14:13:52', '2019-04-22 07:54:25'),
(3, 1, 4, 'Độc Giả Và Nhân Vật Chính Đích Thị Là Chân Tình', 'Đồi', 30, 100000.00, 0, 0, 20, 'doc-gia-full__22843_image2_800_thum.jpg', 2, 10, 0, '2019-04-14 14:17:31', '2019-04-22 14:40:34'),
(4, 1, 1, 'Tiệm Đồ Cổ Á Xá', 'Huyền sắc', 30, 70000.00, 0, 0, 20, '74737_11_04_19_tiem-do-co-a-xa-tap-7-truyen-tranh__10110_thum_135.jpg', 7, 10, 0, '2019-04-14 17:05:42', '2019-04-14 17:05:42'),
(5, 2, 4, 'LÊN LỚP KHÔNG ĐƯỢC ĐỌC TIỂU THUYẾT', 'Cửu Bả Đao', 30, 100000.00, 0, 0, 10, 'b3hibgs8__35790_thum_135.jpg', 0, 1, 0, NULL, NULL),
(6, 2, 23, 'SỰ CỨU RỖI CỦA THÁNH NỮ', 'Higashino Keigo', 30, 128000.00, 0, 0, 20, 'pmccr6uj__52114_thum_135.jpg', 0, 1, 0, NULL, NULL),
(7, 2, 16, 'GIÂY THỨ 12', 'Sunness', 30, 102000.00, 0, 0, 10, 'image_184262__01189_thum_135.jpg', 1, 10, 0, NULL, NULL),
(8, 2, 4, 'ANH LÀ TẤT CẢ NHỮNG GÌ EM GHÉT NHẤT', 'Tiểu Bố Thích Ăn Bánh Trứng', 30, 109000.00, 0, 0, 18, 'anhlatatca.jpg', 0, 1, 0, NULL, NULL),
(9, 2, 20, 'EM LÀ TIỂU TIÊN NỮ CỦA ANH (BỘ 2 TẬP)', 'MaMa', 30, 236000.00, 0, 0, 20, 'f990211ab650d08d5e6d8d675f5b6a6e_1___26207_thum.jpg', 0, 1, 0, NULL, NULL),
(11, 1, 16, '[ Bản Thường] AMAGI CÔNG VIÊN RỰC RỠ', 'Gatou shouji', 30, 105000.00, 0, 0, 20, 'amagi-cong-vien-ruc-ro-2-cover__99202_image2_800_thum.jpg', 2, 15, 1, NULL, '2019-05-06 07:27:12'),
(12, 2, 26, 'Khi Nhìn Lên Trời Xanh, Tớ Sẽ Rất Nhớ Cậu', 'Septiny', 30, 79000.00, 0, 1, 15, '2414201971454_55575953_1255588541260243_6317788388657201152_n_591x960__17411_thum_135.jpg', 0, 1, 1, NULL, '2019-05-07 07:03:46'),
(13, 2, 17, 'HÃY MANG ANH TRAI TÔI ĐI', 'U Linh', 30, 109000.00, 0, 0, 23, 'anhtoi3_thuong_biaao_thumb__46882_thum_135.jpg', 3, 5, 0, NULL, NULL),
(14, 2, 17, 'HÃY MANG ANH TRAI TÔI ĐI', 'U Linh', 30, 109000.00, 0, 0, 90, 'anhtoi3_dacbiet_biaao_thumb__52183_thum_135.jpg', 2, 5, 0, NULL, '2019-05-09 07:51:46'),
(15, 2, 21, 'ÔNG THỊ TRƯỞNG Ở FURNES', 'Georges Simenon', 30, 98000.00, 0, 0, 13, 'nitby3km__75401_thum_135.jpg', 0, 1, 0, NULL, NULL),
(16, 2, 16, 'HỎI ĐÁP CÙNG EM - THẦN THOẠI', 'Anne Royer', 30, 175000.00, 0, 0, 16, '5rcxwb7n__53979_thum_135.jpg', 0, 1, 0, NULL, NULL),
(17, 2, 1, 'RE:LIFE', 'YayoiSo', 30, 75000.00, 0, 0, 17, 'relife5_biaao_thumb_2__42821_thum_135.jpg', 5, 20, 0, NULL, NULL),
(18, 2, 16, 'Bản Đặc Biệt - Ma Vương Kiến Tạo', 'Rui Tsukiyo', 30, 103000.00, 0, 0, 16, '1944201914420_bia_1_ma_vuong_t4_min_700x1000__89612_thum_135.jpg', 4, 20, 0, NULL, NULL),
(19, 2, 16, 'CON RỒNG TRONG BỂ KÍNH - CÂU CHUYỆN THẬT VỀ QUYỀN LỰC, NỖI ÁM ẢNH VÀ LOÀI CÁ ĐÁNG THÈM MUỐN NHẤT', 'Emily Voigt', 30, 130000.00, 0, 0, 15, 'image_181982__93342_thum_135.jpg', 0, 1, 0, NULL, NULL),
(20, 2, 24, 'HỒNG HẠNH THỔN THỨC', 'Tào Đình', 30, 118000.00, 0, 0, 12, 'image_183043__98454_thum_135.jpg', 0, 1, 0, NULL, NULL),
(21, 2, 15, 'VĂN HÀO LƯU LẠC', 'Asagiri Kafka - Harukawa Sango', 30, 35000.00, 0, 0, 12, 'bia_1_van_hao_10_2__96775_thum_135.jpg', 10, 18, 0, NULL, NULL),
(22, 2, 5, 'LẶNG YÊN DƯỚI VỰC SÂU', 'Đỗ Bích Thúy', 30, 58000.00, 0, 0, 10, 'yen-lag__75236_thum_135.jpg', 0, 1, 0, NULL, NULL),
(23, 2, 19, 'SỰ TRẢ THÙ CỦA QUÝ CÔ', 'Sarah MacLean', 30, 135000.00, 0, 0, 24, 'image_183042__50080_thum_135.jpg', 0, 1, 0, NULL, NULL),
(24, 2, 26, 'SWORD ART ONLINE PROGRESSIVE 003', 'Reki Kawahara', 30, 105000.00, 0, 0, 11, 'cover_1_sao_pro_3_2__40365_thum_135.jpg', 0, 1, 0, NULL, NULL),
(25, 2, 17, 'TINH LINH HUYỄN TƯỞNG KÝ', 'Yuri Kitayama', 30, 140000.00, 0, 0, 14, 'b_a-1-tinh-linh_1_1_1__85710_thum.jpg', 1, 7, 0, NULL, '2019-04-22 08:06:49'),
(26, 2, 14, 'Người Là Tháng Tư Của Thế Gian', 'Thanh La Phiến Tử', 30, 99000.00, 0, 0, 19, '22088_05_03_19_nguoi-la-thang-tu-cua-the-gian__36329_thum_135.jpg', 0, 1, 0, NULL, NULL),
(27, 2, 12, 'RE:LIFE', 'YayoiSo', 30, 75000.00, 0, 0, 15, 'relife4_biaao_thumb_2__00449_thum_135.jpg', 4, 20, 0, NULL, NULL),
(28, 2, 15, 'CÔ DÂU PHÁP SƯ	', 'Yamazaki Kore', 30, 35000.00, 0, 0, 15, 'bia-1-cdps-10_1_1__54002_thum_135.jpg', 10, 30, 0, NULL, NULL),
(29, 2, 12, 'ĐẸP TRAI LÀ SỐ 1', 'Lục Mang Tinh', 30, 100000.00, 0, 0, 23, 'dep-chai__26550_thum.jpg', 2, 5, 0, NULL, NULL),
(30, 2, 22, '[BẢN ĐẶC BIỆT] DEATH NOTE', 'Tsugumi Ohba, Takeshi ', 30, 120000.00, 0, 0, 16, '65313_05_03_19_death-note-tap-5__78069_thum.jpg', 5, 10, 0, NULL, NULL),
(31, 1, 26, 'Độc Giả Và Nhân Vật Chính Đích Thị Là Chân Tình', 'Đồi', 30, 89000.00, 0, 0, 14, '65313_05_03_19_death-note-tap-5__78069_thum.jpg', 2, 10, 0, NULL, NULL),
(32, 1, 7, '[Trọn Bộ] Độc Giả Và Nhân Vật Chính Đích THị Là Chân Tình (5tập )', 'Đồi', 30, 518000.00, 0, 0, 11, 'doc-gia-full__22843_image2_800_thum.jpg', 0, 5, 0, NULL, NULL),
(33, 1, 15, 'DẠ ĐỀ', 'Chi Li Anh Chước', 30, 118000.00, 0, 0, 13, 'bia_1_2_8__15635_thum_135.jpg', 0, 1, 0, NULL, NULL),
(34, 1, 20, 'Xú Hoàng (Trọn Bộ 3 Tập)', 'Dịch Nhân Bắc', 30, 219000.00, 0, 0, 15, 'xu-hoang__17725_image2_800_thum.jpg', 0, 3, 0, NULL, NULL),
(35, 1, 16, 'Loạn Thế Vi Vương – Trọn Bộ 4 Tập (Tặng Kèm Poster, Số Lượng Có Hạn)', 'Cố Tuyết Nhu', 30, 462000.00, 0, 0, 14, 'loan-the-vi-vuong-1__92808_thum_135.jpg', 0, 4, 0, NULL, NULL),
(36, 1, 6, 'Loạn Thế Vi Vương – Trọn Bộ 4 Tập (Tặng Kèm Poster, Số Lượng Có Hạn)', 'Cố Tuyết Nhu', 30, 462000.00, 0, 0, 13, 'loan-the-vi-vuong-1__92808_thum_135.jpg', 0, 4, 0, NULL, NULL),
(37, 1, 19, 'VĂN HÀO LƯU LẠC', 'Asagiri Kafka - Harukawa Sango', 30, 35000.00, 0, 0, 24, 'bia_1_van_hao_10_2__96775_thum_135.jpg', 10, 20, 0, NULL, NULL),
(38, 1, 16, 'Độc Giả Và Nhân Vật Chính Đích Thị Là Chân Tình', 'Đồi', 30, 99000.00, 0, 0, 13, 'doc-gia-tap-1-full__47007_thum.jpg', 1, 5, 0, NULL, NULL),
(39, 1, 15, 'Archimedes Thân Yêu (Trọn Bộ 2 Tập)', 'Cửu Nguyệt Hi', 30, 219000.00, 0, 0, 23, 'archimedes-than-yeu__70147_thum_135.jpg', 0, 2, 0, NULL, NULL),
(40, 1, 16, 'Quỷ Hành Thiên Hạ', 'Nhĩ Nhã', 30, 190000.00, 0, 0, 12, 'quy-hanh-thien-ha-tap-6__64425_thum_135.jpg', 6, 8, 0, NULL, NULL),
(41, 1, 12, '[ Bản thường] AMAGI CÔNG VIÊN RỰC RỠ', 'Gatou shouji', 30, 130000.00, 0, 0, 14, 'amagi-cong-vien-ruc-ro-2-cover__43670_image2_800_thum.jpg', 2, 2, 0, NULL, NULL),
(42, 1, 2, 'Túi canvas chibi SCI 4 - sát thủ phi nhân loại', 'Nhĩ Nhã', 30, 154000.00, 0, 0, 12, 'tui-sci-chibi__34828_thum_135.jpg', 0, 1, 0, NULL, NULL),
(43, 1, 10, 'Tiệm Quan Tài Số 7 (Trọn Bộ 2 Tập)', 'Niệm Tiểu Duệ', 30, 219000.00, 0, 0, 10, 'tiem-quan-tai-so-7-tap-1__72791_image2_800_thum.jpg', 0, 2, 0, NULL, NULL),
(44, 1, 28, 'SWORD ART ONLINE PROGRESSIVE 003	', 'Reki Kawahara', 30, 159000.00, 0, 0, 21, 'cover_1_sao_pro_3_2__40365_thum_135.jpg', 0, 3, 0, NULL, NULL),
(45, 1, 7, 'Vũ Điệu Của Làn Da', 'Okyanmama', 30, 109000.00, 0, 0, 13, 'vu-dieu-lan-da__77406_thum_135.jpg', 0, 1, 0, NULL, NULL),
(46, 1, 4, 'Mãi Mãi Là Bao Xa (Tái Bản 2015, Bổ Sung Ngoại Truyện Mới)', 'Diệp Lạc Vô Tâm', 30, 126000.00, 0, 0, 22, 'mai-mai-la-bao-xa__89605_thum_135.jpg', 0, 1, 0, NULL, NULL),
(47, 1, 29, 'Tháng Năm Qua', 'Tĩnh Thủy Biên', 30, 125000.00, 0, 0, 11, '_thang-nam-qua__47480_thum_135.jpg', 0, 1, 0, NULL, NULL),
(48, 1, 6, 'Anh Hùng Ca', 'Lại Nhĩ', 30, 219000.00, 0, 0, 15, 'anh-hung-ca-tap-1__03619_thum_135.jpg', 1, 10, 0, NULL, NULL),
(49, 1, 16, 'Sự Trỗi Dậy Và Suy Tàn Của Đế Chế Thứ Ba - Lịch Sử Đức Quốc Xã', 'William L. Shirer', 30, 219000.00, 0, 0, 20, 'de-che-thu-3__65097_thum_135.jpg', 0, 1, 1, NULL, NULL),
(50, 1, 19, 'Người Sống Sót', 'Tần Minh', 30, 159000.00, 0, 0, 14, 'nguoi-song-sot__26195_thum_135.jpg', 0, 1, 0, NULL, NULL),
(51, 1, 28, 'Nhóc Nicolas: Những Chuyện Chưa Kể ', 'Goscinny', 30, 109000.00, 0, 0, 23, 'nhoc-nicolas-nhung-chuyen-chua-ke-tap-3__74732_thum_135.jpg', 0, 1, 0, NULL, NULL),
(52, 1, 23, 'RE:LIFE', 'YayoiSo', 30, 75000.00, 0, 0, 16, 'relife5_biaao_thumb_2__42821_thum_135.jpg', 5, 10, 0, NULL, NULL),
(53, 1, 13, 'Blonote', 'Tablo', 30, 98000.00, 0, 0, 19, 'blonote__18658_thum_135.jpg', 0, 1, 0, NULL, NULL),
(54, 1, 21, 'BẢY NGÀY ĐẾM NGƯỢC', 'Cát Bốc Lặc', 30, 119000.00, 0, 0, 24, 'bay-ngay-dem-nguoc-bia_1_1__38490_thum_135.jpg', 0, 1, 0, NULL, NULL),
(55, 1, 24, 'Tiệm Đồ Cổ Á Xá', 'Huyền Sắc', 30, 15000.00, 0, 0, 10, '74737_11_04_19_tiem-do-co-a-xa-tap-7-truyen-tranh__10110_thum_135.jpg', 7, 10, 0, NULL, NULL),
(56, 1, 8, 'Quỷ Hành Thiên Hạ', 'Nhĩ Nhã', 30, 200000.00, 0, 0, 14, 'quy-hanh-thien-ha-tap-78__57797_thum_135.jpg', 7, 8, 0, NULL, NULL),
(57, 1, 14, 'Đừng Lãng Phí Những Ngày Đẹp Trời', 'Jinie Lynk', 30, 78000.00, 0, 0, 16, 'dung-lang-phi-nhung-ngay-dep-troi__01172_thum_135.jpg', 0, 1, 0, NULL, NULL),
(58, 5, 4, 'Chiến Tranh Tiền Tệ - Tái Bản 2017', 'Song Hong Bing', 30, 150000.00, 0, 0, 32, '973976466.jpg', 0, 1, 0, '2019-04-20 15:09:57', '2019-04-20 15:09:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `maquyen` tinyint(3) UNSIGNED NOT NULL,
  `manhanvien` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `maquyen`, `manhanvien`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin', 'luutungduong1411@gmail.com', '$2y$10$gtRvfaeQBD5JcW.9rtlmruGF.6aLD4qV.mlQbKu1Zqi/yz8reso/m', NULL, '2019-04-12 14:15:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tentintuc` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int(10) UNSIGNED NOT NULL,
  `matintuccha` int(10) UNSIGNED NOT NULL,
  `ngaydang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tenthanhpho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuocphi` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_id_dondathang_foreign` (`id_dondathang`),
  ADD KEY `chitietdonhang_id_sach_foreign` (`id_sach`);

--
-- Chỉ mục cho bảng `chitietsach`
--
ALTER TABLE `chitietsach`
  ADD KEY `chitietsach_masach_foreign` (`masach`),
  ADD KEY `chitietsach_mangonngu_foreign` (`mangonngu`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dondathang_id_khachhang_foreign` (`id_khachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaiquangcao`
--
ALTER TABLE `loaiquangcao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisach_madanhmuc_foreign` (`madanhmuc`);

--
-- Chỉ mục cho bảng `ngonngu`
--
ALTER TABLE `ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD KEY `quangcao_maloaiquangcao_foreign` (`maloaiquangcao`);

--
-- Chỉ mục cho bảng `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratting_masach_foreign` (`masach`),
  ADD KEY `ratting_makhachhang_foreign` (`makhachhang`);

--
-- Chỉ mục cho bảng `rohang`
--
ALTER TABLE `rohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rohang_masach_foreign` (`masach`),
  ADD KEY `rohang_makhachhang_foreign` (`makhachhang`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sach_maloai_foreign` (`maloai`),
  ADD KEY `sach_manhaxuatban_foreign` (`manhaxuatban`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taikhoan_maquyen_foreign` (`maquyen`),
  ADD KEY `taikhoan_manhanvien_foreign` (`manhanvien`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loaiquangcao`
--
ALTER TABLE `loaiquangcao`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `ngonngu`
--
ALTER TABLE `ngonngu`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rohang`
--
ALTER TABLE `rohang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_id_dondathang_foreign` FOREIGN KEY (`id_dondathang`) REFERENCES `dondathang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_id_sach_foreign` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietsach`
--
ALTER TABLE `chitietsach`
  ADD CONSTRAINT `chitietsach_mangonngu_foreign` FOREIGN KEY (`mangonngu`) REFERENCES `ngonngu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietsach_masach_foreign` FOREIGN KEY (`masach`) REFERENCES `sach` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `dondathang_id_khachhang_foreign` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD CONSTRAINT `loaisach_madanhmuc_foreign` FOREIGN KEY (`madanhmuc`) REFERENCES `danhmuc` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD CONSTRAINT `quangcao_maloaiquangcao_foreign` FOREIGN KEY (`maloaiquangcao`) REFERENCES `loaiquangcao` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ratting`
--
ALTER TABLE `ratting`
  ADD CONSTRAINT `ratting_makhachhang_foreign` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratting_masach_foreign` FOREIGN KEY (`masach`) REFERENCES `sach` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rohang`
--
ALTER TABLE `rohang`
  ADD CONSTRAINT `rohang_makhachhang_foreign` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rohang_masach_foreign` FOREIGN KEY (`masach`) REFERENCES `sach` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_maloai_foreign` FOREIGN KEY (`maloai`) REFERENCES `loaisach` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sach_manhaxuatban_foreign` FOREIGN KEY (`manhaxuatban`) REFERENCES `nhaxuatban` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_manhanvien_foreign` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `taikhoan_maquyen_foreign` FOREIGN KEY (`maquyen`) REFERENCES `phanquyen` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
