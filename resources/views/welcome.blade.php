<x-layout>
    @if (session("success"))
        <div class="alert text-center">{{session("success")}}</div>
    @endif
    <main class="mt-6">
        <div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Open_book_nae_02.svg/800px-Open_book_nae_02.svg.png" alt="" style="width: 1200px;">
        </div>
    </main>
</x-layout>




