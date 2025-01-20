<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisBarangResource\Pages;
use App\Filament\Resources\JenisBarangResource\RelationManagers;
use App\Models\JenisBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class JenisBarangResource extends Resource
{
    protected static ?string $model = JenisBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Jenis Barang';
    protected static ?string $slug = 'jenis-barang';
    protected static ?string $navigationGroup = 'Kelola';

    protected static ?string $label = 'Jenis Barang';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama_jenis_barang')
                    ->label('Nama Jenis Barang')
                    ->required()
                    ->placeholder('Masukkan Nama Jenis Barang')
                    ->disableAutocomplete(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama_jenis_barang')
                    ->label('Nama Jenis Barang')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListJenisBarangs::route('/'),
            'create' => Pages\CreateJenisBarang::route('/create'),
            'edit' => Pages\EditJenisBarang::route('/{record}/edit'),
        ];
    }
}
