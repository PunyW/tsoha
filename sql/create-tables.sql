CREATE TABLE user_groups(
    id SERIAL PRIMARY KEY,
    description VARCHAR(10) NOT NULL
);

CREATE TABLE flights (
    flight_id VARCHAR(10) NOT NULL,
    departure_airport VARCHAR(25) NOT NULL,
    departure_time TIMESTAMP NOT NULL,
    destination_airport VARCHAR(25) NOT NULL,
    estimated_arrival TIMESTAMP,
    PRIMARY KEY(flight_id, departure_time)
);

CREATE TABLE reservations (
    reservation_id VARCHAR(32) PRIMARY KEY,
    flight_dep_time TIMESTAMP NOT NULL,
    flight_id VARCHAR(10) NOT NULL,
    FOREIGN KEY (flight_id, flight_dep_time) REFERENCES flights(flight_id, departure_time)
);

CREATE TABLE passengers (
    id SERIAL PRIMARY KEY,
    user_group INT REFERENCES user_groups(id),
    firstname VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    phonenumber VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reservation_id VARCHAR(32) NOT NULL REFERENCES reservations(reservation_id) ON DELETE CASCADE
);

CREATE TABLE wish (
    wish_id SERIAL PRIMARY KEY,
    description TEXT NOT NULL
);

CREATE TABLE wishes (
    wish_id INT NOT NULL REFERENCES wish(wish_id),
    flight_dep_time TIMESTAMP NOT NULL,
    flight_id VARCHAR(10) NOT NULL,
    passenger_id INT NOT NULL REFERENCES passengers(id) ON DELETE CASCADE,
    FOREIGN KEY (flight_id, flight_dep_time) REFERENCES flights(flight_id, departure_time),
    UNIQUE(wish_id, flight_dep_time, flight_id, passenger_id)
);

CREATE TABLE product_categories (
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL
);

CREATE TABLE products (
    id VARCHAR(5) PRIMARY KEY,
    description TEXT NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category INT NOT NULL REFERENCES product_categories(id) ON DELETE CASCADE
);

CREATE TABLE orders (
    id VARCHAR(5) NOT NULL REFERENCES products(id),
    quantity INT NOT NULL,
    flight_dep_time TIMESTAMP NOT NULL,
    flight_id VARCHAR(10) NOT NULL,
    passenger_id INT NOT NULL REFERENCES passengers(id) ON DELETE CASCADE,
    FOREIGN KEY (flight_id, flight_dep_time) REFERENCES flights(flight_id, departure_time),
    UNIQUE(id, flight_dep_time, flight_id, passenger_id)
);

CREATE TABLE employee (
    username VARCHAR(20) PRIMARY KEY,
    password VARCHAR(32) NOT NULL,
    usergroup INT NOT NULL REFERENCES user_groups(id)
);

