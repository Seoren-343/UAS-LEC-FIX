<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/AboutUs.css') }}" rel="stylesheet">
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
        <h1>About Us</h1>
        <section>
            <h2>Visi dan Misi Perusahaan:</h2>
            <p>
            Visi kami adalah menjadi penyedia layanan transportasi terbaik di bidang pariwisata. Kami berkomitmen untuk memberikan pelayanan yang unggul, aman, dan nyaman bagi setiap pelanggan kami.
            </p>
        </section>
        <section>
            <h2>Sejarah Perusahaan:</h2>
            <p>
            PT. Ichtra Jaya Trans berdiri pertama kali pada tahun 1984 dengan nama PO. Ichtra Jaya, memulai perjalanan kami sebagai perusahaan bus AKAP (Antar Kota Antar Provinsi) dengan menggunakan bus medium. Melihat peluang besar dalam sektor pariwisata dan kebutuhan akan layanan transportasi untuk studi tour yang meningkat, pada tahun 2005 kami mengubah fokus bisnis kami ke bidang pariwisata. Dengan kondisi bisnis yang stabil dan lingkungan yang mendukung, pada tahun 2007 kami memperluas armada kami menjadi bus besar untuk memenuhi permintaan yang semakin meningka
            </p>
        </section>
        <section>
            <h2>Mengapa Kami Didirikan:</h2>
            <p>
            Perusahaan ini didirikan dengan tujuan utama untuk mendukung perkembangan pariwisata dan memenuhi kebutuhan akan transportasi yang aman dan nyaman bagi sekolah-sekolah yang melakukan studi tour. Kami percaya bahwa dengan memberikan layanan terbaik, kami dapat berkontribusi positif bagi industri pariwisata dan pendidikan di Indonesia.
            </p>
        </section>
        <section>
            <h2>Pencapaian Kami:</h2>
            <p>
            Dimulai dari nol, kami mendatangi setiap sekolah untuk menawarkan jasa kami dan secara bertahap membangun reputasi melalui kepuasan pelanggan. Keberhasilan kami tersebar dari mulut ke mulut, dan sekarang kami bangga memiliki 15 unit bus pariwisata, jauh berkembang dari awal hanya dengan dua unit bus. Kepercayaan dan kepuasan pelanggan adalah motivasi utama kami untuk terus meningkatkan layanan. Kami di PT. Ichtra Jaya Trans berkomitmen untuk terus berinovasi dan meningkatkan kualitas layanan kami. Dengan armada yang selalu terjaga dan tim profesional yang berdedikasi, kami siap memberikan pengalaman perjalanan yang terbaik untuk setiap pelanggan.
            </p>
        </section>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>ADDRESS</h3>
                <p>Jalan Cipayung Raya, Cipayung, Jakarta Timur</p>
                <p>13840 (Depan SMA 4 PGRI)</p>
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