-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 21 août 2024 à 09:44
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `sylius_ek_dev`
--

--
-- Déchargement des données de la table `sylius_admin_user`
--

INSERT INTO `sylius_admin_user` (`id`, `username`, `username_canonical`, `enabled`, `salt`, `password`, `last_login`, `password_reset_token`, `password_requested_at`, `email_verification_token`, `verified_at`, `locked`, `expires_at`, `credentials_expire_at`, `roles`, `email`, `email_canonical`, `created_at`, `updated_at`, `first_name`, `last_name`, `locale_code`, `encoder_name`) VALUES
(1, 'simon@16h33.fr', 'simon@16h33.fr', 1, 'iar3umskwrkkk0c40884kcg0kcgwgo4', '$argon2i$v=19$m=65536,t=4,p=1$a1lPM3pXenUzQ0RjbVp1dg$LmfwBXTYScLYfFrnPQZSxFYiBuk2k7XrogjB5rJ1WcE', '2024-08-05 12:46:45', NULL, NULL, NULL, NULL, 0, NULL, NULL, '[\"ROLE_ADMINISTRATION_ACCESS\"]', 'simon@16h33.fr', 'simon@16h33.fr', '2024-07-09 07:53:53', '2024-08-05 12:46:45', NULL, NULL, 'fr', 'argon2i');

--
-- Déchargement des données de la table `sylius_avatar_image`
--

INSERT INTO `sylius_avatar_image` (`id`, `owner_id`, `type`, `path`) VALUES
(1, 1, NULL, 'e8/cf/fc0dce11a875a0d3f33e86854427.jpg');

--
-- Déchargement des données de la table `sylius_category_promotion`
--

INSERT INTO `sylius_category_promotion` (`id`, `displayFrom`, `displayTo`, `position`) VALUES
(6, NULL, NULL, 2);

--
-- Déchargement des données de la table `sylius_category_promotion_image`
--

INSERT INTO `sylius_category_promotion_image` (`id`, `type`, `path`, `owner_id`) VALUES
(1, NULL, 'e2/a4/2b7c9d25fff3da77edff898ab8a6.jpg', 6),
(2, NULL, '45/e2/a7a2e091ca877616770f2351fd4e.jpg', 7);

--
-- Déchargement des données de la table `sylius_category_promotion_translation`
--

INSERT INTO `sylius_category_promotion_translation` (`id`, `translatable_id`, `title`, `locale`) VALUES
(6, 6, 'test', 'fr_FR'),
(7, 6, 'Les deux gars', 'en');

--
-- Déchargement des données de la table `sylius_channel`
--

INSERT INTO `sylius_channel` (`id`, `default_locale_id`, `base_currency_id`, `default_tax_zone_id`, `code`, `name`, `color`, `description`, `enabled`, `hostname`, `created_at`, `updated_at`, `theme_name`, `tax_calculation_strategy`, `contact_email`, `skipping_shipping_step_allowed`, `account_verification_required`, `skipping_payment_step_allowed`, `shop_billing_data_id`, `menu_taxon_id`, `contact_phone_number`, `shipping_address_in_checkout_required`, `channel_price_history_config_id`) VALUES
(1, 1, 1, NULL, 'default', 'Default', NULL, NULL, 1, NULL, '2024-07-09 07:53:53', '2024-07-09 07:53:53', NULL, 'order_items_based', NULL, 0, 1, 0, NULL, NULL, NULL, 0, 1);

--
-- Déchargement des données de la table `sylius_channel_currencies`
--

INSERT INTO `sylius_channel_currencies` (`channel_id`, `currency_id`) VALUES
(1, 1);

--
-- Déchargement des données de la table `sylius_channel_locales`
--

INSERT INTO `sylius_channel_locales` (`channel_id`, `locale_id`) VALUES
(1, 1);

--
-- Déchargement des données de la table `sylius_channel_price_history_config`
--

INSERT INTO `sylius_channel_price_history_config` (`id`, `lowest_price_for_discounted_products_checking_period`, `lowest_price_for_discounted_products_visible`) VALUES
(1, 30, 1);

--
-- Déchargement des données de la table `sylius_currency`
--

INSERT INTO `sylius_currency` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'EUR', '2024-07-09 07:53:48', '2024-07-09 07:53:48');

--
-- Déchargement des données de la table `sylius_locale`
--

INSERT INTO `sylius_locale` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'fr_FR', '2024-07-09 07:53:53', '2024-07-09 07:53:53'),
(5, 'en', '2024-07-16 14:37:39', '2024-07-16 14:37:40'),
(6, 'fr', '2024-07-16 14:43:38', '2024-07-16 14:43:39');

--
-- Déchargement des données de la table `sylius_menu`
--

INSERT INTO `sylius_menu` (`id`, `lang_id`) VALUES
(5, 5),
(6, 6);

--
-- Déchargement des données de la table `sylius_menu_item`
--

INSERT INTO `sylius_menu_item` (`id`, `menu_id`, `position`, `type`, `title`, `url`, `taxon_id`, `menuPage_id`) VALUES
(3, 5, 1, 'link', 'Offres du moment', '#', NULL, 1),
(4, 5, 2, 'category', 'Homme', '#', 1, 1),
(5, 5, 2, 'link', 'Produits', '#', NULL, 2),
(6, 5, 1, 'link', 'En ce moment', '#', NULL, 2);

--
-- Déchargement des données de la table `sylius_menu_page`
--

INSERT INTO `sylius_menu_page` (`id`, `menu_id`, `title`, `menuItemParent_id`) VALUES
(1, 5, 'Niveau 1', NULL),
(2, 5, 'Homme', 4);

--
-- Déchargement des données de la table `sylius_migrations`
--

INSERT INTO `sylius_migrations` (`version`, `executed_at`, `execution_time`) VALUES
('App\\Migrations\\Version20240711102836', '2024-07-11 11:36:06', 98),
('App\\Migrations\\Version20240715145739', '2024-07-15 14:57:53', 47),
('App\\Migrations\\Version20240717082308', '2024-07-17 12:17:13', 122),
('App\\Migrations\\Version20240717140724', '2024-07-17 14:07:35', 105),
('App\\Migrations\\Version20240718083648', '2024-07-18 08:36:58', 100),
('App\\Migrations\\Version20240718141815', '2024-07-18 14:18:32', 168),
('App\\Migrations\\Version20240725110528', '2024-07-25 11:05:43', 79),
('App\\Migrations\\Version20240726132507', '2024-07-26 13:25:20', 116),
('App\\Migrations\\Version20240726135113', '2024-07-26 13:51:19', 111),
('App\\Migrations\\Version20240801083430', '2024-08-01 08:35:50', 597),
('App\\Migrations\\Version20240806072336', '2024-08-06 07:23:44', 132),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161202011555', '2024-07-09 07:53:28', 1491),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161209095131', '2024-07-09 07:53:29', 2),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161214153137', '2024-07-09 07:53:29', 33),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161215103325', '2024-07-09 07:53:29', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161219160441', '2024-07-09 07:53:29', 26),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161220092422', '2024-07-09 07:53:29', 7),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161221133514', '2024-07-09 07:53:29', 16),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161223091334', '2024-07-09 07:53:29', 13),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20161223164558', '2024-07-09 07:53:29', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170103120334', '2024-07-09 07:53:29', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170109143010', '2024-07-09 07:53:29', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170110120125', '2024-07-09 07:53:29', 17),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170116215417', '2024-07-09 07:53:29', 27),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170117075436', '2024-07-09 07:53:29', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170120164250', '2024-07-09 07:53:29', 23),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170124221955', '2024-07-09 07:53:29', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170201094058', '2024-07-09 07:53:29', 35),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170206122839', '2024-07-09 07:53:29', 8),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170206141520', '2024-07-09 07:53:29', 12),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170208102345', '2024-07-09 07:53:29', 8),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170208103250', '2024-07-09 07:53:29', 16),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170214095710', '2024-07-09 07:53:29', 29),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170214104908', '2024-07-09 07:53:30', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170215143031', '2024-07-09 07:53:30', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170217141621', '2024-07-09 07:53:30', 22),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170220150813', '2024-07-09 07:53:30', 15),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170223071604', '2024-07-09 07:53:30', 57),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170301135010', '2024-07-09 07:53:30', 30),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170303170201', '2024-07-09 07:53:30', 19),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170321131352', '2024-07-09 07:53:30', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170327135945', '2024-07-09 07:53:30', 20),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170401200415', '2024-07-09 07:53:30', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170518123056', '2024-07-09 07:53:30', 5),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170824124122', '2024-07-09 07:53:30', 17),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20170913125128', '2024-07-09 07:53:30', 17),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20171003103916', '2024-07-09 07:53:30', 30),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20180102140039', '2024-07-09 07:53:30', 6),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20180226142349', '2024-07-09 07:53:30', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20190109095211', '2024-07-09 07:53:30', 43),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20190109160409', '2024-07-09 07:53:30', 19),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20190204092544', '2024-07-09 07:53:30', 7),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20190416073011', '2024-07-09 07:53:30', 14),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20190607135638', '2024-07-09 07:53:30', 18),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20191024065651', '2024-07-09 07:53:30', 18),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20200110132702', '2024-07-09 07:53:30', 39),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20200122082429', '2024-07-09 07:53:30', 33),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20200202104152', '2024-07-09 07:53:30', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20200309172908', '2024-07-09 07:53:30', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20200325075815', '2024-07-09 07:53:30', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20200916093101', '2024-07-09 07:53:30', 19),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20201017150005', '2024-07-09 07:53:30', 13),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20201104085538', '2024-07-09 07:53:30', 23),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20201130071338', '2024-07-09 07:53:30', 112),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20201204071301', '2024-07-09 07:53:30', 74),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20201208105207', '2024-07-09 07:53:30', 1),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210311142134', '2024-07-09 07:53:30', 22),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210408131321', '2024-07-09 07:53:30', 11),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210422105530', '2024-07-09 07:53:30', 20),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210809121349', '2024-07-09 07:53:30', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210819203611', '2024-07-09 07:53:30', 6),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210824132538', '2024-07-09 07:53:30', 18),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210825090004', '2024-07-09 07:53:30', 24),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210826054355', '2024-07-09 07:53:30', 32),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210826063828', '2024-07-09 07:53:30', 21),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210830193340', '2024-07-09 07:53:30', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20210921093619', '2024-07-09 07:53:30', 15),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211001073918', '2024-07-09 07:53:30', 18),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211006182150', '2024-07-09 07:53:31', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211008105704', '2024-07-09 07:53:31', 8),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211018130725', '2024-07-09 07:53:31', 35),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211025082311', '2024-07-09 07:53:31', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211028150911', '2024-07-09 07:53:31', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211122104644', '2024-07-09 07:53:31', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211125085254', '2024-07-09 07:53:31', 5),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211125122631', '2024-07-09 07:53:31', 9),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20211129213836', '2024-07-09 07:53:31', 44),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220127150747', '2024-07-09 07:53:31', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220203115813', '2024-07-09 07:53:31', 80),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220210135918', '2024-07-09 07:53:31', 13),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220407131547', '2024-07-09 07:53:31', 91),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220412144156', '2024-07-09 07:53:31', 1),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220614124639', '2024-07-09 07:53:31', 0),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220728115129', '2024-07-09 07:53:31', 12),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220803125615', '2024-07-09 07:53:31', 27),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220912091947', '2024-07-09 07:53:31', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20220926113252', '2024-07-09 07:53:31', 19),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20230327121633', '2024-07-09 07:53:31', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20230331091850', '2024-07-09 07:53:31', 201),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20230419092354', '2024-07-09 09:53:31', NULL),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20230420151332', '2024-07-09 09:53:31', NULL),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20230426153930', '2024-07-09 09:53:31', NULL),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20230426154358', '2024-07-09 07:53:31', 21),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20231103004216', '2024-07-09 07:53:31', 46),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20240216110238', '2024-07-09 07:53:31', 10),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20240216110239', '2024-07-09 09:53:31', NULL),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20240315112656', '2024-07-09 07:53:31', 120),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20240318083808', '2024-07-09 09:53:31', NULL),
('Sylius\\Bundle\\CoreBundle\\Migrations\\Version20240318094743', '2024-07-09 09:53:31', NULL),
('Sylius\\LoyaltyPlugin\\Infrastructure\\Migrations\\Version20220712111239', '2024-07-09 08:49:26', 249),
('Sylius\\LoyaltyPlugin\\Infrastructure\\Migrations\\Version20220808084654', '2024-07-09 08:49:26', 0),
('Sylius\\LoyaltyPlugin\\Infrastructure\\Migrations\\Version20220809122823', '2024-07-09 08:49:26', 62),
('Sylius\\LoyaltyPlugin\\Infrastructure\\Migrations\\Version20230717095853', '2024-07-09 08:49:26', 1),
('Sylius\\MultiSourceInventoryPlugin\\Migrations\\Version20220620064817', '2024-07-09 08:49:26', 196),
('Sylius\\MultiSourceInventoryPlugin\\Migrations\\Version20220623092256', '2024-07-09 08:49:26', 3),
('Sylius\\MultiSourceInventoryPlugin\\Migrations\\Version20220809121610', '2024-07-09 08:49:26', 52),
('Sylius\\MultiSourceInventoryPlugin\\Migrations\\Version20221028091506', '2024-07-09 08:49:26', 46),
('Sylius\\PayPalPlugin\\Migrations\\Version20200907102535', '2024-07-09 07:53:31', 19),
('Sylius\\PayPalPlugin\\Migrations\\Version20240319121423', '2024-07-09 09:53:31', NULL),
('Sylius\\RefundPlugin\\Migrations\\Version20180704112314', '2024-07-09 09:31:59', 19),
('Sylius\\RefundPlugin\\Migrations\\Version20180718125528', '2024-07-09 09:31:59', 45),
('Sylius\\RefundPlugin\\Migrations\\Version20180817130113', '2024-07-09 09:31:59', 30),
('Sylius\\RefundPlugin\\Migrations\\Version20180820132147', '2024-07-09 09:31:59', 12),
('Sylius\\RefundPlugin\\Migrations\\Version20180829090832', '2024-07-09 09:31:59', 8),
('Sylius\\RefundPlugin\\Migrations\\Version20190207125150', '2024-07-09 09:31:59', 20),
('Sylius\\RefundPlugin\\Migrations\\Version20190215154028', '2024-07-09 09:31:59', 17),
('Sylius\\RefundPlugin\\Migrations\\Version20190517064223', '2024-07-09 09:31:59', 5),
('Sylius\\RefundPlugin\\Migrations\\Version20190928200659', '2024-07-09 09:31:59', 156),
('Sylius\\RefundPlugin\\Migrations\\Version20191217075815', '2024-07-09 09:31:59', 44),
('Sylius\\RefundPlugin\\Migrations\\Version20191230121402', '2024-07-09 09:31:59', 61),
('Sylius\\RefundPlugin\\Migrations\\Version20200113091731', '2024-07-09 09:31:59', 12),
('Sylius\\RefundPlugin\\Migrations\\Version20200125182414', '2024-07-09 09:31:59', 84),
('Sylius\\RefundPlugin\\Migrations\\Version20200131082149', '2024-07-09 09:31:59', 59),
('Sylius\\RefundPlugin\\Migrations\\Version20200304172851', '2024-07-09 09:31:59', 0),
('Sylius\\RefundPlugin\\Migrations\\Version20200306145439', '2024-07-09 09:31:59', 18),
('Sylius\\RefundPlugin\\Migrations\\Version20200306153205', '2024-07-09 09:31:59', 25),
('Sylius\\RefundPlugin\\Migrations\\Version20200310094633', '2024-07-09 09:31:59', 10),
('Sylius\\RefundPlugin\\Migrations\\Version20200310185620', '2024-07-09 09:31:59', 5),
('Sylius\\RefundPlugin\\Migrations\\Version20210608074013', '2024-07-09 09:31:59', 51),
('Sylius\\RefundPlugin\\Migrations\\Version20210609071246', '2024-07-09 09:31:59', 38);

--
-- Déchargement des données de la table `sylius_multi_source_inventory_inventory_source`
--

INSERT INTO `sylius_multi_source_inventory_inventory_source` (`id`, `address_id`, `code`, `name`, `priority`) VALUES
(1, NULL, 'default', 'Default', 0);

--
-- Déchargement des données de la table `sylius_multi_source_inventory_inventory_source_channels`
--

INSERT INTO `sylius_multi_source_inventory_inventory_source_channels` (`inventory_source_id`, `channel_id`) VALUES
(1, 1);

--
-- Déchargement des données de la table `sylius_product_attribute`
--

INSERT INTO `sylius_product_attribute` (`id`, `code`, `type`, `storage_type`, `configuration`, `created_at`, `updated_at`, `position`, `translatable`) VALUES
(1, 'size', 'checkbox', 'boolean', '[]', '2024-07-11 09:36:22', '2024-07-11 09:36:23', 0, 1);

--
-- Déchargement des données de la table `sylius_product_attribute_translation`
--

INSERT INTO `sylius_product_attribute_translation` (`id`, `translatable_id`, `name`, `locale`) VALUES
(1, 1, 'Taille', 'fr_FR');

--
-- Déchargement des données de la table `sylius_product_option`
--

INSERT INTO `sylius_product_option` (`id`, `code`, `created_at`, `updated_at`, `position`, `isColor`) VALUES
(1, 'size', '2024-07-11 09:37:07', '2024-07-11 09:37:08', 0, 0),
(2, 'color', '2024-07-12 13:13:37', '2024-07-12 13:13:37', 1, 1);

--
-- Déchargement des données de la table `sylius_product_option_translation`
--

INSERT INTO `sylius_product_option_translation` (`id`, `translatable_id`, `name`, `locale`) VALUES
(1, 1, 'Taille', 'fr_FR'),
(2, 2, 'Couleur', 'fr_FR');

--
-- Déchargement des données de la table `sylius_product_option_value`
--

INSERT INTO `sylius_product_option_value` (`id`, `option_id`, `code`, `color`) VALUES
(1, 1, 'L', NULL),
(2, 1, 'M', NULL),
(3, 1, 'S', NULL),
(4, 2, 'red', '#d21414');

--
-- Déchargement des données de la table `sylius_product_option_value_translation`
--

INSERT INTO `sylius_product_option_value_translation` (`id`, `translatable_id`, `value`, `locale`) VALUES
(1, 1, 'L', 'fr_FR'),
(2, 2, 'M', 'fr_FR'),
(3, 3, 'S', 'fr_FR'),
(4, 4, 'Rouge', 'fr_FR');

--
-- Déchargement des données de la table `sylius_taxon`
--

INSERT INTO `sylius_taxon` (`id`, `tree_root`, `parent_id`, `code`, `tree_left`, `tree_right`, `tree_level`, `position`, `created_at`, `updated_at`, `enabled`) VALUES
(1, 1, NULL, 'homme', 1, 6, 0, 0, '2024-07-26 13:15:47', '2024-07-26 13:15:47', 1),
(2, 1, 1, 'vetements', 2, 5, 1, 0, '2024-07-26 13:16:27', '2024-07-26 13:16:27', 1),
(3, 1, 2, 'cuissards', 3, 4, 2, 0, '2024-07-26 13:16:54', '2024-07-26 13:16:55', 1);

--
-- Déchargement des données de la table `sylius_taxon_image`
--

INSERT INTO `sylius_taxon_image` (`id`, `owner_id`, `type`, `path`) VALUES
(1, 1, NULL, '11/62/c273a717d3e4c34fe7fd7f21c9ca.jpg');

--
-- Déchargement des données de la table `sylius_taxon_translation`
--

INSERT INTO `sylius_taxon_translation` (`id`, `translatable_id`, `name`, `slug`, `description`, `locale`) VALUES
(1, 1, 'Homme', 'homme', NULL, 'fr_FR'),
(2, 2, 'Vêtements', 'homme/vetements', NULL, 'fr_FR'),
(3, 3, 'Cuissards', 'homme/vetements/cuissards', NULL, 'fr_FR'),
(4, 1, 'Men', 'men', NULL, 'en'),
(5, 1, 'Homme', 'homme', NULL, 'fr');
