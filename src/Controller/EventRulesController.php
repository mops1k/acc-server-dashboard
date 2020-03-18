<?php

namespace App\Controller;

use App\DataTransfer\EventRulesDTO;
use App\Entity\FtpServer;
use App\Form\EventRulesType;
use App\Service\FtpManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventRulesController extends AbstractJsonFileFormController
{
    public const FILENAME = 'eventRules.json';
    public const DTO_CLASS_NAME = EventRulesDTO::class;
    public const FORM_CLASS_NAME = EventRulesType::class;
    public const SUCCESS_MESSAGE = 'Event rules saved.';
    public const TEMPLATE_PATH = 'event_rules/index.html.twig';

    /**
     * @Route("/dashboard/file/{id<\d+>}/event/rules", name="event_rules")
     * @param FtpServer  $ftpServer
     * @param FtpManager $ftpManager
     * @param Request    $request
     *
     * @return Response
     */
    public function edit(FtpServer $ftpServer, FtpManager $ftpManager, Request $request): Response
    {
        return parent::edit($ftpServer, $ftpManager, $request);
    }
}
