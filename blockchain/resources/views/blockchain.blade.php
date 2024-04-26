@extends('layouts.app')

@section('title', 'Blockchain')
@push('style')
    <style>
        textarea {
            resize: none;
        }

        .clear-div {
            clear: both;
        }

        .hideElement {
            display: none;
        }

        .greenImg {
            display: none;
        }

        .redImg {
            display: none;
        }


        .bgLight {
            background: #D9D9D9;
        }

        .bgLightRed {
            background: #F29595;
        }

        .bg-lightGreen {
            background: #A2F295;
        }

        .lightGreenChain_img {
            display: none;
            position: absolute;
            top: 48%;
            left: 58%;
            width: 30px;
            height: 100%;
        }

        .redChain {
            display: none;
            position: absolute;
            top: 51%;
            left: 52%;
            width: 40px;
            height: 95%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
@endpush
@section('content')

    <div class="container" id="textareaContainer">
        {{-- BLOCK-1 --}}
        <div id="block_1" class="row">

            <div class="col-md-2 text-center" style="position: relative ">
                <img class="img lightImg lightImg_1" style="position:absolute ;top:35%"
                    src="{{ asset('images/Polygon_39.png') }}" width="45" height="45" alt="">
                <img class="img redImg redImg_1" style="position:absolute ;top:35%"
                    src="{{ asset('images/redPolygon.png') }}" width="45" height="45" alt="">
                <img class="img lightGreenChain_img lightGreenChainImg1" src="{{ asset('images/lightGreenChain.png') }}"
                    alt="">
                <img class="img redChain redChainImg1" src="{{ asset('images/breakLineFull.png') }}" alt="">

                <img class="img greenImg greenImg_1" style="position:absolute ;top:35%"
                    src="{{ asset('images/lightGreen.png') }}" width="45" height="45" alt="">
            </div>


            <div id="block1" class="col-md-7 blockDiv rounded bgLight">
                <div class="row mt-2">
                    <h3 class="ms-2" style="font-weight: 400">BLOCK #1</h3>
                    <div class="col-md-1 mt-1 text-dark  g-0 rounded-3">
                        <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4">NONCE:
                        </label>
                    </div>
                    <div class="col-md-11  mt-1">
                        <label for="colFormLabelSm" class="col-md-2 ms-2 col-form-label col-form-label-sm"> 11316
                        </label>
                    </div>

                    <div class="col-md-1  mt-1 text-dark g-0 rounded-3">
                        <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4 ">DATA:
                        </label>
                    </div>
                    <div class="col-md-10  mt-1 g-0 data_box">
                        <textarea class="form-control ms-md-3 input_data" data-id="1" id="block1_data" rows="2" placeholder=""></textarea>
                    </div>

                    <div class="col-md-12  mt-1 text-dark  g-0 rounded-3">
                        <label for="colFormLabelSm" class=" col-form-label col-form-label-sm ms-4">PREVIOUS HASH: &nbsp;
                            <span
                                id="block1_previous_hash">0000000000000000000000000000000000000000000000000000000000000000</span>
                        </label>
                    </div>
                    <div class="col-md-12  mt-1 text-dark  g-0 rounded-3">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm ms-4">HASH:
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="ms-5"
                                id="block1_hash">000015783b764259d201gh7d9136d206600e2cb356gffg4fg434tbg4fg434tb3</span>
                        </label>
                    </div>

                    <div class="col-md-12  mt-1 mb-1 text-center">
                        <button id="deploy" type="button" class="deploy_btn btn btn-secondary rounded text-dark mb-2"
                            style="background: #A78295" onclick="deploy(1)">&nbsp; DEPLOY &nbsp;</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 hideElement comment step_1">
                <textarea style="width: initial;background: #EFFF8D;line-height:1.2;font-weight:300;" class="form-control  ms-3"
                    rows="4" placeholder="" @readonly(true)>Block 1 has been deployed</textarea>
            </div>

        </div>
        {{-- BLOCKS --}}


        <div class="row mt-3 hideElement add_more_block">
            <div class="col-md-5 offset-md-3 rounded" style="background: #D9D9D9;">
                <div class="row mt-2">
                    <div class="col-md-1  mt-2 text-dark g-0 rounded-3">
                        <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-2 ">DATA:
                        </label>
                    </div>
                    <div class="col-md-10  mt-3 g-0 data_box">
                        <textarea class="form-control ms-md-3" id="data" rows="2" placeholder=""></textarea>
                    </div>

                    <div class="col-md-12  mt-1 mb-1 text-center">
                        <button id="addMoreBlockBtn" type="button" class="btn btn-secondary rounded text-dark mt-2 mb-2"
                            style="background: #A78295;font-weight:400">ADD MORE BLOCK</button>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
@endsection

@section('script')

    <script>
        var stepCount = 1;
        var redArr = [];

        function deploy(count) {

            if (redArr.length > 0) {
                if (redArr[0] == count) {
                    redArr.shift();
                } else {
                    return;
                }
            }


            let data = $('#block' + count + '_data').val();
            if (!data) {
                let id = $('#block' + count + '_data').data("id")
                checkData(id);
                return;
            }
            $('.comment').hide();
            if (count == stepCount) {
                // $('.step_' + count).show();
                // $('.add_more_block').show();
                $('.lightImg_' + count).hide();
                $('.greenImg_' + count).show();
                $('#block' + count).removeClass('bgLight');
                $('#block' + count).addClass('bg-lightGreen');
                addMoreBlockBtn(count);

            }
            if (count != stepCount) {
                $('#block' + count).removeClass('bgLightRed').addClass('bg-lightGreen');
                $('.redChainImg' + (count - 1)).hide();
                $('.redImg_' + count).hide();
                $('.greenImg_' + count).show();

                // $('.step_' + count).show();
                // $('.step_' + count).show();
            }

            if (count >= 2) {
                $('.lightGreenChainImg' + (count - 1)).show();
            }


        }

        /* Block-1 */
        function addMoreBlockBtn(count) {
            let data = "";
            // $('.add_more_block').hide();
            $('.step_' + (count - 1)).hide();
            $('.step_' + count).show();
            stepCount++;


            /* Create Nonce */
            var min = 1001,
                max = 9999999;
            var nonce = String(Math.round(Math.random() * (max - min) + min));
            nonce = nonce.slice(0, 5);
            let characters = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ'
            let length = 5;
            /* End Create Nonce */

            //  Create Hash
            createBlock(stepCount, nonce, data);
            hashData(data, nonce)
                .then(hashedResult => {
                    let hash = hashedResult.substr(0, 64);
                    $('#block' + stepCount + '_hash').text(hash);
                    $('#data').val('');
                })
                .catch(error => {
                    console.error("Error hashing data:", error);
                });


        }

        function createBlock(count, nonce, data) {
            let previous_hash = $('#block' + (count - 1) + '_hash').text()
            let len = $('.blockDiv').length;
            let blockDiv = `<div id="block_${len+1}" class="row">
                                <div class="col-md-2 mt-3 text-center" style="position: relative ">
                                    <img class="img lightImg lightImg_${count}" style="position:absolute ;top:35%"
                                        src="{{ asset('images/Polygon_39.png') }}" width="45" height="45" alt="">
                                    <img class="img redImg redImg_${count}" style="position:absolute ;top:35%" src="{{ asset('images/redPolygon.png') }}"
                                            width="45" height="45" alt="">
                                    <img class="img lightGreenChain_img lightGreenChainImg${count}"
                                        src="{{ asset('images/lightGreenChain.png') }}" alt="">
                                    <img class="img redChain redChainImg${count}" src="{{ asset('images/breakLineFull.png') }}"
                                        alt="">
                                    <img class="img greenImg greenImg_${count}" style="position:absolute ;top:35%"
                                        src="{{ asset('images/lightGreen.png') }}" width="45" height="45" alt="">
                                </div>
                                <div id="block${count}" class="col-md-7 mt-3 blockDiv rounded bgLight">
                                    <div class="row mt-2">
                                        <h3 class="ms-2" style="font-weight: 400">BLOCK #${count}</h3>
                                        <div class="col-md-1 mt-1 text-dark  g-0 rounded-3">
                                            <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4">NONCE: &nbsp;&nbsp; 
                                            </label>
                                        </div>
                                        <div class="col-md-11  mt-1">
                                            <label for="colFormLabelSm" class="col-md-2 ms-2 col-form-label col-form-label-sm"> ${nonce}
                                            </label>
                                        </div>

                                        <div class="col-md-1  mt-1 text-dark g-0 rounded-3">
                                            <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4">DATA:
                                            </label>
                                        </div>
                                        <div class="col-md-10  mt-1 g-0 data_box">
                                            <textarea class="form-control ms-md-3 input_data" data-id="${count}" id="block${count}_data" rows="2" placeholder="data">${data}</textarea>
                                        </div>

                                        <div class="col-md-12  mt-1 text-dark  g-0 rounded-3">
                                            <label for="colFormLabelSm" class="col-form-label col-form-label-sm ms-4">PREVIOUS HASH: &nbsp;
                                                <span id="block${count}_previous_hash">${previous_hash}</span>
                                            </label>
                                        </div>
                                        <div class="col-md-12  mt-1 text-dark  g-0 rounded-3">
                                            <label for="colFormLabelSm" class=" col-form-label col-form-label-sm ms-4">HASH:
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
                                                    class="ms-5" id="block${count}_hash"></span>
                                            </label>
                                        </div>

                                        <div class="col-md-12  mt-1 mb-1 text-center">
                                            <button id="deploy${count}" type="button" class="deploy_btn  btn btn-secondary rounded text-dark mb-2"
                                                style="background: #A78295" onclick="deploy(${count})">&nbsp; DEPLOY &nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-3 hideElement comment step_${count}">
                                    <textarea style="width: initial;background: #EFFF8D;line-height:1.2font-weight:300;" class="form-control ms-3" rows="4" placeholder="" @readonly(true)>Block ${count} has been deployed and connected to block ${(count-1)}</textarea>
                                </div>
              
                                </div>`;
            $(blockDiv).insertAfter($("#block_" + len));
        }


        function checkData(id) {

            for (let i = id; i <= (stepCount); i++) {
                // Clear the hash of the current block and the previous hash of the next block
                $('#block' + i + '_hash').html("");
                $('#block' + (i + 1) + '_previous_hash').html("");

                // Get the data from the textarea
                let data = $('#textareaContainer textarea[data-id="' + i + '"]').val();

                // Generate new hashes
                hashData(data)
                    .then(hashedResult => {
                        let hash = hashedResult.substr(0, 64);
                        $('#block' + i + '_hash').html(hash);
                        $('#block' + (i + 1) + '_previous_hash').html(hash);
                        $('#data').val('');
                    })
                    .catch(error => {
                        console.error("Error hashing data:", error);
                    });

                // Data didn't match, blocks are disconnected
                $('#block' + i).removeClass('bgLight bg-lightGreen').addClass('bgLightRed');
                
                $('.step_' + (i + 1)).hide();
                $('.step_' + i).hide();
                $('.lightGreenChainImg' + (i - 1)).hide();
                $('.lightGreenChainImg' + i).hide();
                $('.greenImg_' + i).hide()
                $('.greenImg_' + (i + 1)).hide()
                $('.redImg_' + (i + 1)).show();
                $('.redChainImg' + (i - 1)).show();
                $('.redImg_' + (i - 1)).show();
                $('.redImg_' + i).show();
                if ($('#block' + (i + 1)).length > 0) {
                    $('.redChainImg' + i).show();
                }
            }

            $('#block' + stepCount).removeClass('bg-lightGreen bgLightRed').addClass('bgLight');
            $('.redChainImg' + (stepCount - 1)).hide();
            $('.redImg_' + stepCount).hide();


        }



        $(document).ready(function() {
            $('#textareaContainer').on('keyup', 'textarea', function() {
                let id = $(this).data("id");
                let data = $(this).val();
                if ($('#block' + (id + 1)).length > 0) {
                    if (data) {
                        checkData(id); 
                        $('.comment').hide();
                        $('.step_' + id).show();
                        $('.step_'+id+' textarea').val("Data has been changed");
                    }
                }
            });
        });





        async function hashData(inputData, userNonce) {
            const nonceUint8Array = new TextEncoder().encode(userNonce);
            const dataUint8Array = new TextEncoder().encode(inputData);

            const concatenatedArray = new Uint8Array(nonceUint8Array.length + dataUint8Array.length);
            concatenatedArray.set(nonceUint8Array, 0);
            concatenatedArray.set(dataUint8Array, nonceUint8Array.length);

            const hashedArrayBuffer = await crypto.subtle.digest('SHA-256', concatenatedArray);

            const hashedHex = Array.from(new Uint8Array(hashedArrayBuffer))
                .map(byte => byte.toString(16).padStart(2, '0'))
                .join('');

            const hashedHexWithLeadingZeros = '0000' + hashedHex;
            return hashedHexWithLeadingZeros;
        }




        function Error(txt) {
            Swal.fire({
                title: 'Error!',
                text: txt,
                icon: 'error',
                confirmButtonText: 'close'
            });
        }
    </script>

@endsection
