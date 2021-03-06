<?php

namespace App\Controller;

use App\Entity\FtpServer;
use App\Form\FtpServerType;
use App\Service\FtpManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class FtpServerController extends AbstractController
{
    /**
     * @Route("/dashboard/ftp/server/list", name="ftp_server_list")
     */
    public function index(): Response
    {
        $ftpServerRepository = $this->getDoctrine()->getManager()->getRepository(FtpServer::class);
        $servers = $ftpServerRepository->findAll();

        return $this->render('ftp_server/index.html.twig', [
            'servers' => $servers,
        ]);
    }

    /**
     * @Route("/dashboard/ftp/server/add", name="ftp_server_add")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function add(Request $request): Response
    {
        $form = $this->createForm(FtpServerType::class);

        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($form->getData());
                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('success', \sprintf('Ftp server "%s" was added.', $form->getData()->getTitle()));

                return $this->redirectToRoute('ftp_server_list');
            }
        }

        return $this->render('ftp_server/new.html.twig', [
            'form' => $form->createView(),
            'breadcrumb' => 'Add new ftp server'
        ]);
    }

    /**
     * @Route("/dashboard/ftp/server/{id}/edit", name="ftp_server_edit")
     *
     * @param FtpServer $ftpServer
     * @param Request   $request
     *
     * @return Response
     */
    public function edit(FtpServer $ftpServer, Request $request): Response
    {
        $form = $this->createForm(FtpServerType::class, $ftpServer);

        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($form->getData());
                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('info', \sprintf('Ftp server "%s" was saved.', $form->getData()->getTitle()));

                return $this->redirectToRoute('ftp_server_list');
            }
        }

        return $this->render('ftp_server/edit.html.twig', [
            'form' => $form->createView(),
            'breadcrumb' => \sprintf('Edit "%s" ftp server', $ftpServer->getTitle()),
            'server' => $ftpServer,
        ]);
    }

    /**
     * @Route("/dashboard/ftp/server/{id}/delete", name="ftp_server_delete")
     *
     * @param FtpServer $ftpServer
     *
     * @return Response
     */
    public function delete(FtpServer $ftpServer): Response
    {
        $this->getDoctrine()->getManager()->remove($ftpServer);
        $this->getDoctrine()->getManager()->flush();

        $this->addFlash('warning', \sprintf('Ftp server "%s" was removed.', $ftpServer->getTitle()));

        return $this->redirectToRoute('ftp_server_list');
    }

    /**
     * @Route("/dashboard/ftp/server/{id}/cache", name="ftp_server_cache_files")
     *
     * @param int        $id
     * @param FtpManager $manager
     *
     * @return Response
     */
    public function cacheServerFiles(int $id, FtpManager $manager): Response
    {
        $filesystem = $manager->get($id);
        $configurationFiles = [
            'configuration.json',
            'entrylist.json',
            'event.json',
            'eventRules.json',
            'settings.json',
            'assistRules.json'
        ];
        $cached = 0;
        foreach ($configurationFiles as $file) {
            if (!$filesystem->has($file)) {
                continue;
            }

            $filesystem->read($file);
            ++$cached;
        }

        $this->addFlash('warning', \sprintf('%d files was cached.', $cached));

        return $this->redirectToRoute('ftp_server_list');
    }
}
