<?php

namespace App\Filament\Resources;

use App\Models\Post;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;
use Filament\Forms\Form;
use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = -4;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Holysheet')
                    ->description('create post\'s description')
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')
                            ->required(),

                        TextInput::make('slug')
                            ->unique(ignoreRecord:true)
                            ->required(),

                        Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->required(),

                        TagsInput::make('tags')
                            ->required(),

                        Select::make('user_id')
                            ->label('Author')
                            ->relationship('author','name')
                            ->searchable()
                            ->required(),

                        MarkdownEditor::make('content')
                            ->columnSpanFull()
                            ->required(),

                    ])->columnSpan(2)->columns(2),

                Group::make()->schema([
                    Section::make('Image')->collapsible()->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('thumbnails'),
                    ]),

                    Section::make('Test')->schema([
                        Toggle::make('published'),
                    ]),
                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->sortable()
                    ->width(90)
                    ->height(60)
                    ->toggleable(),

                TextColumn::make('title')
                    ->limit(25)
                    ->searchable(),
                    
                TextColumn::make('slug')    
                    ->limit(25)
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->searchable(),

                TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author.name')
                    ->badge()
                    ->color('warning')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                TextColumn::make('tags')
                    ->badge()
                    ->toggleable()
                    ->searchable(),

                ToggleColumn::make('published')
                    ->sortable(),

                TextColumn::make('comments_count')
                    ->sortable()
                    ->toggleable()
                    ->counts('comments'),

                TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->sortable()
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                // Filter::make('Published Posts') -> query(
                //     fn (Builder $query) => $query -> where('published',1)
                // ),

                TernaryFilter::make('published'),

                SelectFilter::make('Author')
                    -> preload()
                    -> multiple()
                    -> relationship('author','name'), 

                SelectFilter::make('category') 
                    ->multiple()
                    ->preload()
                    ->relationship('category','name'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()->color('info'),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
