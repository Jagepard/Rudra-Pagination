<?php

declare(strict_types=1);

/**
 * @author  : Jagepard <jagepard@yandex.ru">
 * @license https://mit-license.org/ MIT
 */

namespace Rudra;

final class Pagination
{
    private $page;
    private $count;
    private $perPage;

    /**
     * @param $value
     * @param $perPage
     * @param $count
     */
    public function __construct($value, $perPage, $count)
    {
        $this->page    = (int)$value;
        $this->count   = (int)$count;
        $this->perPage = (int)$perPage;
    }

    /**
     * @return integer
     */
    public function getOffset(): int
    {
        return $this->page * $this->perPage - $this->perPage;
    }

    /**
     * @return integer
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        $links = [];
        $total = ceil($this->count / $this->perPage);

        for ($i = 1; $i <= $total; $i++) {
            $links[] = $i;
        }

        return $links;
    }
}
