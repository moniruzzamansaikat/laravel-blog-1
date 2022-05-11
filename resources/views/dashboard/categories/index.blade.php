<x-admin-layout>
    <h1>Categories</h1>

    <a
        href="{{ route('dashboard.categories.create') }}"
        class="btn btn-primary mb-3"
        >Add new category</a
    >

    <div class="card card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Category Name</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category -> user -> name }}</td>
                        <td>
                            <a
                                href="{{ route('dashboard.categories.edit', $category->id) }}"
                                class="btn btn-primary"
                                >Edit</a
                            >
                            <form
                                action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
