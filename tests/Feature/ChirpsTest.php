<?php

namespace Tests\Feature;

use App\Http\Livewire\Chirps;
use App\Models\Chirp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        Livewire::actingAs(User::factory()->create())
            ->test(Chirps::class)
            ->set('chirp.message', 'Hello world!')
            ->call('saveChirp');

        $this->assertTrue(Chirp::whereMessage('Hello world!')->exists());
    }

    /** @test */
    public function can_delete_a_chirp()
    {
        Livewire::actingAs($user = User::factory()->create())
            ->test(Chirps::class)
            ->call('deleteChirp', Chirp::factory()->for($user)->create(['message' => 'Goodbye world!']));

        $this->assertFalse(Chirp::whereMessage('Goodbye world!')->exists());
    }

    /** @test */
    public function chirp_message_is_required()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(Chirps::class)
            ->set('chirp.message')
            ->call('saveChirp')
            ->assertHasErrors(['chirp.message' => 'required']);
    }

    /** @test */
    public function chirp_message_should_be_a_string()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(Chirps::class)
            ->set('chirp.message', 12345)
            ->call('saveChirp')
            ->assertHasErrors(['chirp.message' => 'string']);
    }

    /** @test */
    public function can_list_chirps()
    {
        Carbon::setTestNow();

        $this->actingAs($user = User::factory()->create());

        Chirp::factory()->for($user)
            ->count(3)
            ->state(new Sequence(
                ['message' => 'Hello A', 'created_at' => now()->subDay()],
                ['message' => 'Hello B', 'created_at' => now()->subHour()],
                ['message' => 'Hello C', 'created_at' => now()],
            ))
            ->create();

        Livewire::test(Chirps::class)
            ->assertViewHas('chirps')
            ->assertSeeInOrder([
                'Hello C',
                'Hello B',
                'Hello A',
            ]);
    }
}
