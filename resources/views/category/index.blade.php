<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="{{$category->name}}" required/></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><textarea name="description">{!! $category->description !!}</textarea> </td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="image" required/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" required/><img src="{{ asset($category->image) }}" alt="" height="100" width="100"/></td>
        </tr>
    </table>
</form>
