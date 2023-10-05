<?php

declare(strict_types=1);

/**
 * @author    : Jagepard <jagepard@yandex.ru">
 * @license   https://mit-license.org/ MIT
 */

namespace Rudra;

final class Pagination
{
    private $page;
    private $count;
    private $perPage;

    /**
     * Accepts required data
     * ---------------------
     * Принимает необходимы данные
     *
     * @param  $value
     * @param  $perPage
     * @param  $count
     */
    public function __construct($value, $perPage, $count)
    {
        $this->page    = (int)$value;
        $this->count   = (int)$count;
        $this->perPage = (int)$perPage;
    }

    /**
     * Gets Offset
     * -----------
     * Получает смещение
     *
     * @return integer
     */
    public function getOffset(): int
    {
        return $this->page * $this->perPage - $this->perPage;
    }

    /**
     * Gets the number of materials per page
     * -------------------------------------
     * Получает количество материалов на страницу
     *
     * @return void
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * Gets an array with pagination
     * -----------------------------
     * Получает массив с нумерацией страниц
     *
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
