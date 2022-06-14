<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .sclist{
            list-style: none;
        }        
        .sclist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size: 16px;
            margin-left: 12px;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md 6">
                                All Categories
                            </div>
                            <div class="col-md 6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach ($category->subCategories as $category)
                                                    <li><i class="fa fa-caret-right"></i>{{ $category->name }} 
                                                        <a href="{{ route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$category->slug]) }}" class="slink"><i class="fa fa-edit"></i></a>
                                                        <a href="#" onclick="confirm('Are you sure, You want to delete this subcategory?') || event.stopImediatePropagation()" wire:click.prevent="deleteSubCategory({{ $category->id }})" class="slink"><i class="fa fa-times text-danger"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.editcategory',['category_slug'=>$category->slug]) }}"><i class="fa fa-edit fas-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})" style="margin-left: 10px;"><i class="fa fa-times fas-2x test-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
