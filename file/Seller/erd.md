- User_DB

| Field        | Type         | Null |
| ------------ | ------------ | ---- |
| c_id         | int          | NO   |
| name         | varchar(255) | NO   |
| email        | varchar(255) | NO   |
| hash_pass    | varchar(255) | NO   |
| country      | text         | NO   |
| city         | text         | NO   |
| contact      | varchar(255) | NO   |
| address      | text         | NO   |
| image_loc    | varchar(255) | NO   |

- Admin op

| Field    | Type         | Null |
| -------- | ------------ | ---- |
| id       | int          | NO   |
| name     | varchar(255) | NO   |
| email    | varchar(255) | NO   |
| pass     | varchar(255) | NO   |
| image    | text         | NO   |
| contact  | varchar(255) | NO   |

- Products

| Field     | Type         | Null |
| --------- | ------------ | ---- |
| Prod_id   | int          | NO   |
| image_loc | text         | NO   |
| Title     | text         | NO   |
| Description | text       | NO   |
| Specs       | text       | NO   |
| Price       | Integer    | NO   |
| Hits        | Integer    | NO   |
| Buy_count   | Integer    | NO   |

- Cart

| Field     | Type         | Null |
| --------- | ------------ | ---- |
| c_id      | Integer      | NO   |
| Products  | Text         | NO   |
| Total     | Integer      | NO   |
| Coupons   | varchar      | YES  |

- Orders 

| Field        | Type      | Null |
|------------- | --------- | ---- |
| order_id     | int       | NO   |
| c_id         | int       | NO   |
| due_amount   | int       | NO   |
| invoice_no   | int       | NO   |
| Product_info | int       | NO   |
| Tracking_no  | varchar   | NO   |
| Delivery_dt  | timestamp | NO   |
| order_date   | timestamp | NO   |
| order_status | text      | NO   |
| Taxes        | Float     | NO   |
| Shipping     | Float     | NO   |
| Total        | Float     | NO   |

- Coupons 

| Field        | Type      | Null |
|------------- | --------- | ---- |
| Coupon_id    | int       | NO   |
| Coupon_txt   | text      | NO   |
| Discount_per | float     | NO   |
| Valid_date   | timestamp | NO   |
| Status       | Boolean   | NO   |

- Wishlist

| Field     | Type         | Null |
| --------- | ------------ | ---- |
| c_id      | Integer      | NO   |
| Products  | Text         | NO   |

- Sellers

| Field     | Type         | Null |
| --------- | ------------ | ---- |
| s_id      | Integer      | NO   |
| s_name    | varchar      | NO   |
| s_mail    | varchar      | NO   |
| s_pass    | HASH         | NO   |
| Address   | text         | NO   |
| Phone     | Integer      | NO   |
| zip_code  | integer      | NO   |
| Images    | text         | NO   |
| Status    | varchar      | NO   |
| revenue   | Integer      | NO   |
| Rating    | Float        | NO   |
| Orders    | Integer      | NO   |

- Marketing
 
| Field      | Type         | Null |
| ---------- | ------------ | ---- |
| Product_id | Integer      | NO   |
| Track_id   | Integer      | NO   |
| Hits       | Integer      | NO   |
| Source     | text         | NO   |


- Promotions
 
| Field       | Type         | Null |
| ----------- | ------------ | ---- |
| Promo_id    | Integer      | NO   |
| Title       | text         | NO   |
| Description | text         | NO   |
| Target_cat  | text         | NO   |
| Images      | text         | NO   |


