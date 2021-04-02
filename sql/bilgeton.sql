-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Nis 2021, 02:42:38
-- Sunucu sürümü: 10.4.16-MariaDB
-- PHP Sürümü: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bilgeton`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `about_content` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_content`) VALUES
(1, 'Bilgeton', '<p>Lorem Ipsum Nedir?</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/bilgeton/nedmin/dimg/upload/1979902108.jpg\" style=\"height:109px; width:300px\" /></p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(11) NOT NULL,
  `admins_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_file` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `admins_must` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_name`, `admins_surname`, `admins_file`, `admins_username`, `admins_password`, `admins_status`, `admins_must`) VALUES
(1, 'Ali', 'Onar', '605e8996b8a21.png', 'tunacan', 'e10adc3949ba59abbe56e057f20f883e', '1', 2),
(3, 'sadsa', 'dsadasd', '605eb770443ee.png', 'sdsad', 'e10adc3949ba59abbe56e057f20f883e', '1', 1),
(4, 'asd', 'asd', '605e5e736e15e.png', 'asd', '7815696ecbf1c96e6894b779456d330e', '1', 0),
(5, 'asd', 'asd', '', 'asd', 'asd', '1', 3),
(6, 'asd', 'asd', '', 'asd', 'asd', '1', 5),
(7, 'Test', 'test', '605e67336a67f.png', 'test', 'fb469d7ef430b0baf0cab6c436e70375', '1', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `blogs_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blogs_file` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `blogs_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `blogs_content` text COLLATE utf8_turkish_ci NOT NULL,
  `blogs_time` datetime NOT NULL DEFAULT current_timestamp(),
  `blogs_tag` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `blogs_star` int(11) NOT NULL,
  `blogs_must` int(11) NOT NULL,
  `blogs_slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`blogs_id`, `users_id`, `category_id`, `blogs_file`, `blogs_title`, `blogs_content`, `blogs_time`, `blogs_tag`, `blogs_star`, `blogs_must`, `blogs_slug`) VALUES
(1, 15, 3, 'elsa.png', 'Deneme-01', 'Lorem Ipsum Nedir?\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.\r\n\r\nNeden Kullanırız?\r\nYinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir.', '2021-03-30 00:35:40', 'deneme1, deneme2, deneme3, deneme4', 0, 0, 'Deneme-01'),
(2, 16, 2, '4-2-blogging-picture.png', 'Test-01', 'Nereden Gelir?\r\nYaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock, bir Lorem Ipsum pasajında geçen ve anlaşılması en güç sözcüklerden biri olan \'consectetur\' sözcüğünün klasik edebiyattaki örneklerini incelediğinde kesin bir kaynağa ulaşmıştır. Lorm Ipsum, Çiçero tarafından M.Ö. 45 tarihinde kaleme alınan \"de Finibus Bonorum et Malorum\" (İyi ve Kötünün Uç Sınırları) eserinin 1.10.32 ve 1.10.33 sayılı bölümlerinden gelmektedir. Bu kitap, ahlak kuramı üzerine bir tezdir ve Rönesans döneminde çok popüler olmuştur. Lorem Ipsum pasajının ilk satırı olan \"Lorem ipsum dolor sit amet\" 1.10.32 sayılı bölümdeki bir satırdan gelmektedir.\r\n\r\n1500\'lerden beri kullanılmakta olan standard Lorem Ipsum metinleri ilgilenenler için yeniden üretilmiştir. Çiçero tarafından yazılan 1.10.32 ve 1.10.33 bölümleri de 1914 H. Rackham çevirisinden alınan İngilizce sürümleri eşliğinde özgün biçiminden yeniden üretilmiştir.\r\n\r\nNereden Bulabilirim?\r\nLorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir. Eğer bir Lorem Ipsum pasajı kullanacaksanız, metin aralarına utandırıcı sözcükler gizlenmediğinden emin olmanız gerekir. İnternet\'teki tüm Lorem Ipsum üreteçleri önceden belirlenmiş metin bloklarını yineler. Bu da, bu üreteci İnternet üzerindeki gerçek Lorem Ipsum üreteci yapar. Bu üreteç, 200\'den fazla Latince sözcük ve onlara ait cümle yapılarını içeren bir sözlük kullanır. Bu nedenle, üretilen Lorem Ipsum metinleri yinelemelerden, mizahtan ve karakteristik olmayan sözcüklerden uzaktır.', '2021-03-30 00:35:40', 'test1, test2, test3', 0, 0, 'Test-01'),
(3, 17, 4, 'color-wing-transparent-set_1284-8933.jpg', 'Curabitur maximus ut arcu sed tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed ornare purus. Nunc vel nulla non quam scelerisque sodales. Phasellus dignissim pulvinar nunc, in bibendum urna aliquam sed. Nam scelerisque porta tortor, in commodo ante fringilla quis. In fermentum, orci sagittis congue viverra, lorem sapien hendrerit dui, eu mollis purus ipsum eget arcu. Praesent mollis gravida turpis eget sagittis. Integer mi turpis, placerat in velit ut, tincidunt scelerisque arcu. Nulla sit amet ipsum sed neque cursus ultrices. Etiam gravida fermentum leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n\r\nPraesent pulvinar lacus orci, at viverra metus placerat non. Vivamus non ultrices lacus. Morbi tristique vulputate sem eget rhoncus. Mauris hendrerit diam a laoreet pulvinar. Donec rutrum magna sit amet sagittis auctor. Phasellus pretium arcu bibendum lacus suscipit, vitae blandit arcu varius. Nam in mauris aliquam magna ullamcorper faucibus. Duis vestibulum, neque a porttitor tristique, nisl risus feugiat ex, in vulputate ligula mi nec sapien. Suspendisse sit amet dapibus sapien, vitae tristique erat. Nulla ac sodales risus. Vivamus vestibulum nunc mi, eget ultrices mauris commodo non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer malesuada tempor turpis vel malesuada. Praesent scelerisque venenatis mauris, eget molestie dui semper pulvinar.\r\n\r\nQuisque lobortis fermentum urna, sed viverra justo gravida ac. Integer dapibus pellentesque sapien eu rutrum. Sed ut iaculis justo. Nulla facilisi. Curabitur a sapien purus. Nulla in vehicula metus. Vivamus scelerisque ut elit quis rutrum. Nam suscipit metus in iaculis imperdiet. Nulla luctus, enim eu elementum dapibus, diam mauris rutrum nulla, ut imperdiet nunc dolor eu est. Vivamus ac sollicitudin nisi. Sed consectetur finibus commodo. In hac habitasse platea dictumst. Vivamus tellus mauris, molestie vitae orci eu, fermentum commodo odio. Aenean mattis felis lectus, nec consectetur erat lobortis quis. Donec in tempus justo, quis imperdiet dolor.\r\n\r\nCurabitur maximus ut arcu sed tempor. Aenean aliquet blandit aliquet. Aliquam dignissim semper nisl, varius vestibulum ligula pretium at. Donec ornare nisl vitae arcu dapibus, et dignissim dolor posuere. Quisque lobortis eros eget magna tempus, at viverra turpis gravida. Praesent iaculis feugiat tellus vitae efficitur. Curabitur consectetur purus ac aliquet molestie. Aliquam id est tellus.\r\n\r\nEtiam ultrices venenatis lectus, ac convallis ex iaculis scelerisque. Morbi posuere, massa et luctus porttitor, ante massa hendrerit metus, eu mattis enim metus id lacus. Vivamus condimentum enim a velit mattis pretium. Integer purus lorem, tristique et bibendum a, tristique sed mi. Ut faucibus est nisl, non rhoncus orci tincidunt ac. Nam blandit ipsum nec ipsum vehicula lobortis. Praesent at convallis neque. Integer vitae quam porta, sagittis magna sit amet, euismod lectus. Quisque in arcu nec ante tristique commodo. Ut at faucibus urna. Maecenas sed ligula porttitor arcu feugiat iaculis. Suspendisse pellentesque lorem purus, sed fermentum nunc euismod eget. Maecenas sodales risus non risus dictum, sed blandit nisl vehicula. Sed euismod massa a libero mollis, vel interdum ex pretium. Donec dictum nunc eget mi iaculis gravida. Integer varius urna non mattis cursus.', '2021-03-31 11:50:30', 'lorem, ipsum, data, content', 0, 0, ''),
(4, 20, 6, 'jpg-vs-png.png', 'Vivamus ac sollicitudin nisi', 'Praesent pulvinar lacus orci, at viverra metus placerat non. Vivamus non ultrices lacus. Morbi tristique vulputate sem eget rhoncus. Mauris hendrerit diam a laoreet pulvinar. Donec rutrum magna sit amet sagittis auctor. Phasellus pretium arcu bibendum lacus suscipit, vitae blandit arcu varius. Nam in mauris aliquam magna ullamcorper faucibus. Duis vestibulum, neque a porttitor tristique, nisl risus feugiat ex, in vulputate ligula mi nec sapien. Suspendisse sit amet dapibus sapien, vitae tristique erat. Nulla ac sodales risus. Vivamus vestibulum nunc mi, eget ultrices mauris commodo non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer malesuada tempor turpis vel malesuada. Praesent scelerisque venenatis mauris, eget molestie dui semper pulvinar.\r\n\r\nQuisque lobortis fermentum urna, sed viverra justo gravida ac. Integer dapibus pellentesque sapien eu rutrum. Sed ut iaculis justo. Nulla facilisi. Curabitur a sapien purus. Nulla in vehicula metus. Vivamus scelerisque ut elit quis rutrum. Nam suscipit metus in iaculis imperdiet. Nulla luctus, enim eu elementum dapibus, diam mauris rutrum nulla, ut imperdiet nunc dolor eu est. Vivamus ac sollicitudin nisi. Sed consectetur finibus commodo. In hac habitasse platea dictumst. Vivamus tellus mauris, molestie vitae orci eu, fermentum commodo odio. Aenean mattis felis lectus, nec consectetur erat lobortis quis. Donec in tempus justo, quis imperdiet dolor.\r\n\r\nCurabitur maximus ut arcu sed tempor. Aenean aliquet blandit aliquet. Aliquam dignissim semper nisl, varius vestibulum ligula pretium at. Donec ornare nisl vitae arcu dapibus, et dignissim dolor posuere. Quisque lobortis eros eget magna tempus, at viverra turpis gravida. Praesent iaculis feugiat tellus vitae efficitur. Curabitur consectetur purus ac aliquet molestie. Aliquam id est tellus.\r\n\r\nEtiam ultrices venenatis lectus, ac convallis ex iaculis scelerisque. Morbi posuere, massa et luctus porttitor, ante massa hendrerit metus, eu mattis enim metus id lacus. Vivamus condimentum enim a velit mattis pretium. Integer purus lorem, tristique et bibendum a, tristique sed mi. Ut faucibus est nisl, non rhoncus orci tincidunt ac. Nam blandit ipsum nec ipsum vehicula lobortis. Praesent at convallis neque. Integer vitae quam porta, sagittis magna sit amet, euismod lectus. Quisque in arcu nec ante tristique commodo. Ut at faucibus urna. Maecenas sed ligula porttitor arcu feugiat iaculis. Suspendisse pellentesque lorem purus, sed fermentum nunc euismod eget. Maecenas sodales risus non risus dictum, sed blandit nisl vehicula. Sed euismod massa a libero mollis, vel interdum ex pretium. Donec dictum nunc eget mi iaculis gravida. Integer varius urna non mattis cursus.', '2021-03-31 11:50:30', 'php, mysql, jquery, javascript', 0, 0, ''),
(5, 18, 5, 'unnamed.png', 'Aliquam dignissim semper nisl', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2021-03-31 11:52:27', 'blogs, tag, lorem, ipsum', 0, 0, ''),
(6, 19, 6, 'jeep.png', 'massa et luctus porttitor', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2021-03-31 11:52:27', 'lorem, ipsum, history, huns', 0, 0, ''),
(8, 15, 3, 'jeep.png', 'test 2', 'test 2', '2021-03-31 15:09:01', 'test 2', 0, 0, ''),
(9, 15, 4, 'spoti.png', 'test 3', 'test 3', '2021-03-31 15:31:32', 'test 3', 0, 0, 'test-3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `category_icon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `category_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `category_highlight` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_icon`, `category_status`, `category_highlight`) VALUES
(1, 'Edebiyat', 'lni lni-library', '1', '0'),
(2, 'Bilim', 'lni lni-cloud-check', '1', '0'),
(3, 'Yazılım', 'lni lni-database', '1', '0'),
(4, 'Mühendislik', 'lni lni-certificate', '1', '0'),
(5, 'YKS', 'lni lni-book', '1', '0'),
(6, 'Türk Tarihi', 'lni lni-shield', '1', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `settings_description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `settings_key` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `settings_value` text COLLATE utf8_turkish_ci NOT NULL,
  `settings_type` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `settings_must` int(3) NOT NULL,
  `settings_delete` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `settings_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_must`, `settings_delete`, `settings_status`) VALUES
(1, 'Site Başlığı', 'title', 'Bilgeton CMS Paneli', 'text', 0, '0', '1'),
(3, 'Site Açıklama', 'description', '<p>Bilgeton <strong>CMS</strong> Paneli A&ccedil;ıklaması</p>\r\n', 'ckeditor', 0, '0', '1'),
(4, 'Site Logo', 'logo', '60606f76b24d3.jpg', 'file', 0, '0', '1'),
(5, 'Site Icon', 'icon', '605e1d1b448f9.jpg', 'file', 0, '0', '1'),
(6, 'Tel No:', 'phone', '0545 230 1849', 'text', 0, '0', '1'),
(7, 'Mail Adresi', 'email', 'alitunacanonar@icloud.com', 'text', 0, '0', '1'),
(8, 'İlçe', 'district', 'Beşiktaş', 'text', 0, '0', '1'),
(9, 'il', 'province', 'İstanbul', 'text', 0, '0', '1'),
(10, 'Adres', 'address', 'BKM Karşısı', 'textarea', 0, '0', '1'),
(11, 'Sosyal Linkedin', 'linkedin', 'https://www.linkedin.com/in/ali-tunacan-onar/', 'text', 0, '0', '1'),
(12, 'Anahtar Kelimeler', 'keywords', 'cms, panel, bilgeton, oop', 'text', 0, '0', '1'),
(13, 'Site Sahibi', 'author', 'Ali Tunacan Onar', 'text', 0, '', ''),
(14, 'Copyright Footer', 'copyright', '© 2021 Bilgeton. Designd By <a target=\"_blank\" href=\"https://www.linkedin.com/in/ali-tunacan-onar/\">Ali Onar</a>', 'text', 0, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `users_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `users_slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `users_bio` text COLLATE utf8_turkish_ci NOT NULL,
  `users_location` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `users_file` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `users_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `users_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `users_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `users_must` int(3) NOT NULL,
  `users_facebook` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `users_twitter` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `users_instagram` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `users_linkedin` varchar(60) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_title`, `users_slug`, `users_bio`, `users_location`, `users_file`, `users_mail`, `users_password`, `users_status`, `users_must`, `users_facebook`, `users_twitter`, `users_instagram`, `users_linkedin`) VALUES
(15, 'Kaan Yıldız', 'Elektrik Elektronik Mühendisii', 'kaan-yildiz', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Samsun', '606430fa15b77.png', 'kaan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, '', '', '', ''),
(16, 'Ali Onar', 'PHP Developer', 'ali-onar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Tokat', '606375df86f18.png', 'ali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'www.linkedin.com'),
(17, 'Türkan Yılmaz', 'Edebiyat Öğretmeni', 'turkan-yilmaz', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 'Aydın', '60643117686a6.png', 'turkan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, '', '', '', ''),
(18, 'Nur Şahin', 'NASA Scientist in Biology', 'nur-sahin', 'Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir. Eğer bir Lorem Ipsum pasajı kullanacaksanız, metin aralarına utandırıcı sözcükler gizlenmediğinden emin olmanız gerekir. İnternet\'teki tüm Lorem Ipsum üreteçleri önceden belirlenmiş metin bloklarını yineler. Bu da, bu üreteci İnternet üzerindeki gerçek Lorem Ipsum üreteci yapar. Bu üreteç, 200\'den fazla Latince sözcük ve onlara ait cümle yapılarını içeren bir sözlük kullanır. Bu nedenle, üretilen Lorem Ipsum metinleri yinelemelerden, mizahtan ve karakteristik olmayan sözcüklerden uzaktır.', 'DC', '6064312cc9e8b.png', 'nur@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, '', '', '', ''),
(19, 'Adem Noyan', 'Software Engineer at X', 'adem-noyan', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 'Antalya', '606431409d5ee.png', 'adem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, '', '', '', ''),
(20, 'Furkan Sütçüoğlu', 'Co-Founder at T-Soft', 'furkan-sutcuoglu', 'Aliquam orci quam, lacinia id fringilla vitae, cursus non neque. Phasellus facilisis dapibus tempor. Nulla dignissim lacinia bibendum. Aliquam tempus iaculis nibh, vel iaculis velit pharetra at. Etiam nisi tortor, sodales vel sodales eu, sollicitudin quis leo. Integer varius, risus nec porta fermentum, lacus elit efficitur tellus, in tristique orci felis id lacus. Suspendisse gravida ligula purus, ac venenatis orci pharetra ut. Proin nulla ipsum, vulputate a aliquet at, malesuada quis leo. Duis finibus maximus nisl vitae laoreet. Quisque vestibulum erat vel tellus tincidunt, in suscipit dui bibendum. Pellentesque blandit nisl sit amet orci sodales pellentesque.', 'İstanbul', '6064314a3b843.png', 'furkan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, '', '', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogs_id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
