<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpica TV Filmleri</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Android'deki header stili */
        .jsx-74833a544911287d.relative {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10000;
            background-color: black;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
        }

        /* Android'deki ana içerik stili */
        .space-y-8 {
            position: fixed;
            top: 60px; /* Header yüksekliğine göre ayarlandı */
            left: 0;
            width: 100%;
            height: calc(100% - 60px); /* Header yüksekliği düşüldü */
            overflow: auto;
            z-index: 9999;
            background-color: black;
            padding: 20px;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        /* İstenmeyen elemanları gizle */
        .text-xl.font-bold.text-white,
        .bg-slate-900\/50.border-t.border-slate-800.backdrop-blur-sm.mt-0.min-h-\[400px\] {
            display: none;
        }

        .movie-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #fff;
            text-align: center;
            transition: transform 0.2s, outline 0.2s;
            outline: 3px solid transparent; /* Kumanda için varsayılan görünmez çerçeve */
        }

        .movie-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .movie-item span {
            font-size: 1.2rem;
        }

        /* "hover" etkisi için vurgu sınıfı */
        .movie-item.focused {
            outline-color: red;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <header class="jsx-74833a544911287d relative">
        <h1>Alpica TV</h1>
        <p>Kumanda ile gezilebilir filmler.</p>
    </header>

    <div class="space-y-8">
        <?php
        // Film verilerini buraya ekleyin
        $movies = [
            ['title' => 'Meg 2: Çukur', 'url' => 'film/meg-2-cukur.php', 'poster' => 'https://image.tmdb.org/t/p/w500/mM0m362yW8S5l3fLwU9T4sB4tK8.jpg'],
            ['title' => 'Henry Danger: The Movie', 'url' => 'film/henry-danger-the-movie.php', 'poster' => 'https://image.tmdb.org/t/p/w500/t6S4N1oT1fR7t3e79S35h1gK7Xk.jpg'],
            ['title' => 'Buzlar Kralı', 'url' => 'film/buzlar-kralligi.php', 'poster' => 'https://image.tmdb.org/t/p/w500/5W0g1zU8w0G6z08p2Q9fT0rB5Z3.jpg'],
            ['title' => 'Keşke Burada Olsaydın', 'url' => 'film/keske-burada-olsaydin.php', 'poster' => 'https://image.tmdb.org/t/p/w500/t6S4N1oT1fR7t3e79S35h1gK7Xk.jpg'],
            ['title' => 'Temeller Ailesi', 'url' => 'film/temeller-ailesi.php', 'poster' => 'https://image.tmdb.org/t/p/w500/t6S4N1oT1fR7t3e79S35h1gK7Xk.jpg'],
        ];

        echo '<div class="movie-grid">';
        foreach ($movies as $movie) {
            echo '<a class="movie-item" href="' . $movie['url'] . '">';
            echo '<img src="' . $movie['poster'] . '" alt="' . $movie['title'] . '">';
            echo '<span>' . $movie['title'] . '</span>';
            echo '</a>';
        }
        echo '</div>';
        ?>
        
        <div class="text-xl font-bold text-white">Bu bir başlıktır ve gizlenecek.</div>
        <div class="bg-slate-900/50 border-t border-slate-800 backdrop-blur-sm mt-0 min-h-[400px]">
            Bu da gizlenecek bir alt bölümdür.
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const movies = document.querySelectorAll('.movie-item');
            let currentIndex = 0;

            // İlk elemana odaklan
            if (movies.length > 0) {
                movies[currentIndex].classList.add('focused');
                movies[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            // Klavye ve kumanda olaylarını dinle
            document.addEventListener('keydown', (e) => {
                if (movies.length === 0) return;

                // Önceki vurguyu kaldır
                movies[currentIndex].classList.remove('focused');

                switch (e.key) {
                    case 'ArrowDown':
                    case 'ArrowRight':
                        currentIndex = (currentIndex + 1) % movies.length;
                        break;
                    case 'ArrowUp':
                    case 'ArrowLeft':
                        currentIndex = (currentIndex - 1 + movies.length) % movies.length;
                        break;
                    case 'Enter':
                        movies[currentIndex].click();
                        e.preventDefault();
                        return; // Enter tuşuna basınca işlemi sonlandır
                }
                
                // Yeni vurguyu ekle ve ekranda görünmesini sağla
                movies[currentIndex].classList.add('focused');
                movies[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
                e.preventDefault(); // Varsayılan kaydırma davranışını engelle
            });
        });
    </script>

</body>
</html>