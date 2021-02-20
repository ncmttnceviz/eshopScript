-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Oca 2021, 21:28:09
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eshop`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` varchar(255) NOT NULL,
  `addressTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addressDescription` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zipCode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mainBanner` varchar(255) NOT NULL,
  `mainBannerTitle` varchar(255) NOT NULL,
  `mainBannerText` varchar(255) NOT NULL,
  `mainBannerRoute` int(11) NOT NULL,
  `mainBannerLink` varchar(255) NOT NULL,
  `topBannerOne` varchar(255) NOT NULL,
  `topBannerOneTitle` varchar(255) NOT NULL,
  `topBannerOneText` varchar(255) NOT NULL,
  `topBannerOneRoute` int(11) NOT NULL,
  `topBannerOneLink` varchar(255) NOT NULL,
  `topBannerTwo` varchar(255) NOT NULL,
  `topBannerTwoTitle` varchar(255) NOT NULL,
  `topBannerTwoText` varchar(255) NOT NULL,
  `topBannerTwoRoute` int(11) NOT NULL,
  `topBannerTwoLink` varchar(255) NOT NULL,
  `topBannerThree` varchar(255) NOT NULL,
  `topBannerThreeTitle` varchar(255) NOT NULL,
  `topBannerThreeText` varchar(255) NOT NULL,
  `topBannerThreeRoute` int(11) NOT NULL,
  `topBannerThreeLink` varchar(255) NOT NULL,
  `midBannerOne` varchar(255) NOT NULL,
  `midBannerOneTitle` varchar(255) NOT NULL,
  `midBannerOneText` varchar(255) NOT NULL,
  `midBannerOneRoute` int(11) NOT NULL,
  `midBannerOneLink` varchar(255) NOT NULL,
  `midBannerTwo` varchar(255) NOT NULL,
  `midBannerTwoTitle` varchar(255) NOT NULL,
  `midBannerTwoText` varchar(255) NOT NULL,
  `midBannerTwoRoute` int(11) NOT NULL,
  `midBannerTwoLink` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `banners`
--

INSERT INTO `banners` (`id`, `mainBanner`, `mainBannerTitle`, `mainBannerText`, `mainBannerRoute`, `mainBannerLink`, `topBannerOne`, `topBannerOneTitle`, `topBannerOneText`, `topBannerOneRoute`, `topBannerOneLink`, `topBannerTwo`, `topBannerTwoTitle`, `topBannerTwoText`, `topBannerTwoRoute`, `topBannerTwoLink`, `topBannerThree`, `topBannerThreeTitle`, `topBannerThreeText`, `topBannerThreeRoute`, `topBannerThreeLink`, `midBannerOne`, `midBannerOneTitle`, `midBannerOneText`, `midBannerOneRoute`, `midBannerOneLink`, `midBannerTwo`, `midBannerTwoTitle`, `midBannerTwoText`, `midBannerTwoRoute`, `midBannerTwoLink`, `created_at`, `updated_at`) VALUES
(1, 'images/mainBanner.jpg', 'Burası Afiş Başlığı', 'Burası Afiç Açıklama Metni', 0, '0', 'images/topBannerOne.webp', 'Burası Afiş Başlığı', 'Burası Afiş Açıklama Metni', 0, '0', 'images/topBannerTwo.webp', 'Burası Afiş Başlığı', 'Burası Afiş Açıklama Metni', 0, '0', 'images/topBannerThree.webp', 'Burası Afiş Başlığı', 'Burası Afiş Açıklama Metni', 0, '0', 'images/midBannerOne.webp', 'Burası Afiş Başlığı', 'Burası Afiş Açıklama Metni', 2, '0', 'images/midBannerTwo.webp', 'Burası Afiş Başlığı', 'Burası Afiş Açıklama Metni', 2, '0', NULL, '2021-01-28 20:52:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) NOT NULL,
  `numberOfProducts` int(11) NOT NULL,
  `addressID` int(1) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `mainCategoryID` int(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `metaTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metaDescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metaKeywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `hit` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `type`, `mainCategoryID`, `name`, `metaTitle`, `metaDescription`, `metaKeywords`, `permalink`, `status`, `hit`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Test Üst Kategori', 'Test Üst Kategori', 'Test Üst Kategori', 'Test Üst Kategori', 'test-ust-kategori', 0, '0', '2021-01-28 20:57:15', '2021-01-28 20:57:15'),
(2, 1, 1, 'Test Alt Kategorii', 'Test Alt Kategori', 'Test Alt Kategori', 'Test Alt Kategori', 'test-alt-kategorii', 0, '0', '2021-01-28 20:57:44', '2021-01-28 20:57:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `reply` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `orderNumber` varchar(255) NOT NULL,
  `deliveryAddress` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `numberOfProducts` int(11) NOT NULL,
  `price` double NOT NULL,
  `totalPrice` double NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `ShippingTrackingNumber` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `metaTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metaDescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metaKeywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0',
  `numberOfSales` int(11) NOT NULL,
  `amountPurchased` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `categoryID`, `name`, `metaTitle`, `metaDescription`, `metaKeywords`, `permalink`, `price`, `stock`, `hit`, `numberOfSales`, `amountPurchased`, `publish`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test Ürün', 'Test Ürün', 'Test Ürün', 'Test Ürün', 'test-urun', 12.12, 144, 11, 4, 6, 1, 0, '2021-01-28 21:01:55', '2021-01-28 21:16:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productID` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `productID`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/test-urun1986.jpg', '2021-01-28 21:01:56', '2021-01-28 21:01:56'),
(2, 1, 'images/test-urun5547.jpg', '2021-01-28 21:01:56', '2021-01-28 21:01:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderNumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `subTotal` double NOT NULL,
  `shippingPrice` double NOT NULL,
  `cartTotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_configs`
--

CREATE TABLE `site_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siteName` varchar(255) NOT NULL,
  `metaTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metaDescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metaKeywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `mailAddress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mailHost` varchar(255) NOT NULL,
  `mailSmtpPort` int(11) NOT NULL,
  `mailEncryption` varchar(3) NOT NULL,
  `mailUser` varchar(255) NOT NULL,
  `mailPassword` varchar(255) NOT NULL,
  `SocialFacebook` varchar(255) NOT NULL,
  `SocialTwitter` varchar(255) NOT NULL,
  `SocialInstagram` varchar(255) NOT NULL,
  `SocialPinterest` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `aboutus` text NOT NULL,
  `termsConditions` text NOT NULL,
  `privacyPolicy` text NOT NULL,
  `shippingPrice` double NOT NULL,
  `freeShippingThreshold` double NOT NULL,
  `paymentApi` varchar(255) DEFAULT NULL,
  `paymentSecretKey` varchar(255) DEFAULT NULL,
  `paymentBaseUrl` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `site_configs`
--

INSERT INTO `site_configs` (`id`, `siteName`, `metaTitle`, `metaDescription`, `metaKeywords`, `address`, `phoneNumber`, `logo`, `mailAddress`, `mailHost`, `mailSmtpPort`, `mailEncryption`, `mailUser`, `mailPassword`, `SocialFacebook`, `SocialTwitter`, `SocialInstagram`, `SocialPinterest`, `language`, `aboutus`, `termsConditions`, `privacyPolicy`, `shippingPrice`, `freeShippingThreshold`, `paymentApi`, `paymentSecretKey`, `paymentBaseUrl`, `created_at`, `updated_at`) VALUES
(1, 'eShop', 'Title Alanı', 'Description Alanı', 'Keywords Alanı', 'Yücetepe, Akdeniz Cd. No:31, 06570 Çankaya/Ankara', '0555 555 55 55', 'images/logox.png', '', '', 0, '', '', '', 'https://tr-tr.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://tr.pinterest.com/', 'tr', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus labore, ducimus rerum. Debitis voluptatibus molestiae repellat sapiente libero id explicabo officiis illum, distinctio, dolore facilis enim asperiores tenetur accusantium at.</div> <div>Nam aut nesciunt modi aliquam nemo eius vero illo provident tenetur repellat inventore reiciendis hic, officia neque esse, porro laudantium asperiores nostrum iste deleniti harum iusto dolores culpa sit. Illo.</div> <div>Perspiciatis dolores, aliquam error, numquam cumque veniam nisi impedit voluptate necessitatibus quos accusantium distinctio magni quisquam voluptates at ipsum aut repellat. Nam sint facilis earum inventore voluptates totam sit, ipsam.</div> <div>Laborum dicta, debitis accusamus quos adipisci, tempore autem esse cupiditate nobis sunt ab fuga eaque vel itaque iste officiis exercitationem alias illum! Vel animi, rem ex aperiam. Provident, placeat, minima.</div> <div>Consequuntur nisi illum odit, odio id, quis earum voluptate aperiam corporis ipsa rerum exercitationem veritatis repudiandae totam beatae expedita enim quisquam sunt assumenda nemo omnis architecto. Perspiciatis hic dolores in.</div> <div>Eius corporis, totam expedita! Fugiat cumque optio quos distinctio ex maxime, explicabo, sint quo tempora perspiciatis iusto iure, iste rem illum quia dignissimos accusantium. Nobis aut rem, nihil necessitatibus excepturi?</div> <div>Mollitia doloremque repellendus rerum maxime libero cum, officia iure suscipit fugiat illum voluptatibus doloribus sint neque ipsa dolores temporibus blanditiis eum laboriosam adipisci eos! Modi maiores eius quae voluptatibus maxime?</div> <div>Doloribus exercitationem officiis soluta, provident expedita sequi saepe voluptatum maxime recusandae, quis sit explicabo pariatur eius quae! Laborum nostrum corporis ab ducimus fugit, cum mollitia. Iste recusandae provident ratione excepturi!</div> <div>Sunt fugit repellendus, suscipit ab atque qui quibusdam! Et, nihil voluptates. Aspernatur minima magni mollitia voluptatibus, veritatis, odio quidem corporis libero a, suscipit beatae odit nobis alias impedit assumenda voluptatem!</div> <div>Repellendus nihil ea doloribus expedita minus consectetur, velit distinctio enim voluptatum odio magnam accusamus dolorum, temporibus labore eos cupiditate excepturi quo dolorem asperiores. Veritatis ipsa ut harum minima eaque neque.</div> <div>Asperiores obcaecati, totam minus vero vitae omnis ipsam dolores id aliquam fugit, numquam non reiciendis. Recusandae, quidem iusto nobis quaerat, expedita dolorem natus dolor corporis numquam delectus libero quae aut!</div> <div>Ex odio distinctio totam, est fugit ea, iste adipisci porro hic libero eius! Alias officia quas cupiditate hic reprehenderit assumenda iste, quam, eum sunt adipisci illum voluptates voluptate sit? Temporibus.</div> <div>Temporibus ratione ut quam, unde asperiores animi nobis quisquam perspiciatis a amet explicabo obcaecati, ipsa nesciunt rem blanditiis quae distinctio accusamus, consequuntur? Facere qui aut praesentium blanditiis earum quae sint?</div> <div>Officiis, enim beatae, nam sunt delectus architecto placeat nobis dolorum molestias tempora ullam quam numquam repellendus nesciunt id laboriosam repellat voluptatum magnam hic eaque, praesentium omnis error repudiandae ipsam! Accusamus.</div> <div>Cupiditate ad accusantium recusandae expedita maxime ipsa laboriosam dolorum voluptatibus esse culpa quae nostrum corrupti animi consequuntur rerum dolores fugit officia velit libero beatae sit, voluptatum accusamus. Cumque, ex. Autem.</div> <div>Sint debitis, veniam veritatis, molestias, at necessitatibus ratione accusantium atque assumenda expedita ut in consequatur dolorem ex recusandae possimus consequuntur nostrum laborum qui voluptatibus. Possimus accusantium illo non eius distinctio.</div> <div>Nihil tenetur porro facere sed blanditiis, dicta aut cumque odit praesentium corporis quas molestias ad vero, iusto impedit mollitia corrupti. Vitae nulla, labore ab possimus deserunt debitis, aspernatur officia sunt!</div> <div>Nisi laudantium quasi ducimus nulla a necessitatibus doloribus voluptatibus beatae quam nobis aliquid neque eius cum architecto ipsa harum illum similique fuga provident, quod eligendi excepturi assumenda laborum. Aliquam, praesentium.</div> <div>Veniam, fugit error omnis a impedit adipisci quos rem perferendis ex recusandae maxime similique autem aperiam libero labore eligendi ipsa voluptatibus voluptate commodi, in, rerum accusamus quaerat. Ratione, quo, neque.</div> <div>Aut vel, ipsam quae eligendi. Consequuntur consequatur, deleniti hic sed officiis, eos alias, obcaecati harum in illum reiciendis nisi. Iure deserunt ipsam rerum nemo unde quas nostrum, omnis laboriosam consequatur!</div> <div>Itaque voluptate odit ullam rerum accusantium, officiis labore sunt deserunt praesentium iusto voluptatibus repellendus, dolorum, velit, quibusdam libero quae amet consequatur. Assumenda sapiente maxime voluptatibus praesentium, omnis iure perferendis dignissimos.</div> <div>Eveniet, modi, temporibus. Ex alias tempora optio nisi minima! Modi architecto iste ipsa laudantium ducimus labore repellat! Ipsa ad consequuntur voluptatem libero pariatur saepe perferendis, error, maiores quasi, quo necessitatibus!</div> <div>Atque obcaecati asperiores accusamus quis ad consequatur inventore officiis rem, magnam voluptatem molestiae ullam fuga vitae eligendi doloremque sint architecto molestias deserunt, aliquam placeat rerum minima! Consequatur sequi soluta, obcaecati.</div> <div>Perferendis ea at explicabo est nam saepe eos odio sunt optio itaque modi expedita quibusdam esse facilis similique assumenda libero autem neque ipsam ratione vel fugiat, porro cum reprehenderit obcaecati.</div> <div>Itaque error doloribus voluptatibus amet assumenda deleniti alias adipisci eius ab, facilis ut soluta vero, laudantium nesciunt commodi magni! Odio dolorum repudiandae quaerat dolor, tenetur iste est dignissimos amet, quod?</div> <div>Atque quae quibusdam provident quos ipsa, perspiciatis praesentium ex qui, tempore, deleniti non dicta nam! Et, perspiciatis incidunt ea delectus quam, similique quisquam sint, eveniet id, voluptatibus molestias eaque necessitatibus.</div> <div>Perspiciatis ratione, ipsam illo amet, neque earum culpa dolore! Assumenda mollitia, voluptatem, quis dignissimos delectus excepturi fugit voluptatibus quia magni facilis consequatur vero iste necessitatibus officia reiciendis velit corrupti exercitationem.</div> <div>Eum dolorum nam fuga soluta sunt vitae quod omnis, sequi ea quaerat dolorem voluptatum odit ad maxime aperiam, quia voluptates nostrum doloremque ducimus! Voluptates quia tenetur at expedita optio nostrum.</div> <div>Aliquam nesciunt saepe et, hic quo possimus similique officiis, numquam voluptatem, nulla ad eaque! Error nisi itaque assumenda? Veniam, aliquid quos, minima cumque ea cum iusto sit iure illum quis!</div> <div>Doloremque eius vero laborum voluptatum sequi quaerat laboriosam reiciendis iure beatae, natus illo fugit quae esse maxime soluta minima modi sunt cumque suscipit consequatur molestias exercitationem cum eveniet provident. Veritatis.</div> <div>Sunt vel, eos enim optio unde ea natus praesentium perferendis omnis, rerum labore fugit, ullam laboriosam animi libero corrupti asperiores id alias. Assumenda, dolorum incidunt praesentium magni nulla odit rerum!</div> <div>Obcaecati qui officiis laborum distinctio tenetur quisquam necessitatibus dolor ab, omnis accusamus, harum veniam. Ratione accusamus dolores, dolore dolorem velit aut quis quibusdam asperiores ab quo vel, nobis veritatis laboriosam.</div> <div>Eos quisquam nemo illum minus, veniam libero delectus cupiditate sint et veritatis laudantium iure earum aut explicabo quasi, optio eaque reprehenderit recusandae. Non temporibus necessitatibus, vel deleniti ullam incidunt enim.</div> <div>Distinctio praesentium velit natus voluptatem aliquam. Debitis, corrupti, voluptate at fugiat veritatis voluptates est veniam inventore! Laudantium, repudiandae, corporis earum amet laborum porro omnis ipsa magni ratione voluptatem, nihil voluptate.</div> <div>Nostrum rem blanditiis consequuntur obcaecati, ex eveniet optio, perferendis consequatur odio velit sunt asperiores accusamus molestiae aliquam accusantium unde sapiente veniam pariatur illum quas in, dignissimos vitae. Eius vitae, impedit.</div> <div>Omnis eaque deleniti quas maiores maxime, molestias rem reiciendis quo reprehenderit. Facere fuga porro enim aut rerum eveniet quam vero corporis labore aliquam, nisi nam consectetur velit. Quidem, iusto, aspernatur.</div> <div>Repellat eligendi veniam aliquam, similique error quod fugiat molestiae aut quam, cupiditate, obcaecati aspernatur officia qui perferendis aliquid voluptates tempore explicabo impedit asperiores itaque facilis eveniet, sit modi accusamus! Distinctio?</div> <div>Soluta autem, repellat quos doloremque officiis animi, suscipit voluptatum laudantium totam voluptatem quia ab beatae quod voluptate earum, culpa ullam hic consectetur ducimus? Illum numquam architecto unde eveniet odio officiis.</div> <div>Enim sapiente similique sed aperiam? Nulla magni vitae quo totam, id, rerum accusantium error blanditiis magnam. Maiores, est, aut! Vitae reprehenderit rerum, iusto porro asperiores unde perspiciatis in maxime pariatur.</div> <div>Exercitationem libero, magni quidem. Eum saepe quo, ullam et dolores quam harum eius eveniet est obcaecati, tenetur dolorem, excepturi sequi, inventore autem? Blanditiis pariatur iure mollitia sed voluptates voluptate officia.</div> <div>Dolorem, eum earum accusamus voluptatum rerum incidunt ut explicabo perspiciatis nesciunt! Minima cumque, minus incidunt delectus quas nulla voluptatem sapiente saepe facilis totam, dolore enim odit magni inventore, blanditiis harum!</div> <div>Aliquam corporis veritatis ipsum quas, rerum numquam accusantium aliquid suscipit inventore aperiam itaque, mollitia debitis? Blanditiis excepturi quod sunt, expedita non, harum eveniet veritatis, odit, incidunt doloribus inventore esse alias?</div> <div>Esse voluptatum vel enim nesciunt optio inventore, quam iusto nostrum, ab nisi porro eaque repudiandae dolore numquam! Explicabo cupiditate consequatur totam quia, dolores laudantium maxime fugit voluptas, nulla dicta praesentium.</div> <div>Veniam suscipit, nostrum hic odit accusantium delectus aperiam recusandae ducimus excepturi! Veritatis, est ratione voluptatem cumque magni alias, doloribus enim facere. Vero velit in, dolores fugit cumque ex. Consequatur, minus?</div> <div>Error explicabo eligendi, esse quisquam eaque animi quae aperiam, quo possimus ipsa molestiae ipsum fugit, inventore dolorem veniam doloribus sed ut! Unde, odio! Saepe, harum, dolor pariatur animi natus laudantium.</div> <div>Nobis iusto enim quas nisi dolor corporis voluptas ipsa deserunt eligendi, vitae saepe at? Sint impedit natus cum, maiores tempore, exercitationem pariatur ullam ducimus deleniti, odit dolore assumenda! Odit, eius.</div> <div>Eligendi porro voluptatem molestias commodi id optio. Voluptate alias cum facilis eveniet, iure ullam blanditiis. Similique quidem impedit, tempore possimus ad voluptas nostrum cupiditate, dolore hic eligendi officia nihil quibusdam.</div> <div>Distinctio quasi cupiditate iusto, numquam suscipit commodi mollitia facilis ipsam et explicabo praesentium debitis ullam tempora deserunt ut non similique asperiores, eaque, reiciendis, perferendis tenetur blanditiis in illo. Ex, assumenda.</div> <div>Iusto consectetur commodi soluta ab, quaerat vero corporis cumque assumenda quisquam minus, ad officiis inventore, magnam odit mollitia quasi nobis. Obcaecati repellat fuga, labore magni error illo saepe repellendus. Est.</div> <div>Reiciendis incidunt placeat nulla odit magni, beatae perferendis, odio officia rerum iure quisquam maiores officiis distinctio assumenda, libero error non ab pariatur quia dignissimos voluptas molestiae! Voluptates cumque, debitis suscipit.</div>', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus labore, ducimus rerum. Debitis voluptatibus molestiae repellat sapiente libero id explicabo officiis illum, distinctio, dolore facilis enim asperiores tenetur accusantium at.</div>\r\n<div>Nam aut nesciunt modi aliquam nemo eius vero illo provident tenetur repellat inventore reiciendis hic, officia neque esse, porro laudantium asperiores nostrum iste deleniti harum iusto dolores culpa sit. Illo.</div>\r\n<div>Perspiciatis dolores, aliquam error, numquam cumque veniam nisi impedit voluptate necessitatibus quos accusantium distinctio magni quisquam voluptates at ipsum aut repellat. Nam sint facilis earum inventore voluptates totam sit, ipsam.</div>\r\n<div>Laborum dicta, debitis accusamus quos adipisci, tempore autem esse cupiditate nobis sunt ab fuga eaque vel itaque iste officiis exercitationem alias illum! Vel animi, rem ex aperiam. Provident, placeat, minima.</div>\r\n<div>Consequuntur nisi illum odit, odio id, quis earum voluptate aperiam corporis ipsa rerum exercitationem veritatis repudiandae totam beatae expedita enim quisquam sunt assumenda nemo omnis architecto. Perspiciatis hic dolores in.</div>\r\n<div>Eius corporis, totam expedita! Fugiat cumque optio quos distinctio ex maxime, explicabo, sint quo tempora perspiciatis iusto iure, iste rem illum quia dignissimos accusantium. Nobis aut rem, nihil necessitatibus excepturi?</div>\r\n<div>Mollitia doloremque repellendus rerum maxime libero cum, officia iure suscipit fugiat illum voluptatibus doloribus sint neque ipsa dolores temporibus blanditiis eum laboriosam adipisci eos! Modi maiores eius quae voluptatibus maxime?</div>\r\n<div>Doloribus exercitationem officiis soluta, provident expedita sequi saepe voluptatum maxime recusandae, quis sit explicabo pariatur eius quae! Laborum nostrum corporis ab ducimus fugit, cum mollitia. Iste recusandae provident ratione excepturi!</div>\r\n<div>Sunt fugit repellendus, suscipit ab atque qui quibusdam! Et, nihil voluptates. Aspernatur minima magni mollitia voluptatibus, veritatis, odio quidem corporis libero a, suscipit beatae odit nobis alias impedit assumenda voluptatem!</div>\r\n<div>Repellendus nihil ea doloribus expedita minus consectetur, velit distinctio enim voluptatum odio magnam accusamus dolorum, temporibus labore eos cupiditate excepturi quo dolorem asperiores. Veritatis ipsa ut harum minima eaque neque.</div>\r\n<div>Asperiores obcaecati, totam minus vero vitae omnis ipsam dolores id aliquam fugit, numquam non reiciendis. Recusandae, quidem iusto nobis quaerat, expedita dolorem natus dolor corporis numquam delectus libero quae aut!</div>\r\n<div>Ex odio distinctio totam, est fugit ea, iste adipisci porro hic libero eius! Alias officia quas cupiditate hic reprehenderit assumenda iste, quam, eum sunt adipisci illum voluptates voluptate sit? Temporibus.</div>\r\n<div>Temporibus ratione ut quam, unde asperiores animi nobis quisquam perspiciatis a amet explicabo obcaecati, ipsa nesciunt rem blanditiis quae distinctio accusamus, consequuntur? Facere qui aut praesentium blanditiis earum quae sint?</div>\r\n<div>Officiis, enim beatae, nam sunt delectus architecto placeat nobis dolorum molestias tempora ullam quam numquam repellendus nesciunt id laboriosam repellat voluptatum magnam hic eaque, praesentium omnis error repudiandae ipsam! Accusamus.</div>\r\n<div>Cupiditate ad accusantium recusandae expedita maxime ipsa laboriosam dolorum voluptatibus esse culpa quae nostrum corrupti animi consequuntur rerum dolores fugit officia velit libero beatae sit, voluptatum accusamus. Cumque, ex. Autem.</div>\r\n<div>Sint debitis, veniam veritatis, molestias, at necessitatibus ratione accusantium atque assumenda expedita ut in consequatur dolorem ex recusandae possimus consequuntur nostrum laborum qui voluptatibus. Possimus accusantium illo non eius distinctio.</div>\r\n<div>Nihil tenetur porro facere sed blanditiis, dicta aut cumque odit praesentium corporis quas molestias ad vero, iusto impedit mollitia corrupti. Vitae nulla, labore ab possimus deserunt debitis, aspernatur officia sunt!</div>\r\n<div>Nisi laudantium quasi ducimus nulla a necessitatibus doloribus voluptatibus beatae quam nobis aliquid neque eius cum architecto ipsa harum illum similique fuga provident, quod eligendi excepturi assumenda laborum. Aliquam, praesentium.</div>\r\n<div>Veniam, fugit error omnis a impedit adipisci quos rem perferendis ex recusandae maxime similique autem aperiam libero labore eligendi ipsa voluptatibus voluptate commodi, in, rerum accusamus quaerat. Ratione, quo, neque.</div>\r\n<div>Aut vel, ipsam quae eligendi. Consequuntur consequatur, deleniti hic sed officiis, eos alias, obcaecati harum in illum reiciendis nisi. Iure deserunt ipsam rerum nemo unde quas nostrum, omnis laboriosam consequatur!</div>\r\n<div>Itaque voluptate odit ullam rerum accusantium, officiis labore sunt deserunt praesentium iusto voluptatibus repellendus, dolorum, velit, quibusdam libero quae amet consequatur. Assumenda sapiente maxime voluptatibus praesentium, omnis iure perferendis dignissimos.</div>\r\n<div>Eveniet, modi, temporibus. Ex alias tempora optio nisi minima! Modi architecto iste ipsa laudantium ducimus labore repellat! Ipsa ad consequuntur voluptatem libero pariatur saepe perferendis, error, maiores quasi, quo necessitatibus!</div>\r\n<div>Atque obcaecati asperiores accusamus quis ad consequatur inventore officiis rem, magnam voluptatem molestiae ullam fuga vitae eligendi doloremque sint architecto molestias deserunt, aliquam placeat rerum minima! Consequatur sequi soluta, obcaecati.</div>\r\n<div>Perferendis ea at explicabo est nam saepe eos odio sunt optio itaque modi expedita quibusdam esse facilis similique assumenda libero autem neque ipsam ratione vel fugiat, porro cum reprehenderit obcaecati.</div>\r\n<div>Itaque error doloribus voluptatibus amet assumenda deleniti alias adipisci eius ab, facilis ut soluta vero, laudantium nesciunt commodi magni! Odio dolorum repudiandae quaerat dolor, tenetur iste est dignissimos amet, quod?</div>\r\n<div>Atque quae quibusdam provident quos ipsa, perspiciatis praesentium ex qui, tempore, deleniti non dicta nam! Et, perspiciatis incidunt ea delectus quam, similique quisquam sint, eveniet id, voluptatibus molestias eaque necessitatibus.</div>\r\n<div>Perspiciatis ratione, ipsam illo amet, neque earum culpa dolore! Assumenda mollitia, voluptatem, quis dignissimos delectus excepturi fugit voluptatibus quia magni facilis consequatur vero iste necessitatibus officia reiciendis velit corrupti exercitationem.</div>\r\n<div>Eum dolorum nam fuga soluta sunt vitae quod omnis, sequi ea quaerat dolorem voluptatum odit ad maxime aperiam, quia voluptates nostrum doloremque ducimus! Voluptates quia tenetur at expedita optio nostrum.</div>\r\n<div>Aliquam nesciunt saepe et, hic quo possimus similique officiis, numquam voluptatem, nulla ad eaque! Error nisi itaque assumenda? Veniam, aliquid quos, minima cumque ea cum iusto sit iure illum quis!</div>\r\n<div>Doloremque eius vero laborum voluptatum sequi quaerat laboriosam reiciendis iure beatae, natus illo fugit quae esse maxime soluta minima modi sunt cumque suscipit consequatur molestias exercitationem cum eveniet provident. Veritatis.</div>\r\n<div>Sunt vel, eos enim optio unde ea natus praesentium perferendis omnis, rerum labore fugit, ullam laboriosam animi libero corrupti asperiores id alias. Assumenda, dolorum incidunt praesentium magni nulla odit rerum!</div>\r\n<div>Obcaecati qui officiis laborum distinctio tenetur quisquam necessitatibus dolor ab, omnis accusamus, harum veniam. Ratione accusamus dolores, dolore dolorem velit aut quis quibusdam asperiores ab quo vel, nobis veritatis laboriosam.</div>\r\n<div>Eos quisquam nemo illum minus, veniam libero delectus cupiditate sint et veritatis laudantium iure earum aut explicabo quasi, optio eaque reprehenderit recusandae. Non temporibus necessitatibus, vel deleniti ullam incidunt enim.</div>\r\n<div>Distinctio praesentium velit natus voluptatem aliquam. Debitis, corrupti, voluptate at fugiat veritatis voluptates est veniam inventore! Laudantium, repudiandae, corporis earum amet laborum porro omnis ipsa magni ratione voluptatem, nihil voluptate.</div>\r\n<div>Nostrum rem blanditiis consequuntur obcaecati, ex eveniet optio, perferendis consequatur odio velit sunt asperiores accusamus molestiae aliquam accusantium unde sapiente veniam pariatur illum quas in, dignissimos vitae. Eius vitae, impedit.</div>\r\n<div>Omnis eaque deleniti quas maiores maxime, molestias rem reiciendis quo reprehenderit. Facere fuga porro enim aut rerum eveniet quam vero corporis labore aliquam, nisi nam consectetur velit. Quidem, iusto, aspernatur.</div>\r\n<div>Repellat eligendi veniam aliquam, similique error quod fugiat molestiae aut quam, cupiditate, obcaecati aspernatur officia qui perferendis aliquid voluptates tempore explicabo impedit asperiores itaque facilis eveniet, sit modi accusamus! Distinctio?</div>\r\n<div>Soluta autem, repellat quos doloremque officiis animi, suscipit voluptatum laudantium totam voluptatem quia ab beatae quod voluptate earum, culpa ullam hic consectetur ducimus? Illum numquam architecto unde eveniet odio officiis.</div>\r\n<div>Enim sapiente similique sed aperiam? Nulla magni vitae quo totam, id, rerum accusantium error blanditiis magnam. Maiores, est, aut! Vitae reprehenderit rerum, iusto porro asperiores unde perspiciatis in maxime pariatur.</div>\r\n<div>Exercitationem libero, magni quidem. Eum saepe quo, ullam et dolores quam harum eius eveniet est obcaecati, tenetur dolorem, excepturi sequi, inventore autem? Blanditiis pariatur iure mollitia sed voluptates voluptate officia.</div>\r\n<div>Dolorem, eum earum accusamus voluptatum rerum incidunt ut explicabo perspiciatis nesciunt! Minima cumque, minus incidunt delectus quas nulla voluptatem sapiente saepe facilis totam, dolore enim odit magni inventore, blanditiis harum!</div>\r\n<div>Aliquam corporis veritatis ipsum quas, rerum numquam accusantium aliquid suscipit inventore aperiam itaque, mollitia debitis? Blanditiis excepturi quod sunt, expedita non, harum eveniet veritatis, odit, incidunt doloribus inventore esse alias?</div>\r\n<div>Esse voluptatum vel enim nesciunt optio inventore, quam iusto nostrum, ab nisi porro eaque repudiandae dolore numquam! Explicabo cupiditate consequatur totam quia, dolores laudantium maxime fugit voluptas, nulla dicta praesentium.</div>\r\n<div>Veniam suscipit, nostrum hic odit accusantium delectus aperiam recusandae ducimus excepturi! Veritatis, est ratione voluptatem cumque magni alias, doloribus enim facere. Vero velit in, dolores fugit cumque ex. Consequatur, minus?</div>\r\n<div>Error explicabo eligendi, esse quisquam eaque animi quae aperiam, quo possimus ipsa molestiae ipsum fugit, inventore dolorem veniam doloribus sed ut! Unde, odio! Saepe, harum, dolor pariatur animi natus laudantium.</div>\r\n<div>Nobis iusto enim quas nisi dolor corporis voluptas ipsa deserunt eligendi, vitae saepe at? Sint impedit natus cum, maiores tempore, exercitationem pariatur ullam ducimus deleniti, odit dolore assumenda! Odit, eius.</div>\r\n<div>Eligendi porro voluptatem molestias commodi id optio. Voluptate alias cum facilis eveniet, iure ullam blanditiis. Similique quidem impedit, tempore possimus ad voluptas nostrum cupiditate, dolore hic eligendi officia nihil quibusdam.</div>\r\n<div>Distinctio quasi cupiditate iusto, numquam suscipit commodi mollitia facilis ipsam et explicabo praesentium debitis ullam tempora deserunt ut non similique asperiores, eaque, reiciendis, perferendis tenetur blanditiis in illo. Ex, assumenda.</div>\r\n<div>Iusto consectetur commodi soluta ab, quaerat vero corporis cumque assumenda quisquam minus, ad officiis inventore, magnam odit mollitia quasi nobis. Obcaecati repellat fuga, labore magni error illo saepe repellendus. Est.</div>\r\n<div>Reiciendis incidunt placeat nulla odit magni, beatae perferendis, odio officia rerum iure quisquam maiores officiis distinctio assumenda, libero error non ab pariatur quia dignissimos voluptas molestiae! Voluptates cumque, debitis suscipit.</div>', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus labore, ducimus rerum. Debitis voluptatibus molestiae repellat sapiente libero id explicabo officiis illum, distinctio, dolore facilis enim asperiores tenetur accusantium at.</div>\r\n<div>Nam aut nesciunt modi aliquam nemo eius vero illo provident tenetur repellat inventore reiciendis hic, officia neque esse, porro laudantium asperiores nostrum iste deleniti harum iusto dolores culpa sit. Illo.</div>\r\n<div>Perspiciatis dolores, aliquam error, numquam cumque veniam nisi impedit voluptate necessitatibus quos accusantium distinctio magni quisquam voluptates at ipsum aut repellat. Nam sint facilis earum inventore voluptates totam sit, ipsam.</div>\r\n<div>Laborum dicta, debitis accusamus quos adipisci, tempore autem esse cupiditate nobis sunt ab fuga eaque vel itaque iste officiis exercitationem alias illum! Vel animi, rem ex aperiam. Provident, placeat, minima.</div>\r\n<div>Consequuntur nisi illum odit, odio id, quis earum voluptate aperiam corporis ipsa rerum exercitationem veritatis repudiandae totam beatae expedita enim quisquam sunt assumenda nemo omnis architecto. Perspiciatis hic dolores in.</div>\r\n<div>Eius corporis, totam expedita! Fugiat cumque optio quos distinctio ex maxime, explicabo, sint quo tempora perspiciatis iusto iure, iste rem illum quia dignissimos accusantium. Nobis aut rem, nihil necessitatibus excepturi?</div>\r\n<div>Mollitia doloremque repellendus rerum maxime libero cum, officia iure suscipit fugiat illum voluptatibus doloribus sint neque ipsa dolores temporibus blanditiis eum laboriosam adipisci eos! Modi maiores eius quae voluptatibus maxime?</div>\r\n<div>Doloribus exercitationem officiis soluta, provident expedita sequi saepe voluptatum maxime recusandae, quis sit explicabo pariatur eius quae! Laborum nostrum corporis ab ducimus fugit, cum mollitia. Iste recusandae provident ratione excepturi!</div>\r\n<div>Sunt fugit repellendus, suscipit ab atque qui quibusdam! Et, nihil voluptates. Aspernatur minima magni mollitia voluptatibus, veritatis, odio quidem corporis libero a, suscipit beatae odit nobis alias impedit assumenda voluptatem!</div>\r\n<div>Repellendus nihil ea doloribus expedita minus consectetur, velit distinctio enim voluptatum odio magnam accusamus dolorum, temporibus labore eos cupiditate excepturi quo dolorem asperiores. Veritatis ipsa ut harum minima eaque neque.</div>\r\n<div>Asperiores obcaecati, totam minus vero vitae omnis ipsam dolores id aliquam fugit, numquam non reiciendis. Recusandae, quidem iusto nobis quaerat, expedita dolorem natus dolor corporis numquam delectus libero quae aut!</div>\r\n<div>Ex odio distinctio totam, est fugit ea, iste adipisci porro hic libero eius! Alias officia quas cupiditate hic reprehenderit assumenda iste, quam, eum sunt adipisci illum voluptates voluptate sit? Temporibus.</div>\r\n<div>Temporibus ratione ut quam, unde asperiores animi nobis quisquam perspiciatis a amet explicabo obcaecati, ipsa nesciunt rem blanditiis quae distinctio accusamus, consequuntur? Facere qui aut praesentium blanditiis earum quae sint?</div>\r\n<div>Officiis, enim beatae, nam sunt delectus architecto placeat nobis dolorum molestias tempora ullam quam numquam repellendus nesciunt id laboriosam repellat voluptatum magnam hic eaque, praesentium omnis error repudiandae ipsam! Accusamus.</div>\r\n<div>Cupiditate ad accusantium recusandae expedita maxime ipsa laboriosam dolorum voluptatibus esse culpa quae nostrum corrupti animi consequuntur rerum dolores fugit officia velit libero beatae sit, voluptatum accusamus. Cumque, ex. Autem.</div>\r\n<div>Sint debitis, veniam veritatis, molestias, at necessitatibus ratione accusantium atque assumenda expedita ut in consequatur dolorem ex recusandae possimus consequuntur nostrum laborum qui voluptatibus. Possimus accusantium illo non eius distinctio.</div>\r\n<div>Nihil tenetur porro facere sed blanditiis, dicta aut cumque odit praesentium corporis quas molestias ad vero, iusto impedit mollitia corrupti. Vitae nulla, labore ab possimus deserunt debitis, aspernatur officia sunt!</div>\r\n<div>Nisi laudantium quasi ducimus nulla a necessitatibus doloribus voluptatibus beatae quam nobis aliquid neque eius cum architecto ipsa harum illum similique fuga provident, quod eligendi excepturi assumenda laborum. Aliquam, praesentium.</div>\r\n<div>Veniam, fugit error omnis a impedit adipisci quos rem perferendis ex recusandae maxime similique autem aperiam libero labore eligendi ipsa voluptatibus voluptate commodi, in, rerum accusamus quaerat. Ratione, quo, neque.</div>\r\n<div>Aut vel, ipsam quae eligendi. Consequuntur consequatur, deleniti hic sed officiis, eos alias, obcaecati harum in illum reiciendis nisi. Iure deserunt ipsam rerum nemo unde quas nostrum, omnis laboriosam consequatur!</div>\r\n<div>Itaque voluptate odit ullam rerum accusantium, officiis labore sunt deserunt praesentium iusto voluptatibus repellendus, dolorum, velit, quibusdam libero quae amet consequatur. Assumenda sapiente maxime voluptatibus praesentium, omnis iure perferendis dignissimos.</div>\r\n<div>Eveniet, modi, temporibus. Ex alias tempora optio nisi minima! Modi architecto iste ipsa laudantium ducimus labore repellat! Ipsa ad consequuntur voluptatem libero pariatur saepe perferendis, error, maiores quasi, quo necessitatibus!</div>\r\n<div>Atque obcaecati asperiores accusamus quis ad consequatur inventore officiis rem, magnam voluptatem molestiae ullam fuga vitae eligendi doloremque sint architecto molestias deserunt, aliquam placeat rerum minima! Consequatur sequi soluta, obcaecati.</div>\r\n<div>Perferendis ea at explicabo est nam saepe eos odio sunt optio itaque modi expedita quibusdam esse facilis similique assumenda libero autem neque ipsam ratione vel fugiat, porro cum reprehenderit obcaecati.</div>\r\n<div>Itaque error doloribus voluptatibus amet assumenda deleniti alias adipisci eius ab, facilis ut soluta vero, laudantium nesciunt commodi magni! Odio dolorum repudiandae quaerat dolor, tenetur iste est dignissimos amet, quod?</div>\r\n<div>Atque quae quibusdam provident quos ipsa, perspiciatis praesentium ex qui, tempore, deleniti non dicta nam! Et, perspiciatis incidunt ea delectus quam, similique quisquam sint, eveniet id, voluptatibus molestias eaque necessitatibus.</div>\r\n<div>Perspiciatis ratione, ipsam illo amet, neque earum culpa dolore! Assumenda mollitia, voluptatem, quis dignissimos delectus excepturi fugit voluptatibus quia magni facilis consequatur vero iste necessitatibus officia reiciendis velit corrupti exercitationem.</div>\r\n<div>Eum dolorum nam fuga soluta sunt vitae quod omnis, sequi ea quaerat dolorem voluptatum odit ad maxime aperiam, quia voluptates nostrum doloremque ducimus! Voluptates quia tenetur at expedita optio nostrum.</div>\r\n<div>Aliquam nesciunt saepe et, hic quo possimus similique officiis, numquam voluptatem, nulla ad eaque! Error nisi itaque assumenda? Veniam, aliquid quos, minima cumque ea cum iusto sit iure illum quis!</div>\r\n<div>Doloremque eius vero laborum voluptatum sequi quaerat laboriosam reiciendis iure beatae, natus illo fugit quae esse maxime soluta minima modi sunt cumque suscipit consequatur molestias exercitationem cum eveniet provident. Veritatis.</div>\r\n<div>Sunt vel, eos enim optio unde ea natus praesentium perferendis omnis, rerum labore fugit, ullam laboriosam animi libero corrupti asperiores id alias. Assumenda, dolorum incidunt praesentium magni nulla odit rerum!</div>\r\n<div>Obcaecati qui officiis laborum distinctio tenetur quisquam necessitatibus dolor ab, omnis accusamus, harum veniam. Ratione accusamus dolores, dolore dolorem velit aut quis quibusdam asperiores ab quo vel, nobis veritatis laboriosam.</div>\r\n<div>Eos quisquam nemo illum minus, veniam libero delectus cupiditate sint et veritatis laudantium iure earum aut explicabo quasi, optio eaque reprehenderit recusandae. Non temporibus necessitatibus, vel deleniti ullam incidunt enim.</div>\r\n<div>Distinctio praesentium velit natus voluptatem aliquam. Debitis, corrupti, voluptate at fugiat veritatis voluptates est veniam inventore! Laudantium, repudiandae, corporis earum amet laborum porro omnis ipsa magni ratione voluptatem, nihil voluptate.</div>\r\n<div>Nostrum rem blanditiis consequuntur obcaecati, ex eveniet optio, perferendis consequatur odio velit sunt asperiores accusamus molestiae aliquam accusantium unde sapiente veniam pariatur illum quas in, dignissimos vitae. Eius vitae, impedit.</div>\r\n<div>Omnis eaque deleniti quas maiores maxime, molestias rem reiciendis quo reprehenderit. Facere fuga porro enim aut rerum eveniet quam vero corporis labore aliquam, nisi nam consectetur velit. Quidem, iusto, aspernatur.</div>\r\n<div>Repellat eligendi veniam aliquam, similique error quod fugiat molestiae aut quam, cupiditate, obcaecati aspernatur officia qui perferendis aliquid voluptates tempore explicabo impedit asperiores itaque facilis eveniet, sit modi accusamus! Distinctio?</div>\r\n<div>Soluta autem, repellat quos doloremque officiis animi, suscipit voluptatum laudantium totam voluptatem quia ab beatae quod voluptate earum, culpa ullam hic consectetur ducimus? Illum numquam architecto unde eveniet odio officiis.</div>\r\n<div>Enim sapiente similique sed aperiam? Nulla magni vitae quo totam, id, rerum accusantium error blanditiis magnam. Maiores, est, aut! Vitae reprehenderit rerum, iusto porro asperiores unde perspiciatis in maxime pariatur.</div>\r\n<div>Exercitationem libero, magni quidem. Eum saepe quo, ullam et dolores quam harum eius eveniet est obcaecati, tenetur dolorem, excepturi sequi, inventore autem? Blanditiis pariatur iure mollitia sed voluptates voluptate officia.</div>\r\n<div>Dolorem, eum earum accusamus voluptatum rerum incidunt ut explicabo perspiciatis nesciunt! Minima cumque, minus incidunt delectus quas nulla voluptatem sapiente saepe facilis totam, dolore enim odit magni inventore, blanditiis harum!</div>\r\n<div>Aliquam corporis veritatis ipsum quas, rerum numquam accusantium aliquid suscipit inventore aperiam itaque, mollitia debitis? Blanditiis excepturi quod sunt, expedita non, harum eveniet veritatis, odit, incidunt doloribus inventore esse alias?</div>\r\n<div>Esse voluptatum vel enim nesciunt optio inventore, quam iusto nostrum, ab nisi porro eaque repudiandae dolore numquam! Explicabo cupiditate consequatur totam quia, dolores laudantium maxime fugit voluptas, nulla dicta praesentium.</div>\r\n<div>Veniam suscipit, nostrum hic odit accusantium delectus aperiam recusandae ducimus excepturi! Veritatis, est ratione voluptatem cumque magni alias, doloribus enim facere. Vero velit in, dolores fugit cumque ex. Consequatur, minus?</div>\r\n<div>Error explicabo eligendi, esse quisquam eaque animi quae aperiam, quo possimus ipsa molestiae ipsum fugit, inventore dolorem veniam doloribus sed ut! Unde, odio! Saepe, harum, dolor pariatur animi natus laudantium.</div>\r\n<div>Nobis iusto enim quas nisi dolor corporis voluptas ipsa deserunt eligendi, vitae saepe at? Sint impedit natus cum, maiores tempore, exercitationem pariatur ullam ducimus deleniti, odit dolore assumenda! Odit, eius.</div>\r\n<div>Eligendi porro voluptatem molestias commodi id optio. Voluptate alias cum facilis eveniet, iure ullam blanditiis. Similique quidem impedit, tempore possimus ad voluptas nostrum cupiditate, dolore hic eligendi officia nihil quibusdam.</div>\r\n<div>Distinctio quasi cupiditate iusto, numquam suscipit commodi mollitia facilis ipsam et explicabo praesentium debitis ullam tempora deserunt ut non similique asperiores, eaque, reiciendis, perferendis tenetur blanditiis in illo. Ex, assumenda.</div>\r\n<div>Iusto consectetur commodi soluta ab, quaerat vero corporis cumque assumenda quisquam minus, ad officiis inventore, magnam odit mollitia quasi nobis. Obcaecati repellat fuga, labore magni error illo saepe repellendus. Est.</div>\r\n<div>Reiciendis incidunt placeat nulla odit magni, beatae perferendis, odio officia rerum iure quisquam maiores officiis distinctio assumenda, libero error non ab pariatur quia dignissimos voluptas molestiae! Voluptates cumque, debitis suscipit.</div>', 40, 170, NULL, NULL, '', NULL, '2021-01-28 21:25:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephoneNumber` varchar(20) NOT NULL,
  `identityNumber` varchar(20) NOT NULL,
  `IP` varchar(22) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `telephoneNumber`, `identityNumber`, `IP`, `permission`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '', '', '127.0.0.1', 1, '2021-01-28 21:00:00', '$2y$10$fzMyGUGfpLMnxhDQQxOIKOg7sfO/bF9yMWZYU2tvdwIRT.yr5xN0K', NULL, '2021-01-28 21:27:27', '2021-01-28 21:27:27');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site_configs`
--
ALTER TABLE `site_configs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `site_configs`
--
ALTER TABLE `site_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
