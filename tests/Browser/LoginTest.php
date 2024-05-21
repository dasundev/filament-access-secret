<?php

namespace Dasundev\FilamentAccessSecret\Tests\Browser;

use Dasundev\FilamentAccessSecret\Tests\Browser\Pages\AdminLogin;
use Dasundev\FilamentAccessSecret\Tests\Browser\Pages\AppLogin;
use Dasundev\FilamentAccessSecret\Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    /**
     * @test
     */
    public function it_can_render_non_secure_admin_login_page_without_a_secret_key()
    {
        $this->beforeServingApplication(static function ($app, $config) {
            $config->set('filament-access-secret.keys.default', null);
        });

        $this->assertNull(config('filament-access-secret.keys.default'));

        $this->browse(function (Browser $browser) {
            $browser->visit(new AdminLogin)
                ->assertSee('Sign in');
        });
    }

    /**
     * @test
     */
    public function it_can_not_render_secure_admin_login_page_without_a_secret_key()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit((new AdminLogin))
                ->assertSee('404');
        });
    }

    /**
     * @test
     */
    public function it_can_render_secure_admin_login_page_with_a_secret_key()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit((new AdminLogin)->withSecretKey('default-secret'))
                ->on(new AdminLogin)
                ->assertSee('Sign in')
                ->assertHasPlainCookie('filament_access_secret_default');
        });
    }
}
