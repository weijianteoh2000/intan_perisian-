@extends('layouts.app')

@section('title', 'Transaction')
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

        input[type="text"] {
            background-color: #B1B1B1 !important;
        }

        .value_input input[type="text"] {
            background-color: #FFFFFF !important;
        }

        .nonce {
            margin-left: inherit;
        }

        .nonce_input {
            width: 130%;
        }

        @media screen and (max-width: 700px) {
            .nonce_input {
                width: 106%;
            }
        }

        .clear-div {
            clear: both;
        }

        .transaction_details_pending,
        .transaction_details_success {
            display: none;
        }

        ul.a {
            list-style-type: circle;
        }

        .overlay {
            opacity: 0.7;
            z-index: 20;
        }
    </style>
@endpush
@section('content')

    <?php
    use Carbon\Carbon;
    $currentDateTime22 = Carbon::now('Asia/Kuala_Lumpur');
    $currentDateTime = $currentDateTime22->format('F d, Y \a\t h:i A \G\M\TO');
    
    $currentDateTime2 = $currentDateTime22->format('F d, Y h:i:s A \G\M\TO');
    $addedsec = $currentDateTime22->addSeconds(5);
    $currentDateTime3 = $addedsec->format('F d, Y h:i:s A \G\M\TO');
    
    ?>

    <div class="container">
        <div class="row" id="transaction">
            <div class="col-md-12 g-0">
                <h2 class="kavoon text-white">TRANSACTION</h2>
            </div>
            <div class="row mt-2 rounded " style="background: #D9D9D9;">
                <div class="col-md-1 mt-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">FROM</label>
                </div>
                <div class="col-md-11 mt-3 g-0">
                    <input type="text" class="bg-gray form-control p-2"
                        value="0xedDaAD21178BDa8D42b31019Ab402396B53DD318" readonly>
                </div>
                <div class="col-md-1 mt-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">&nbsp;&nbsp;TO
                    </label>
                </div>
                <div class="col-md-11 mt-3 g-0">
                    <input type="text" class="bg-gray form-control p-2"
                        value="0xbD98a7a2EDcBfdF691e3491d53381c2Ca0D1F1b6" readonly>
                </div>


                <div class="col-md-1 mt-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">NONCE
                    </label>
                </div>
                <div class="col-md-4 mt-3 nonce">
                    <input type="number" class="bg-gray form-control p-2 text-center nonce_input" value="5">
                </div>
                <div class="col-md-1 me-4"></div>
                <div class="col-md-1 mt-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">VALUE
                    </label>
                </div>
                <div class="col-md-4 mt-3 nonce value_input">
                    <input type="text" class="bg-gray form-control p-2 text-center nonce_input" id="value_data"
                        value="131.3619842 ETH">
                </div>

                <div class="clear-div"></div> <!-- Clear div to ensure the next div is below -->

                <div class="col-md-1 mt-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">GAS
                    </label>
                </div>
                <div class="col-md-4 mt-3 nonce">
                    <input type="text" class="bg-gray form-control p-2 text-center nonce_input" value="20" readonly>
                </div>
                <div class="col-md-1 me-4"></div>
                <div class="col-md-1 mt-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-3 p-2">PRICE
                    </label>
                </div>
                <div class="col-md-4 mt-3 nonce">
                    <input type="text" class="bg-gray form-control p-2 text-center nonce_input" value="15.793312389 Gwei"
                        readonly>
                </div>
                <div class="clear-div"></div> <!-- Clear div to ensure the next div is below -->
                <div class="col-md-1 mt-3 mb-3 text-white g-0 rounded-3" style="background: #331D2C;">
                    <label for="colFormLabelSm" class="col-md-2 col-form-label col-form-label-sm ms-4  mt-md-4"> &nbsp;DATA
                    </label>
                </div>
                <div class="col-md-11 mt-3 mb-3 g-0 data_box">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder=""></textarea>
                </div>

            </div>

            <div class="row p-3">
                <div class="col-md-12 text-center">
                    <button type="button" id="show_details" class="btn btn-secondary rounded text-dark mb-2"
                        style="background: #A78295">&nbsp; Send Transaction &nbsp;</button>
                </div>
            </div>

        </div>

        {{-- Transaction Pending --}}
        <div class="row rounded transaction_details_pending" id="transaction_details_pending">
            <div class="d-flex">
                <div class="col-md-10 g-0">
                    <h2 class="kavoon text-white">TRANSACTION DETAILS</h2>
                </div>
                <div class="col-md-2 g-0 text-white">

                    <div class="me-1 mt-3">
                        <div class="input-group">
                            <label class="me-3 mt-1">Status : </label>
                            <select class="form-select rounded-pill statusSelect">
                                <option @selected(true) value="Pending">Pending
                                </option>
                                <option value="Success">Success</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 rounded" style="background: #D9D9D9;">

                <div class="col-md-12 mt-2 g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"><img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">BLOCK :</span> <span class="ms-2"><i
                                class="fa-solid fa-hourglass"></i> Pending</span>
                    </label>
                </div>
                <div class="col-md-12  g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"><img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">Transaction Hash :</span> <span
                            class="ms-1">000012fa9b916eb9078f8d98a7864e697ae83ed54f5146bd84452cdafd043c19</span> <i
                            class="far fa-copy fa-lg ms-3"></i> </label>
                </div>
                <div class="col-md-12  g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"> <img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">Time Last Seen :</span> <span class="ms-1 timestamp">00 days 00 hr 00
                            min 03 secs ago (<?php echo $currentDateTime2; ?>)</span> </label>
                </div>
                <div class="col-md-12 g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"> <img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">Estimated Confirmation Duration :</span> <span class="ms-1 timestamp">
                            < 3 mins | Gas Tracker</span> </label>
                </div>


                <div class="col-md-12 mt-2 mb-4 g-0 rounded-3" style="background: #FFFFFF;">
                    <div class="row ms-1 mt-2">
                        <div class="col-md-6 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">From : </span>
                                    <span class="font14"
                                        style="color: #326096;font-size: 14px;">0xedDaAD21178BDa8D42b31019Ab402396B53DD318</span>
                                    <i class="far fa-copy fa-lg ms-2"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">To : </span> <span
                                        style="color: #326096;font-size: 14px;">0xbD98a7a2EDcBfdF691e3491d53381c2Ca0D1F1b6</span>
                                    <i class="far fa-copy fa-lg ms-2"></i>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-12 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Value : <img src="{{ asset('images/value.png') }}"
                                            width="12" height="16" alt=""></span> <span
                                        class="value_data_show">131.3619842
                                        ETH</span> </li>
                            </ul>
                        </div>
                        <div class="col-md-12 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Max Txn Cost/Fee: </span> <span>0.000922471583329101 ETH</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Gas Price : </span> <span>15.793312389 Gwei (0.000000015793312389
                                        ETH)</span> </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>
            <div class="row mt-3 mb-5 transaction_details_pending">
                <div class="col-md-12 text-white">
                    <div class="d-flex">
                        <span class="fw-bold">Summary:</span>
                        <p class="ms-3" style="font-size: 16px;">
                            This transaction was first broadcasted on the Ethereum network on <?php echo $currentDateTime; ?>.
                            This transaction is unconfirmed.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        {{-- Transaction Success --}}

        <div class="row rounded transaction_details_success" id="transaction_details_success">
            <div class="d-flex">
                <div class="col-md-10 g-0">
                    <h2 class="kavoon text-white">TRANSACTION DETAILS</h2>
                </div>
                <div class="col-md-2 g-0 text-white">

                    <div class="me-1 mt-3">
                        <div class="input-group">
                            <label class="me-3 mt-1">Status : </label>
                            <select class="form-select rounded-pill statusSelect">

                                <option @selected(true) value="Success">Success
                                </option>

                                <option value="Pending" id="statusChangedPending">Pending
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 rounded" style="background: #D9D9D9;">

                <div class="col-md-12 mt-2 g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"><img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">BLOCK :</span> <span style="color: #326096;" class="ms-2">1</span>
                    </label>
                </div>
                <div class="col-md-12 g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"><img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">Transaction Hash :</span> <span
                            class="ms-1">000012fa9b916eb9078f8d98a7864e697ae83ed54f5146bd84452cdafd043c19</span> <i
                            class="far fa-copy fa-lg ms-3"></i> </label>
                </div>
                <div class="col-md-12 g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"> <img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">Timestamp :</span> <i class="fa-regular fa-clock ms-2"></i> <span
                            class="ms-1 timestamp">5 sec ago (<?php echo $currentDateTime3; ?>)</span> </label>
                </div>
                <div class="col-md-12 g-0 rounded-3">
                    <label for="colFormLabelSm" class="col-md-12 col-form-label col-form-label-sm ms-1"> <img
                            src="{{ asset('images/trans_icon.png') }}" width="15" height="20" alt="">
                        <span class="ms-2 fw-bold">Transaction Action :</span> </label>
                </div>


                <div class="col-md-12 mt-2 mb-4 g-0 rounded-3" style="background: #FFFFFF;">
                    <div class="row ms-1 mt-2">
                        <div class="col-md-6 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">From : </span>
                                    <span class="font14"
                                        style="color: #326096;font-size: 14px;">0xedDaAD21178BDa8D42b31019Ab402396B53DD318</span>
                                    <i class="far fa-copy fa-lg ms-2"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">To : </span> <span
                                        style="color: #326096;font-size: 14px;">0xbD98a7a2EDcBfdF691e3491d53381c2Ca0D1F1b6</span>
                                    <i class="far fa-copy fa-lg ms-2"></i>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Value : <img src="{{ asset('images/value.png') }}"
                                            width="12" height="16" alt=""></span> <span
                                        class="value_data_show">131.3619842
                                        ETH</span> </li>
                            </ul>
                        </div>
                        <div class="col-md-6 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Period : </span> 5 seconds</li>
                            </ul>
                        </div>
                        <div class="col-md-12 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Transaction Fee : </span> <span>0.000922471583329101 ETH</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 g-0">
                            <ul class="a">
                                <li><span class="fw-bold">Gas Price : </span> <span>15.793312389 Gwei (0.000000015793312389
                                        ETH)</span> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3 mb-5 transaction_details_success">
                <div class="col-md-12 text-white">
                    <div class="d-flex">
                        <span class="fw-bold">Summary:</span>
                        <p class="ms-3" style="font-size: 16px;">
                            This transaction was first broadcasted on the Ethereum
                            network on <?php echo $currentDateTime; ?>. This transaction is confirmed. The current value
                            of
                            this transaction is now <span class="value_data_show">131.3619842 ETH</span> .
                        </p>
                    </div>
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

            $('#value_data').on('input', function() {
                var userInput = $(this).val();
                userInput = userInput.replace(/[^0-9\.]/g, '');
                var modifiedInput = userInput.replace("ETH", " ");
                modifiedInput = modifiedInput.trim();
                modifiedInput = modifiedInput.replace(/\s/g, '');
                modifiedInput = modifiedInput + " ETH";

                $('#value_data').val(modifiedInput);
            });

            $("#show_details").click(function() {

                $('#transaction').hide();
                $('.transaction_details_success').hide();
                $('.transaction_details_pending').show();
                $('.value_data_show').text($('#value_data').val());

                setTimeout(function() {
                    $('.transaction_details_pending').hide();
                    $('.transaction_details_success').show();
                }, 4000);

            });


            // on change Status -> view will change
            $('.statusSelect').change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === 'Pending') {
                    $('#transaction_details_success').hide();
                    $('.transaction_details_pending').show();
                } else if (selectedOption === 'Success') {
                    $('.transaction_details_pending').hide();
                    $('#transaction_details_success').show();
                }
            });

        });
    </script>

@endsection
