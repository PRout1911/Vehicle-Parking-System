CREATE TABLE allocations(id INT AUTO_INCREMENT PRIMARY KEY,
    license_plate VARCHAR(20) NOT NULL,
    vehicle_type VARCHAR(50)NOT NULL,
    allocated_spot VARCHAR(10)
    );