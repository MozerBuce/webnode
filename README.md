# Task for Candidates

## Requirements
Create a simple REST endpoint to process a GET request to retrieve order data by its identifier:

**GET** `/<identifier>/`

## Order Entity
The order entity must contain the following fields:
- **Identifier**
- **Creation date**
- **Name**
- **Amount**
- **Currency**
- **Status**

### Order Item Entity
The order item entity should contain:
- **Name**
- **Amount**

There is a **1:n relationship** between the order and the items. You can add more data if you find it convenient.

## Response Format
The response format is up to you. Consider how to handle multiple formats when designing the solution. Since you're working with REST, think about appropriate return codes.

## Database Requirements
Prepare loading of the order from a **MySQL database**. A working database is **not necessary** — just a test implementation will suffice. Ensure the solution allows for easy switching to different database engines (e.g., **Elastic**, **PostgreSQL**, etc.).

## Code Design
When designing the code, pay attention to:
- **Testability:** Ensure that your solution is testable.
- **Extensibility:** Keep it future-proof and maintainable.
- **Best Practices:** Show what you do best, how you think the code should look like, and demonstrate your development skills.

### Optional
You may include:
- Tests
- Use of various popular packages
- Docker setup
- Any other enhancements that showcase your expertise

There isn’t just one right solution. We are interested in seeing how you approach and solve the problem.


# Proposed Solution

## Project Structure with Descriptions

**WEBNODE**  
├── **config**  
│   └── **database.php** – Configuration file for setting up the database connection.  
├── **dbscript**  
│   └── **webnode.sql** – SQL script for creating and populating the database schema and tables.  
├── **public**  
│   └── **index.php** – Entry point of the application, handles the request.  
├── **src**  
│   ├── **Order.php** – Class representing the Order entity.  
│   ├── **OrderItem.php** – Class representing the Order Item entity.  
│   ├── **OrderRepository.php** – Repository class for database operations, controller.  
│   └── **ResponseFormatter.php** – Utility class for formatting API response.  
├── **tests**  
│   └── **ApiTest.php** – Test file containing unit tests for the API endpoints.  
├── **vendor** – Directory for third-party dependencies managed by Composer.  
├── **composer.json** – Configuration file for PHP dependencies and project metadata.  
├── **composer.lock** – File that locks the exact versions of Composer dependencies.  
└── **README.md** – Documentation file with project overview, setup instructions, and usage details, (this file).  

