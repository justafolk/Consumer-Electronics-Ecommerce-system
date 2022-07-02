CREATE TABLE UserDB
(
  c_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  hash_pass VARCHAR(255) NOT NULL,
  country VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  contact INT NOT NULL,
  address VARCHAR(255) NOT NULL,
  image_loc text NOT NULL,
  PRIMARY KEY (c_id),
  UNIQUE (email)
);

CREATE TABLE AdminDB
(
  admin_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  image_loc VARCHAR(255) NOT NULL,
  contact INT NOT NULL,
  PRIMARY KEY (admin_id),
  UNIQUE (email)
);

CREATE TABLE ProductDB
(
  Prod_id INT NOT NULL,
  image_loc VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  Description CHAR(20000) NOT NULL,
  Specs CHAR(20000) NOT NULL,
  price INT NOT NULL,
  Hits INT NOT NULL,
  Buy_count INT NOT NULL,
  PRIMARY KEY (Prod_id)
);

CREATE TABLE Coupons
(
  Coupon_id INT NOT NULL,
  Coupon_text VARCHAR(255) NOT NULL,
  Discount_percentage FLOAT NOT NULL,
  Valid_date DATE NOT NULL,
  Status VARCHAR(255) NOT NULL,
  PRIMARY KEY (Coupon_id)
);

CREATE TABLE Wishlist
(
  w_id INT NOT NULL,
  c_id INT NOT NULL,
  Prod_id INT NOT NULL,
  FOREIGN KEY (c_id) REFERENCES UserDB(c_id),
  FOREIGN KEY (Prod_id) REFERENCES ProductDB(Prod_id)
);

CREATE TABLE SellerDB
(
  s_id INT NOT NULL,
  s_name VARCHAR(255) NOT NULL,
  s_mail VARCHAR(255) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  Address CHAR(1024) NOT NULL,
  Phone DATE NOT NULL,
  zip_code INT NOT NULL,
  Image VARCHAR(1024) NOT NULL,
  Status VARCHAR(255) NOT NULL,
  revenue FLOAT NOT NULL,
  Ratings FLOAT NOT NULL,
  Orders INT NOT NULL,
  PRIMARY KEY (s_id, s_mail)
);

CREATE TABLE Marketing
(
  Track_ID INT NOT NULL,
  Hits INT NOT NULL,
  Source VARCHAR(255) NOT NULL,
  Prod_id INT NOT NULL,
  PRIMARY KEY (Track_ID),
  FOREIGN KEY (Prod_id) REFERENCES ProductDB(Prod_id)
);

CREATE TABLE Cart
(
  Products_enc VARCHAR(1024) NOT NULL,
  Total INT NOT NULL,
  Coupons INT NOT NULL,
  c_id INT NOT NULL,
  Prod_id INT NOT NULL,
  Coupon_id INT NOT NULL,
  FOREIGN KEY (c_id) REFERENCES UserDB(c_id),
  FOREIGN KEY (Prod_id) REFERENCES ProductDB(Prod_id),
  FOREIGN KEY (Coupon_id) REFERENCES Coupons(Coupon_id)
);

CREATE TABLE Orders
(
  order_id INT NOT NULL,
  Grand_total INT NOT NULL,
  invoice_no INT NOT NULL,
  Product_enc INT NOT NULL,
  TrackingID VARCHAR(255) NOT NULL,
  Delivery_Date DATE NOT NULL,
  Order_Date DATE NOT NULL,
  Order_status VARCHAR(255) NOT NULL,
  Taxes FLOAT NOT NULL,
  Shipping_cost FLOAT NOT NULL,
  c_id INT NOT NULL,
  Prod_id INT NOT NULL,
  s_id INT NOT NULL,
  s_mail VARCHAR(255) NOT NULL,
  PRIMARY KEY (order_id, invoice_no),
  FOREIGN KEY (c_id) REFERENCES UserDB(c_id),
  FOREIGN KEY (Prod_id) REFERENCES ProductDB(Prod_id),
  FOREIGN KEY (s_id, s_mail) REFERENCES SellerDB(s_id, s_mail)
);