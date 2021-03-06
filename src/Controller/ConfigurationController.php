<?php

namespace App\Controller;

use App\DataTransfer\ConfigurationDTO;
use App\Entity\FtpServer;
use App\Form\ConfigurationType;
use App\Service\FtpManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfigurationController extends AbstractJsonFileFormController
{
    public const DTO_CLASS_NAME = ConfigurationDTO::class;
    public const FILENAME = 'configuration.json';
    public const FORM_CLASS_NAME = ConfigurationType::class;
    public const TEMPLATE_PATH = 'configuration/index.html.twig';
    public const SUCCESS_MESSAGE = 'Configuration saved.';

    /**
     * @Route("/dashboard/file/{id}/configuration/", name="configuration")
     *
     * @inheritDoc
     */
    public function edit(FtpServer $ftpServer, FtpManager $ftpManager, Request $request): Response
    {
        return parent::edit($ftpServer, $ftpManager, $request);
    }
}
