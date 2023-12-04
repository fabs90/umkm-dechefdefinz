<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Alamat</h3>
            <p>Perumahan Pesona JatiAsih Permai Blok B1 No. 12A RT.006/RW.01 Kelurahan Jati Rasa Kecamatan Jati Asih,
                Bekasi 17424.</p>
            {{-- <div class="share">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="https://www.instagram.com/dechefdefinzs/" class="fab fa-instagram"></a>
            </div> --}}
        </div>

        <div class="box">
            <h3>Kontak Kami</h3>
            <p>📞 085777816860</p>
            <p>📞 085694361951</p>
            <a href="#" class="link">Fabianski@gmail.com</a>
        </div>

        <div class="box">
            <h3>Jam Buka</h3>
            <p>Senin - Jumat: 9:00 - 23:00 <br> Sabtu: 8:00 - 24:00 </p>
        </div>

        <!--  Form Review Start   -->
        <div class="box">
            <div class="form-review">
                <form action="{{ route('review.post') }}" method="post">
                    @csrf
                    <h3>Beri kami penilaian!</h3>
                    @if (session('flash_msg_success'))
                        <div>
                            <p>{{ session('flash_msg_success') }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div>
                            <ul style="color: red">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="stars">
                        <input type="radio" name="star_rating" value="1" required />
                        <input type="radio" name="star_rating" value="2" />
                        <input type="radio" name="star_rating" value="3" />
                        <input type="radio" name="star_rating" value="4" />
                        <input type="radio" name="star_rating" value="5" />
                        <i></i>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <p for="name">Name</p>
                            <input type="text" placeholder="Nama" name="name" required
                                value="{{ old('name') }}" />
                        </div>
                        <div class="input-group">
                            <p for="name">No.Telepon</p>
                            <input type="text" placeholder="Nomor telepon" name="no_telp" required
                                value="{{ old('no_telp') }}" />
                        </div>
                        <div class="input-group">
                            <p for="name">Comments</p>
                            <textarea name="comments" cols="24" rows="4" name="comments" required>{{ old('comments') }}</textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn-rating" value="Submit">
                </form>
            </div>
        </div>
           <!--  Form Review End   -->
        <div class="box">
            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
            <div class="elfsight-app-c535a8d7-e332-4cf9-be5b-9ae469debdc2"></div>
        </div>


    </div>
    <div class="credit">
        <p>created by <span>Fabian dan Raldy</span> all rights reserved!</p>
        <a href="/login" style="color:black; text-decoration:'none'">Admin</a>


    </div>

</section>
456
