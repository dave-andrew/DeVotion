<div x-cloak x-show="search" x-on:click="search=false" x-data="searchComponent()"
     class="z-50 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black bg-opacity-50">
    <div @click.stop
         class="z-50 bg-white max-w-3xl w-full max-h-96 h-full m-auto flex flex-col py-4 rounded-lg text-black">
        {{-- Search Bar --}}
        <div class="w-full flex items-center px-4 mb-3">
            <i class="fa-solid fa-magnifying-glass fa-lg mr-2 text-gray-500"></i>
            <label class="w-full">
                <input x-model="inputSearch" name="search_input" class="w-full text-black text-xl outline-none border-none ring-0" type="text"
                       placeholder="Search in Your Notion...">
            </label>
        </div>
        {{-- List of all workspace --}}
        <div class="w-full border-t border-gray-300 px-2 py-4 box-border overflow-y-auto">
            <template x-for="team in filteredTeams" :key="team.id">
                <div class="pl-4 mb-4">
                    <h1 class="text-gray-500 font-bold opacity-70" x-text="team.name"></h1>

                    <template x-for="note in team.notes" :key="note.id">
                        <form :action="'/workspace/' + {{ $workspace->id }} + '/note/' + note.id" method="POST"
                              class="w-full pl-4 py-2 flex items-center flex-shrink-0 flex-grow rounded-md hover:bg-stone-200 hover:cursor-pointer transition-all duration-300">
                            @csrf
                            <input type="hidden" name="note_id" x-bind:value="note.id">
                            <i class="fa-regular fa-file-zipper fa-lg mr-2"></i>
                            <div class="flex items-center flex-1 text-nowrap text-clip overflow-hidden">
                                <button type="submit" class="text-ellipsis text-sm font-medium whitespace-nowrap overflow-hidden" x-text="note.title"></button>
                            </div>
                        </form>
                    </template>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
    function searchComponent() {
        return {
            inputSearch: '',
            teams: @json($teams),
            get filteredTeams() {
                if (!this.inputSearch) {
                    return this.teams;
                }
                const searchLower = this.inputSearch.toLowerCase();
                return this.teams.map(team => {
                    const filteredNotes = team.notes.filter(note => note.title.toLowerCase().includes(searchLower));

                    return {
                        ...team,
                        notes: filteredNotes
                    };
                }).filter(team => team.notes.length > 0);
            }
        }
    }
</script>
