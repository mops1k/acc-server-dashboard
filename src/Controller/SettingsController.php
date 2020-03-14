<?php

namespace App\Controller;

use App\DataTransfer\SettingsDTO;
use App\Entity\FtpServer;
use App\Form\SettingsType;
use App\Service\FtpManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Exception\ResourceBundleNotFoundException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class SettingsController extends AbstractController
{
    public const FILENAME = 'settings.json';
    /**
     * @Route("/file/{id<\d+>}/settings", name="settings")
     * @param FtpServer  $ftpServer
     * @param FtpManager $ftpManager
     * @param Request    $request
     *
     * @return Response
     */
    public function index(FtpServer $ftpServer, FtpManager $ftpManager, Request $request): Response
    {
        $filesystem = $ftpManager->get($ftpServer->getId());
        try {
            $settingsJson = $filesystem->read(self::FILENAME);
        } catch (\Throwable $exception) {
            throw new ResourceBundleNotFoundException('Resource unacceptable.');
        }

        if (null === $settingsJson) {
            throw new NotFoundResourceException('No data received.');
        }

        $model = new SettingsDTO($settingsJson);
        $form  = $this->createForm(SettingsType::class, $model);
        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $filesystem->write(self::FILENAME, \json_encode($model), true);

                $this->addFlash('success', 'Assist rules saved');
                $this->redirectToRoute('assist_rules', ['id' => $ftpServer->getId()]);
            }
        }

        return $this->render(
            'settings/index.html.twig',
            [
                'form'   => $form->createView(),
                'server' => $ftpServer,
            ]
        );
    }
}
