<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Founder</title>
    <link href="{{ asset('css/Founder.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('galleries') }}">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
        </ul>
        @auth
            @if(Auth::user()->isAdmin())
                <form action="{{ route('admin.logout') }}" method="POST" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endif
        @endauth
    </nav>
    <div class="container">
        <h1>Meet Our Founder</h1>
        <section>
            <h2>Tonny Kusnandar</h2>
            <p>
            Jabatan: Direktur  
            Pendidikan: S1 Teknik Elektro, Institut Teknologi Indonesia, Serpong.
            Beliau merupakan seorang lulusan S1 Teknik Elektro dari Institut Teknologi Indonesia, Serpong. Selama masa studinya, beliau dikenal sebagai mahasiswa yang tekun dan berprestasi, dengan minat khusus pada teknologi dan inovasi. Setelah menyelesaikan pendidikan di bidang teknik elektro.
            </p>
        </section>
        <section>
            <h2>Peralihan ke Bisnis Pariwisata:</h2>
            <p>
            Melihat peluang besar dalam sektor pariwisata, khususnya di bidang transportasi, Beliau memutuskan untuk mengarahkan kariernya ke industri tersebut. Alasan utama yang mendorongnya adalah potensi bisnis yang menjanjikan serta tingginya permintaan akan layanan transportasi, terutama untuk keperluan studi tour dan wisata. Beliau menyadari bahwa dengan peningkatan jumlah wisatawan dan kebutuhan akan transportasi yang aman dan nyaman, terdapat peluang besar untuk membangun bisnis yang sukses dan berkelanjutan. Sebagai seorang visioner, Beliau mendirikan sebuah perusahaan transportasi pariwisata yang berfokus pada penyediaan layanan penyewaan bus. Perusahaan yang didirikannya tidak hanya menawarkan layanan transportasi yang berkualitas, tetapi juga memberikan pengalaman wisata yang menyenangkan dan aman bagi para pelanggannya.
            </p>
        </section>
        <section>
            <h2>Kunci Sukses dan Filosofi Bisnis:</h2>
            <p>
            Beliau percaya bahwa kunci sukses dalam bisnis adalah memahami kebutuhan pelanggan dan selalu berinovasi untuk memberikan layanan terbaik. Filosofi bisnisnya berpusat pada kepuasan pelanggan, integritas, dan komitmen terhadap kualitas. Beliau selalu menekankan pentingnya membangun hubungan yang baik dengan pelanggan dan mitra bisnis, serta terus beradaptasi dengan perkembangan teknologi dan tren di industri pariwisata.
            </p>
        </section>
        <section>
            <h2>Kontribusi dan Dampak:</h2>
            <p>
            Perusahaan yang didirikan Beliau telah memberikan kontribusi signifikan terhadap perkembangan industri pariwisata lokal. Layanan transportasi yang andal dan berkualitas telah mendukung berbagai kegiatan wisata dan studi tour, membantu banyak sekolah dan institusi dalam menyelenggarakan kegiatan edukasi yang bermakna. Selain itu, perusahaan ini juga membuka lapangan pekerjaan bagi banyak orang, meningkatkan kesejahteraan masyarakat sekitar.
            </p>
        </section>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>ADDRESS</h3>
                <p>Jl. Moh. Toha No.30B, Pamulang Tim., Kec. Pamulang</p>
                <p>Kota Tangerang Selatan, Banten 15412</p>
            </div>
            <div class="footer-column">
                <h3>PHONE</h3>
                <p>Contact Office</p>
                <p>0813-1127-7272</p>
                <p>021-7496562</p>
                <p>021-7490311</p>
                <p>Fax: 021-7419242</p>
            </div>
            <div class="footer-column">
                <h3>EMAIL</h3>
                <p>bisichtrahaya@gmail.com</p>
            </div>
            <div class="footer-column">
                <h3>COMPANY</h3>
                <a href="{{ url('founders') }}">Founder</a>
                <a href="{{ url('galleries') }}">Gallery</a>
                <a href="{{ url('aboutUs') }}">About Us</a>
                <a href="{{ url('contacts') }}">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>