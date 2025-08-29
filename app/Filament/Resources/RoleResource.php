<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\TextInput;
use Filament\Schemas\Components\Textarea;
use Filament\Schemas\Components\CheckboxList;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    // protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    // protected static string $navigationGroup = 'User Management';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Role Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),
                Section::make('Permissions')
                    ->schema([
                        CheckboxList::make('permissions')
                            ->relationship('permissions', 'name')
                            ->columns(3)
                            ->searchable()
                            ->bulkToggleable()
                            ->groupedBy('group', function (Permission $permission): string {
                                $name = $permission->name;
                                if (str_contains($name, 'users')) {
                                    return 'User Management';
                                }
                                if (str_contains($name, 'roles')) {
                                    return 'Role Management';
                                }
                                if (str_contains($name, 'permissions')) {
                                    return 'Permission Management';
                                }
                                if (str_contains($name, 'transactions')) {
                                    return 'Transaction Management';
                                }
                                if (str_contains($name, 'reports')) {
                                    return 'Reports';
                                }
                                if (str_contains($name, 'inventory')) {
                                    return 'Inventory Management';
                                }
                                if (str_contains($name, 'system') || str_contains($name, 'settings') || str_contains($name, 'backup')) {
                                    return 'System Management';
                                }
                                return 'Other';
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('permissions_count')
                    ->counts('permissions')
                    ->label('Permissions')
                    ->sortable(),
                TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Users')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}