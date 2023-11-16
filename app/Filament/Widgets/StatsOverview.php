<?php

namespace App\Filament\Widgets;

use App\Models\Admin\Task;
use App\Models\TaskGroup;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {

        $taskGroupBackLogId = TaskGroup::query()->whereTitle('Backlog')?->first()?->id;
        $taskGroupInProgressId = TaskGroup::query()->whereTitle('In Progress')?->first()?->id;
        $taskGroupTestingId = TaskGroup::query()->whereTitle('Testing')?->first()?->id;
        $taskGroupDoneId = TaskGroup::query()->whereTitle('Done')?->first()?->id;

        return [
            Card::make('A fazer', Task::query()->where('task_group_id', $taskGroupBackLogId)->count()),
            Card::make('Em Andamento', Task::query()->where('task_group_id', $taskGroupInProgressId)->count()),
            Card::make('Testando', Task::query()->where('task_group_id', $taskGroupTestingId)->count()),
            Card::make('Concluído', Task::query()->where('task_group_id', $taskGroupDoneId)->count()),
        ];
    }
}
