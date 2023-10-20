 <!-- home -->

 <section class="home" id="home">
     <div class="swiper home-slider">
         <div class="swiper-wrapper">
             <div class="swiper-slide slide">
                 <img src="{{ asset('umkm-baru/images/UKM-dechefdefinz.jpg') }}" class="swiper-img">
                 <div class="content">
                     {{-- <h3>Selamat Datang Di Web Kami</h3> --}}

                 </div>
             </div>

             <div class="swiper-slide slide">
                 <div class="content-slide">
                     <img src="{{ asset('umkm-baru/images/UKM-dechefdefinz.jpg') }}" class="swiper-img">
                     <lottie-player src="https://lottie.host/c0a38045-e9b3-469d-b9a7-1d1682c7d712/ibLVanJSyR.json"
                         background="transparent" speed="0.5" loop autoplay></lottie-player>

                 </div>
             </div>
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
     </div>
 </section>

 <!-- home section ends -->

 {{-- Promo --}}
 <section class="product" id="product">

     <h1 class="heading">Promo <span> Menarik Dari Kami</span></h1>

     <div class="box-container">

         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>
         @foreach ($promo as $item)
             <div class="box">
                 <div class="image">
                     <img src="{{ asset("storage/promo/$item->image") }}" style="width: 80%;">
                 </div>
                 <div class="content">
                     <h3>{{ $item->nama }}</h3>
                     <span class="price">{{ $item->deskripsi }}</span>
                 </div>
             </div>
         @endforeach

         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="pesan">



             <div class="content">



             </div>
         </div>

 </section>
 {{-- End Promo --}}

 {{-- Best Seller --}}
 <section class="product" id="best">
     <div class="heading">
         <h2>Best Seller Kami</h2>
     </div>
     <div class="swiper product-row">
         <div class="swiper-wrapper">
             <div class="swiper-slide box">
                 <div class="img">
                     <img src="{{ asset('umkm-baru') }}/images/brownies.jpeg" style="width: 60%;">
                 </div>
                 <div class="product-content">
                     <h3>Brownies </h3>
                     <p>siap santap </p>
                     <div class="price">Rp.125.000/loyang <span>Rp.135.000/loyang</span></div>
                 </div>
             </div>
             <div class="swiper-slide box">
                 <div class="img">
                     <img src="{{ asset('umkm-baru') }}/images/kue sus vanilla.jpeg" style="width: 40%;">
                 </div>
                 <div class="product-content">
                     <h3>Kue Sus rasa Vanilla</h3>
                     <p>siap santap.

                     </p>
                     <div class="price">Rp.5.500/pcs <br> <span>Rp.7.000/pcs</span></div>
                 </div>
             </div>
             <div class="swiper-slide box">
                 <div class="img">
                     <img src="{{ asset('umkm-baru') }}/images/flubbydonat.jpeg" style="width: 40%;">
                 </div>
                 <div class="product-content">
                     <h3>Bomboloni</h3>
                     <p>siap santap.

                     </p>
                     <div class="price">Rp.5.500/pcs <br> <span>Rp.8.000/pcs</span></div>
                 </div>
             </div>


         </div>
         <div class="swiper-pagination"></div>
     </div>

     <div class="swiper-pagination"></div>
     </div>
 </section>
 <section class="about" id="about">

     <h1 class="heading"> <span>about</span> us </h1>

     <div class="row">

         <div class="image">
             <img src="{{ asset('umkm-baru') }}/images/Logo Ukm tanpa ig dan wa.jpeg" alt="">
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
             <a href="https://www.instagram.com/dechefdefinzs/" class="btn">Baca lebih banyak tentang kami disini</a>
         </div>

     </div>

 </section>

 <section class="product" id="product">

     <h1 class="heading">Produk <span> Bakery Kami</span></h1>

     <div class="box-container">

         @foreach ($bakery as $item)
             <div class="box">
                 <div class="image">
                     <img alt="bakery" src="{{ asset("storage/bakery/$item->image") }}">
                 </div>
                 <div class="content">
                     <h3>{{ $item->name }}</h3>

                     <span class="price">Rp. {{ number_format($item->harga_normal, 0, ',', '.') }}</span>
                     <a target="_blank" href="https://wa.me/6285694361951" class="btn">Pesan</a>
                 </div>
             </div>
         @endforeach


         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="pesan">



             <div class="content">


                 <h4>Jika ingin melihat menu yang lain silahkan klik menu lain yang ada dibawah ini</h4>
                 <a href="{{ route('landing.bakery') }}" class="acumalaka">Menu Lain</a>
             </div>
         </div>

 </section>

 <section class="product" id="product">

     <h1 class="heading">Produk <span>Cake Kami</span></h1>

     <div class="box-container">
         @foreach ($cake as $item)
             <div class="box">
                 <div class="image">
                     <img alt="bakery" src="{{ asset("storage/menu_kue_loyang/$item->image") }}">
                 </div>
                 <div class="content">
                     <h3>{{ $item->name }}</h3>
                     <span class="price">Rp. {{ number_format($item->harga_normal, 0, ',', '.') }}</span>
                     <a target="_blank" href="https://wa.me/6285694361951" class="btn">Pesan</a>
                 </div>
             </div>
         @endforeach

         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="pesan">



             <div class="content">


                 <h4>Jika ingin melihat menu yang lain silahkan klik menu lain yang ada dibawah ini</h4>
                 <a href="{{ route('landing.bakery') }}" class="acumalaka">Menu Lain</a>
             </div>
         </div>

 </section>


 <section class="product" id="product">
     <h1 class="heading">Produk <span> Kue Tradisional Kami</span></h1>
     <div class="box-container">
         @foreach ($kueTradisional as $item)
             <div class="box">
                 <div class="image">
                     <img alt="bakery" src="{{ asset("storage/kue_tradisional/$item->image") }}">
                 </div>
                 <div class="content">
                     <h3>{{ $item->name }}</h3>
                     <span class="price">Rp. {{ number_format($item->harga_normal, 0, ',', '.') }}</span>
                     <a target="_blank" href="https://wa.me/6285694361951" class="btn">Pesan</a>
                 </div>
             </div>
         @endforeach
         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="pesan">



             <div class="content">


                 <h4>Jika ingin melihat menu yang lain silahkan klik menu lain yang ada dibawah ini</h4>
                 <a href="{{ route('landing.kueTradisional') }}" class="acumalaka">Menu Lain</a>
             </div>
         </div>
 </section>

 <section class="product" id="product">

     <h1 class="heading">Produk <span> Nasi Kami</span></h1>

     <div class="box-container">

         @foreach ($nasi as $item)
             <div class="box">
                 <div class="image">
                     <img alt="bakery" src="{{ asset("storage/menu_nasi/$item->image") }}">
                 </div>
                 <div class="content">
                     <h3>{{ $item->name }}</h3>

                     <span class="price">Rp. {{ number_format($item->harga_normal, 0, ',', '.') }}</span>
                     <a target="_blank" href="https://wa.me/6285694361951" class="btn">Pesan</a>
                 </div>
             </div>
         @endforeach
         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="pesan">



             <div class="content">


                 <h4>Jika ingin melihat menu yang lain silahkan klik menu lain yang ada dibawah ini</h4>
                 <a href="{{ route('landing.menuNasi') }}" class="acumalaka">Menu Lain</a>
             </div>
         </div>
 </section>

 <!-- about us -->



 <!-- about us end-->


 <!-- product -->
 <!-- gallery -->
 <section class="product" id="product">

     <h1 class="heading">Produk <span> Kue Kering Kami Ukuran 500gr</span></h1>

     <div class="box-container">

         @foreach ($kueKering as $item)
             <div class="box">
                 <div class="image">
                     <img alt="bakery" src="{{ asset("storage/menu_kue_kering/$item->image") }}">
                 </div>
                 <div class="content">
                     <h3>{{ $item->name }}</h3>

                     <span class="price">Rp. {{ number_format($item->harga_normal, 0, ',', '.') }}</span>
                     <a target="_blank" href="https://wa.me/6285694361951" class="btn">Pesan</a>
                 </div>
             </div>
         @endforeach
         <div class="boks">
             <div class="">

             </div>
             <div class="content">

             </div>
         </div>

         <div class="pesan">



             <div class="content">


                 <h4>Jika ingin melihat menu yang lain silahkan klik menu lain yang ada dibawah ini</h4>
                 <a href="{{ route('landing.menuKueKering') }}" class="acumalaka">Menu Lain</a>
             </div>
         </div>


 </section>

 <!-- product end-->


 <!-- team -->

 <section class="contact" id="maps">
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
     <h1 class="heading">Testimoni <span>Kustomer</span> </h1>
     <div class="swiper-container">
         <div class="swiper-wrapper">
             <!-- Setiap slide -->
             @foreach ($testimoni as $item)
                 <div class="swiper-slide">
                     <img src="{{ asset("storage/testimoni/$item->image") }}" alt="Testimoni">
                     <p>Nama : {{ $item->name }}</p>
                 </div>
             @endforeach
             <!-- Tambahkan slide lain sesuai kebutuhan -->
         </div>
         <div class="swiper-pagination"></div>
     </div>
     <h1 class="heading2">Review <span>Kustomer</span> </h1>
     <div class="swiper review-row">
         <div class="swiper-wrapper">
             @foreach ($datas as $item)
                 <div class="swiper-slide box">
                     <div class="client-review">
                         <p>{{ $item->comments }}</p>
                     </div>
                     <div class="client-info">
                         <div class="img">
                             <img src="{{ asset('umkm-baru') }}/images/user-circle.png" class="user">
                         </div>
                         <div class="clientDetailed">
                             <h3>{{ $item->name }}</h3>
                             <div class="stars">
                                 <div class="look-at-the-star">
                                     @if ($item->star_rating == '5')
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                     @elseif ($item->star_rating == '4')
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                     @elseif ($item->star_rating == '3')
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                     @elseif ($item->star_rating == '2')
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                     @else
                                         <i class="fas fa-star" style="color: #ffdd00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                         <i class="far fa-star" style="color: #fbff00;"></i>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach
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
             <h3>Nomor yang pertama, Klik <a target="_blank" href="https://wa.me/6285777816860"><i
                         class="fab fa-whatsapp " style="font-size:50px;color:green"></i></a> </h3>
             <br>
             <br>
             <p>Atau</p>
             <br>
             <h3>Nomor yang kedua, Klik <a target="_blank" href="https://wa.me/6285694361951"><i
                         class="fab fa-whatsapp " style="font-size:50px;color:green"></i></a> </h3>
             <br>
         </form>
     </div>
 </section>

 <!-- order end -->
