# Project Name  
**JobIQ – Smart Resume Matcher**

## Objective  
Create a web application that:

- Parses resumes in PDF/DOCX  
- Extracts structured information (skills, experience, education, etc.)  
- Matches resumes against real-world job postings  
- Ranks matches using AI-based semantic similarity 

### To run this Dockerized PHP Slim app

1. Copy the dockerfile 

`$ cp docker-compose.yml.dist docker-compose.yml`

2. Install Composer dependencies 

`$ composer install`

3. Run Docker

`$ docker-compose up -d`

#### Routes
Endpoints available in ServiceProvider/AppProvider.php
