-- Create the database
CREATE DATABASE IF NOT EXISTS lars_db;
USE lars_db;

-- Create roles table
CREATE TABLE IF NOT EXISTS roles (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL UNIQUE
);


-- Create users table
CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role_id INT NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);
 

-- Create user_logs table
CREATE TABLE IF NOT EXISTS user_logs (
    log_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    action VARCHAR(50) NOT NULL,
    action_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Insert default roles
INSERT INTO roles (role_name) VALUES 
('admin'),
('staff'),
('teacher'),
('student');

-- Create an admin user (password: admin123)
INSERT INTO users (username, password, email, role_id, first_name, last_name) VALUES 
('admin', '$2y$10$YourHashedPasswordHere', 'admin@larss.com', 1, 'System', 'Administrator');

-- Insert sample user logs
INSERT INTO user_logs (user_id, action, action_timestamp, ip_address) VALUES 
(1, 'Login', '2025-09-11 09:00:00', '127.0.0.1'),
(1, 'View Dashboard', '2025-09-11 09:01:00', '127.0.0.1'),
(1, 'Logout', '2025-09-11 10:00:00', '127.0.0.1');
