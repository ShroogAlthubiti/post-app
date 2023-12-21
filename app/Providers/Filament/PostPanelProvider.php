<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
class PostPanelProvider extends PanelProvider
{   
    public function panel(Panel $panel): Panel
    {  
        return $panel
            ->id('post')
            ->path('post')
            ->colors([
                'primary' => Color::Indigo,
            ])
             ->brandLogo("https://cdn.iconscout.com/icon/free/png-256/free-message-672-675248.png?f=webp")
             ->favicon("https://cdn.iconscout.com/icon/free/png-256/free-message-672-675248.png?f=webp")
            ->discoverResources(in: app_path('Filament/Post/Resources'), for: 'App\\Filament\\Post\\Resources')
            ->discoverPages(in: app_path('Filament/Post/Pages'), for: 'App\\Filament\\Post\\Pages')
            ->navigationItems([
                NavigationItem::make('Home')
                ->url('/' , shouldOpenInNewTab:false)
                ->icon('heroicon-o-clipboard-document-list')
                
            ])
            ->discoverWidgets(in: app_path('Filament/Post/Widgets'), for: 'App\\Filament\\Post\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
            
    }
}