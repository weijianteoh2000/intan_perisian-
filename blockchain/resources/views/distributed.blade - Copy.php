@extends('layouts.app')

@section('title', 'Distributed')
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

        .greenImg,
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


    <div class="container" id="containerDiv">
        <div class="row">
            <div class="col-md-1 offset-md-2 circle_div circle_div_1">
                <div class="mb-3">
                    <img class="peerCircle pearCircle_1" data-id="1" src="{{ asset('images/Ellipse.png') }}" width="60"
                        height="60" alt="">
                    <span class="text-white">Peer A</span>
                </div>
            </div>

            <div class="col-md-1">
                <i class="mt-2 fa-solid fa-plus fa-3x" style="color: #c5c3c3;cursor: pointer;"
                    onclick="createAPeerBlock()"></i>
            </div>
        </div>


        {{-- BLOCK-1 --}}
        <div id="block_1" class="row peer_1 peer1_block1 blocks">

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


            <div id="block1" class="col-md-7 rounded bgLight">
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
                        <textarea class="form-control ms-md-3" id="block1_data" data-peer_id="1" data-id="1" rows="2" placeholder="">Loh</textarea>
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
                                id="block1_hash">6ce08c141cb7b993b0ff25299aa377ed51a710ac1be378b9ec44679d1a10b5fc</span>
                        </label>
                    </div>

                    <div class="col-md-12  mt-1 mb-1 text-center">
                        <button id="deploy" type="button" data-peer_id="1" data-count="1"
                            class="deploy_btn btn btn-secondary rounded text-dark mb-2" style="background: #A78295">&nbsp;
                            DEPLOY &nbsp;</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 hideElement comment step_1">
                <textarea style="width: initial;background: #EFFF8D;line-height:1.2;font-weight:300;" class="form-control  ms-3"
                    rows="4" placeholder="" @readonly(true)>Block 1 has been deployed</textarea>
            </div>

        </div>
        <!------------- NEW BLOCK WILL BE APPENDED --------------->


    </div>

    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
@endsection

@section('script')

    <script>
        var _token = $('#_token').val();
        var stepCount = 1;
        var blockData = ["Loh", "Yam", "Goh", "Good Morining"];
        var letters26 = "ABCDEFGHIJKLMNOPQRSTUVWXTZ";
        var CURRENT_PEAR_LETTER = "A";

        //===============##### START PLUS ICON SECTION #####=============================================//
        var BLOCK_COUNT = 1;
        var ACTIVE_PEER = 1;
        var CURRENT_PEER = 1;
        var TOTAL_PEER = 1;

        function createAPeerBlock() {
            if (ACTIVE_PEER > 0) {
                $(".pearCircle_" + ACTIVE_PEER).attr("src", "{{ asset('images/Ellipse_circle.png') }}");
                // $('#block' + ACTIVE_PEER).removeClass('bgLight').addClass('bg-lightGreen');
            }
            var totalBlock = $('.blocks').length
            if (totalBlock >= 100) {
                Error("Not allowed to create more block")
                return;
            }

            //===== Add Circle =====//
            var totalCircleDiv = $('.circle_div').length;
            var nextCircle = totalCircleDiv + 1;
            CURRENT_PEAR_LETTER = letters26.charAt(totalCircleDiv);

            $(`<div class="col-1 circle_div circle_div_${nextCircle}">
                    <div class="mb-3" style="position: relative;width: fit-content;">
                        <img class="peerCircle active_peer pearCircle_${nextCircle}" data-id="${nextCircle}"  src="{{ asset('images/Ellipse.png') }}" width="60" height="60" alt="">
                        <span class="text-white">Peer ${CURRENT_PEAR_LETTER}</span>
                        <img class="peerRemove_${nextCircle}" onclick="removeAPeer(${nextCircle})" style="position: absolute;top:0%;cursor: pointer" src="{{ asset('images/cross.png') }}" width="25"
                            height="25" alt="">
                    </div>
                </div>`).insertAfter($(".circle_div_" + totalCircleDiv));
            $(".pearCircle_" + totalCircleDiv).attr("src", "{{ asset('images/Ellipse_circle.png') }}");
            $('.peerRemove_' + totalCircleDiv).hide();
            //===== END Add Circle =====//


            //======== ADD NEW PEER ==========//
            // var next = ACTIVE_PEER + 1;
            var next = TOTAL_PEER + 1;
            $('#containerDiv .peer_' + TOTAL_PEER).each(function(index) {
                var clonedElement = $(this).clone();
                var newClass = 'peer_' + next;
                clonedElement.removeClass('peer_' + TOTAL_PEER).addClass(newClass);

                var newClass2 = `peer${next}_block${(index+1)}`;
                clonedElement.removeClass(`peer${TOTAL_PEER}_block${(index+1)}`).addClass(newClass2);

                clonedElement.find('textarea').attr('data-peer_id', next);

                clonedElement.find('.deploy_btn').attr('data-peer_id', next);
                $('#containerDiv').append(clonedElement);
            });
            //======== END ADD PEER ==========//

            $('.blocks').hide();
            TOTAL_PEER++;
            ACTIVE_PEER = TOTAL_PEER;
            $('.peer_' + ACTIVE_PEER).show();
        }


        //===== CROSS(DELETE) ICON IS CLICKED =====//
        function removeAPeer(count) {
            $('.circle_div_' + count).remove();
            let prevPeer = count - 1;
            $('.pearCircle_' + prevPeer).attr("src", "{{ asset('images/Ellipse.png') }}");
            $('.peerRemove_' + prevPeer).show();;

            if (ACTIVE_PEER > 0) {
                $(".pearCircle_" + ACTIVE_PEER).attr("src", "{{ asset('images/Ellipse_circle.png') }}");
            }
            //========
            $('.peer_' + count).remove();

            TOTAL_PEER = TOTAL_PEER - 1;
            $('.blocks').hide();
            $('.peer_' + TOTAL_PEER).show();
            ACTIVE_PEER = TOTAL_PEER;
            CURRENT_PEER = TOTAL_PEER;
        }
        //===============##### END PLUS ICON SECTION #####=============================================//



        //=============== WHEN DEPLOY BUTTON IS CLICKED ===============//
        $('#containerDiv').on('click', '.deploy_btn', function() {
            let peer_id = $(this).data("peer_id");
            let count = $(this).data("count");

            CURRENT_PEER = peer_id;
            let data = $(`.peer_${CURRENT_PEER} #block${count}_data`).val();
            if (!data) {
                let id = $(`.peer_${CURRENT_PEER} #block${count}_data`).data("id")
                checkData(peer_id, id);
                return;
            }

            $(`.peer_${CURRENT_PEER} .comment`).hide();
            var comment = 'Block 1 has been deployed';
            if (count > 1) {
                comment = `Block ${count} has been deployed and connected to block ${(count-1)}`;
            }
            $(`.peer_${CURRENT_PEER} .step_${count} textarea`).val(comment);

            if (count == stepCount) {
                $(`.peer_${CURRENT_PEER} .step_${count}`).show();
                $(`.peer_${CURRENT_PEER} .add_more_block`).show();
                $(`.peer_${CURRENT_PEER} .lightImg_${count}`).hide();
                $(`.peer_${CURRENT_PEER} .greenImg_${count}`).show();
                $(`.peer_${CURRENT_PEER} #block${count}`).removeClass('bgLight');
                $(`.peer_${CURRENT_PEER} #block${count}`).addClass('bg-lightGreen');
            }
            if (count != stepCount) {
                $(`.peer_${CURRENT_PEER} #block${count}`).removeClass('bgLightRed').addClass('bg-lightGreen');
                $(`.peer_${CURRENT_PEER} .redChainImg${(count - 1)}`).hide();
                $(`.peer_${CURRENT_PEER} .redImg_${count}`).hide();

                $(`.peer_${CURRENT_PEER} .greenImg_${count}`).show();
                $(`.peer_${CURRENT_PEER} .step_${count}`).show();
                $(`.peer_${CURRENT_PEER} .step_${count}`).show();
            }

            if (count >= 2) {
                $(`.peer_${CURRENT_PEER} .lightGreenChainImg${(count - 1)}`).show();
                $(`.peer_${CURRENT_PEER} .redChainImg${(count - 1)}`).hide();
            }

            console.log(`${count}=======${stepCount}`);

            if (count == stepCount) {
                addMoreBlock(CURRENT_PEER, count, data);
            }
        });
        //=============== END WHEN DEPLOY BUTTON IS CLICKED ===============//

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

            const hashedHexWithLeadingZeros = hashedHex;
            return hashedHexWithLeadingZeros;
        }

        $(document).ready(function() {

            $('#containerDiv').on('click', '.peerCircle', function() {
                let id = $(this).data("id");

                // $("#block" + id).removeClass('bgLight').addClass("bg-lightGreen");
                $(".active_peer").attr("src", "{{ asset('images/Ellipse_circle.png') }}");
                $(this).addClass("active_peer");
                $('.pearCircle_' + id).attr("src", "{{ asset('images/Ellipse.png') }}");

                let peerCount = $('.peerCircle').length;
                for (let i = 1; i <= peerCount; i++) {
                    $('.peer_' + i).hide();
                }

                $('.peer_' + id).show();
                ACTIVE_PEER = id;

            });


            $('#containerDiv').on('keyup', 'textarea', function() {
                let id = $(this).data("id");
                let data = $(this).val();
                if ($('#block' + (id + 1)).length > 0) {
                    if (data) {
                        let peer_id = $(this).data("peer_id");
                        checkData(peer_id, id);
                        $(`.peer_${peer_id} .comment`).hide();
                        $(`.peer_${peer_id} .step_${id}`).show();
                        $(`.peer_${peer_id} .step_${id} textarea`).val("Data has been changed");
                    }
                }
            });
        });

        function checkData(peer_id, id) {
            var blockCount = $(`.peer_${peer_id}`).length;
            stepCount = blockCount;
            for (let ids = id; ids <= (stepCount); ids++) {
                $(`.peer_${peer_id} #block${ids}_hash`).html("");
                $(`.peer_${peer_id} #block${(ids + 1)}_previous_hash`).html("");

                let data = $('#containerDiv textarea[data-id="' + ids + '"]').val();
                // Generate new hashes
                hashData(data)
                    .then(hashedResult => {
                        let hash = hashedResult.substr(0, 64);
                        $(`.peer_${peer_id} #block${ids}_hash`).html(hash);
                        $(`.peer_${peer_id} #block${(ids + 1)}_previous_hash`).html(hash);

                        $('#data').val('');
                    })
                    .catch(error => {
                        console.error("Error hashing data:", error);
                    });
                // Data didn't match, blocks are disconnected
                $(`.peer_${peer_id} #block${ids}`).removeClass('bgLight bg-lightGreen').addClass('bgLightRed');
                $(`.peer_${peer_id} #block${(ids + 1)}`).removeClass('bgLight bg-lightGreen').addClass('bgLightRed');

                $(`.peer_${peer_id} .step_${(ids + 1)}`).hide();
                $(`.peer_${peer_id} .step_${ids}`).hide();
                $(`.peer_${peer_id} .lightGreenChainImg${(ids - 1)}`).hide();
                $(`.peer_${peer_id} .lightGreenChainImg${ids}`).hide();
                $(`.peer_${peer_id} .greenImg_${ids}`).hide()
                $(`.peer_${peer_id} .greenImg_${(ids + 1)}`).hide()
                $(`.peer_${peer_id} .redImg_${(ids + 1)}`).show();
                $(`.peer_${peer_id} .redChainImg${(ids - 1)}`).show();
                $(`.peer_${peer_id} .redImg_${(ids - 1)}`).show();
                $(`.peer_${peer_id} .redImg_${ids}`).show();
                if ($(`.peer_${peer_id} #block${(ids + 1)}`).length > 0) {
                    $(`.peer_${peer_id} .redChainImg${ids }`).show();
                }
            }

            $(`.peer_${peer_id} #block${stepCount}`).removeClass('bg-lightGreen bgLightRed').addClass('bgLight');
            $(`.peer_${peer_id} .redChainImg${(stepCount - 1)}`).hide();
            $(`.peer_${peer_id} .redImg_${stepCount}`).hide();
        }

        function addMoreBlock(peerCount, count, data) {
            $(`.peer_${peerCount} .step_${(count-1)}`).hide();

            /* Create Nonce */
            var min = 1001,
                max = 9999999;
            var nonce = String(Math.round(Math.random() * (max - min) + min));
            nonce = nonce.slice(0, 5);
            let characters = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ'
            /* End Create Nonce */

            //  Create Hash
            /* if (TOTAL_PEER <= 1) { */
            if (CURRENT_PEER == TOTAL_PEER) {
                stepCount++;
                createBlock(stepCount, nonce, '');
            } else {
                stepCount = count;
            }

            hashData(data, nonce)
                .then(hashedResult => {
                    // let hash = hashedResult.slice(0, 42) + "....";
                    let hash = hashedResult;
                    if (TOTAL_PEER <= 1) {
                        $(`.peer_${CURRENT_PEER} #block${(stepCount-1)}_hash`).text(hash);
                        $(`.peer_${CURRENT_PEER} #block${stepCount}_previous_hash`).text(hash);
                    } else {
                        $(`.peer_${CURRENT_PEER} #block${(stepCount)}_hash`).text(hash);
                        $(`.peer_${CURRENT_PEER} #block${(stepCount+1)}_previous_hash`).text(hash);
                    }
                })
                .catch(error => {
                    console.error("Error hashing data:", error);
                });

        }

        function createBlock(count, nonce, data) {
            let previous_hash = $(`.peer_${CURRENT_PEER} #block${(count - 1)}_hash`).text();
            var addedBlockCount = $(`.peer_${CURRENT_PEER}`).length;

            let blockDiv = `<div id="block_${count}" class="row peer_${CURRENT_PEER} peer${CURRENT_PEER}_block${count} blocks">
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
                                <div id="block${count}" class="col-md-7 mt-3 rounded bgLight">
                                    <div class="row mt-2">
                                        <h3 class="ms-2" style="font-weight: 400">BLOCK #${count}</h3>
                                        <div class="col-md-1 mt-1 text-dark  g-0 rounded-3">
                                            <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4">NONCE:
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
                                            <textarea class="form-control ms-md-3" data-peer_id="${ACTIVE_PEER}" data-id="${count}" id="block${count}_data" rows="2" placeholder="" >${data}</textarea>
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
                                            <button id="deploy${count}" data-peer_id="${CURRENT_PEER}" data-count="${count}" type="button" class="deploy_btn  btn btn-secondary rounded text-dark mb-2"
                                                style="background: #A78295">&nbsp; DEPLOY &nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-3 hideElement comment step_${count}">
                                    <textarea style="width: initial;background: #EFFF8D;line-height:1.2font-weight:300;" class="form-control ms-3" rows="4" placeholder="" @readonly(true)>Block ${count} has been deployed and connected to block ${(count-1)}</textarea>
                                </div>
                        </div>`;
            $(blockDiv).insertAfter($(`.peer${CURRENT_PEER}_block${addedBlockCount}`));
        }

        //===============##### END MANUAL ADD BLOCK SECTION #####=====================================//

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
