<?php
require_once 'Order.php';
require_once 'OrderItem.php';
require_once __DIR__ . '/../config/database.php';

// This class is responsible for database operations related to Order entities.

class OrderRepository
{

    private $db;

    // Initialize connection using Database class
    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    //  Function to Fetch the order based on the id
    public function getOrderById($id)
    {

        // Selecting data based on the id from the table orders
        $query = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        // In case no data is found
        if (!$order) {
            return ['error' => 'Order not found'];
        }

        // Fetching the order items related to the given order id
        $itemsQuery = "SELECT * FROM order_items WHERE order_id = ?";
        $stmt = $this->db->prepare($itemsQuery);
        $stmt->execute([$id]);
        $order['items'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // return the data
        return $order;
    }
}
