#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	productname varchar(255) DEFAULT NULL,
	image int(11) unsigned DEFAULT '0',
	text text,
	morelink varchar(255) DEFAULT '' NOT NULL,
	pdfdownload int(11) unsigned DEFAULT '0',
);