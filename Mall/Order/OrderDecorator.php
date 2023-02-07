<?php
namespace wProvider\mall\order;

use wProvider\mall\order\interfaces\DecoratorInterface;
use wProvider\mall\order\interfaces\OrderInterface;

class OrderDecorator
{
    /**
     * @var array
     */
    protected $cart = [];

    /**
     * @var array
     */
    protected $decorator = [];

    /**
     * OrderDecorator constructor.
     * @param array $cart
     */
    public function __construct(array $cart = [])
    {
        $this->cart = $cart;
    }

    /**
     * 添加装饰者
     * @param DecoratorInterface $decorator
     * @return $this
     */
    public function addDecorator(DecoratorInterface $decorator)
    {
        $this->decorator[] = $decorator;
        return $this;
    }

    /**
     * 返回所有装饰结果
     * @return array
     */
    public function boot()
    {
        if (!empty($this->decorator) && !empty($this->cart)) {
            $order = [];
            foreach($this->decorator as $decorator) {
                $decorator->addCartData($this->cart);
                $decorator->addOrderData($order);
                $order = $decorator->boot();
            }
            return $order;
        } else {
            return [];
        }
    }
}