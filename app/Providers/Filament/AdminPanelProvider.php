<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Widgets\UserStats;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\ReviewStats;
use App\Filament\Widgets\BookingChart;
use App\Filament\Widgets\BookingStats;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Filament\Pages\Dashboard as CustomDashboard;

class AdminPanelProvider extends PanelProvider
{
    use InteractsWithPageFilters;

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->brandName('Angklung River Camp')
            ->favicon(asset('Logo.png'))
            ->default()
            ->id('admin')
            ->path('admin')
            ->renderHook(
                'panels::footer',
                fn() => null
            )

            ->login(false)

            ->colors([
                'primary' => Color::Amber,
            ])

            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Pages'),
                for: 'App\\Filament\\Pages'
            )
            ->pages([
                CustomDashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets'
            )
            ->widgets([])

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
            ])

            ->login(false)
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
