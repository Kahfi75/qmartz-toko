<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List - Qmartz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">
        <h4 class="mb-3">Category List</h4>
        <p>A Category dashboard lets you easily gather and visualize Category data.</p>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Category</a>
            <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="fas fa-trash"></i> Clear Search</a>
        </div>
        
        <form action="{{ route('categories.index') }}" method="get" class="mb-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Rows:</label>
                    <select class="form-control" name="row">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Search:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search category">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $categories->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
