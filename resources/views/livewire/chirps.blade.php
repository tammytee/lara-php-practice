<div class="py-12">
    <div class="flex items-start max-w-2xl mx-auto space-x-4">
        <div class="flex-shrink-0">
            <img class="inline-block w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        </div>
    
        <div class="flex-1 min-w-0">
            <form action="/chirps" method="POST" class="relative">
            <div class="overflow-hidden border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                <label for="comment" class="sr-only">What's on your mind?</label>
                <textarea rows="3" name="comment" id="comment" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="What's on your mind?..."></textarea>
    
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
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Chirp</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
