<x-layout>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <table id="book_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Idx</th>
                    <th>Book Name</th>
                    <th>Content Owner</th>
                    <th>Publisher</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{$book->book_uniq_idx}}</td>
                        <td>{{$book->bookname}}</td>
                        <td>{{$book->owner->name}}</td>
                        <td>{{$book->publisher->name}}</td>
                        <td>{{$book->created_timetick}}</td>
                        <td>
                            <a href="{{ route('book.edit', $book->idx) }}"
                                class="btn btn-outline-warning py-2">Edit</a>
                            <form action="{{ route('book.destroy', $book->idx) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger text-dark py-2" onclick="return confirm('Do you want to delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#book_table').DataTable();
            });
        </script>
</x-layout>



