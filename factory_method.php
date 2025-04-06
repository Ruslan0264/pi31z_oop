<?php
// Абстрактный класс Animal
abstract class Animal {
    // Абстрактный метод make_sound
    abstract public function make_sound();
}

// Конкретные виды животных
class Lion extends Animal {
    public function make_sound() {
        return "Рычание!";
    }
}

class Monkey extends Animal {
    public function make_sound() {
        return "Визг!";
    }
}

class Elephant extends Animal {
    public function make_sound() {
        return "Трубление!";
    }
}

// Абстрактная фабрика AnimalFactory
abstract class AnimalFactory {
    // Абстрактный метод create_animal
    abstract public function create_animal();
}

// Конкретные фабрики для каждого вида животных
class LionFactory extends AnimalFactory {
    public function create_animal() {
        return new Lion();
    }
}

class MonkeyFactory extends AnimalFactory {
    public function create_animal() {
        return new Monkey();
    }
}

class ElephantFactory extends AnimalFactory {
    public function create_animal() {
        return new Elephant();
    }
}

// Использование фабрик для создания животных и вызова их методов
function main() {
    $lion_factory = new LionFactory();
    $monkey_factory = new MonkeyFactory();
    $elephant_factory = new ElephantFactory();
    
    $animals = array(
        $lion_factory->create_animal(),
        $monkey_factory->create_animal(),
        $elephant_factory->create_animal()
    );
    
    foreach ($animals as $animal) {
        echo $animal->make_sound() . "\n";
    }
}

main();
?>
