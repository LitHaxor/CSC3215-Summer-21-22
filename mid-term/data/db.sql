CREATE database ecms;


CREATE TABLE users (
    id int AUTO_INCREMENT ,
    username varchar(20) NOT NULL unique,
    password varchar(20) NOT NULL,
    email varchar(20) NOT NULL,
    image varchar(20),
    phone varchar(11) NOT NULL,
    gender varchar(20),
    role varchar(10) DEFAULT "user",
    address varchar(30),
    PRIMARY KEY(id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp ON UPDATE CURRENT_TIMESTAMP
)

CREATE TABLE stores (
    id int AUTO_INCREMENT ,
    name varchar(20) NOT NULL,
    address varchar(20) NOT NULL,
    phone varchar(11) NOT NULL,
    image varchar(20),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),

)


CREATE TABLE products (
    id int AUTO_INCREMENT,
    name varchar(20),
    price float(4),
    image varchar(20),
    discount_price float(4),
    description LONGTEXT,
    sold int(4),
    features LONGTEXT,
    stock int(3),
    user_id int NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT FK_product_creator FOREIGN KEY (user_id)
    REFERENCES users(id)
)   

CREATE TABLE orders (
    id int AUTO_INCREMENT, 
    customer_name varchar(20) NOT NULL,
    customer_phone varchar(11) NOT NULL,
    address LONGTEXT NOT NULL,
    total float(5) NOT NULL,
    sub_total float(5) NOT NULL,
    status float(5) NOT NULL,
    discount float(5) NOT NULL,
    user_id int NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT FK_order_creator FOREIGN KEY (user_id)
    REFERENCES users(id)
)


CREATE TABLE order_items (
    id int AUTO_INCREMENT NOT NULL,
    quantity int(4) NOT NULL,
    unit_price float(5) NOT NULL,
    total_price float(5) NOT NULL,
    product_id int NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT FK_order_item FOREIGN KEY (product_id)
    REFERENCES products(id)
)

CREATE TABLE payments (
    id int AUTO_INCREMENT NOT NULL,
    total float(5) NOT NULL,
    tax float(5) NOT NULL,
    order_id int NOT NULL,
    user_id int NOT NULL,
    method varchar(10) NOT NULL,
    status varchar(10) NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT FK_order_payment FOREIGN KEY(order_id)
    REFERENCES orders(id),
    CONSTRAINT FK_customer_payment FOREIGN KEY(user_id)
    REFERENCES users(id)
)