@extends('layouts.app')

@section('title', 'Home')
@push('style')
    <style>
        .restart-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            color: white;
            text-decoration: none;
            /* Remove underline */
        }

        .restart-btn:hover {
            color: white;
            /* Set the desired text color on hover */
            text-decoration: none;
            /* Remove underline on hover */
        }

        .vector_right_1 {
            position: absolute;
            left: 132px;
            top: 34px;
        }

        .vector_right_2 {
            position: absolute;
            left: 154px;
            top: 56px;
        }

        .vector_right_3 {
            position: absolute;
            left: 176px;
            top: 78px;
        }

        .vector3 {
            position: absolute;
            left: 78px;
            top: 34px;
        }

        .vector2 {
            position: absolute;
            left: 56px;
            top: 56px;
        }

        .vector {
            position: absolute;
            left: 34px;
            top: 78px;
        }

        .circle_bottom_1 {
            position: absolute;
            left: 0px;
            top: 100px;
        }

        .img_bottom {
            position: absolute;
            left: 200px;
            top: 100px;
        }

        .circle_top_1 {
            position: absolute;
            left: 100px;
            top: 0px;
        }

        .vector_3_1 {
            position: absolute;
            left: 234px;
            top: 78px;
        }

        .vector_3_2 {
            position: absolute;
            left: 255px;
            top: 56px;
        }

        .vector_3_3 {
            position: absolute;
            left: 277px;
            top: 34px;
        }

        .img_top_2 {
            position: absolute;
            left: 300px;
            top: 0px;
        }




        .vector_right_2_1 {
            position: absolute;
            left: 333px;
            top: 34px;
        }

        .vector_right_2_2 {
            position: absolute;
            left: 355px;
            top: 56px;
        }

        .vector_right_2_3 {
            position: absolute;
            left: 377px;
            top: 78px;
        }

        .img_bottom_3 {
            position: absolute;
            left: 401px;
            top: 100px;
        }

        .vector_4_1 {
            position: absolute;
            left: 435px;
            top: 78px;
        }

        .vector_4_2 {
            position: absolute;
            left: 457px;
            top: 56px;
        }

        .vector_4_3 {
            position: absolute;
            left: 479px;
            top: 34px;
        }

        .img_top_3 {
            position: absolute;
            left: 502px;
            top: 0px;
        }


        .vector_right_3_1 {
            position: absolute;
            left: 535px;
            top: 34px;
        }

        .vector_right_3_2 {
            position: absolute;
            left: 557px;
            top: 56px;
        }

        .vector_right_3_3 {
            position: absolute;
            left: 579px;
            top: 78px;
        }

        .img_bottom_4 {
            position: absolute;
            left: 603px;
            top: 100px;

        }

        .hash_box {
            display: none;
            margin: 154px 0px 0px 0px;
            /* top | right | bottom | left */
        }

        img {
            display: none;
        }

        .circle_bottom_1 {
            display: block;
        }
    </style>
@endpush

@section('content')

    <div class="outer-div" id="chain_container" style="min-height: 300px;">
        <div class="container">
            <div class="row  text-white" style="margin-left: 20%;margin-top:5%">
                <div class="col-md-12 " style="position: relative;">

                    <div>
                        <img class="circle_top_1 showBlock click1_view" data-id="12876"
                            src="{{ asset('images/Polygon_39.png') }}" width="40" height="40" alt="">

                        <img class="vector3 click1_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector_right_1 click2_view" src="{{ asset('images/vector_right.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector2 click1_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector_right_2 click2_view" src="{{ asset('images/vector_right.png') }}" width="30"
                            height="30" alt="">

                        <img class="vector click1_view" src="{{ asset('images/Vector.png') }}" width="30" height="30"
                            alt="">
                        <img class="vector_right_3 click2_view" src="{{ asset('images/vector_right.png') }}" width="30"
                            height="30" alt="">
                        <img class="circle_bottom_1 showBlock" data-id="12875" src="{{ asset('images/Polygon_39.png') }}"
                            width="40" height="40" alt="">
                        <img class="img_bottom showBlock click2_view" data-id="12877"
                            src="{{ asset('images/Polygon_39.png') }}" width="40" height="40" alt="">


                        <img class="vector_3_1 click3_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector_3_2 click3_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector_3_3 click3_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="img_top_2 showBlock click3_view" data-id="12878"
                            src="{{ asset('images/Polygon_39.png') }}" width="40" height="40" alt="">



                        <img class="vector_right_2_1 click4_view" src="{{ asset('images/vector_right.png') }}"
                            width="30" height="30" alt="">
                        <img class="vector_right_2_2 click4_view" src="{{ asset('images/vector_right.png') }}"
                            width="30" height="30" alt="">
                        <img class="vector_right_2_3 click4_view" src="{{ asset('images/vector_right.png') }}"
                            width="30" height="30" alt="">
                        <img class="img_bottom_3 showBlock click4_view" data-id="12879"
                            src="{{ asset('images/Polygon_39.png') }}" width="40" height="40" alt="">



                        <img class="vector_4_1 click5_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector_4_2 click5_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="vector_4_3 click5_view" src="{{ asset('images/Vector.png') }}" width="30"
                            height="30" alt="">
                        <img class="img_top_3 showBlock click5_view" data-id="12880"
                            src="{{ asset('images/Polygon_39.png') }}" width="40" height="40" alt="">


                        <img class="vector_right_3_1 click6_view" src="{{ asset('images/vector_right.png') }}"
                            width="30" height="30" alt="">
                        <img class="vector_right_3_2 click6_view" src="{{ asset('images/vector_right.png') }}"
                            width="30" height="30" alt="">
                        <img class="vector_right_3_3 click6_view" src="{{ asset('images/vector_right.png') }}"
                            width="30" height="30" alt="">
                        <img class="img_bottom_4 showBlock click6_view" data-id="12881"
                            src="{{ asset('images/Polygon_39.png') }}" width="40" height="40" alt="">
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9 hash_box ">
                        <div class="card bg-light" style="border-radius:12px;border-left: 7px solid #A78295;">
                            <div class="card-body">
                                <h6 class="card-title">Block: #<span class="block">12875</span> </h6>
                                <h6 class="card-title">Nonce: <span class="nonce">11316</span> </h6>
                                <h6 class="card-title">Data: <span class="data">siti</span> </h6>
                                <h6 class="card-title">Prev: <span
                                        class="prev">0000000000000000000000000000000000000000000000000000000000000000</span>
                                </h6>
                                <h6 class="card-title">Hash: <span
                                        class="hash">e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>





    <a href="{{ route('home') }}" class="restart-btn"><i class="fa-solid fa-arrow-rotate-left"></i>&nbsp; Restart</a>

@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('.showBlock').hover(function() {
                let id = $(this).data("id");
                $('.hash_box').css('display', 'block');
                let result = blockData(id);
                console.log(result);
                $('.block').text(id);
                $('.nonce').text(result.nonce);
                $('.data').text(result.data);
                $('.prev').text(result.prev);
                $('.hash').text(result.hash);

            }, function() {
                $('.hash_box').css('display', 'none');
            });


            let count = 1;
            $('#chain_container').click(function() {
                if (count >= 1 && count <= 6) {
                    $('.click' + count + '_view').css('display', 'block');
                    count++;
                }
            });


            function blockData(keyToFind) {
                var blocks = {};
                blocks["12875"] = {
                    nonce: "11316",
                    data: "siti",
                    prev: "0000000000000000000000000000000000000000000000000000000000000000",
                    hash: "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca4959933ef9297cf"
                };
                blocks["12876"] = {
                    nonce: "31242",
                    data: "Yam",
                    prev: "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca4959933ef9297cf",
                    hash: "e3b0c44298fc1c149afbf4c8996fb941e4649b934ca4959933ef9cdafd043c19"
                };
                blocks["12877"] = {
                    nonce: "12725",
                    data: "Goh",
                    prev: "e3b0c44298fc1c149afbf4c8996fb941e4649b934ca4959933ef9cdafd043c19",
                    hash: "df98g8dg78dgdf81c149afbf4c8996fb92he41e4649b934ca49dsfssdl4lf34d"
                };
                blocks["12878"] = {
                    nonce: "23978",
                    data: "Good Morning",
                    prev: "df98g8dg78dgdf81c149afbf4c8996fb92he41e4649b934ca49dsfssdl4lf34d",
                    hash: "wepofdof9fdf43o534534lekrmo45mk345k34lm4l35k34l5kl34lm5oido9sdfm"
                };
                blocks["12879"] = {
                    nonce: "12345",
                    data: "Hi",
                    prev: "wepofdof9fdf43o534534lekrmo45mk345k34lm4l35k34l5kl34lm5oido9sdfm",
                    hash: "jfk3j453499fd8gu934j89e4vj45jm4j58935uvjht587hcnd7fhgcxl0dfdfgfo"
                };
                blocks["12880"] = {
                    nonce: "23978",
                    data: "ko",
                    prev: "jfk3j453499fd8gu934j89e4vj45jm4j58935uvjht587hcnd7fhgcxl0dfdfgfo",
                    hash: "m8439uwcv968vuwj358h73iow295yh7623n3i749gvxc7vgxn3j4g789dvhcgpzd"
                };
                blocks["12881"] = {
                    nonce: "35858",
                    data: "Huanhuan",
                    prev: "m8439uwcv968vuwj358h73iow295yh7623n3i749gvxc7vgxn3j4g789dvhcgpzd",
                    hash: "2f00alkuhdfugo934u5u3veivuj8fj6ts9328tdlzinfq3dkljf879345n31c1df2"
                };

                if (blocks.hasOwnProperty(keyToFind)) {
                    var foundData = blocks[keyToFind];
                    return foundData
                }
            }

        });
    </script>
@endsection
