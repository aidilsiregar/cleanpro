<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            [
                'title' => 'Tips Membersihkan Rumah dengan Cepat dan Efektif',
                'content' => 'Membersihkan rumah tidak harus memakan waktu berjam-jam. Dengan strategi yang tepat, Anda bisa menyelesaikan pekerjaan dalam waktu singkat. Mulailah dari ruangan yang paling sering digunakan, gunakan produk pembersih yang tepat, dan buat jadwal rutin. Jangan lupa untuk membersihkan dari atas ke bawah agar debu tidak bertebaran.',
                'category' => 'Tips Cleaning',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5)
            ],
            [
                'title' => '5 Manfaat Menggunakan Jasa Cleaning Profesional',
                'content' => 'Menggunakan jasa cleaning profesional memberikan banyak manfaat. Pertama, hasil lebih bersih karena menggunakan peralatan dan produk berkualitas. Kedua, menghemat waktu dan tenaga Anda. Ketiga, mengurangi risiko alergi karena debu dan kotoran tersingkir dengan baik. Keempat, meningkatkan produktivitas karena lingkungan yang bersih. Kelima, harga terjangkau dengan hasil maksimal.',
                'category' => 'Manfaat',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(3)
            ],
            [
                'title' => 'Cara Menghilangkan Noda Mem bandel pada Karpet',
                'content' => 'Noda pada karpet sering menjadi masalah. Untuk noda kopi atau teh, gunakan campuran air hangat dan cuka. Untuk noda minyak, taburi baking soda dan biarkan selama 15 menit sebelum disedot. Noda tinta bisa dihilangkan dengan alkohol. Selalu uji pembersih pada area kecil terlebih dahulu untuk memastikan tidak merusak serat karpet.',
                'category' => 'Pembersihan Karpet',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(7)
            ],
            [
                'title' => 'Perawatan AC agar Tahan Lama dan Hemat Listrik',
                'content' => 'AC yang terawat dengan baik akan lebih awet dan hemat listrik. Bersihkan filter AC minimal sebulan sekali. Periksa freon secara berkala. Pastikan tidak ada hambatan di sekitar unit outdoor. Servis profesional setidaknya 3-6 bulan sekali untuk pembersihan menyeluruh. Dengan perawatan rutin, AC bisa bertahan hingga 10-15 tahun.',
                'category' => 'Perawatan AC',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(10)
            ],
            [
                'title' => 'Panduan Memilih Jasa Cleaning yang Tepat',
                'content' => 'Memilih jasa cleaning yang tepat penting untuk mendapatkan hasil maksimal. Perhatikan reputasi dan review pelanggan. Cek apakah mereka memiliki asuransi dan petugas terlatih. Tanyakan produk pembersih yang digunakan. Bandingkan harga dari beberapa penyedia. Pastikan ada garansi kepuasan. Jangan ragu untuk bertanya detail layanan yang ditawarkan.',
                'category' => 'Panduan',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2)
            ],
            [
                'title' => 'Membersihkan Rumah Setelah Renovasi',
                'content' => 'Setelah renovasi, rumah biasanya penuh debu dan kotoran. Mulai dengan membersihkan area dari debu kasar menggunakan vacuum. Bersihkan semua permukaan dengan kain basah. Jangan lupa membersihkan ventilasi dan filter AC. Untuk lantai, gunakan pembersih khusus sesuai jenis lantai. Buka jendela agar sirkulasi udara baik. Jika terlalu berat, gunakan jasa cleaning profesional.',
                'category' => 'Tips Cleaning',
                'author' => 'Tim CleanPro',
                'is_published' => false,
                'published_at' => null
            ],
            [
                'title' => 'Produk Pembersih Ramah Lingkungan yang Efektif',
                'content' => 'Produk pembersih ramah lingkungan tidak kalah efektif dengan produk kimia. Cuka putih bisa membersihkan kaca dan menghilangkan bau. Baking soda ampuh menghilangkan noda dan bau pada karpet. Lemon membersihkan dan menyegarkan. Minyak esensial seperti tea tree memiliki sifat antibakteri. Dengan produk alami, rumah tetap bersih dan lingkungan tetap terjaga.',
                'category' => 'Produk Ramah Lingkungan',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(15)
            ],
            [
                'title' => 'Jadwal Cleaning Rutin untuk Rumah Tangga',
                'content' => 'Membuat jadwal cleaning rutin membantu menjaga kebersihan rumah. Harian: cuci piring, rapikan tempat tidur, bersihkan meja dapur. Mingguan: vakum dan mengepel lantai, bersihkan kamar mandi, cuci seprai. Bulanan: bersihkan kulkas, oven, dan AC. 3 bulan sekali: cuci karpet dan tirai, bersihkan bagian belakang furnitur. Konsistensi adalah kunci rumah bersih.',
                'category' => 'Tips Cleaning',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(20)
            ],
            [
                'title' => 'Mengatasi Masalah Jamur di Rumah',
                'content' => 'Jamur di rumah dapat menyebabkan masalah kesehatan. Untuk mengatasinya, identifikasi sumber kelembaban dan perbaiki. Gunakan dehumidifier untuk mengurangi kelembaban. Bersihkan area berjamur dengan campuran air dan pemutih (1:10). Untuk area kecil, gunakan cuka putih. Pastikan ventilasi baik di kamar mandi dan dapur. Jika jamur meluas, konsultasikan dengan profesional.',
                'category' => 'Kesehatan & Kebersihan',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(25)
            ],
            [
                'title' => 'Tips Menjaga Kebersihan Dapur',
                'content' => 'Dapur adalah area yang paling sering digunakan dan perlu kebersihan ekstra. Bersihkan meja dapur setelah setiap penggunaan. Cuci piring segera setelah makan. Simpan makanan dalam wadah tertutup. Bersihkan kompor setelah memasak. Ganti spons dapur setiap minggu. Lakukan deep cleaning dapur setiap bulan termasuk lemari dan kulkas.',
                'category' => 'Tips Dapur',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(30)
            ],
            [
                'title' => 'Kenapa Harus Deep Cleaning?',
                'content' => 'Deep cleaning berbeda dengan cleaning biasa. Deep cleaning membersihkan area yang sulit dijangkau seperti belakang lemari, atas kulkas, sela-sela sofa, dan sudut-sudut tersembunyi. Ini penting untuk menghilangkan debu, tungau, dan bakteri yang menumpuk. Deep cleaning disarankan dilakukan setiap 3-6 bulan sekali untuk menjaga lingkungan benar-benar bersih dan sehat.',
                'category' => 'Informasi',
                'author' => 'Tim CleanPro',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(35)
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}