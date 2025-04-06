<?php

// Абстрактный класс автомобиля
abstract class Car {
    abstract public function drive();
    abstract public function stop();
}

// Абстрактная фабрика для создания автомобилей
abstract class CarFactory {
    abstract public static function createElectricCar();
    abstract public static function createPetrolCar();
    abstract public static function createHybridCar();
}
?>

<?php

// Фабрика для производства электромобилей
class ElectricCarFactory extends CarFactory {
    public static function createElectricCar() {
        return new ElectricCar();
    }

    // Остальные методы выбрасывают исключения
    public static function createPetrolCar() {
        throw new Exception("Эта фабрика не производит бензиновые автомобили");
    }

    public static function createHybridCar() {
        throw new Exception("Эта фабрика не производит гибридные автомобили");
    }
}

// Фабрика для производства бензиновых автомобилей
class PetrolCarFactory extends CarFactory {
    public static function createPetrolCar() {
        return new PetrolCar();
    }

    public static function createElectricCar() {
        throw new Exception("Эта фабрика не производит электрические автомобили");
    }

    public static function createHybridCar() {
        throw new Exception("Эта фабрика не производит гибридные автомобили");
    }
}

// Фабрика для производства гибридных автомобилей
class HybridCarFactory extends CarFactory {
    public static function createHybridCar() {
        return new HybridCar();
    }

    public static function createElectricCar() {
        throw new Exception("Эта фабрика не производит электрические автомобили");
    }

    public static function createPetrolCar() {
        throw new Exception("Эта фабрика не производит бензиновые автомобили");
    }
}
?>

<?php

// Класс электрического автомобиля
class ElectricCar extends Car {
    public function drive() {
        echo "Электрический автомобиль едет тихо...";
    }

    public function stop() {
        echo "Электрический автомобиль остановился.";
    }
}

// Класс бензинового автомобиля
class PetrolCar extends Car {
    public function drive() {
        echo "Бензиновый автомобиль едет с ревущим двигателем...";
    }

    public function stop() {
        echo "Бензиновый автомобиль остановился.";
    }
}

// Класс гибридного автомобиля
class HybridCar extends Car {
    public function drive() {
        echo "Гибридный автомобиль едет, используя электричество и топливо...";
    }

    public function stop() {
        echo "Гибридный автомобиль остановился.";
    }
}
?>

