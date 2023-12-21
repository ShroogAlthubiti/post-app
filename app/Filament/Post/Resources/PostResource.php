<?php

namespace App\Filament\Post\Resources;

use App\Filament\Post\Resources\PostResource\Pages;
use App\Filament\Post\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Pages\Actions\Action;

class PostResource extends Resource
{    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->id())->count();
    }
  
public function openSettingsModal(): void
{
    $this->dispatchBrowserEvent('open-settings-modal');
}
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = "My Posts";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('content')->required()
            ]);
    }

    public static function table(Table $table): Table
    { 
        
        return $table
            ->columns([
                TextColumn::make('content'),
                TextColumn::make('created_at')->since(),
                TextColumn::make('updated_at')->label("last update")->since()
                
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}