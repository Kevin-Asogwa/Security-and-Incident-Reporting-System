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
    nearest_landmark VARCHAR (255) NOT NULL,
    password1 VARCHAR (255) NOT NULL,
    password2 VARCHAR (255) NOT NULL
);

//fullname,registration_number,email,phone_number,date_of_birth,gender,campus,faculty,department,accomodation,hostel,room_number,lodge_location,lodge_name,nearest_landmark

CREATE TABLE INCIDENT (
date_and_time_of_incident DATETIME NOT NULL,
location_of_incident VARCHAR (255) NOT NULL,
type_of_incident VARCHAR (255) NOT NULL, 
description_of_incident VARCHAR (255) NOT NULL, 
witnesses VARCHAR (255) NOT NULL,
evidence VARCHAR (255) NOT NULL,
contact_information VARCHAR (255) NOT NULL, 
)
CREATE TABLE incident (
    incident_id INT AUTO_INCREMENT PRIMARY KEY,
    date_and_time_of_incident DATETIME,
    location_of_incident VARCHAR(255),
    type_of_incident VARCHAR(255),
    description_of_incident TEXT,
    witnesses VARCHAR(255),
    evidence VARCHAR(255),
    contact_information VARCHAR(255),
    fullname VARCHAR(255), 
    registration_number VARCHAR(255) 
);


//ADMIN
CREATE TABLE adminlogin (
id VARCHAR (100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
password VARCHAR (100) NOT NULL
)

//Security officer registration

CREATE TABLE security_officers (
    officer_id int (20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    fullname VARCHAR (255) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender VARCHAR (10) NOT NULL,
    email VARCHAR (255) NOT NULL,
    phone_number VARCHAR (255) NOT NULL,
    office_location VARCHAR (255) NOT NULL,
    department VARCHAR (255) NOT NULL,
    password1 VARCHAR (255) NOT NULL
   );


CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    incident_id INT (11),
    officer_id int (20),
    feedback_content TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (incident_id) REFERENCES incident(incident_id),
    FOREIGN KEY (officer_id) REFERENCES security_officers(officer_id)
);

CREATE TABLE messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    officer_id int (20) NOT NULL,
    registration_number VARCHAR (20)  NOT NULL,
    incident_id int (11)  NOT NULL,
    message_content TEXT NOT NULL,
    file_url VARCHAR(255) NULL,
    sender_type ENUM('officer', 'student') NOT NULL DEFAULT 'student';
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (officer_id) REFERENCES security_officers(officer_id),
    FOREIGN KEY (registration_number) REFERENCES students(registration_number),
    FOREIGN KEY (incident_id) REFERENCES incident(incident_id)
    );


