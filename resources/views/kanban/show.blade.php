<x-layout.app>
    <x-navbar/>

    <x-kanban-header/>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 w-full sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        <div class="tabs tabs-border">
            <input type="radio" name="stages" class="tab sm:text-lg m-2" aria-label="Planned"/>
            <div class="tab-content border-base-300 bg-base-100 p-10">
                <x-stage/>
            </div>

            <input type="radio" name="stages" class="tab sm:text-lg m-2" aria-label="Ongoing" checked="checked"/>
            <div class="tab-content border-base-300 bg-base-100 p-10">
                <x-stage/>
            </div>

            <input type="radio" name="stages" class="tab sm:text-lg m-2" aria-label="Completed"/>
            <div class="tab-content border-base-300 bg-base-100 p-10">
                <x-stage/>
            </div>
        </div>
    </div>
</x-layout.app>
