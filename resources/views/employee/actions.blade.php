<body>
    <div class="d-flex">
        <a href="{{ route('employees.show', ['employee' => $employee->id]) }}"
            class="btn btn-outline-light bg-info btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
        <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
            class="btn btn-outline-warning btn-sm me-2"><i class="bi-pencil-square"></i></a>
        <div>
            <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger btn-sm me-2 btn-delete"
                    data-name="{{ $employee->firstname . ' ' . $employee->lastname }}">
                    <i class="bi-trash"></i>
                </button>
            </form>
        </div>
    </div>
</body>
