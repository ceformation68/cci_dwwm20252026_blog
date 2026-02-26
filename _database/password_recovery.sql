ALTER TABLE users 
	ADD user_reset_at DATETIME NULL AFTER user_pwd, 
	ADD user_reset_token VARCHAR(255) NULL AFTER user_reset_at, 
	ADD user_reset_expires DATETIME NULL AFTER user_reset_token;