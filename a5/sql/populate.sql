USE assignment5;


#populate categories
INSERT INTO categories (category_id, category_name) VALUES (1, 'MacBook');
INSERT INTO categories (category_id, category_name) VALUES (2, 'Imac');
INSERT INTO categories (category_id, category_name) VALUES (3, 'Ipad');
INSERT INTO categories (category_id, category_name) VALUES (4, 'Iphone');


#populate products
############################# Macbooks #############################
INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (1, 'MacBook Pro 2019 13-inch (Space Gray)', 1300, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/128GB flash storage/Intel Iris Plus Graphics 645/2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (2, 'MacBook Pro 2019 13-inch (Space Gray)', 1500, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/256GB flash storage/Intel Iris Plus Graphics 645/2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (3, 'MacBook Pro 2019 13-inch (Space Gray)', 1600, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/256GB flash storage/Intel Iris Plus Graphics 645/Magic Keyboard, 2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (4, 'MacBook Pro 2019 13-inch (Space Gray)', 1800, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/512GB flash storage/Intel Iris Plus Graphics 645/Magic Keyboard, 2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (5, 'MacBook Pro 2019 13-inch (Space Gray)', 1800, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'2.4GHz quad-core Intel Core i5/8GB 2133MHz memory/256GB flash storage/Intel Iris Plus Graphics 655/4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (6, 'MacBook Pro 2019 13-inch (Space Gray)', 2000, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'2.4GHz quad-core Intel Core i5/8GB 2133MHz memory/512GB flash storage/Intel Iris Plus Graphics 655/4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (7, 'MacBook Pro 2019 13-inch (Space Gray)', 2200, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'2.0GHz quad-core 10th-generation Intel Core i5/16GB 3733MHz memory/512GB flash storage/Intel Iris Plus Graphics /Magic Keyboard, 4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (8, 'MacBook Pro 2019 13-inch (Space Gray)', 2400, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'2.0GHz quad-core 10th-generation Intel Core i5/16GB 3733MHz memory/1TB flash storage/Intel Iris Plus Graphics /Magic Keyboard, 4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (9, 'MacBook Pro 2019 16-inch (Space Gray)', 2600, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'2.6GHz 6-core 9th-generation Intel Core i7/16GB 2666MHz memory/512GB flash storage/AMD Radeon Pro 5300M with 4GB memory /4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (10, 'MacBook Pro 2019 16-inch (Space Gray)', 2900, 10 ,'MacBookPro-2019-SpaceGray.jpg', 1, 
'2.3GHz 8-core 9th-generation Intel Core i7/16GB 2666MHz memory/1TB flash storage/AMD Radeon Pro 5500M with 4GB memory /4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (11, 'MacBook Pro 2019 13-inch (Silver)', 1300, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/128GB flash storage/Intel Iris Plus Graphics 645/2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (12, 'MacBook Pro 2019 13-inch (Silver)', 1500, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/256GB flash storage/Intel Iris Plus Graphics 645/2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (13, 'MacBook Pro 2019 13-inch (Silver)', 1600, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/256GB flash storage/Intel Iris Plus Graphics 645/Magic Keyboard, 2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (14, 'MacBook Pro 2019 13-inch (Silver)', 1800, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'1.4GHz quad-core Intel Core i5/8GB 2133MHz memory/512GB flash storage/Intel Iris Plus Graphics 645/Magic Keyboard, 2 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (15, 'MacBook Pro 2019 13-inch (Silver)', 1800, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'2.4GHz quad-core Intel Core i5/8GB 2133MHz memory/256GB flash storage/Intel Iris Plus Graphics 655/4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (16, 'MacBook Pro 2019 13-inch (Silver)', 2000, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'2.4GHz quad-core Intel Core i5/8GB 2133MHz memory/512GB flash storage/Intel Iris Plus Graphics 655/4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (17, 'MacBook Pro 2019 13-inch (Silver)', 2200, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'2.0GHz quad-core 10th-generation Intel Core i5/16GB 3733MHz memory/512GB flash storage/Intel Iris Plus Graphics /Magic Keyboard, 4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (18, 'MacBook Pro 2019 13-inch (Silver)', 2400, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'2.0GHz quad-core 10th-generation Intel Core i5/16GB 3733MHz memory/1TB flash storage/Intel Iris Plus Graphics /Magic Keyboard, 4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (19, 'MacBook Pro 2019 16-inch (Silver)', 2600, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'2.6GHz 6-core 9th-generation Intel Core i7/16GB 2666MHz memory/512GB flash storage/AMD Radeon Pro 5300M with 4GB memory /4 x ports Thunderbolt 3');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (20, 'MacBook Pro 2019 16-inch (Silver)', 2900, 10 ,'MacBookPro-2019-Silver.jpg', 1, 
'2.3GHz 8-core 9th-generation Intel Core i7/16GB 2666MHz memory/1TB flash storage/AMD Radeon Pro 5500M with 4GB memory /4 x ports Thunderbolt 3');
###########################################################################################

############################# IMacs ######################################################
INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (21, 'iMac 21.5-inch 2017', 1300, 5 ,'iMac-21inch.jpg', 2, 
'2.3GHz Intel Core i5 dual-core/8GB 2133Mhz Memory, 1TB Hard Drive/Intel Iris Plus Graphics 640/1920 x 1080 resolution');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (22, 'iMac 4K 21.5-inch 2019', 1600, 5 ,'iMac-4K.jpg', 2, 
'3.6GHz Intel Core i3 quad-core (8th generation)/8GB 2400Mhz Memory, 1TB Hard Drive/Radeon Pro 555X with 2GB video memory/Retina 4K 4096 x 2304 resolution');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (23, 'iMac 5K 27-inch 2019', 2200, 7 ,'iMac-5K.jpg', 2, 
'3.0GHz Intel Core i5 6-core (8th Generation)/8GB 2666Mhz Memory, 1TB Fusion Drive/Radeon Pro 570X with 4GB video memory/Retina 5K 5120 x 2880 resolution');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (24, 'iMac 5K 27-inch 2019', 2500, 11 ,'iMac-5K.jpg', 2, 
'3.1GHz Intel Core i5 6-core (8th Generation)/8GB 2666Mhz Memory, 1TB Fusion Drive/Radeon Pro 575X with 4GB video memory/Retina 5K 5120 x 2880 resolution');
###########################################################################################

#################################### Ipad ####################################################
INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (25, 'iPad Pro 11-inch 2020 (Wifi Only)', 900, 11 ,'iPadPro-11inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 11-inch (2388-by-1668-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 128GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (26, 'iPad Pro 11-inch 2020 (Wifi Only)', 1100, 11 ,'iPadPro-11inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 11-inch (2388-by-1668-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (27, 'iPad Pro 11-inch 2020 (Wifi Only)', 1300, 11 ,'iPadPro-11inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 11-inch (2388-by-1668-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 512GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (28, 'iPad Pro 11-inch 2020 (Wifi & Cellular)', 1000, 11 ,'iPadPro-11inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 11-inch (2388-by-1668-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 128GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (29, 'iPad Pro 11-inch 2020 (Wifi & Cellular)', 1200, 11 ,'iPadPro-11inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 11-inch (2388-by-1668-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (30, 'iPad Pro 11-inch 2020 (Wifi & Cellular)', 1400, 11 ,'iPadPro-11inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 11-inch (2388-by-1668-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 512GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (31, 'iPad Pro 12.9-inch 2020 (Wifi Only))', 1250, 11 ,'iPadPro-12inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 12.9-inch (2732-by-2048-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 128GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (32, 'iPad Pro 12.9-inch 2020 (Wifi Only))', 1450, 11 ,'iPadPro-12inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 12.9-inch (2732-by-2048-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (33, 'iPad Pro 12.9-inch 2020 (Wifi Only))', 1700, 11 ,'iPadPro-12inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 12.9-inch (2732-by-2048-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 512GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (34, 'iPad Pro 12.9-inch 2020 (Wifi Only))', 1400, 11 ,'iPadPro-12inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 12.9-inch (2732-by-2048-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 128GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (35, 'iPad Pro 12.9-inch 2020 (Wifi Only))', 1600, 11 ,'iPadPro-12inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 12.9-inch (2732-by-2048-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (36, 'iPad Pro 12.9-inch 2020 (Wifi Only))', 1800, 11 ,'iPadPro-12inch-2020.jpg', 3, 
'Chip A12Z Bionic with 64-bit architecture, Neural Engine, Embedded M12 coprocessor/Liquid Retina display: 12.9-inch (2732-by-2048-pixel), 600 nits brightness/Wide-Camera: 12-megapixel, Ultra-Wide Camera: 10-megapixel/Color: Silver, Space Gray/Capacity: 512GB');
##########################################################################################################

################################## Iphone ################################################
INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (37, 'iPhone SE 2020 (Black, White)', 500, 20 ,'iPhone-SE-2020-Black.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 4.7-inch Retina HD, Touch ID/Camera: 1 x 12MP (Wide Camera)/Capacity: 64GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (38, 'iPhone SE 2020 (Black, White)', 550, 25 ,'iPhone-SE-2020-Black.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 4.7-inch Retina HD, Touch ID/Camera: 1 x 12MP (Wide Camera)/Capacity: 128GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (39, 'iPhone SE 2020 (Black, White)', 700, 25 ,'iPhone-SE-2020-Black.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 4.7-inch Retina HD, Touch ID/Camera: 1 x 12MP (Wide Camera)/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (40, 'iPhone 11 Pro', 1200, 30 ,'iPhone11-Pro.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 5.8-inch Super Retina XDR, Face ID/Camera: 3 x Cameras 12MP (Wide + Ultra Wide + Telephoto)/Color: Space Gray, Silver, Midnight Green/Capacity: 64GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (41, 'iPhone 11 Pro', 1350, 30 ,'iPhone11-Pro.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 5.8-inch Super Retina XDR, Face ID/Camera: 3 x Cameras 12MP (Wide + Ultra Wide + Telephoto)/Color: Space Gray, Silver, Midnight Green/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (42, 'iPhone 11 Pro', 1450, 30 ,'iPhone11-Pro.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 5.8-inch Super Retina XDR, Face ID/Camera: 3 x Cameras 12MP (Wide + Ultra Wide + Telephoto)/Color: Space Gray, Silver, Midnight Green/Capacity: 512GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (43, 'iPhone 11 Pro Max', 1400, 30 ,'iPhone11-ProMax.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 6.5-inch Super Retina XDR, Face ID/Camera: 3 x Cameras 12MP (Wide + Ultra Wide + Telephoto)/Color: Space Gray, Silver, Midnight Green/Capacity: 64GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (44, 'iPhone 11 Pro Max', 1500, 30 ,'iPhone11-ProMax.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 6.5-inch Super Retina XDR, Face ID/Camera: 3 x Cameras 12MP (Wide + Ultra Wide + Telephoto)/Color: Space Gray, Silver, Midnight Green/Capacity: 256GB');

INSERT INTO products (product_id, product_name, price, quantity, image_uri, category_id, descript)
VALUES (45, 'iPhone 11 Pro Max', 1600, 30 ,'iPhone11-ProMax.jpg', 4, 
'Chip: A13 Bionic, 3rd Generation/Display: 6.5-inch Super Retina XDR, Face ID/Camera: 3 x Cameras 12MP (Wide + Ultra Wide + Telephoto)/Color: Space Gray, Silver, Midnight Green/Capacity: 512GB');


#populate users
INSERT INTO users (user_id, user_name, user_password, user_email) VALUES (1, 'Hien Le', 'Qpmz2711!', 'hienhydra11@gmail.com');