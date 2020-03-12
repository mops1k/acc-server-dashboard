<?php

namespace App\Controller;

use App\Entity\FtpServer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FtpServerController extends AbstractController
{
    /**
     * @Route("/ftp/server/list", name="ftp_server_list")
     */
    public function index()
    {
        $ftpServerRepository = $this->getDoctrine()->getManager()->getRepository(FtpServer::class);
        $servers = $ftpServerRepository->findAll();

        return $this->render('ftp_server/index.html.twig', [
            'servers' => $servers,
        ]);
    }
}
