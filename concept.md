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

### Job 
- id (Integer)
- company_id (Integer)
- user_id(Integer)
- title (String)
- description (Text)
- min_salary
- max_salary
- location

- contact_phone(String)
- contact_email(String)
- contact_name(String)
- tags (List/Array/JSON)
- is_active (boolean)
- expires_at (String)
- created_at (Timestamp)
- updated_at (Timestamp)



### Company
- id (Integer)
- user_id (Integer)
- name (String)
- description (Text)
- city (String)
- street
- zip-code
- Country
- email (String)
- website (String)
- phone (String)
- employee_size (Enum ["<10", "10-50", ">50", "50-100", ">100", ">500"]) 
- tags (List/Array/Text-JSON)
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
- password(String)
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
