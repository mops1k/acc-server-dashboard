<?php

namespace App\Controller;

use App\DataTransfer\AssistRulesDTO;
use App\Entity\FtpServer;
use App\Form\AssistRulesType;
use App\Service\FtpManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Exception\ResourceBundleNotFoundException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

abstract class AbstractJsonFileFormController extends AbstractController
{
    public const FILENAME = 'assistRules.json';
    public const DTO_CLASS_NAME = AssistRulesDTO::class;
    public const FORM_CLASS_NAME = AssistRulesType::class;
    public const SUCCESS_MESSAGE = 'Assist rules saved';
    public const TEMPLATE_PATH = 'assist_rules/edit.html.twig';

    /**
     * @param FtpServer  $ftpServer
     * @param FtpManager $ftpManager
     *
     * @param Request    $request
     *
     * @return Response
     */
    public function edit(FtpServer $ftpServer, FtpManager $ftpManager, Request $request): Response
    {
        $filesystem = $ftpManager->get($ftpServer->getId());
        try {
            $jsonString = $filesystem->read(static::FILENAME);
        } catch (\Throwable $exception) {
            throw new ResourceBundleNotFoundException('Resource unacceptable.');
        }

        if (null === $jsonString) {
            throw new NotFoundResourceException('No data received.');
        }

        $dtoClassName = static::DTO_CLASS_NAME;
        $model = new $dtoClassName($jsonString);
        $form  = $this->createForm(static::FORM_CLASS_NAME, $model);
        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $filesystem->write(static::FILENAME, \json_encode($model), true);

                $this->addFlash('success', static::SUCCESS_MESSAGE);
                $this->redirectToRoute('assist_rules', ['id' => $ftpServer->getId()]);
            }
        }

        return $this->render(
            static::TEMPLATE_PATH,
            [
                'form'   => $form->createView(),
                'server' => $ftpServer,
            ]
        );
    }
}
