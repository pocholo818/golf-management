@extends('layouts.app')

        <!-- Responsive navbar-->
        {{-- @section('content') --}}
        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('https://www.numarkgolf.com/wp-content/uploads/sites/5047/2022/10/slider3.png')">
            <div class="text-center my-5">
                <p class="text-white mb-0 p-5" style="font-size: x-large; font-weight: bold ">INTERNATIONAL GOLF CLUB</p>

                <a href="{{route('login-member')}}">
                    <button type="button" class="btn btn-primary btn-lg">SIGN IN!</button>
                </a>
            </div>
        </header>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>GOLF COURSE</h2>
                        <p class="lead">Every hole is played in harmony with nature, and our well-trained caddies guide you to pleasurable excitement of golf journey. No wonder it may be the most beloved golf course in Philippines.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="row mx-auto" style="width: 1000px;" >
            <div class="col ">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://images.squarespace-cdn.com/content/v1/5dfa8eb7d89abc3b6a4300a1/e1f1bd03-f1fb-4997-9b02-0858db9d60a5/Pocono-Manor-Golf-3.jpg?format=2500w" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">COURSES</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://cdn.phuketgolfcourse.com/img/rmg/redf6.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">FACILITIES</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.coloradogolf.org/wp-content/uploads/SolichAcCGMer-1-1-1024x697.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">CADDIES AND STAFFS</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                  </div>
        </div>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>Engaging Background Images</h2>
                        <p class="lead">The background images used in this template are sourced from Unsplash and are open source and free to use.</p>
                        <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <!-- Footer -->
            <footer class="bg-secondary text-white text-center text-md-start">
              <!-- Grid container -->
              <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h3 class="text-uppercase">Company name and logo</h3>

                    <h5>Reservation and Information</h5>
                    <p>00909090909</p>
                    <p>009-0909-0909</p>
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="#!" class="text-white">Link 1</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Link 2</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Link 3</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Link 4</a>
                      </li>
                    </ul>
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Links</h5>

                    <ul class="list-unstyled">
                      <li>
                        <a href="#!" class="text-white">Link 1</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Link 2</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Link 3</a>
                      </li>
                      <li>
                        <a href="#!" class="text-white">Link 4</a>
                      </li>
                    </ul>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Grid container -->

              <!-- Copyright -->
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
              </div>
              <!-- Copyright -->
            </footer>
            <!-- Footer -->
          </section>
            {{-- @endsection --}}

