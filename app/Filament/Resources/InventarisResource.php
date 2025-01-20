<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventarisResource\Pages;
use App\Filament\Resources\InventarisResource\RelationManagers;
use App\Models\Inventaris;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;


class InventarisResource extends Resource
{
    protected static ?string $model = Inventaris::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('id_barang')
                    ->label('Barang')
                    ->relationship('barang', 'nama_barang')
                    ->required(),
                Forms\Components\Select::make('id_lokasi')
                    ->label('Lokasi')
                    ->relationship('lokasi', 'nama_lokasi')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_barang')
                    ->label('Jumlah Barang')
                    ->numeric()
                    ->nullable(),
                Forms\Components\Select::make('kondisi_barang')
                    ->label('Kondisi Barang')
                    ->options([
                        'lengkap' => 'Lengkap',
                        'tidak_lengkap' => 'Tidak Lengkap',
                        'rusak' => 'Rusak',
                    ])
                    ->nullable(),
                Forms\Components\TextInput::make('ket_barang')
                    ->label('Keterangan Barang')
                    ->maxLength(50)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id_barang')->label('Barang'),
                TextColumn::make('id_lokasi')->label('Lokasi'),
                TextColumn::make('jumlah_barang')->label('Jumlah Barang'),
                TextColumn::make('kondisi_barang')->label('Kondisi Barang'),
                TextColumn::make('ket_barang')->label('Keterangan Barang'),
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
            'index' => Pages\ListInventaris::route('/'),
            'create' => Pages\CreateInventaris::route('/create'),
            'edit' => Pages\EditInventaris::route('/{record}/edit'),
        ];
    }
}
