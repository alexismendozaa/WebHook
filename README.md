# Average Calculator Webhook

This webhook is a PHP script that calculates the average of a list of numbers sent via an HTTP POST request. It validates the input, performs the calculation, and returns the result in JSON format.

## Requirements
- XAMPP installed and running.
- Apache server active.
- PHP enabled (default in XAMPP).

## How to Use
1. Place the `promedio_webhook.php` file in the `C:\xampp\htdocs\` directory.
2. Start the Apache server via the XAMPP Control Panel.
3. Send a POST request to `http://localhost/promedio_webhook.php` with a JSON payload containing a key `"numeros"` and an array of numeric values.

### Example Request
```json
POST /promedio_webhook.php HTTP/1.1
Host: localhost
Content-Type: application/json

{
    "numeros": [10, 20, 30, 40, 50]
}
