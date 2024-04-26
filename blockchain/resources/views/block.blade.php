@extends('layouts.app')

@section('title', 'Block')
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

        .active_btn,
        .success_img,
        .hash_completed_section {
            display: none;
        }

        #answer {
            width: 110px !important;
            height: 30px !important;
            display: block;
            border: none;
            border-bottom: 1px solid #54595E;
            outline: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
@endpush
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12 g-0">
                {{-- <img src="{{ asset('images/Hash.png') }}" width="120" height="50" alt=""> --}}
                <h2 class="kavoon text-white">BLOCK</h2>
            </div>

            <div class="row mb-3 rounded " style="background: #D9D9D9;">

                <div class="col-md-1 mt-4 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">BLOCK
                    </label>
                </div>
                <div class="col-md-11 mt-4 g-0">
                    <input type="text" class="form-control p-2" value="#1" readonly>
                </div>
                <div class="col-md-1 mt-2 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">NONCE
                    </label>
                </div>
                <div class="col-md-11 mt-2 g-0">
                    <input type="text" id="nonce" class="form-control p-2" value="5">
                </div>


                <div class="col-md-1 mt-2 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4"> &nbsp;DATA </label>
                </div>
                <div class="col-md-11 mt-2 g-0 data_box">
                    <textarea class="form-control" id="data" rows="6" placeholder="Insert or Paste Data Here"></textarea>
                </div>


                <div class="col-md-1 mt-4 mb-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">HASH
                    </label>
                </div>
                <div class="col-md-11 mt-4 mb-3 g-0">
                    <input id="hash" type="text" class="form-control p-2" value="" readonly>
                </div>

                {{-- Buttons section --}}
                <div class="row mb-2">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <button id="mine_inactive" type="button" class="btn btn-secondary rounded mb-2 pe-none"
                            style="background:#999494;font-weight: 400;"><span style="opacity: 0.4;">&nbsp;&nbsp;&nbsp; MINE
                                &nbsp;&nbsp;&nbsp;</span></button>
                        <button id="mine_active" type="button" class="active_btn  btn btn-secondary rounded text-dark mb-2"
                            style="background: #A78295;font-weight: 500;"> &nbsp;&nbsp;&nbsp; MINE &nbsp;&nbsp;&nbsp;
                        </button>
                    </div>

                    <div class="col-md-2">
                        <button id="distribute_inactive" type="button" class="btn btn-secondary rounded mb-2 pe-none"
                            style="background:#999494;font-weight: 400;"><span
                                style="opacity: 0.4;">DISTRIBUTE</span></button>
                        <button id="distribute_active" type="button"
                            class="active_btn  btn btn-secondary rounded text-dark mb-2"
                            style="background: #A78295;font-weight: 500;">DISTRIBUTE</button>
                    </div>
                    <div class="col-md-2">
                        <button id="consensus_inactive" type="button" class="btn btn-secondary rounded mb-2 pe-none"
                            style="background:#999494;font-weight: 400;"><span
                                style="opacity: 0.4;">CONSENSUS</span></button>
                        <button id="consensus_active" type="button"
                            class="active_btn  btn btn-secondary rounded text-dark mb-2"
                            style="background: #A78295;font-weight: 500;">CONSENSUS</button>
                    </div>
                    <div class="col-md-2">
                        <button id="reward_inactive" type="button" class="btn btn-secondary rounded mb-2 pe-none"
                            style="background:#999494;font-weight: 400;"><span style="opacity: 0.4;">&nbsp; REWARD
                                &nbsp;</span></button>
                        <button id="reward_active" type="button"
                            class="active_btn  btn btn-secondary rounded text-dark mb-2"
                            style="background: #A78295;font-weight: 500;">&nbsp; REWARD &nbsp;</button>
                    </div>
                    <div class="col-md-2">
                        <button id="deploy_inactive" type="button" class="btn btn-secondary rounded mb-2 pe-none"
                            style="background:#999494;font-weight: 400;"><span style="opacity: 0.4;">&nbsp; DEPLOY
                                &nbsp;</span></button>
                        <button id="deploy_active" type="button"
                            class="active_btn  btn btn-secondary rounded text-dark mb-2"
                            style="background: #A78295;font-weight: 500;">&nbsp; DEPLOY &nbsp;</button>
                    </div>

                    {{-- HASH COMPLETED SECTION --}}
                    <div class="hash_completed_section col-md-1 offset-md-1 mt-3 mb-4">
                        <img src="{{ asset('images/Cube.png') }}" alt="">
                    </div>
                    <div id="hash_completed_section" class="hash_completed_section col-md-10 mt-3  mb-4 fw-bold">
                        <div class="ms-3">
                            <span>Block: #1</span> <br>
                            <span id="nonce_show">Nonce: 5</span> <br>
                            <span id="data_show">Data: 1234567</span> <br>
                            <span>Previous Hash: 0000000000000000000000000000000000000000000000000000000000000000</span>
                            <br>
                            <span id="hash_show">Present Hash:
                                000015783b764259d201gh7d9136d206600e2cb356gffg4fg434gffg4fg434ag</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px !important; height: 250px;">
            <div class="modal-content">
                <div class="modal-body" style="">
                    <div class="container">
                        <div class="row"
                            style="display: flex; justify-content:center;align-items: center;padding:1rem; text-align:center">
                            <h5 class="fw-bolder" style="width: 90%">Problem Solving</h5>
                            <span class="fw-bolder" style="color:#54595E;font-size:20px" id="random_number"> 5+5
                                =
                                ?
                            </span>
                            <br>
                            <span style="color:#54595E;font-size:18px;opacity:0.6"> Answer:</span>
                            <input type="text" id="answer">
                            <button id="answerOkBtn" class="answerOkBtn mt-3 btn btn-secondary"
                                style="background:#4F4F4F;color:#F5F5F5" type="button">Okay</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="image_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px !important; height: 250px;">
            <div class="modal-content">
                <div class="modal-body" style="height: 250px;padding-top:0px;">

                    <div class="img_modal_body distibute_body">
                        <img src="{{ asset('images/distibute2.png') }}" alt=""
                            style="width: 100%;height: 250px;">
                    </div>
                    <div class="img_modal_body consensus_body">
                        <img src="{{ asset('images/consensus2.png') }}" alt=""
                            style="width: 100%;height: 250px;">
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal" id="success_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px !important; height: 250px;">
            <div class="modal-content">
                <div class="modal-body" style="height: 250px;">
                    <div class="container mt-5" id="add_mt">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="success_img float-end" id="success_mine"
                                            src="{{ asset('images/check-one.png') }}" style="opacity: 0.5" width="50"
                                            height="50" alt="">
                                        <img class="success_img float-end" id="success_distribute"
                                            src="{{ asset('images/successDistributeIcon.png') }}" width="50"
                                            height="50" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <h5 class="fw-bolder" style="width: 90%">Block Status</h5>
                                        <span style="color:#54595E;font-size:18px;opacity:0.6" id="success_msg"> Congrats,
                                            you have
                                            successfully mine this
                                            block. </span>
                                    </div>
                                </div>

                            </div>
                            <div class="d-grid gap-2 mt-4 mb-3">
                                <button id="success_btn" class="success_btn btn btn-secondary"
                                    style="background:#4F4F4F;color:#F5F5F5" type="button">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="modal" id="success_modal2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px !important; height: 250px;">
            <div class="modal-content">
                <div class="modal-body" style="height: 250px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" id="reward_section">
                                <div class="col-md-12 text-center">
                                    <img class="" src="{{ asset('images/Coin_in_Hand.png') }}" width="50"
                                        height="40" alt="">
                                </div>
                                <div class="col-md-12">
                                    <h5 class="fw-bold" style="width: 100%;color:#808080">Congrats !
                                    </h5>
                                    <h5 class="fw-bold" style="width: 100%;color:#808080">You was paid with mining
                                        rewards
                                    </h5>
                                    <span style="display:block;color:#54595E;font-size:18px;opacity:0.6">To:
                                        0xehwqagdvwad </span>
                                    <span style="display:block;color:#54595E;font-size:18px;opacity:0.6">Amount: 100
                                        eth </span>
                                </div>
                            </div>
                            <div class="col-md-12" id="deploy_section">
                                <div class="col-md-12 text-center">
                                    <img class="" src="{{ asset('images/Blocksuccesslink_deploy.png') }}"
                                        width="140" height="80" alt="">
                                </div>
                                <div class="col-md-12">
                                    <h5 class="fw-bold" style="width: 100%;color:#808080">Successfully deployed to
                                        blockchain
                                    </h5>
                                    <span style="display:block;color:#54595E;font-size:18px;opacity:0.6">This block was
                                        successfully mined and added into blockchain </span>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-3 mb-3">
                                <button id="success_btn2" class="success_btn2 btn btn-secondary"
                                    style="background:#4F4F4F;color:#F5F5F5" type="button">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var hashed = '';
            var data = '';
            var step = 'mine';
            //////////////////////////////////////////////////////////////////////////////////////////
            async function hashData(inputData, userNonce) {
                // Convert nonce and input data to Uint8Array
                const nonceUint8Array = new TextEncoder().encode(userNonce);
                const dataUint8Array = new TextEncoder().encode(inputData);

                // Concatenate nonce and input data
                const concatenatedArray = new Uint8Array(nonceUint8Array.length + dataUint8Array.length);
                concatenatedArray.set(nonceUint8Array, 0);
                concatenatedArray.set(dataUint8Array, nonceUint8Array.length);

                // Hash the concatenated array
                const hashedArrayBuffer = await crypto.subtle.digest('SHA-256', concatenatedArray);

                // Convert hashed result to hexadecimal string
                const hashedHex = Array.from(new Uint8Array(hashedArrayBuffer))
                    .map(byte => byte.toString(16).padStart(2, '0'))
                    .join('');

                return hashedHex;
            }
            //////////////////////////////////////////////////////////////////////////////////////////


            $("#data").on("keyup", function(e) {
                data = $(this).val();
                if (data) {
                    $('#mine_inactive').hide();
                    $('#mine_active').show();
                } else {
                    $('#mine_active').hide();
                    $('#mine_inactive').show();
                }

            });
            var randomNumberSum = 0;
            $("#mine_active").click(function() {
                $('#modal').modal('show');
                let num1 = Math.floor(Math.random() * 9) + 1;
                let num2 = Math.floor(Math.random() * 9) + 1;
                let randomNumber = num1 + " + " + num2 + " = ? ";

                randomNumberSum = num1 + num2;
                $('#random_number').text(randomNumber);
            });

            $('#answer').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    let sum = $(this).val();
                    let nonce = $('#nonce').val();
                    if (sum == randomNumberSum) {
                        $('#modal').modal('hide');
                        $('#success_modal').modal('show');
                        $('#success_mine').show();
                        //  Create Hash
                        hashData(data, nonce)
                            .then(hashedResult => {
                                hashed = hashedResult;
                            })
                            .catch(error => {
                                console.error("Error hashing data:", error);
                            });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: "The sum you entered is incorrect.",
                            icon: 'error',
                            confirmButtonText: 'Close'
                        });
                    }
                }
            });


            $("#answerOkBtn").click(function() {
                let sum = $('#answer').val();
                let nonce = $('#nonce').val();
                if (sum == randomNumberSum) {
                    $('#modal').modal('hide');
                    $('#success_modal').modal('show');
                    $('#success_mine').show();
                    //  Create Hash
                    hashData(data, nonce)
                        .then(hashedResult => {
                            hashed = hashedResult;
                        })
                        .catch(error => {
                            console.error("Error hashing data:", error);
                        });
                } else { // If the sum doesn't match
                    Swal.fire({
                        title: 'Error!',
                        text: "The sum you entered is incorrect.",
                        icon: 'error',
                        confirmButtonText: 'Close'
                    });
                }
            });

            /* DISTRIBUTE */
            $("#distribute_active").click(function() {

                if ($("#add_mt").hasClass('mt-4')) {
                    $("#add_mt").removeClass('mt-4');
                }
                $("#add_mt").addClass('mt-5');

                $('.img_modal_body').hide();
                $('#image_modal .distibute_body').show();
                $('#image_modal').modal('show');
                setTimeout(function() {
                    $('#image_modal').modal('hide');
                    $('.success_img').hide();
                    $('#success_distribute').show();
                    $('#success_msg').text(
                        " This block was successfully distributed to all the nodes");
                    $('#success_modal').modal('show');
                    step = 'distribute';
                }, 2000);
            });
            /* CONSENSUS */
            $("#consensus_active").click(function() {

                if ($("#add_mt").hasClass('mt-5')) {
                    $("#add_mt").removeClass('mt-5');
                }
                $("#add_mt").addClass('mt-4');

                $('.img_modal_body').hide();
                $('#image_modal .consensus_body').show();
                $('#image_modal').modal('show');
                setTimeout(function() {
                    $('#image_modal').modal('hide');
                    $('.success_img').hide();
                    $('#success_mine').show();

                    $('#success_msg').text(
                        " This block was successfully approved by majority of the miners with 75%"
                    );
                    $('#success_modal').modal('show');
                    step = 'consensus';
                }, 2000);
            });
            /* REWARD */
            $("#reward_active").click(function() {
                $('#deploy_section').hide();
                $('#reward_section').show();
                $('#success_modal2').modal('show');
                step = 'reward';
            });
            /* DEPLOY */
            $("#deploy_active").click(function() {
                $('#reward_section').hide();
                $('#deploy_section').show();
                $('#success_modal2').modal('show');
                step = 'deploy';
            });

            /* The End */

            $("#success_btn").click(function() {
                showAndHide(step);
            });
            $("#success_btn2").click(function() {
                showAndHide(step);
            });

            function showAndHide(step) {
                if (step == 'mine') {
                    if (hashed) {
                        $('#hash').val(hashed);
                        $('#mine_active').hide();
                        $('#mine_inactive').show();
                        $('#distribute_inactive').hide();
                        $('#distribute_active').show();
                        $("#data").attr('readonly', 'readonly');
                    }
                } else if (step == 'distribute') {
                    $('#distribute_inactive').show();
                    $('#distribute_active').hide();
                    $('#consensus_inactive').hide();
                    $('#consensus_active').show();
                } else if (step == 'consensus') {
                    $('#consensus_inactive').show();
                    $('#consensus_active').hide();

                    $('#reward_inactive').hide();
                    $('#reward_active').show();
                } else if (step == 'reward') {
                    $('#reward_inactive').show();
                    $('#reward_active').hide();

                    $('#deploy_inactive').hide();
                    $('#deploy_active').show();
                } else if (step == 'deploy') {
                    $('.hash_completed_section').show();
                    document.querySelector("#hash_completed_section").scrollIntoView({
                        behavior: "smooth"
                    });
                    $('#deploy_active').hide();
                    $('#deploy_inactive').show();
                    let nonce_data = "Nonce: " + $('#nonce').val();
                    $('#nonce_show').text(nonce_data);
                    let data = "Data: " + $('#data').val();
                    $('#data_show').text(data);
                    let hash = "Present   Hash: " + $('#hash').val();
                    $('#hash_show').text(hash);
                }

                $('#success_modal').modal('hide');
                $('#success_modal2').modal('hide');
            }

        });
    </script>

@endsection
