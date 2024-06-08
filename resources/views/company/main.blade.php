@include('company/layouts/header')

<div class="wrapper">

    @include('company/layouts/navbar')
    @include('company/layouts/sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title  }}</h1>
                    </div>
                    
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                
                @yield('konten')
            </div>
        </section>
      
    </div>
</div>

@include('company/layouts/footer')
