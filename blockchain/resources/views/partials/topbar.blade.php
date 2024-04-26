  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg  mb-3">
      <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">
              {{-- <img src="{{ asset('images/logo.png') }}" alt="" width="150" height="45"
                  class="rounded d-inline-block align-text-top"> --}}
              <img src="{{ asset('blockchain_logo/logo2.png') }}" alt="" width="40" height="50"
                  class="rounded d-inline-block align-text-top">
          </a>
          <a href="{{ route('home') }}" class="nav-txt text-decoration-none text-left" style="width: 140px">BLOCKCHAIN
              SOFTWARE
              TOOL</a>
          <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarMain">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('home') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('home') }}">&nbsp; <span
                              class="{{ request()->routeIs('home') ? 'text-decoration-underline' : '' }}">Home</span>
                          &nbsp;</a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('hash') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('hash') }}">&nbsp; <span
                              class="{{ request()->routeIs('hash') ? 'text-decoration-underline' : '' }}">Hash</span>
                          &nbsp;</a>
                  </li>

                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('transaction') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('transaction') }}">&nbsp; <span
                              class="{{ request()->routeIs('transaction') ? 'text-decoration-underline' : '' }}">Transaction</span>
                          &nbsp;</a>
                  </li>


                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('block') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('block') }}">&nbsp; <span
                              class="{{ request()->routeIs('block') ? 'text-decoration-underline' : '' }}">Block</span>
                          &nbsp;</a>
                  </li>

                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('blockchain') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('blockchain') }}">&nbsp; <span
                              class="{{ request()->routeIs('blockchain') ? 'text-decoration-underline' : '' }}">Blockchain</span>
                          &nbsp;</a>
                  </li>

                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('distributed') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('distributed') }}">&nbsp; <span
                              class="{{ request()->routeIs('distributed') ? 'text-decoration-underline' : '' }}">Distributed</span>
                          &nbsp;</a>
                  </li>


                  {{-- Advance --}}
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">

                          <span class="advance">Advance</span>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li class="nav-item dropend dropdown dropdown-submenu">
                              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownSub1"
                                  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Markle Tree
                              </a>
                              <ul class="dropdown-menu " aria-labelledby="navbarDropdownSub1">
                                  <li class="nav-item">
                                      <a class="nav-link text-dark create_tree" href="{{ route('tree') }}"> &nbsp;
                                          Tree Creation</a>
                                  </li>
                                  <li>
                                      <hr class="dropdown-divider">
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-dark dataInsertion"
                                          href="{{ route('dataInsertion') }}">&nbsp;
                                          Data
                                          Insertion</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li class="nav-item">
                              <a class="nav-link text-dark private_network"
                                  href="{{ route('privateNetwork') }}">Private
                                  Network</a>
                          </li>

                      </ul>
                  </li>

                  {{-- End Advance --}}


                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('quiz') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('quiz') }}">&nbsp; <span
                              class="{{ request()->routeIs('quiz') ? 'text-decoration-underline' : '' }}"> Quiz
                          </span>
                          &nbsp;</a>
                  </li>

                  <li class="nav-item ">
                      <a class="nav-link {{ request()->routeIs('note') ? 'active rounded-pill' : 'nav-txt' }} "
                          aria-current="page" href="{{ route('note') }}">&nbsp; <span
                              class="{{ request()->routeIs('note') ? 'text-decoration-underline' : '' }}">Note</span>
                          &nbsp;</a>
                  </li>
              </ul>
          </div><!--/.nav-collapse -->
      </div>
  </nav>
