<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/OrderRepository.php';

// This class immplement the unitary test cases

class ApiTest extends TestCase
{

    // Test valid order with ID 1, testing the Success case
    public function testGetOrderByIdSuccess()
    {
        // Mock the OrderRepository class
        $mockRepository = $this->createMock(OrderRepository::class);

        // Define the return value for the mocked method
        $mockRepository->method('getOrderById')
            ->willReturn([
                'id' => 1,
                'name' => 'Order 1',
                'amount' => 100.00,
                'currency' => 'USD',
                'status' => 'pending',
                'creation_date' => '2025-02-10 00:00:00',
                'items' => [
                    ['name' => 'Item 1', 'amount' => 50.00],
                    ['name' => 'Item 2', 'amount' => 50.00],
                ]
            ]);

        // Simulate a GET request to the API endpoint
        $url = 'http://localhost/webnode/public/index.php?identifier=1';
        $response = file_get_contents($url);

        // Decode the JSON response
        $responseData = json_decode($response, true);

        // Assert the response structure to check  that the API's response contains the expected keys and that these keys have appropriate values
        $this->assertArrayHasKey('order', $responseData);
        $this->assertArrayHasKey('id', $responseData['order']);
        $this->assertArrayHasKey('name', $responseData['order']);
        $this->assertArrayHasKey('amount', $responseData['order']);
        $this->assertArrayHasKey('currency', $responseData['order']);
        $this->assertArrayHasKey('status', $responseData['order']);
        $this->assertArrayHasKey('creation_date', $responseData['order']);

        $this->assertArrayHasKey('items', $responseData);
        $this->assertGreaterThan(0, count($responseData['items']));
    }

    public function testOrderNotFound()
    {
        // Mock the OrderRepository class
        $mockRepository = $this->createMock(OrderRepository::class);

        // Mock the behavior to return null for any input
        $mockRepository->method('getOrderById')
            ->willReturn(null);

        // Directly testing the response logic without HTTP request
        $controller = new OrderRepository($mockRepository);
        $response = $controller->getOrderById(999);  // Assuming this method handles the request

        // Check that the response matches the expected error
        $this->assertEquals(['error' => 'Order not found'], $response);
    }


    // Test response format, ensuring it's always JSON case
    public function testResponseFormat() {
        // Simulate a GET request to the API endpoint with a valid identifier
        $url = 'http://localhost/webnode/public/index.php?identifier=1';
        $response = file_get_contents($url);

        // Check the Content-Type header is application/json
        $headers = get_headers($url, 1);
        // checks the headers format
        $this->assertEquals('application/json', $headers['Content-Type']);

        // Decode the JSON response
        $responseData = json_decode($response, true);

        // check whether the response is a valid JSON string
        $this->assertIsArray($responseData);
    }
}
