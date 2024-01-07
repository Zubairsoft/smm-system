<?php

namespace Tests\Feature\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Repository\BankRepository;
use Tests\TestCase;

class BaseRepositoryTest extends TestCase
{
    private $repository;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = new BankRepository();
    }

    public function test_index()
    {
        $this->assertInstanceOf(Collection::class, $this->repository->index());
    }
}
