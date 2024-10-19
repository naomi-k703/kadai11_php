-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 10 月 19 日 05:28
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
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table_TEST`
--

CREATE TABLE `gs_an_table_TEST` (
  `id` int(26) NOT NULL,
  `user_id` int(56) NOT NULL,
  `username` varchar(26) NOT NULL,
  `employee_number` varchar(255) DEFAULT NULL,
  `department` varchar(64) DEFAULT NULL,
  `position` varchar(64) DEFAULT NULL,
  `gender` varchar(26) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(64) NOT NULL,
  `naiyou` text DEFAULT NULL,
  `options` text DEFAULT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table_TEST`
--

INSERT INTO `gs_an_table_TEST` (`id`, `user_id`, `username`, `employee_number`, `department`, `position`, `gender`, `email`, `naiyou`, `options`, `indate`) VALUES
(2, 0, '', NULL, NULL, NULL, '', '', NULL, 'Option3', '0000-00-00'),
(3, 0, '', NULL, NULL, NULL, '', '', NULL, 'Option1,Option2,Option3', '0000-00-00'),
(4, 0, '', NULL, NULL, NULL, '', '', NULL, 'Option1,Option2,Option3', '0000-00-00'),
(5, 0, '', NULL, NULL, NULL, '', '', NULL, 'Option1,Option2,Option3', '0000-00-00'),
(6, 0, 'kyann', '999', '代表取締役', '代表取締役', '女性', 'test9900@example.jp', 'memo', '', '0000-00-00'),
(7, 0, 'きゃん', '999', '代表取締役', '代表取締役', '女性', 'test9900@example.jp', 'memo', '', '0000-00-00'),
(8, 0, 'きゃん', '999', '代表取締役', '代表取締役', '女性', 'test999@example.jp', 'mmmm', 'チームワーク,スキルアップ,社会貢献', '2024-10-05'),
(9, 0, 'きゃん', '999', '代表取締役', '代表取締役', '女性', 'test999@example.jp', 'memo', 'チームワーク,スキルアップ,社会貢献', '2024-10-05'),
(12, 0, 'きゃん', '999', '代表取締役', '代表取締役', '女性', 'test999@example.jp', 'mmmm', '達成感,チームワーク,スキルアップ', '2024-10-12'),
(13, 0, 'きゃん', '999', '代表取締役', '代表取締役', '女性', 'test9900@example.jp', 'mmnnnn', '', '2024-10-12'),
(14, 1, 'kyann', '999', '代表取締役', '代表取締役', '女性', 'test999@example.jp', '....', 'チームワーク,社会貢献,挑戦', '2024-10-13'),
(15, 2, 'きゃん', '999', '代表取締役', '代表取締役', '女性', 'test100@example.jp', 'mimi', '達成感,チームワーク,スキルアップ', '2024-10-19');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table_TEST`
--
ALTER TABLE `gs_an_table_TEST`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table_TEST`
--
ALTER TABLE `gs_an_table_TEST`
  MODIFY `id` int(26) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
