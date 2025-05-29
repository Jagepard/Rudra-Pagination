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

    public function __construct($value, $perPage, $count)
    {
        $this->page    = (int)$value;
        $this->count   = (int)$count;
        $this->perPage = (int)$perPage;
    }

    public function getOffset(): int
    {
        return $this->page * $this->perPage - $this->perPage;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

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
