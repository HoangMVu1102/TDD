<?php

namespace Tests\Feature;

use phpDocumentor\Reflection\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects',$attributes)->assertRedirect('/projects');
        $this->assertDatabaseHas('projects', $attributes);
        $this->get('/projects')->assertDontSee($attributes['title']);

    }
//    assertSessionDoesntHaveErrors =  testing the response with asserting the session has no errors
    public function a_project_requires_a_title()
    {
//        create = build the attribute & safe to the db
//        make = build the attribute
//        raw = build the attribute but store as an array not a object
        $attribute = factory('App\Project')->raw(['title'=>'']);
        $this->post('/projects',$attribute)->assertSessionDoesntHaveErrors('tittle');

    }
    public function a_project_requires_a_description()
    {
        $attribute = factory('App\Project')->raw(['description'=>'']);
        $this->post('/projects',$attribute)->assertSessionDoesntHaveErrors('description');
    }

    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);

    }

}
