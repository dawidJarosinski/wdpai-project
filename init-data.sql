create table categories
(
    id          serial
        primary key,
    description varchar(150) not null,
    name        varchar(100) not null
);

create table users
(
    id       serial
        primary key,
    email    varchar(100) not null,
    password varchar(100) not null,
    name     varchar(100) not null,
    surname  varchar(100) not null
);
create table posts
(
    id          serial
        primary key,
    category_id integer      not null
        references categories,
    title       varchar(150) not null,
    content     text         not null,
    author_id   integer      not null
        references users,
    created_at  timestamp default CURRENT_TIMESTAMP,
    image_path  varchar(255)
);

create table comments
(
    id         serial
        primary key,
    post_id    integer not null
        references posts,
    content    text    not null,
    author_id  integer not null
        references users,
    created_at timestamp default CURRENT_TIMESTAMP
);


INSERT INTO categories (id, description, name) VALUES
(1, 'Tutaj wstaw zdjęcie swojej największej zdobyczy.', 'Pochwal Się Rybą'),
(2, 'Informacje o nadchodzących zawodach i relacje z poprzednich.', 'Zawody Wędkarskie'),
(3, 'Udostępniaj porady dotyczące technik wędkarskich.', 'Porady i Wskazówki'),
(4, 'Rozmawiaj o wędkach, kołowrotkach i innych akcesoriach.', 'Sprzęt Wędkarski'),
(5, 'Dziel się najlepszymi miejscami na łowienie ryb.', 'Miejsca do Wędkowania');

INSERT INTO users(id, email, password, name, surname)
VALUES (1, 'test@test.pl', '$2a$12$shk30AgUF5S5pLG49MKmw.y6tP4jpMNQSn5zfeY.KcBZ535ax1qZ6', 'marek', 'wrld');

INSERT INTO posts(category_id, title, content, author_id, created_at, image_path)
VALUES (1, 'Mój rekordowy okoń', 'Wczoraj złowiłem rekordowego okonia. Był tak wielki, że ledwo zmieścił się na zdjęciu.', 1, '2021-01-01 12:00:00', 'images.jpg');