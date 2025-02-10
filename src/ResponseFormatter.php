<?php

// This class is responsible for formatting the response

class ResponseFormatter {
    
    public static function formatOrderResponse($order) {
        return [
            'order' => [
                'id' => $order['id'],
                'name' => $order['name'],
                'amount' => $order['amount'],
                'currency' => $order['currency'],
                'status' => $order['status'],
                'creation_date' => $order['creation_date'],
            ],
            'items' => $order['items']
        ];
    }
}
