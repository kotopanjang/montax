@extends('admin.admin-master-blade.admin-master')

@section('konten_bar')
@include('admin.admin-master-blade.leftbar.bar-iklan')
@endsection

@section('konten_header')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Iklan</h2>
        </div>
    </div>
</div>
@endsection

@section('konten_body')

{{-- <div> --}}
<section id="basic-tour">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tour</h4>
                </div>
                <div class="card-body">
                    <div class="btn btn-outline-primary" id="tour">Start Tour</div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- </div> --}}

<div>
    <button onclick="klikalert()">klik</button>
    <button onclick="autoclose()">auto close</button>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Admin Upload Iklan</h2>
            </div>
            <div class="panel-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                {{-- <img src="images/{{ Session::get('image') }}"> --}}
                @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('post_iklan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <h3>Munculkan Foto</h3>
    @foreach ($daftar_iklan as $row_daftar_iklan)
    <form action="{{ route('edit_iklan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" name="txtNamaFoto" value="{{$row_daftar_iklan->Nama_Foto}}">
            <div class="col-md-4">
                <img src="{{ asset("images/".$row_daftar_iklan->Nama_Foto."") }}" alt="" style="width: 100%;">
            </div>
            <div class="col-md-3"><input type="file" name="image" class="form-control"></div>
            <div class="col-md-2"><button type="submit" class="btn btn-success">Edit</button></div>
        </div>
    </form>
    @endforeach
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

    $(document).ready(function() {
        // alert('load');
        autoclose();
    });

    function klikalert()
    {
        // alert('klik');

        // Swal.fire({
        //     title: "Error!",
        //     text: "Here's my error message!",
        //     type: "error",
        //     confirmButtonText: "Cool"
        // });

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }

    function autoclose()
    {
        let timerInterval
        Swal.fire({
            // title: 'Auto close alert!',

            title: 'Sweet!',
            text: 'Modal with a custom image.',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',

            html: 'I will close in <strong><b></b></strong> seconds.',
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('strong')
                timerInterval = setInterval(() => {
                    b.textContent = (Swal.getTimerLeft() / 1000).toFixed(0)
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    }
</script>
@endsection
