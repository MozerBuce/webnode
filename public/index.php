<?php
require_once '../config/database.php';
require_once '../src/OrderRepository.php';
require_once '../src/ResponseFormatter.php';

// Set the response Content-Type to JSON
header('Content-Type: application/json');

// Check if identifier is provided and not empty
if (empty($_GET['identifier'])) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Identifier is required']);
    exit;
}

// retrieve the value of the identifier query parameter from the URL
$identifier = $_GET['identifier'];

// Check if identifier is an integer and greater than or equal to 1
if (!filter_var($identifier, FILTER_VALIDATE_INT) || $identifier < 1) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Identifier must be a positive integer greater than 0']);
    exit;
}

$orderRepository = new OrderRepository();
$order = $orderRepository->getOrderById($identifier);

// Check if the order was found
if (!$order) {
    header('HTTP/1.1 404 Not Found');
    echo json_encode(['error' => 'Order not found']);
    exit;
}

// If the order is found, format and return the response
$response = ResponseFormatter::formatOrderResponse($order);
echo json_encode($response);
