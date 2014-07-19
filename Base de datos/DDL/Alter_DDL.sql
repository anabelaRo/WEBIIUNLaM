ALTER TABLE pasaje 
	ADD COLUMN clase_pasaje	char(1)		NOT NULL,
	ADD COLUMN hora_vuelo	varchar(5)	DEFAULT NULL