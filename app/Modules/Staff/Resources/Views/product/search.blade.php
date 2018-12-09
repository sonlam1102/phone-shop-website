<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <form class="input-group" role="form" action="/staff/product/" method="GET">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="name" value="{{ app('request')->input('name') }}"/>
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .dropdown.dropdown-lg .dropdown-menu {
        margin-top: -1px;
        padding: 6px 20px;
    }
    .input-group-btn .btn-group {
        display: flex !important;
    }
    .btn-group .btn {
        border-radius: 0;
        margin-left: -1px;
    }
    .btn-group .btn:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .btn-group .form-horizontal .btn[type="submit"] {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .form-horizontal .form-group {
        margin-left: 0;
        margin-right: 0;
    }
    .form-group .form-control:last-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    @media screen and (min-width: 768px) {
        #adv-search {
            width: 500px;
            margin: 0 auto;
        }
        .dropdown.dropdown-lg {
            position: static !important;
        }
        .dropdown.dropdown-lg .dropdown-menu {
            min-width: 500px;
        }
    }
</style>