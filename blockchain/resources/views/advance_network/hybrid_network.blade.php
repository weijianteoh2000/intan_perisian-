<div class="container hideElement network_group" id="hybridNetworkContainer"
    style="position: fixed;top: 50%;left: 50%; transform: translate(-50%, -50%);">
    <div class="row bgLight round_div">
        <h3 class="mt-3 text-center"> BLOCKCHAIN HYBRID NETWORK </h3>
        <div class="col-md-10 offset-md-1 mt-4 public_network text-center">
            <div class="Vline2"></div>
            <div class="network_circle" data-id="1">
                {{-- <div class="networkTxt hideElement iconData_1">
                    <p>
                        Node<br>
                        ID: 11j853t9kj874.... <br>
                        Name: 1GETSF4mfoc89... <br>
                        Encode: 1d8d7d78umdf... <br>
                    </p>
                </div> --}}
                <img src="{{ asset('images/mobile.png') }}" alt="" height="50px" style="margin-top:10px ">
                <div class="label-1" style="">Mobile</div>
            </div>
            <div class="Vline_2"></div>
            <div class="Vline_2_icon"><i class="fa-solid fa-lock fa-xs"></i></div>

            <div class="Vline_3"></div>
            <div class="Vline3"></div>
        </div>
        <div class="col-md-10 offset-md-1 mt-4 public_network text-center">
            <div class="network_circle" data-id="2">
                <div class="networkTxt hideElement iconData_2">
                    <p>
                        Node<br>
                        ID: 11j853t9kj874.... <br>
                        Name: 1GETSF4mfoc89... <br>
                        Encode: 1d8d7d78umdf... <br>
                    </p>
                </div>
                <i class="fa-solid fa-computer fa-2x"></i>
                <div class="label-2">Desktop</div>
            </div>
            <div class="Hline"></div>
            <div class="Vline4"></div>
            <div class="network_circle" data-id="3">
                {{-- <div class="networkTxt hideElement iconData_3" style="margin-left: 150px; margin-top:250px">
                    <p>
                        Node<br>
                        ID: 33j853t9kj874.... <br>
                        Name: 33GETSF4mfoc89... <br>
                        Encode: 33d8d7d78umdf... <br>
                    </p>
                </div> --}}
                <img src="{{ asset('images/mobile.png') }}" alt="" height="50px" style="margin-top:10px ">
                <div class="label-3">Mobile</div>

            </div>
            <div class="Vline_22"></div>
            <div class="Vline_2_icon"><i class="fa-solid fa-lock fa-xs"></i></div>
            <div class="Vline_23"></div>
            <div class="Hline"></div>
            <div class="network_circle" data-id="4">
                <div class="networkTxt hideElement iconData_4">
                    <p>
                        Node<br>
                        ID: 11j853t9kj874.... <br>
                        Name: 1GETSF4mfoc89... <br>
                        Encode: 1d8d7d78umdf... <br>
                    </p>
                </div>

                <i class="fa-solid fa-laptop fa-2x"></i>
                <div class="label-4">Laptop</div>
            </div>
            <div class="Vline5"></div>
        </div>
        <div class="col-md-10 offset-md-1 mt-4  public_network text-center">
            <div class="network_circle" data-id="5">
                {{-- <div class="networkTxt hideElement iconData_5">
                    <p>
                        Node<br>
                        ID: 11j853t9kj874.... <br>
                        Name: 1GETSF4mfoc89... <br>
                        Encode: 1d8d7d78umdf... <br>
                    </p>
                </div> --}}
                <img src="{{ asset('images/tablet.png') }}" alt="" height="30px" style=" margin-top:20px">
                <div class="label-5">Tablet</div>
            </div>
        </div>
        <div class="col-md-10 offset-md-1 mt-5 public_network">
            <p> Hybrid blockchain network is a combination of public and private network for flexibility and
                transparency. Such as some parts of the data can be operated in public network but some sensitive data
                might be operated in private network.
            </p>
        </div>
        <div style="display: flex;  justify-content: center; margin-top:20px;margin-bottom:20px">
            <a class="btn-primary" style="padding: 10px 20px; border-radius:20px ; text-decoration:none"
                href="{{ route('privateNetwork') }}">Back</a>
        </div>
    </div>
</div>
