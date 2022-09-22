<?php

namespace Tests\Feature;

use App\Http\Livewire\Chirps;
use App\Models\Chirp;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ChirpsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function chirps_view_contains_livewire_component()
    {
        // test component presence
        $this->actingAs(User::factory()->create());

        $this->get(route('chirps'))->assertSeeLivewire(Chirps::class);
    }

    /** @test */
    public function can_create_a_chirp()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Chirps::class)
            ->set('chirp.message', 'Hello world!')
            ->call('saveChirp');

        $this->assertTrue(Chirp::whereMessage('Hello world!')->exists());
    }

    /** @test */
    public function can_delete_a_chirp()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(Chirps::class)
            ->call('deleteChirp', Chirp::factory()->for($user)->create(['message' => 'Goodbye world!']));

        $this->assertFalse(Chirp::whereMessage('Goodbye world!')->exists());
    }

    /** @test */
    public function chirp_message_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Chirps::class)
            ->set('chirp.message')
            ->call('saveChirp')
            ->assertHasErrors(['chirp.message' => 'required']);
    }

    /** @test */
    public function chirp_message_should_be_a_string()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Chirps::class)
            ->set('chirp.message', 12345)
            ->call('saveChirp')
            ->assertHasErrors(['chirp.message' => 'string']);
    }
}
