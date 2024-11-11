CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  role ENUM('parent', 'child') NOT NULL,
  name VARCHAR(255) NOT NULL,
  parent_phone VARCHAR(20) NOT NULL,
  child_phone VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL
);

CREATE TABLE emergency_contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  relationship VARCHAR(100),
  address VARCHAR(255),
);

CREATE TABLE locations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  latitude DOUBLE NOT NULL,
  longitude DOUBLE NOT NULL
);



