CREATE TABLE STUDENTS (
    fullname VARCHAR (255) NOT NULL,
    registration_number VARCHAR (20) PRIMARY KEY NOT NULL,
    email VARCHAR (255) NOT NULL,
    phone_number VARCHAR (255) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender VARCHAR (10) NOT NULL,
    campus VARCHAR (255) NOT NULL,
    faculty VARCHAR (255) NOT NULL,
    department VARCHAR (255) NOT NULL,
    accomodation VARCHAR (255) NOT NULL,
    hostel VARCHAR (255) NOT NULL,
    room_number int (7) NOT NULL,
    lodge_location VARCHAR (255) NOT NULL,
    lodge_name VARCHAR (255) NOT NULL,
    nearest_landmark VARCHAR (255) NOT NULL
);

//fullname,registration_number,email,phone_number,date_of_birth,gender,campus,faculty,department,accomodation,hostel,room_number,lodge_location,lodge_name,nearest_landmark