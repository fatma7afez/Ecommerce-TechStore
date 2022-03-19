<?php

namespace TechStore\Classes;

class Cart
{

    public function add(string $id, array $data)
    {
        $_SESSION['cart'][$id] = $data;
    }

    public function count()
    {
        if (isset($_SESSION['cart']))
            return count($_SESSION['cart']);
        return 0;
    }


    public function total()
    {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $prodData) {
                $total += $prodData['qty'] * $prodData['price'];
            }
        }
        return $total;
    }

    public function has($id)
    {
        if (isset($_SESSION['cart'])) {
            return array_key_exists($id, $_SESSION['cart']);
        }
        else{
            return false;
        }
    }

    public function all()
    {
        if (isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
        }
        else{
            return [];
        }
    }

    public function empty()
    {
        $_SESSION['cart'] = [];
    }

    public function remove(string $id)
    {
        unset($_SESSION['cart'][$id]);
    }
}
