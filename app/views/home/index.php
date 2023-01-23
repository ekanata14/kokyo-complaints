<!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Selamat datang di Kokyo Complaints</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Silahkan Laporkan Keluhan Anda</p>
                        <a class="btn btn-warning btn-xl" href="#about">Laporkan Keluhan</a> 
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Jika Anda Punya Keluhan, Silahkan Laporkan</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Kokyo Complaints memberikan pelayanan publik untuk menyejahterakan masyarakat.</p>
                        <a class="btn btn-light btn-xl" href="#report">Mulai!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="report">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Laporkan Keluhan Anda</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Jika Anda punya keluhan, silahkan laporkan dibawah ini</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" action="<?= BASE_URL ?>/complaints/addComplaints" method="POST" enctype="multipart/form-data">
                            <!-- NIK input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nik" type="text" placeholder="Masukkan NIK Anda" data-sb-validations="required" name="nik" />
                                <label for="nik">NIK</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Masukkan NIK</div>
                            </div>
                            <!-- Nama input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nama" type="text" placeholder="Nama Lengkap" data-sb-validations="required" name="nama" />
                                <label for="nik">Nama Lengkap</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Masukkan NIK</div>
                            </div>

                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" name="email"/>
                                <label for="email">Alamat Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Masukkan Email Anda</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email Tidak Valid</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" name="telp"/>
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required" name="isi_laporan"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <label for="message">Photos</label>
                            <div class="form-floating mb-3"> 
                                <input class="form-control p-3" id="file" type="file" data-sb-validations="required" name="foto" />
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button></div>
                            <p class="text-secondary fs-6 text-center mt-3"><a href="<?= BASE_URL ?>/auth/register">Buat akun untuk melihat tanggapan dari kami</a></p>
                        </form>
                    </div>
                </div> 
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-dark py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - dreamerdream</div></div>
        </footer>
