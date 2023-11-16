<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\TaskResource\Pages;
use App\Filament\Resources\Admin\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Tarefas';

    protected static ?string $label = 'Atividade';

//    protected static?string $navigationLabel = 'Andamento';

//    protected static function getNavigationBadge(): ?string
//    {
//        $taskGroupDoneId = TaskGroup::query()->whereTitle('Done')?->first()?->id;
//
//        return (string) static::getModel()::where('task_group_id', '<>', $taskGroupDoneId)->count();
//    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('task_group_id')
                    ->relationship('taskGroup', 'title')
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('taskGroup.title')
                    ->label('Tarefas')
                    ->colors([
                        'btn' => 'Testing',
                        'primary' => 'Backlog',
                        'warning' => 'In Progress',
                        'success' => 'Done',
                        'danger' => 'To Do',
                    ])
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Descrição')
                    ->limit(20)
                    ->searchable()
                    ->sortable()
                    ->tooltip(fn(Model $record) => $record->description),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->label('Usuários'),

                Tables\Filters\SelectFilter::make('taskGroup')
                    ->relationship('taskGroup', 'title')
                    ->label('Grupo de Tarefas')
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
