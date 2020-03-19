<?php

namespace App\Controller;

use App\DataTransfer\EntryListDTO;
use App\Entity\FtpServer;
use App\Form\EntryListType;
use App\Service\FtpManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntryListController extends AbstractJsonFileFormController
{
    public const DTO_CLASS_NAME = EntryListDTO::class;
    public const FILENAME = 'entrylist.json';
    public const FORM_CLASS_NAME = EntryListType::class;
    public const TEMPLATE_PATH = 'entry_list/index.html.twig';
    public const SUCCESS_MESSAGE = 'Entry list saved.';

    /**
     * @Route("/dashboard/file/{id}/entry/list/", name="entry_list")
     *
     * @inheritDoc
     */
    public function edit(FtpServer $ftpServer, FtpManager $ftpManager, Request $request): Response
    {
        return parent::edit($ftpServer, $ftpManager, $request);
    }
}
