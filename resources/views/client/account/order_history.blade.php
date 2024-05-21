@extends('layouts.client.layout_account')
@section('title', 'Lịch sử mua hàng')
@section('content')
    <section class="border shadow rounded-custom py-2 px-4">
        <div class="pt-4">
            <h6 style="font-weight: 500;">Lịch sử mua hàng</h6>
            <p>Bạn có thể xem lịch sử mua hàng và trạng thái đơn hàng trực tuyến của ClassicMan tại đây.</p>
        </div>
        <hr>
        <div class="mb-4 d-flex flex-row-reverse">

            <form action="">
                <select class="form-select pl-1 pr-4" aria-label="Default select example">
                    <option value="1">Tất cả</option>

                </select>
            </form>
            {{-- @push('scripts')
    <script>
        alert('Script đang chạy');
    </script>
@endpush --}}
            <div>
                @if (session()->has('error'))
                    @push('scripts')
                        <script>
                            alert('hủy thất bại');
                        </script>
                    @endpush
                    {{-- alert(session()->get('error')) --}}

                    {{-- <div style="color: red; text-align:center" class="error">{{ session()->get('error') }}</div> --}}
                @endif
                @if (session()->has('message'))
                @push('scripts')
                <script>
                    alert('Đơn hàng không tồn tại');
                </script>
            @endpush
                @endif
                @if (session()->has('success'))
                    @push('scripts')
                        <script>
                            alert('Hủy thành công');
                        </script>
                    @endpush

                    {{-- <div style="color: rgb(82, 57, 180); text-align:center" class="error">{{ session()->get('success') }}
                    </div> --}}
                @endif



            </div>
            <h6 class="pr-2">Đơn hàng: </h6>
        </div>
        <div class="card">
            <div class="card-body">

                {{ $dataTable->table() }}


            </div>
        </div>
    </section>
    <style>
        .rounded-custom {
            border-radius: 20px;
        }

        .table.dataTable {
            font-size: 14px;
        }
    </style>
    </style>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
