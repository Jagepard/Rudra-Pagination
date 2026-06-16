<?php declare(strict_types=1);

/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 *
 * @author  Korotkov Danila (Jagepard) <jagepard@yandex.ru>
 * @license https://mozilla.org/MPL/2.0/  MPL-2.0
 */

namespace Rudra;

final readonly class Pagination
{
    private int $page;
    private int $count;
    private int $perPage;

    public function __construct(int|string $value, int|string $perPage, int|string $count)
    {
        $this->page    = (int)$value;
        $this->count   = (int)$count;
        $this->perPage = (int)$perPage;
    }

    public function getOffset(): int
    {
        return ($this->page - 1) * $this->perPage;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getLinks(): array
    {
        $total = (int) ceil($this->count / $this->perPage);

        return $total > 0 ? range(1, $total) : [];
    }
}
