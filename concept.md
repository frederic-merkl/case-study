## Konzept

Der User repräsentiert in diesem Konzept einen Administrator, der alle Modelle vollständig verwalten kann.


## Sitemap

/jobs  
/jobs/id  
/jobs/create  
/jobs/id/edit  

/companies  
/companies/id  
/companies/create  
/companies/id/edit  

/categories  
/categories/id  
/categories/create  
/categories/id/edit  

/users  
/users/id  
/users/create  
/users/id/edit  


## Modelle und Attribute

### Job // konflikt mit interner jobs table. => job_listings // add user_id
- id (Integer)
- company_id (Integer)
- user_id(Integer)
- title (String)
- description (Text)
- contact_phone(String)
- contact_email(String)
- contact_name(String)
- tags (List/Array/JSON)
- created_at (Timestamp)
- updated_at (Timestamp)

### Company
- id (Integer)
- name (String)
- description (Text)
- city (String) // ändern zu city, Adressedaten zu einzelnen Feldern machen, street, zip-code, 			Country
- email (String)
- employee_size (Enum ["<10", "10-50", ">50", "50-100", ">100", ">500"]) // wurde erweitert, passe Konzept an
- tags (List/Array/Text-JSON) // typ wird zu text und serialisiert, laravel hat auto cast
- created_at (Timestamp)
- updated_at (Timestamp)

### Category
- id (Integer)
- name (String)
- created_at (Timestamp)
- updated_at (Timestamp)

### User
- id (Integer)
- name (String)
- email (String)
- created_at (Timestamp)
- updated_at (Timestamp)


## Beziehungen

Company 1 -------- 0..* Job  
Job 1..* -------- 0..* Category  
User 1 -------- 0..* Job  
User 1 -------- 0..* Company  


## User-Rechte

- User dürfen Jobs anzeigen, erstellen, bearbeiten und löschen  
- User dürfen Companies anzeigen, erstellen, bearbeiten und löschen  
- User dürfen Categories anzeigen, erstellen, bearbeiten und löschen  
