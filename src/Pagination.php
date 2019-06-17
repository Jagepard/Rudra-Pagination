<?php

declare(strict_types=1);

/**
 * @author    : Jagepard <jagepard@yandex.ru">
 * @copyright Copyright (c) 2019, Jagepard
 * @license   https://mit-license.org/ MIT
 */

namespace Rudra;

final class Pagination
{
    /**
     * @var
     */
    private $page;
    /**
     * @var
     */
    private $count;
    /**
     * @var
     */
    private $perPage;

    /**
     * Pagination constructor.
     * @param     $value
     * @param int $perPage
     * @param int $count
     */
    public function __construct($value, $perPage, $count)
    {
        $this->page    = (int)$value;
        $this->count   = (int)$count;
        $this->perPage = (int)$perPage;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->page * $this->perPage - $this->perPage;
    }

    /**
     * @return mixed
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
