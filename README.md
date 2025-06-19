# Project Name  
**JobIQ – Smart Resume Matcher**

## Objective  
Create a web application that:

- Parses resumes in PDF/DOCX  
- Extracts structured information (skills, experience, education, etc.)  
- Matches resumes against real-world job postings  
- Ranks matches using AI-based semantic similarity 

### To run this Dockerized PHP Slim app

#### Copy the dockerfile 

`$ cp docker-compose.yml.dist docker-compose.yml`

#### Install Composer dependencies 

`$ composer install`

#### Run Docker

`$ docker-compose up -d`

#### Routes
Endpoints available in ServiceProvider/AppProvider.php
