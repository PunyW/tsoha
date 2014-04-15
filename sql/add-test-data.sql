INSERT INTO user_groups(description) VALUES 
    ('passenger'), ('employee'), ('admin');
INSERT INTO flights (flight_number, departure_airport, departure_time, destination_airport) VALUES 
    ('FI 1324', 'FIN - EFHK', '2014-05-31 16:30:00', 'SWE - XWZ'), ('FI 1324', 'FIN - EFHK', '2014-06-01 16:30:00', 'SWE - XWZ');
INSERT INTO reservations (reservation_id, flight_id, seats) VALUES
    ('fe233f087f77c779731ac3ab3b581ce6272ce668e0aac8545a3330d81b6020b345a7ce3e197f109aa37998a94139ff11f33be5300d8544d386871afde5120357', 2, 'A3'), ('6ebc686efdd4c2699ecd510114312873c7a4412d46e61d0425fce32b4200f84a929b262060541b33c4ce137779cae910d4d04c7494cff1ac1c71eab77373c62f', 1, 'K5, K6, K7, K8');
INSERT INTO passengers (user_group, firstname, surname, phonenumber, email, reservation_id)  VALUES 
    (1, 'Jaska', 'Jokunen', '+358404044044', 'jaska@jokunen.fi', '6ebc686efdd4c2699ecd510114312873c7a4412d46e61d0425fce32b4200f84a929b262060541b33c4ce137779cae910d4d04c7494cff1ac1c71eab77373c62f'), 
    (1, 'Tero', 'Martikainen', '+19572669', 'perusjamppa@hotmail.com', 'fe233f087f77c779731ac3ab3b581ce6272ce668e0aac8545a3330d81b6020b345a7ce3e197f109aa37998a94139ff11f33be5300d8544d386871afde5120357'); 
INSERT INTO wish (description, wish_name) VALUES 
    ('Kasvisruoka', 'kasvisruoka'), ('Käytävä paikka', 'kaytava'), ('Ikkuna paikka', 'ikkuna'), ('Enemmän jalkatilaa', 'jalkatila'), ('toive 5', 'toive5'), ('toive 6', 'toive6'), ('toive 7', 'toive7');
INSERT INTO wishes(wish_id, flight_id, passenger_id) VALUES
    (1, 1, 1), (2, 1, 1), (3, 1, 1), 
    (2, 2, 2);
INSERT INTO product_categories(category_name) VALUES 
    ('Kosmetiikka'), ('Alkoholi'), ('Makeiset');
INSERT INTO products(product_id, description, price, category, product_name) VALUES
    ('KOS1L', '1 litran kossu pullo', 5.25, 2, 'Kossu 1 litra'), ('BBCOL', 'Tosi hieno & Kallis hajuvesi', 900.25, 1, 'Jonkin sortin hajuvesi'), ('MMM', 'Karkkipussi', 2.50, 3, 'Maukan maukkaat makeiset');
INSERT INTO orders(order_id, flight_id, passenger_id, quantity) VALUES
    ('BBCOL', 1, 1, 5), ('KOS1L', 1, 1, 100), ('MMM', 1, 1, 1), 
    ('MMM', 1, 2, 856);
INSERT INTO employee(username, password, usergroup) VALUES
    ('duunari', '812b3b33881c8df60bbf6c598b0c260846bb997e1f32ae044e0735ee18c0f36c4a2f7a007018dc4e4bc46d4e7f41f666cadb53805758a562adb002366cd7d2fb', 2);