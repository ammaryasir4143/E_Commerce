<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right" >All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>                            
                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Short Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Short Description"></textarea>
                                </div>
                            </div>                            

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price" />
                                </div>
                            </div>                            

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control">Stock</label>
                                <div class="col-md-4" wire:model="stock_status" >
                                    <select name="" id="" class="form-control">
                                        <option value="instock">InStock</option>
                                        <option value="outstock">Out of Stock</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control">Featured</label>
                                <div class="col-md-4"  wire:model="featured" >
                                    <select name="" id="" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control">Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image" />
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width='120' />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control">Category</label>
                                <div class="col-md-4" wire:model="category_id" >
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>                                    
                                </div>
                            </div>

                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
