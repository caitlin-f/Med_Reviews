/*
source /Users/Caitlin/Sites/med_reviews/private/sql_scripts/INSERT_SQL.sql;
*/
# Pharmacist
INSERT INTO Pharmacist (FirstName, LastName, RegistrationNumber, RegistrationExpiry, AccreditationNumber, AccreditationExpiry, Phone) VALUES ('Terry', 'Tidmore', '8798797347', '2018-09-30', '2097878','2018-06-09', 049898989);
INSERT INTO Pharmacist (FirstName, LastName, RegistrationNumber, RegistrationExpiry, AccreditationNumber, AccreditationExpiry, Phone) VALUES ('Geoffrey', 'Cosentino','8404803489', '2018-09-30','2089898', '2019-03-13', 0498674865);
INSERT INTO Pharmacist (FirstName, LastName, RegistrationNumber, RegistrationExpiry, AccreditationNumber, AccreditationExpiry, Phone) VALUES ('Lyle', 'Clavette','8937493030','2018-09-30','9553934', '2018-09-11', 0498954654);
INSERT INTO Pharmacist (FirstName, LastName, RegistrationNumber, RegistrationExpiry, AccreditationNumber, AccreditationExpiry, Phone) VALUES ('Cleaveland', 'Littleton', '6490280850', '2018-09-30', '9845372' ,'2018-08-25', 0424585649);
INSERT INTO Pharmacist (FirstName, LastName, RegistrationNumber, RegistrationExpiry, AccreditationNumber, AccreditationExpiry, Phone) VALUES ('Chairmain', 'Griggs', '7493058603', '2018-09-30','8508090','2019-04-30', 0492723542);
# Clinic
INSERT INTO Clinic (Name, ManagerFirstName, ManagerLastName, Email, Phone, StreetAddress, Suburb, State, PostCode) VALUES ('Brisbane Central Medical Center', 'Larry', 'John', 'BCmedcent@gmail.com', 0732363409,'198-202 Adelaide St','Brisbane', 'QLD', 4000);
INSERT INTO Clinic (Name, ManagerFirstName, ManagerLastName, Email, Phone, StreetAddress, Suburb, State, PostCode) VALUES ('Bribane Clinic', 'Amenda', 'Lot', 'brisbaneclinic@gmail.com', 0732704555, '79 Whickham Terrace', 'Brisbane', 'QLD', 4000);
INSERT INTO Clinic (Name, ManagerFirstName, ManagerLastName, Email, Phone, StreetAddress, Suburb, State, PostCode) VALUES ('Morkare Natural Clinic', 'Joice', 'Sing', 'morkaranaturaclinic@gmail.com',0732265987, '89 Clark Street', 'South Brisbane', 'QLD', 4102);
INSERT INTO Clinic (Name, ManagerFirstName, ManagerLastName, Email, Phone, StreetAddress, Suburb, State, PostCode) VALUES ('Cannon Hill Family Doctors', 'James', 'Andrews', 'cannonhillfamilydoctors@gmail.com', 0731613225, '17/1177 Wynnum road', 'Cannon Hill', 'QLD', 4170);
INSERT INTO Clinic (Name, ManagerFirstName, ManagerLastName, Email, Phone, StreetAddress, Suburb, State, PostCode) VALUES ('Malo Clinic Brisbane', 'Mark', 'Long', 'maloclinicbrisbane@gmail.com', 0732299333, 'level 4/106 Edward Street', 'Brisbane', 'QLD', 4000);
# Residents
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Mavis', 'Brown', '40011111110', '1910-01-01');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('John', 'Smith', '40022222220', '1920-02-02');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Jack', 'Masters', '40033333330', '1930-03-03');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Lyla', 'Sands', '40044444440', '1915-04-04');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Beth', 'Royal', '40055555550', '1925-05-05');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Cerys', 'Lloyd', '40066666660', '1916-12-01');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Kendall', 'Nicholson', '40077777770', '1935-07-11');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Anna-Marie', 'Hamilton', '400888888880', '1928-04-05');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Milan', 'Bateman', '40099999990', '1927-10-09');
INSERT INTO Residents (FirstName, LastName, Medicare, DOB) VALUES ('Travis', 'Driscoll', '40012121210', '1922-05-23');
# Facility
INSERT INTO Facility VALUES (1111,'Regis', 'Regis Yeronga', '0733887088', 200, 'yeronga@regis.com', 'FirstName', 'LastName', '1 Facility St', 'Yeronga', 'QLD', 4103);
INSERT INTO Facility VALUES (2222,'Regis', 'Regis Bulimba', '0733896500', 150, 'bulimba@regis.com', 'FirstName', 'LastName', '2 Facility St', 'Bulimba', 'QLD', 4002);
INSERT INTO Facility VALUES (3333,'Bolton Clarke', 'Milford Grange', '0733896500', 150, 'milford@boltonclarke.com', 'FirstName', 'LastName', '3 Facility St', 'Eastern Heights', 'QLD', 4403);
INSERT INTO Facility VALUES (4444,'Churches of Christ', 'Milford Grange', '0733896500', 80, 'milford@boltonclarke.com', 'FirstName', 'LastName', '4 Facility St', 'Eastern Heights', 'QLD', 4403);
INSERT INTO Facility VALUES (5555,'Churches of Christ', 'Bribie Island Aged Care', '0738886577', 80, 'bribie@cofc.com', 'FirstName', 'LastName', '5 Facility St', 'Bongaree', 'QLD', 4507);
# Medications
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Frusemide', 'Diuretic', '40mg');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Diltiazem', 'Calcium Channel Blocker', '180mg');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Risperidone', 'Antipsychotic', '500mcg');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Buprenorphine', 'Opioid', '5mcg/h');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Morphine', 'Opioid', '5mg/ml');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Irbesartan', 'ACE Inhibitor', '150mg');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Aspirin', 'NSAID', '100mg');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Risperidone', 'Antipsychotic', '37.5mg');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Metoclopramide', 'Antiemetic', '5mg/ml');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Insulin Glargine', 'Insulin', '100u/ml');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Insulin Aspart', 'Insulin', '100u/ml');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Diclofenac', 'NSAID', '1%');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Fentanyl', 'Opioid', '12.5mcg/h');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Fentanyl', 'Opioid', '25mcg/h');
INSERT INTO Medications (GenericName, Class, Strength) VALUES ('Rivastigmine', 'Anticholinesterase', '4.6mg/24h');
# Diagnoses
INSERT INTO Diagnoses VALUES ('Diabetes');
INSERT INTO Diagnoses VALUES ('Congestive Cardiac Failure');
INSERT INTO Diagnoses VALUES ('Hypertension');
INSERT INTO Diagnoses VALUES ('Dementia');
INSERT INTO Diagnoses VALUES ("Parkinson's Disease");
# Oral
INSERT INTO Oral (Formulation, MedID) VALUES ('Tablet', 1);
INSERT INTO Oral (Formulation, MedID) VALUES ('SR Capsule', 2);
INSERT INTO Oral (Formulation, MedID) VALUES ('Wafer', 3);
INSERT INTO Oral (Formulation, MedID) VALUES ('Tablet', 6);
INSERT INTO Oral (Formulation, MedID) VALUES ('Tablet', 7);
# Injectable
INSERT INTO Injectable (Administration, MedID) VALUES ('SC', 5);
INSERT INTO Injectable (Administration, MedID) VALUES ('IM', 5);
INSERT INTO Injectable (Administration, MedID) VALUES ('IV', 9);
INSERT INTO Injectable (Administration, MedID) VALUES ('SC', 10);
INSERT INTO Injectable (Administration, MedID) VALUES ('SC', 11);
# Topical
INSERT INTO Topical (Formulation, MedID) VALUES ('Patch', 4);
INSERT INTO Topical (Formulation, MedID) VALUES ('Gel', 12);
INSERT INTO Topical (Formulation, MedID) VALUES ('Patch', 13);
INSERT INTO Topical (Formulation, MedID) VALUES ('Patch', 14);
INSERT INTO Topical (Formulation, MedID) VALUES ('Patch', 15);
# Doctors
INSERT INTO Doctors (ClinicID, FirstName, LastName, ProviderNumber, PersonalEmail) VALUES (1,'Mary', 'Fields', '379308404', 'MaryFields@gmail.com');
INSERT INTO Doctors (ClinicID, FirstName, LastName, ProviderNumber, PersonalEmail) VALUES (2, 'Don', 'Pho', '849290402', 'donpho@gmail.com');
INSERT INTO Doctors (ClinicID, FirstName, LastName, ProviderNumber, PersonalEmail) VALUES (3, 'Jeffery', 'Wright', '683940384', 'jefferywright@gmail.com');
INSERT INTO Doctors (ClinicID, FirstName, LastName, ProviderNumber, PersonalEmail) VALUES (4, 'Eve', 'Shawn', '739204840', 'eveshawn@gmail.com');
INSERT INTO Doctors (ClinicID, FirstName, LastName, ProviderNumber, PersonalEmail) VALUES (5, 'Larry', 'King', '6483937493', 'larryking@gmail.com');
# Review
INSERT INTO Review (DoctorID, PharmID, ResidentID, ReferralDate, ReviewDate) VALUES (1,1,1,'2018-04-01','2018-04-11');
INSERT INTO Review (DoctorID, PharmID, ResidentID, ReferralDate, ReviewDate) VALUES (2,2,2,'2018-04-02','2018-04-12');
INSERT INTO Review (DoctorID, PharmID, ResidentID, ReferralDate, ReviewDate) VALUES (3,3,3,'2018-04-03','2018-04-13');
INSERT INTO Review (DoctorID, PharmID, ResidentID, ReferralDate, ReviewDate) VALUES (4,4,4,'2018-04-04','2018-04-14');
INSERT INTO Review (DoctorID, PharmID, ResidentID, ReferralDate, ReviewDate) VALUES (5,5,5,'2018-04-05','2018-04-15');
# ResidentRx
INSERT INTO ResidentRx VALUES (1,6,'Daily','1');
INSERT INTO ResidentRx VALUES (1,2,'Daily','2');
INSERT INTO ResidentRx VALUES (1,10,'Nocte','10u');
INSERT INTO ResidentRx VALUES (2,10,'Nocte','4u');
INSERT INTO ResidentRx VALUES (2,11,'TDS','2u');
INSERT INTO ResidentRx VALUES (2,15,'Mane','1');
INSERT INTO ResidentRx VALUES (2,3,'Nocte','1');
INSERT INTO ResidentRx VALUES (3,15,'Mane','1');
INSERT INTO ResidentRx VALUES (3,3,'BD','1');
INSERT INTO ResidentRx VALUES (4,1,'Mane','1');
INSERT INTO ResidentRx VALUES (4,6,'Mane','1');
INSERT INTO ResidentRx VALUES (4,7,'Mane','1');
INSERT INTO ResidentRx VALUES (5,15,'Mane','1');
INSERT INTO ResidentRx VALUES (5,1,'BD','1');
INSERT INTO ResidentRx VALUES (5,6,'Mane','1');
INSERT INTO ResidentRx VALUES (5,7,'Mane','1');
# Resident Home
INSERT INTO ResidentHome VALUES (1,1111,'2018-04-01');
INSERT INTO ResidentHome VALUES (2,1111,'2018-04-02');
INSERT INTO ResidentHome VALUES (3,2222,'2018-04-01');
INSERT INTO ResidentHome VALUES (4,2222,'2018-04-02');
INSERT INTO ResidentHome VALUES (5,3333,'2018-04-01');
INSERT INTO ResidentHome VALUES (6,3333,'2018-04-01');
INSERT INTO ResidentHome VALUES (7,3333,'2018-04-01');
INSERT INTO ResidentHome VALUES (8,3333,'2018-04-01');
INSERT INTO ResidentHome VALUES (9,1111,'2018-04-01');
INSERT INTO ResidentHome VALUES (10,2222,'2018-04-01');
# ResidentDx
INSERT INTO ResidentDx VALUES (1, 'Hypertension');
INSERT INTO ResidentDx VALUES (1, 'Diabetes');
INSERT INTO ResidentDx VALUES (2, 'Diabetes');
INSERT INTO ResidentDx VALUES (2, 'Dementia');
INSERT INTO ResidentDx VALUES (3, 'Dementia');
INSERT INTO ResidentDx VALUES (3, "Parkinson's Disease");
INSERT INTO ResidentDx VALUES (4, 'Hypertension');
INSERT INTO ResidentDx VALUES (4, 'Congestive Cardiac Failure');
INSERT INTO ResidentDx VALUES (5, 'Dementia');
INSERT INTO ResidentDx VALUES (5, 'Congestive Cardiac Failure');
# Recommendations