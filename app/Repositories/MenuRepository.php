<?php

namespace App\Repositories;

use App\Menu;
use Bosnadev\Repositories\Eloquent\Repository;

class MenuRepository extends Repository
{
    public function model()
    {
        return Menu::class;
    }
}