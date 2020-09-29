#
# Table structure for table 'tx_sgreplacement_domain_model_item'
#
CREATE TABLE tx_sgreplacement_domain_model_item (
    name varchar(255) DEFAULT '' NOT NULL,
    description text DEFAULT NULL,
    search_for varchar(255) DEFAULT '' NOT NULL,
    replace_with varchar(255) DEFAULT '' NOT NULL,
    is_reg_ex int(11) DEFAULT '0' NOT NULL,
);