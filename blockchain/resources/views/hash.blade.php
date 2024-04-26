@extends('layouts.app')

@section('title', 'Hash')
@push('style')
    <style>
        textarea {
            resize: none;
        }

        .data_box {
            position: relative;
        }

        textarea::placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            white-space: nowrap;
            font-size: 20px;
            font-weight: 500;
        }

        input[type="text"],
        textarea {
            background-color: #FFFFFF !important;
        }
    </style>
@endpush
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12 g-0">
                {{-- <img src="{{ asset('public/images/Hash.png') }}" width="120" height="50" alt=""> --}}
                <h2 class="kavoon text-white">HASH</h2>
            </div>

            <div class="row rounded p-4" style="background: #D9D9D9;">

                <div class="col-md-1 mt-2 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4"> &nbsp;DATA </label>
                </div>
                <div class="col-md-11 mt-2 g-0 data_box">
                    <textarea class="form-control" id="data" rows="10" placeholder="Insert or Paste Data Here"></textarea>
                </div>


                <div class="col-md-1 mt-4 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-3">HASH
                    </label>
                </div>
                <div class="col-md-11 mt-4 g-0">
                    <input type="text" class="form-control p-3" id="hash" value="" readonly>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            async function hashData(inputData) {
                const dataUint8Array = new TextEncoder().encode(inputData);
                const hashedArrayBuffer = await crypto.subtle.digest('SHA-256', dataUint8Array);
                const hashedHex = Array.from(new Uint8Array(hashedArrayBuffer))
                    .map(byte => byte.toString(16).padStart(2, '0'))
                    .join('');
                $('#hash').val(hashedHex);
            }

            $('#data').on('input', function() {
                var inputData = $(this).val();
                if (inputData) {
                    hashData(inputData);
                } else {
                    $('#hash').val('');
                }
            });
        });
    </script>

@endsection
