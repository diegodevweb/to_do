<?php

namespace App\Filament\Resources\Admin\TaskResource\Pages;

use App\Filament\Resources\Admin\TaskResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTask extends EditRecord
{
    protected static string $resource = TaskResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
