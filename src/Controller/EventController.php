<?php

namespace App\Controller;

use App\DataTransfer\EventDTO;
use App\Entity\FtpServer;
use App\Form\EventType;
use App\Service\FtpManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractJsonFileFormController
{
    public const DTO_CLASS_NAME = EventDTO::class;
    public const FILENAME = 'event.json';
    public const FORM_CLASS_NAME = EventType::class;
    public const TEMPLATE_PATH = 'event/index.html.twig';
    public const SUCCESS_MESSAGE = 'Event saved.';

    /**
     * @Route("/dashboard/file/{id}/event/", name="event")
     *
     * @inheritDoc
     */
    public function edit(FtpServer $ftpServer, FtpManager $ftpManager, Request $request): Response
    {
        return parent::edit($ftpServer, $ftpManager, $request);
    }
}
