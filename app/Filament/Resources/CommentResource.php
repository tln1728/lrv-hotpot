<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Add comments')->schema([
                    
                    Select::make('user_id')
                        ->label('Người đăng')
                        ->relationship('user', 'name')
                        ->preload()
                        ->searchable()
                        ->required(),

                    TextInput::make('comment')->maxLength(2000)->required(),

                    MorphToSelect::make('commentable')
                        ->types([
                            // MorphToSelect\Type::make(User::class)->titleAttribute('name'),
                            MorphToSelect\Type::make(Comment::class)->titleAttribute('comment'),
                            MorphToSelect\Type::make(Post::class)->titleAttribute('title')
                        ])
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpan(2)

                ])->columnSpan(2)->columns(2),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('commentable')
                    ->formatStateUsing(function (Comment $comment) {
                        $commentable = $comment -> commentable;
                        
                        if ($commentable instanceof Post)    return $commentable -> title;
                        
                        if ($commentable instanceof Comment) return $commentable -> comment;

                        return null;
                    })
                    ->icon(function (Comment $comment) {
                        $commentable = $comment -> commentable;

                        if ($commentable instanceof Post)    return 'heroicon-o-newspaper';
                        
                        if ($commentable instanceof Comment) return 'heroicon-o-chat-bubble-bottom-center-text';

                        return null;
                    }),
                TextColumn::make('user.name') -> label('Người đăng'),
                TextColumn::make('comment') -> wrap(),
            ])
            ->filters([
                SelectFilter::make('Người_đăng')
                    -> multiple()
                    -> preload()
                    -> relationship('user','name')
            ])
            ->actions([
                Tables\Actions\EditAction::make() -> color('info'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
