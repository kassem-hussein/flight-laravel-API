# Laravel Flights API
Simple Flights-booking APi using laravel 



## Routes Description

### Authentication and User
- **Route**: `/user`
- **Method**: `GET`
- **Description**: Retrieves the authenticated user's details.
- **Middleware**: `auth:sanctum`

---

### Flights Management
- **Prefix**: `/flights`
- **Controller**: `FlightController`

| HTTP Method | Route            | Action     | Description                    |
|-------------|------------------|------------|--------------------------------|
| GET         | `/flights`       | `index`    | Retrieve a list of all flights. |
| POST        | `/flights`       | `store`    | Add a new flight.              |
| GET         | `/flights/{flight}` | `show` | Retrieve details of a specific flight. |
| PUT         | `/flights/{flight}` | `update` | Update a specific flight's details. |
| DELETE      | `/flights/{flight}` | `destroy`| Delete a specific flight.     |

---

### Passengers Management
- **Prefix**: `/passengers`
- **Controller**: `PassengerController`

| HTTP Method | Route               | Action     | Description                    |
|-------------|---------------------|------------|--------------------------------|
| GET         | `/passengers`       | `index`    | Retrieve a list of all passengers. |
| POST        | `/passengers`       | `store`    | Add a new passenger.          |
| GET         | `/passengers/{passenger}` | `show` | Retrieve details of a specific passenger. |
| PUT         | `/passengers/{passenger}` | `update` | Update a specific passenger's details. |
| DELETE      | `/passengers/{passenger}` | `destroy`| Delete a specific passenger. |

---

### Bookings Management
- **Prefix**: `/bookings`
- **Controller**: `BookingController`

| HTTP Method | Route                    | Action         | Description                       |
|-------------|--------------------------|----------------|-----------------------------------|
| GET         | `/bookings`              | `index`        | Retrieve a list of all bookings.  |
| POST        | `/bookings`              | `store`        | Add a new booking.                |
| POST        | `/bookings/{booking}/children` | `addChildren`| Add children to a booking.        |
| POST        | `/bookings/{booking}/checkout` | `checkout`   | Process checkout for a booking.   |
| GET         | `/bookings/{booking}`    | `show`         | Retrieve details of a specific booking. |
| PUT         | `/bookings/{booking}`    | `update`       | Update a specific booking's details. |
| DELETE      | `/bookings/{booking}`    | `destroy`      | Delete a specific booking.        |

---

### Payments Management
- **Prefix**: `/payments`
- **Controller**: `PaymentsController`

| HTTP Method | Route           | Action     | Description                    |
|-------------|-----------------|------------|--------------------------------|
| GET         | `/payments`     | `index`    | Retrieve a list of all payments. |
| PUT         | `/payments`     | `update`   | Update payment information.    |
| GET         | `/payments/{payment}` | `show` | Retrieve details of a specific payment. |
| DELETE      | `/payments/{payment}` | `destroy` | Delete a specific payment.    |

---

### Notes:
1. All route methods are organized under respective controllers for better structure and maintainability.
2. The use of middleware such as `auth:sanctum` ensures secure access to authenticated routes.




