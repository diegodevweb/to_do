<?php

namespace App\Filament\Resources\Admin\TaskResource\Pages;

use App\Filament\Resources\Admin\TaskResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
}
