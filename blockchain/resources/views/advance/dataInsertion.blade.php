@extends('layouts.app')
@section('title', 'Advance | Data insertion')
@push('style')
    <style>
        .hideElement {
            display: none;
        }

        #chunk_size_col .chunk_size {
            width: 70px !important;
        }

        .circle {
            width: 60px;
            height: 20px;
            border-radius: 5%;
            /* the magic */
            -moz-border-radius: 5%;
            -webkit-border-radius: 5%;
            text-align: center;
            line-height: 16px;
            color: black;
            /* margin: 35% auto 40px; */
            /* top | right | bottom | left */
        }

        .bgLight {
            background: #FFFFFF;
        }

        .bgWhite {
            background-color: #D9D9D9;
        }

        .block {
            display: block;
        }

        .round_div {
            border-radius: 30px;
        }

        .text-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text-container .txt {
            margin: 0 15%;
        }

        #private_network_col h3 {
            padding-right: 15%;
        }

        .circleTitleDiv .permissionTitle {
            margin-right: 170px;
        }

        .circleTitleDiv .permissionTitle2 {
            margin-left: 170px;
        }

        @media only screen and (max-width: 780px) {
            .circleTitleDiv .permissionTitle {
                margin-right: 100px;
            }

            .circleTitleDiv .permissionTitle2 {
                margin-left: 100px;
            }
        }

        .circle_div {
            display: flex;
            justify-content: center;
        }

        .circle_1,
        .circle_2 {
            width: 300px;
            height: 300px;
            border: 2px solid #D9D9D9;
            border-radius: 50%;
        }

        .circle_2 div {
            margin-left: 100px;
        }

        .circle_1 {
            position: absolute;
        }

        .circle_1 {
            margin-right: 330px;
        }

        .circle_2 {
            margin-left: 200px;
        }

        #block_tree .line {
            background-color: #FFFFFF;
            width: 1px;
            height: 90px;
            position: absolute;
            z-index: -1;
            margin-top: -22px;
            /* left: 48%; */
            /* margin-left: -2px; */
            margin-left: -20px;
            rotate: 60deg;
        }

        #block_tree .line2 {
            background-color: #FFFFFF;
            width: 1px;
            height: 90px;
            position: absolute;
            margin-top: -22px;
            z-index: -1;
            /* left: 48%; */
            margin-left: 80px;
            rotate: -60deg;
        }

        #contruct_tree {
            position: absolute;
            z-index: 2;
        }

        .block_gap {
            gap: 10%;
        }

        .block_gap .lineHeight {
            line-height: 20px;
        }

        /*----- DATA INSERTION SECTION -----*/
        .text_wrap {
            font-size: smaller;
            text-align: center;
            overflow: auto;
            word-wrap: break-word;
        }


        #dataInsertionContainer .merkle_root {
            width: 250px;
        }

        #dataInsertionContainer .level_1 .merkle_child,
        #dataInsertionContainer .level_2 .merkle_child,
        #dataInsertionContainer .level_3 .merkle_child {
            margin-left: 10px;
            margin-right: 10px;
            width: 150px;
        }

        #dataInsertionContainer .level1 .merkle_child button,
        #dataInsertionContainer .level2 .merkle_child button {
            width: 70%;
            background-color: #dadbdc !important;
            border: 1px solid black;
        }

        .text_wrap {
            font-size: smaller;
            text-align: center;
            overflow: auto;
            word-wrap: break-word;
        }

        /* ======================= new dev (DATA INSERTION) ======================= */
        #dataInsertionContainer .form-control[readonly] {
            background-color: white;
        }

        #dataInsertionContainer {
            color: white;
        }

        #dataInsertionContainer .merkle_root {
            width: 240px;
            background: white;
            position: relative;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }

        #dataInsertionContainer .left_Vline {
            width: 1px;
            height: 150px;
            background: white;
            z-index: -1;
            position: absolute;
            transform-origin: 0% 0%;
            transform: rotate(51deg);
            left: 45%;
        }

        #dataInsertionContainer .right_Vline {
            width: 1px;
            height: 150px;
            background: white;
            z-index: -1;
            position: absolute;
            transform-origin: 0% 0%;
            transform: rotate(-51deg);
            right: 45%;
        }

        #dataInsertionContainer .level1 .merkle_child {
            position: relative;
            border-radius: 5px;
        }

        #dataInsertionContainer .merkle_child label {
            font-weight: 400;
        }

        #dataInsertionContainer .merkle_child {
            width: 165px;
            background: white;
            color: black;
            margin-top: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        #dataInsertionContainer .level1 .merkle_child {
            margin-left: 80px;
            margin-right: 80px;
        }

        #dataInsertionContainer .level2 .merkle_child {
            margin-left: 5px;
            margin-right: 5px;
            text-align: center;
        }

        .invisible_txt {
            visibility: hidden;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
@endpush
@section('content')
    {{-- ----------- DATA INSERTION SECTION ------------- --}}
    <div class="container" id="dataInsertionContainer">
        <div class="row mt-3">
            <div class="col-md-12 merkle_root_row d-flex justify-content-center">
                <div class="merkle_root text-center">
                    <h6>MERKLE ROOT</h6>
                    <label for="exampleFormControlInput1" class="form-label">H(H(A)+H(B)) = H(C) + H(D)</label>
                    <p class="root_abcd_hashed_data text_wrap"></p>
                    <div class="root_line">
                        <div class="left_Vline"></div>
                        <div class="right_Vline"></div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <!---- 2 ----->
            <div class="col-md-12 mt-5 level1 d-flex justify-content-center">
                <div class="merkle_child">
                    <div class="L1_child1 text-center">
                        <label for="exampleFormControlInput1" class="form-label ">H(X) = H(A) + H(B)</label>
                        <p class="L1_ab_hashed_data text_wrap"></p>
                    </div>
                    <div class="L1_line">
                        <div class="left_Vline"></div>
                        <div class="right_Vline"></div>
                    </div>
                </div>
                <div class="merkle_child">
                    <div class="L1_child2 text-center">
                        <label for="exampleFormControlInput1" class="form-label">H(Y) = H(C) + H(D)</label>
                        <p class="L1_cd_hashed_data text_wrap"></p>
                    </div>
                    <div class="L1_line">
                        <div class="left_Vline L1_line"></div>
                        <div class="right_Vline L1_line"></div>
                    </div>
                </div>
            </div>

            <!---- 3 ----->
            <div class="col-md-12 mt-5 mb-5 level2 d-flex justify-content-center">
                <div class="merkle_child">
                    <label for="exampleFormControlInput1" class="form-label text-center">Data A</label>
                    <p class="L2_a_hashed_data text_wrap"></p>
                    <input type="text" id="L2_a_input" data-id="a" class="form-control L2_a_input insert_data"
                        placeholder="type here...">
                    <button type="button" class="hideElement deployBtn mt-1 btn btn-light" onclick="deploy(2, 'a')">
                        Deploy </button>
                </div>
                <div class="merkle_child">
                    <label for="exampleFormControlInput1" class="form-label">Data B</label>
                    <p class="L2_b_hashed_data text_wrap"></p>
                    <input type="text" id="L2_b_input" data-id="b" class="form-control L2_b_input insert_data"
                        @readonly(true) placeholder="type here...">
                    <button type="button" class="hideElement deployBtn mt-1 btn btn-light" onclick="deploy(2, 'b')">
                        Deploy </button>
                </div>
                <div class="merkle_child">
                    <label for="exampleFormControlInput1" class="form-label">Data C</label>
                    <p class="L2_c_hashed_data text_wrap"></p>
                    <input type="text" id="L2_c_input" data-id="c" class="form-control L2_c_input insert_data"
                        @readonly(true) placeholder="type here...">
                    <button type="button" class="hideElement deployBtn mt-1 btn btn-light" onclick="deploy(2, 'c')">
                        Deploy </button>
                </div>
                <div class="merkle_child">
                    <label for="exampleFormControlInput1" class="form-label">Data D</label>
                    <p class="L2_d_hashed_data text_wrap"></p>
                    <input type="text" id="L2_d_input" data-id="d" class="form-control L2_d_input insert_data"
                        @readonly(true) placeholder="type here...">
                    <button type="button" class="hideElement deployBtn mt-1 btn btn-light" onclick="deploy(2, 'd')">
                        Deploy </button>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
@endsection


@section('script')
    <script>
        //=================== DATA INSERTION SECTION ===================//
        var deployInput = 'a';
        var isShownDeployBtn = false;
        var input = ['a', 'b', 'c', 'd'];
        var inputVal = ['A', 'B', 'C', 'D'];
        var level2 = ['ab', 'cd'];
        $(document).ready(function() {
            $(document).on("click", ".dataInsertion", function() {
                $('#markleTreeContainer').hide();
                $('#networkContainer').hide();
                $('.network_group').hide();
                $('#dataInsertionContainer').show();
            });

            $('#dataInsertionContainer').on('input', '.insert_data', function() {
                let data = $(this).val();
                let id = $(this).attr("id")
                if (isShownDeployBtn == false) {
                    if (data && id == 'L2_a_input') {
                        $('.deployBtn').show();
                        isShownDeployBtn = true;
                    }
                }
            });
        });

        function deploy(level, input) {
            let data = $(`.L2_${input}_input`).val();
            if (data) {
                $('.insert_data').attr('readonly', false);
                $('.insert_data').each(function(i, obj) {
                    var nonce = '';
                    data = $(this).val();
                    if (data) {
                        hashData(data, nonce)
                            .then(hashedResult => {
                                // let hash = hashedResult.slice(0, 30) + "....";
                                let hash = hashedResult
                                data_id = $(this).data('id');
                                $(`.L2_${data_id}_hashed_data`).text(hash);
                            })
                            .catch(error => {});
                    } else {
                        $(`.L2_${input}_hashed_data`).text('');
                    }
                });
            } else {
                $(`.L2_${input}_hashed_data`).text('');
            }

            //======== 2 ========//
            addLevelHash(1);
        }

        function addLevelHash(level) {
            var nonce = '';
            level2.forEach((item, index) => {
                var data_id = item[0];
                var data1 = $(`.L2_${data_id}_input`).val();
                var data_id2 = item[1];
                var data2 = $(`.L2_${data_id2}_input`).val();
                var data = data1 + data2;
                var class_id = data_id + data_id2;
                if (data) {
                    hashData(data, nonce)
                        .then(hashedResult => {
                            var hash = hashedResult
                            $(`.L1_${class_id}_hashed_data`).text(hash);
                        })
                        .catch(error => {});
                } else {
                    let space = '&nbsp;';
                    $(`.L1_${class_id}_hashed_data`).html(space.repeat(85));

                }
            });

            //========= 2
            var input_data = '';
            input.forEach((item, index) => {
                data_id = item;
                data1 = $(`.L2_${data_id}_input`).val();
                input_data = input_data + data1;
            });

            var input_data_id = input.join("");

            hashData(input_data, nonce)
                .then(hashedResult => {
                    var hash = hashedResult
                    $(`.root_${input_data_id}_hashed_data`).text(hash);
                })
                .catch(error => {});
        }

        async function hashData(inputData, userNonce) {
            if (inputData == '') {
                return '';
            }
            const nonceUint8Array = new TextEncoder().encode(userNonce);
            const dataUint8Array = new TextEncoder().encode(inputData);

            const concatenatedArray = new Uint8Array(nonceUint8Array.length + dataUint8Array.length);
            concatenatedArray.set(nonceUint8Array, 0);
            concatenatedArray.set(dataUint8Array, nonceUint8Array.length);

            const hashedArrayBuffer = await crypto.subtle.digest('SHA-256', concatenatedArray);

            const hashedHex = Array.from(new Uint8Array(hashedArrayBuffer))
                .map(byte => byte.toString(16).padStart(2, '0'))
                .join('');

            // const hashedHexWithLeadingZeros = '0000' + hashedHex;
            const hashedHexWithLeadingZeros = hashedHex;
            return hashedHexWithLeadingZeros;
        }
        //=================== END DATA INSERTION SECTION ===================//
    </script>
@endsection
