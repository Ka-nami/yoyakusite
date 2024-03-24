-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-03-24 09:58:29
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_ssdb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_ssdb_table`
--

CREATE TABLE `gs_ssdb_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `kname` varchar(64) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `naiyou` text NOT NULL,
  `hiduke` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_ssdb_table`
--

INSERT INTO `gs_ssdb_table` (`id`, `name`, `kname`, `mail`, `naiyou`, `hiduke`) VALUES
(2, '河村　真奈美', 'カワムラ　マナミ', 'hoge@mail.com', '骨格', '2024-03-24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_ssdb_table`
--
ALTER TABLE `gs_ssdb_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_ssdb_table`
--
ALTER TABLE `gs_ssdb_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
