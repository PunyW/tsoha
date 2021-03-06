CREATE TABLE user_groups(
    user_group_id SERIAL PRIMARY KEY,
    description VARCHAR(10) NOT NULL
);

CREATE TABLE flights (
    flight_id SERIAL PRIMARY KEY, 
    flight_number VARCHAR(10) NOT NULL,
    departure_airport VARCHAR(25) NOT NULL,
    departure_time TIMESTAMP NOT NULL,
    destination_airport VARCHAR(25) NOT NULL,
    estimated_arrival TIMESTAMP
);

CREATE TABLE reservations (
    reservation_id VARCHAR(131) PRIMARY KEY,
    flight_id INT NOT NULL REFERENCES flights(flight_id),
    seats VARCHAR(50)
);

CREATE TABLE passengers (
    passenger_id SERIAL PRIMARY KEY,
    user_group INT REFERENCES user_groups(user_group_id),
    firstname VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    phonenumber VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reservation_id VARCHAR(131) NOT NULL REFERENCES reservations(reservation_id) ON UPDATE CASCADE
);

CREATE TABLE wish (
    wish_id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    wish_name TEXT UNIQUE NOT NULL
);

CREATE TABLE wishes (
    wish_id INT NOT NULL REFERENCES wish(wish_id),
    flight_id INT NOT NULL REFERENCES flights(flight_id),
    passenger_id INT NOT NULL REFERENCES passengers(passenger_id) ON DELETE CASCADE,
    UNIQUE(wish_id, flight_id, passenger_id)
);

CREATE TABLE product_categories (
    category_id SERIAL PRIMARY KEY,
    category_name TEXT NOT NULL
);

CREATE TABLE products (
    product_id VARCHAR(5) PRIMARY KEY,
    description TEXT NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category INT NOT NULL REFERENCES product_categories(category_id) ON UPDATE CASCADE
);

CREATE TABLE orders (
    order_id VARCHAR(5) NOT NULL REFERENCES products(product_id) ON UPDATE CASCADE,
    quantity INT NOT NULL,
    flight_id INT NOT NULL REFERENCES flights(flight_id),
    passenger_id INT NOT NULL REFERENCES passengers(passenger_id) ON DELETE CASCADE,
    UNIQUE(order_id, flight_id, passenger_id)
);

CREATE TABLE employee (
    username VARCHAR(20) PRIMARY KEY,
    password VARCHAR(131) NOT NULL,
    usergroup INT NOT NULL REFERENCES user_groups(user_group_id)
);

