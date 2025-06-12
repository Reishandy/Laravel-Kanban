<x-layout.app>
    <x-navbar/>

    <x-header title="Dashboard" description="Your kanbans.">
        <div class="flex flex-row gap-4">
            <button class="btn btn-soft btn-primary w-30">Join</button>
            <button class="btn btn-soft w-30">Create</button>
        </div>
    </x-header>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 w-full sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        <div class="m-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

            <x-kanban-card
                :new="true"
                code="1234-ABCD"
                title="Some kanban title"
                description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet pellentesque tortor.
                            Morbi bibendum, dolor quis congue varius, justo lorem elementum ligula, vel consequat urna
                            augue ut dolor. Pellentesque lobortis"
                edit_on_click="alert('TODO')"
                on_click="alert('TODO')"
            />

            <x-kanban-card
                :new="false"
                code="2234-ABCD"
                title="Some kanban title"
                description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet pellentesque tortor.
                            Morbi bibendum, dolor quis congue varius, justo lorem elementum ligula, vel consequat urna
                            augue ut dolor. Pellentesque lobortis"
                edit_on_click="alert('TODO')"
                on_click="alert('TODO')"
            />

            <x-kanban-card
                :new="true"
                code="3234-ABCD"
                title="Some kanban title"
                description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet pellentesque tortor.
                            Morbi bibendum, dolor quis congue varius, justo lorem elementum ligula, vel consequat urna
                            augue ut dolor. Pellentesque lobortis"
                edit_on_click="alert('TODO')"
                on_click="alert('TODO')"
            />

            @for($i = 1; $i <= 10; $i++)
                <x-kanban-card
                    :new="false"
                    code="3234-ABCD{{ $i }}"
                    title="Some kanban title"
                    description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet pellentesque tortor.
                            Morbi bibendum, dolor quis congue varius, justo lorem elementum ligula, vel consequat urna
                            augue ut dolor. Pellentesque lobortis"
                    edit_on_click="alert('TODO')"
                    on_click="alert('TODO')"
                />
            @endfor
        </div>
    </div>

    {{-- TODO:
            - list of kanban card
            - pagination
            - edit modal
            - Partials modal for create and join
    --}}
</x-layout.app>
