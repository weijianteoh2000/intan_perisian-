@extends('layouts.app')

@section('title', 'Advance')
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

        /*----- BLOCKCHAIN NETWORK -----*/
        .circle_img {
            width: 60px;
            height: 60px;
            cursor: pointer;
        }

        .public_network {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .network_circle {
            width: 60px;
            height: 70px;
            border-radius: 50%;
            border: black 1px solid;
            position: relative;
        }

        .network_circle i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }

        /*----- PUBLIC NETWORK -----*/
        .Vline {
            width: 1px;
            height: 25px;
            background: black;
            z-index: 5;
            margin-top: 93px;
            position: absolute;
        }

        .Vline2 {
            width: 1px;
            height: 104px;
            background: black;
            z-index: 5;
            margin-top: 75px;
            position: absolute;
            transform-origin: 0% 50%;
            transform: rotate(51deg);
            margin-right: 139px;
        }

        .Vline3 {
            width: 1px;
            height: 104px;
            background: black;
            z-index: 6;
            margin-top: 75px;
            position: absolute;
            transform-origin: 0% 50%;
            transform: rotate(-51deg);
            margin-left: 139px;
        }

        .Vline4 {
            width: 1px;
            height: 104px;
            background: black;
            z-index: 6;
            margin-top: 115px;
            position: absolute;
            transform-origin: 0% 50%;
            transform: rotate(-51deg);
            margin-right: 139px;
        }

        .Vline5 {
            width: 1px;
            height: 104px;
            background: black;
            z-index: 6;
            margin-top: 115px;
            position: absolute;
            transform-origin: 0% 50%;
            transform: rotate(51deg);
            margin-left: 139px;
        }

        .Hline {
            width: 70px;
            height: 1px;
            background: black;
        }

        .network_circle .networkTxt {
            position: absolute;
            right: 60px;
            /* top: 40px; */
            width: max-content;
            text-align: justify;
        }

        .network_circle .iconData_1 {
            left: 100px;
            bottom: -15px;
            text-align: left;
        }

        .network_circle .iconData_3 {
            text-align: left;
            left: 100px;
            bottom: 40px;
        }

        .network_circle .iconData_4 {
            text-align: left;
            left: 100px;
        }

        .publicNetworkGroup {
            display: flex;
            justify-content: center;
        }

        .publicNetworkGroup .networkCircle {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 2px solid #D9D9D9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            /* Add padding for better spacing */
        }

        .publicNetworkGroup .networkCircle2 .topDiv,
        .bottomDiv {
            position: absolute;
            width: 100%;
            text-align: center;
        }

        .publicNetworkGroup .networkCircle2 .topDiv {
            top: 50px;
            /* Adjust the top position as needed */
        }

        .publicNetworkGroup .networkCircle2 .bottomDiv {
            bottom: 50px;
            /* Adjust the bottom position as needed */
        }

        .publicNetworkGroup .networkCircle2 {
            position: absolute;
        }

        .publicNetworkGroup .networkCircle2 {
            margin-left: 200px;
        }

        .publicNetworkGroup .networkCircle1 {
            margin-right: 200px;
            z-index: 2;
        }

        .publicNetworkGroup .networkCircle p {
            margin: 0;
        }

        /*----- HYBRID NETWORK -----*/
        .Vline_2 {
            width: 1px;
            height: 6px;
            background: black;
            z-index: 5;
            margin-top: 76px;
            position: absolute;
        }

        .Vline_2_icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #e1dede;

            display: flex;
            align-items: center;
            justify-content: center;

            z-index: 5;
            margin-top: 98px;
            position: absolute;
        }

        .Vline_3 {
            width: 1px;
            height: 6px;
            background: black;
            z-index: 5;
            margin-top: 113px;
            position: absolute;
        }

        .Vline_22 {
            width: 1px;
            height: 6px;
            background: black;
            z-index: 5;
            margin-top: 76px;
            position: absolute;
        }

        .Vline_23 {
            width: 1px;
            height: 6px;
            background: black;
            z-index: 5;
            margin-top: 112px;
            position: absolute;
        }

        /*----- PRIVATE & CONSORTIUM NETWORK -----*/
        #privateNetworkContainer .private_Hline,
        #consortiumNetworkContainer .private_Hline {
            width: 26px;
            height: 1px;
            background: black;
        }

        #privateNetworkContainer .private_Vline_icon,
        #consortiumNetworkContainer .private_Vline_icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #e1dede;
            z-index: 6;
        }

        /*----- DATA INSERTION SECTION -----*/
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


        /*----- DATA INSERTION SECTION -----*/
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

        /*----------------------------------------------------------------------------------*/
        /* #dataInsertionContainer .level1 .merkle_child .left_Vline {
                                width: 1px;
                                height: 150px;
                                background: white;
                                z-index: -1;
                                position: absolute;
                                transform-origin: 0% 0%;
                                transform: rotate(51deg);
                                left: 45%;
                            }

                            #dataInsertionContainer .level1 .merkle_child .right_Vline {
                                width: 1px;
                                height: 150px;
                                background: white;
                                z-index: -1;
                                position: absolute;
                                transform-origin: 0% 0%;
                                transform: rotate(-51deg);
                                right: 45%;
                            } */
        /*----------------------------------------------------------------------------------*/

        #dataInsertionContainer .merkle_child label {
            font-weight: 400;
        }

        #dataInsertionContainer .merkle_child {
            width: 160px;
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
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
@endpush
@section('content')
    <div class="container hideElement" id="markleTreeContainer">
        {{-- TREE SECTION --}}
        <div class="row mt-3" id="chunk_size_col">

            <div class="col-md-3 create_tree" id="contruct_tree">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label text-white">Enter The chunk size to divide your data
                        into</label>
                    <input type="text" id="chunk_size" class="form-control chunk_size" aria-describedby="emailHelp">
                </div>
                <button type="button" class="btn btn-secondary" onclick="contructTree()">Contruct Tree</button>
            </div>

            <div class="col-12 mb-5 create_tree" id="block_tree">
                <div class="row">
                    <div class="col-12" id="add_block_tree"></div>
                </div>
            </div>

        </div>
    </div>

    {{-- BLOCKCHAIN NETWORK SECTION --}}
    <div class="container hideElement" id="networkContainer"
        style="position: fixed;top: 50%;left: 50%; transform: translate(-50%, -50%);">
        <div class="row bgLight round_div mt-3">
            <div class="col-md-12 circleTitleDiv">
                <h3 class="mt-3 text-center"> BLOCKCHAIN NETWORK</h3>
                <div class="mt-3  text-center">
                    <span class="txt fw-bold permissionTitle">Permissionless</span>
                    <span class="txt fw-bold permissionTitle2">Permissioned</span>
                </div>
            </div>
            <div class="col-md-12 publicNetworkGroup mb-5 text-center">
                <div class="networkCircle networkCircle1">
                    <div style="margin-left:4rem">
                        <img class="circle_img showNetwork" src="{{ asset('advance/pblc1.png') }}" data-type="Public"
                            alt="Public">
                        <span class="d-block fw-bold">Public</span>
                    </div>
                    <div>
                        <img class="circle_img showNetwork" src="{{ asset('advance/hybrid.png') }}" data-type="Hybrid"
                            alt="Hybrid">
                        <span class="d-block fw-bold">Hybrid</span>
                    </div>
                </div>
                <div class="networkCircle networkCircle2">
                    <div class="topDiv">
                        <img class="circle_img showNetwork" src="{{ asset('advance/private.png') }}" data-type="Private"
                            alt="Private">
                        <span class="d-block fw-bold">Private</span>
                    </div>
                    <div class="bottomDiv">
                        <img class="circle_img showNetwork" src="{{ asset('advance/consurtiom.png') }}"
                            data-type="Consortium" alt="Consortium">
                        <span class="d-block fw-bold">Consortium</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('advance_network.public_network')
    @include('advance_network.hybrid_network')
    @include('advance_network.private_network')
    @include('advance_network.consortium_network')


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
        $(document).ready(function() {

            $(document).on("click", ".create_tree", function() {
                $('#networkContainer').hide();
                $('.network_group').hide();
                $('#dataInsertionContainer').hide();
                $('#markleTreeContainer').show();
            });

            //=================== PRIVATE NETWORK SECTION ===================//
            $(document).on("click", ".private_network", function() {
                $('#markleTreeContainer').hide();
                $('.network_group').hide();
                $('#dataInsertionContainer').hide();
                $('#networkContainer').show();
            });
            $(document).on("click", ".showNetwork", function() {

                $('#publicNetworkContainer').hide();
                $('#hybridNetworkContainer').hide();
                $('#privateNetworkContainer').hide();
                $('#consortiumNetworkContainer').hide();
                $('#networkContainer').hide();

                let type = $(this).data("type");
                if (type == "Public") {
                    showPublicNetwork();
                } else if (type == "Hybrid") {
                    showHybridNetwork();
                } else if (type == "Private") {
                    showPrivateNetwork();
                } else if (type == "Consortium") {
                    showConsortiumNetwork();
                }
            });
            $('.network_circle').hover(function() {
                let id = $(this).data("id");
                $('.iconData_' + id).css('display', 'block');
            }, function() {
                $('.networkTxt').css('display', 'none');
            });
        });

        function showPublicNetwork() {
            $('#publicNetworkContainer').show();
        }

        function showHybridNetwork() {
            $('#hybridNetworkContainer').show();
        }

        function showPrivateNetwork() {
            $('#privateNetworkContainer').show();
        }

        function showConsortiumNetwork() {
            $('#consortiumNetworkContainer').show();
        }
        //=================== END PRIVATE NETWORK SECTION ===================//



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
                    }
                });
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


        var count = 0;
        var chunk_size = 0;

        function contructTree() {
            chunk_size = $('#chunk_size').val();
            if (chunk_size > 20) {
                Swal.fire({
                    title: 'Error!',
                    text: "MAX NUMBER 10",
                    icon: 'error',
                    confirmButtonText: 'close'
                });
                return;
            }
            var tree = ` <div class="block block1 d-flex justify-content-center">
                                    <div class="circle bgLight"><span>11111</span></div>
                                </div>`;
            var tree = `<div id="level_1" class="d-flex justify-content-center block_gap">
                            <div class="circle bgLight lineHeight">
                                <div class="line"></div>
                                <div class="line2"></div>
                                <p style="font-size: small;">8379d2</p>
                            </div>
                        </div>`;

            count = 1;
            for (let i = 2; i <= chunk_size; i++) {
                tree = tree + addBlock(i);
            }

            $('#add_block_tree').html('').html(tree);
        }

        function addBlock(number) {

            var line = '<div class="line" ></div>  <div class="line2" ></div>';

            if (number == chunk_size) {
                line = '';
            }
            var group_block = ``;
            var block = '';

            for (let i = 0; i < number; i++) {
                count++;
                // block = block + `<div class="circle bgLight" style="position: relative;"><span class="text-danger">${count}</span> ${line}</div>`;
                block = block + `<div class="circle bgLight lineHeight">
                                    <p style="font-size: small;">b2b4f2</p>
                                    ${line}
                                </div>`;
            }

            //group_block = `<div class="block block2 mt-5 d-flex justify-content-around"> ${block} </div>`;
            group_block = `<div id="level_${number}" class="mt-5 d-flex justify-content-center block_gap">${block}</div>`;

            return group_block;
        }
    </script>

@endsection
