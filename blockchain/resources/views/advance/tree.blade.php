@extends('layouts.app')
@section('title', 'Advance | Tree Genarate')

@section('content')
    <div class="container ">
        {{-- TREE SECTION --}}
        <div class="row mt-3" id="chunk_size_col">
            <form action="{{ route('tree.genarate') }}" method="get" id="treeForm">
                @csrf
                <div class="col-md-3 create_tree" id="contruct_tree">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-white">Generate Tree Visualization <br>
                            (Example: Default Construct
                            Tree of 4.)
                            <br> Note: max-26 for letter</label>
                        <input ype="number" name="treeNumber" id="treeConstruct" class="form-control "
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                        Construct tree
                    </button>
                </div>
            </form>
        </div>


        <div class="d-flex justify-content-center align-items-center flex-column  text-white">

            @php
                $levels = [];
                $levels[] = $data;
            @endphp
            <style>
                .line1 {
                    background-color: #FFFFFF;
                    width: 1px;
                    height: 55px;
                    position: absolute;
                    z-index: -1;
                    margin-right: 40px;
                    /* Adjusted */
                    rotate: 30deg;
                    margin-top: -26px;
                    /* Adjusted */
                }

                .line2 {
                    background-color: #FFFFFF;
                    width: 1px;
                    height: 55px;
                    position: absolute;
                    z-index: -1;
                    margin-left: 40px;
                    /* Adjusted */
                    rotate: -30deg;
                    margin-top: -26px;
                    /* Adjusted */
                }
            </style>
            <div class="p-3 border border-white mt-5">Root - {{ $rootValue }}</div>

            @php
                $allLevels = []; // Store all levels for reversing
            @endphp

            @while (count($levels[0]) > 1)
                @php
                    $currentLevel = [];
                    foreach ($levels[0] as $index => $node) {
                        $currentLevel[] = $node;
                    }
                    $allLevels[] = $currentLevel; // Store the current level
                @endphp

                @php
                    $nextLevel = [];
                    for ($i = 0; $i < count($levels[0]); $i += 2) {
                        $node1 = $levels[0][$i];
                        $node2 = isset($levels[0][$i + 1]) ? $levels[0][$i + 1] : '';
                        $nextLevel[] = $node1 . $node2;
                    }
                    $levels = [$nextLevel];
                @endphp
            @endwhile

            @php
                // Print levels in reverse order
                $numLevels = count($allLevels);
                for ($i = $numLevels - 1; $i >= 0; $i--) {
                    echo '<div class="d-flex mt-5 gap-2 position-relative tree-level">';

                    // Echo line1 and line2 for each level

                    foreach ($allLevels[$i] as $node) {
                        // Echo the node
                        echo '<div class="p-3 border border-white tree-node">' . $node . '</div>';
                    }

                    echo '</div>';
                }
            @endphp

        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    @endsection

    @section('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("treeForm").addEventListener("submit", function(event) {
                    event.preventDefault();

                    var inputValue1 = document.getElementById("treeConstruct").value;
                    var inputValue = parseInt(document.getElementById("treeConstruct").value);
                    if (inputValue1 == '' || inputValue <= 1 || inputValue > 26) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'The number you entered is incorrect. Please enter a number between 2 and 26.',
                            icon: 'error',
                            confirmButtonText: 'Close'
                        });
                    } else {
                        this.submit();
                    }
                });
            });
        </script>
    @endsection
