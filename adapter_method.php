<?php
class OldMailService {
    public function send($to, $subject, $body) {
        // Логика отправки письма старой службой
        echo "Отправлено письмо на {$to}: '{$subject}'\n";
    }
}

interface MailInterface {
    public function deliver(string $recipient, string $title, string $content);
}

// Адаптер реализует новый интерфейс и вызывает старый сервис
class MailAdapter implements MailInterface {
    private $oldService;
    
    public function __construct(OldMailService $service) { 
        $this->oldService = $service;
    }
    
    public function deliver(string $recipient, string $title, string $content) {
        return $this->oldService->send($recipient, $title, $content);
    }
}

$mailService = new OldMailService();
$adapter = new MailAdapter($mailService);

// Клиент отправляет почту через адаптер
$adapter->deliver('example@example.com', 'Привет!', 'Это тестовое сообщение.');

?>
