<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3 class="text-light text-center my-3">Book Edit Form</h3>
                <div class="card p-5 my-3 shadow-sm">
                    <form method="POST" action="{{ route('book.update', $book->idx ) }}"  enctype="multipart/form-data">
                        @csrf
                        @method("patch")
                        <div>
                            <x-forms.label name="co_id" />
                            <select name="co_id" id="owner" class="form-control">
                                @foreach ($owners as $owner)
                                <option {{$owner->idx == old("co_id",$book->co_id) ? "selected" : " "}} value="{{$owner->idx}}">{{$owner->name}}</option>
                                @endforeach
                            </select>
                            <x-error name="co_id" />
                        </div>
                        <div class="mb-4">
                            <x-forms.label name="publisher_id" />
                            <select name="publisher_id" id="publisher" class="form-control">
                                @foreach ($publishers as $publisher)
                                <option {{$publisher->idx == old("publisher_id",$book->publisher_id) ? "selected" : " "}} value="{{$publisher->idx}}">{{$publisher->name}}</option>
                                @endforeach
                            </select>
                            <x-error name="publisher_id" />
                        </div>
                        <div class="input_field mb-4">
                            <input type="text" class="form-control" name="book_uniq_idx" placeholder="Enter Book ID"
                            value="{{ old('book_uniq_idx', $book->book_uniq_idx) }}">
                            <x-error name="book_uniq_idx" />
                        </div>
                        <div class="input_field mb-4">
                            <input type="text" class="form-control" name="bookname" placeholder="Enter Book Name"
                            value="{{ old('bookname', $book->bookname) }}">
                            <x-error name="bookname" />
                        </div>
                        <div class="input_field mb-4">
                            <input type="file" class="form-control" name="cover_photo"  value="{{ old('cover_photo', $book->cover_photo) }}"
                           >
                           <x-error name="cover_photo" />
                        </div>
                        <div class="input_field mb-4">
                            <input type="text" class="form-control" name="prize" placeholder="Enter Book Prize"
                            value="{{ old('prize', $book->prize) }}">
                            <x-error name="prize" />
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-outline-dark rounded-pill px-5 text-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
