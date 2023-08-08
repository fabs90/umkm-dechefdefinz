 <!-- home -->

 <section class="home" id="home">
     <div class="swiper home-slider">
         <div class="swiper-wrapper">
             <div class="swiper-slide slide">
                 <img src="{{ asset('umkm-baru/images/UKM-dechefdefinz.jpg') }}" class="swiper-img">
                 <div class="content">
                     <h3>Selamat Datang Di Web Kami</h3>
                     <a href="#product" class="btn"> get started </a>
                 </div>
             </div>

             <div class="swiper-slide slide">
                 <div class="content-slide">
                     <img src="{{ asset('umkm-baru/images/UKM-dechefdefinz.jpg') }}" class="swiper-img">
                     <lottie-player src="https://lottie.host/c0a38045-e9b3-469d-b9a7-1d1682c7d712/ibLVanJSyR.json"
                         background="transparent" speed="0.5" loop autoplay></lottie-player>
                     <h3 class="content-slide-text">Kami membuat sesuatu yang spesial setiap harinya</h3>
                     <a href="#product" class="btn"> get started </a>
                 </div>
             </div>

         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

     </div>

 </section>

 <!-- home section ends -->

 {{-- Best Seller --}}
 <section class="product" id="product">
     <div class="heading">
         <h2>Best Seller Kami</h2>
     </div>
     <div class="swiper product-row">
         <div class="swiper-wrapper">
             <div class="swiper-slide box">
                 <div class="img">
                     <img src="{{ asset('umkm-baru') }}/images/brownies.jpeg" alt="">
                 </div>
                 <div class="product-content">
                     <h3>Brownies </h3>
                     <p>siap santap </p>
                     <div class="price">Rp.75.000 <span>Rp.85.000</span></div>
                 </div>
             </div>
             <div class="swiper-slide box">
                 <div class="img">
                     <img src="{{ asset('umkm-baru') }}/images/kue sus vanilla.jpeg" style="width: 65%;">
                 </div>
                 <div class="product-content">
                     <h3>Kue Sus rasa Vanilla</h3>
                     <p>siap santap.

                     </p>
                     <div class="price">Rp.15.000 <span>Rp.25.000</span></div>
                 </div>
             </div>
             <div class="swiper-slide box">
                 <div class="img">
                     <img src="{{ asset('umkm-baru') }}/images/kuedonat.jpeg">
                 </div>
                 <div class="product-content">
                     <h3>Kue Donat</h3>
                     <p>siap santap.

                     </p>
                     <div class="price">Rp.15.000 <span>Rp.25.000</span></div>
                 </div>
             </div>


         </div>
         <div class="swiper-pagination"></div>
     </div>

     <div class="swiper-pagination"></div>
     </div>
 </section>



 <!-- about us -->

 <section class="about" id="about">

     <h1 class="heading"> <span>about</span> us </h1>

     <div class="row">

         <div class="image">
             <img src="{{ asset('umkm-baru') }}/images/logoumkm.jpeg" alt="">
         </div>

         <div class="content">
             <p>Tahun 2020, Bapak Fajra Avandy dan Ibu Fransisca memulai bisnis usaha kue kering yang saat menjelang
                 Lebaran Idul Fitri dan Alhamdulillah mencapai 100 toples.
                 Mencoba memmbuat aneka roti, pizza dn bomboloni untuk camilan anak-anak, memposting di whatsapp dan
                 Alhamdulillah teman-teman ikut memesan. </p>
             <p>Berkreasi dengan membuat Kue Sus varian isi vla yaitu vanilla, pandan, coklat dan durian. Melalui
                 postingan di status wa dan Instagram, teman-teman pun mulai memesan.
                 Nama 'de chefdefinzs' memiliki arti Chef Dede Finza, Finza adalah nama anak pertama kami. </p>
             <p>
                 Tahun 2022, kami lebih serius memasarkan kreasi kue kering, pastry, jajan pasar dan bahkan merambah ke
                 nasi box.
                 Best sellernya Kue Sus vla vanilla, Bomboloni, Donat Topping, Pie Brownies, Putu Ayu Sakura, Sosis
                 Solo, Pizza dan berbagai jenis risol dengan harga yang bervariasi.
                 Dengan konsep 'Made by Order' dan menggunakan bahan-bahan yang berkualitas sehingga kualitas produk
                 kami memiliki khas dan cita rasa tersendiri.
             </p>
             <a href="#" class="btn">Baca lebih banyak</a>
         </div>

     </div>

 </section>


 <!-- about us end-->


 <!-- product -->
 <!-- gallery -->
 <section class="product" id="product">

     <h1 class="heading">Produk <span> Kue Kering Kami Ukuran 500gr</span></h1>

     <div class="box-container">

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/kue klepon.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Kue Klepon</h3>

                 <span class="price">Rp 20.000</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/Lotus butter cookies.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Lotus Butter Cookies</h3>

                 <span class="price">Rp 135.000/Toples</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/kue tart nanas.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Kue Tart Nanas</h3>

                 <span class="price">Rp 110.000/Toples</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/kue cashew coklat.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Kue Cashew Coklat</h3>

                 <span class="price">Rp 110.000/Toples</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/sagu keju.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Sagu Keju</h3>

                 <span class="price">Rp 100.000/Toples</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/lidah kucing keju.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Lidah Kucing Keju</h3>

                 <span class="price">Rp 105.000/Toples</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/putri salju.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Putri Salju</h3>

                 <span class="price">Rp 100.000/Toples</span>
                 <a href="https://wa.me/6285694361951" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/kue nastar.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Kue Nastar Klasik</h3>

                 <span class="price">Rp 115.000/Toples</span>
                 <a href="https://wa.me/6285777816860" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/kastengeles.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Kastengels</h3>

                 <span class="price">Rp 120.000/Toples</span>
                 <a href="https://wa.me/6285777816860" class="btn">Pesan</a>
             </div>
         </div>

         <div class="box">
             <div class="image">
                 <img src="{{ asset('umkm-baru') }}/images/kue jagung.jpeg" alt="">
             </div>
             <div class="content">
                 <h3>Kue Jagung</h3>

                 <span class="price">Rp 100.000/Toples</span>
                 <a href="https://wa.me/6285777816860" class="btn">Pesan</a>
             </div>
         </div>


 </section>


 <!-- product end-->


 <!-- team -->

 <section class="contact" id="contact">
     <h1 class="heading"> <span>Maps</span> Kita </h1>
     <div class="row">
         <iframe
             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.691940741058!2d106.95995607426744!3d-6.304145661695077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69927d2600915b%3A0x160b6023ba485941!2sPerumahan%20Pesona%20Jatiasih%20Permai!5e0!3m2!1sid!2sid!4v1691379368372!5m2!1sid!2sid"
             width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
             referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
 </section>

 <!-- team -->


 <!-- parallax -->

 <!-- review -->
 <section class="review" id="review">
     <h1 class="heading">Review <span>Kustomer</span> </h1>
     <div class="swiper review-row">
         <div class="swiper-wrapper">
             @yield('review-section')
         </div>
         <div class="swiper-pagination"></div>
     </div>
 </section>

 <!-- review -->

 <!-- order -->

 <section class="order" id="order">
     <h1 class="heading"><span>order</span> now </h1>
     <div class="row">
         <div class="image">
             <img src="{{ asset('umkm-baru') }}/images/order.gif" alt="">
         </div>
         <form action="">
             <h4>Terdapat 2 Nomor aktif yang bisa dihubungi</h4>
             <br>
             <h3>Nomor yang pertama, Klik <a href="https://wa.me/6285777816860"><i class="fab fa-whatsapp "
                         style="font-size:50px;color:green"></i></a> </h3>
             <br>
             <br>
             <p>Atau</p>
             <br>
             <h3>Nomor yang kedua, Klik <a href="https://wa.me/6285694361951"><i class="fab fa-whatsapp "
                         style="font-size:50px;color:green"></i></a> </h3>
             <br>
         </form>
     </div>
 </section>

 <!-- order end -->
