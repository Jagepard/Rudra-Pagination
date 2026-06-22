# Rudra-Pagination | [API](https://github.com/Jagepard/Rudra-Pagination/blob/master/docs.md "Documentation API")

A simple, lightweight, and transparent pagination component. True to the Rudra philosophy: no magic, no hidden dependencies, just pure math for calculating SQL offsets and page links.

## Installation

```bash
composer require rudra/pagination
```
## Usage
The component accepts three parameters: the current page number, items per page, and the total count of records. It safely casts string inputs to int, making it easy to use with $_GET parameters.
```php
<?php

use Rudra\Pagination;

// Parameters: current page, items per page, total items count
$pagination = new Pagination(
    value: 3,    // Current page
    perPage: 10, // Items per page (LIMIT)
    count: 95    // Total records in database
);

// 1. Get SQL OFFSET
$pagination->getOffset();  
// int(20) -> calculated as (3 - 1) * 10

// 2. Get SQL LIMIT
$pagination->getPerPage(); 
// int(10)

// 3. Get array of page numbers for rendering links
$pagination->getLinks();   
// array(10) [1, 2, 3, 4, 5, 6, 7, 8, 9, 10] 
// (ceil(95 / 10) = 10 pages)
```
## Real-world Example
Here is how you might use it in a controller or repository to fetch data and render pagination:
```php
<?php

// 1. Get raw data
$page    = $_GET['page'] ?? 1;
$perPage = 20;
$count   = $db->query("SELECT COUNT(*) FROM articles")->fetchColumn();

// 2. Initialize Pagination
$pagination = new Pagination($page, $perPage, $count);

// 3. Fetch records using calculated OFFSET and LIMIT
$articles = $db->query(
    "SELECT * FROM articles LIMIT {$pagination->getPerPage()} OFFSET {$pagination->getOffset()}"
)->fetchAll();

// 4. Get page numbers to render <ul> in your template
$pages = $pagination->getLinks(); 
```
## License

This project is licensed under the **Mozilla Public License 2.0 (MPL-2.0)** — a free, open-source license that:

- Requires preservation of copyright and license notices,
- Allows commercial and non-commercial use,
- Requires that any modifications to the original files remain open under MPL-2.0,
- Permits combining with proprietary code in larger works.

📄 Full license text: [LICENSE](./LICENSE)  
🌐 Official MPL-2.0 page: https://mozilla.org/MPL/2.0/
