-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql205.infinityfree.com
-- Generation Time: Nov 20, 2023 at 12:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35205782_cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'nuur', '$2y$10$OBaOLk0RNiCQbDeHYhekPuLk/kLOg89OLwagiQx7kBBts50lZKOxi', 'Nuur');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `kelompok` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `kelompok`) VALUES
(7, 'PPL SL3');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `kelompok` varchar(250) NOT NULL,
  `topik` varchar(250) NOT NULL,
  `nilai` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nama`, `kelompok`, `topik`, `nilai`) VALUES
(22, 'Fadhkur Nuur M.', 'PPL SL3', 'Simulasi', '0'),
(23, 'Diva', 'PPL SL3', 'Simulasi', '20'),
(24, 'Sabah Ashfiya A. S. P. ', 'PPL SL3', 'Simulasi', '10'),
(25, 'Sahrul Mubarok', 'PPL SL3', 'Simulasi', '5'),
(26, 'Alifka Inahana', 'PPL SL3', 'Simulasi', '20'),
(27, 'Surya Wijayanti', 'PPL SL3', 'Simulasi', '5'),
(28, 'Riska Peryana ', 'PPL SL3', 'Simulasi', '15'),
(29, 'Nur Isrokhiyati ', 'PPL SL3', 'Simulasi', '20'),
(30, 'Safira Rohmah Hass', 'PPL SL3', 'Simulasi', '10'),
(31, 'Riska Peryana ', 'PPL SL3', 'Manajemen ', '72');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `topik` varchar(250) NOT NULL,
  `Pertanyaan` text NOT NULL,
  `Pilihan_A` text NOT NULL,
  `Bobot_Jawaban_A` int(11) NOT NULL,
  `Pilihan_B` text NOT NULL,
  `Bobot_Jawaban_B` int(11) NOT NULL,
  `Pilihan_C` text NOT NULL,
  `Bobot_Jawaban_C` int(11) NOT NULL,
  `Pilihan_D` text NOT NULL,
  `Bobot_Jawaban_D` int(11) NOT NULL,
  `Pilihan_E` text NOT NULL,
  `Bobot_Jawaban_E` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `topik`, `Pertanyaan`, `Pilihan_A`, `Bobot_Jawaban_A`, `Pilihan_B`, `Bobot_Jawaban_B`, `Pilihan_C`, `Bobot_Jawaban_C`, `Pilihan_D`, `Bobot_Jawaban_D`, `Pilihan_E`, `Bobot_Jawaban_E`) VALUES
(13, 'Simulasi', 'Teori yang menyatakan bahwa peserta didik selama kegiatan belajar lebih ditekankan untuk aktif berpikir, menyusun konsep-konsep serta memberi makna tentang hal-hal yang dipelajari dan yang paling penting terwujudnya belajar adalah niat peserta didik itu sendiri merupakan aliran dari teori?', 'Konstruktivis', 5, 'Behavioristik', 0, 'HumanistiK', 0, 'Sibernetik', 0, 'Kognitivistik', 0),
(14, 'Simulasi', 'Apabila dalam proses belajar peserta didik melakukan sesuatu sampai dengan mendapatkan respon yang tepat dan sesuai dengan apa yang diinginkan serta menghilangkannya apabila dirasakan tidak sesuai, hal ini merupakan prinsip belajar dari?', 'Konseptualisasi', 0, 'Conditioning', 0, 'Trial and error', 5, 'Stimulus respon', 0, 'Shaping', 0),
(15, 'Simulasi', 'Peserta didik diminta untuk membuat dugaaan pada populasi hewan langka yang semakin sedikit hal ini termasuk kegiatan untuk mengembangkan kecerdasan?', 'Visual spasial', 0, 'Verbal linguistiK', 0, 'Naturalis', 0, 'Logis matematis', 5, 'Kinestetis', 0),
(16, 'Simulasi', 'Peserta didik dalam suatu kelas gaya belajarnya beragam ada yang visual, auditori, dan kinestetik. Namun kegiatan pembelajaran selama ini masih banyak yang konvensional-klasikal. Agar dapat memenuhi ketiga gaya belajar tersebut, guru perlu?', 'Menggunakan metode ceramah, diskusi, tanya jawab.', 0, 'Menggunakan media komik pembelajaran dan buku paket.', 0, 'Menggunakan program audio dan modul.', 0, 'Menggunakan media audio, video, dan percobaan.', 5, 'Menggunakan modul dan powerpoint.', 0),
(17, 'Simulasi', 'Kegiatan pembelajaran yang diawali dengan pemberian rangsangan, mengidentifikasi masalah, melakukan pengumpulan data dan mengolah data sehingga mampu memberikan pembuktian dan menarik kesimpulan, sesuai dengan model pembelajaran?', 'problem based learning', 0, 'inquiry learning', 0, 'discovery learning', 5, 'integrated learning', 0, 'project based learning', 0),
(18, 'Manajemen #1', 'Apakah Anda bersedia memperdebatkan sesuatu walaupun kelompok itu jelas tidak setuju dengan Anda ?', 'Saya akan tetap mempertahankan argument saya.', 2, 'Saya akan menyimak argument lain terlebih dahulu.', 3, 'Saya akan berpikir ulang dan mencari jalan tengah.', 4, 'Saya mengalah.', 1, '-', 0),
(19, 'Manajemen #1', 'Suatu hari Anda sedang rapat bersama para pimpinan, salah seorang pimpinan mengeluarkan pendapatnya. Namun, Anda tidak setuju dengan pendapat tersebut, maka Anda akan ....', 'Langsung mengeluarkan pendapat Anda juga walaupun ia pimpinan', 4, 'Menutup mulut karena tidak mau membantah pimpinan', 3, 'Mengiyakan saja untuk menyetujui pendapat pimpinan', 2, 'Meninggalkan ruangan rapat karena Anda geram dengan pimpinan Anda', 1, '-', 0),
(20, 'Manajemen #1', 'Respon saya ketika dihadapkan dengan perubahan yang mendadak adalah ....', 'Bingung bagaimana harus bersikap', 2, 'Penuh harapan akan perubahan', 3, 'Tertekan karena cemasakan dampak yang akan terjadi', 4, 'Pesimis karena tidak dilibatkan dari awal proses', 1, '-', 0),
(21, 'Manajemen #1', 'Terkait pada suatu kesanggupan melakukan hal tertentu pada umumnya, saya akan .... ', ' Dalam waktu yang sama melakukan berbagai kegiatan', 2, 'Hanya melakukan kegiatan yang relevan dengan kegiatan utama', 3, ' Melakukan kegiatan lain sekedar sebagai selingan', 1, 'Lebih banyak melakukan kegiatan lain yang baru', 4, '-', 0),
(22, 'Manajemen #1', 'Ketika sedang santai di rumah, saya melihat seorang ibu yang sepeda motornya macet, sedangkan bengkel terdekat berjarak 100 meter dari rumah, yang akan saya lakukan adalah .... ', 'Menunggu saja apa yang akan dilakukan ibu tersebut', 1, 'Menunjukkan bahwa 100 meter lagi ada bengkel', 2, 'Menanyakan apa yang terjadi', 3, 'Membantu membawakan sepeda motor itu ke bengkel', 4, '-', 0),
(23, 'Manajemen #1', 'Demi kelancaran acara esok hari, divisi saya diminta kerja lembur, padahal saya sudah berjanji untuk mengantar ibu saya ke dokter. Yang seharusnya saya lakukan adalah...', 'Meminta izin kepada atasan untuk Mengantar ibu saya sebentar lalu kembali kerja ', 4, 'Lembur sampai pekerjaan selesai', 2, 'Mencoba menghubungi ibu saya dan mengatakan saya akan sedikit terlambat', 3, 'Pulang lebih cepat dengan pura-pura sakit', 1, '-', 0),
(24, 'Manajemen #1', 'Saat Anda dituduh dan dimarahi oleh atasan sedangkan hal tersebut tidak sesuai dengan keadaan sebenarnya, yang akan Anda lakukan adalah ... .', 'Menanggapi pertanyaan dari siapapun tentang isu isu tersebut', 1, 'Saya akan berusaha menemukan penyebar isu itu dan membuat perhitungan dengannya', 2, 'Saya akan membiarkannya saja karena nanti juga akan hilang dengan sendirinya ', 3, 'Berusaha menjelaskan keadaanku yang sebenarnya ', 4, '-', 0),
(25, 'Manajemen #1', 'Pada saat saya sedang menuju ke arah kantor dengan motor, terlihat atasan saya yang sedang berjalan kaki. Hal yang akan saya lakukan adalah...', 'Memelankan motor saya dan mengucapkan salam kepadanya', 1, 'Saya akan menghentikan kendaraan dan memohon izin untuk mendahuluinya', 3, 'Menghentikan kendaraan dan menawarkannya tumpangan ', 4, 'Saya akan mengurangi kecepatan sambil meminta izin untuk mendahului ', 2, '-', 0),
(26, 'Manajemen #1', 'Dilan adalah ketua organisasi yang baru dilantik. Dia belum lama bergabung dengan organisasi, namun karena dia luwes dan mudah bergaul akhirnya dia menjadi ketua. Ternyata setelah menjadi ketua sikapnya berubah menjadi cenderung kaku dan keputusan yang dibuat susah untuk diubah. Jika Anda menjadi anggota organisasi tersebut, apa yang akan Anda lakukan... ', 'Mengajak teman-teman lain untuk memberikan masukan ke Dilan sehingga kelompok yang solid tidak terpecah ', 4, 'Meminta Dilan untuk tidak bersikap otoriter di forum formal sehingga menjadi kesepakatan bersama ', 3, 'Membentuk kelompok untuk menentang kebijakan yang dibuat Dilan agar dia tahu kesalahan yang telah diperbuatnya ', 1, 'Mengajak Dilan berdialog secara empat mata ', 2, '-', 0),
(27, 'Manajemen #1', 'Apakah Anda merasa sulit meminta tolong pada seorang teman untuk melakukan sesuatu untuk Anda?', 'Merasa sulit karena tidak ingin memberatkan orang lain atas tugas saya ', 3, 'Jika dalam kondisi benar- benar mendesak maka saya akan meminta tolong pada orang lain ', 4, 'Tergantung situasi dan urgensi terkadang saya minta tolong, terkadang tidak jika tidak dibutuhkan ', 2, 'Selalu meminta tolong meskipun tugas tersebut sudah menjadi tanggungjawab saya ', 1, '-', 0),
(28, 'Manajemen #1', ' Apa yang Anda lakukan dalam sebuah diskusi dengan sekelompok kecil teman-teman Anda sekantor?', 'Saya selalu aktif berpendapat dan mengarahkan teman- teman untuk aktif juga ', 4, 'Jika perlu bicara maka saya ungkapkan, jika tidak maka saya cukup mendengar ', 3, 'Saya menjadi pengamat sejenak kemudian aktif berpendapat', 2, 'Saya aktif berpendapat dan mengarahkan teman- teman untuk mengikuti pendapat saya', 1, '-', 0),
(29, 'Manajemen #1', 'Rafi ditugaskan untuk memimpin tim dengan deadline tugas yang singkat. Saat Rafi menjelaskan tentang tugas yang harus diselesaikan pada seluruh anggota tim kerja, salah satu anggota tim menunjukkan sikap tidak peduli dengan tugas dan penjelasan yang diberikan. Sikap Rafi kemudian adalah ...', 'Bekerja sendiri asalkan tugas selesai', 2, 'Memberi ancaman yang efektif seperti dikeluarkan dari tim, bagi anggota tim yang tidak serius bekerja', 1, 'Menasihatinya agar anggota tim segera sadar akan penyelesaian tugas yang diberikan', 3, 'Membagi tugas sesuai porsinya, mengarahkan, mendampingi dan memotivasi selalu anggota tim untuk menyelesaikannya, serta jika ada kekeliruan akan memberi teguran', 4, '-', 0),
(30, 'Manajemen #1', 'Anda adalah atasan di suatu perusahaan, saat itu Anda sedang dalam komunikasi dengan | klien untuk membahas suatu proyek. Pada saat komunikasi tersebut Anda membutuhkan pegawai lain serta konsultan untuk keputusan yang akan Anda ambil. Sikap Anda adalah ... .', 'Melibatkannya jika dalam keadaan genting saja', 3, 'Ragu dalam pengambilan keputusan melibatkan pegawai dan konsultan atau tidak', 2, ' Langsung saja mengambil keputusan sendiri tanpa melibatkan siapapun karena harus  segera', 1, 'Tetap melibatkan pegawai dan konsultan dalam pengambilan keputusan karena dalam segala hal komunikasi adalah yang utama', 4, '-', 0),
(31, 'Manajemen #1', 'Suatu saat Anda diberi tanggung jawab menjadi pemegang uang simpan pinjam di organisasi di mana Anda tinggal. lwan mendatangi Anda untuk mengetahui simpanan uang yang dipunyai oleh Marwis. Hal dilakukan oleh lwan dengan alasan Marwis mempunyai hutang ke lwan dan terkesan tidak mau membayar dengan alasan Tidak mempunyai uang padahal ia sangat membutuhkan uang tersebut untuk membayar uang sekolah anaknya. Jika saya pada kondisi tersebut yang akan saya lakukan dalam menghadapi lwan adalah ...', 'Memberi gambaran tentang keuangan Marwis tanpa menyebutkan jumlah nimimalnya', 3, 'Saya tidak akan memberi tahu jumlah uang', 4, 'Mencoba menasehati Marwis untuk membayar ke lwan langsung', 2, 'Mendorong lwan untuk menagih karena saya tahu Marwis mempunyai uang di simpanan', 1, '-', 0),
(32, 'Manajemen #1', 'Andi adalah seorang kabag di suatu dinas di Kabupaten Lumbung. Andi dikenal orang yang cukup patuh pada atasan. Suatu hari atasannya yang bernama Yanto pergi ke luar kota untuk urusan dinas yang cukup rahasia. Andi diminla untuk mengawasi pegawai secara ketat. Hal ini ditekankan oleh Yanto karena ia mendapat laporan bahwa banyak karyawan yang sering terlambat datang dan pulang sebelum waklu kela habs. Yanto juga berpesan agar Andi tidak memberitahukan kepada siapapun kemana ia pergi karena tugas yang diembannya cukup rahasia. Andi menyatakan kesanggupannya untuk mengawasi karyawan dan memegang rahasia tersebut. Pada hari pertanna Yanto pergi, Andi menemukan 5 pegawai yang datang terlambat tanpa alasan yang jelas dan 7 orang yang pulang sebelum jam kerja selesai. Pada hari kedua Yanto, datang tamu pejabat penting dari provinsi yang mempunyai urusan penting berkailan dengan tugas, dan harus diselesaikan hari itu juga. la memaksa Andi untuk memberitahu ke mana atasan Andi karena sejak 2 hari terakhir Yanto tidak bisa dihubungi. Jika Anda Andi, tindakan yang Anda ambil dalam menghadapi tamu dari propinsi adalah ...', 'Tetap tidak mengatakan kemana Yanto pergi karena sudah berjanji', 3, 'Mengalakan kepada tamu dari provinsi diri Anda tidak mempunyai kewenangan untuk memberikan informasi', 4, 'Berjanji akan segera menghubungi Yanto tetapi tetap memberilahu kemana Yanto pergi', 1, 'Mengalakan tidak tahu kemana Yanto pergi', 2, '-', 0),
(33, 'Manajemen #1', 'Ridwan diminta menyimpan dokumen penilaian kinerja seluruh karyawan PT Maju Lancar oleh manajer SDM karena mendadak harus pergi, dengan pesan jangan dibuka karena datanya bersifat rahasia. Tidak ada seorang pun yang tahu bahwa Anda diberi kepercayaan tersebut. Dalam dokumen tersebut memuat data-data tentang pegawaipegawai yang akan dipromosikan. Ridwan adalah salah satu pegawai yang akan dipromosikan tersebut. Jika Anda sebagai Ridwan, tindakan yang akan Anda lakukan adalah ... .', 'Melihat dokumen tersebut khusus dokumen yang berkaitan dengan diri Anda', 2, 'Melihat seluruh dokumen pegawai yang dicalonkan untuk promosi sekadar untuk mengetahui saja tanpa memberi tahu orang lain', 1, 'Tidak membuka dokumen karena sudah dipesan untuk tidak membukanya', 4, 'Menanyakan langsung secara pribadi kepada manajer SDM tentang kesempatan Anda untuk dipromosikan', 3, '-', 0),
(34, 'Manajemen #1', 'Jika saya menjadi anggota yang melanggar pakta integritas, maka ketika mendapat teguran biasanya saya...', 'Memberi alasan yang dapat diterima mengapa saya melanggar pakta integritas', 1, 'Saya akan menerima teguran tersebut karena memang salah meskipun menghadapi konsekuensi juga akan disalahkan oleh anggota yang lain', 4, 'Pasrah akan nasib yang saya terima', 3, 'Menemui Anda sebelum mendapat teguran.', 2, '-', 0),
(35, 'Manajemen #1', 'Secara umum orang yang mengatakan saya orang yang dapat dipercaya karena ... .', ' Saya orang yang ramah dan mau mendengar keluhan orang lain', 3, 'Saya melakukan apa yang saya katakan', 4, 'Saya bersifat sabar dan penuh perhatian terhadap orang lain', 1, 'Saya siap mernbantu tanpa memikirkan imbalan yang akan saya terirna', 2, '-', 0),
(36, 'Manajemen #1', 'Akan ada libur nasional yang jatuh pada hari Selasa. Sudah menjadi kebiasaan umum di sebuah instansi pemerintahan, tempat Irma kerja, untuk melakukan bolos massal di hari Senin dengan alasan hari kejepit nasional. Menurut Anda, yang sebaiknya dilakukan oleh Irma adalah ... .', 'Menolak bolos massal di hari Senin karena bertentangan dengan nilai-nilai dalam diri sendiri', 4, 'Masuk setengah hari di hari Senin, jika kantor sepi maka tidak melanjutkan kerja dan memutuskan pulang', 2, 'Mengikuti kebiasaan umum untuk bolos massal di hari Senin untuk menjaga toleransi dengan rekan kerja yang lain', 1, 'Mempelajari aturan yang berlaku secara nasional dan mengikutinya secara konsisten', 3, '-', 0),
(37, 'Manajemen #1', 'Anda akan berangkat mengikuti tes seleksi. Di tengah perjalanan sepeda motor Anda mengalami pecah ban. Untuk menambalkan butuh waktu 10 menit. Pada hal waktu tes tinggal 10 menit lagi. Jarak ke tempat tes masih 2 km. Jika Anda naik angkot juga membutuhkan waktu sekitar 10 menit. Di sekitar Anda tidak ada tukang ojek. Apa yang Anda lakukan ?', ' Saya akan menuntun motor ke bengkel kemudian naik angkot', 1, 'Saya akan menitipkan motor ke rumah penduduk kemudian menelpon temen untuk menjemput dan mengantar ke tempat les', 4, 'Saya akan membatalkan ikut les karena mempertimbangkan dengan apapun saya akan terlambal sampai di tempat tes dan kemungkinan diperbolehkan ikut tes kecil', 3, ' Saya akan menitipkan motor ke rumah penduduk terdekat kemudian segera naik angkot', 2, '-', 0),
(38, 'Sosiokultural #1', 'Dalam situasi terjadi perdebatan karena perbedaan pendapat, biasanya saya ...', 'Meninggalkan ruangan karena saya tidak tahan mendengar perdebatan.', 0, 'Berusaha menengahi agar perbedaan tidak terjadi berkepanjangan.', 5, 'Berusaha memahami kedua belah pihak mengapa sampai terjadi perdebatan.', 0, 'Memihak dengan orang yang sependapat dengan saya.', 0, 'Diam dan mengikuti proses perdebatan sampai selesai.', 0),
(39, 'Sosiokultural #1', 'Bagaimana reaksi Anda menyikapi aksi-aksi kekerasan yang sering terjadi di jalanan?', 'Takut dan trauma saat berada di jalan.', 0, 'Tidak ambil pusing dengan kejadian tersebut.', 0, 'Melaporkan aksi yang ada dan tetap waspada saat berkendara di jalan.', 5, 'Hanya asyik menonton tanpa melakukan sesuatu.', 0, 'Sebisa mungkin mencari teman ketika melewati jalan tersebut.', 0),
(40, 'Sosiokultural #1', 'Anda ditunjuk sebagai memimpin sebuah rapat. Ada anggota rapat yang selalu menyela Anda ketika presentasi berjalan. Sikap Anda...', 'Biasa saja', 0, 'Saya dengarkan argumentasinya dengan penuh rasa penasaran', 0, 'Saya anggap dia orang yang aktif', 0, 'Tidak peduli', 0, 'Saya minta dia untuk mendengar presentasi saya lebih dahulu lalu memberikan argumentasi', 5),
(41, 'Sosiokultural #1', 'Jika atasan saya memberikan pendapat dan masukan kepada saya maka...', 'Saya tidak peduli karena saya sudah bekerja sesuai dengan kemampuan saya', 0, 'Saya menerimanya dan mendengarkannya', 0, 'Saya mengintrospeksi diri saya kemudian saya memperbaikinya', 5, 'Pemimpin saya memang orangnya perfeksionis', 0, 'Saya senang jika ada yang memberikan kritik dan saran pada saya', 0),
(42, 'Sosiokultural #1', 'Dalam suatu kelompok kerja, biasanya anggota kelompok terdiri dari berbagai latar belakang budaya, dan saya merasa...', 'Sebagian orang menerima saya jika saya dapat mengikuti aturan dalam kelompok.', 0, 'Perlu berhati-hati akan apa yang bisa saya katakan atau saya perbuat dalam kelompok kerja.', 0, 'Benar-benar aman menjadi diri sendiri, dan saya tidak pernah berkonflik dengan anggota kerja yang lain.', 5, 'Tidak pernah menjadi diri sendiri dalam kelompok kerja.', 0, 'Tidak cukup berani untuk menjadi diri sendiri dalam kelompok kerja.', 0),
(43, 'Sosiokultural #1', 'Anda baru saja mendapatkan pekerjaan di sebuah perusahaan di mana mayoritas karyawannya berlawanan jenis kelamin dengan Anda. Suatu hari atasan Anda menemui Anda dan mengatakan bahwa kehadiran Anda membuat banyak karyawan susah fokus dalam bekerja karena mereka lebih banyak memperhatikan diri Anda dibanding pekerjaan mereka sendiri. Atasan Anda kemudian mengisyaratkan agar Anda melakukan sesuatu untuk mengatasi permasalahan tersebut. Apa yang akan Anda lakukan?', 'Tetap bekerja seperti biasa. Toh, kesalahan bukan berada di pihak saya.', 0, 'Menyarankan kepada atasan agar mendisiplinkan para karyawan tersebut.', 0, 'Meminta kepada bagian kepegawaian untuk dipindahkan ke divisi lain.', 0, 'Mengubah tampilan dan perilaku Anda agar tidak menarik perhatian lawan jenis.', 5, 'Sedapat mungkin menyarankan kepada rekan-rekan yang lain agar lebih fokus dalam bekerja.', 0),
(44, 'Sosiokultural #1', 'Ketika Anda makan, disebelah Anda ada orang yang bau badan, bagaimana sikap Anda?', 'Cepat-cepat selesaikan makan lalu pergi', 0, 'Cuek saja dan pura-pura tidak terjadi apa-apa', 0, 'Biasa saja selagi tidak mengganggu Anda.', 5, 'Menyuruhnya pindah tempat duduk. Dengan dalih akan ada saudara Anda yang akan duduk', 0, 'Mencari posisi yang enak dan nyaman agar Anda tidak terganggu', 0),
(45, 'Sosiokultural #1', 'Anda ditugaskan di daerah yang memiliki kebudayaan berbeda dengan Anda, teman satu tim juga memiliki latar belakang yang berbeda dengan Anda. Lalu sikap Anda?', 'Menganggap perbedaan bukan masalah', 0, 'Berusaha memahami perbedaan tersebut', 0, 'Tidak memandang perbedaan dalam mengerjakan tugas', 0, 'Biasa saja karena perbedaan itu pasti ada di setiap kelompok', 0, 'Mencoba berbaur agar perbedaan tidak menjadi masalah di dalam kelompok', 5),
(46, 'Sosiokultural #1', 'Dina adalah seorang mahasiswi kedokteran, di tengah perkuliahan dia mengalami depresi berat karena kedua orang tuanya meninggal akibat kecelakaan. Sehingga dia berobat sampai sembuh dan bisa menyelesaikan kuliahnya. Setelah selesai kuliah dia ingin melanjutkan sekolah spesialis, tetapi ditolak oleh panitia seleksi karena ada riwayat gangguan kejiwaan tersebut. Menurut Anda, tindakan panitia seleksi itu...', 'Sangat tepat karena jika sewaktu-waktu gangguan jiwanya kambuh, bisa membahayakan pasien', 0, 'Tidak tepat karena melanggar HAM', 0, 'Seharusnya diterima saja karena Dina sudah sembuh dan tidak akan berpengaruh apa-apa', 5, 'Seharusnya panitia seleksi memberi kesempatan pada Dina', 0, 'Tepat karena orang dengan riwayat gangguan jiwa bisa meresahkan', 0),
(47, 'Sosiokultural #1', 'Dalam dunia kerja, Anda akan bertemu dengan orang-orang dari latar belakang yang berbeda. Terkadang ada orang yang cuek dan tidak mau tahu, ada juga yang sangat aktif mengkritik dan menyuarakan pendapatnya terhadap Anda. Sikap Anda', 'Bersifat terbuka terhadap kritik atau masukan', 0, 'Menjadikan kritikan sebagai masukan yang membangun agar Anda bisa menjadi pribadi yang lebih baik lagi.', 5, 'Saya jadikan kritikan sebagai bahan evaluasi diri', 0, 'Berusaha menerima setiap kritikan yang dilontarkan untuk Anda', 0, 'Memahami karakter setiap orang yang Anda temui', 0),
(48, 'Sosiokultural #1', 'Suatu hari Anda sedang makan di luar bersama rekan kerja. Beberapa saat kemudian datang seorang anak gelandangan yang mengatakan ia lapar dan meminta uang atau sisa makanan. Sikap Anda terhadap situasi ini?', 'Memberi ia uang lalu menyuruhnya pergi', 0, 'Memberikan ia sisa makanan dan uang', 5, 'Membelikannya makanan', 0, 'Menanyakan dimana orang tuanya', 0, 'Menanyakan apakah ia bersekolah', 0),
(49, 'Sosiokultural #1', 'Suatu hari Anda berlibur ke kampung sahabat Anda yang berbeda latar belakang agama dan budaya dengan Anda. Sahabat Anda mengajak mampir ke salah satu warung makan di kampungnya. Dia memesan daging anjing bakar yang merupakan makanan kesukaannya tetapi terlarang bagi Anda. Bagaimana sikap Anda...', 'Ikut memakan daging anjing itu sebagai wujud toleransi beragama', 0, 'Tidak memakannya kemudian mengajaknya berbincang tentang apa keistimewaan daging anjing itu', 0, 'Tidak memakannya kemudian menanyakan hal lain tentang adat dan kebudayaan di kampungnya agar lebih memahami kebiasaan-kebiasaannya', 5, 'Tidak ikut memakannya serta tidak berkomentar agar sahabat Anda tidak tersinggung', 0, 'Ikut mencicipinya sebagai wujud penghargaan dan pengamalan Bhinneka Tunggal Ika', 0),
(50, 'Sosiokultural #1', 'Dalam rangka merayakan ulang tahun anak rekan kerja Anda yang sangat dekat dengan Anda. Rekan Anda mengundang Anda dan meminta Anda datang ke acara ulang tahun anaknya yang akan diadakan besok malam di sebuah restoran cepat saji tidak jauh dari kontrakan Anda. Anda tahu persis sudah pasti akan diadakan pesta untuk anak-anak yang sangat meriah. Padahal Anda sendiri sangat tidak menyukai anak-anak, maka yang Anda lakukan...', 'Menelpon dan memohon maaf karena tidak akan hadir dan memberi kado di lain kesempatan', 0, 'Hadir sebentar saja, memberikan kado, dan segera pulang untuk menghargai undangannya', 0, 'Datang dengan ekspresi yang tidak menyenangkan karena banyak anak-anak', 0, 'Datang dan memberi kado, dan mengikuti acara sampai selesai', 5, 'Tidak datang tanpa konfirmasi apapun karena jika datang Anda akan merasa sangat terganggu dengan keberadaan anak-anak', 0),
(51, 'Sosiokultural #1', 'Kamu mempunyai keluarga di luar negeri dan hari ini salah satu dari anak keluargamu tersebut akan liburan di Indonesia dan tinggal di rumahmu, apa yang akan kamu lakukan untuk menjelaskan padanya mengenai keberagaman di Indonesia?', 'Mengajaknya mengenal budaya dengan menceritakan sejarah di tempat-tempat yang dilewati', 0, 'Mengajak orang-orang di lingkungan buat memperkenalkan keberagaman kepadanya', 0, 'Mengajaknya main ke tempat-tempat ibadah', 0, 'Jadi wakil orang tuanya untuk mendidik dia tentang keberagaman', 0, 'Menjadi perpanjangan tangan orang tua untuk mengajarinya tentang keberagaman melalui tindakan sehari-hari', 5),
(52, 'Sosiokultural #1', 'Anda ditugaskan oleh atasan Anda untuk bekerja selama beberapa minggu di luar daerah. Setibanya di sana, ternyata daerah tersebut mayoritas wanitanya berhijab, sedangkan Anda belum berhijab. Bagaimana Anda menyikapi hal tersebut?', 'Tetap pada pendirian dan berpenampilan seperti biasanya', 0, 'Ikut memakai hijab dan melakukannya secara berkesinambungan', 0, 'Ikut memakai hijab sebagai wujud penghargaan terhadap budaya daerah tersebut', 5, 'Ikut memakai hijab walaupun Anda merasa risih untuk menghargai budaya daerah tersebut', 0, 'Anda merasa belum pantas untuk berhijab, lebih baik hijab hati dulu', 0),
(53, 'Sosiokultural #1', 'Anda bekerja di event organizer perusahaan jasa acara pernikahan. Sudah menjadi hal yang lumrah jika mewarnai rambut bukan menjadi masalah bagi perusahaan Anda. Suatu ketika Anda ditugasi oleh atasan ke suatu daerah di mana di tempat itu ada stigma masyarakat bahwa mewarnai rambut identik dengan preman yang ditakuti oleh sebagian besar masyarakat. Sikap Anda adalah...', 'Tetap pada pendirian dan berpenampilan seperti biasanya', 0, 'Mewarnai rambut menjadi hitam dan melakukannya secara berkesinambungan', 0, 'Mewarnai hitam rambut saya sebagai wujud penghargaan terhadap budaya daerah tersebut', 5, 'Berusaha mewarnai rambut menjadi hitam walaupun Anda lebih suka rambut warna-warni dalam rangka menghargai budaya daerah tersebut', 0, 'Anda merasa warna rambut warna-warni bukan masalah bagi warga desa tersebut', 0),
(54, 'Sosiokultural #1', 'Teman kantor saya memberikan saya hadiah ulang tahun yang saya tidak sukai, sikap saya...', 'Memberikan hadiah tersebut kepada orang lain', 0, 'Menggunakannya untuk keperluan saya', 5, 'Menyimpannya sebagai kenangan', 0, 'Menggunakannya untuk menyenangkan teman saya', 0, 'Menyimpan dan tidak akan menyentuhnya', 0),
(55, 'Sosiokultural #1', 'Ketika Anda hendak berangkat ke kantor, Anda melewati jalan raya dan Anda melihat banyak orang membuang sampah di dekat tempat pembuangan sampah dan sampah tersebut berserakan di pinggir jalan yang mengganggu pandangan dan jalannya kendaraan. Apa yang akan Anda lakukan melihat keadaan tersebut?', 'Segera merapikan sampah itu tanpa pikir panjang, demi kepentingan pengguna jalan lain dan masyarakat banyak', 5, 'Melewati dan membiarkannya begitu saja karena bukan tanggung jawab saya', 0, 'Memberitahu orang yang ada di sekitar jalan untuk memungut sampah tersebut dan membuang pada tempat pembuangan sampah yang telah disediakan', 0, 'Memfoto dan merekam video, lalu diviralkan melalui media sosial agar semua orang paham kondisi di sekitar tempat pembuangan sampah', 0, 'Menelepon pihak berwenang yang bertanggung jawab dengan sampah ini', 0),
(56, 'Sosiokultural #1', 'Siang ini Anda menerima panggilan untuk proses rekrutment pada sebuah perusahaan. Ketika Anda berangkat untuk mengikuti rekrutment tersebut di tengah perjalanan Anda melihat kerumunan orang di pinggir jalan dan ternyata telah terjadi kecelakaan dengan korban tabrak lari, sedangkan Anda harus sesegera mungkin sampai di perusahaan untuk memulai seleksi, maka sikap Anda...', 'Tetap melanjutkan perjalanan untuk tepat waktu mengikuti tes pekerjaan', 0, 'Mengabaikannya karena harus mengikuti tes yang akan dimulai sebentar lagi', 0, 'Tetap melanjutkan perjalanan setelah yakin ada orang lain yang menolong', 0, 'Menolongnya, kemudian membawanya ke rumah sakit atau kantor polisi', 5, 'Mengejar pelaku tabrak lari dan memintanya untuk bertanggung jawab atas perbuatannya', 0),
(57, 'Sosiokultural #1', 'Malam ini Anda bersama anggota keluarga berkumpul untuk makan bersama. Salah satu di antaranya menggunakan gawai untuk menjelajahi teknologi informasi pada gawai nya, seperti WhatsApp, Line, Twitter, Instagram. Sikap Anda terhadap ilustrasi di atas...', 'Membiarkannya karena itu suatu hal wajar untuk bersosialisasi dengan rekan di dunia maya', 0, 'Menarik gawai nya dan tidak akan mengembalikannya sebelum seluruh anggota keluarga selesai makan', 0, 'Melanjutkan makan dan berbincang dengan anggota keluarga lainnya', 0, 'Menasehatinya pada saat makan untuk tidak menggunakan gawai', 5, 'Menanyakan alasannya menggunakan gawai tersebut dan mengingatkan untuk mematikan gawai nya', 0),
(58, 'Manajerial #2', 'Anda bekerja di bagian perusahaan pelayanan publik, dan perusahaan Anda menerapkan sistem excellent service terhadap konsumen. Sistem excellent service begitu penting bagi perusahaan. Apa yang harus dilakukan?', 'Mempelajari lagi bagaimana penerapan excellent service', 0, 'Melakukan training terjadwal untuk semua karyawan', 5, 'Mempelajari dan memperdalam pengetahuan tentang excellent service', 0, 'Mencari informasi dan mempelajari lagi excellent service', 0, 'Mendatangkan mentor untuk mengajari kembali excellent service', 0),
(59, 'Manajerial #2', 'Anda memimpin sebuah tim dari berbagai lulusan universitas terkemuka. Kinerja tim Anda sangat bagus. Menurut Anda, apa penyebabnya?', 'Seluruh anggota tim bekerja dengan profesional dalam menyelesaikan tugas', 0, 'Semua anggota tim menjalani tujuan tim', 0, 'Anggota tim masing-masing memiliki potensi yang bagus di setiap bidangnya', 0, 'Akibat pentingnya menjaga kekompakan, bermusyawarah mufakat, bekerja dengan disiplin', 5, 'Motivasi yang mengena kepada seluruh anggota tim', 0),
(60, 'Manajerial #2', 'Anda diutus oleh pimpinan kantor Anda bertugas ke sebuah daerah yang tidak punya fasilitas teknologi informasi yang memadai, dan daerah tersebut memiliki masyarakat yang tidak paham teknologi informasi. Sebagian masyarakat meyakini bahwa pembangunan teknologi informasi belum begitu penting, sementara atasan Anda memberikan tugas tersebut kepada Anda sebagai tuntutan program nawacita yang mesti dilaksanakan. Langkah Anda adalah...', 'Mengedukasi masyarakat tersebut tentang perkembangan ICT saat ini penting bagi masyarakat Indonesia.', 5, 'Berkordinasi dengan kepala desa dan masyarakat setempat untuk membangun infrastruktur meskipun masyarakat masih bingung.', 0, 'Membangun infrastruktur IT yang memadai untuk digunakan masyarakat desa lalu kemudian mengadakan pelatihan khusus.', 0, 'Menghormati kebudayaan daerah di desa tersebut bahwa Bhinneka Tunggal Ika penting. IT di desa tersebut belum terlalu bermanfaat bagi masyarakat sekitar.', 0, 'Melaporkan kepada atasan kantor Anda bahwa sebenarnya kondisi desa tersebut belum siap untuk dibangun infrastruktur teknologi informasi.', 0),
(61, 'Manajerial #2', 'Anda sedang mengerjakan tugas di perpustakaan dan 1 jam lagi harus selesai. Tiba-tiba ada teman Anda yang menanyakan letak suatu buku. Apa yang Anda lakukan?', 'Menyuruhnya untuk bertanya ke petugas perpustakaan', 0, 'Menyampaikan bahwa Anda sedang sibuk', 0, 'Memberitahukan hanya letak rak dan posisi bukunya saja', 0, 'Meninggalkan pekerjaan Anda sebentar untuk mengantarnya menunjukkan buku yang dimaksud, dan kembali melanjutkan pekerjaan Anda.', 5, 'Pura-pura tidak mendengarkannya', 0),
(62, 'Manajerial #2', 'Ketika sedang berjalan-jalan di sebuah mall, Anda mendapati dua rekan kerja Anda sedang bermesraan, padahal tempat Anda bekerja memiliki peraturan yang melarang rekan sekantor untuk berhubungan asmara. Jika mereka tidak menyadari keberadaan Anda, apa yang akan Anda lakukan?', 'Mendokumentasikan kemesraan mereka dan mengirimkannya ke bagian kepegawaian.', 0, 'Mendokumentasikan dan menyebarkannya di grup WhatsApp kantor.', 0, 'Menghampiri dan menegur mereka.', 5, 'Biarkan saja. Itu bukan urusan saya.', 0, 'Mempertimbangkan untuk berhenti dari perusahaan Anda yang semua karyawannya laki-laki karena takut tertular virus LGBT.', 0),
(63, 'Manajerial #2', 'Berubah-pindah kerja adalah hal yang wajar. Bagi saya', 'Saya tidak berpendapat bahwa karyawan harus setia terhadap perusahaannya.', 0, 'Saya meyakini nilai-nilai yang mengatakan bahwa loyalitas terhadap pekerjaan adalah sikap yang terpuji.', 0, 'Pekerjaan saya saat ini tidak dapat menjamin masa depan saya.', 0, 'Saya meyakini loyalitas itu penting', 5, 'Saya suka dengan pekerjaan saya, tapi jika ada pekerjaan yang lebih baik, saya tidak ragu untuk pindah.', 0),
(64, 'Manajerial #2', 'Dengan perkembangan IT yang pesat, bagaimana kita menanggapinya untuk pekerjaan kita?', 'Belajar Teknologi Informasi dengan semangat untuk memperbaiki kinerja', 5, 'Belajar Teknologi Informasi dengan penuh suka cita karena menyukai bidang tersebut', 0, 'Belajar Teknologi Informasi agar pekerjaan cepat selesai', 0, 'Belajar Teknologi Informasi agar dapat mengerjakan tugas dengan baik', 0, 'Tidak belajar Teknologi Informasi karena tidak menyukainya', 0),
(65, 'Manajerial #2', 'Kamu seorang dokter umum di RS Pemerintah dan ada ibu-ibu bawa anaknya yang sekarat, apa yang kamu lakukan?', 'Memberikan nomor antrian seperti pasien lain', 0, 'Menolongnya duluan atas dasar kemanusiaan', 5, 'Menyuruh ibu tersebut mengantri', 0, 'Memprioritaskan anak tersebut', 0, 'Membiarkannya saja', 0),
(66, 'Manajerial #2', 'Kamu menemukan artikel di internet yang bisa membantu pekerjaan, apa yang kamu lakukan?', 'Menerapkan dalam pekerjaan', 0, 'Memberi tahu rekan kerja yang dekat saja', 0, 'Memberi tahu saat rapat', 0, 'Memberi tahu ke rekan yang mau tahu saja', 0, 'Memberitahukan kepada rekan-rekan sekantor', 5),
(67, 'Manajerial #2', 'Saat presentasi kelompok, anggota yang harusnya jadi pembicara tidak bisa datang, sebagai ketua tim kamu sebaiknya:', 'Menelpon orang tersebut sambil memikirkan alternative', 5, 'Menyemangati anggota tim yang lain', 0, 'Kesal kepadanya', 0, 'Lapor ke dosen dan minta arahan', 0, 'Dirapatkan sama anggota kelompok', 0),
(68, 'Manajerial #2', 'Di dalam perusahaan tempat kamu bekerja diadakan pelatihan tentang teknologi yang baru rilis. Kamu mengetahui bahwa teknologi itu tidak ada hubungannya dengan pekerjaan yang kamu emban sedangkan atasanmu memerintahkanmu untuk ikut maka tindakanmu...', 'Menolak karena bertolak belakang dengan pekerjaan yang saya emban', 0, 'Menerimanya dengan senang hati dan ambisius mengikutinya karena atasan akan memuji', 0, 'Menerima dan mengikuti pelatihan namun tidak mendengarkan apa materi pelatihan', 0, 'Menerima dan menunjukkan kepada atasan bahwa diri anda patuh dan taat kepada atasan', 0, 'Menerima dan mengikuti pelatihan karena sadar akan pentingnya pelatihan tersebut', 5),
(69, 'Manajerial #2', 'Ada selembar uang yang jaluh di jalan tanpa diketahui siapa pemiliknya yang anda lakukan adalah...', 'Mengambilnya dan memberikan kepada yang butuh', 0, 'Mengambilnya dan memberikan ke kotak amal', 0, 'Mengambilnya dan dibawa pulang', 0, 'Melewatinya begitu saja', 0, 'Mengambil dan kalau menemukan pemiliknya segera mengembalikannya', 5),
(70, 'Manajerial #2', 'Ada tamu mencari atasan anda di kantor yang merupakan kawasan bebas asap rokok. Di ruang tunggu, sang tamu merokok dengan asyiknya. Saat satpam menegurnya, tamu tersebut marah, anda yang menyaksikan kejadian itu...', 'Diam saja, bukan urusan saya', 0, 'Ikut mengingatkan bahwa dilarang merokok', 5, 'Memberikan permen', 0, 'Mengajak ngobrol dan menemani tamu merokok', 0, 'Minta maaf bila satpam terkesan kurang sopan kemudian menawarkan minum', 0),
(71, 'Manajerial #2', 'Iqbal adalah seorang pelayan publik suatu hari tiba-tiba datang seorang ibu yang marah-marah karena pelayanan yang tidak sesuai dan memarahi Iqbal teman anda sampai menyakiti kepercayaannya, sikap anda...', 'Diam saja karena tidak urusan anda', 0, 'Menenangkan ibu itu lalu mengarahkannya ke bagian pelayanan', 5, 'Menenangkan ibu itu', 0, 'Balik memarahi ibu itu', 0, 'Menenangkan ibu itu lalu mengucapkan apa yang dilakukan nya menyakiti teman anda', 0),
(72, 'Manajerial #2', 'Anda sedang berkunjung ke rumah paman anda, anda melihat aktivitas kepemudaan di sana tidak terlalu berkembang padahal ada potensi untuk mengembangkannya, bagaimana sikap anda terhadap masalah tersebut?', 'Diam saja karena anda bukan warga setempat', 0, 'Menyampaikan hal tersebut kepada pejabat desa setempat', 0, 'Hanya menyampaikan gagasan anda tersebut kepada paman anda', 0, 'Langsung menyampaikan gagasan anda kepada pemuda-pemuda setempat', 5, 'Menyampaikan gagasan anda kepada tokoh masyarakat setempat', 0),
(73, 'Manajerial #2', 'Dalam suatu kerja tim, Andi ditunjuk sebagai Koordinator team anda. Setelah sekian lama, anda dan teman-teman tim merasa Andi tidak mampu mengatur kinerja tim sesuai jadwal pengerjaan, yang anda lakukan?', 'Mengadakan rapat untuk menyelesaikan pekerjaan tim tanpa Andi', 0, 'Mengajukan diri sebagai koordinator tim menggantikan Andi', 0, 'Bersama-sama dengan teman tim menemui pembimbing untuk meminta Koordinator diganti saja', 0, 'Menyemangati dan membantu Andi agar pekerjaan dapat selesai tepat waktu', 5, 'Kerja tim sesuai dengan keputusan Andi', 0),
(74, 'Manajerial #2', 'Di perusahaan anda baru saja memperbaharui salah satu perangkat IT guna mempermudah karyawan menyelesaikan tugasnya. Sikap anda adalah...', 'Mengajak rekan-rekan anda untuk mencari informasi bagaimana mengoperasikan perangkat tersebut di waktu kosong', 0, 'Mencari informasi mengenai pengoperasian perangkat tersebut bersama rekan-rekan anda', 5, 'Meminta orang lain untuk mengajar anda dan rekan-rekan anda cara mengoperasikan perangkat tersebut', 0, 'Mencari informasi di internet dan mempelajarinya bersama rekan-rekan anda', 0, 'Anda mengajak rekan-rekan anda mencari informasi terkait pengoperasian perangkat tersebut sepulang kantor', 0),
(75, 'Manajerial #2', 'Anda seorang karyawan BPJS. Waktu itu ada ibu-ibu yang anaknya sakit keras dan meminta didahulukan pengurusan BRISnya padahal banyak orang antre di situ. Bagaimana sikap Anda...', 'Mendahulukan ibu-ibu tersebut.', 0, 'Meminta maaf kepada ibu-ibu tersebut dan dipersilakan untuk mengantri seperti yang lain.', 5, 'Berlindak adil sesuai antrean dan prosedur.', 0, 'Menyuruh ibu-ibu tersebut untuk mengantre seperti yang lain.', 0, 'Menasihati ibu-ibu tersebut untuk mengetahui prosedur antrean', 0),
(76, 'Manajerial #2', 'Salah satu anggota tim anda melakukan kesalahan fatal dalam tugasnya karena kurangnya pemahaman dia tentang teknologi informasi. Sebagai ketua tim apa yang anda lakukan....', 'Mengumpulkan semua anggota tim dan membahas serta mencari jalan keluar dari permasalahan tim.', 5, 'Mengundang ahli IT untuk memberikan pengetahuan kepada tim tentang cara penggunaan teknologi informasi.', 0, 'Mengundang ahli IT untuk memberikan pengetahuan kepada tim tentang pentingnya teknologi informasi dan pelatihan cara penggunaan teknologi informasi.', 0, 'Mengumpulkan anggota tim dan membahas permasalahan anggota tim yang bermasalah tersebut.', 0, 'Mengeluarkannya dari tim', 0),
(77, 'Manajerial #2', 'Anda adalah seorang karyawan yang bekerja pada perusahaan yang berkaitan dengan pelayanan masyarakat dan anda sadar bahwa setiap individu merniliki kemampuan yang berbeda dalam memahami regulasi dan kebijakan pelayanan yang perusahaan anda tetapkan sehingga seringkali terjadi miskomunikasi dilambah lagi hal hal teknis yang seringkali dikeluhkan masyarakat karena mengganggu proses pelayanan perusahaan anda. Oleh karena itu untuk lebih meningkatkan pelayanan maka....', 'Perlu dibuatkan sebuah call center yang siap 24 jam untuk menerima sernua pengaduan masyarakat', 0, 'Email koresponden dibutuhkan agar operator bisa melayani seluruh email pertanyaan yang masuk dari masyarakat seputar pelayanan', 0, 'Menempatkan kotak saran di loket pelayanan untuk mengakornodir semua keluhan masyarakat secara tertulis', 0, 'Mendirikan loket costumer service sebagai lempat masyarakat memperoleh informasi secara langsung', 0, 'Membangun sistem FAQ di web perusahaan untuk menjawab pertanyaan-pertanyaan yang sering ditanyakan terkait regulasi dan kebijakan pelayanan', 5),
(78, 'Manajerial #2', 'Pada saat anda sedang mengerjakan sebuah pekerjaan penting tiba-tiba anda menemukan sebuah kejanggalan pada sistem informasi yang anda gunakan dan bisa berakibat bocornya data perusahaan ke publik. Bagaimana sikap anda...', 'Menyuruh semua rekan kerja untuk menghentikan penggunaan sistem itu.', 0, 'Saat itu juga anda menghentikan penggunaan sistem itu.', 0, 'Melaporkan kepada atasan apakah harus berhenti menggunakan sistem itu.', 5, 'Menyelesaikan pekerjaan penting tersebut lebih dulu kemudian menghentikan penggunaan sistem itu.', 0, 'Menyelesaikan pekerjaan penting tersebut lebih dulu kemudian melaporkan ke atasan tentang masalah pada sistem itu.', 0),
(79, 'Manajerial #2', 'Anda mendapat promosi jabatan yang anda idam-idamkan, sikap anda?', 'Berusaha mengendalikan kebanggaan dan kebahagiaan diri dan keluarga', 5, 'Mengadakan syukuran kecil-kecilan', 0, 'Bangga dan bahagia atas hasilnya', 0, 'Menginformasikannya kepada teman dan keluarga', 0, 'Membuat acara dengan rekan kantor', 0),
(80, 'Manajerial #2', 'Anda mendapatkan tugas untuk menyelesaikan urusan kantor diluar kota dengan beberapa rekan team lainnya. Karena tugas ini sangat penting bagi perusahaan, anda diminta untuk bekerja dengan cermat, cepat, efektif dan efisien dan selalu mematuhi SOP yang ada. Namun ada salah satu dari rekan anda yang melakukan kesalahan cukup fatal karena tidak bekerja sesuai dengan prosedur, yang anda lakukan', 'Mendalami kesalahan yang telah diperbuat teman tersebut', 0, 'Memintanya untuk mempertanggung jawabkan kesalahannya kepada atasan', 0, 'Membicarakannya dengan rekan kerja yang lain untuk mengambil sikap', 5, 'Mengeluarkannya dari team dan menyuruh bertanggung jawab', 0, 'Membicarakan kepada atasan tentang permasalahan tersebut', 0),
(81, 'Manajerial #2', 'Beberapa tahun lagi anda akan memasuki usia pensiun dari salah satu instansi pemerintahan tempat anda bekerja selama ini. Tanggung jawab anda untuk mengabdi bagi negara pun telah selesai. Sekarang anda memasuki babak baru dimana tidak lagi terikat dengan pekerjaan dan pengabdian terhadap negara. Hal apa yang akan anda rencanakan untuk selanjutnya ketika waktu itu telah tiba', 'Saya membuka usaha kecil-kecilan dirumah sambil menghabiskan hari tua saya dengan anak dan cucu-cucu saya', 0, 'Memiliki tanah di berbagai tempat strategis untuk investasi masa tua saya dan keluarga', 0, 'Membuka lapangan kerja buat orang terdekat dan yang membutuhkan pekerjaan karena zaman sekarang sulit mendapatkan pekerjaan', 5, 'Memiliki warisan harta yang berguna bagi anak dan cucu saya kelak ketika waktu tersebut sudah tiba', 0, 'Beristirahat saja setiap hari di rumah menikmati hari-hari tua saya bersama keluarga', 0),
(82, 'Manajerial #2', 'Anda baru saja di mutasi ke sebuah cabang baru dari perusahaan anda yang berlokasi diluar kota, anda diberikan tanggung jawab yang lebih besar dari sebelumnya untuk mengontrol dan mewujudkan tujuan perusahaan di kantor cabang baru tersebut, dan memajukan perusahaan. Namun cabang baru tersebut di isi oleh karyawan karyawan baru dari daerah dan belum berpengalaman, yang anda lakukan', 'Memberitahukan kepada karyawan baru tersebut terkait pekerjaan yang harus mereka kerjakan', 0, 'Menyuruh mereka untuk lebih berinisiatif untuk mengimprovisasi diri dan meningkatkan kualitas dalam bekerja', 5, 'Menyuruh mereka membaca semua tugas mereka dan menerapkannya dalam setiap pekerjaan', 0, 'Meminta untuk bekerja maksimal dan loyal terhadap perusahaan', 0, 'Mengkomunikasikan sasaran perusahaan dan memotivasi staf saya untuk mencapainya.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `kelompok` varchar(250) NOT NULL,
  `topik` varchar(250) NOT NULL,
  `durasi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `kelompok`, `topik`, `durasi`) VALUES
(14, 'PPL SL3', 'Simulasi', '10'),
(15, 'PPL SL3', 'Manajemen #1', '30'),
(16, 'PPL SL3', 'Sosiokultural #1', '30'),
(17, 'PPL SL3', 'Manajerial #2', '30');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(10, 'aabdf7');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `topik` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id`, `topik`) VALUES
(9, 'Simulasi'),
(10, 'Manajemen #1'),
(11, 'Sosiokultural #1'),
(12, 'Manajerial #2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `namaLengkap` varchar(250) NOT NULL,
  `kelompok` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `namaLengkap`, `kelompok`) VALUES
(10, 'Alifka', '$2y$10$6iy.Km1Sp/QLV1WG1j3e4uPecczbTFDKRFynbJ1fyvEBEKu7tBqZ.', 'Alifka Inahana', 'PPL SL3'),
(11, 'Apriantika', '$2y$10$QLhGF0RABVnCWK.G0CIGLegrum7UJKtFivIZaf/I9rEC2MIBoWhoS', 'Apriantika Khoirun N.', 'PPL SL3'),
(12, 'Arbhito', '$2y$10$.d5xmB64cr2jC67er4Ct.Oi0Az034rsoMfmiqlW5Njs8BhMHxz8d2', 'Arbhito Iqbal Pratomo', 'PPL SL3'),
(13, 'Citra', '$2y$10$wDxiCh.sW/IQFyWDO.Kb2O19vcI1uV7AW0UzRz42KHqokT/OEqxS6', 'Citra Nur Adha C.', 'PPL SL3'),
(14, 'Dea', '$2y$10$B2h.hgc2S.p7L5PVPdP4yub4OCsPNScpUQnbGiHzb.reL/L2uxYmK', 'Dea Evani Amelia', 'PPL SL3'),
(15, 'Nur', '$2y$10$UxiL.osWVAPSuabSqHchM.WTYpz.ajAvrnzsh7ZKb/p2JmBs9/v1i', 'Nur Isrokhiyati ', 'PPL SL3'),
(16, 'Riska', '$2y$10$5T0IVL2WzSXvE0QNbGknaO48huFBMcAF.sESDEfGIDHPnS54GiIZ2', 'Riska Peryana ', 'PPL SL3'),
(18, 'Safira', '$2y$10$2lFieW9X7GI7P6yWW9N/IOSQGkPgq68JwaTgaXjspgh0seU7aguny', 'Safira Rohmah Hass', 'PPL SL3'),
(19, 'Sahrul', '$2y$10$a4bOpDQmcJ527Ra05RofXOtCQAHBNiyFLFNKZrwDGEVehxwBn3O/u', 'Sahrul Mubarok', 'PPL SL3'),
(20, 'Surya', '$2y$10$f6wlwLjuy3YW8kDtZWm41.RLNzXtA9rwHsgAWb6qHebyvVHJndzV6', 'Surya Wijayanti', 'PPL SL3'),
(21, 'Umi', '$2y$10$DHLEbsxTLWcyMeEctepfQONsQr2/yuZy8IA/Z0sbHDd08NtVRDL/C', 'Umi Trimukti', 'PPL SL3'),
(22, 'Suyatman', '$2y$10$FdsMuagk4magOCc4zyVhnenQlKUBqjzzEItTzGPou5extpDxDT/EC', 'Suyatman', 'PPL SL3'),
(23, 'Sabah', '$2y$10$/H5TaD1LeQyZroT/XEODNu.PEzuO13aL0eGlz6o5SBkecNRj6ZP8O', 'Sabah Ashfiya A. S. P. ', 'PPL SL3'),
(24, 'Diva', '$2y$10$ag7jE9EtaciT4yYGIGhw..SkGTQ1lGTDV7iOOp.mRLVvtqKnGPxg6', 'Diva', 'PPL SL3'),
(25, 'Fadhkur', '$2y$10$mc7oHEPJHavzCQbRhttm5uetBuhouzav3wYpr7RgshvRVQGxt6GbC', 'Fadhkur Nuur M.', 'PPL SL3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
