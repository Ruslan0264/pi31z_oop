<?php
// Двигатель
class Engine {
    private string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getType(): string {
        return $this->type;
    }
}

// Трансмиссия
class Transmission {
    private string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getType(): string {
        return $this->type;
    }
}

// Кузов
class Body {
    private string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getType(): string {
        return $this->type;
    }
}

// Колесо
class Wheels {
    private int $size;

    public function __construct(int $size) {
        $this->size = $size;
    }

    public function getSize(): int {
        return $this->size;
    }
}

// Автомобиль
class Car {
    private ?Engine $engine = null;
    private ?Transmission $transmission = null;
    private ?Body $body = null;
    private array $wheels = [];

    public function setEngine(Engine $engine): void {
        $this->engine = $engine;
    }

    public function setTransmission(Transmission $transmission): void {
        $this->transmission = $transmission;
    }

    public function setBody(Body $body): void {
        $this->body = $body;
    }

    public function addWheel(Wheels $wheel): void {
        $this->wheels[] = $wheel;
    }

    public function getSpecifications(): string {
        return sprintf(
            "Автомобиль:\nТип двигателя: %s\nКоробка передач: %s\nКузов: %s\nРазмер колёс: %d дюймов (%d шт.)",
            $this->engine->getType(), 
            $this->transmission->getType(), 
            $this->body->getType(), 
            count($this->wheels) > 0 ? $this->wheels[0]->getSize() : '',
            count($this->wheels)
        );
    }
}


interface CarBuilderInterface {
    public function reset(): void;
    public function buildEngine(string $type): void;
    public function buildTransmission(string $type): void;
    public function buildBody(string $type): void;
    public function buildWheels(int $size): void;
    public function getResult(): Car;
}


class SedanBuilder implements CarBuilderInterface {
    private Car $car;

    public function __construct() {
        $this->reset();
    }

    public function reset(): void {
        $this->car = new Car();
    }

    public function buildEngine(string $type): void {
        $this->car->setEngine(new Engine($type));
    }

    public function buildTransmission(string $type): void {
        $this->car->setTransmission(new Transmission($type));
    }

    public function buildBody(string $type): void {
        $this->car->setBody(new Body($type));
    }

    public function buildWheels(int $size): void {
        for ($i = 0; $i < 4; ++$i) {
            $this->car->addWheel(new Wheels($size));
        }
    }

    public function getResult(): Car {
        return $this->car;
    }
}


class SportsCarBuilder implements CarBuilderInterface {
    private Car $car;

    public function __construct() {
        $this->reset();
    }

    public function reset(): void {
        $this->car = new Car();
    }

    public function buildEngine(string $type): void {
        $this->car->setEngine(new Engine($type));
    }

    public function buildTransmission(string $type): void {
        $this->car->setTransmission(new Transmission($type));
    }

    public function buildBody(string $type): void {
        $this->car->setBody(new Body($type));
    }

    public function buildWheels(int $size): void {
        for ($i = 0; $i < 4; ++$i) {
$this->car->addWheel(new Wheels($size));
        }
    }

    public function getResult(): Car {
        return $this->car;
    }
}


class CarDirector {
    protected CarBuilderInterface $builder;

    public function __construct(CarBuilderInterface $builder) {
        $this->builder = $builder;
    }

    public function changeBuilder(CarBuilderInterface $newBuilder): void {
        $this->builder = $newBuilder;
    }

    public function makeBasicCar(): void {
        $this->builder->buildEngine('Базовый');
        $this->builder->buildTransmission('Механика');
        $this->builder->buildBody('Стандарт');
        $this->builder->buildWheels(16); // Размер колес
    }

    public function makeSportCar(): void {
        $this->builder->buildEngine('Турбо V8');
        $this->builder->buildTransmission('Автомат');
        $this->builder->buildBody('Купе');
        $this->builder->buildWheels(19); // Больший размер колес
    }

    public function getCar(): Car {
        return $this->builder->getResult();
    }
}

