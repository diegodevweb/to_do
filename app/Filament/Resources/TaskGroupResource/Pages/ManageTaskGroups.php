<?php

namespace App\Filament\Resources\TaskGroupResource\Pages;

use App\Filament\Resources\Admin\TaskResource;
use App\Filament\Resources\TaskGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTaskGroups extends ManageRecords
{
    protected static string $resource = TaskResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
