# База данных кинотеатра

## users

- id
- login
- password_hash
- is_admin
- created_at
- updated_at


## movies

- id
- name
- description
- poster_url
- date_from
- date_to
- created_at
- updated_at


## movie_halls

- id
- number
- created_at
- updated_at


## hall_rows

- id
- number
- movie_hall_id ← [movie_halls](#movie_halls).id
- created_at
- updated_at


## places

- id
- hall_row_id ← [hall_rows](#hall_rows).id
- number
- offset
- created_at
- updated_at


## reservation

- id
- user_id ← [users](#users).id
- place_id ← [places](#places).id
- status_id ← [reservation_statuses](#reservation_statuses).id
- session_id ← [sessions](#sessions).id
- created_at
- updated_at


## reservation_statuses

- id
- name

 id |    name
----|--------
 1  | выбрано
 2  | забронировано
 3  | оплачено
 
 
## sessions
 
- id
- movie_id ← [movies](#movies).id
- hall_id ← [movie_halls](#movie_halls).id
- time
- tariff_id ← [tariffs](#tariffs).id
- created_at
- updated_at
 
 
## tariffs
 
- id
- name
- price
- created_at
- updated_at