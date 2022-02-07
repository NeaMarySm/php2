<?php 

namespace lesson6\SockStore;

class OrderController {

    public function pay($paymentMethodId, $orderId): void 
    {
        $order = Order::get($orderId);
        $paymentMethod = new PaymentFactory();
        $payment = $paymentMethod -> getPaymentMethod($paymentMethodId);
        
        $form = $payment->getPaymentForm($order);
        echo "Controller: here's the payment form:\n";
        echo $form . "\n";

        try {
            if ($payment->validate($order)) {
                echo "Controller: Payment success! Thanks for your order!\n";
            }
        } catch (\Exception $e) {
            echo "Controller: got an exception (" . $e->getMessage() . ")\n";
        }
    }  
     
    public function createNewOrder(int $id, int $phone, float $totalPrice): void
    {
        $order = new Order($id, $phone, $totalPrice);
        echo "Controller: Created the order #{$id}.\n";
    }

}