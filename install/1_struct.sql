CREATE TABLE t_legal_information
(
    pk_i_id         INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title         VARCHAR(256) NULL,
    s_tags_ids      VARCHAR(1024) NULL,
    s_documents_ids VARCHAR(1024) NULL,
    s_warnings_ids  VARCHAR(1024) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_legal_i_title
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


CREATE TABLE t_legal_i_tag
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_legal_i_document
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


CREATE TABLE t_legal_i_warning
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_a_class
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


CREATE TABLE t_microdistrict
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_a_status
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_a_status2
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_view_from_window
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_renovation_type
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_bathroom_type
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';



CREATE TABLE t_apartment
(
    pk_i_id                 INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    i_object_type           TINYINT(2) NOT NULL DEFAULT 1,
    s_title                 VARCHAR(256) NULL,
    i_num_of_rooms          INT(5) UNSIGNED DEFAULT NULL,
    i_area                  INT(10) UNSIGNED DEFAULT NULL,
    i_price                 INT(10) UNSIGNED DEFAULT NULL,
    i_price_sqm             INT(10) UNSIGNED DEFAULT NULL,
    i_level                 INT(5) DEFAULT NULL,
    i_levels                INT(5) UNSIGNED DEFAULT NULL,
    i_status_id             INT(10) UNSIGNED DEFAULT NULL,
    i_status2_id            INT(10) UNSIGNED DEFAULT NULL,
    i_microdistrict_id      INT(10) UNSIGNED DEFAULT NULL,
    s_street                VARCHAR(256) NULL,
    i_sea_distance          INT(10) UNSIGNED DEFAULT NULL,
    i_view_from_window_id   INT(10) UNSIGNED DEFAULT NULL,
    i_renovation_type_id    INT(10) UNSIGNED DEFAULT NULL,
    i_bathroom_type_id      INT(10) UNSIGNED DEFAULT NULL,
    i_class_id              INT(10) UNSIGNED DEFAULT NULL,
    s_legal_information_ids VARCHAR(1024) NULL,
    b_is_studio             TINYINT(1) NOT NULL DEFAULT 0,
    s_latitude              VARCHAR(20) NULL,
    s_longitude             VARCHAR(20) NULL,
    s_description           TEXT NULL,
    dt_mod_date             DATETIME NULL,
    b_active                TINYINT(1) NOT NULL DEFAULT 1,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_u_role
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_u_class_of_property
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_u_selling_types_ids
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_title VARCHAR(256) NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


CREATE TABLE t_user
(
    pk_i_id                 INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_name                  VARCHAR(100) NOT NULL,
    s_username              VARCHAR(100) NOT NULL,
    s_password              CHAR(60)     NOT NULL,
    s_email                 VARCHAR(100) NOT NULL,
    s_phone                 VARCHAR(45),
    b_enabled               TINYINT(1) NOT NULL DEFAULT 1,
    fk_i_photo_id           INT(10) UNSIGNED NULL,
    fk_i_role_id            INT(10) UNSIGNED NULL,
    s_class_of_property_ids VARCHAR(1024) NULL,
    selling_types_ids       VARCHAR(1024) NULL,

    PRIMARY KEY (pk_i_id),
    UNIQUE KEY (s_email),
    INDEX                   idx_fk_i_role (fk_i_role_id),
    FOREIGN KEY (fk_i_role_id) REFERENCES t_u_role (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


CREATE TABLE t_user_apartment
(
    pk_i_id           INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    fk_i_user_id      INT(10) UNSIGNED NOT NULL DEFAULT 0,
    fk_i_apartment_id INT(10) UNSIGNED NOT NULL DEFAULT 0,

    PRIMARY KEY (pk_i_id),
    FOREIGN KEY (fk_i_user_id) REFERENCES t_user (pk_i_id),
    FOREIGN KEY (fk_i_apartment_id) REFERENCES t_apartment (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_app_cfg
(
    pk_i_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_name  VARCHAR(100)  NOT NULL,
    s_value VARCHAR(1024) NOT NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE t_photo
(
    pk_i_id    INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    s_filename VARCHAR(500) NOT NULL,

    PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


CREATE TABLE t_photo_set
(
    pk_i_id         INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    fk_i_apartment_id INT(10) UNSIGNED NOT NULL DEFAULT 0,
    s_photos_ids    VARCHAR(1024) NOT NULL,

    PRIMARY KEY (pk_i_id),
    FOREIGN KEY (fk_apartment_id) REFERENCES t_apartment (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
