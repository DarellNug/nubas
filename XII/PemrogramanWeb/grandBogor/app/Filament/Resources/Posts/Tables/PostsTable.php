<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('FOTO')
                    ->disk('public')
                    ->extraImgAttributes([
                        'class' => 'rounded-lg object-cover shadow-sm',
                        'style' => 'width: 64px; height: 48px; border-radius: 6px;',
                    ]),

                TextColumn::make('title')
                    ->label('JUDUL ARTIKEL')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('KATEGORI')
                    ->badge()
                    ->color('info')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('TANGGAL RILIS')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Filter Kategori')
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                ViewAction::make()->iconButton(),
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
