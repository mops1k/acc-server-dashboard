<?php

namespace App\Controller;

use App\Entity\FtpServer;
use App\Form\FtpServerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class FtpServerController extends AbstractController
{
    /**
     * @Route("/ftp/server/list", name="ftp_server_list")
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
     * @Route("/ftp/server/add", name="ftp_server_add")
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

                return $this->redirectToRoute('ftp_server_list');
            }
        }

        return $this->render('ftp_server/new.html.twig', [
            'form' => $form->createView(),
            'breadcrumb' => 'Add new ftp server'
        ]);
    }

    /**
     * @Route("/ftp/server/{id}/delete", name="ftp_server_delete")
     *
     * @param FtpServer $ftpServer
     *
     * @return Response
     */
    public function delete(FtpServer $ftpServer): Response
    {
        $this->getDoctrine()->getManager()->remove($ftpServer);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('ftp_server_list');
    }
}
