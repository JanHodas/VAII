CREATE TABLE IF NOT EXISTS parts (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(120) NOT NULL,
    category VARCHAR(60) NOT NULL,
    catalogue_number VARCHAR(40) NOT NULL,
    manufacturer VARCHAR(60) NOT NULL,
    price DECIMAL(10, 2) UNSIGNED NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO parts (id, name, category, catalogue_number, manufacturer, price) VALUES
    (1, 'Motorový olej 5W-40, 1 l', 'Pravidelný servis', 'MO-5W40-1L', 'Castrol', 12.50),
    (2, 'Olejový filter', 'Pravidelný servis', 'OC 90', 'Mahle', 7.90),
    (3, 'Brzdové platničky predné', 'Brzdy', 'GDB1550', 'TRW', 41.25),
    (4, 'Vzduchový filter', 'Pravidelný servis', 'LX 1566', 'Mahle', 14.60);
