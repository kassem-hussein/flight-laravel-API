### Laravel Flights API
Simple Flights-booking APi using laravel 

#### API Eendpoints

### Flights 
    GET : /flights -> get All flights 
    (
        ## QUERY PARAMS
        departure-date -> date
        departure-airport -> string
        arrival-ariport -> string
    )
    POST: /flights -> add new flight
    PUT: /flights/1 -> update flight where id = 1
    DELETE: /flights/1 -> delete flight where id =1
### Passengers
    GET:/passengers -> get all passengers 
    POST:/passengers -> add new passenger 
    PUT: /passengers/1 update passenger where id = 1
    DELETE: /passengers/1 delete passenger where id = 1
### Bookings
    GET: /bookings  -> get all passenger 
    (
        ## Query Params
        flight -> int id
    )
    POST:/bookings -> add new booking
    PUT :/bookings/1 -> update booking  where id = 1
    DELETE:/bookings/1 -> delete booking where id = 1
    POST : /bookings/1/children -> add booking children  where id = 1
    POST: /bookings/1/checkout  -> payment for booking where id = 1
### Payments
    GET: /payments -> get all payments (
        ## Query params 
        start-date  ->  date
        end-date    ->  date
    )
    GET : /payments/1 -> get payment where id = 1
    PUT : /payments/1 -> update payment where id = 1
    DELETE:/payments/1 -> delete payment where id = 1




