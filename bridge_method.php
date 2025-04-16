
<?php


interface Device {
    public function turn_on(): void;
    public function turn_off(): void;
    public function set_state(bool $state): void;
}


abstract class AbstractTV implements Device {
    protected bool $isOn = false;

    public function turn_on(): void {
        if (!$this->isOn) {
            echo "Включаем телевизор\n";
            $this->set_state(true);
        }
    }

    public function turn_off(): void {
        if ($this->isOn) {
            echo "Выключаем телевизор\n";
            $this->set_state(false);
        }
    }

    public function set_state(bool $state): void {
        $this->isOn = $state;
    }
}

abstract class AbstractLight implements Device {
    protected bool $isOn = false;

    public function turn_on(): void {
        if (!$this->isOn) {
            echo "Включаем свет\n";
            $this->set_state(true);
        }
    }

    public function turn_off(): void {
        if ($this->isOn) {
            echo "Выключаем свет\n";
            $this->set_state(false);
        }
    }

    public function set_state(bool $state): void {
        $this->isOn = $state;
    }
}


class SonyTV extends AbstractTV {}
class SamsungTV extends AbstractTV {}

class PhilipsLight extends AbstractLight {}
class IKEALight extends AbstractLight {}


abstract class RemoteControl {
    protected Device $device;

    public function __construct(Device $device) {
        $this->device = $device;
    }

    abstract public function power_toggle(): void;
}


class TVRemoteControl extends RemoteControl {
    public function power_toggle(): void {
        if ($this->device->isOn()) {
            $this->device->turn_off();
        } else {
            $this->device->turn_on();
        }
    }

    public function isOn(): bool {
        return $this->device instanceof AbstractTV && $this->device->isOn;
    }
}

class LightRemoteControl extends RemoteControl {
    public function power_toggle(): void {
        if ($this->device->isOn()) {
            $this->device->turn_off();
        } else {
            $this->device->turn_on();
        }
    }

    public function isOn(): bool {
        return $this->device instanceof AbstractLight && $this->device->isOn;
    }
}

$samsung_tv = new SamsungTV();
$tv_remote_control = new TVRemoteControl($samsung_tv);

echo "--- Управление телевизором:\n";
$tv_remote_control->power_toggle(); // Включаем телевизор
$tv_remote_control->power_toggle(); // Выключаем телевизор

$philips_light = new PhilipsLight();
$light_remote_control = new LightRemoteControl($philips_light);

echo "\n--- Управление светом:\n";
$light_remote_control->power_toggle(); // Включаем свет
$light_remote_control->power_toggle(); // Выключаем свет
