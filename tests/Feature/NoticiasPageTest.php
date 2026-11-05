<?php

namespace Tests\Feature;

use App\Models\Noticia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoticiasPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_pages_render_the_news_template(): void
    {
        foreach (['/', '/noticias', '/noticas'] as $url) {
            $this->get($url)
                ->assertOk()
                ->assertSee('Noticias del centro')
                ->assertSee('Últimas noticias');
        }
    }

    public function test_published_news_is_listed_and_can_be_edited(): void
    {
        $this->post(route('noticias.store'), [
            'titulo' => 'Feria de ciencias',
            'contenido' => 'La feria se celebrará el viernes.',
        ])->assertRedirect(route('noticias.index'));

        $noticia = Noticia::firstOrFail();

        $this->get(route('noticias.index'))
            ->assertOk()
            ->assertSee('Feria de ciencias')
            ->assertSee('La feria se celebrará el viernes.')
            ->assertSee(route('noticias.edit', $noticia), false);

        $this->get(route('noticias.edit', $noticia))
            ->assertOk()
            ->assertSee('value="Feria de ciencias"', false)
            ->assertSee('La feria se celebrará el viernes.');

        $this->put(route('noticias.update', $noticia), [
            'titulo' => 'Feria de ciencias 2026',
            'contenido' => 'La feria será el próximo viernes.',
        ])->assertRedirect(route('noticias.index'));

        $this->assertDatabaseHas('noticias', [
            'id' => $noticia->id,
            'titulo' => 'Feria de ciencias 2026',
            'contenido' => 'La feria será el próximo viernes.',
        ]);
    }
}
