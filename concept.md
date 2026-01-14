## Konzept

Der User repräsentiert in diesem Konzept einen Administrator (oder registrierten Nutzer), der nach dem Login Modelle verwalten kann.


## Sitemap

### Public
/login (GET)
/login (POST)

### Protected (Auth)
/logout (POST) - (Redirect nach /login)

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

### Job (job_listings)
- id (Integer)
- company_id (Integer, FK)
- user_id (Integer, FK)
- title (String)
- description (Text)
- min_salary (String)
- max_salary (String)
- location (String)
- website (String)
- contact_phone (String)
- contact_email (String)
- contact_name (String)
- tags (Text/JSON -> casts)
- is_active (boolean)
- expires_at (Date)
- created_at (Timestamp)
- updated_at (Timestamp)

### Company
- id (Integer)
- user_id (Integer, FK)
- name (String, Unique)
- description (Text)
- city (String)
- street (String)
- zip_code (String)
- country (String)
- email (String, Unique)
- website (String)
- phone (String)
- employee_size (Enum ["<10", "10-50", "50-100", ">100", ">500"]) 
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
- password (String)
- created_at (Timestamp)
- updated_at (Timestamp)

### Pivot (category_job)
- job_id (FK)
- category_id (FK)


## Beziehungen

Company 1 -------- 0..* Job  
Job 0..* -------- 0..* Category (via Pivot)  
User 1 -------- 0..* Job  
User 1 -------- 0..* Company  


## User-Rechte

- **Authentifizierung:** Login für Verwaltung erforderlich.
- User dürfen Jobs anzeigen, erstellen, bearbeiten und löschen  
- User dürfen Companies anzeigen, erstellen, bearbeiten und löschen  
- User dürfen Categories anzeigen, erstellen, bearbeiten und löschen  
