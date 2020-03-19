<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class EntryListDTO
 */
class EntryListDTO extends AbstractJsonSerializable
{
    /**
     * @var EntryDTO[]
     */
    protected array $entries = [];
    protected int $forceEntryList = 0;
}
