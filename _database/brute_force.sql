CREATE TABLE login_attempts (
    login_id INT NOT NULL AUTO_INCREMENT, 
    login_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    login_ip VARCHAR(50) NOT NULL, 
    login_agent VARCHAR(255) NOT NULL, 
    login_mail VARCHAR(255) NOT NULL, 
    login_user INT NULL DEFAULT NULL, 
    login_ok BOOLEAN NOT NULL DEFAULT FALSE, 
    PRIMARY KEY (login_id)
) ENGINE = InnoDB;