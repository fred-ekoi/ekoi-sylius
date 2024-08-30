-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 août 2024 à 14:23
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sylius_ek_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_address`
--

CREATE TABLE `sylius_address` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_address_log_entries`
--

CREATE TABLE `sylius_address_log_entries` (
  `id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` json DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_adjustment`
--

CREATE TABLE `sylius_adjustment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_item_id` int(11) DEFAULT NULL,
  `order_item_unit_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `is_neutral` tinyint(1) NOT NULL,
  `is_locked` tinyint(1) NOT NULL,
  `origin_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  `details` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_admin_user`
--

CREATE TABLE `sylius_admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `roles` json NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale_code` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `encoder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_admin_user`
--

INSERT INTO `sylius_admin_user` (`id`, `username`, `username_canonical`, `enabled`, `salt`, `password`, `last_login`, `password_reset_token`, `password_requested_at`, `email_verification_token`, `verified_at`, `locked`, `expires_at`, `credentials_expire_at`, `roles`, `email`, `email_canonical`, `created_at`, `updated_at`, `first_name`, `last_name`, `locale_code`, `encoder_name`) VALUES
(1, 'simon@16h33.fr', 'simon@16h33.fr', 1, 'iar3umskwrkkk0c40884kcg0kcgwgo4', '$argon2i$v=19$m=65536,t=4,p=1$a1lPM3pXenUzQ0RjbVp1dg$LmfwBXTYScLYfFrnPQZSxFYiBuk2k7XrogjB5rJ1WcE', '2024-08-05 12:46:45', NULL, NULL, NULL, NULL, 0, NULL, NULL, '[\"ROLE_ADMINISTRATION_ACCESS\"]', 'simon@16h33.fr', 'simon@16h33.fr', '2024-07-09 07:53:53', '2024-08-05 12:46:45', NULL, NULL, 'fr', 'argon2i');

INSERT INTO `sylius_admin_user` (`id`, `username`, `username_canonical`, `enabled`, `salt`, `password`, `last_login`, `password_reset_token`, `password_requested_at`, `email_verification_token`, `verified_at`, `locked`, `expires_at`, `credentials_expire_at`, `roles`, `email`, `email_canonical`, `created_at`, `updated_at`, `first_name`, `last_name`, `locale_code`, `encoder_name`) VALUES 
(2, 'contact@16h33.fr', 'contact@16h33.fr', '1', '3tdaz9n2q9icswg4g0ksw48kws4ssow', '$argon2i$v=19$m=65536,t=4,p=1$NS5UVk9QSHRwREN1dS9Qbg$mi2S+uTBgFrg8ptHuW7gGK3+5lb3og2lVFt0ct8L/8k', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '[\"ROLE_ADMINISTRATION_ACCESS\"]', 'contact@16h33.fr', 'contact@16h33.fr', '2024-08-30 09:27:26', '2024-08-30 09:27:27', 'Admin', 'Admin', 'fr_FR', 'argon2i')
-- --------------------------------------------------------

--
-- Structure de la table `sylius_avatar_image`
--

CREATE TABLE `sylius_avatar_image` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_avatar_image`
--

INSERT INTO `sylius_avatar_image` (`id`, `owner_id`, `type`, `path`) VALUES
(1, 1, NULL, 'e8/cf/fc0dce11a875a0d3f33e86854427.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_catalog_promotion`
--

CREATE TABLE `sylius_catalog_promotion` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `exclusive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_catalog_promotion_action`
--

CREATE TABLE `sylius_catalog_promotion_action` (
  `id` int(11) NOT NULL,
  `catalog_promotion_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `configuration` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_catalog_promotion_channels`
--

CREATE TABLE `sylius_catalog_promotion_channels` (
  `catalog_promotion_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_catalog_promotion_scope`
--

CREATE TABLE `sylius_catalog_promotion_scope` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `configuration` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_catalog_promotion_translation`
--

CREATE TABLE `sylius_catalog_promotion_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_category_promotion`
--

CREATE TABLE `sylius_category_promotion` (
  `id` int(11) NOT NULL,
  `displayFrom` date DEFAULT NULL,
  `displayTo` date DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_category_promotion`
--

INSERT INTO `sylius_category_promotion` (`id`, `displayFrom`, `displayTo`, `position`) VALUES
(6, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_category_promotion_image`
--

CREATE TABLE `sylius_category_promotion_image` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_category_promotion_image`
--

INSERT INTO `sylius_category_promotion_image` (`id`, `type`, `path`, `owner_id`) VALUES
(1, NULL, 'e2/a4/2b7c9d25fff3da77edff898ab8a6.jpg', 6),
(2, NULL, '45/e2/a7a2e091ca877616770f2351fd4e.jpg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_category_promotion_translation`
--

CREATE TABLE `sylius_category_promotion_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_category_promotion_translation`
--

INSERT INTO `sylius_category_promotion_translation` (`id`, `translatable_id`, `title`, `locale`) VALUES
(6, 6, 'test', 'fr_FR'),
(7, 6, 'Les deux gars', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel`
--

CREATE TABLE `sylius_channel` (
  `id` int(11) NOT NULL,
  `default_locale_id` int(11) NOT NULL,
  `base_currency_id` int(11) NOT NULL,
  `default_tax_zone_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `hostname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `theme_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_calculation_strategy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skipping_shipping_step_allowed` tinyint(1) NOT NULL,
  `account_verification_required` tinyint(1) NOT NULL,
  `skipping_payment_step_allowed` tinyint(1) NOT NULL,
  `shop_billing_data_id` int(11) DEFAULT NULL,
  `menu_taxon_id` int(11) DEFAULT NULL,
  `contact_phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address_in_checkout_required` tinyint(1) NOT NULL DEFAULT '0',
  `channel_price_history_config_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_channel`
--

INSERT INTO `sylius_channel` (`id`, `default_locale_id`, `base_currency_id`, `default_tax_zone_id`, `code`, `name`, `color`, `description`, `enabled`, `hostname`, `created_at`, `updated_at`, `theme_name`, `tax_calculation_strategy`, `contact_email`, `skipping_shipping_step_allowed`, `account_verification_required`, `skipping_payment_step_allowed`, `shop_billing_data_id`, `menu_taxon_id`, `contact_phone_number`, `shipping_address_in_checkout_required`, `channel_price_history_config_id`) VALUES
(1, 1, 1, NULL, 'default', 'Default', NULL, NULL, 1, NULL, '2024-07-09 07:53:53', '2024-07-09 07:53:53', NULL, 'order_items_based', NULL, 0, 1, 0, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_countries`
--

CREATE TABLE `sylius_channel_countries` (
  `channel_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_currencies`
--

CREATE TABLE `sylius_channel_currencies` (
  `channel_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_channel_currencies`
--

INSERT INTO `sylius_channel_currencies` (`channel_id`, `currency_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_locales`
--

CREATE TABLE `sylius_channel_locales` (
  `channel_id` int(11) NOT NULL,
  `locale_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_channel_locales`
--

INSERT INTO `sylius_channel_locales` (`channel_id`, `locale_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_price_history_config`
--

CREATE TABLE `sylius_channel_price_history_config` (
  `id` int(11) NOT NULL,
  `lowest_price_for_discounted_products_checking_period` int(11) NOT NULL DEFAULT '30',
  `lowest_price_for_discounted_products_visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_channel_price_history_config`
--

INSERT INTO `sylius_channel_price_history_config` (`id`, `lowest_price_for_discounted_products_checking_period`, `lowest_price_for_discounted_products_visible`) VALUES
(1, 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_price_history_config_excluded_taxons`
--

CREATE TABLE `sylius_channel_price_history_config_excluded_taxons` (
  `channel_id` int(11) NOT NULL,
  `taxon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_pricing`
--

CREATE TABLE `sylius_channel_pricing` (
  `id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `channel_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_price` int(11) DEFAULT NULL,
  `minimum_price` int(11) DEFAULT '0',
  `lowest_price_before_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_pricing_catalog_promotions`
--

CREATE TABLE `sylius_channel_pricing_catalog_promotions` (
  `channel_pricing_id` int(11) NOT NULL,
  `catalog_promotion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_channel_pricing_log_entry`
--

CREATE TABLE `sylius_channel_pricing_log_entry` (
  `id` int(11) NOT NULL,
  `channel_pricing_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `original_price` int(11) DEFAULT NULL,
  `logged_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_country`
--

CREATE TABLE `sylius_country` (
  `id` int(11) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_currency`
--

CREATE TABLE `sylius_currency` (
  `id` int(11) NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_currency`
--

INSERT INTO `sylius_currency` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'EUR', '2024-07-09 07:53:48', '2024-07-09 07:53:48');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_customer`
--

CREATE TABLE `sylius_customer` (
  `id` int(11) NOT NULL,
  `customer_group_id` int(11) DEFAULT NULL,
  `default_address_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'u',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscribed_to_newsletter` tinyint(1) NOT NULL,
  `loyalty_points_account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_customer_group`
--

CREATE TABLE `sylius_customer_group` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_exchange_rate`
--

CREATE TABLE `sylius_exchange_rate` (
  `id` int(11) NOT NULL,
  `source_currency` int(11) NOT NULL,
  `target_currency` int(11) NOT NULL,
  `ratio` decimal(10,5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_gateway_config`
--

CREATE TABLE `sylius_gateway_config` (
  `id` int(11) NOT NULL,
  `config` json NOT NULL,
  `gateway_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_locale`
--

CREATE TABLE `sylius_locale` (
  `id` int(11) NOT NULL,
  `code` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_locale`
--

INSERT INTO `sylius_locale` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'fr_FR', '2024-07-09 07:53:53', '2024-07-09 07:53:53'),
(5, 'en', '2024-07-16 14:37:39', '2024-07-16 14:37:40'),
(6, 'fr', '2024-07-16 14:43:38', '2024-07-16 14:43:39');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_points_account`
--

CREATE TABLE `sylius_loyalty_loyalty_points_account` (
  `id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_points_transaction`
--

CREATE TABLE `sylius_loyalty_loyalty_points_transaction` (
  `id` int(11) NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `transaction_date` datetime NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_points_transactions`
--

CREATE TABLE `sylius_loyalty_loyalty_points_transactions` (
  `loyalty_points_account_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_purchase`
--

CREATE TABLE `sylius_loyalty_loyalty_purchase` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loyalty_points` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `description` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_rule`
--

CREATE TABLE `sylius_loyalty_loyalty_rule` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_id` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_rule_action`
--

CREATE TABLE `sylius_loyalty_loyalty_rule_action` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `configuration` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:object)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_loyalty_loyalty_rule_channels`
--

CREATE TABLE `sylius_loyalty_loyalty_rule_channels` (
  `loyalty_rule_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_menu`
--

CREATE TABLE `sylius_menu` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_menu`
--

INSERT INTO `sylius_menu` (`id`, `lang_id`) VALUES
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_menu_item`
--

CREATE TABLE `sylius_menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxon_id` int(11) DEFAULT NULL,
  `menuPage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_menu_item`
--

INSERT INTO `sylius_menu_item` (`id`, `menu_id`, `position`, `type`, `title`, `url`, `taxon_id`, `menuPage_id`) VALUES
(3, 5, 1, 'link', 'Offres du moment', '#', NULL, 1),
(4, 5, 2, 'category', 'Homme', '#', 1, 1),
(5, 5, 2, 'link', 'Produits', '#', NULL, 2),
(6, 5, 1, 'link', 'En ce moment', '#', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_menu_page`
--

CREATE TABLE `sylius_menu_page` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuItemParent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sylius_menu_page`
--

INSERT INTO `sylius_menu_page` (`id`, `menu_id`, `title`, `menuItemParent_id`) VALUES
(1, 5, 'Niveau 1', NULL),
(2, 5, 'Homme', 4);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_migrations`
--

CREATE TABLE `sylius_migrations` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `sylius_multi_source_inventory_inventory_source`
--

CREATE TABLE `sylius_multi_source_inventory_inventory_source` (
  `id` int(11) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_multi_source_inventory_inventory_source`
--

INSERT INTO `sylius_multi_source_inventory_inventory_source` (`id`, `address_id`, `code`, `name`, `priority`) VALUES
(1, NULL, 'default', 'Default', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_multi_source_inventory_inventory_source_address`
--

CREATE TABLE `sylius_multi_source_inventory_inventory_source_address` (
  `id` int(11) NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_multi_source_inventory_inventory_source_channels`
--

CREATE TABLE `sylius_multi_source_inventory_inventory_source_channels` (
  `inventory_source_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_multi_source_inventory_inventory_source_channels`
--

INSERT INTO `sylius_multi_source_inventory_inventory_source_channels` (`inventory_source_id`, `channel_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_multi_source_inventory_inventory_source_stock`
--

CREATE TABLE `sylius_multi_source_inventory_inventory_source_stock` (
  `id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `inventory_source_id` int(11) DEFAULT NULL,
  `on_hand` int(11) NOT NULL,
  `on_hold` int(11) NOT NULL,
  `inventory_source_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_order`
--

CREATE TABLE `sylius_order` (
  `id` int(11) NOT NULL,
  `shipping_address_id` int(11) DEFAULT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `promotion_coupon_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkout_completed_at` datetime DEFAULT NULL,
  `items_total` int(11) NOT NULL,
  `adjustments_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `currency_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `locale_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkout_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_guest` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_order_item`
--

CREATE TABLE `sylius_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `units_total` int(11) NOT NULL,
  `adjustments_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `is_immutable` tinyint(1) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `original_unit_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_order_item_unit`
--

CREATE TABLE `sylius_order_item_unit` (
  `id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  `adjustments_total` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_order_sequence`
--

CREATE TABLE `sylius_order_sequence` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_payment`
--

CREATE TABLE `sylius_payment` (
  `id` int(11) NOT NULL,
  `method_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `currency_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` json NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_payment_method`
--

CREATE TABLE `sylius_payment_method` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `environment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `gateway_config_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_payment_method_channels`
--

CREATE TABLE `sylius_payment_method_channels` (
  `payment_method_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_payment_method_translation`
--

CREATE TABLE `sylius_payment_method_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `instructions` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_payment_security_token`
--

CREATE TABLE `sylius_payment_security_token` (
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:object)',
  `after_url` longtext COLLATE utf8_unicode_ci,
  `target_url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gateway_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_paypal_plugin_pay_pal_credentials`
--

CREATE TABLE `sylius_paypal_plugin_pay_pal_credentials` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_time` datetime NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product`
--

CREATE TABLE `sylius_product` (
  `id` int(11) NOT NULL,
  `main_taxon_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `variant_selection_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `average_rating` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_association`
--

CREATE TABLE `sylius_product_association` (
  `id` int(11) NOT NULL,
  `association_type_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_association_product`
--

CREATE TABLE `sylius_product_association_product` (
  `association_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_association_type`
--

CREATE TABLE `sylius_product_association_type` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_association_type_translation`
--

CREATE TABLE `sylius_product_association_type_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_attribute`
--

CREATE TABLE `sylius_product_attribute` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `storage_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `configuration` json NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `position` int(11) NOT NULL,
  `translatable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_product_attribute`
--

INSERT INTO `sylius_product_attribute` (`id`, `code`, `type`, `storage_type`, `configuration`, `created_at`, `updated_at`, `position`, `translatable`) VALUES
(1, 'size', 'checkbox', 'boolean', '[]', '2024-07-11 09:36:22', '2024-07-11 09:36:23', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_attribute_translation`
--

CREATE TABLE `sylius_product_attribute_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_product_attribute_translation`
--

INSERT INTO `sylius_product_attribute_translation` (`id`, `translatable_id`, `name`, `locale`) VALUES
(1, 1, 'Taille', 'fr_FR');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_attribute_value`
--

CREATE TABLE `sylius_product_attribute_value` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `text_value` longtext COLLATE utf8_unicode_ci,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `integer_value` int(11) DEFAULT NULL,
  `float_value` double DEFAULT NULL,
  `datetime_value` datetime DEFAULT NULL,
  `date_value` date DEFAULT NULL,
  `json_value` json DEFAULT NULL,
  `locale_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_channels`
--

CREATE TABLE `sylius_product_channels` (
  `product_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_image`
--

CREATE TABLE `sylius_product_image` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_image_product_variants`
--

CREATE TABLE `sylius_product_image_product_variants` (
  `image_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_option`
--

CREATE TABLE `sylius_product_option` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `position` int(11) NOT NULL,
  `isColor` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_product_option`
--

INSERT INTO `sylius_product_option` (`id`, `code`, `created_at`, `updated_at`, `position`, `isColor`) VALUES
(1, 'size', '2024-07-11 09:37:07', '2024-07-11 09:37:08', 0, 0),
(2, 'color', '2024-07-12 13:13:37', '2024-07-12 13:13:37', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_options`
--

CREATE TABLE `sylius_product_options` (
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_option_translation`
--

CREATE TABLE `sylius_product_option_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_product_option_translation`
--

INSERT INTO `sylius_product_option_translation` (`id`, `translatable_id`, `name`, `locale`) VALUES
(1, 1, 'Taille', 'fr_FR'),
(2, 2, 'Couleur', 'fr_FR');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_option_value`
--

CREATE TABLE `sylius_product_option_value` (
  `id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_product_option_value`
--

INSERT INTO `sylius_product_option_value` (`id`, `option_id`, `code`, `color`) VALUES
(1, 1, 'L', NULL),
(2, 1, 'M', NULL),
(3, 1, 'S', NULL),
(4, 2, 'red', '#d21414');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_option_value_translation`
--

CREATE TABLE `sylius_product_option_value_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_product_option_value_translation`
--

INSERT INTO `sylius_product_option_value_translation` (`id`, `translatable_id`, `value`, `locale`) VALUES
(1, 1, 'L', 'fr_FR'),
(2, 2, 'M', 'fr_FR'),
(3, 3, 'S', 'fr_FR'),
(4, 4, 'Rouge', 'fr_FR');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_review`
--

CREATE TABLE `sylius_product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_taxon`
--

CREATE TABLE `sylius_product_taxon` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `taxon_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_translation`
--

CREATE TABLE `sylius_product_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_variant`
--

CREATE TABLE `sylius_product_variant` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tax_category_id` int(11) DEFAULT NULL,
  `shipping_category_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `on_hold` int(11) NOT NULL,
  `on_hand` int(11) NOT NULL,
  `tracked` tinyint(1) NOT NULL,
  `width` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `depth` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `position` int(11) NOT NULL,
  `shipping_required` tinyint(1) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_variant_option_value`
--

CREATE TABLE `sylius_product_variant_option_value` (
  `variant_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_product_variant_translation`
--

CREATE TABLE `sylius_product_variant_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion`
--

CREATE TABLE `sylius_promotion` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `exclusive` tinyint(1) NOT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `coupon_based` tinyint(1) NOT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `applies_to_discounted` tinyint(1) NOT NULL DEFAULT '1',
  `archived_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion_action`
--

CREATE TABLE `sylius_promotion_action` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `configuration` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion_channels`
--

CREATE TABLE `sylius_promotion_channels` (
  `promotion_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion_coupon`
--

CREATE TABLE `sylius_promotion_coupon` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `per_customer_usage_limit` int(11) DEFAULT NULL,
  `reusable_from_cancelled_orders` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion_order`
--

CREATE TABLE `sylius_promotion_order` (
  `order_id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion_rule`
--

CREATE TABLE `sylius_promotion_rule` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `configuration` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_promotion_translation`
--

CREATE TABLE `sylius_promotion_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_province`
--

CREATE TABLE `sylius_province` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_credit_memo`
--

CREATE TABLE `sylius_refund_credit_memo` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `issued_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_credit_memo_line_items`
--

CREATE TABLE `sylius_refund_credit_memo_line_items` (
  `credit_memo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_credit_memo_sequence`
--

CREATE TABLE `sylius_refund_credit_memo_sequence` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_credit_memo_tax_items`
--

CREATE TABLE `sylius_refund_credit_memo_tax_items` (
  `credit_memo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_customer_billing_data`
--

CREATE TABLE `sylius_refund_customer_billing_data` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_line_item`
--

CREATE TABLE `sylius_refund_line_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_net_price` int(11) NOT NULL,
  `unit_gross_price` int(11) NOT NULL,
  `net_value` int(11) NOT NULL,
  `gross_value` int(11) NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `tax_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_refund`
--

CREATE TABLE `sylius_refund_refund` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `refunded_unit_id` int(11) DEFAULT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:sylius_refund_refund_type)',
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_refund_payment`
--

CREATE TABLE `sylius_refund_refund_payment` (
  `id` int(11) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_shop_billing_data`
--

CREATE TABLE `sylius_refund_shop_billing_data` (
  `id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_refund_tax_item`
--

CREATE TABLE `sylius_refund_tax_item` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shipment`
--

CREATE TABLE `sylius_shipment` (
  `id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tracking` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shipped_at` datetime DEFAULT NULL,
  `adjustments_total` int(11) NOT NULL,
  `inventory_source_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shipping_category`
--

CREATE TABLE `sylius_shipping_category` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shipping_method`
--

CREATE TABLE `sylius_shipping_method` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `zone_id` int(11) NOT NULL,
  `tax_category_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `configuration` json NOT NULL,
  `category_requirement` int(11) NOT NULL,
  `calculator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shipping_method_channels`
--

CREATE TABLE `sylius_shipping_method_channels` (
  `shipping_method_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shipping_method_rule`
--

CREATE TABLE `sylius_shipping_method_rule` (
  `id` int(11) NOT NULL,
  `shipping_method_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `configuration` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shipping_method_translation`
--

CREATE TABLE `sylius_shipping_method_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shop_billing_data`
--

CREATE TABLE `sylius_shop_billing_data` (
  `id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_shop_user`
--

CREATE TABLE `sylius_shop_user` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `roles` json NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `encoder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_taxon`
--

CREATE TABLE `sylius_taxon` (
  `id` int(11) NOT NULL,
  `tree_root` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tree_left` int(11) NOT NULL,
  `tree_right` int(11) NOT NULL,
  `tree_level` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_taxon`
--

INSERT INTO `sylius_taxon` (`id`, `tree_root`, `parent_id`, `code`, `tree_left`, `tree_right`, `tree_level`, `position`, `created_at`, `updated_at`, `enabled`) VALUES
(1, 1, NULL, 'homme', 1, 6, 0, 0, '2024-07-26 13:15:47', '2024-07-26 13:15:47', 1),
(2, 1, 1, 'vetements', 2, 5, 1, 0, '2024-07-26 13:16:27', '2024-07-26 13:16:27', 1),
(3, 1, 2, 'cuissards', 3, 4, 2, 0, '2024-07-26 13:16:54', '2024-07-26 13:16:55', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sylius_taxon_image`
--

CREATE TABLE `sylius_taxon_image` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_taxon_image`
--

INSERT INTO `sylius_taxon_image` (`id`, `owner_id`, `type`, `path`) VALUES
(1, 1, NULL, '11/62/c273a717d3e4c34fe7fd7f21c9ca.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_taxon_translation`
--

CREATE TABLE `sylius_taxon_translation` (
  `id` int(11) NOT NULL,
  `translatable_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sylius_taxon_translation`
--

INSERT INTO `sylius_taxon_translation` (`id`, `translatable_id`, `name`, `slug`, `description`, `locale`) VALUES
(1, 1, 'Homme', 'homme', NULL, 'fr_FR'),
(2, 2, 'Vêtements', 'homme/vetements', NULL, 'fr_FR'),
(3, 3, 'Cuissards', 'homme/vetements/cuissards', NULL, 'fr_FR'),
(4, 1, 'Men', 'men', NULL, 'en'),
(5, 1, 'Homme', 'homme', NULL, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `sylius_tax_category`
--

CREATE TABLE `sylius_tax_category` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_tax_rate`
--

CREATE TABLE `sylius_tax_rate` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,5) NOT NULL,
  `included_in_price` tinyint(1) NOT NULL,
  `calculator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_user_oauth`
--

CREATE TABLE `sylius_user_oauth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` text COLLATE utf8_unicode_ci,
  `refresh_token` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_zone`
--

CREATE TABLE `sylius_zone` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sylius_zone_member`
--

CREATE TABLE `sylius_zone_member` (
  `id` int(11) NOT NULL,
  `belongs_to` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`);

--
-- Index pour la table `sylius_address`
--
ALTER TABLE `sylius_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B97FF0589395C3F3` (`customer_id`);

--
-- Index pour la table `sylius_address_log_entries`
--
ALTER TABLE `sylius_address_log_entries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_adjustment`
--
ALTER TABLE `sylius_adjustment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ACA6E0F28D9F6D38` (`order_id`),
  ADD KEY `IDX_ACA6E0F2E415FB15` (`order_item_id`),
  ADD KEY `IDX_ACA6E0F2F720C233` (`order_item_unit_id`),
  ADD KEY `IDX_ACA6E0F27BE036FC` (`shipment_id`);

--
-- Index pour la table `sylius_admin_user`
--
ALTER TABLE `sylius_admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_88D5CC4D6B7BA4B6` (`password_reset_token`),
  ADD UNIQUE KEY `UNIQ_88D5CC4DC4995C67` (`email_verification_token`);

--
-- Index pour la table `sylius_avatar_image`
--
ALTER TABLE `sylius_avatar_image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1068A3A97E3C61F9` (`owner_id`);

--
-- Index pour la table `sylius_catalog_promotion`
--
ALTER TABLE `sylius_catalog_promotion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1055865077153098` (`code`);

--
-- Index pour la table `sylius_catalog_promotion_action`
--
ALTER TABLE `sylius_catalog_promotion_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F529624722E2CB5A` (`catalog_promotion_id`);

--
-- Index pour la table `sylius_catalog_promotion_channels`
--
ALTER TABLE `sylius_catalog_promotion_channels`
  ADD PRIMARY KEY (`catalog_promotion_id`,`channel_id`),
  ADD KEY `IDX_48E9AE7622E2CB5A` (`catalog_promotion_id`),
  ADD KEY `IDX_48E9AE7672F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_catalog_promotion_scope`
--
ALTER TABLE `sylius_catalog_promotion_scope`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_584AA86A139DF194` (`promotion_id`);

--
-- Index pour la table `sylius_catalog_promotion_translation`
--
ALTER TABLE `sylius_catalog_promotion_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_catalog_promotion_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_BA065D3C2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_category_promotion`
--
ALTER TABLE `sylius_category_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_category_promotion_image`
--
ALTER TABLE `sylius_category_promotion_image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1CFA75C87E3C61F9` (`owner_id`);

--
-- Index pour la table `sylius_category_promotion_translation`
--
ALTER TABLE `sylius_category_promotion_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_category_promotion_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_197A72EB2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_channel`
--
ALTER TABLE `sylius_channel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_16C8119E77153098` (`code`),
  ADD UNIQUE KEY `UNIQ_16C8119EB5282EDF` (`shop_billing_data_id`),
  ADD UNIQUE KEY `UNIQ_16C8119E75F20EAE` (`channel_price_history_config_id`),
  ADD KEY `IDX_16C8119E743BF776` (`default_locale_id`),
  ADD KEY `IDX_16C8119E3101778E` (`base_currency_id`),
  ADD KEY `IDX_16C8119EA978C17` (`default_tax_zone_id`),
  ADD KEY `IDX_16C8119EE551C011` (`hostname`),
  ADD KEY `IDX_16C8119EF242B1E6` (`menu_taxon_id`);

--
-- Index pour la table `sylius_channel_countries`
--
ALTER TABLE `sylius_channel_countries`
  ADD PRIMARY KEY (`channel_id`,`country_id`),
  ADD KEY `IDX_D96E51AE72F5A1AA` (`channel_id`),
  ADD KEY `IDX_D96E51AEF92F3E70` (`country_id`);

--
-- Index pour la table `sylius_channel_currencies`
--
ALTER TABLE `sylius_channel_currencies`
  ADD PRIMARY KEY (`channel_id`,`currency_id`),
  ADD KEY `IDX_AE491F9372F5A1AA` (`channel_id`),
  ADD KEY `IDX_AE491F9338248176` (`currency_id`);

--
-- Index pour la table `sylius_channel_locales`
--
ALTER TABLE `sylius_channel_locales`
  ADD PRIMARY KEY (`channel_id`,`locale_id`),
  ADD KEY `IDX_786B7A8472F5A1AA` (`channel_id`),
  ADD KEY `IDX_786B7A84E559DFD1` (`locale_id`);

--
-- Index pour la table `sylius_channel_price_history_config`
--
ALTER TABLE `sylius_channel_price_history_config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_channel_price_history_config_excluded_taxons`
--
ALTER TABLE `sylius_channel_price_history_config_excluded_taxons`
  ADD PRIMARY KEY (`channel_id`,`taxon_id`),
  ADD KEY `IDX_77FD02A72F5A1AA` (`channel_id`),
  ADD KEY `IDX_77FD02ADE13F470` (`taxon_id`);

--
-- Index pour la table `sylius_channel_pricing`
--
ALTER TABLE `sylius_channel_pricing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variant_channel_idx` (`product_variant_id`,`channel_code`),
  ADD KEY `IDX_7801820CA80EF684` (`product_variant_id`);

--
-- Index pour la table `sylius_channel_pricing_catalog_promotions`
--
ALTER TABLE `sylius_channel_pricing_catalog_promotions`
  ADD PRIMARY KEY (`channel_pricing_id`,`catalog_promotion_id`),
  ADD KEY `IDX_9F52FF513EADFFE5` (`channel_pricing_id`),
  ADD KEY `IDX_9F52FF5122E2CB5A` (`catalog_promotion_id`);

--
-- Index pour la table `sylius_channel_pricing_log_entry`
--
ALTER TABLE `sylius_channel_pricing_log_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_77181A53EADFFE5` (`channel_pricing_id`);

--
-- Index pour la table `sylius_country`
--
ALTER TABLE `sylius_country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E74256BF77153098` (`code`),
  ADD KEY `IDX_E74256BF77153098` (`code`);

--
-- Index pour la table `sylius_currency`
--
ALTER TABLE `sylius_currency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_96EDD3D077153098` (`code`);

--
-- Index pour la table `sylius_customer`
--
ALTER TABLE `sylius_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7E82D5E6E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_7E82D5E6A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_7E82D5E6BD94FB16` (`default_address_id`),
  ADD UNIQUE KEY `UNIQ_7E82D5E6CDF1749F` (`loyalty_points_account_id`),
  ADD KEY `IDX_7E82D5E6D2919A68` (`customer_group_id`),
  ADD KEY `created_at_index` (`created_at`);

--
-- Index pour la table `sylius_customer_group`
--
ALTER TABLE `sylius_customer_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7FCF9B0577153098` (`code`);

--
-- Index pour la table `sylius_exchange_rate`
--
ALTER TABLE `sylius_exchange_rate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5F52B852A76BEEDB3FD5856` (`source_currency`,`target_currency`),
  ADD KEY `IDX_5F52B852A76BEED` (`source_currency`),
  ADD KEY `IDX_5F52B85B3FD5856` (`target_currency`);

--
-- Index pour la table `sylius_gateway_config`
--
ALTER TABLE `sylius_gateway_config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_locale`
--
ALTER TABLE `sylius_locale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7BA1286477153098` (`code`);

--
-- Index pour la table `sylius_loyalty_loyalty_points_account`
--
ALTER TABLE `sylius_loyalty_loyalty_points_account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_loyalty_loyalty_points_transaction`
--
ALTER TABLE `sylius_loyalty_loyalty_points_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_loyalty_loyalty_points_transactions`
--
ALTER TABLE `sylius_loyalty_loyalty_points_transactions`
  ADD PRIMARY KEY (`loyalty_points_account_id`,`transaction_id`),
  ADD KEY `IDX_7915EA7CCDF1749F` (`loyalty_points_account_id`),
  ADD KEY `IDX_7915EA7C2FC0CB0F` (`transaction_id`);

--
-- Index pour la table `sylius_loyalty_loyalty_purchase`
--
ALTER TABLE `sylius_loyalty_loyalty_purchase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E6DB32EF77153098` (`code`),
  ADD KEY `IDX_E6DB32EF139DF194` (`promotion_id`);

--
-- Index pour la table `sylius_loyalty_loyalty_rule`
--
ALTER TABLE `sylius_loyalty_loyalty_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F93AF11177153098` (`code`),
  ADD UNIQUE KEY `UNIQ_F93AF1119D32F035` (`action_id`);

--
-- Index pour la table `sylius_loyalty_loyalty_rule_action`
--
ALTER TABLE `sylius_loyalty_loyalty_rule_action`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_loyalty_loyalty_rule_channels`
--
ALTER TABLE `sylius_loyalty_loyalty_rule_channels`
  ADD PRIMARY KEY (`loyalty_rule_id`,`channel_id`),
  ADD KEY `IDX_6B2057FD188FEBE2` (`loyalty_rule_id`),
  ADD KEY `IDX_6B2057FD72F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_menu`
--
ALTER TABLE `sylius_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A60CDF1AB213FA4` (`lang_id`);

--
-- Index pour la table `sylius_menu_item`
--
ALTER TABLE `sylius_menu_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E71E91E2CCD7E912` (`menu_id`),
  ADD KEY `IDX_E71E91E2DE13F470` (`taxon_id`),
  ADD KEY `IDX_E71E91E2E98FE523` (`menuPage_id`);

--
-- Index pour la table `sylius_menu_page`
--
ALTER TABLE `sylius_menu_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EC0F02DC24611D81` (`menuItemParent_id`),
  ADD KEY `IDX_EC0F02DCCCD7E912` (`menu_id`);

--
-- Index pour la table `sylius_migrations`
--
ALTER TABLE `sylius_migrations`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `sylius_multi_source_inventory_inventory_source`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F059247677153098` (`code`),
  ADD UNIQUE KEY `UNIQ_F0592476F5B7AF75` (`address_id`);

--
-- Index pour la table `sylius_multi_source_inventory_inventory_source_address`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_multi_source_inventory_inventory_source_channels`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_channels`
  ADD PRIMARY KEY (`inventory_source_id`,`channel_id`),
  ADD KEY `IDX_808EC4581280F509` (`inventory_source_id`),
  ADD KEY `IDX_808EC45872F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_multi_source_inventory_inventory_source_stock`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2BF5EE1CA80EF6841280F509` (`product_variant_id`,`inventory_source_id`),
  ADD KEY `IDX_2BF5EE1CA80EF684` (`product_variant_id`),
  ADD KEY `IDX_2BF5EE1C1280F509` (`inventory_source_id`);

--
-- Index pour la table `sylius_order`
--
ALTER TABLE `sylius_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6196A1F996901F54` (`number`),
  ADD UNIQUE KEY `UNIQ_6196A1F94D4CFF2B` (`shipping_address_id`),
  ADD UNIQUE KEY `UNIQ_6196A1F979D0C0E4` (`billing_address_id`),
  ADD UNIQUE KEY `UNIQ_6196A1F9BEA95C75` (`token_value`),
  ADD KEY `IDX_6196A1F972F5A1AA` (`channel_id`),
  ADD KEY `IDX_6196A1F917B24436` (`promotion_coupon_id`),
  ADD KEY `IDX_6196A1F99395C3F3` (`customer_id`),
  ADD KEY `IDX_6196A1F9A393D2FB43625D9F` (`state`,`updated_at`);

--
-- Index pour la table `sylius_order_item`
--
ALTER TABLE `sylius_order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_77B587ED8D9F6D38` (`order_id`),
  ADD KEY `IDX_77B587ED3B69A9AF` (`variant_id`);

--
-- Index pour la table `sylius_order_item_unit`
--
ALTER TABLE `sylius_order_item_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_82BF226EE415FB15` (`order_item_id`),
  ADD KEY `IDX_82BF226E7BE036FC` (`shipment_id`);

--
-- Index pour la table `sylius_order_sequence`
--
ALTER TABLE `sylius_order_sequence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_payment`
--
ALTER TABLE `sylius_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D9191BD419883967` (`method_id`),
  ADD KEY `IDX_D9191BD48D9F6D38` (`order_id`);

--
-- Index pour la table `sylius_payment_method`
--
ALTER TABLE `sylius_payment_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A75B0B0D77153098` (`code`),
  ADD KEY `IDX_A75B0B0DF23D6140` (`gateway_config_id`);

--
-- Index pour la table `sylius_payment_method_channels`
--
ALTER TABLE `sylius_payment_method_channels`
  ADD PRIMARY KEY (`payment_method_id`,`channel_id`),
  ADD KEY `IDX_543AC0CC5AA1164F` (`payment_method_id`),
  ADD KEY `IDX_543AC0CC72F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_payment_method_translation`
--
ALTER TABLE `sylius_payment_method_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_payment_method_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_966BE3A12C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_payment_security_token`
--
ALTER TABLE `sylius_payment_security_token`
  ADD PRIMARY KEY (`hash`);

--
-- Index pour la table `sylius_paypal_plugin_pay_pal_credentials`
--
ALTER TABLE `sylius_paypal_plugin_pay_pal_credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C56F54AD5AA1164F` (`payment_method_id`);

--
-- Index pour la table `sylius_product`
--
ALTER TABLE `sylius_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_677B9B7477153098` (`code`),
  ADD KEY `IDX_677B9B74731E505` (`main_taxon_id`);

--
-- Index pour la table `sylius_product_association`
--
ALTER TABLE `sylius_product_association`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_association_idx` (`product_id`,`association_type_id`),
  ADD KEY `IDX_48E9CDABB1E1C39` (`association_type_id`),
  ADD KEY `IDX_48E9CDAB4584665A` (`product_id`);

--
-- Index pour la table `sylius_product_association_product`
--
ALTER TABLE `sylius_product_association_product`
  ADD PRIMARY KEY (`association_id`,`product_id`),
  ADD KEY `IDX_A427B983EFB9C8A5` (`association_id`),
  ADD KEY `IDX_A427B9834584665A` (`product_id`);

--
-- Index pour la table `sylius_product_association_type`
--
ALTER TABLE `sylius_product_association_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CCB8914C77153098` (`code`);

--
-- Index pour la table `sylius_product_association_type_translation`
--
ALTER TABLE `sylius_product_association_type_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_product_association_type_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_4F618E52C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_product_attribute`
--
ALTER TABLE `sylius_product_attribute`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_BFAF484A77153098` (`code`);

--
-- Index pour la table `sylius_product_attribute_translation`
--
ALTER TABLE `sylius_product_attribute_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_product_attribute_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_93850EBA2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_product_attribute_value`
--
ALTER TABLE `sylius_product_attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8A053E544584665A` (`product_id`),
  ADD KEY `IDX_8A053E54B6E62EFA` (`attribute_id`);

--
-- Index pour la table `sylius_product_channels`
--
ALTER TABLE `sylius_product_channels`
  ADD PRIMARY KEY (`product_id`,`channel_id`),
  ADD KEY `IDX_F9EF269B4584665A` (`product_id`),
  ADD KEY `IDX_F9EF269B72F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_product_image`
--
ALTER TABLE `sylius_product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_88C64B2D7E3C61F9` (`owner_id`);

--
-- Index pour la table `sylius_product_image_product_variants`
--
ALTER TABLE `sylius_product_image_product_variants`
  ADD PRIMARY KEY (`image_id`,`variant_id`),
  ADD KEY `IDX_8FFDAE8D3DA5256D` (`image_id`),
  ADD KEY `IDX_8FFDAE8D3B69A9AF` (`variant_id`);

--
-- Index pour la table `sylius_product_option`
--
ALTER TABLE `sylius_product_option`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E4C0EBEF77153098` (`code`);

--
-- Index pour la table `sylius_product_options`
--
ALTER TABLE `sylius_product_options`
  ADD PRIMARY KEY (`product_id`,`option_id`),
  ADD KEY `IDX_2B5FF0094584665A` (`product_id`),
  ADD KEY `IDX_2B5FF009A7C41D6F` (`option_id`);

--
-- Index pour la table `sylius_product_option_translation`
--
ALTER TABLE `sylius_product_option_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_product_option_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_CBA491AD2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_product_option_value`
--
ALTER TABLE `sylius_product_option_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F7FF7D4B77153098` (`code`),
  ADD KEY `IDX_F7FF7D4BA7C41D6F` (`option_id`);

--
-- Index pour la table `sylius_product_option_value_translation`
--
ALTER TABLE `sylius_product_option_value_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_product_option_value_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_8D4382DC2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_product_review`
--
ALTER TABLE `sylius_product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C7056A994584665A` (`product_id`),
  ADD KEY `IDX_C7056A99F675F31B` (`author_id`);

--
-- Index pour la table `sylius_product_taxon`
--
ALTER TABLE `sylius_product_taxon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_taxon_idx` (`product_id`,`taxon_id`),
  ADD KEY `IDX_169C6CD94584665A` (`product_id`),
  ADD KEY `IDX_169C6CD9DE13F470` (`taxon_id`);

--
-- Index pour la table `sylius_product_translation`
--
ALTER TABLE `sylius_product_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_product_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD UNIQUE KEY `UNIQ_105A9084180C698989D9B62` (`locale`,`slug`),
  ADD KEY `IDX_105A9082C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_product_variant`
--
ALTER TABLE `sylius_product_variant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A29B52377153098` (`code`),
  ADD KEY `IDX_A29B5234584665A` (`product_id`),
  ADD KEY `IDX_A29B5239DF894ED` (`tax_category_id`),
  ADD KEY `IDX_A29B5239E2D1A41` (`shipping_category_id`);

--
-- Index pour la table `sylius_product_variant_option_value`
--
ALTER TABLE `sylius_product_variant_option_value`
  ADD PRIMARY KEY (`variant_id`,`option_value_id`),
  ADD KEY `IDX_76CDAFA13B69A9AF` (`variant_id`),
  ADD KEY `IDX_76CDAFA1D957CA06` (`option_value_id`);

--
-- Index pour la table `sylius_product_variant_translation`
--
ALTER TABLE `sylius_product_variant_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_product_variant_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_8DC18EDC2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_promotion`
--
ALTER TABLE `sylius_promotion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F157396377153098` (`code`);

--
-- Index pour la table `sylius_promotion_action`
--
ALTER TABLE `sylius_promotion_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_933D0915139DF194` (`promotion_id`);

--
-- Index pour la table `sylius_promotion_channels`
--
ALTER TABLE `sylius_promotion_channels`
  ADD PRIMARY KEY (`promotion_id`,`channel_id`),
  ADD KEY `IDX_1A044F64139DF194` (`promotion_id`),
  ADD KEY `IDX_1A044F6472F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_promotion_coupon`
--
ALTER TABLE `sylius_promotion_coupon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B04EBA8577153098` (`code`),
  ADD KEY `IDX_B04EBA85139DF194` (`promotion_id`);

--
-- Index pour la table `sylius_promotion_order`
--
ALTER TABLE `sylius_promotion_order`
  ADD PRIMARY KEY (`order_id`,`promotion_id`),
  ADD KEY `IDX_BF9CF6FB8D9F6D38` (`order_id`),
  ADD KEY `IDX_BF9CF6FB139DF194` (`promotion_id`);

--
-- Index pour la table `sylius_promotion_rule`
--
ALTER TABLE `sylius_promotion_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2C188EA8139DF194` (`promotion_id`);

--
-- Index pour la table `sylius_promotion_translation`
--
ALTER TABLE `sylius_promotion_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_promotion_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_3C7A76182C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_province`
--
ALTER TABLE `sylius_province`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B5618FE477153098` (`code`),
  ADD UNIQUE KEY `UNIQ_B5618FE4F92F3E705E237E06` (`country_id`,`name`),
  ADD KEY `IDX_B5618FE4F92F3E70` (`country_id`);

--
-- Index pour la table `sylius_refund_credit_memo`
--
ALTER TABLE `sylius_refund_credit_memo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5C4F333196901F54` (`number`),
  ADD UNIQUE KEY `UNIQ_5C4F333178CED90B` (`from_id`),
  ADD UNIQUE KEY `UNIQ_5C4F333130354A65` (`to_id`),
  ADD KEY `IDX_5C4F333172F5A1AA` (`channel_id`),
  ADD KEY `IDX_5C4F33318D9F6D38` (`order_id`);

--
-- Index pour la table `sylius_refund_credit_memo_line_items`
--
ALTER TABLE `sylius_refund_credit_memo_line_items`
  ADD PRIMARY KEY (`credit_memo_id`,`line_item_id`),
  ADD UNIQUE KEY `UNIQ_1453B90EA7CBD339` (`line_item_id`),
  ADD KEY `IDX_1453B90E8E574316` (`credit_memo_id`);

--
-- Index pour la table `sylius_refund_credit_memo_sequence`
--
ALTER TABLE `sylius_refund_credit_memo_sequence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_refund_credit_memo_tax_items`
--
ALTER TABLE `sylius_refund_credit_memo_tax_items`
  ADD PRIMARY KEY (`credit_memo_id`,`tax_item_id`),
  ADD UNIQUE KEY `UNIQ_9BBDFBE25327F254` (`tax_item_id`),
  ADD KEY `IDX_9BBDFBE28E574316` (`credit_memo_id`);

--
-- Index pour la table `sylius_refund_customer_billing_data`
--
ALTER TABLE `sylius_refund_customer_billing_data`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_refund_line_item`
--
ALTER TABLE `sylius_refund_line_item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_refund_refund`
--
ALTER TABLE `sylius_refund_refund`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DEF86A0E8D9F6D38` (`order_id`);

--
-- Index pour la table `sylius_refund_refund_payment`
--
ALTER TABLE `sylius_refund_refund_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EC283EA55AA1164F` (`payment_method_id`),
  ADD KEY `IDX_EC283EA58D9F6D38` (`order_id`);

--
-- Index pour la table `sylius_refund_shop_billing_data`
--
ALTER TABLE `sylius_refund_shop_billing_data`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_refund_tax_item`
--
ALTER TABLE `sylius_refund_tax_item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_shipment`
--
ALTER TABLE `sylius_shipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD707B3319883967` (`method_id`),
  ADD KEY `IDX_FD707B338D9F6D38` (`order_id`),
  ADD KEY `IDX_FD707B331280F509` (`inventory_source_id`);

--
-- Index pour la table `sylius_shipping_category`
--
ALTER TABLE `sylius_shipping_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B1D6465277153098` (`code`);

--
-- Index pour la table `sylius_shipping_method`
--
ALTER TABLE `sylius_shipping_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5FB0EE1177153098` (`code`),
  ADD KEY `IDX_5FB0EE1112469DE2` (`category_id`),
  ADD KEY `IDX_5FB0EE119F2C3FAB` (`zone_id`),
  ADD KEY `IDX_5FB0EE119DF894ED` (`tax_category_id`);

--
-- Index pour la table `sylius_shipping_method_channels`
--
ALTER TABLE `sylius_shipping_method_channels`
  ADD PRIMARY KEY (`shipping_method_id`,`channel_id`),
  ADD KEY `IDX_2D9833355F7D6850` (`shipping_method_id`),
  ADD KEY `IDX_2D98333572F5A1AA` (`channel_id`);

--
-- Index pour la table `sylius_shipping_method_rule`
--
ALTER TABLE `sylius_shipping_method_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_88A0EB655F7D6850` (`shipping_method_id`);

--
-- Index pour la table `sylius_shipping_method_translation`
--
ALTER TABLE `sylius_shipping_method_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sylius_shipping_method_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_2B37DB3D2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_shop_billing_data`
--
ALTER TABLE `sylius_shop_billing_data`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sylius_shop_user`
--
ALTER TABLE `sylius_shop_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7C2B74809395C3F3` (`customer_id`),
  ADD UNIQUE KEY `UNIQ_7C2B74806B7BA4B6` (`password_reset_token`),
  ADD UNIQUE KEY `UNIQ_7C2B7480C4995C67` (`email_verification_token`);

--
-- Index pour la table `sylius_taxon`
--
ALTER TABLE `sylius_taxon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CFD811CA77153098` (`code`),
  ADD KEY `IDX_CFD811CAA977936C` (`tree_root`),
  ADD KEY `IDX_CFD811CA727ACA70` (`parent_id`);

--
-- Index pour la table `sylius_taxon_image`
--
ALTER TABLE `sylius_taxon_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DBE52B287E3C61F9` (`owner_id`);

--
-- Index pour la table `sylius_taxon_translation`
--
ALTER TABLE `sylius_taxon_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_uidx` (`locale`,`slug`),
  ADD UNIQUE KEY `sylius_taxon_translation_uniq_trans` (`translatable_id`,`locale`),
  ADD KEY `IDX_1487DFCF2C2AC5D3` (`translatable_id`);

--
-- Index pour la table `sylius_tax_category`
--
ALTER TABLE `sylius_tax_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_221EB0BE77153098` (`code`);

--
-- Index pour la table `sylius_tax_rate`
--
ALTER TABLE `sylius_tax_rate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3CD86B2E77153098` (`code`),
  ADD KEY `IDX_3CD86B2E12469DE2` (`category_id`),
  ADD KEY `IDX_3CD86B2E9F2C3FAB` (`zone_id`);

--
-- Index pour la table `sylius_user_oauth`
--
ALTER TABLE `sylius_user_oauth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_provider` (`user_id`,`provider`),
  ADD KEY `IDX_C3471B78A76ED395` (`user_id`);

--
-- Index pour la table `sylius_zone`
--
ALTER TABLE `sylius_zone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7BE2258E77153098` (`code`);

--
-- Index pour la table `sylius_zone_member`
--
ALTER TABLE `sylius_zone_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E8B5ABF34B0E929B77153098` (`belongs_to`,`code`),
  ADD KEY `IDX_E8B5ABF34B0E929B` (`belongs_to`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_address`
--
ALTER TABLE `sylius_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_address_log_entries`
--
ALTER TABLE `sylius_address_log_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_adjustment`
--
ALTER TABLE `sylius_adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_admin_user`
--
ALTER TABLE `sylius_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_avatar_image`
--
ALTER TABLE `sylius_avatar_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_catalog_promotion`
--
ALTER TABLE `sylius_catalog_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_catalog_promotion_action`
--
ALTER TABLE `sylius_catalog_promotion_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_catalog_promotion_scope`
--
ALTER TABLE `sylius_catalog_promotion_scope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_catalog_promotion_translation`
--
ALTER TABLE `sylius_catalog_promotion_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_category_promotion`
--
ALTER TABLE `sylius_category_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sylius_category_promotion_image`
--
ALTER TABLE `sylius_category_promotion_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sylius_category_promotion_translation`
--
ALTER TABLE `sylius_category_promotion_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sylius_channel`
--
ALTER TABLE `sylius_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_channel_price_history_config`
--
ALTER TABLE `sylius_channel_price_history_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_channel_pricing`
--
ALTER TABLE `sylius_channel_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_channel_pricing_log_entry`
--
ALTER TABLE `sylius_channel_pricing_log_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_country`
--
ALTER TABLE `sylius_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_currency`
--
ALTER TABLE `sylius_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_customer`
--
ALTER TABLE `sylius_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_customer_group`
--
ALTER TABLE `sylius_customer_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_exchange_rate`
--
ALTER TABLE `sylius_exchange_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_gateway_config`
--
ALTER TABLE `sylius_gateway_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_locale`
--
ALTER TABLE `sylius_locale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sylius_loyalty_loyalty_points_account`
--
ALTER TABLE `sylius_loyalty_loyalty_points_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_loyalty_loyalty_points_transaction`
--
ALTER TABLE `sylius_loyalty_loyalty_points_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_loyalty_loyalty_purchase`
--
ALTER TABLE `sylius_loyalty_loyalty_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_loyalty_loyalty_rule`
--
ALTER TABLE `sylius_loyalty_loyalty_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_loyalty_loyalty_rule_action`
--
ALTER TABLE `sylius_loyalty_loyalty_rule_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_menu`
--
ALTER TABLE `sylius_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sylius_menu_item`
--
ALTER TABLE `sylius_menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sylius_menu_page`
--
ALTER TABLE `sylius_menu_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sylius_multi_source_inventory_inventory_source`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_multi_source_inventory_inventory_source_address`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_multi_source_inventory_inventory_source_stock`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_order`
--
ALTER TABLE `sylius_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_order_item`
--
ALTER TABLE `sylius_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_order_item_unit`
--
ALTER TABLE `sylius_order_item_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_order_sequence`
--
ALTER TABLE `sylius_order_sequence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_payment`
--
ALTER TABLE `sylius_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_payment_method`
--
ALTER TABLE `sylius_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_payment_method_translation`
--
ALTER TABLE `sylius_payment_method_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product`
--
ALTER TABLE `sylius_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_association`
--
ALTER TABLE `sylius_product_association`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_association_type`
--
ALTER TABLE `sylius_product_association_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_association_type_translation`
--
ALTER TABLE `sylius_product_association_type_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_attribute`
--
ALTER TABLE `sylius_product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_product_attribute_translation`
--
ALTER TABLE `sylius_product_attribute_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_product_attribute_value`
--
ALTER TABLE `sylius_product_attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_image`
--
ALTER TABLE `sylius_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_option`
--
ALTER TABLE `sylius_product_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sylius_product_option_translation`
--
ALTER TABLE `sylius_product_option_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sylius_product_option_value`
--
ALTER TABLE `sylius_product_option_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sylius_product_option_value_translation`
--
ALTER TABLE `sylius_product_option_value_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sylius_product_review`
--
ALTER TABLE `sylius_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_taxon`
--
ALTER TABLE `sylius_product_taxon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_translation`
--
ALTER TABLE `sylius_product_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_variant`
--
ALTER TABLE `sylius_product_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_product_variant_translation`
--
ALTER TABLE `sylius_product_variant_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_promotion`
--
ALTER TABLE `sylius_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_promotion_action`
--
ALTER TABLE `sylius_promotion_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_promotion_coupon`
--
ALTER TABLE `sylius_promotion_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_promotion_rule`
--
ALTER TABLE `sylius_promotion_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_promotion_translation`
--
ALTER TABLE `sylius_promotion_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_province`
--
ALTER TABLE `sylius_province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_credit_memo_sequence`
--
ALTER TABLE `sylius_refund_credit_memo_sequence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_customer_billing_data`
--
ALTER TABLE `sylius_refund_customer_billing_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_line_item`
--
ALTER TABLE `sylius_refund_line_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_refund`
--
ALTER TABLE `sylius_refund_refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_refund_payment`
--
ALTER TABLE `sylius_refund_refund_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_shop_billing_data`
--
ALTER TABLE `sylius_refund_shop_billing_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_refund_tax_item`
--
ALTER TABLE `sylius_refund_tax_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shipment`
--
ALTER TABLE `sylius_shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shipping_category`
--
ALTER TABLE `sylius_shipping_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shipping_method`
--
ALTER TABLE `sylius_shipping_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shipping_method_rule`
--
ALTER TABLE `sylius_shipping_method_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shipping_method_translation`
--
ALTER TABLE `sylius_shipping_method_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shop_billing_data`
--
ALTER TABLE `sylius_shop_billing_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_shop_user`
--
ALTER TABLE `sylius_shop_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_taxon`
--
ALTER TABLE `sylius_taxon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sylius_taxon_image`
--
ALTER TABLE `sylius_taxon_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sylius_taxon_translation`
--
ALTER TABLE `sylius_taxon_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sylius_tax_category`
--
ALTER TABLE `sylius_tax_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_tax_rate`
--
ALTER TABLE `sylius_tax_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_user_oauth`
--
ALTER TABLE `sylius_user_oauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_zone`
--
ALTER TABLE `sylius_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sylius_zone_member`
--
ALTER TABLE `sylius_zone_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sylius_address`
--
ALTER TABLE `sylius_address`
  ADD CONSTRAINT `FK_B97FF0589395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `sylius_customer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_adjustment`
--
ALTER TABLE `sylius_adjustment`
  ADD CONSTRAINT `FK_ACA6E0F27BE036FC` FOREIGN KEY (`shipment_id`) REFERENCES `sylius_shipment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ACA6E0F28D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ACA6E0F2E415FB15` FOREIGN KEY (`order_item_id`) REFERENCES `sylius_order_item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ACA6E0F2F720C233` FOREIGN KEY (`order_item_unit_id`) REFERENCES `sylius_order_item_unit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_avatar_image`
--
ALTER TABLE `sylius_avatar_image`
  ADD CONSTRAINT `FK_1068A3A97E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_admin_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_catalog_promotion_action`
--
ALTER TABLE `sylius_catalog_promotion_action`
  ADD CONSTRAINT `FK_F529624722E2CB5A` FOREIGN KEY (`catalog_promotion_id`) REFERENCES `sylius_catalog_promotion` (`id`);

--
-- Contraintes pour la table `sylius_catalog_promotion_channels`
--
ALTER TABLE `sylius_catalog_promotion_channels`
  ADD CONSTRAINT `FK_48E9AE7622E2CB5A` FOREIGN KEY (`catalog_promotion_id`) REFERENCES `sylius_catalog_promotion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_48E9AE7672F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_catalog_promotion_scope`
--
ALTER TABLE `sylius_catalog_promotion_scope`
  ADD CONSTRAINT `FK_584AA86A139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_catalog_promotion` (`id`);

--
-- Contraintes pour la table `sylius_catalog_promotion_translation`
--
ALTER TABLE `sylius_catalog_promotion_translation`
  ADD CONSTRAINT `FK_BA065D3C2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_catalog_promotion` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_category_promotion_image`
--
ALTER TABLE `sylius_category_promotion_image`
  ADD CONSTRAINT `FK_1CFA75C87E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_category_promotion_translation` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_category_promotion_translation`
--
ALTER TABLE `sylius_category_promotion_translation`
  ADD CONSTRAINT `FK_197A72EB2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_category_promotion` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_channel`
--
ALTER TABLE `sylius_channel`
  ADD CONSTRAINT `FK_16C8119E3101778E` FOREIGN KEY (`base_currency_id`) REFERENCES `sylius_currency` (`id`),
  ADD CONSTRAINT `FK_16C8119E743BF776` FOREIGN KEY (`default_locale_id`) REFERENCES `sylius_locale` (`id`),
  ADD CONSTRAINT `FK_16C8119E75F20EAE` FOREIGN KEY (`channel_price_history_config_id`) REFERENCES `sylius_channel_price_history_config` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_16C8119EA978C17` FOREIGN KEY (`default_tax_zone_id`) REFERENCES `sylius_zone` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_16C8119EB5282EDF` FOREIGN KEY (`shop_billing_data_id`) REFERENCES `sylius_shop_billing_data` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_16C8119EF242B1E6` FOREIGN KEY (`menu_taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `sylius_channel_countries`
--
ALTER TABLE `sylius_channel_countries`
  ADD CONSTRAINT `FK_D96E51AE72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D96E51AEF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `sylius_country` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_channel_currencies`
--
ALTER TABLE `sylius_channel_currencies`
  ADD CONSTRAINT `FK_AE491F9338248176` FOREIGN KEY (`currency_id`) REFERENCES `sylius_currency` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AE491F9372F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_channel_locales`
--
ALTER TABLE `sylius_channel_locales`
  ADD CONSTRAINT `FK_786B7A8472F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_786B7A84E559DFD1` FOREIGN KEY (`locale_id`) REFERENCES `sylius_locale` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_channel_price_history_config_excluded_taxons`
--
ALTER TABLE `sylius_channel_price_history_config_excluded_taxons`
  ADD CONSTRAINT `FK_77FD02A72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel_price_history_config` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_77FD02ADE13F470` FOREIGN KEY (`taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_channel_pricing`
--
ALTER TABLE `sylius_channel_pricing`
  ADD CONSTRAINT `FK_7801820CA80EF684` FOREIGN KEY (`product_variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_channel_pricing_catalog_promotions`
--
ALTER TABLE `sylius_channel_pricing_catalog_promotions`
  ADD CONSTRAINT `FK_9F52FF5122E2CB5A` FOREIGN KEY (`catalog_promotion_id`) REFERENCES `sylius_catalog_promotion` (`id`),
  ADD CONSTRAINT `FK_9F52FF513EADFFE5` FOREIGN KEY (`channel_pricing_id`) REFERENCES `sylius_channel_pricing` (`id`);

--
-- Contraintes pour la table `sylius_channel_pricing_log_entry`
--
ALTER TABLE `sylius_channel_pricing_log_entry`
  ADD CONSTRAINT `FK_77181A53EADFFE5` FOREIGN KEY (`channel_pricing_id`) REFERENCES `sylius_channel_pricing` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_customer`
--
ALTER TABLE `sylius_customer`
  ADD CONSTRAINT `FK_7E82D5E6BD94FB16` FOREIGN KEY (`default_address_id`) REFERENCES `sylius_address` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_7E82D5E6CDF1749F` FOREIGN KEY (`loyalty_points_account_id`) REFERENCES `sylius_loyalty_loyalty_points_account` (`id`),
  ADD CONSTRAINT `FK_7E82D5E6D2919A68` FOREIGN KEY (`customer_group_id`) REFERENCES `sylius_customer_group` (`id`);

--
-- Contraintes pour la table `sylius_exchange_rate`
--
ALTER TABLE `sylius_exchange_rate`
  ADD CONSTRAINT `FK_5F52B852A76BEED` FOREIGN KEY (`source_currency`) REFERENCES `sylius_currency` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5F52B85B3FD5856` FOREIGN KEY (`target_currency`) REFERENCES `sylius_currency` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_loyalty_loyalty_points_transactions`
--
ALTER TABLE `sylius_loyalty_loyalty_points_transactions`
  ADD CONSTRAINT `FK_BFBB5A682FC0CB0F` FOREIGN KEY (`transaction_id`) REFERENCES `sylius_loyalty_loyalty_points_transaction` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BFBB5A68CDF1749F` FOREIGN KEY (`loyalty_points_account_id`) REFERENCES `sylius_loyalty_loyalty_points_account` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_loyalty_loyalty_purchase`
--
ALTER TABLE `sylius_loyalty_loyalty_purchase`
  ADD CONSTRAINT `FK_FA819B5F139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`);

--
-- Contraintes pour la table `sylius_loyalty_loyalty_rule`
--
ALTER TABLE `sylius_loyalty_loyalty_rule`
  ADD CONSTRAINT `FK_54C32E8D9D32F035` FOREIGN KEY (`action_id`) REFERENCES `sylius_loyalty_loyalty_rule_action` (`id`);

--
-- Contraintes pour la table `sylius_loyalty_loyalty_rule_channels`
--
ALTER TABLE `sylius_loyalty_loyalty_rule_channels`
  ADD CONSTRAINT `FK_CCD8FF5D188FEBE2` FOREIGN KEY (`loyalty_rule_id`) REFERENCES `sylius_loyalty_loyalty_rule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CCD8FF5D72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_menu`
--
ALTER TABLE `sylius_menu`
  ADD CONSTRAINT `FK_A60CDF1AB213FA4` FOREIGN KEY (`lang_id`) REFERENCES `sylius_locale` (`id`);

--
-- Contraintes pour la table `sylius_menu_item`
--
ALTER TABLE `sylius_menu_item`
  ADD CONSTRAINT `FK_93953FBECCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `sylius_menu` (`id`),
  ADD CONSTRAINT `FK_E71E91E2DE13F470` FOREIGN KEY (`taxon_id`) REFERENCES `sylius_taxon` (`id`),
  ADD CONSTRAINT `FK_E71E91E2E98FE523` FOREIGN KEY (`menuPage_id`) REFERENCES `sylius_menu_page` (`id`);

--
-- Contraintes pour la table `sylius_menu_page`
--
ALTER TABLE `sylius_menu_page`
  ADD CONSTRAINT `FK_EC0F02DC24611D81` FOREIGN KEY (`menuItemParent_id`) REFERENCES `sylius_menu_item` (`id`),
  ADD CONSTRAINT `FK_EC0F02DCCCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `sylius_menu` (`id`);

--
-- Contraintes pour la table `sylius_multi_source_inventory_inventory_source`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source`
  ADD CONSTRAINT `FK_96C48A62F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `sylius_multi_source_inventory_inventory_source_address` (`id`);

--
-- Contraintes pour la table `sylius_multi_source_inventory_inventory_source_channels`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_channels`
  ADD CONSTRAINT `FK_9ED7D9201280F509` FOREIGN KEY (`inventory_source_id`) REFERENCES `sylius_multi_source_inventory_inventory_source` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9ED7D92072F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_multi_source_inventory_inventory_source_stock`
--
ALTER TABLE `sylius_multi_source_inventory_inventory_source_stock`
  ADD CONSTRAINT `FK_7FD5018D1280F509` FOREIGN KEY (`inventory_source_id`) REFERENCES `sylius_multi_source_inventory_inventory_source` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7FD5018DA80EF684` FOREIGN KEY (`product_variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_order`
--
ALTER TABLE `sylius_order`
  ADD CONSTRAINT `FK_6196A1F917B24436` FOREIGN KEY (`promotion_coupon_id`) REFERENCES `sylius_promotion_coupon` (`id`),
  ADD CONSTRAINT `FK_6196A1F94D4CFF2B` FOREIGN KEY (`shipping_address_id`) REFERENCES `sylius_address` (`id`),
  ADD CONSTRAINT `FK_6196A1F972F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`),
  ADD CONSTRAINT `FK_6196A1F979D0C0E4` FOREIGN KEY (`billing_address_id`) REFERENCES `sylius_address` (`id`),
  ADD CONSTRAINT `FK_6196A1F99395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `sylius_customer` (`id`);

--
-- Contraintes pour la table `sylius_order_item`
--
ALTER TABLE `sylius_order_item`
  ADD CONSTRAINT `FK_77B587ED3B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `sylius_product_variant` (`id`),
  ADD CONSTRAINT `FK_77B587ED8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_order_item_unit`
--
ALTER TABLE `sylius_order_item_unit`
  ADD CONSTRAINT `FK_82BF226E7BE036FC` FOREIGN KEY (`shipment_id`) REFERENCES `sylius_shipment` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_82BF226EE415FB15` FOREIGN KEY (`order_item_id`) REFERENCES `sylius_order_item` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_payment`
--
ALTER TABLE `sylius_payment`
  ADD CONSTRAINT `FK_D9191BD419883967` FOREIGN KEY (`method_id`) REFERENCES `sylius_payment_method` (`id`),
  ADD CONSTRAINT `FK_D9191BD48D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_payment_method`
--
ALTER TABLE `sylius_payment_method`
  ADD CONSTRAINT `FK_A75B0B0DF23D6140` FOREIGN KEY (`gateway_config_id`) REFERENCES `sylius_gateway_config` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `sylius_payment_method_channels`
--
ALTER TABLE `sylius_payment_method_channels`
  ADD CONSTRAINT `FK_543AC0CC5AA1164F` FOREIGN KEY (`payment_method_id`) REFERENCES `sylius_payment_method` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_543AC0CC72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_payment_method_translation`
--
ALTER TABLE `sylius_payment_method_translation`
  ADD CONSTRAINT `FK_966BE3A12C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_payment_method` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_paypal_plugin_pay_pal_credentials`
--
ALTER TABLE `sylius_paypal_plugin_pay_pal_credentials`
  ADD CONSTRAINT `FK_C56F54AD5AA1164F` FOREIGN KEY (`payment_method_id`) REFERENCES `sylius_payment_method` (`id`);

--
-- Contraintes pour la table `sylius_product`
--
ALTER TABLE `sylius_product`
  ADD CONSTRAINT `FK_677B9B74731E505` FOREIGN KEY (`main_taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `sylius_product_association`
--
ALTER TABLE `sylius_product_association`
  ADD CONSTRAINT `FK_48E9CDAB4584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_48E9CDABB1E1C39` FOREIGN KEY (`association_type_id`) REFERENCES `sylius_product_association_type` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_association_product`
--
ALTER TABLE `sylius_product_association_product`
  ADD CONSTRAINT `FK_A427B9834584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A427B983EFB9C8A5` FOREIGN KEY (`association_id`) REFERENCES `sylius_product_association` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_association_type_translation`
--
ALTER TABLE `sylius_product_association_type_translation`
  ADD CONSTRAINT `FK_4F618E52C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_association_type` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_attribute_translation`
--
ALTER TABLE `sylius_product_attribute_translation`
  ADD CONSTRAINT `FK_93850EBA2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_attribute` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_attribute_value`
--
ALTER TABLE `sylius_product_attribute_value`
  ADD CONSTRAINT `FK_8A053E544584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8A053E54B6E62EFA` FOREIGN KEY (`attribute_id`) REFERENCES `sylius_product_attribute` (`id`);

--
-- Contraintes pour la table `sylius_product_channels`
--
ALTER TABLE `sylius_product_channels`
  ADD CONSTRAINT `FK_F9EF269B4584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F9EF269B72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_image`
--
ALTER TABLE `sylius_product_image`
  ADD CONSTRAINT `FK_88C64B2D7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_image_product_variants`
--
ALTER TABLE `sylius_product_image_product_variants`
  ADD CONSTRAINT `FK_8FFDAE8D3B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8FFDAE8D3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `sylius_product_image` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_options`
--
ALTER TABLE `sylius_product_options`
  ADD CONSTRAINT `FK_2B5FF0094584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2B5FF009A7C41D6F` FOREIGN KEY (`option_id`) REFERENCES `sylius_product_option` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_option_translation`
--
ALTER TABLE `sylius_product_option_translation`
  ADD CONSTRAINT `FK_CBA491AD2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_option` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_option_value`
--
ALTER TABLE `sylius_product_option_value`
  ADD CONSTRAINT `FK_F7FF7D4BA7C41D6F` FOREIGN KEY (`option_id`) REFERENCES `sylius_product_option` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_option_value_translation`
--
ALTER TABLE `sylius_product_option_value_translation`
  ADD CONSTRAINT `FK_8D4382DC2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_option_value` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_review`
--
ALTER TABLE `sylius_product_review`
  ADD CONSTRAINT `FK_C7056A994584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C7056A99F675F31B` FOREIGN KEY (`author_id`) REFERENCES `sylius_customer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_taxon`
--
ALTER TABLE `sylius_product_taxon`
  ADD CONSTRAINT `FK_169C6CD94584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_169C6CD9DE13F470` FOREIGN KEY (`taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_translation`
--
ALTER TABLE `sylius_product_translation`
  ADD CONSTRAINT `FK_105A9082C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_variant`
--
ALTER TABLE `sylius_product_variant`
  ADD CONSTRAINT `FK_A29B5234584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A29B5239DF894ED` FOREIGN KEY (`tax_category_id`) REFERENCES `sylius_tax_category` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_A29B5239E2D1A41` FOREIGN KEY (`shipping_category_id`) REFERENCES `sylius_shipping_category` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `sylius_product_variant_option_value`
--
ALTER TABLE `sylius_product_variant_option_value`
  ADD CONSTRAINT `FK_76CDAFA13B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_76CDAFA1D957CA06` FOREIGN KEY (`option_value_id`) REFERENCES `sylius_product_option_value` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_product_variant_translation`
--
ALTER TABLE `sylius_product_variant_translation`
  ADD CONSTRAINT `FK_8DC18EDC2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_promotion_action`
--
ALTER TABLE `sylius_promotion_action`
  ADD CONSTRAINT `FK_933D0915139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`);

--
-- Contraintes pour la table `sylius_promotion_channels`
--
ALTER TABLE `sylius_promotion_channels`
  ADD CONSTRAINT `FK_1A044F64139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1A044F6472F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_promotion_coupon`
--
ALTER TABLE `sylius_promotion_coupon`
  ADD CONSTRAINT `FK_B04EBA85139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`);

--
-- Contraintes pour la table `sylius_promotion_order`
--
ALTER TABLE `sylius_promotion_order`
  ADD CONSTRAINT `FK_BF9CF6FB139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`),
  ADD CONSTRAINT `FK_BF9CF6FB8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_promotion_rule`
--
ALTER TABLE `sylius_promotion_rule`
  ADD CONSTRAINT `FK_2C188EA8139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`);

--
-- Contraintes pour la table `sylius_promotion_translation`
--
ALTER TABLE `sylius_promotion_translation`
  ADD CONSTRAINT `FK_3C7A76182C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_promotion` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_province`
--
ALTER TABLE `sylius_province`
  ADD CONSTRAINT `FK_B5618FE4F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `sylius_country` (`id`);

--
-- Contraintes pour la table `sylius_refund_credit_memo`
--
ALTER TABLE `sylius_refund_credit_memo`
  ADD CONSTRAINT `FK_5C4F333130354A65` FOREIGN KEY (`to_id`) REFERENCES `sylius_refund_shop_billing_data` (`id`),
  ADD CONSTRAINT `FK_5C4F333172F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`),
  ADD CONSTRAINT `FK_5C4F333178CED90B` FOREIGN KEY (`from_id`) REFERENCES `sylius_refund_customer_billing_data` (`id`),
  ADD CONSTRAINT `FK_5C4F33318D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`);

--
-- Contraintes pour la table `sylius_refund_credit_memo_line_items`
--
ALTER TABLE `sylius_refund_credit_memo_line_items`
  ADD CONSTRAINT `FK_1453B90E8E574316` FOREIGN KEY (`credit_memo_id`) REFERENCES `sylius_refund_credit_memo` (`id`),
  ADD CONSTRAINT `FK_1453B90EA7CBD339` FOREIGN KEY (`line_item_id`) REFERENCES `sylius_refund_line_item` (`id`);

--
-- Contraintes pour la table `sylius_refund_credit_memo_tax_items`
--
ALTER TABLE `sylius_refund_credit_memo_tax_items`
  ADD CONSTRAINT `FK_9BBDFBE25327F254` FOREIGN KEY (`tax_item_id`) REFERENCES `sylius_refund_tax_item` (`id`),
  ADD CONSTRAINT `FK_9BBDFBE28E574316` FOREIGN KEY (`credit_memo_id`) REFERENCES `sylius_refund_credit_memo` (`id`);

--
-- Contraintes pour la table `sylius_refund_refund`
--
ALTER TABLE `sylius_refund_refund`
  ADD CONSTRAINT `FK_DEF86A0E8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`);

--
-- Contraintes pour la table `sylius_refund_refund_payment`
--
ALTER TABLE `sylius_refund_refund_payment`
  ADD CONSTRAINT `FK_EC283EA55AA1164F` FOREIGN KEY (`payment_method_id`) REFERENCES `sylius_payment_method` (`id`),
  ADD CONSTRAINT `FK_EC283EA58D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`);

--
-- Contraintes pour la table `sylius_shipment`
--
ALTER TABLE `sylius_shipment`
  ADD CONSTRAINT `FK_FD707B331280F509` FOREIGN KEY (`inventory_source_id`) REFERENCES `sylius_multi_source_inventory_inventory_source` (`id`),
  ADD CONSTRAINT `FK_FD707B3319883967` FOREIGN KEY (`method_id`) REFERENCES `sylius_shipping_method` (`id`),
  ADD CONSTRAINT `FK_FD707B338D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_shipping_method`
--
ALTER TABLE `sylius_shipping_method`
  ADD CONSTRAINT `FK_5FB0EE1112469DE2` FOREIGN KEY (`category_id`) REFERENCES `sylius_shipping_category` (`id`),
  ADD CONSTRAINT `FK_5FB0EE119DF894ED` FOREIGN KEY (`tax_category_id`) REFERENCES `sylius_tax_category` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_5FB0EE119F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `sylius_zone` (`id`);

--
-- Contraintes pour la table `sylius_shipping_method_channels`
--
ALTER TABLE `sylius_shipping_method_channels`
  ADD CONSTRAINT `FK_2D9833355F7D6850` FOREIGN KEY (`shipping_method_id`) REFERENCES `sylius_shipping_method` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2D98333572F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_shipping_method_rule`
--
ALTER TABLE `sylius_shipping_method_rule`
  ADD CONSTRAINT `FK_88A0EB655F7D6850` FOREIGN KEY (`shipping_method_id`) REFERENCES `sylius_shipping_method` (`id`);

--
-- Contraintes pour la table `sylius_shipping_method_translation`
--
ALTER TABLE `sylius_shipping_method_translation`
  ADD CONSTRAINT `FK_2B37DB3D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_shipping_method` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_shop_user`
--
ALTER TABLE `sylius_shop_user`
  ADD CONSTRAINT `FK_7C2B74809395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `sylius_customer` (`id`);

--
-- Contraintes pour la table `sylius_taxon`
--
ALTER TABLE `sylius_taxon`
  ADD CONSTRAINT `FK_CFD811CA727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CFD811CAA977936C` FOREIGN KEY (`tree_root`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_taxon_image`
--
ALTER TABLE `sylius_taxon_image`
  ADD CONSTRAINT `FK_DBE52B287E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_taxon_translation`
--
ALTER TABLE `sylius_taxon_translation`
  ADD CONSTRAINT `FK_1487DFCF2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sylius_tax_rate`
--
ALTER TABLE `sylius_tax_rate`
  ADD CONSTRAINT `FK_3CD86B2E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `sylius_tax_category` (`id`),
  ADD CONSTRAINT `FK_3CD86B2E9F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `sylius_zone` (`id`);

--
-- Contraintes pour la table `sylius_user_oauth`
--
ALTER TABLE `sylius_user_oauth`
  ADD CONSTRAINT `FK_C3471B78A76ED395` FOREIGN KEY (`user_id`) REFERENCES `sylius_shop_user` (`id`);

--
-- Contraintes pour la table `sylius_zone_member`
--
ALTER TABLE `sylius_zone_member`
  ADD CONSTRAINT `FK_E8B5ABF34B0E929B` FOREIGN KEY (`belongs_to`) REFERENCES `sylius_zone` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
