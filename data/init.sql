CREATE DATABASE test;

use test;

CREATE TABLE 6826 (
	LotNum VARCHAR(11) PRIMARY KEY, 
	KeyanceDate date NOT NULL,
	JobNum VARCHAR(30) NOT NULL,
	A1Top decimal(5, 2),
	A1Center decimal(5, 2),
	A1Bottom decimal(5, 2),
	A2Top decimal(5, 2),
	A2Center decimal(5, 2),
	A2Bottom decimal(5, 2),
	B1Top decimal(5, 2),
	B1Center decimal(5, 2),
	B1Bottom decimal(5, 2),
	B2Top decimal(5, 2),
	B2Center decimal(5, 2),
	B2Bottom decimal(5, 2),
	CoatingLotNum VARCHAR(11),
	Solids decimal(5, 2),
	PH decimal(5, 2),
	GunSetting decimal(5, 2),
	AirFlow tinyint,
	date TIMESTAMP
);