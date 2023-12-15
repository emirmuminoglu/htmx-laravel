<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="w-full max-w-screen-xl mx-auto px-4" id="todo">
                        <form hx-post="/todos" hx-target="#todo-list" hx-swap="beforeend" hx-indicator="#loading"
                            _="on htmx:afterRequest reset() me">
                            <x-text-input name="title" class="w-9/12" placeholder="New todo..." required />
                            <button class="flex-no-shrink p-2 border-2 rounded text-white">Add</button>
                            <div class="text-center">
                                <img id="loading" class="htmx-indicator" src="https://htmx.org/img/bars.svg"
                                    width="25px" />
                            </div>
                        </form>
                        <ul class="todo-list" id="todo-list">
                            @foreach ($todos as $todo)
                                @include('todos.todo', ['todo' => $todo])
                            @endforeach
                        </ul>

                        @fragment('todo-count')
                            <p id="todo-count" class="text-white" hx-swap-oob="true">{{ $counter }} items left</p>
                        @endfragment
                    </section>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div>
                        <button class="bg-white p-2" _="on click toggle .bg-red-800 on me then toggle .bg-white on me">
                            Click Me
                        </button>
                    </div>
                    <div class="mt-4">
                        <button class="bg-white p-2 mr-2" _="on click increment :x then put it into the next <output/>">
                            Click Me
                        </button>
                        <output class="text-white">--</output>
                    </div>
                    <div class="mt-4">
                        <button class="p-2 mr-2" style="transition: all 800ms ease-in"
                            _="on click add .bg-red-600 then settle then remove .bg-red-600">
                            Flash Red
                        </button>
                    </div>
                    <div class="mt-4 text-white">
                        <input class="text-black" _="on keyup show <li/> in #color-list
                   when it's innerHTML contains my value">
                        <ul id="color-list">
                            <li>Red</li>
                            <li>Blue</li>
                            <li>Blueish Green</li>
                            <li>Green</li>
                            <li>Yellow</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
