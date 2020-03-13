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

class AssistRulesController extends AbstractController
{
    /**
     * @Route("/file/{id<\d+>}/assist/rules", name="assist_rules")
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
            $assistRulesJson = $filesystem->read('assistRules.json');
        } catch (\Throwable $exception) {
            throw new ResourceBundleNotFoundException('Resource unacceptable.');
        }

        if (null === $assistRulesJson) {
            throw new NotFoundResourceException('No data received.');
        }

        $model = new AssistRulesDTO($assistRulesJson);
        $form  = $this->createForm(AssistRulesType::class, $model);
        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $filesystem->write('assistRules.json', \json_encode($model), true);

                $this->addFlash('success', 'Assist rules saved');
                $this->redirectToRoute('assist_rules', ['id' => $ftpServer->getId()]);
            }
        }

        return $this->render(
            'assist_rules/edit.html.twig',
            [
                'form'   => $form->createView(),
                'server' => $ftpServer,
            ]
        );
    }
}
