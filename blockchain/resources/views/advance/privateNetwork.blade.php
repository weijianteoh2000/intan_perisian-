@extends('layouts.app')
@section('title', 'Advance | Private NetWork')
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
        .label-1 {
            right: 60px;
            top: 0;
            position: absolute;
        }

        .label-2 {
            right: 0;
            top: 75;
            position: absolute;
        }

        .label-3 {
            right: 60;
            top: 15;
            position: absolute;
        }

        .label-4 {
            right: 0;
            top: 75;
            position: absolute;
        }

        .label-5 {
            right: 0;
            top: 70;
            position: absolute;
        }



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

        #hybridNetworkContainer .lock_icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #e1dede;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 5;
            margin-top: -3px;
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
    </style>
    @section('content')
        <div class="container " id="networkContainer"
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
        </script>
    @endsection
