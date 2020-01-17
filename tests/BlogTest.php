<?php

namespace Magros\PackageWorkshop\Tests;

use Magros\PackageWorkshop\Models\PackagePost;

class BlogTest extends TestCase
{

    /**
     * @test
     */
    public function it_test_that_i_can_see_all_posts()
    {
        $post = factory(PackagePost::class)->create();

        $this->visit('/package-workshop/posts')
            ->see($post->title)
            ->see($post->text);
    }

    /**
     * @test
     */
    public function it_test_that_i_can_create_a_new_post()
    {
        $name = 'Marquito es bien chingón';
        $body = 'El contenido del post';

        $this->visit('/package-workshop/posts/create')
            ->type($name, 'name')
            ->type($body, 'body')
            ->press('Guardar');

        $this->seeInDatabase('package_posts', compact('name', 'body'));
    }

    /**
     * @test
     */
    public function it_test_that_i_can_edit_a_created_post()
    {
        $name = 'New post name';
        $body = 'New post body';

        $post = factory(PackagePost::class)->create();

        $this->visit("/package-workshop/posts/{$post->id}/edit")
            ->type($name, 'name')
            ->type($body, 'body')
            ->press('Guardar');

        $this->seeInDatabase('package_posts', compact('name', 'body'));

    }

    /**
     * @test
     */
    public function it_test_that_i_can_delete_a_post()
    {
        $post = factory(PackagePost::class)->create();

        $this->visit('/package-workshop/posts')->press('Eliminar');

        $this->dontSeeInDatabase('package_posts', [
            'id' => $post->id,
            'name' => $post->name,
            'body' => $post->body,
        ]);

    }

}