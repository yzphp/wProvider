<?php
namespace wProvider\mall\order\decorators;

use wProvider\mall\order\interfaces\DecoratorInterface;
use wProvider\Tool\HelperArray;
use wProvider\Tool\HelperOrder;

/**
 * 基础订单装饰器
 * Class BaseDecorator
 * @package wProvider\mall\order\decorators
 */
class BaseDecorator implements DecoratorInterface
{
    /**
     * @var array
     */
    protected $cart = [];

    /**
     * @param array $cart
     * @return mixed|void
     */
    public function addCartData(array $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * @param array $order
     * @return bool|mixed
     */
    public function addOrderData(array $order)
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function boot()
    {
        $order['order_sn']      = HelperOrder::builderOrderSn();
        $order_goods =  [];
        foreach( $this->cart as $cart) {
            $detail = array_merge($cart, [
                'price' => HelperOrder::formatPrice($cart['price']),
                'final_price' => HelperOrder::formatPrice($cart['price']),
                'total_price' => HelperOrder::formatPrice(($cart['price'] * $cart['num'])),
                'coupon_price' => 0,
                'final_total_price' => HelperOrder::formatPrice(($cart['price'] * $cart['num']))
            ]);
            $order_goods[] = $detail;
        }
        $order['total_price']   = HelperArray::sumArrayWithPrice($order_goods, 'total_price');
        $order['delivery_price'] = 0;
        $order['coupon_price'] = 0;
        $order['final_total_price'] = $order['total_price'];
        $order['detail'] = $order_goods;
        return $order;
    }
}