-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 08:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapuramy`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image_url`) VALUES
(1, 'c46800aad3aa83f5566b9281147ca6c9.jpg'),
(2, 'efd2be9fac0c74ffd0dd3345635a239c.jpg'),
(3, '75e54f783f764792cbb96e5fe78dfb20.jpg'),
(4, 'e0893122af6896bd3dec7e223850bec6.jpg'),
(5, '5d307f910655a342e67d5a0dada5efb4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `card_identity` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'NOT VERIFIED',
  `token_fcm` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id_order` int(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_notification` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `picture` text NOT NULL,
  `status` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `description`, `stock`, `price`, `picture`, `status`, `category`) VALUES
(4, 'Urap Sayur Manis Pedas', 'Banyak dari kita yang mengenal urap sayur ketika ditampilkan sebagai pendamping nasi tumpeng. Hidangan tersebut memang kurang rasanya tanpa kehadiran urap sayur. Sajian yang selalu diasosiasikan sebag', 80, 25000, 'f03f9dfcc0c58de0677134a99bad2161.jpg', 1, 'FOOD'),
(5, 'Ayam Suwir Bumbu Bali', 'Ayam suwir bumbu Bali, satai lilit, serta lawar (sayuran yang rupanya seperti urap), adalah beberapa komponen yang wajib ada dalam sepiring nasi campur khas Pulau Dewata. Kadang ada saja yang menambah', 50, 30000, '8550050b25b1b94874d4a46d70ebe595.jpg', 1, 'FOOD'),
(6, 'Ravioli Goreng Isi Ayam', 'Ravioli goreng isi ayam, sebuah camilan dari olahan pasta khas Italia dengan cita rasa Asia. Tidak harus ke restoran, kini kamu bisa membuatnya sendiri di rumah. Camilan ini terasa renyah di luar dan ', 57, 15000, 'a16a5de1fa70d1c3e292b484ddaca59a.jpg', 1, 'FOOD'),
(7, 'Oseng Daging Kentang', 'Oseng daging kentang jadi solusi untukmu yang mencari masakan lezat yang mudah dibuat. Olahan daging yang kaya protein biasanya jadi favorit keluarga. Memang harganya lebih tinggi dibanding protein he', 45, 18000, '0d974ad8ffdb5c7a060309397d4bc57e.jpg', 1, 'FOOD'),
(8, 'Ikan Gurame Bakar', 'Menikmati masakan Sunda dengan latar pedesaan langsung memang tidak ada duanya. Apalagi ketika melepas lelah setelah perjalanan jauh dan menuju pulang. Pastilah ada kesan tersendiri dari segala rasa n', 70, 50000, '475db71553165105bae41228bf7a756d.jpg', 1, 'FOOD'),
(9, 'Ayam Bumbu Kecap Mentega', 'Sebagai seseorang yang ingin lebih pandai memasak, biasanya kita mengawali pengalaman memasak kita dari resep-resep yang mudah terlebih dahulu. Masuk akal bukan? Dari satu resep saja, kita bisa semaki', 45, 17500, '396d3b7f8c3ef9e6a34d27f76f77ae3b.jpg', 1, 'FOOD'),
(10, 'Ikan Bandeng Bakar Tanpa Duri', 'Banyak resep ikan bakar yang lezat, tapi resep ikan bandeng bakar tanpa duri ini begitu istimewa. Untuk yang hobi mengolah resep bakar-bakaran atau panggang-panggangan, tentunya sayang untuk melewatka', 45, 45000, '4ebef9cf98065c69261d9543cb3a0746.jpg', 1, 'FOOD'),
(11, 'Gulai Nangka Udang', 'Kebanyakan dari kamu mungkin ragu untuk memasak resep gulai nangka. Tidak heran, karena masakan berbasis nangka memang biasanya diolah oleh para pemasak tradisional alias ibu atau nenek kita. Berdasar', 25, 25000, '6ce7d07ab362168c9503e5a046633f16.jpg', 1, 'FOOD'),
(12, 'Gulai Ikan Patin', 'Sejatinya gulai ikan adalah masakan yang berasal dari daerah Sumatera Barat yang juga populer dengan nama gulai pangek masin. Salah satu wilayah yang populer dengan hidangan ini adalah daerah pesisir ', 40, 40000, '45746f1e9d494018e0cbe9bd2c61b881.jpg', 1, 'FOOD'),
(13, 'Ayam Lada Hitam', 'Makanan yang terinspirasi hidangan Peranakan ini punya versi populernya yang menggunakan daging sapi. Tapi jangan khawatir, versi ayamnya juga tak kalah lezat! Oh ya, jangan lupa untuk memilih lada hi', 70, 50000, '63aad37ed183be558658774168e06fe7.jpg', 1, 'FOOD'),
(14, 'Bakwan Goreng Enoki', 'Mengapa pilihannya jatuh pada jamur jenis enoki khas Jepang ini? Jawabannya adalah karena bentukannya yang ramping dan memanjang serta rasa renyah yang dihasilkan. Itu dari urusan tekstur dan penampil', 52, 45000, 'fff2eaf811abf67ebe52ed907a928281.jpg', 0, 'FOOD'),
(15, 'Semur Ayam Istimewa', 'Bicara soal semur ayam sebetulnya tidak harus menunggu datangnya Ramadan ataupun Lebaran. Resep mudah yang satu ini cocok untuk dihidangkan kapan saja. Dari sarapan hingga makan malam, tak ada yang bi', 50, 45000, 'bda085e429f564c76413d790378f88aa.jpg', 0, 'FOOD'),
(16, 'Pecak Ikan Gurame', 'Selain ikan gurame, biasanya hidangan ini juga terkenal menggunakan ikan mas. Saya pilihkan ikan gurame karena sangat populer untuk masyarakat Betawi Sunda. Selain itu tulangnya juga tidak terlampau b', 40, 20000, '295864fac20332fb3b3c86f8e3f260b5.jpg', 1, 'FOOD'),
(17, 'Sayap Ayam Pedas Manis', 'Resep sayap ayam baru khusus untuk kamu! Racikan bumbu pedas manis menyelimuti setiap potongan sayap ayam yang sudah digoreng. Sebagai pencinta bagian paling lezat dari ayam ini, mungkin saja kamu sed', 52, 14000, '613e1e163f3ee636656fa1502f8f577f.jpg', 1, 'FOOD'),
(18, 'Nasi Bakmoy', 'Hidangan sepinggan nasi bakmoy mungkin sudah tak asing bagi kamu yang akrab dengan kuliner Peranakan. Buat yang belum tahu, nasi bakmoy adalah nasi yang yang disiram dengan kuah kaldu ayam berbumbu da', 54, 17500, '09b323ca60c6b461133494c02ffc26b5.jpg', 1, 'FOOD'),
(19, 'Cap Cay Goreng Jawa', 'Cap cay goreng Jawa atau yang juga populer dengan sebutan Cap Jae memang sangat populer kalau kamu mampir di kedai bakmi Jawa. Kehadiran menu makanan rumahan yang ditumis dalam wajan atau wok ini teri', 52, 12500, '971c496dddd8994709641fc4a6e3c574.jpg', 1, 'FOOD'),
(20, 'rdfg', 'dfg', 45, 5000, '9c11022b3051d73d9c5a4cb74c347622.jpg', 0, 'FOOD'),
(21, 'Brown Sugar Bubble Drink', 'Minuman kekinian yang satu ini sedang banyak digandrungi oleh penikmat kuliner. Bubble drink merupakan jenis isian minuman yang terbuat dari tepung dan rasa tertentu', 45, 10000, 'cc41b745556c3a3d2f2944461062d491.jpg', 1, 'DRINK'),
(22, 'Turmeric Latte', 'Tumeric latte merupakan nama lain dari susu yang dicampur dengan kunyit. Meski terdengar aneh, namun resep minuman kekinian yang satu ini mulai banyak digemari. Selain karena rasanya yang unik, tampil', 45, 12000, '3a115507a5dcd6a715d3123d7fa41867.jpg', 1, 'DRINK'),
(23, 'Mocktail in Pouch', 'Minuman yang memiliki ciri khas disajikan dalam pounch atau kantung plastik ini menjadi salah satu sajian kekinian yang banyak diburu. Tak hanya menyegarkan, tampilannya pun tampak sangat fresh dan sa', 20, 15000, '8e3e30f7f9e512d1194681083c64e449.jpg', 1, 'DRINK'),
(24, 'Blue Fire Squash', 'asdasfsdgdfghdfgdfg', 20, 18000, 'd1d5ff8315acd427e28c287eab5e33ed.jpg', 1, 'DRINK'),
(25, 'Mojito Orange', 'Sajian minuman yang memiliki rasa minta yang menyegarkan ini menjadi salah satu produk kekinian yang banyak disajikan di berbagai restoran hingga rumah makan', 42, 18000, '93f36a54854f018d98d9369b186a3ca2.jpg', 1, 'DRINK'),
(26, 'Banana Coffee Latte', 'Buah pisang dibuat menjadi minuman kekinian, kenapa tidak? Selain bernutrisi dan mengandung banyak vitamin, buah pisang juga memiliki rasa yang lezat, terlebih jika dipadukan dengan bahan yang tepat', 41, 15000, 'f4d5b64e38198a952a47956ae1bf3e3f.jpg', 1, 'DRINK'),
(27, 'Es Kopi Susu Kekinian', 'Es kopi memang terdengar biasa. Namun jika dikreasikan dengan penyajian yang unik serta menarik, kelasnya pun bisa jadi luar biasa.', 12, 10000, 'aad9f3402a7ecb7ef967c238a04913db.jpg', 1, 'DRINK');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_order` int(100) NOT NULL,
  `id_customer` int(100) NOT NULL,
  `price_total` int(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `img` text DEFAULT NULL,
  `order_date` date NOT NULL,
  `status_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hakakses` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `hakakses`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notification`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_order` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
