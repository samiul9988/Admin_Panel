-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2023 at 01:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `office_location_id` bigint UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `logged_out_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_start_time` time DEFAULT NULL,
  `office_late_time` time DEFAULT NULL,
  `office_absent_time` time DEFAULT NULL,
  `office_end_time` time DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 'Blog Category 1', 1, 1, NULL, '2022-12-27 04:27:34', '2022-12-27 04:27:34'),
(2, 'Blog Category 2', 1, 1, NULL, '2022-12-27 04:27:40', '2022-12-27 04:27:40'),
(3, 'Blog Category 3', 1, 1, 1, '2022-12-27 04:30:23', '2022-12-27 04:31:54'),
(6, 'Blog Category 4', 1, 1, NULL, '2022-12-27 04:32:16', '2022-12-27 04:32:16'),
(7, 'Blog Category 5', 1, 1, NULL, '2022-12-27 04:32:23', '2022-12-27 04:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_posts`
--

CREATE TABLE `blog_category_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` bigint UNSIGNED DEFAULT NULL,
  `blog_post_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_posts`
--

INSERT INTO `blog_category_posts` (`id`, `blog_category_id`, `blog_post_id`, `created_at`, `updated_at`) VALUES
(13, 7, 3, '2022-12-31 03:07:47', '2022-12-31 03:07:47'),
(14, 1, 6, '2022-12-31 03:09:32', '2022-12-31 03:09:32'),
(15, 2, 6, '2022-12-31 03:09:32', '2022-12-31 03:09:32'),
(16, 3, 6, '2022-12-31 03:09:32', '2022-12-31 03:09:32'),
(18, 2, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(19, 3, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(21, 6, 3, '2022-12-31 04:02:27', '2022-12-31 04:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `feature_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `view_count` int NOT NULL DEFAULT '0',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `description`, `excerpt`, `tags`, `feature_image`, `active`, `status`, `view_count`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 'মেট্রোরেলের ফলক উন্মোচন করলেন প্রধানমন্ত্রী, নতুন যুগের শুরু !', '<p>&nbsp;রাজধানীর উত্তরার দিয়াবাড়িতে এক অনুষ্ঠানে মেট্রোরেলের ফলকের রেপ্লিকা উন্মোচন করেন প্রধানমন্ত্রী।</p><p><span style=\"color: rgb(18, 18, 18); font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; font-size: var(--fs-18); white-space: break-spaces;\">ফলক উন্মোচনের পর পবিত্র কোরআন তেলোয়াত ও দোয়ার মাধ্যমে মেট্রো রেলের উদ্বোধনী অনুষ্ঠান শুরু হয়। এ সময় তাঁর সঙ্গে আছেন ছোট বোন শেখ রেহানা। </span><br></p><p style=\"font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; margin-right: 0px; margin-bottom: var(--space1_6); margin-left: 0px; padding: 0px; font-size: var(--fs-18); line-height: 1.7; white-space: break-spaces; color: rgb(18, 18, 18);\">এদিকে দিয়াবাড়িতে বর্ণাঢ্য উদ্বোধনী অনুষ্ঠানের মাধ্যমে মেট্রোরেল কার্যক্রম উদ্বোধন করবেন প্রধানমন্ত্রী। <span style=\"font-family: var(--font-2); font-size: var(--fs-18);\">প্রধানমন্ত্রী দিয়াবাড়িতে সুধী সমাবেশে অংশ নেবেন। সমাবেশ মঞ্চে শেখ রেহানাও আছেন। উদ্বোধনের পর রুটের মধ্যবর্তী স্টেশনে কোনো বিরতি ছাড়াই উত্তরা থেকে আগারগাঁও পর্যন্ত চলবে মেট্রোরেল। </span></p><p style=\"font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; margin-right: 0px; margin-bottom: var(--space1_6); margin-left: 0px; padding: 0px; font-size: var(--fs-18); line-height: 1.7; white-space: break-spaces; color: rgb(18, 18, 18);\"><span style=\"font-family: var(--font-2); font-size: var(--fs-18);\"><br></span><span style=\"font-family: var(--font-2); font-size: var(--fs-18);\">প্রথম যাত্রী হিসেবে টিকিট কেটে উত্তরা উত্তর স্টেশন থেকে উঠে আগারগাঁও স্টেশনে এসে নামবেন শেখ হাসিনা। &nbsp;</span><span style=\"font-family: var(--font-2); font-size: var(--fs-18);\">আগামীকাল বৃহস্পতিবার থেকে যাত্রীরা মেট্রোরেলে যাতায়াত করতে পারবেন। আপাতত উত্তরা থেকে আগারগাঁও পর্যন্ত চলবে মেট্রোরেল। </span></p>', 'রাজধানী ঢাকাবাসীর জন্য আজ বুধবার বহুল প্রতীক্ষিত মেট্রোরেলের ফলকের রেপ্লিকা উন্মোচন করলেন প্রধানমন্ত্রী শেখ হাসিনা।', 'রাজধানী,মেট্রোরেল', 'admin/images/blog-post/1672211667.webp', 1, 'pending', 0, 1, 1, '2022-12-28 00:20:06', '2022-12-28 01:18:05'),
(3, 'আওয়ামী লীগ কি আর রাজনৈতিক দলের ভূমিকা পালন করছে', '<div>আওয়ামী লীগের কাউন্সিল শেষ হলো। এই কাউন্সিলগুলো যে আদতে কাউন্সিল নয়,সেটা রাজনীতির ন্যূনতম খোঁজখবর করা মানুষ জানেন, এটা আসলে দলীয় প্রধানের সিদ্ধান্ত ঘোষণার অনুষ্ঠান। দেশের অর্থনৈতিক সংকটের প্রেক্ষাপটে একদিনে নামিয়ে আনা হলেও কাউন্সিলে বেশ জাঁকজমকের মাধ্যমেই আগামী তিন বছরের জন্য আওয়ামী লীগের কমিটি নির্ধারিত (নির্বাচিত নয়) হলো। এই সম্মেলনটি এমন সময় হলো যখন দলটি দাঁড়িয়ে আছে তার ৭৫ বছর পূর্তির খুব কাছে। এমন পুরনো ও ঐতিহ্যবাহী দলটি দাঁড়িয়ে আছে এক অতি গুরুত্বপূর্ণ প্রশ্নের মুখোমুখি— আওয়ামী লীগ কি আর রাজনৈতিক দলের ভূমিকা পালন করছে?</div><div><br></div><div>২০১৪ সাল থেকে এখন পর্যন্ত আমরা যদি ক্ষমতাসীন দল আওয়ামী লীগের রাজনৈতিক পরিক্রমা খেয়াল করি, তাহলে দেখব, তারা প্রতিপক্ষকে নানাভাবে নাস্তানাবুদ করে ক্ষমতায় থাকতে পেরেছে।</div><div><br></div><div>২০১৪ সালে একটি ভোট পড়ার আগেই সংসদে সংখ্যাগরিষ্ঠতা পাওয়ার মতো আসন নিশ্চিত হয়ে গিয়েছিল আওয়ামী লীগ নেতৃত্বাধীন মহাজোটের। এই তথাকথিত নির্বাচনটি সংবিধানের ৭(১), ১১, ৬৫(২) অনুচ্ছেদগুলোর এবং সর্বোপরি সংবিধানের স্পিরিটের সঙ্গে সরাসরি সাংঘর্ষিক। বিষয়টি ক্ষমতাসীনেরাও বুঝেছিল নিশ্চয়ই। তাই ২০১৪ সালের নির্বাচনের আগে আওয়ামী লীগের সর্বোচ্চ পর্যায় থেকে বলা হয়েছিল এটি একটি সাংবিধানিক বাধ্যবাধকতায় নিয়ম রক্ষার নির্বাচন, সবার অংশগ্রহণে অচিরেই আরেকটি নির্বাচন দেওয়া হবে। কিন্তু না, আওয়ামী লীগ ক্ষমতার পূর্ণ মেয়াদ পার করল।</div><div><br></div><div>এরপর ২০১৮ সালে প্রধান বিরোধী দল বিএনপিসহ অনেকগুলো বিরোধী দল নির্বাচনে আসে। কিন্তু আলোচিত ‘রাতের ভোট’ করে ক্ষমতায় থেকে যায় আওয়ামী লীগ। নির্বাচনের ফলাফল বিশ্লেষণে দেখা যায় ২১৩টি ভোটকেন্দ্রে শতভাগ ভোট পড়েছে। ৫৮৬টি কেন্দ্রে দেওয়া ভোটের শতভাগ পেয়েছে নৌকা প্রতীক ও একটিতে পেয়েছে ধানের শীষ প্রতীক। ১ হাজার ১৭৭টি কেন্দ্রে বিএনপি শূন্য ভোট পেয়েছে।</div><div><br></div><div>৯৬ থেকে ১০০ শতাংশ ভোট পড়েছে ১ হাজার ৪১৮টি ভোটকেন্দ্রে। ৯০ থেকে ৯৫ শতাংশ ভোট পড়েছে ৬ হাজার ৪৮৪টি কেন্দ্রে। সেই নির্বাচন কেমন হয়েছে, এই তথ্যগুলোই সেটা প্রমাণ করার জন্য যথেষ্ট। এরপরও দলটি ক্ষমতায় থেকে গেল এবং তার চার বছর পূর্ণ করে ফেলেছে। এখন পর্যন্ত মনে হচ্ছে এবারও মেয়াদ পূর্ণ করবে আওয়ামী লীগ।</div>', 'আওয়ামী লীগ সভাপতি ও প্রধানমন্ত্রী শেখ হাসিনা বেলুন উড়িয়ে দলের ২২তম জাতীয় সম্মেলনের উদ্বোধন করেন। গত শনিবার সকালে সোহরাওয়ার্দী উদ্যানে', 'আওয়ামী লীগ,প্রধানমন্ত্রী শেখ হাসিনা', 'admin/images/blog-post/1672211844.webp', 1, 'published', 0, 1, 1, '2022-12-28 00:59:42', '2022-12-28 01:17:24'),
(4, 'উখিয়ার আশ্রয়শিবির /  আরসার আতঙ্কে রোহিঙ্গা মাঝিরা', '<div>কক্সবাজারের উখিয়ার আশ্রয়শিবিরগুলোতে আতঙ্কে ভুগছেন অন্তত ৭০০ রোহিঙ্গা মাঝি (নেতা)। এর মধ্যে ৯০ জনের মতো মাঝি এরই মধ্যে আত্মগোপনে চলে গেছেন। সম্প্রতি আশ্রয়শিবিরের কয়েকজন মাঝিকে হত্যার ঘটনার পরিপ্রেক্ষিতে এই আতঙ্ক তৈরি হয়েছে।</div><div><br></div><div>সর্বশেষ গতকাল সোমবার সকাল ১০টার দিকে বালুখালী আশ্রয়শিবিরে (ক্যাম্প-৮ পশ্চিম) গুলি করে মোহাম্মদ হোসেন (৩০) নামের এক রোহিঙ্গা মাঝিকে হত্যা করা হয়েছে। রোহিঙ্গাদের অভিযোগ, ‘আরাকান স্যালভেশন আর্মি’র (আরসা) ১০-১২ জনের একটি দল তাঁকে গুলি করে হত্যা করে। এর আগে গত বৃহস্পতিবার বিকেলে একই শিবিরে আরসার লোকদের গুলিতে এক শিশুসহ চার রোহিঙ্গা গুলিবিদ্ধ হন।</div><div><br></div><div>পুলিশের তথ্য বলছে, গত চার মাসে আশ্রয়শিবিরে একাধিক রোহিঙ্গা সন্ত্রাসী বাহিনীর মধ্যে ২০টির বেশি সংঘর্ষ ও গোলাগুলির ঘটনায় ১৬ জন নিহত হয়েছেন। এর মধ্যে পাঁচজন আরসার সদস্য এবং আটজন রোহিঙ্গা মাঝি। বাকিরা সাধারণ রোহিঙ্গা।</div><div><br></div><div>এসব হত্যার ঘটনায় মিয়ানমারের সশস্ত্র গোষ্ঠী আরসার প্রধান আতাউল্লাহ আবু আম্মার জুনুনিসহ অনেকের বিরুদ্ধে মামলা হয়েছে। এ ছাড়া রোহিঙ্গা সন্ত্রাসী ও আইনশৃঙ্খলা রক্ষাকারী বাহিনীর সঙ্গে সংঘর্ষ ও গোলাগুলির ঘটনায় প্রাণ হারিয়েছেন আরসার পাঁচজনও। তবে এতে আতঙ্ক কমছে না।</div><div><br></div><div>বর্তমানে উখিয়া ও টেকনাফের ৩৩টি আশ্রয়শিবিরে নিবন্ধিত রোহিঙ্গার সংখ্যা সাড়ে ১২ লাখ। সম্প্রতি ক্যাম্প ঘুরে নানা বয়সী নারী-পুরুষের সঙ্গে কথা বলে জানা গেছে, আশ্রয়শিবিরের চোরাচালান নিয়ন্ত্রণ, চাঁদাবাজি ও আধিপত্য বিস্তারকে ঘিরে আরসার সঙ্গে মাদক চোরাচালানের গডফাদার হিসেবে পরিচিত রোহিঙ্গা নবী হোসেন বাহিনীর মধ্যে গোলাগুলি, সংঘর্ষ ও খুনাখুনির ঘটনাগুলো ঘটছে।</div>', 'সম্প্রতি আশ্রয়শিবিরে কয়েকজন মাঝিকে (নেতা) হত্যার ঘটনার পরিপ্রেক্ষিতে এই আতঙ্ক তৈরি হয়েছে।  গতকাল বালুখালী শিবিরে মোহাম্মদ হোসেন নামের এক রোহিঙ্গা মাঝিকে হত্যা করা হয়েছে।  গত চার মাসে রোহিঙ্গা গোষ্ঠীগুলোর সংঘর্ষ ও গোলাগুলিতে নিহত হয়েছেন অন্তত ১৬ জন।', 'উখিয়ার আশ্রয়শিবির,অন্তত ৭০০ রোহিঙ্গা মাঝি', 'admin/images/blog-post/1672212145.webp', 1, 'pending', 0, 1, NULL, '2022-12-28 01:22:25', '2022-12-28 01:22:25'),
(5, 'পন্তের সেরে উঠতে ছয় মাস লাগতে পারে', '<p><span style=\"color: rgb(18, 18, 18); font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; font-size: 18px; white-space: break-spaces;\">দিল্লি-দেরাদুন মহাসড়কে শুক্রবার সকালে ভয়ংকর গাড়ি দুর্ঘটনার শিকার হন ভারতের উইকেটকিপার-ব্যাটসম্যান ঋষভ পন্ত। দেরাদুনের ম্যাক্স হাসপাতালে চিকিৎসা দেওয়া হচ্ছে তাঁকে। হাসপাতালটির চিকিৎসকদের সঙ্গে কথা বলে পন্তের শারীরিক অবস্থা জানিয়েছে ভারতের ক্রিকেট বোর্ড (বিসিসিআই)। </span></p><p><span style=\"color: rgb(18, 18, 18); font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; font-size: 18px; white-space: break-spaces;\">বিসিসিআইয়ের বিবৃতিতে বলা হয়, ‘পন্তের কপালে দুটি জায়গায় কেটে গেছে। ডান হাঁটুর লিগামেন্ট ছিঁড়েছে। এ ছাড়াও ডান হাতের কবজি, অ্যাঙ্কেল, গোড়ালি ও পিঠেও ক্ষত আছে।’ পন্তের চিকিৎসায় নিয়োজিত মেডিকেল টিম ভারতের সংবাদমাধ্যম ‘টাইমস অব ইন্ডিয়া’কে জানিয়েছে, ‘অর্থোপেডিকস বিভাগের চিকিৎসক গৌরব গুপ্ত তার (পন্ত) চিকিৎসাসেবা দিচ্ছেন। পন্তের শারীরিক অবস্থা এখন স্থিতিশীল। জীবন নিয়ে শঙ্কার সৃষ্টি হতে পারে এমন কোনো আঘাত তিনি পাননি। তার মা হাসপাতালে আছেন।</span></p><p><span style=\"color: rgb(18, 18, 18); font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; font-size: 18px; white-space: break-spaces;\">খেলাধুলায় বিভিন্ন চোট নিয়ে চিকিৎসাসেবা দেওয়া এবং এই বিষয়ে বিশেষজ্ঞ এআইএমএস-ঋষিকেশ মেডিকেল কলেজের স্পোর্টস ইনজুরি বিভাগের চিকিৎসক কামার আজমের সঙ্গেও কথা বলেছে ‘টাইমস অব ইন্ডিয়া’। কামার আজম বলেছেন, ‘লিগামেন্ট ইনজুরি থেকে সেরে উঠতে পন্তের কমপক্ষে তিন থেকে ছয় মাস সময় লাগবে। আঘাতটা এর চেয়েও ভয়াবহ হলে আরও সময় লাগতে পারে। তার আঘাতের বিশদ প্রতিবেদন পেলে এ নিয়ে আরও নিশ্চিতভাবে বলা যাবে।’</span></p>', 'ভারতের উইকেটকিপার–ব্যাটসম্যান ঋষভ পন্ত', 'ঋষভ পন্ত,ভারতের উইকেটকিপার', 'admin/images/blog-post/1672465998.webp', 1, 'pending', 0, 1, NULL, '2022-12-30 23:53:18', '2022-12-30 23:53:18'),
(6, 'লিভারপুলকে ‘জোড়া উপহার’ ফায়েসের', '<p style=\"font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; margin-right: 0px; margin-bottom: var(--space1_6); margin-left: 0px; padding: 0px; font-size: var(--fs-18); line-height: 1.7; white-space: break-spaces; color: rgb(18, 18, 18);\">বিশ্বকাপে বেলজিয়াম দলে ছিলেন ভাউট ফায়েস। কিন্তু ম্যাচ খেলার সুযোগ পাননি। আর বিশ্বকাপে মাঠে না নামায় নাকি ‘জং’ ধরেছে খেলায়। সেটা এমনই যে লেস্টার সিটির হয়ে খেলতে নেমে সাত মিনিটের মধ্য দুইবার নিজেদের জালে বল পাঠিয়ে দিলেন ফায়েস। লেস্টার সেন্টার ব্যাকের ‘জোড়া উপহারে’ লিভারপুল মাঠ ছেড়েছে ২-১ ব্যবধানে জয় নিয়ে।</p><p style=\"font-family: Shurjo, SolaimanLipi, &quot;Siyam Rupali&quot;, Roboto, Arial, Helvetica, monospace; margin-right: 0px; margin-bottom: var(--space1_6); margin-left: 0px; padding: 0px; font-size: var(--fs-18); line-height: 1.7; white-space: break-spaces; color: rgb(18, 18, 18);\">অথচ অ্যানফিল্ডের ম্যাচটিতে শুরুতে এগিয়ে গিয়েছিল লেস্টারই। চতুর্থ মিনিটেই দলকে এগিয়ে দেন ইংলিশ মিডফিল্ডার কির্নান ডিউজবুরি-হল। গোল শোধে মরিয়া চেষ্টা শুরু করেন লিভারপুলের মোহাম্মদ সালাহ, দারউইন নুনিয়েজ, ট্রেন্ট-আলেক্সান্ডার-আর্নল্ডরা। ২৭ মিনিটে একবার বল জালেও পাঠান সালাহ। তবে অফ সাইডে সেটি বাতিল হয়ে যায়।</p>', 'ভাউট ফায়েসের জোড়া আত্মঘাতী গোলে লিভারপুলের কাছে হেরেছে লেস্টার সিটি', 'বেলজিয়াম,ফায়েস', 'admin/images/blog-post/1672468053.webp', 1, 'pending', 0, 1, NULL, '2022-12-31 00:27:33', '2022-12-31 00:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_subcategory_posts`
--

CREATE TABLE `blog_subcategory_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `blog_post_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_subcategory_posts`
--

INSERT INTO `blog_subcategory_posts` (`id`, `blog_subcategory_id`, `blog_post_id`, `created_at`, `updated_at`) VALUES
(31, 9, 4, '2022-12-31 03:09:17', '2022-12-31 03:09:17'),
(32, 10, 4, '2022-12-31 03:09:17', '2022-12-31 03:09:17'),
(33, 12, 4, '2022-12-31 03:09:17', '2022-12-31 03:09:17'),
(34, 13, 4, '2022-12-31 03:09:17', '2022-12-31 03:09:17'),
(35, 14, 4, '2022-12-31 03:09:17', '2022-12-31 03:09:17'),
(36, 7, 6, '2022-12-31 03:09:32', '2022-12-31 03:09:32'),
(40, 1, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(41, 4, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(42, 7, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(43, 8, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(44, 2, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(45, 6, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(46, 9, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(47, 10, 5, '2022-12-31 03:58:50', '2022-12-31 03:58:50'),
(48, 3, 5, '2022-12-31 03:58:51', '2022-12-31 03:58:51'),
(52, 13, 3, '2022-12-31 03:59:30', '2022-12-31 03:59:30'),
(61, 15, 3, '2022-12-31 04:02:27', '2022-12-31 04:02:27'),
(62, 14, 3, '2022-12-31 04:02:27', '2022-12-31 04:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog_sub_categories`
--

CREATE TABLE `blog_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_sub_categories`
--

INSERT INTO `blog_sub_categories` (`id`, `blog_category_id`, `name`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog Category 1 & Subcategory 1', 1, 1, NULL, '2022-12-27 04:36:18', '2022-12-30 19:14:42'),
(2, 2, 'Blog Category 2 & Subcategory 1', 1, 1, NULL, '2022-12-27 04:36:47', '2022-12-30 19:15:36'),
(3, 3, 'Blog Category 3 & Subcategory 1', 1, 1, NULL, '2022-12-27 04:37:12', '2022-12-30 19:16:05'),
(4, 1, 'Blog Category 1 & Subcategory 2', 1, 1, NULL, '2022-12-27 04:37:21', '2022-12-30 19:16:23'),
(6, 2, 'Blog Category 2 & Subcategory 2', 1, 1, NULL, '2022-12-27 04:37:29', '2022-12-30 19:16:45'),
(7, 1, 'Blog Category 1 & Subcategory 3', 1, 1, NULL, '2022-12-30 09:52:43', '2022-12-30 19:17:01'),
(8, 1, 'Blog Category 1 & Subcategory 4', 1, 1, NULL, '2022-12-30 09:52:51', '2022-12-30 19:17:38'),
(9, 2, 'Blog Category 2 & Subcategory 3', 1, 1, NULL, '2022-12-30 09:53:00', '2022-12-30 19:18:16'),
(10, 2, 'Blog Category 2 & Subcategory 4', 1, 1, NULL, '2022-12-30 09:53:10', '2022-12-30 19:18:41'),
(11, 3, 'Blog Category 3 & Subcategory 2', 1, 1, NULL, '2022-12-30 09:54:36', '2022-12-30 19:19:11'),
(12, 3, 'Blog Category 3 & Subcategory 3', 1, 1, NULL, '2022-12-30 09:54:45', '2022-12-30 19:19:31'),
(13, 7, 'Blog Category 5 & Subcategory 1', 1, 1, NULL, '2022-12-30 09:54:55', '2022-12-30 19:19:51'),
(14, 7, 'Blog Category 5 & Subcategory 2', 1, 1, NULL, '2022-12-30 09:55:08', '2022-12-30 19:20:16'),
(15, 6, 'Blog Category 4 & Subcategory 1', 0, 1, NULL, '2022-12-30 09:55:16', '2022-12-30 19:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(5, 'Robi', 'Gulshan-1, Road -10', 1, 1, 1, '2022-12-21 00:44:32', '2023-01-04 22:32:24'),
(6, 'Apex', 'Gulshan-1, Road -10', 1, 1, 1, '2022-12-21 02:38:40', '2022-12-21 02:38:40'),
(7, 'Fresh', 'Gulshan-1, Road -32', 1, 1, 1, '2022-12-21 02:39:00', '2022-12-21 02:39:00'),
(9, 'Bengal', 'Gulshan-1, Road -15', 1, 1, 1, '2022-12-21 02:39:35', '2022-12-21 02:39:35'),
(10, 'SARBS', 'Gulshan-1, Road -32', 1, 1, NULL, '2022-12-21 04:33:19', '2022-12-21 04:33:19'),
(14, 'Golden Harvest', 'Gulshan-2, Road -10', 1, 1, NULL, '2023-01-04 22:32:56', '2023-01-04 22:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `office_location_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `rfid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `user_id`, `employee_id`, `office_location_id`, `name`, `designation`, `gender`, `mobile`, `email`, `active`, `addedby_id`, `editedby_id`, `rfid`, `created_at`, `updated_at`) VALUES
(5, 10, 3, 12191, NULL, 'Masud Hasan', NULL, NULL, '+8801678845222', 'masud@gmail.com', 1, 1, 1, '213', '2022-12-21 04:33:38', '2023-01-04 01:09:09'),
(6, 6, 4, 12190, NULL, 'Rahul saha', NULL, NULL, '+8801678845222', 'rahul@gmail.com', 1, 1, 1, '2312', '2022-12-21 04:33:56', '2023-01-04 01:08:53'),
(9, 10, 1, 12188, 1, 'Sanjoy SutraDhar', 'Software Engineer', 'male', '0160185222', 'sanjoy@gmail.com', 1, 1, 1, '34314', '2023-01-04 00:41:45', '2023-01-05 07:05:04'),
(10, 10, 6, 434234, 1, 'Monir hasan', 'Embedded Engineer', 'male', '324234234', 'monir@gmail.com', 1, 1, 1, '34234', '2023-01-05 06:59:19', '2023-01-05 07:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `year`, `purpose`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, '2022-12-25', '2022', 'christmas day', 1, 1, '2022-12-21 05:58:06', '2022-12-21 06:10:28'),
(2, '2022-12-16', '2022', 'Independent Day', 1, NULL, '2022-12-21 05:58:51', '2022-12-21 05:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `leave_start_date` date DEFAULT NULL,
  `leave_end_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_at` timestamp NULL DEFAULT NULL,
  `approvedby_id` bigint UNSIGNED DEFAULT NULL,
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `employee_id`, `detail`, `leave_start_date`, `leave_end_date`, `status`, `approved_at`, `approvedby_id`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'I need a Leave', '2023-01-06', '2023-01-19', 'pending', NULL, NULL, 1, 1, '2023-01-03 00:43:29', '2023-01-03 03:30:33'),
(3, 4, 6, '<p>I need a leave</p>', '2023-01-27', '2023-01-23', 'cancelled', NULL, NULL, 1, 1, '2023-01-03 02:01:51', '2023-01-03 04:07:35'),
(4, 3, 5, '<p>I need a leave</p>', '2023-01-04', '2023-01-11', 'pending', NULL, NULL, 1, NULL, '2023-01-03 04:16:49', '2023-01-03 04:16:49'),
(5, 1, 8, '<p>I need a leave</p>', '2023-01-04', '2023-01-11', 'pending', NULL, NULL, 1, NULL, '2023-01-03 05:48:59', '2023-01-03 05:48:59'),
(6, 7, 7, 'I need a Leave', '2023-01-12', '2023-01-26', 'pending', NULL, NULL, 7, NULL, '2023-01-03 06:06:29', '2023-01-03 06:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `type`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'Menu Type About Us', 1, 1, NULL, '2022-12-26 01:29:20', '2022-12-26 01:29:20'),
(2, 'Academic', 'Menu Type Academic', 1, 1, NULL, '2022-12-26 01:29:44', '2022-12-26 01:29:44'),
(3, 'Admission', 'Menu Type Admission', 1, 1, 1, '2022-12-26 01:30:08', '2022-12-26 01:30:43'),
(4, 'Resources', 'Menu Type Resources', 1, 1, NULL, '2022-12-26 01:30:29', '2022-12-26 01:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `menu_pages`
--

CREATE TABLE `menu_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED DEFAULT NULL,
  `page_id` bigint UNSIGNED DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hide` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_pages`
--

INSERT INTO `menu_pages` (`id`, `menu_id`, `page_id`, `active`, `title_hide`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '0', 1, 1, '2022-12-26 01:36:34', '2022-12-26 03:50:22'),
(2, 2, 1, '1', '0', 1, 1, '2022-12-26 01:36:35', '2022-12-26 03:50:22'),
(3, 1, 2, '1', '0', 1, NULL, '2022-12-26 03:28:54', '2022-12-26 03:28:54'),
(4, 2, 2, '1', '0', 1, NULL, '2022-12-26 03:28:54', '2022-12-26 03:28:54'),
(5, 3, 2, '1', '0', 1, NULL, '2022-12-26 03:28:54', '2022-12-26 03:28:54'),
(6, 1, 3, '1', '0', 1, NULL, '2022-12-26 03:28:54', '2022-12-26 03:28:54'),
(7, 2, 3, '1', '0', 1, NULL, '2022-12-26 03:28:54', '2022-12-26 03:28:54'),
(8, 3, 3, '1', '0', 1, NULL, '2022-12-26 03:28:54', '2022-12-26 03:28:54'),
(9, 3, 1, '1', '0', 1, 1, '2022-12-26 03:50:46', '2022-12-26 03:50:46'),
(10, 4, 1, '1', '0', 1, 1, '2022-12-26 03:50:46', '2022-12-26 03:50:46'),
(12, 2, 4, '0', '1', 1, 1, '2022-12-26 04:53:24', '2022-12-26 04:53:24'),
(13, 3, 4, '0', '1', 1, 1, '2022-12-26 04:53:24', '2022-12-26 04:53:24'),
(14, 1, 5, '0', '0', 1, 1, '2022-12-26 04:54:03', '2022-12-26 04:54:19'),
(15, 2, 5, '0', '0', 1, 1, '2022-12-26 04:54:03', '2022-12-26 04:54:19'),
(16, 3, 5, '0', '0', 1, 1, '2022-12-26 04:54:03', '2022-12-26 04:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_19_160129_create_roles_table', 1),
(6, '2022_12_21_053411_create_companies_table', 2),
(7, '2022_12_21_054302_create_employees_table', 3),
(8, '2022_12_21_105217_create_holidays_table', 4),
(17, '2022_12_24_131347_create_menus_table', 5),
(18, '2022_12_24_131412_create_pages_table', 5),
(19, '2022_12_24_131509_create_page_items_table', 5),
(20, '2022_12_24_131535_create_menu_pages_table', 5),
(21, '2022_12_27_084900_create_blog_categories_table', 6),
(22, '2022_12_27_084918_create_blog_sub_categories_table', 6),
(23, '2022_12_27_104758_create_blog_posts_table', 7),
(24, '2022_12_28_074350_create_blog_category_posts_table', 8),
(25, '2022_12_28_074445_create_blog_subcategory_posts_table', 8),
(28, '2023_01_01_031410_create_office_locations_table', 9),
(29, '2023_01_01_032228_create_user_locations_table', 9),
(30, '2023_01_01_103917_create_attendances_table', 10),
(31, '2023_01_03_052410_create_leaves_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `office_locations`
--

CREATE TABLE `office_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `police_station_id` bigint UNSIGNED DEFAULT NULL,
  `google_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_start_time` time DEFAULT NULL,
  `office_end_time` time DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `featured_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_locations`
--

INSERT INTO `office_locations` (`id`, `title`, `company_id`, `division_id`, `district_id`, `police_station_id`, `google_location`, `lat`, `lng`, `office_start_time`, `office_end_time`, `active`, `featured_image`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 'SARBS Communication Ltd.', 10, NULL, NULL, NULL, 'Gulshan-1, Road-32', '23.786103', '-269.584860', '09:00:00', '18:00:00', 1, 'admin/images/office-location/1672550100.jpg', 1, NULL, '2022-12-31 23:15:00', '2022-12-31 23:15:00'),
(2, 'Robi Telecommunication Ltd.', 5, NULL, NULL, NULL, 'Gulshan-1, Road-21', '23.781282', '-269.583533', '09:00:00', '18:00:00', 1, 'admin/images/office-location/1672550362.png', 1, 1, '2022-12-31 23:19:22', '2023-01-01 00:40:40'),
(3, 'SARBS Communication Ltd.2', 10, NULL, NULL, NULL, 'Gulshan-1, Road-21', '23.781282', '-269.583533', '09:00:00', '18:00:00', 0, 'admin/images/office-location/1672550470.jpg', 1, 11, '2022-12-31 23:21:10', '2023-01-02 04:15:15'),
(4, 'Apex Footwear company Ltd.', 6, NULL, NULL, NULL, 'Gulshan-1, Road-137', '23.781282', '-269.58355', '09:00:00', '21:00:00', 1, 'admin/images/office-location/1672556892.png', 1, NULL, '2023-01-01 01:08:12', '2023-01-01 01:08:12'),
(5, 'Bengal gas company limited', 9, NULL, NULL, NULL, 'Gulshan-1, Road-28', '23.786103', '-269.584860', '09:00:00', '18:00:00', 0, 'admin/images/office-location/1672557142.jpg', 1, NULL, '2023-01-01 01:12:22', '2023-01-01 01:12:22'),
(7, 'SARBS Communication Ltd location 3.', 10, NULL, NULL, NULL, 'Gulshan-1, Road-32', '23.786103', '-269.584860', '17:54:00', '17:52:00', 0, 'admin/images/office-location/1672574001.jpg', 1, NULL, '2023-01-01 05:53:21', '2023-01-01 05:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `excerpt`, `active`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(1, 'Welcome Message', 'This is Welcome Message excerpt', 1, 1, NULL, '2022-12-26 01:31:55', '2022-12-26 01:31:55'),
(2, 'Mission & Vision', 'This is Mission & Vision excerpt', 1, 1, NULL, '2022-12-26 01:32:31', '2022-12-26 01:32:31'),
(3, 'Committee List', 'This is Committee List excerpt', 1, 1, NULL, '2022-12-26 01:32:56', '2022-12-26 01:32:56'),
(4, 'Job & Vacancy', 'This is Job & Vacancy excerpt', 1, 1, NULL, '2022-12-26 01:33:21', '2022-12-26 01:33:21'),
(5, 'Yearly Holiday', 'This Is Yearly Holiday Excerpt', 1, 1, NULL, '2022-12-26 01:33:53', '2022-12-26 01:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `page_items`
--

CREATE TABLE `page_items` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `editor` tinyint(1) NOT NULL DEFAULT '1',
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_items`
--

INSERT INTO `page_items` (`id`, `page_id`, `name`, `description`, `active`, `editor`, `addedby_id`, `editedby_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'header part', '<p>This is a description of <b>header </b>of<b> Mission &amp; Vision</b></p>', 1, 1, 1, NULL, '2022-12-26 22:21:52', '2022-12-26 22:21:52'),
(24, 3, 'Header 2', '<p>Header</p>', 1, 1, 1, 1, '2023-01-04 09:48:53', '2023-01-04 10:20:27'),
(25, 3, 'Body 3', '<p>Body 3</p>', 1, 1, 1, 1, '2023-01-04 09:49:20', '2023-01-04 10:08:18'),
(28, 1, 'hi', '<p>sfsdfdsf</p>', 1, 1, 1, 1, '2023-01-04 10:36:25', '2023-01-04 10:40:50'),
(29, 1, 'hello', '<p>sdfdsfdsf</p>', 0, 1, 1, 1, '2023-01-04 10:36:36', '2023-01-04 10:43:25'),
(30, 1, 'fsdf', '<p>dfsdf</p>', 0, 0, 1, NULL, '2023-01-04 10:43:45', '2023-01-04 10:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by_id` int UNSIGNED DEFAULT NULL,
  `edited_by_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `role_name`, `role_value`, `added_by_id`, `edited_by_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Admin', 1, 1, '2022-12-19 22:42:18', '2022-12-19 22:42:18'),
(12, 3, 'blog_admin', 'BlogAdmin', 1, 1, '2022-12-20 04:22:35', '2022-12-20 07:36:53'),
(13, 4, 'admin', 'Admin', 1, 1, '2022-12-20 07:37:17', '2022-12-20 07:37:45'),
(14, 11, 'admin', 'Admin', 1, NULL, '2022-12-20 07:37:17', '2022-12-20 07:37:45'),
(21, 8, 'blog_admin', 'BlogAdmin', 1, 1, '2023-01-04 22:30:13', '2023-01-04 22:31:21'),
(22, 6, 'admin', 'Admin', 1, NULL, '2023-01-04 22:31:30', '2023-01-04 22:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sanjoy SutraDhar', 'sanjoy@gmail.com', NULL, '$2y$10$/f0rqfYLYpMveabTojdIDeQlITAEJkrIPGVoAPZZnsYwNrAVBbRY6', NULL, '2022-12-19 21:56:48', '2023-01-04 06:40:03'),
(3, 'Masud Hasan', 'masud1@gmail.com', NULL, '$2y$10$qg6xTnPfh86.9GAf5IOdIe2QwgMbumvJGvSr2hz47N8vQ9R.EZ.HK', NULL, '2022-12-19 21:58:16', '2023-01-04 06:46:17'),
(4, 'Rahul saha', 'rahul@gmail.com', NULL, '$2y$10$Ly910nL9ipB4lW6wasoLK.FweV2i3OtcYG/7T5U9vLOg.rfgY3bCW', NULL, '2022-12-19 21:58:50', '2022-12-19 21:58:50'),
(6, 'Monir hasan', 'monir@gmail.com', NULL, '$2y$10$AsHh6EDRReMzt8AMWqytyeIwLgFQCt/MiBc267acY8qLIgq3nAvWG', NULL, '2022-12-20 21:19:54', '2022-12-20 21:19:54'),
(7, 'Testing One', 'test1@gmail.com', NULL, '$2y$10$5r1/gqGVL0XJIByotQtyW.dNk3kmuwvfbmnOHVNMdWaeFQs59zlYa', 'nLv6uKF32Onaao90UM1sauzhIGUkT9p8CubqHiAicQd8uROEBmpGJsJOY1sw', '2022-12-20 21:20:22', '2022-12-20 21:35:59'),
(8, 'Test Two', 'test2@gmail.com', NULL, '$2y$10$hoggxUamjQTSeUCBeyR.MOYmPhCL/yIif.rpL9mwWsHLXC.cEtJ6u', NULL, '2022-12-20 21:20:46', '2022-12-20 21:20:46'),
(9, 'Test Three', 'test3@gmail.com', NULL, '$2y$10$7wN.WakTdFyQIb3K4YJU7OuqjA.y12071pMmeZEZWhPloHnb0FrR2', NULL, '2022-12-20 21:21:12', '2022-12-20 21:21:12'),
(10, 'Test Four', 'test4@gmail.com', NULL, '$2y$10$/wShDFDLwxY6..g.A4FEv.58T3CoFKqF4A05jtdnlLmpTWpasNqLC', NULL, '2022-12-20 21:21:59', '2022-12-20 21:21:59'),
(11, 'Admin', 'admin@gmail.com', NULL, '$2y$10$bk9b67oAjniJa8Xbr3ekyuDdBdFUs08WXnVUkLd1X12bJSR34uwh.', NULL, NULL, NULL),
(12, 'User', 'user1@gmail.com', NULL, '$2y$10$LYotx5MPjEgs1ItSjN270.WZKwLrNO1LXRfJEaDlcR.mlCe9EOc46', NULL, NULL, '2023-01-04 22:01:40'),
(13, 'omar', 'omar@gmail.com', NULL, '$2y$10$daIrBS1EHDFMKbbqIHEp7eaPXCwOaNm6Qf3w/Bjvi/r8IpvoH0hQe', NULL, '2023-01-04 22:02:10', '2023-01-04 22:02:10'),
(14, 'cczxc', 'zxczxc@gmial.com', NULL, '$2y$10$.3j8b8cpBBMOLIEFUVSxh.3KEZh2CoteAhj93GHi26GLY50VDk45e', NULL, '2023-01-05 05:41:30', '2023-01-05 05:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `office_location_id` bigint UNSIGNED DEFAULT NULL,
  `addedby_id` bigint UNSIGNED DEFAULT NULL,
  `editedby_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_posts`
--
ALTER TABLE `blog_category_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_subcategory_posts`
--
ALTER TABLE `blog_subcategory_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_sub_categories`
--
ALTER TABLE `blog_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_pages`
--
ALTER TABLE `menu_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_locations`
--
ALTER TABLE `office_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_items`
--
ALTER TABLE `page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_category_posts`
--
ALTER TABLE `blog_category_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_subcategory_posts`
--
ALTER TABLE `blog_subcategory_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `blog_sub_categories`
--
ALTER TABLE `blog_sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_pages`
--
ALTER TABLE `menu_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `office_locations`
--
ALTER TABLE `office_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_items`
--
ALTER TABLE `page_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
