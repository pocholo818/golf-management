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
              <p class="card-text">We have aspired to create the most beautiful yet challenging golf course. Please enjoy your play today, while surrounded by a thousand year-old native forest and birdsongs.</p>
            </div>
        </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://cdn.phuketgolfcourse.com/img/rmg/redf6.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">FACILITIES</h5>
                  <p class="card-text">Our facilities provide the best playing environment as well as a miraculous experience for you. With premium equipment, meticulously designed spaces, we ensure that you'll have fun.</p>
                </div>
            </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.coloradogolf.org/wp-content/uploads/SolichAcCGMer-1-1-1024x697.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">CADDIES AND STAFFS</h5>
                      <p class="card-text">All caddies have completed our training program, led by our team of professional golf instructors. We believe the caliber of our caddies' essential to providing quality golfing experience.</p>
                    </div>
                </div>
                  </div>
        </div>
        <!-- Content section-->
        <section class="py-5">
           
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
                    <h3 class="text-uppercase">Golf Course United</h3>

                  </div>
                  <!--Grid column-->
                  <div class="col">
                    <div class="divider" style=" height: 100%;
                    border-right: 1px solid #dee2e6;"></div>
                  </div>

                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Reservation and Information</h5>

                    <ul class="list-unstyled mb-0">

                      <li>
                        <p>00909090909</p>
                      </li>
                      <li>
                        <p>009-0909-0909</p>
                      </li>
                    </ul>
                  </div>
                </div>
                  <!--Grid column-->

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

