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

    /**
     * @return EntryDTO[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param EntryDTO[] $entries
     *
     * @return EntryListDTO
     */
    public function setEntries(array $entries): EntryListDTO
    {
        $this->entries = [];
        foreach ($entries as $entry) {
            $this->entries[] = new EntryDTO($entry);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getForceEntryList(): int
    {
        return $this->forceEntryList;
    }

    /**
     * @param int $forceEntryList
     *
     * @return EntryListDTO
     */
    public function setForceEntryList(int $forceEntryList): EntryListDTO
    {
        $this->forceEntryList = $forceEntryList;

        return $this;
    }
}
