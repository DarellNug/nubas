<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('NAMA KATEGORI')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('description')
                    ->label('DESKRIPSI')
                    ->limit(50),

                TextColumn::make('posts_count')
                    ->label('JUMLAH POST')
                    ->counts('posts')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label('DIBUAT PADA')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->iconButton(),
                DeleteAction::make()->iconButton(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
