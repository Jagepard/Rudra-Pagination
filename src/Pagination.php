<?php

declare(strict_types=1);

/**
 * @author    : Korotkov Danila <dankorot@gmail.com>
 * @copyright Copyright (c) 2018, Korotkov Danila
 * @license   http://www.gnu.org/licenses/gpl.html GNU GPLv3.0
 */

namespace Rudra;

/**
 * Class Pagination
 * @package Rudra
 */
class Pagination
{

    /**
     * @var
     */
    protected $page;
    /**
     * @var
     */
    protected $count;
    /**
     * @var
     */
    protected $perPage;

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
        $total = ceil($this->count / $this->perPage);

        for ($i = 1; $i <= $total; $i++) {
            $links[] = $i;
        }

        return $links;
    }
}
