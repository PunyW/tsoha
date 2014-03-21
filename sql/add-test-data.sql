INSERT INTO user_groups(description) VALUES 
    ('passenger'), ('employee'), ('admin');
INSERT INTO flights (flight_id, departure_airport, departure_time, destination_airport) VALUES 
    ('FI 1324', 'FIN - EFHK', '2014-05-31 16:30:00', 'SWE - XWZ'), ('FI 1324', 'FIN - EFHK', '2014-06-01 16:30:00', 'SWE - XWZ');
INSERT INTO reservations (reservation_id, flight_dep_time, flight_id) VALUES
    ('c3c2bd601f0ec6a02ed4a4e55cc15b0b', '2014-05-31 16:30:00', 'FI 1324'), ('b5919c490c6cec5388db6f5d45888163', '2014-06-01 16:30:00', 'FI 1324');
INSERT INTO passengers (user_group, firstname, surname, phonenumber, email, reservation_id)  VALUES 
    (1, 'Jaska', 'Jokunen', '+358404044044', 'jaska@jokunen.fi', 'c3c2bd601f0ec6a02ed4a4e55cc15b0b'), 
(1, 'Tero', 'Martikainen', '+19572669', 'perusjamppa@hotmail.com', 'b5919c490c6cec5388db6f5d45888163'); 
INSERT INTO wish (description) VALUES 
    ('Kasvisruoka'), ('Käytävä paikka'), ('Ikkuna paikka');
INSERT INTO wishes(wish_id, flight_id, flight_dep_time, passenger_id) VALUES
    (1, 'FI 1324', '2014-06-01 16:30:00', 1), (2, 'FI 1324', '2014-06-01 16:30:00', 1), (3, 'FI 1324', '2014-06-01 16:30:00', 1), 
    (1, 'FI 1324', '2014-05-31 16:30:00', 1), (2, 'FI 1324', '2014-05-31 16:30:00', 1), (3, 'FI 1324', '2014-05-31 16:30:00', 1),
    (2, 'FI 1324', '2014-05-31 16:30:00', 2);
INSERT INTO product_categories(description) VALUES 
    ('Kosmetiikka'), ('Alkoholi'), ('Makeiset');
INSERT INTO products(id, description, price, category) VALUES
    ('KOS1L', 'Kossu 1l', 5.25, 2), ('BBCOL', 'Hajuvesi', 900.25, 1), ('MMM', 'Maukan maukkaat makeiset', 2.50, 3);
INSERT INTO orders(id, flight_id, flight_dep_time, passenger_id, quantity) VALUES
    ('BBCOL', 'FI 1324', '2014-06-01 16:30:00', 1, 5), ('KOS1L', 'FI 1324', '2014-06-01 16:30:00', 1, 100), ('MMM', 'FI 1324', '2014-06-01 16:30:00', 1, 1), 
    ('BBCOL', 'FI 1324', '2014-05-31 16:30:00', 1, 25), ('KOS1L', 'FI 1324', '2014-05-31 16:30:00', 1, 955), ('MMM', 'FI 1324', '2014-05-31 16:30:00', 1, 3),
    ('MMM', 'FI 1324', '2014-05-31 16:30:00', 2, 856);
INSERT INTO employee(username, password, usergroup) VALUES
    ('duunari', '67a4e626c924664bd4e575287f9cdedf', 2);