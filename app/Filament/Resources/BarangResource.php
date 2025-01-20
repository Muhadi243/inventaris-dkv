<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Kelola';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_barang')
                ->label('Nama Barang')
                ->required(),
                Forms\Components\Select::make('id_jenis_barang')
                    ->label('Jenis Barang')
                    ->relationship('jenisBarang', 'nama_jenis_barang')
                    ->required(),
                Forms\Components\TextInput::make('stok_barang')
                    ->label('Stok Barang')
                    ->numeric(),
                Forms\Components\TextInput::make('token_qr')
                    ->label('Token QR')
                    ->required(),
                Forms\Components\Select::make('id_lokasi')
                    ->label('Lokasi')
                    ->relationship('lokasi', 'nama_lokasi')
                    ->required(),
                Forms\Components\TextInput::make('merek')
                    ->label('Merek')
                    ->required(),
                Forms\Components\TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
