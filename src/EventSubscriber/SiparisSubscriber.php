<?php

namespace App\EventSubscriber;

use App\SiparisEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SiparisSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            SiparisEvents::KAYDEDILDI => 'siparisGeldi'
        ];
    }

    public function siparisGeldi(SiparisEvents $event)
    {
        $message = (new \Swift_Message('Yeni siparis geldi patron!'))
            ->setFrom('system@behramstore.com')
            ->setTo('omeroglu.berke@gmail.com')
            ->setBody('yeni siparis geldi: Urun:'. $event->getUrun());

        $this->mailer->send($message);
    }
}