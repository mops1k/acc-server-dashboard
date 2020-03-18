<?php

namespace App\Controller;

use App\DataTransfer\SettingsDTO;
use App\Entity\FtpServer;
use App\Form\SettingsType;
use App\Service\FtpManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractJsonFileFormController
{
    public const FILENAME = 'settings.json';
    public const DTO_CLASS_NAME = SettingsDTO::class;
    public const FORM_CLASS_NAME = SettingsType::class;
    public const SUCCESS_MESSAGE = 'Settings saved.';
    public const TEMPLATE_PATH = 'settings/index.html.twig';

    /**
     * @Route("/dashboard/file/{id<\d+>}/settings", name="settings")
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
