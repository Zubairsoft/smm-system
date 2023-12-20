<?php

namespace Tests\Unit\Repositories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;
use Repository\BaseRepository;

class BaseRepositoryTest extends TestCase
{
    private $repository;

    public function setUP(): void
    {
        $this->repository = new BaseRepository();

        $this->repository->setModel(Bank::class);
    }
    /**
     * A basic unit test example.
     */
    public function test_index(): void
    {
        $this->assertInstanceOf(Collection::class, $this->repository->index());
    }
}
