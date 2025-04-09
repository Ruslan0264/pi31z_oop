<?php

// Определение класса Заказ
class Order {
    public $orderNumber;
    public $items;
    public $totalAmount;
    
    // Конструктор для инициализации свойств
    function __construct($orderNumber, $items, $totalAmount) {
        $this->orderNumber = $orderNumber;
        $this->items = $items;
        $this->totalAmount = $totalAmount;
    }
    
    // Метод для клонирования объекта
    function clone() {
        return clone $this;
    }
}

// Создание прототипа заказа
$prototypeOrder = new Order('ORD-0001', ['Товар 1', 'Товар 2'], 1000);

// Клонирование прототипа и изменение нужных полей
$newOrder = $prototypeOrder->clone();
$newOrder->orderNumber = 'ORD-0002';
$newOrder->items[] = 'Товар 3'; // Добавление нового товара
$newOrder->totalAmount += 500; // Увеличение общей суммы

// Вывод данных нового заказа
echo "Номер заказа: " . $newOrder->orderNumber . "\n";
echo "Товары: " . implode(', ', $newOrder->items) . "\n";
echo "Общая сумма: " . $newOrder->totalAmount . "\n";
?>
