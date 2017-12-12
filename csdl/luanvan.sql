-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Novembre 2017 à 11:23
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `luanvan`
--

-- --------------------------------------------------------

--
-- Structure de la table `banan`
--

CREATE TABLE `banan` (
  `maBan` int(10) UNSIGNED NOT NULL,
  `tenBan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangThai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `banan`
--

INSERT INTO `banan` (`maBan`, `tenBan`, `trangThai`, `created_at`, `updated_at`) VALUES
(81, 'ban1', 1, '2017-11-22 06:49:52', '2017-11-22 06:49:52'),
(82, 'ban2', 1, '2017-11-22 06:49:52', '2017-11-22 06:49:52'),
(83, 'ban3', 1, '2017-11-22 06:49:52', '2017-11-22 06:49:52'),
(84, 'ban4', 1, '2017-11-22 06:49:52', '2017-11-22 06:49:52');

-- --------------------------------------------------------

--
-- Structure de la table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `idCauhinh` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maugiaodien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienhe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `cauhinh`
--

INSERT INTO `cauhinh` (`idCauhinh`, `logo`, `maugiaodien`, `lienhe`, `diachi`, `footer`, `created_at`, `updated_at`) VALUES
(1, '3Sia_logo.png', '#f07800', '<h4><a href="https://www.facebook.com/Ct-restaurant-110828796302371/?modal=admin_todo_tour">FB : CT RESTAURANT </a></h4>\r\n\r\n<h4><a href="https://www.facebook.com/Ct-restaurant-110828796302371/?modal=admin_todo_tour">PHONE: 0923 167 564 </a></h4>\r\n\r\n<h4><a href="https://www.facebook.com/Ct-restaurant-110828796302371/?modal=admin_todo_tour">EMAIL: CTRESTAURANT@GMAIL.COM </a></h4>', '<h4><a href="https://www.facebook.com/Ct-restaurant-110828796302371/?modal=admin_todo_tour" style="font-size: 28px;line-height: 33px;">2A Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ, Việt Nam</a></h4>', '<p>Food is home to 5,000+ of the web''s best branded recipes!<br />\r\nCopyright © 2017 - Theme by <a href="https://themeforest.net/user/An-Themes/portfolio?ref=An-Themes">An-Themes</a></p>', '2017-11-10 17:00:00', '2017-11-20 03:19:17');

-- --------------------------------------------------------

--
-- Structure de la table `doanhthu`
--

CREATE TABLE `doanhthu` (
  `idDoanhThu` int(10) UNSIGNED NOT NULL,
  `ngayDat` date NOT NULL,
  `tongTien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `doanhthu`
--

INSERT INTO `doanhthu` (`idDoanhThu`, `ngayDat`, `tongTien`, `created_at`, `updated_at`) VALUES
(3, '2017-11-24', 1441000, '2017-11-23 17:33:30', '2017-11-24 08:05:52'),
(4, '2017-11-23', 100000, NULL, NULL),
(5, '2017-11-22', 500000, NULL, NULL),
(6, '2017-11-21', 150000, NULL, NULL),
(7, '2017-11-20', 350000, NULL, NULL),
(8, '2017-11-19', 123000, NULL, NULL),
(9, '2017-11-18', 102000, NULL, NULL),
(10, '2017-11-17', 500000, NULL, NULL),
(11, '2017-11-16', 300000, NULL, NULL),
(12, '2017-11-15', 100000, NULL, NULL),
(13, '2017-11-14', 100000, NULL, NULL),
(14, '2017-11-13', 100000, NULL, NULL),
(15, '2017-11-12', 100000, NULL, NULL),
(16, '2017-11-11', 100000, NULL, NULL),
(17, '2017-11-10', 100000, NULL, NULL),
(18, '2017-11-09', 100000, NULL, NULL),
(19, '2017-11-08', 100000, NULL, NULL),
(20, '2017-11-06', 100000, NULL, NULL),
(21, '2017-11-05', 100000, NULL, NULL),
(22, '2017-11-04', 100000, NULL, NULL),
(23, '2017-11-03', 100000, NULL, NULL),
(24, '2017-11-01', 100000, NULL, NULL),
(25, '2017-11-25', 1603500, '2017-11-24 18:10:44', '2017-11-24 18:48:12');

-- --------------------------------------------------------

--
-- Structure de la table `khachhang`
--

CREATE TABLE `khachhang` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` int(11) NOT NULL,
  `sdt` int(12) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangThai` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `khachhang`
--

INSERT INTO `khachhang` (`username`, `hoTen`, `cmnd`, `sdt`, `password`, `trangThai`, `created_at`, `updated_at`) VALUES
('123456123', '12312313313123', 213123123, 923167564, '$2y$10$rmRVqEF3ARdxef.JqKg9Qep5Nu.DSvdMngzEpYEgIu9Gw3Y3KI3v2', 1, '2017-10-23 02:43:37', '2017-11-11 05:53:55'),
('danglevinhkhoa', 'Đặng Lê Vĩnh Khoa', 123131231, 1234565432, '$2y$10$FxY5pVUZVcm.fX5ltejqRe5tX90mUTyKVohDmtJF/ePdhaL0/kzfy', 0, '2017-10-23 02:42:23', '2017-10-23 02:42:23'),
('danglevinhphuc', 'Đặng Lê Vĩnh Phúc', 123213254, 979685858, '$2y$10$jE3zMU1ZLjey9GKALEDGye9bSEw5m3AhgTK18TWWi9sWdeB24mueO', 0, '2017-10-23 02:43:10', '2017-10-23 02:45:05');

-- --------------------------------------------------------

--
-- Structure de la table `loaimon`
--

CREATE TABLE `loaimon` (
  `idLoaiMon` int(10) UNSIGNED NOT NULL,
  `loaiMon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiMonKhongDau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangThai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `loaimon`
--

INSERT INTO `loaimon` (`idLoaiMon`, `loaiMon`, `loaiMonKhongDau`, `trangThai`, `created_at`, `updated_at`) VALUES
(1, 'Món kho', 'mon-kho', 'phần', '2017-10-23 10:51:15', '2017-10-23 10:51:15'),
(2, 'Món xào', 'mon-xao', 'phần', '2017-10-23 10:52:49', '2017-10-23 10:52:49'),
(3, 'Món chiên', 'mon-chien', 'phần', '2017-10-23 10:57:18', '2017-10-23 10:57:18'),
(4, 'Món canh', 'mon-canh', 'phần', '2017-10-23 11:05:20', '2017-11-04 07:26:52'),
(5, 'Món nướng', 'mon-nuong', 'phần', '2017-10-24 01:18:36', '2017-10-24 01:18:36'),
(6, 'Món rang', 'mon-rang', 'phần', '2017-10-28 20:17:34', '2017-10-28 20:17:34'),
(7, 'Nước có ga', 'nuoc-co-ga', 'chai', '2017-11-04 07:13:14', '2017-11-04 21:14:22'),
(8, 'Bia', 'bia', 'chai', '2017-11-04 21:23:34', '2017-11-04 21:26:49');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_22_090545_loaimon', 1),
(2, '2017_10_22_091041_monan', 2),
(5, '2017_10_22_155426_khachhang', 5),
(10, '2017_10_22_091805_banan', 9),
(12, '2017_10_22_160705_thanhtoan', 10),
(17, '2017_10_22_161201_sukien', 11),
(18, '2017_11_11_132234_cauhinh', 12),
(19, '2017_10_22_092357_nhanvien', 13),
(20, '2017_10_22_155737_phanquyen', 13),
(21, '2017_11_23_234438_doanhthu', 14);

-- --------------------------------------------------------

--
-- Structure de la table `monan`
--

CREATE TABLE `monan` (
  `idMonAn` int(10) UNSIGNED NOT NULL,
  `tenMonAn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenMonAnKhongDau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaMonAn` int(11) NOT NULL,
  `idLoaiMon` int(10) UNSIGNED NOT NULL,
  `moTaMonAn` longtext COLLATE utf8mb4_unicode_ci,
  `hinhAnhMonAn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangThai` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `monan`
--

INSERT INTO `monan` (`idMonAn`, `tenMonAn`, `tenMonAnKhongDau`, `giaMonAn`, `idLoaiMon`, `moTaMonAn`, `hinhAnhMonAn`, `trangThai`, `created_at`, `updated_at`) VALUES
(1, 'Thịt nướng korea', 'thit-nuong-korea', 100000, 5, '<p>Thịt nướng được đầu bếp hàng đầu tại hàn quốc (korea) đào tạo đảm bảo chất lượng Korea 100%</p>\r\n\r\n<p>&nbsp;</p>', 'f6Zu_kinh-nghiem-mo-quan-lau-nuong-1.jpg', 0, '2017-10-24 01:49:43', '2017-11-19 18:19:24'),
(2, 'Thịt kho hột vịt nam bộ', 'thit-kho-hot-vit-nam-bo', 800000, 1, '<p>Thịt kho hột vịt đậm chất nam bộ&nbsp;</p>', 'https://giadinh.tv/wp-content/uploads/2016/11/thit-kho-tau-e1480250954404.jpg', 0, '2017-10-24 01:52:17', '2017-10-24 02:50:54'),
(3, 'canh chua', 'canh-chua', 50000, 4, '<p>Canh chua nam bộ , chất 100% Đồng bằng sông 9 rồng&nbsp;</p>', 'http://anh.eva.vn/upload/2-2016/images/2016-06-06/canh-ca-chua-mien-nam-m2-1465180786-width500height417.jpg', 0, '2017-10-25 02:43:59', '2017-10-25 02:43:59'),
(4, 'Canh chua ca ro', 'canh-chua-ca-ro', 700000, 4, '<p>Canh chua ca rô miền nam cực chất&nbsp;</p>', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS2buYhrFL4QYCmWiZRzkZao7tgzK6D1U_vHmE3cKLGA4VLcSRq', 0, '2017-10-28 20:11:29', '2017-10-28 20:16:08'),
(5, 'Cua rang me', 'cua-rang-me', 50000, 6, '<p>Cua đồng rang me chất miền tây nam bộ</p>', 'gU8b_2012-11-01.03.40.37-12.jpg', 0, '2017-10-28 20:18:04', '2017-10-28 20:18:04'),
(6, 'Đậu xào', 'dau-xao', 30000, 2, '<p>Đậu xào hồng kong</p>', 'http://media.phunutoday.vn/files/upload_images/2016/02/12/cach-lam-dau-dua-xao-long-ga-4-phunutoday_vn.jpg', 0, '2017-10-29 01:44:01', '2017-10-29 01:44:01'),
(7, 'Cá lóc chiên nước mắn', 'ca-loc-chien-nuoc-man', 50000, 3, '<p>Cá lóc chiên nước mắn rừng chất tây nam bộ</p>', 'http://baokhanhhoa.vn/dataimages/201403/original/images930715_Ca_loc.jpg', 0, '2017-10-29 01:46:40', '2017-10-29 01:46:40'),
(8, 'Cá kho', 'ca-kho', 30000, 1, '<p>Cá kho</p>', 'http://anh.24h.com.vn/upload/1-2017/images/2017-01-21/1484976212-kho-ca-ngon-1484535138184.jpg', 0, '2017-10-31 06:44:17', '2017-10-31 06:44:17'),
(9, 'Gà kho', 'ga-kho', 35000, 1, '<p>Gà kho chất vịnh bắc bộ</p>', 'https://yeutre.vn/cdn/medias/uploads/22/22409-ga-kho-5.jpg', 0, '2017-10-31 06:45:29', '2017-10-31 06:45:29'),
(10, 'Kho quẹt', 'kho-quet', 30000, 1, '<p>Kho quẹt</p>', 'https://cdn1.tgdd.vn/Files/2016/12/07/922730/cach-lam-kho-quet-ngon-ngat-ngay-5.jpg', 0, '2017-10-31 06:47:05', '2017-10-31 06:47:05'),
(11, 'Vịt kho rừng', 'vit-kho-rung', 25000, 1, '<p>Vịt kho rừng</p>', 'https://cachlam9.com/wp-content/uploads/2015/11/cach-lam-vit-kho-gung-1.jpg', 0, '2017-10-31 06:48:08', '2017-10-31 06:48:08'),
(12, 'Rau muống xào tỏi', 'rau-muong-xao-toi', 10000, 2, '<p>Rau muống xào tỏi</p>', 'https://mecuteo.vn/wp-content/uploads/2015/07/huong-dan-cach-lam-rau-muong-xao-toi-xanh-ngon-thom-phuc.jpg', 0, '2017-10-31 06:49:40', '2017-10-31 06:49:40'),
(13, 'Mực xào cần tỏi', 'muc-xao-can-toi', 50000, 2, '<p>Mực xào cần tỏi</p>', 'https://i.ytimg.com/vi/Ev4FQzKrwbI/maxresdefault.jpg', 0, '2017-10-31 06:50:42', '2017-10-31 06:50:42'),
(14, 'Thịt bò xào cần tỏi', 'thit-bo-xao-can-toi', 50000, 2, '<p>Thịt bò xào</p>', 'https://media.cooky.vn/recipe/g1/4031/s400x400/recipe4031-635694422296889288.jpg', 0, '2017-10-31 06:51:35', '2017-10-31 06:51:35'),
(15, 'Mì xào hải sản', 'mi-xao-hai-san', 50000, 2, '<p>Mì xào hải sản hàn quốc chất&nbsp;</p>', 'http://cdn-img-v1.webbnc.net/upload/web/51/513006/product/2015/05/20/03/13/143210959199.jpg', 0, '2017-10-31 06:52:43', '2017-10-31 06:52:43'),
(16, 'Mực chiên giòn', 'muc-chien-gion', 35000, 3, '<p>Mực chiên giòn</p>', 'http://toinayangi.vn/wp-content/uploads/2015/08/m%E1%BB%B1c-chi%C3%AAn-x%C3%B9.jpg', 0, '2017-10-31 06:54:07', '2017-10-31 06:54:07'),
(17, 'Gà chiên giòn', 'ga-chien-gion', 50000, 3, '<p>Gà chiên xói mở trứng kiểu nhật chất xứ sở hoa anh đào</p>', 'https://previews.123rf.com/images/dyoma/dyoma0806/dyoma080600035/3188453-fried-chicken-wings-in-friture-with-red-pepper-Stock-Photo.jpg', 0, '2017-10-31 06:55:28', '2017-10-31 06:56:04'),
(18, 'Tôm chiên xù', 'tom-chien-xu', 50000, 3, '<p>Tôm chiên xù</p>', 'http://media1.nguoiduatin.vn/media/le-thi-duyen/2017/10/24/tom-3.jpg', 0, '2017-10-31 07:00:00', '2017-10-31 07:00:00'),
(19, 'tàu hủ chiên xù', 'tau-hu-chien-xu', 35000, 3, '<p>tàu hủ chiên xù</p>', 'http://meohaybotui.com/wp-content/uploads/2015/08/20150425-thuc-don-3-mon-ngon-cuoi-tuan-3.jpg', 0, '2017-10-31 07:02:06', '2017-10-31 07:02:06'),
(20, 'Canh bạch quả nấm hương', 'canh-bach-qua-nam-huong', 60000, 4, '<p>Canh bạch quả nấm hương</p>', 'http://giacngo.vn/UserImages/2014/05/23/11/mon%20Maggi.jpg', 0, '2017-10-31 07:07:48', '2017-10-31 07:07:48'),
(21, 'Canh gà thuốc bắc', 'canh-ga-thuoc-bac', 50000, 4, '<p>Canh gà thuốc bắc</p>', 'http://giadinh.mediacdn.vn/zoom/655_361/mdzIl7vLgLfgwjAengS14jHKvrq/Image/2013/05/canh-ga-thuoc-bac-1-1f628.jpg', 0, '2017-10-31 07:09:59', '2017-10-31 07:09:59'),
(22, 'Canh thịt bò cay', 'canh-thit-bo-cay', 50000, 4, '<p>Canh thịt bò cay hàn quốc</p>', 'http://kingbbq.com.vn/wp-content/uploads/2014/08/mg_3294-a-1250x800.jpg', 0, '2017-10-31 07:11:24', '2017-10-31 07:11:24'),
(23, 'Bò quanh lửa hồng', 'bo-quanh-lua-hong', 55000, 5, '<p>Bò quanh lửa hồng korea</p>', 'http://7monngonmoingay.net/wp-content/uploads/2016/08/cach-lam-mon-bo-quanh-lua-hong-la-mieng-dua-com.jpg', 0, '2017-10-31 07:13:25', '2017-10-31 07:13:25'),
(24, 'Tôm hùm nướng', 'tom-hum-nuong', 55000, 5, '<p>Tôm hùm nướng phô mai</p>', 'http://cachnaumonan.com/wp-content/uploads/2016/11/cach-che-bien-tom-hum-nuong-pho-mai-2.jpg', 0, '2017-10-31 07:14:15', '2017-10-31 07:14:15'),
(25, 'Tôm nướng muối ớt', 'tom-nuong-muoi-ot', 50000, 5, '<p>Tôm nướng muối ớt</p>', 'http://haisansachphanthiet.com/upload/images/tom-bien-nuong-muoi-ot.jpg', 0, '2017-10-31 07:15:04', '2017-10-31 07:15:04'),
(26, 'Mực nướng', 'muc-nuong', 45000, 5, '<p>Mực nướng hàn quốc</p>', 'https://cachlamhaisan.com/wp-content/uploads/2016/10/muc-nuong-sa-te.jpg', 0, '2017-10-31 07:16:28', '2017-10-31 07:16:28'),
(27, 'Ốc rang muối ớt', 'oc-rang-muoi-ot', 30000, 6, '<p>Ốc rang muối ớt</p>', 'https://cachlam9.com/wp-content/uploads/2016/08/Cach-lam-oc-rang-muoi-ot-3.jpg', 0, '2017-10-31 07:17:24', '2017-10-31 07:17:24'),
(28, 'Cơm rang thịt bò', 'com-rang-thit-bo', 35000, 6, '<p>Cơm rang kim chi thịt bò</p>', 'https://3.bp.blogspot.com/-g-p_JaobM0o/V8aIp1c1EYI/AAAAAAAAShs/jt4e-XX5yP4L4xFr1wtj4r8scjkOj6Q4ACEw/s1600/com-rang-kim-chi-thit-bo-2.jpg', 0, '2017-10-31 07:18:48', '2017-10-31 07:18:48'),
(29, 'Gà rang muối', 'ga-rang-muoi', 40000, 6, '<p>Gà rang muối</p>', 'http://media.phunutoday.vn/files/thanh.le/2017/08/31/ga-rang-muoi-2025-phunutoday.jpg', 0, '2017-10-31 07:21:17', '2017-10-31 07:21:17'),
(30, 'Cút lộn rang me', 'cut-lon-rang-me', 25000, 6, '<p>Cút lộn rang me</p>', 'https://jamja.vn/blog/wp-content/uploads/2017/09/cach-lam-trung-cut-lon-rang-me.jpg', 0, '2017-10-31 07:22:07', '2017-10-31 07:22:07'),
(31, 'Big cola', 'big-cola', 10000, 7, '<p>big cola</p>', 'https://www.businessdayonline.com/wp-content/uploads/2017/04/Big-Cola.jpg', 0, '2017-11-04 21:16:36', '2017-11-04 21:16:36'),
(32, 'Aquarius', 'aquarius', 12000, 7, '<p>Aquarius</p>', 'https://cdn4.tgdd.vn/Products/Images/2563/83764/nuoc-giai-khat-aquarius-390ml-700x467-1.jpg', 0, '2017-11-04 21:17:36', '2017-11-04 21:17:36'),
(33, 'Lavie 500ml', 'lavie-500ml', 8000, 7, '<p>Lavie 500ml</p>', 'https://www.laviewater.com/wp-content/uploads/2016/09/Lavie-500ml.png', 0, '2017-11-04 21:18:39', '2017-11-04 21:18:39'),
(34, 'String', 'string', 10000, 7, '<p>Sting thái</p>', 'http://2.bp.blogspot.com/-DLbQx-2cgkE/VRvmwa1j8cI/AAAAAAAAAMw/i9cyY8vOtf8/s1600/sting-do-vang-chai-330ml.jpg', 0, '2017-11-04 21:20:35', '2017-11-04 21:20:35'),
(35, 'Trà xanh 0 độ', 'tra-xanh-0-do', 15000, 7, '<p>Trà xanh 0<sup>0</sup>&nbsp;</p>', 'http://laccoffee.com/wp-content/uploads/2017/05/tra-xanh-0-do-laccoffee-giao-ca-phe-tan-noi-bien-hoa.jpg', 0, '2017-11-04 21:22:32', '2017-11-04 21:22:32'),
(36, 'Heineken', 'heineken', 19000, 8, '<p>Heineiken</p>', 'http://img.websosanh.vn/v2/users/root_product/images/jKta9qJ1IzfS.jpg?compress=85', 0, '2017-11-04 21:29:50', '2017-11-04 21:30:28'),
(37, 'Tiger', 'tiger', 17000, 8, '<p>Tiger</p>', 'http://thegioidouong.net/wp-content/uploads/2016/05/tiger-bac-ket-204036j16704-300x294.jpg', 0, '2017-11-04 21:32:09', '2017-11-04 21:32:09'),
(38, 'Sài gòn special', 'sai-gon-special', 15000, 8, '<p>Sài gòn xanh</p>', 'http://media.bizwebmedia.net/Thumbnail.ashx?img=/sites/127534/data/images/2015/9/0029678pepsi_66_a.png&width=500&height=500', 0, '2017-11-04 21:33:17', '2017-11-04 21:33:17'),
(39, '333', '333', 11000, 8, '<p>bia 333</p>', 'http://nhahangthanhdat.com/images/photo/sgd.jpg', 0, '2017-11-04 21:34:01', '2017-11-04 21:34:01'),
(40, 'larger', 'larger', 12000, 8, '<p>Bia larger</p>', 'http://sasobeco.com.vn/images/news/bia-1367046772_500x0.jpg', 0, '2017-11-04 21:34:43', '2017-11-04 21:34:43');

-- --------------------------------------------------------

--
-- Structure de la table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `gioiTinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `cmnd` int(11) NOT NULL,
  `diaChi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhDaiDien` text COLLATE utf8mb4_unicode_ci,
  `luong` int(11) NOT NULL,
  `trangThai` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `nhanvien`
--

INSERT INTO `nhanvien` (`username`, `ho`, `ten`, `password`, `ngaySinh`, `gioiTinh`, `sdt`, `cmnd`, `diaChi`, `hinhDaiDien`, `luong`, `trangThai`, `remember_token`, `created_at`, `updated_at`) VALUES
('dangkhoa', 'dang le', 'vinh khoa', '$2y$10$E04mOzBPKSqqFk2qWTBT0Oto4tzsz9fe2..ba9m8BuMc6nJXPx.oa', '1996-08-01', 'nam', 2147483647, 12312312, 'can tho cty', 'https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/19756371_1969220793322824_618382033767205253_n.jpg?oh=85f7ab1772b34982a59d9b37d8ec7cac&oe=5A8D240E', 456666699, 0, NULL, '2017-11-20 02:24:56', '2017-11-20 02:24:56'),
('ngocmai', 'Bui', 'Ngoc mai', '$2y$10$.QdPV/tBz.V.29fA3qtQf.D56y2CPD.3S.53ucyFhQT8RTtMJfcFm', '1997-11-27', 'nu', 123456789, 12345678, 'can tho cty', 'https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-1/c0.0.824.824/19510357_748113185370703_2463556540891598139_n.jpg?oh=8a99fcebefb968538150585332729d3a&oe=5AA1ECBF', 5699999, 0, NULL, '2017-11-20 02:23:45', '2017-11-20 02:23:45'),
('phucdang123', 'phuc', 'dang', '$2y$10$9Zn.lBBeMvq5KTeKZAT0nuYlAqOxGeZlLnEWvu23CI0U.gpuUsrtG', '1996-08-16', 'nam', 123456789, 123456789, 'can tho cty', 'https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/10888752_431049177070739_1475256757003712454_n.jpg?oh=3f2a851a4be7f80b60cd3df2fd7c8b9d&oe=5A9D7E13', 123456789, 0, NULL, '2017-11-19 21:57:17', '2017-11-19 21:57:17');

-- --------------------------------------------------------

--
-- Structure de la table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `idPhanQuyen` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanly` int(11) NOT NULL,
  `phucvu` int(11) NOT NULL,
  `daubep` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `phanquyen`
--

INSERT INTO `phanquyen` (`idPhanQuyen`, `username`, `quanly`, `phucvu`, `daubep`, `created_at`, `updated_at`) VALUES
(1, 'phucdang123', 1, 0, 0, '2017-11-19 21:57:17', '2017-11-20 02:22:35'),
(2, 'ngocmai', 0, 1, 0, '2017-11-20 02:23:45', '2017-11-20 02:23:50'),
(3, 'dangkhoa', 0, 0, 1, '2017-11-20 02:24:56', '2017-11-20 02:25:00');

-- --------------------------------------------------------

--
-- Structure de la table `sukien`
--

CREATE TABLE `sukien` (
  `idSuKien` int(10) UNSIGNED NOT NULL,
  `tenSuKien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenSuKienKhongDau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTaSuKien` longtext COLLATE utf8mb4_unicode_ci,
  `phanTramGiamGia` double(8,2) NOT NULL,
  `trangThai` int(11) NOT NULL,
  `hinhDaiDien` text COLLATE utf8mb4_unicode_ci,
  `thoiGianBatDau` date NOT NULL,
  `thoiGianKetThuc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sukien`
--

INSERT INTO `sukien` (`idSuKien`, `tenSuKien`, `tenSuKienKhongDau`, `moTaSuKien`, `phanTramGiamGia`, `trangThai`, `hinhDaiDien`, `thoiGianBatDau`, `thoiGianKetThuc`, `created_at`, `updated_at`) VALUES
(1, 'Trung thu', 'trung-thu', '<p>53</p>', 53.00, 0, 'http://kenh14cdn.com/zoom/420_264/2016/14540337826601454033782632-1478056473666-156-0-1285-2117-crop-1478056506266-1478124635097-67-76-319-480-crop-1478124704896.jpg', '2017-11-22', '2017-11-22', '2017-10-25 07:32:14', '2017-11-23 17:13:28'),
(3, 'Tết dương lịch', 'tet-duong-lich', '<p>Sự kiện halloween được tổ chức tại nhà hàng&nbsp;<strong>Food</strong>&nbsp;với nhiều ưu đãi hấp dẫn giảm giá hàng loạt các món ăn truyền thống hay hiện đại chị trong vòng 1 tuần bắt đầu từ ngày hôm nay .</p>\r\n\r\n<p><strong><em>Hân hạnh kính chào</em></strong></p>', 3.00, 0, 'GG6d_logo98ce.png', '2017-11-04', '2017-11-04', '2017-10-25 07:43:01', '2017-11-04 07:55:17'),
(4, 'Halloween 2017', 'halloween-2017', '<p>Sự kiện halloween được tổ chức tại nhà hàng&nbsp;<strong>Food</strong>&nbsp;với nhiều ưu đãi hấp dẫn giảm giá hàng loạt các món ăn truyền thống hay hiện đại chị trong vòng 1 tuần bắt đầu từ ngày hôm nay .</p>\r\n\r\n<p><strong><em>Hân hạnh kính chào</em></strong></p>', 30.00, 0, 'http://starevent.vn/wp-content/uploads/to-chuc-su-kien-halloween-1.jpg', '2017-11-25', '2017-11-25', '2017-11-04 07:38:17', '2017-11-26 03:21:54');

-- --------------------------------------------------------

--
-- Structure de la table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `idThanhToan` int(10) UNSIGNED NOT NULL,
  `tenMon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaMonAn` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `maBan` int(10) UNSIGNED NOT NULL,
  `trangThai` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `thanhtoan`
--

INSERT INTO `thanhtoan` (`idThanhToan`, `tenMon`, `giaMonAn`, `soLuong`, `maBan`, `trangThai`, `ngayDat`, `created_at`, `updated_at`) VALUES
(1, 'Cá kho', 30000, 2, 82, 0, '2017-11-24', '2017-11-23 17:11:45', '2017-11-24 18:48:13'),
(2, 'Gà kho', 35000, 2, 82, 1, '2017-11-24', '2017-11-23 17:11:45', '2017-11-23 17:33:30'),
(3, 'Thịt kho hột vịt nam bộ', 800000, 1, 82, 1, '2017-11-24', '2017-11-23 17:19:49', '2017-11-23 19:19:53'),
(4, 'Rau muống xào tỏi', 10000, 1, 82, 1, '2017-11-24', '2017-11-23 17:30:37', '2017-11-23 19:19:53'),
(5, 'Mực xào cần tỏi', 50000, 1, 82, 1, '2017-11-24', '2017-11-23 17:30:37', '2017-11-23 19:19:53'),
(6, 'Cua rang me', 50000, 1, 82, 1, '2017-11-24', '2017-11-23 17:31:20', '2017-11-23 19:19:53'),
(7, 'Canh chua ca ro', 700000, 0, 82, 1, '2017-11-24', '2017-11-23 17:32:09', '2017-11-23 19:18:29'),
(8, 'Cá kho', 30000, 5, 83, 1, '2017-11-25', '2017-11-24 18:25:53', '2017-11-24 18:27:38'),
(9, 'Gà kho', 35000, 2, 83, 1, '2017-11-25', '2017-11-24 18:25:53', '2017-11-24 18:27:38'),
(10, 'Sài gòn special', 15000, 24, 83, 1, '2017-11-25', '2017-11-24 18:26:50', '2017-11-24 18:27:38'),
(11, 'Thịt kho hột vịt nam bộ', 800000, 1, 84, 1, '2017-11-25', '2017-11-24 18:30:49', '2017-11-24 18:32:42'),
(12, 'Kho quẹt', 30000, 1, 84, 1, '2017-11-25', '2017-11-24 18:30:49', '2017-11-24 18:44:56');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `banan`
--
ALTER TABLE `banan`
  ADD PRIMARY KEY (`maBan`);

--
-- Index pour la table `cauhinh`
--
ALTER TABLE `cauhinh`
  ADD PRIMARY KEY (`idCauhinh`);

--
-- Index pour la table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`idDoanhThu`);

--
-- Index pour la table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `loaimon`
--
ALTER TABLE `loaimon`
  ADD PRIMARY KEY (`idLoaiMon`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`idMonAn`),
  ADD KEY `monan_idloaimon_foreign` (`idLoaiMon`);

--
-- Index pour la table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`idPhanQuyen`),
  ADD KEY `phanquyen_username_foreign` (`username`);

--
-- Index pour la table `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`idSuKien`);

--
-- Index pour la table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`idThanhToan`),
  ADD KEY `thanhtoan_maban_foreign` (`maBan`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `banan`
--
ALTER TABLE `banan`
  MODIFY `maBan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `cauhinh`
--
ALTER TABLE `cauhinh`
  MODIFY `idCauhinh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `doanhthu`
--
ALTER TABLE `doanhthu`
  MODIFY `idDoanhThu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `loaimon`
--
ALTER TABLE `loaimon`
  MODIFY `idLoaiMon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `monan`
--
ALTER TABLE `monan`
  MODIFY `idMonAn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `idPhanQuyen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `idSuKien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `idThanhToan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_idloaimon_foreign` FOREIGN KEY (`idLoaiMon`) REFERENCES `loaimon` (`idLoaiMon`) ON DELETE CASCADE;

--
-- Contraintes pour la table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_username_foreign` FOREIGN KEY (`username`) REFERENCES `nhanvien` (`username`) ON DELETE CASCADE;

--
-- Contraintes pour la table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `thanhtoan_maban_foreign` FOREIGN KEY (`maBan`) REFERENCES `banan` (`maBan`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
