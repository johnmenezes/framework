use watpottm;

CREATE TABLE `article_category` (
   `id` int(11) not null auto_increment,
   `category_cd` varchar(128) not null,
   `category_desc` varchar(128) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `article` (
   `id` int(11) not null auto_increment,
   `article_category_id` int(11) not null default '0',
   `header_en` varchar(128) not null,
   `content_en` text,
   `header_th` varchar(128) not null,
   `content_th` text,
   `sort_order` int(11) not null default '0',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `menu` (
   `id` int(11) not null auto_increment,
   `parent_id` int(11),
   `menu_cd` varchar(128) not null,
   `desc_en` varchar(128) not null,
   `desc_th` varchar(128) not null,
   `image` varchar(128),
   `menu_type` varchar(128) not null,
   `menu_subtype` varchar(128) not null,
   `action` varchar(128),
   `sort_order` int(11) not null default '0',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `album` (
   `id` int(11) not null auto_increment,
   `album_cd` varchar(128) not null,
   `header_en` varchar(128) not null,
   `desc_en` varchar(128),
   `header_th` varchar(128) not null,
   `desc_th` varchar(128),
   `sort_order` int(11) not null default '0',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `image` (
   `id` int(11) not null auto_increment,
   `album_id` int(11),
   `image_cd` varchar(128) not null,
   `desc_en` varchar(128),
   `desc_th` varchar(128),
   `sort_order` int(11) not null default '0',
   `link` varchar(128) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
