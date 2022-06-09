<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hdden{
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
                                Edit Product
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
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Short Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>                            

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price" />
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>                            

                            <div class="form-group">
                                <label class="col-md-4 control control-labe">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price" />
                                    @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control">Stock</label>
                                <div class="col-md-4" wire:model="stock_status" >
                                    <select name="" id="" class="form-control">
                                        <option value="instock">InStock</option>
                                        <option value="outstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
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
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width='120' />
                                        @else
                                        <img src="{{ asset('assets/images/products') }}/{{$image}}"width="120" />
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control">Category</label>
                                <div class="col-md-4" wire:model="category_id" >
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category_id }}">{{ $category->name }}</option>
                                        @endforeach                                        
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>                                
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>                                    
                                </div>
                            </div>

                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector: '#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush