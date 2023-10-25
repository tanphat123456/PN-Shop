@extends('user.layout.main')
@section('main')
   <!-- Map Begin -->
   <!-- <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div> -->
    <div class="map">
  <iframe
    width="600"
    height="450"
    frameborder="0"
    style="border:0"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.131695803732!2d106.6987767!3d10.771595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2sTr%C6%B0%E1%BB%9Dng%20Cao%20%C4%90%E1%BA%B3ng%20K%E1%BB%B9%20thu%E1%BA%ADt%20Cao%20Th%E1%BA%AFng!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd"
    allowfullscreen=""
    aria-hidden="false"
    tabindex="0"
  ></iframe>
</div>

    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông Tin</span>
                            <h2>Liên Hệ Chúng Tôi</h2>
                            <p>Chúng tui rất mong đợi ý kiến của bạn.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Việt Nam</h4>
                                <p>195 thống nhất<br />+84 0364203478</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection