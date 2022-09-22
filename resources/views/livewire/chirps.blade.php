<div class="max-w-2xl py-12 mx-auto">
    <div class="flex-1 min-w-0">
        <form wire:submit.prevent="saveChirp" class="relative">
            <div
                class="overflow-hidden border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                <label for="comment" class="sr-only">What's on your mind?</label>
                <textarea wire:model.defer="chirp.message" rows="3" name="comment" id="comment"
                    class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="What's on your mind?..."></textarea>

                <!-- Spacer element to match the height of the toolbar -->
                <div class="py-2" aria-hidden="true">
                    <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                    <div class="py-px">
                        <div class="h-9"></div>
                    </div>
                </div>
            </div>

            <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                <div class="flex items-center space-x-5">
                    <!-- placeholder -->
                </div>
                <div class="flex-shrink-0">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Chirp</button>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-2">
        <ul role="list" class="divide-y divide-gray-200">
            @forelse ($chirps as $chirp)
                <li class="pb-6 pt-10 group hover:cursor-pointer">
                    <div class="flex space-x-3">
                        <img class="w-6 h-6 rounded-full"
                            src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                            alt="">
                        <div class="flex-1 space-y-1">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-medium">{{ $chirp->user->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $chirp->created_at->diffForHumans() }}</p>
                            </div>
                            <p class="text-sm text-gray-500">{{ $chirp->message }}</p>
                        </div>
                    </div>

                    <div class="flex justify-end h-5">
                        <button 
                            wire:click="deleteChirp({{ $chirp }})"
                            class="text-gray-500 hover:text-red-700 hidden group-hover:block"
                            title="delete"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </li>
            @empty
                <li class="py-4 text-lg italic text-center text-gray-400">No Chirps</li>
            @endforelse
        </ul>
    </div>
</div>
